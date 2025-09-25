<?php
/**
* Quick Chat module
*/
require_once 'engine/quick_chat.php';
require_once __DIR__ . '/../MarketSystem/sys/func_market.inc.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$quick_chat_initial = 20;
$quick_chat_older_batch = 10;

function quick_chat_render_json($payload)
{
    if (function_exists('ob_get_level')) {
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
    }
    header('Content-Type: application/json');
    $json = json_encode($payload);
    if ($json === false && function_exists('mb_check_encoding')) {
        array_walk_recursive($payload, function (&$value) {
            if (is_string($value) && !mb_check_encoding($value, 'UTF-8')) {
                $value = mb_convert_encoding($value, 'UTF-8', 'auto');
            }
        });
        $json = json_encode($payload);
    }
    echo $json;
    exit;
}

function quick_chat_market_item_details($itemId)
{
    static $cache = array();

    $itemId = (int) $itemId;
    if ($itemId < 1) {
        return null;
    }

    if (array_key_exists($itemId, $cache)) {
        return $cache[$itemId];
    }

    $cache[$itemId] = null;

    $resource = mssql_query("SELECT TOP 1 [id], [item] FROM [MuCore_Market] WHERE [id] = '" . $itemId . "' AND [is_sold] = '0'");
    if (!$resource || mssql_num_rows($resource) < 1) {
        return null;
    }

    $row = mssql_fetch_array($resource);
    if (!$row || empty($row['item'])) {
        return null;
    }

    $info = ItemInfo($row['item']);
    if (!$info || empty($info['name'])) {
        return null;
    }

    $thumb = isset($info['thumb']) ? $info['thumb'] : '';
    $durability = isset($info['dur']) ? $info['dur'] : '';
    $jewelOfGuardian = isset($info['jog']) ? $info['jog'] : '';
    $harmony = isset($info['harm']) ? $info['harm'] : '';
    $socket = isset($info['socket']) ? $info['socket'] : '';

    $levelSuffix = '';
    if (!empty($info['level'])) {
        $levelSuffix = ' +' . $info['level'];
    }

    $option = !empty($info['opt']) ? '<font color=#9aadd5>' . $info['opt'] . '</font>' : '';
    $luck = !empty($info['luck']) ? '<br><font color=#9aadd5>' . $info['luck'] . '</font>' : '';
    $skill = !empty($info['skill']) ? '<br><font color=#9aadd5>' . $info['skill'] . '</font>' : '';
    $excellent = !empty($info['exl']) ? '<font color=#4d668d>' . str_replace('^^', '<br>', $info['exl']) . '</font>' : '';

    $thumbAttr = htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8');

    $tooltip = '<center>'
        . '<img src="' . $thumbAttr . '">' 
        . '<br><font color=white><br>Durability: ' . $durability . '</font>'
        . '<br><font color=#FF99CC>' . $jewelOfGuardian . '</font><font color=FFCC00>' . $harmony . '</font>'
        . '<br>' . $option . ' ' . $luck . ' ' . $skill . ' ' . $excellent
        . '<br><font color=#4d668d>' . $socket . '</font>'
        . '</center>';

    $cache[$itemId] = array(
        'id' => $itemId,
        'label' => $info['name'] . $levelSuffix,
        'tooltip' => $tooltip,
        'title_color' => isset($info['color']) ? $info['color'] : '#B9955B',
        'title_background' => isset($info['anco']) ? $info['anco'] : '#000000',
    );

    return $cache[$itemId];
}

function quick_chat_render_market_reference($details)
{
    if (!$details || empty($details['label'])) {
        return '';
    }

    $onMouseOver = 'Tip(' . json_encode($details['tooltip'])
        . ', TITLEFONTCOLOR,' . json_encode($details['title_color'])
        . ', TITLE,' . json_encode($details['label'])
        . ', TITLEBGCOLOR,' . json_encode($details['title_background']) . ')';

    $attributes = array(
        'class="quick-chat__market-item"',
        'data-market-id="' . (int) $details['id'] . '"',
        'onmouseover="' . htmlspecialchars($onMouseOver, ENT_QUOTES, 'UTF-8') . '"',
        'onmouseout="UnTip()"'
    );

    return '<span ' . implode(' ', $attributes) . '>'
        . htmlspecialchars($details['label'], ENT_QUOTES, 'UTF-8')
        . '</span>';
}

function quick_chat_render_market_tokens($message)
{
    $pattern = '/\/market_(\d{1,10})/i';
    $hasMatch = preg_match_all($pattern, $message, $matches, PREG_OFFSET_CAPTURE);
    if (!$hasMatch) {
        return array(
            'html' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
            'ids' => array(),
        );
    }

    $html = '';
    $ids = array();
    $lastIndex = 0;

    foreach ($matches[0] as $idx => $match) {
        $matchText = $match[0];
        $matchStart = $match[1];
        $segment = substr($message, $lastIndex, $matchStart - $lastIndex);
        if ($segment !== '') {
            $html .= htmlspecialchars($segment, ENT_QUOTES, 'UTF-8');
        }

        $itemIdRaw = $matches[1][$idx][0];
        $itemDetails = quick_chat_market_item_details($itemIdRaw);
        if ($itemDetails) {
            $html .= quick_chat_render_market_reference($itemDetails);
            $ids[] = (int) $itemDetails['id'];
        } else {
            $html .= '<span class="quick-chat__market-missing">Item #' . htmlspecialchars($itemIdRaw, ENT_QUOTES, 'UTF-8') . ' không khả dụng.</span>';
        }

        $lastIndex = $matchStart + strlen($matchText);
    }

    $tail = substr($message, $lastIndex);
    if ($tail !== '') {
        $html .= htmlspecialchars($tail, ENT_QUOTES, 'UTF-8');
    }

    return array(
        'html' => $html,
        'ids'  => $ids,
    );
}

function quick_chat_prepare_messages($messages)
{
    if (!is_array($messages)) {
        return array();
    }

    foreach ($messages as &$row) {
        $text = isset($row['message']) ? (string) $row['message'] : '';
        $renderedInfo = quick_chat_render_market_tokens($text);
        $row['rendered'] = $renderedInfo['html'];
        if (!empty($renderedInfo['ids'])) {
            $row['market_item_ids'] = array_values(array_unique($renderedInfo['ids']));
        }
    }
    unset($row);

    return $messages;
}

if ($action === 'list') {
    $since  = isset($_GET['since']) ? (string) $_GET['since'] : '';
    $before = isset($_GET['before']) ? (string) $_GET['before'] : '';
    $limit  = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;

    $options = array();
    if ($before !== '') {
        $options['before'] = $before;
        $options['limit']  = $limit > 0 ? $limit : $quick_chat_older_batch;
    } else {
        if ($since !== '') {
            $options['since'] = $since;
        }
        if ($limit > 0) {
            $options['limit'] = $limit;
        }
    }

    $messages = quick_chat_get_messages($options);
    $messages = quick_chat_prepare_messages($messages);
    quick_chat_render_json(array(
        'success'  => true,
        'messages' => $messages,
        'now'      => time(),
    ));
}

if ($action === 'send') {
    if ($user_login !== '1' || empty($user_auth_id)) {
        quick_chat_render_json(array('success' => false, 'error' => 'not_authenticated'));
    }

    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $display_input = isset($_POST['display']) ? trim($_POST['display']) : '';
    $display_input = preg_replace('/[^\p{L}\p{N} _\-\.]/u', '', $display_input);
    $available_characters = quick_chat_get_account_characters($user_auth_id);
    $display_name = $user_auth_id;
    if (!empty($available_characters)) {
        if ($display_input !== '' && in_array($display_input, $available_characters, true)) {
            $display_name = $display_input;
        } else {
            $display_name = $available_characters[0];
        }
    } else {
        if ($display_input !== '' && strcasecmp($display_input, $user_auth_id) === 0) {
            $display_name = $user_auth_id;
        }
    }

    $result = quick_chat_add_message($user_auth_id, $message, $_SERVER['REMOTE_ADDR'], $display_name);

    if (!$result['success']) {
        quick_chat_render_json($result + array('now' => time()));
    }

    quick_chat_render_json(array(
        'success'   => true,
        'timestamp' => $result['timestamp'],
        'now'       => time(),
    ));
}

$messages = quick_chat_get_messages(array('tail' => $quick_chat_initial));
$messages = quick_chat_prepare_messages($messages);
$can_post = ($user_login === '1' && !empty($user_auth_id));
$last_timestamp = '';
if (!empty($messages)) {
    $last_row = $messages[count($messages) - 1];
    if (isset($last_row['time'])) {
        $last_timestamp = (string) $last_row['time'];
    }
}

$chat_character_names = array();
$quick_chat_display_default = $user_auth_id;
if ($can_post && function_exists('quick_chat_get_account_characters')) {
    $chat_character_names = quick_chat_get_account_characters($user_auth_id);
    if (!empty($chat_character_names)) {
        $quick_chat_display_default = $chat_character_names[0];
    }
}

$quick_chat_commands = array(
    array(
        'name' => 'market',
        'insert' => '/market_',
        'description' => 'Chèn tham chiếu vật phẩm đang bán ở Market.',
    ),
);
?>
<div class="quick-chat">
    <div class="quick-chat__header">
        <strong>Quick Chat</strong>
        <span class="quick-chat__status" id="quick-chat-status"></span>
    </div>
    <div class="quick-chat__messages" id="quick-chat-messages">
        <div class="quick-chat__loader" id="quick-chat-loader">Đang tải tin nhắn cũ...</div>
        <?php if (empty($messages)) : ?>
            <div class="quick-chat__empty">No messages yet.</div>
        <?php else : ?>
            <?php foreach ($messages as $row) : ?>
                <?php
                $authorRaw = isset($row['author']) ? (string) $row['author'] : '';
                $author    = htmlspecialchars($authorRaw, ENT_QUOTES, 'UTF-8');
                $bodyHtml  = isset($row['rendered']) ? $row['rendered'] : htmlspecialchars(isset($row['message']) ? (string) $row['message'] : '', ENT_QUOTES, 'UTF-8');
                $rawTime   = isset($row['time']) ? (string) $row['time'] : sprintf('%.6F', microtime(true));
                $timeAttr  = htmlspecialchars($rawTime, ENT_QUOTES, 'UTF-8');
                $timePrint = date('h:i A', (int) $rawTime);
                ?>
                <div class="quick-chat__message" data-ts="<?= $timeAttr; ?>">
                    <span class="quick-chat__time">[<?= $timePrint; ?>]</span>
                    <span class="quick-chat__author"><?= $author; ?></span>
                    <span class="quick-chat__separator">:</span>
                    <span class="quick-chat__body"><?= $bodyHtml; ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="quick-chat__form" <?php if (!$can_post) : ?>style="display:none;"<?php endif; ?>>
        <form id="quick-chat-form" action="<?= htmlspecialchars($core_run_script . '&action=send', ENT_QUOTES, 'UTF-8'); ?>" method="post" autocomplete="off">
            <?php if ($can_post) : ?>
                <div class="quick-chat__identity">
                    <label for="quick-chat-display">Tên hiển thị:</label>
                    <?php if (!empty($chat_character_names)) : ?>
                        <select id="quick-chat-display" name="display" class="quick-chat__identity-select">
                            <?php foreach ($chat_character_names as $name) : ?>
                                <option value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>"<?php if ($quick_chat_display_default === $name) : ?> selected<?php endif; ?>><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php else : ?>
                        <input type="hidden" id="quick-chat-display" name="display" value="<?= htmlspecialchars($user_auth_id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <span class="quick-chat__identity-static"><?= htmlspecialchars($user_auth_id, ENT_QUOTES, 'UTF-8'); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="quick-chat__form-row">
                <input type="text" name="message" id="quick-chat-input" maxlength="<?= QUICK_CHAT_MESSAGE_LIMIT; ?>" placeholder="Type a message" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" />
                <button type="submit" id="quick-chat-send">Send</button>
            </div>
            <div class="quick-chat__suggestions" id="quick-chat-suggestions"></div>
        </form>
    </div>
    <?php if (!$can_post) : ?>
        <div class="quick-chat__notice">Log in to send messages.</div>
    <?php endif; ?>
</div>
<script type="text/javascript">
window.quickChatConfig = {
    endpoint: <?= json_encode($core_run_script); ?>,
    canPost: <?= $can_post ? 'true' : 'false'; ?>,
    lastTimestamp: <?= json_encode($last_timestamp); ?>,
    history: {
        initialBatch: <?= (int) $quick_chat_initial; ?>,
        olderBatch: <?= (int) $quick_chat_older_batch; ?>,
        max: <?= (int) QUICK_CHAT_MAX_MESSAGES; ?>
    },
    displayDefault: <?= json_encode($quick_chat_display_default); ?>,
    commands: <?= json_encode($quick_chat_commands); ?>
};
</script>
<script type="text/javascript" src="MarketSystem/plugins/tooltip.js"></script>
<script type="text/javascript" src="js/quick_chat.js"></script>
<style type="text/css">
.quick-chat{border:1px solid #2a2a2a;background:#0b0b0b;color:#e1e1e1;padding:10px;font-size:12px;}
.quick-chat__header{display:flex;justify-content:space-between;margin-bottom:8px;}
.quick-chat__messages{max-height:220px;overflow-y:auto;background:#111;padding:8px;border:1px solid #1f1f1f;margin-bottom:8px;text-align:left;}
.quick-chat__message{margin-bottom:6px;display:flex;gap:6px;align-items:flex-start;justify-content:flex-start;line-height:1.4;}
.quick-chat__time{color:#8fa7c2;font-family:monospace;}
.quick-chat__author{color:#ffd27f;font-weight:600;}
.quick-chat__separator{color:#8fa7c2;}
.quick-chat__body{color:#e1e1e1;word-break:break-word;flex:1;}
.quick-chat__identity{display:flex;align-items:center;gap:6px;margin-bottom:6px;}
.quick-chat__identity label{font-size:11px;color:#9bd1ff;}
.quick-chat__identity-select{flex:1;padding:3px 6px;font-size:12px;background:#1a1a1a;border:1px solid #2f2f2f;color:#e1e1e1;}
.quick-chat__identity-static{font-size:12px;color:#9bd1ff;}
.quick-chat__form-row{display:flex;gap:6px;}
.quick-chat__empty{color:#777;font-style:italic;}
.quick-chat__form-row input{flex:1;padding:4px;}
.quick-chat__form-row button{padding:4px 8px;}
.quick-chat__notice{color:#f6b26b;font-style:italic;}
.quick-chat__loader{display:block;padding:4px 0;margin-bottom:4px;font-size:11px;color:#9bd1ff;text-align:center;min-height:18px;visibility:hidden;opacity:0;transition:opacity 0.15s ease;}
.quick-chat__loader--visible{visibility:visible;opacity:1;}
.quick-chat__market-item{color:#9bd1ff;text-decoration:underline;cursor:pointer;white-space:nowrap;}
.quick-chat__market-item:hover{color:#ffd27f;}
.quick-chat__market-missing{color:#ff6666;font-style:italic;}
.quick-chat__suggestions{display:none;background:#141414;border:1px solid #2f2f2f;margin-top:4px;max-height:150px;overflow-y:auto;font-size:12px;box-shadow:0 2px 6px rgba(0,0,0,0.35);}
.quick-chat__suggestions--visible{display:block;}
.quick-chat__suggestion{padding:6px 8px;cursor:pointer;display:flex;flex-direction:column;gap:2px;border-bottom:1px solid rgba(255,255,255,0.05);}
.quick-chat__suggestion:last-child{border-bottom:none;}
.quick-chat__suggestion-command{color:#9bd1ff;font-weight:600;}
.quick-chat__suggestion-desc{color:#cccccc;font-size:11px;}
.quick-chat__suggestion--active{background:#1f1f1f;}
</style>
<?php
/**
* Module end
*/
?>

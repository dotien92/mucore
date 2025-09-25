<?php
/**
* Quick Chat module
*/
require_once 'engine/quick_chat.php';

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
                $author    = htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8');
                $message   = htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8');
                $rawTime   = isset($row['time']) ? (string) $row['time'] : sprintf('%.6F', microtime(true));
                $timeAttr  = htmlspecialchars($rawTime, ENT_QUOTES, 'UTF-8');
                $timePrint = date('h:i A', (int) $rawTime);
                ?>
                <div class="quick-chat__message" data-ts="<?= $timeAttr; ?>">
                    <span class="quick-chat__time">[<?= $timePrint; ?>]</span>
                    <span class="quick-chat__author"><?= htmlspecialchars($author, ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="quick-chat__separator">:</span>
                    <span class="quick-chat__body"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="quick-chat__form" <?php if (!$can_post) : ?>style="display:none;"<?php endif; ?>>
        <form id="quick-chat-form" action="<?= htmlspecialchars($core_run_script . '&action=send', ENT_QUOTES, 'UTF-8'); ?>" method="post">
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
                <input type="text" name="message" id="quick-chat-input" maxlength="<?= QUICK_CHAT_MESSAGE_LIMIT; ?>" placeholder="Type a message" />
                <button type="submit" id="quick-chat-send">Send</button>
            </div>
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
    displayDefault: <?= json_encode($quick_chat_display_default); ?>
};
</script>
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
</style>
<?php
/**
* Module end
*/
?>

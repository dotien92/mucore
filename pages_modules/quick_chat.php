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

function quick_chat_format_item_detail($itemId, $info)
{
    if (!is_array($info) || empty($info['name'])) {
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

    return array(
        'id' => (int) $itemId,
        'label' => $info['name'] . $levelSuffix,
        'tooltip' => $tooltip,
        'title_color' => isset($info['color']) ? $info['color'] : '#B9955B',
        'title_background' => isset($info['anco']) ? $info['anco'] : '#000000',
    );
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
    if (!$info) {
        return null;
    }

    $cache[$itemId] = quick_chat_format_item_detail($itemId, $info);

    return $cache[$itemId];
}

function quick_chat_get_account_market_items($account)
{
    $account = trim((string) $account);
    if ($account === '') {
        return array();
    }

    $items = array();
    $query = mssql_query(
        "SELECT [id], [item], [start_date] FROM [MuCore_Market] WHERE [seller] = '" . $account . "' AND [is_sold] = '0' ORDER BY [start_date] DESC"
    );
    if (!$query) {
        return array();
    }

    while ($row = mssql_fetch_array($query)) {
        if (empty($row['item'])) {
            continue;
        }
        $info = ItemInfo($row['item']);
        if (!$info) {
            continue;
        }
        $detail = quick_chat_format_item_detail($row['id'], $info);
        if ($detail) {
            $items[] = $detail;
        }
    }

    return $items;
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

    $label = htmlspecialchars($details['label'], ENT_QUOTES, 'UTF-8');

    return '<span ' . implode(' ', $attributes) . '>'
        . '<span class="quick-chat__market-icon">🏪</span> '
        . '<span class="quick-chat__market-label">' . $label . '</span>'
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

function quick_chat_sql_escape($value)
{
    return str_replace("'", "''", (string) $value);
}

function quick_chat_normalize_item_blob($data)
{
    if ($data === null) {
        return '';
    }
    if (!is_string($data)) {
        $data = (string) $data;
    }
    if ($data === '') {
        return '';
    }

    if (strpos($data, '0x') === 0 || strpos($data, '0X') === 0) {
        $data = substr($data, 2);
    }

    $trimmed = trim($data);
    if ($trimmed !== '' && preg_match('/^[0-9A-Fa-f]+$/', $trimmed)) {
        return strtoupper($trimmed);
    }

    $hex = bin2hex($data);
    return $hex !== '' ? strtoupper($hex) : '';
}

function quick_chat_extract_item_slots($hex, $slotCount)
{
    $slotCount = (int) $slotCount;
    if ($slotCount < 1) {
        return array();
    }

    $hex = strtoupper((string) $hex);
    if ($hex === '') {
        return array();
    }

    $slotSize = 20;
    $length = strlen($hex);
    $maxSlots = min($slotCount, (int) floor($length / $slotSize));

    if ($maxSlots < 1) {
        return array();
    }

    $items = array();
    for ($slot = 0; $slot < $maxSlots; $slot++) {
        $offset = $slot * $slotSize;
        $chunk = substr($hex, $offset, $slotSize);
        if ($chunk === false || strlen($chunk) !== $slotSize) {
            break;
        }
        if ($chunk === '' || $chunk === str_repeat('F', $slotSize)) {
            continue;
        }
        if (!ctype_xdigit($chunk)) {
            continue;
        }
        $items[] = array(
            'slot' => $slot,
            'hex'  => $chunk,
        );
    }

    return $items;
}

function quick_chat_encode_character_key($name)
{
    $encoded = rtrim(strtr(base64_encode((string) $name), '+/', '-_'), '=');
    return 'c-' . $encoded;
}

function quick_chat_personal_group_meta($key)
{
    $key = (string) $key;
    if ($key === 'w') {
        return array('type' => 'warehouse', 'label' => 'Warehouse');
    }
    if (strpos($key, 'c-') === 0) {
        $payload = substr($key, 2);
        if ($payload !== '') {
            $payload = strtr($payload, '-_', '+/');
            $pad = strlen($payload) % 4;
            if ($pad > 0) {
                $payload .= str_repeat('=', 4 - $pad);
            }
            $decoded = base64_decode($payload, true);
            if ($decoded !== false && $decoded !== '') {
                return array('type' => 'character', 'label' => $decoded);
            }
        }
        return array('type' => 'character', 'label' => 'Character');
    }

    return array('type' => 'unknown', 'label' => 'Inventory');
}

function quick_chat_item_cipher_key()
{
    static $key = null;
    if ($key !== null) {
        return $key;
    }

    $base = 'quick_chat_item_secret';
    if (isset($GLOBALS['core']['config']['crypt_key']) && $GLOBALS['core']['config']['crypt_key'] !== '') {
        $base = (string) $GLOBALS['core']['config']['crypt_key'];
    } elseif (isset($GLOBALS['core']['config']['SN']) && $GLOBALS['core']['config']['SN'] !== '') {
        $base = (string) $GLOBALS['core']['config']['SN'];
    }

    $key = hash('sha256', 'quick-chat|item|' . $base, true);
    return $key;
}

function quick_chat_encode_item_token($hex)
{
    $hex = strtoupper((string) $hex);
    if ($hex === '' || strlen($hex) !== 20 || !ctype_xdigit($hex)) {
        return '';
    }

    $plain = pack('H*', $hex);
    $key = quick_chat_item_cipher_key();
    $keyLen = strlen($key);
    $len = strlen($plain);
    $cipher = '';
    for ($i = 0; $i < $len; $i++) {
        $cipher .= chr(ord($plain[$i]) ^ ord($key[$i % $keyLen]));
    }

    $encoded = rtrim(strtr(base64_encode($cipher), '+/', '-_'), '=');
    return 'x' . $encoded;
}

function quick_chat_decode_item_token($token)
{
    $token = trim((string) $token);
    if ($token === '') {
        return '';
    }

    if (strlen($token) === 20 && ctype_xdigit($token)) {
        return strtoupper($token);
    }

    if ($token[0] !== 'x') {
        return '';
    }

    $payload = substr($token, 1);
    if ($payload === '') {
        return '';
    }

    $cipher = base64_decode(strtr($payload, '-_', '+/'), true);
    if ($cipher === false) {
        return '';
    }

    $key = quick_chat_item_cipher_key();
    $keyLen = strlen($key);
    $len = strlen($cipher);
    $plain = '';
    for ($i = 0; $i < $len; $i++) {
        $plain .= chr(ord($cipher[$i]) ^ ord($key[$i % $keyLen]));
    }

    $hex = strtoupper(bin2hex($plain));
    if (strlen($hex) !== 20 || !ctype_xdigit($hex)) {
        return '';
    }

    return $hex;
}

function quick_chat_transform_personal_tokens_in_message($message)
{
    if (!is_string($message) || strpos($message, '/myitem') === false) {
        return $message;
    }

    $callback = function ($matches) {
        $tokenRaw = isset($matches[1]) ? $matches[1] : '';
        $hex = quick_chat_decode_item_token($tokenRaw);
        if ($hex === '') {
            return $matches[0];
        }
        $normalized = quick_chat_encode_item_token($hex);
        if ($normalized === '') {
            return $matches[0];
        }
        return '/myitem-' . $normalized;
    };

    return preg_replace_callback('/\/myitem[-_]([A-Za-z0-9\-_]{2,128})/', $callback, $message);
}

function quick_chat_format_personal_item($slotInfo, $originKey, $originLabel)
{
    if (!is_array($slotInfo) || empty($slotInfo['hex'])) {
        return null;
    }

    $hex = strtoupper($slotInfo['hex']);
    $info = ItemInfo($hex);
    if (!$info || empty($info['name'])) {
        return null;
    }

    $detail = quick_chat_format_item_detail(0, $info);
    if (!$detail) {
        return null;
    }

    $detail['slot'] = isset($slotInfo['slot']) ? (int) $slotInfo['slot'] : 0;
    $detail['hex'] = $hex;
    $detail['origin_key'] = $originKey;
    $detail['origin_label'] = $originLabel;
    $meta = quick_chat_personal_group_meta($originKey);
    $detail['origin_type'] = isset($meta['type']) ? $meta['type'] : 'unknown';
    if (isset($info['thumb'])) {
        $detail['thumb'] = $info['thumb'];
    }

    return $detail;
}

function quick_chat_collect_personal_group($hex, $slotCount, $originKey, $originLabel)
{
    $items = array();
    $slots = quick_chat_extract_item_slots($hex, $slotCount);
    foreach ($slots as $slotInfo) {
        $detail = quick_chat_format_personal_item($slotInfo, $originKey, $originLabel);
        if ($detail) {
            $items[] = $detail;
        }
    }

    return $items;
}

function quick_chat_get_account_personal_items($account)
{
    $account = trim((string) $account);
    if ($account === '') {
        return array();
    }

    $groups = array();
    $accountEscaped = quick_chat_sql_escape($account);

    if (function_exists('mssql_query')) {
        $warehouseRes = @mssql_query(
            "SELECT TOP 1 [Items] FROM [warehouse] WHERE [AccountID] = '" . $accountEscaped . "'"
        );
        if ($warehouseRes) {
            $row = mssql_fetch_array($warehouseRes, MSSQL_ASSOC);
            if ($row && isset($row['Items'])) {
                $hex = quick_chat_normalize_item_blob($row['Items']);
                $items = quick_chat_collect_personal_group($hex, 120, 'w', 'Warehouse');
                if (!empty($items)) {
                    $groups[] = array(
                        'key' => 'w',
                        'title' => 'Warehouse',
                        'type' => 'warehouse',
                        'items' => $items,
                    );
                }
            }
            if (function_exists('mssql_free_result')) {
                mssql_free_result($warehouseRes);
            }
        }

        $charRes = @mssql_query(
            "SELECT [Name], [Inventory] FROM [Character] WHERE [AccountID] = '" . $accountEscaped . "' ORDER BY [Name]"
        );
        if ($charRes) {
            while ($row = mssql_fetch_array($charRes, MSSQL_ASSOC)) {
                if (empty($row['Inventory'])) {
                    continue;
                }
                $name = isset($row['Name']) ? trim((string) $row['Name']) : '';
                $hex = quick_chat_normalize_item_blob($row['Inventory']);
                if ($hex === '') {
                    continue;
                }
                $groupKey = quick_chat_encode_character_key($name !== '' ? $name : 'Character');
                $meta = quick_chat_personal_group_meta($groupKey);
                $items = quick_chat_collect_personal_group($hex, 76, $groupKey, $meta['label']);
                if (!empty($items)) {
                    $groups[] = array(
                        'key' => $groupKey,
                        'title' => $meta['label'],
                        'type' => 'character',
                        'items' => $items,
                    );
                }
            }
            if (function_exists('mssql_free_result')) {
                mssql_free_result($charRes);
            }
        }
    }

    return $groups;
}

function quick_chat_personal_item_details_for_token($token)
{
    static $cache = array();

    $token = trim((string) $token);
    if ($token === '') {
        return null;
    }

    if (array_key_exists($token, $cache)) {
        return $cache[$token];
    }

    $hex = quick_chat_decode_item_token($token);
    if ($hex === '') {
        $cache[$token] = null;
        return null;
    }

    $info = ItemInfo($hex);
    if (!$info || empty($info['name'])) {
        $cache[$token] = null;
        return null;
    }

    $detail = quick_chat_format_item_detail(0, $info);
    if (!$detail) {
        $cache[$token] = null;
        return null;
    }

    $detail['hex'] = $hex;
    if (isset($info['thumb'])) {
        $detail['thumb'] = $info['thumb'];
    }

    $cache[$token] = $detail;
    return $detail;
}

function quick_chat_render_personal_reference($details)
{
    if (!$details || empty($details['label'])) {
        return '';
    }

    $tooltip = isset($details['tooltip']) ? $details['tooltip'] : '';
    $titleColor = isset($details['title_color']) ? $details['title_color'] : '#B9955B';
    $titleBackground = isset($details['title_background']) ? $details['title_background'] : '#000000';

    $onMouseOver = 'Tip(' . json_encode($tooltip)
        . ', TITLEFONTCOLOR,' . json_encode($titleColor)
        . ', TITLE,' . json_encode($details['label'])
        . ', TITLEBGCOLOR,' . json_encode($titleBackground) . ')';

    $attributes = array(
        'class="quick-chat__personal-item"',
        'onmouseover="' . htmlspecialchars($onMouseOver, ENT_QUOTES, 'UTF-8') . '"',
        'onmouseout="UnTip()"'
    );

    $label = htmlspecialchars($details['label'], ENT_QUOTES, 'UTF-8');

    return '<span ' . implode(' ', $attributes) . '>'
        . '<span class="quick-chat__personal-icon">📦</span> '
        . '<span class="quick-chat__personal-label">' . $label . '</span>'
        . '</span>';
}

function quick_chat_render_message_tokens($message)
{
    $pattern = '/\/(market_(\d{1,10})|myitem[-_]([A-Za-z0-9\-_]{2,128}))/i';
    $hasMatch = preg_match_all($pattern, $message, $matches, PREG_OFFSET_CAPTURE);
    if (!$hasMatch) {
        return array(
            'html' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
            'market_item_ids' => array(),
            'personal_items' => array(),
        );
    }

    $html = '';
    $marketIds = array();
    $personalItems = array();
    $lastIndex = 0;

    foreach ($matches[0] as $idx => $match) {
        $matchText = $match[0];
        $matchStart = $match[1];
        $segment = substr($message, $lastIndex, $matchStart - $lastIndex);
        if ($segment !== '') {
            $html .= htmlspecialchars($segment, ENT_QUOTES, 'UTF-8');
        }

        $marketIdRaw = isset($matches[2][$idx][0]) ? $matches[2][$idx][0] : '';
        if ($marketIdRaw !== '') {
            $itemDetails = quick_chat_market_item_details($marketIdRaw);
            if ($itemDetails) {
                $html .= quick_chat_render_market_reference($itemDetails);
                $marketIds[] = (int) $itemDetails['id'];
            } else {
                $html .= '<span class="quick-chat__market-missing">Item #' . htmlspecialchars($marketIdRaw, ENT_QUOTES, 'UTF-8') . ' không khả dụng.</span>';
            }
        } else {
            $tokenRaw = isset($matches[3][$idx][0]) ? $matches[3][$idx][0] : '';
            $details = quick_chat_personal_item_details_for_token($tokenRaw);
            if ($details) {
                $html .= quick_chat_render_personal_reference($details);
                $personalItems[] = array(
                    'label' => $details['label'],
                );
            } else {
                $html .= '<span class="quick-chat__personal-missing">Item cá nhân không khả dụng.</span>';
            }
        }

        $lastIndex = $matchStart + strlen($matchText);
    }

    $tail = substr($message, $lastIndex);
    if ($tail !== '') {
        $html .= htmlspecialchars($tail, ENT_QUOTES, 'UTF-8');
    }

    return array(
        'html' => $html,
        'market_item_ids' => $marketIds,
        'personal_items' => $personalItems,
    );
}

function quick_chat_prepare_messages($messages)
{
    if (!is_array($messages)) {
        return array();
    }

    foreach ($messages as &$row) {
        $text = isset($row['message']) ? (string) $row['message'] : '';

        $renderedInfo = quick_chat_render_message_tokens($text);
        $row['rendered'] = $renderedInfo['html'];
        if (!empty($renderedInfo['market_item_ids'])) {
            $row['market_item_ids'] = array_values(array_unique($renderedInfo['market_item_ids']));
        }
        if (!empty($renderedInfo['personal_items'])) {
            $row['personal_items'] = $renderedInfo['personal_items'];
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

if ($action === 'mymarkets') {
    if ($user_login !== '1' || empty($user_auth_id)) {
        quick_chat_render_json(array('success' => false, 'error' => 'not_authenticated'));
    }

    $itemsRaw = quick_chat_get_account_market_items($user_auth_id);
    $items = array();
    foreach ($itemsRaw as $detail) {
        if (!is_array($detail)) {
            continue;
        }
        $items[] = array(
            'id' => isset($detail['id']) ? (int) $detail['id'] : 0,
            'label' => isset($detail['label']) ? $detail['label'] : '',
            'tooltip' => isset($detail['tooltip']) ? $detail['tooltip'] : '',
            'title_color' => isset($detail['title_color']) ? $detail['title_color'] : '#B9955B',
            'title_background' => isset($detail['title_background']) ? $detail['title_background'] : '#000000',
        );
    }

    quick_chat_render_json(array(
        'success' => true,
        'items'   => $items,
        'now'     => time(),
    ));
}

if ($action === 'myitems') {
    if ($user_login !== '1' || empty($user_auth_id)) {
        quick_chat_render_json(array('success' => false, 'error' => 'not_authenticated'));
    }

    $groupsRaw = quick_chat_get_account_personal_items($user_auth_id);
    $groups = array();

    foreach ($groupsRaw as $group) {
        if (!is_array($group) || empty($group['items'])) {
            continue;
        }

        $items = array();
        foreach ($group['items'] as $item) {
            if (!is_array($item) || empty($item['hex'])) {
                continue;
            }
            $encodedToken = quick_chat_encode_item_token($item['hex']);
            if ($encodedToken === '') {
                continue;
            }
            $token = '/myitem_' . $encodedToken;
            $items[] = array(
                'label' => isset($item['label']) ? $item['label'] : '',
                'tooltip' => isset($item['tooltip']) ? $item['tooltip'] : '',
                'title_color' => isset($item['title_color']) ? $item['title_color'] : '#B9955B',
                'title_background' => isset($item['title_background']) ? $item['title_background'] : '#000000',
                'slot' => isset($item['slot']) ? (int) $item['slot'] : null,
                'origin_key' => isset($item['origin_key']) ? $item['origin_key'] : (isset($group['key']) ? $group['key'] : ''),
                'origin_label' => isset($item['origin_label']) ? $item['origin_label'] : (isset($group['title']) ? $group['title'] : ''),
                'token' => $token,
                'thumb' => isset($item['thumb']) ? $item['thumb'] : '',
            );
        }

        if (empty($items)) {
            continue;
        }

        $groups[] = array(
            'key' => isset($group['key']) ? $group['key'] : 'w',
            'title' => isset($group['title']) ? $group['title'] : '',
            'type' => isset($group['type']) ? $group['type'] : '',
            'items' => $items,
        );
    }

    quick_chat_render_json(array(
        'success' => true,
        'groups' => $groups,
        'now' => time(),
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

    $message = quick_chat_transform_personal_tokens_in_message($message);

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
    array(
        'name' => 'mymarket',
        'insert' => '/mymarket',
        'description' => 'Liệt kê item bạn đang đăng bán.',
    ),
    array(
        'name' => 'myitem',
        'insert' => '/myitem',
        'description' => 'Liệt kê item hiện có trong warehouse và nhân vật.',
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
            <div class="quick-chat__input-wrapper">
                <div class="quick-chat__form-row">
                    <input type="text" name="message" id="quick-chat-input" maxlength="<?= QUICK_CHAT_MESSAGE_LIMIT; ?>" placeholder="Nhập tin nhắn hoặc gõ / để xem lệnh" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" />
                    <button type="submit" id="quick-chat-send">Send</button>
                </div>
                <div class="quick-chat__suggestions quick-chat__floating-panel" id="quick-chat-suggestions"></div>
                <div class="quick-chat__mymarkets-panel quick-chat__floating-panel" id="quick-chat-mymarkets"></div>
                <div class="quick-chat__myitems-panel quick-chat__floating-panel" id="quick-chat-myitems"></div>
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
.quick-chat__input-wrapper{position:relative;}
.quick-chat__empty{color:#777;font-style:italic;}
.quick-chat__form-row input{flex:1;padding:4px;}
.quick-chat__form-row button{padding:4px 8px;}
.quick-chat__notice{color:#f6b26b;font-style:italic;}
.quick-chat__loader{display:block;padding:4px 0;margin-bottom:4px;font-size:11px;color:#9bd1ff;text-align:center;min-height:18px;visibility:hidden;opacity:0;transition:opacity 0.15s ease;}
.quick-chat__loader--visible{visibility:visible;opacity:1;}
.quick-chat__market-item{color:#9bd1ff;cursor:pointer;white-space:nowrap;}
.quick-chat__market-item:hover{color:#ffd27f;}
.quick-chat__market-icon,.quick-chat__personal-icon{display:inline-block;font-size:12px;text-decoration:none;}
.quick-chat__market-label,.quick-chat__personal-label{text-decoration:underline;}
.quick-chat__market-missing{color:#ff6666;font-style:italic;}
.quick-chat__floating-panel{display:none;position:absolute;left:0;right:0;top:100%;margin-top:4px;z-index:40;}
.quick-chat__mymarkets-panel{background:#141414;border:1px solid #2f2f2f;max-height:180px;overflow-y:auto;font-size:12px;box-shadow:0 2px 6px rgba(0,0,0,0.35);}
.quick-chat__mymarkets-panel--visible{display:block;}
.quick-chat__mymarkets-empty{padding:8px;color:#9bd1ff;font-style:italic;}
.quick-chat__mymarkets-item{padding:6px 8px;border-bottom:1px solid rgba(255,255,255,0.05);cursor:pointer;color:#d7d7d7;display:flex;align-items:center;gap:6px;}
.quick-chat__mymarkets-item:last-child{border-bottom:none;}
.quick-chat__mymarkets-item--active{background:#1f1f1f;color:#ffd27f;}
.quick-chat__mymarkets-item-id{font-size:11px;color:#9bd1ff;}
.quick-chat__myitems-panel{background:#141414;border:1px solid #2f2f2f;max-height:220px;overflow-y:auto;font-size:12px;box-shadow:0 2px 6px rgba(0,0,0,0.35);display:none;padding:6px 0;}
.quick-chat__myitems-panel--visible{display:block;}
.quick-chat__myitems-group{padding:4px 10px 8px;}
.quick-chat__myitems-group-title{font-weight:600;margin-bottom:4px;color:#9bd1ff;font-size:11px;text-transform:uppercase;letter-spacing:0.5px;}
.quick-chat__myitems-empty{padding:8px;color:#9bd1ff;font-style:italic;}
.quick-chat__myitems-item{padding:6px 8px;border:1px solid transparent;margin-bottom:4px;cursor:pointer;color:#d7d7d7;background:#1a1a1a;display:flex;align-items:center;gap:8px;border-radius:2px;}
.quick-chat__myitems-item:last-child{margin-bottom:0;}
.quick-chat__myitems-item--active{border-color:#ffd27f;background:#262626;color:#ffd27f;}
.quick-chat__myitems-item-thumb{width:32px;height:32px;flex-shrink:0;display:flex;align-items:center;justify-content:center;}
.quick-chat__myitems-item-thumb img{max-width:100%;max-height:100%;display:block;}
.quick-chat__myitems-item-label{flex:1;line-height:1.3;}
.quick-chat__myitems-item-text{display:block;font-weight:600;color:#e1e1e1;}
.quick-chat__myitems-item-origin{font-size:11px;color:#9bd1ff;display:block;}
.quick-chat__personal-item{color:#c2e4ff;cursor:pointer;white-space:nowrap;}
.quick-chat__personal-item .quick-chat__personal-label{text-decoration:underline;}
.quick-chat__personal-item:hover{color:#ffd27f;}
.quick-chat__personal-missing{color:#ff6666;font-style:italic;}
.quick-chat__suggestions{display:none;background:#141414;border:1px solid #2f2f2f;max-height:150px;overflow-y:auto;font-size:12px;box-shadow:0 2px 6px rgba(0,0,0,0.35);}
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

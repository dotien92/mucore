<?php
/**
* Quick Chat helpers for MUCore
*/
if (!defined('QUICK_CHAT_LOADED')) {
    define('QUICK_CHAT_LOADED', true);

    define('QUICK_CHAT_PATH', __DIR__ . '/variables_mods/quick_chat.tDB');
    define('QUICK_CHAT_SEPARATOR', '|');
    define('QUICK_CHAT_MAX_MESSAGES', 100);
    define('QUICK_CHAT_MESSAGE_LIMIT', 300);
    define('QUICK_CHAT_POST_INTERVAL', 5);

    function quick_chat_get_account_characters($account)
    {
        global $core_db;

        $account = trim((string) $account);
        if ($account === '' || !isset($core_db) || !is_object($core_db)) {
            return array();
        }

        $characters = array();
        try {
            $rs = $core_db->Execute("SELECT Name FROM Character WHERE AccountID=? ORDER BY Name", array($account));
            if ($rs) {
                while (!$rs->EOF) {
                    $fieldName = '';
                    if (isset($rs->fields['Name'])) {
                        $fieldName = $rs->fields['Name'];
                    } elseif (isset($rs->fields[0])) {
                        $fieldName = $rs->fields[0];
                    }
                    $name = trim((string) $fieldName);
                    $nameClean = preg_replace('/[^\p{L}\p{N} _\-\.]/u', '', $name);
                    if ($nameClean !== '' && !in_array($nameClean, $characters, true)) {
                        $characters[] = $nameClean;
                    }
                    $rs->MoveNext();
                }
                $rs->Close();
            }
        } catch (Exception $ex) {
            return array();
        }

        return $characters;
    }

    function quick_chat_prepare_storage()
    {
        if (!is_dir(dirname(QUICK_CHAT_PATH))) {
            return false;
        }
        if (!file_exists(QUICK_CHAT_PATH)) {
            $handle = fopen(QUICK_CHAT_PATH, 'c');
            if ($handle === false) {
                return false;
            }
            fclose($handle);
        }
        return true;
    }

    function quick_chat_get_messages($options = array())
    {
        if (!file_exists(QUICK_CHAT_PATH)) {
            return array();
        }

        if (!is_array($options)) {
            $options = array('since' => (string) $options);
        }

        $defaults = array(
            'since'  => '',
            'before' => '',
            'limit'  => null,
            'tail'   => null,
            'order'  => 'asc',
        );
        $options = array_merge($defaults, $options);

        $lines = file(QUICK_CHAT_PATH, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return array();
        }

        $tail = isset($options['tail']) ? (int) $options['tail'] : 0;
        if ($tail > 0 && count($lines) > $tail) {
            $lines = array_slice($lines, -$tail);
        }

        $sinceToken  = trim((string) $options['since']);
        $beforeToken = trim((string) $options['before']);
        $limit       = isset($options['limit']) ? (int) $options['limit'] : 0;
        $limit       = $limit > 0 ? min($limit, QUICK_CHAT_MAX_MESSAGES) : 0;

        $messages = array();
        foreach ($lines as $line) {
            $parts = explode(QUICK_CHAT_SEPARATOR, $line, 4);
            if (count($parts) < 3) {
                continue;
            }
            $timestamp = trim($parts[0]);
            if ($sinceToken !== '' && version_compare($timestamp, $sinceToken, '<=')) {
                continue;
            }
            if ($beforeToken !== '' && version_compare($timestamp, $beforeToken, '>=')) {
                continue;
            }
            $messages[] = array(
                'time'    => $timestamp,
                'author'  => isset($parts[1]) ? $parts[1] : '',
                'message' => isset($parts[2]) ? $parts[2] : '',
            );
        }

        if ($limit > 0 && count($messages) > $limit) {
            $messages = array_slice($messages, -$limit);
        }

        if (strtolower($options['order']) === 'desc') {
            $messages = array_reverse($messages);
        }

        return array_values($messages);
    }


    function quick_chat_add_message($account, $message, $ip, $display = null)
    {
        if (!quick_chat_prepare_storage()) {
            return array('success' => false, 'error' => 'storage_unavailable');
        }

        $now = microtime(true);
        if (isset($_SESSION['quick_chat_last_post']) && ($now - (float) $_SESSION['quick_chat_last_post']) < QUICK_CHAT_POST_INTERVAL) {
            return array('success' => false, 'error' => 'rate_limited');
        }

        $cleanAccount = preg_replace('/[^A-Za-z0-9_\-\.]/', '', (string) $account);
        if ($cleanAccount === '') {
            return array('success' => false, 'error' => 'invalid_user');
        }

        $display = $display !== null ? (string) $display : $cleanAccount;
        $cleanDisplay = preg_replace('/[^\p{L}\p{N} _\-\.]/u', '', $display);
        if (function_exists('mb_check_encoding') && !mb_check_encoding($cleanDisplay, 'UTF-8')) {
            $cleanDisplay = mb_convert_encoding($cleanDisplay, 'UTF-8', 'auto');
        }
        $cleanDisplay = trim($cleanDisplay);
        if ($cleanDisplay === '') {
            $cleanDisplay = $cleanAccount;
        }

        $cleanMessage = strip_tags((string) $message);
        $cleanMessage = preg_replace('/[\r\n\t]+/', ' ', $cleanMessage);
        $cleanMessage = trim($cleanMessage);
        if ($cleanMessage === '') {
            return array('success' => false, 'error' => 'empty_message');
        }
        if (strlen($cleanMessage) > QUICK_CHAT_MESSAGE_LIMIT) {
            $cleanMessage = substr($cleanMessage, 0, QUICK_CHAT_MESSAGE_LIMIT);
        }
        $cleanMessage = str_replace(QUICK_CHAT_SEPARATOR, ' ', $cleanMessage);
        if (function_exists('mb_check_encoding') && !mb_check_encoding($cleanMessage, 'UTF-8')) {
            $cleanMessage = mb_convert_encoding($cleanMessage, 'UTF-8', 'auto');
        }

        $entryTimestamp = sprintf('%.6F', $now);
        $entry = $entryTimestamp . QUICK_CHAT_SEPARATOR . $cleanDisplay . QUICK_CHAT_SEPARATOR . $cleanMessage . QUICK_CHAT_SEPARATOR . $ip;

        $handle = fopen(QUICK_CHAT_PATH, 'c+');
        if ($handle === false) {
            return array('success' => false, 'error' => 'storage_unavailable');
        }

        if (!flock($handle, LOCK_EX)) {
            fclose($handle);
            return array('success' => false, 'error' => 'storage_unavailable');
        }

        $lines = array();
        while (($line = fgets($handle)) !== false) {
            $lines[] = rtrim($line, "\r\n");
        }

        $lines[] = $entry;
        if (count($lines) > QUICK_CHAT_MAX_MESSAGES) {
            $lines = array_slice($lines, -QUICK_CHAT_MAX_MESSAGES);
        }

        ftruncate($handle, 0);
        rewind($handle);
        fwrite($handle, implode("\n", $lines) . "\n");
        fflush($handle);
        flock($handle, LOCK_UN);
        fclose($handle);

        $_SESSION['quick_chat_last_post'] = $now;

        return array('success' => true, 'timestamp' => $entryTimestamp);
    }
}

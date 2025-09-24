<?php 
function GetCurURLDir($url) {
    // note: anything without a scheme ("example.com", "example.com:80/", etc.) is a folder
    // remove query (protection against "?url=http://example.com/")
    if ($first_query = strpos($url, '?')) $url = substr($url, 0, $first_query);
    // remove fragment (protection against "#http://example.com/")
    if ($first_fragment = strpos($url, '#')) $url = substr($url, 0, $first_fragment);
    // folder only
    $last_slash = strrpos($url, '/');
    if (!$last_slash) {
        return '/';
    }
    // add ending slash to "http://example.com"
    if (($first_colon = strpos($url, '://')) !== false && $first_colon + 2 == $last_slash) {
        return $url . '/';
    }
    return substr($url, 0, $last_slash + 1);
}

function GetParentDirURL($url) {
    // note: parent of "/" is "/" and parent of "http://example.com" is "http://example.com/"
    // remove filename and query
    $url = GetCurURLDir($url);
    // get parent
    $len = strlen($url);

    return GetCurURLDir(substr($url, 0, $len && $url[ $len - 1 ] == '/' ? -1 : $len));
    
}
function GetCurURL($use_forwarded_host = false) { 
    $ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? true : false;
    $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $_SERVER['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = ($use_forwarded_host && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $_SERVER['SERVER_NAME'] . $port;
    return $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
};

$siteURL = preg_replace('{/$}', '', GetParentDirURL(GetCurURL()));// Removing a forward-slash from the tail-end of an URL

require ('../config.php');

require ('../engine/core.php');

require ('../engine/global_config.php');

require ('../engine/global_functions.php');

require ("../engine/adodb/adodb.inc.php");

if ($core['debug'] == '1') {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}
else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
}

$core['version'] = crypt_it($engine, '', '1'); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>Install Mucore 1.0.8 by MaryJo & Trong</title><style type="text/css"><!--
body{background:#FFF;color:#000;font:11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;margin:0;padding:0}
a{text-decoration:underline;color:#333}
a:hover{text-decoration:none;color:#333}
.border_big a{text-decoration:none;color:#CCC}
.border_big a:hover{text-decoration:underline;color:#CCC}
.nav_table a:link,.nav_table a:visited,nav_table a:active{text-decoration:none}
.nav_table a:hover{text-decoration:none}
.cat{background:#465786;color:#FFF;font:bold 10pt verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:2px}
.border{background:#F2F2F2;color:#000;border:outset 1px #DEE0E2}
.border_big{background:#F2F2F2;color:#000;border-right:outset 1px #DEE0E2}
.cat_big{background:#333;color:#FFF;font:bold 12px verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:3px;box-shadow:0 1px 5px #000}
.left_table{color:#000;padding:5px}
.nav_table{background:#DEE0E2;color:#CCC;box-shadow:0 1px 5px #000}
.nav_title{text-align:center;background:#333;color:#CCC;font:bold 12px verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:5px}
.nav_title_sub{background:#fff;color:#FFF;padding:4px;padding-left:5px;box-shadow:0 1px 5px #000}
.nav_title_sub:hover{background:#F8F8F8;color:#FFF;padding:4px;padding-left:3px}
input,option,select,textarea{font:bold 11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif}
.smallfont{font:10px verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif}
.curent_version{font:11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif}
.last_version a{font:11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;text-decoration:underline}
.module_title{background:#EFEFEF;font:bold 14px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;color:#7C7C7C;padding:2px;border:inset 1px #DEE0E2;box-shadow:0 1px 5px #000}
.table_panel{background:#fff;color:#000;border:outset 1px #DEE0E2;box-shadow:0 1px 5px #000;width: 688px;}
.panel_title{background:#333;color:#FFF;font:bold 10pt verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:5px;box-shadow:0 1px 5px #000}
.panel_title_sub{background:#CCC;font:bold 11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:3px;padding-left:4px;color:#595959;box-shadow:0 1px 1px #000}
.panel_title_sub2{background:#B0BDD3;font:bold 11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:2px;padding-left:4px;color:#595959;border:outset 1px #666}
.panel_text_alt1{height:20px;padding:8px 8px 8px 4px}
.panel_text_area{padding:10px}
.panel_text_alt2{height:20px;padding:8px 8px 8px 4px}
.panel_text_alt_list{height:20px;color:#666;padding:8px 8px 8px 4px}
.panel_buttons{background:#EEE;padding:8px;border-top:outset 1px #666}
input[type="radio"]{border:0}
.even{background:#EAEAEA}
a.info_l{text-decoration:none;cursor:default}
a.info_l:hover{text-decoration:none}
.info_show{background-color:#fff;padding:5px 10px;border:1px solid #999;width:130px;position:absolute;filter:progid:DXImageTransform.Microsoft.Shadow(color="#777777",Direction=135,Strength=3);z-index:10000}
.rss_feed{background:url(arrow.gif) no-repeat left;padding-left:18px;line-height:23px;font-size:12px}
--></style></head><body><?php

if (!isset($_GET['step'])) {
    $step_proccess = 'Preparing to Install';
}
else {
    $step_count = safe_input($_GET['step'], '\_');
    $step_count = substr_replace($step_count, "", 0, -1);
    $step_proccess = 'Step (' . $step_count . '/7)';
} ?><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border_big"><tr> <td class="cat_big"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> <tr> <td align="left" class="curent_version"><b>MUCore Version <?php echo $core['version'] ?> by MaryJo & Trong</b></td> <td align="right"><?php echo $step_proccess; ?></td> </tr>  <tr> <td align="left">&nbsp;</td> <td align="right">&nbsp;</td> </tr> </table> </td></tr></table><div align="center" style="margin-top: 40px; margin-bottom: 40px;"><?php

if (!isset($_GET['step'])) {
    include ('step.php');

}
else {
    $step = safe_input($_GET['step'], '\_');
    if (is_file($step . '.php')) {
        include ($step . '.php');

    }
    else {
        echo '' . $step . ' not found';
    }
} ?></div></body></html>
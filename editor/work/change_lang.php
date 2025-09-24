<?php
require_once('session.php');

$lang_id = $_REQUEST['lang_id'];
if(strlen($lang_id)>1)
    $_SESSION['lang'] = $lang_id;

$lang_load = $_REQUEST['lang_load'];
if(strlen($lang_load)>1)
    $_SESSION['load_txt_lang'] = $lang_load;

$lang_save = $_REQUEST['lang_save'];
if(strlen($lang_save)>1)
    $_SESSION['save_txt_lang'] = $lang_save;
?>
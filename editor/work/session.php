<?php

error_reporting(E_ALL ^ E_NOTICE); /* Dao Van Trong - Trong.CF */


if(session_id() == "") session_start(); 

if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
}
else{
    $_SESSION['lang'] = 'en';
    $lang = "en";
}

if(isset($_SESSION['load_txt_lang'])){
    $load_txt_lang = $_SESSION['load_txt_lang'];
}
else{
    $_SESSION['load_txt_lang'] = 'EUC-KR';
    $load_txt_lang = "EUC-KR";
}

if(isset($_SESSION['save_txt_lang'])){
    $save_txt_lang = $_SESSION['save_txt_lang'];
}
else{
    $_SESSION['save_txt_lang'] = 'EUC-KR';
    $save_txt_lang = "EUC-KR";
}
?>
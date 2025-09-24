<?php
$file    = $_REQUEST['file'];
$ext     = $_REQUEST['formato'];

$path_file = "../archivos/bmd/";
$fp = fopen($path_file.$file.".".$ext,"w+");
fwrite($fp, $_REQUEST['datos']);
fclose($fp);
?>OK
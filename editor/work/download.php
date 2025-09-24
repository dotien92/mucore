<?php
include("funciones.php");
$file    = $_REQUEST['file'];
$archivo = $_REQUEST['archivo'];
$tipo    = $_REQUEST['tipo'];
$backup  = $_REQUEST['backup'];

if(strlen($backup)>2){
    $tipo  = $backup;
    $file .= ".".$backup;
}
$contenido = abrir("../archivos/bmd/".$file);
header("Content-Type: application/octet-stream");
header("Content-Length: " . strlen($contenido));
header("Content-Disposition: attachment; filename=\"".$archivo.".".$tipo."\"");
print($contenido);
?>
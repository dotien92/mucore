<?php
include("funciones.php");
include("../config.php");
$file    = $_REQUEST['file'];
$archivo = $_REQUEST['archivo'];

$contenido = DecoEncoDat(abrir($path_bmd.$file));

header("Content-Type: application/octet-stream");
header("Content-Length: " . strlen($contenido));
header("Content-Disposition: attachment; filename=\"".$archivo."\"");
print($contenido);
?>

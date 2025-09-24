<?php
require_once('session.php');

$archivo    = $_REQUEST['archivo'];
$file        = $_REQUEST['file'];

include("funciones.php");
include("../config.php");

if($archivo=="IBSCategory")
    $resultado = parse_cashshop_category($path_bmd.$file);
if($archivo=="IBSPackage")
    $resultado = parse_cashshop_package($path_bmd.$file);
if($archivo=="IBSProduct")
    $resultado = parse_cashshop_product($path_bmd.$file);

header("Content-Type: application/octet-stream");
header("Content-Length: " . strlen($resultado));
header("Content-Disposition: attachment; filename=\"".$archivo.".txt\"");
print($resultado);
?>
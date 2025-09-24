<?php
include("funciones.php");
include("../config.php");
$archivo = $_REQUEST['archivo'];
$file    = $_REQUEST['file'];
$map     = $_REQUEST['map'];
    
if($archivo == "EncTerrain"){
    $contenido = DecodeATT(abrir($path_bmd.$file));
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . strlen($contenido));
    header("Content-Disposition: attachment; filename=\"DecTerrain.att\"");
    print($contenido);

}
if($archivo == "DecTerrain"){
    $original   = abrir($path_bmd.$file);
    $origmap    = chr(0).$original;
    $origmap[1] = chr($map);
    
    $contenido  = EncodeATT($origmap);
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . strlen($contenido));
    header("Content-Disposition: attachment; filename=\"EncTerrain".$map.".att\"");
    print($contenido);
}
?>
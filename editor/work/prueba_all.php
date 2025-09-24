<?php
include("funciones.php");
$contenido = abrir("../archivos/bmd/Minimap.bmd");
$largo     = strlen($contenido);
$decode       = "   ";
for($i=0;$i<$largo;$i++){
    $decode[$i] = decoBmd2(0, substr($contenido, $i, 1), $i, 1, 0);
}

$fp = fopen("Minimap.bmd","w+");
fwrite($fp, $decode);
fclose($fp);
?>
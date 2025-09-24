<?php
require_once('session.php');

$file    = $_REQUEST['file'];
$archivo = $_REQUEST['archivo'];
include("funciones.php");
$prueba1 = str_replace("\\\\\\\"", "", $_REQUEST['dato2']);
$lDatos2 = JDecode(str_replace("\\", "", $prueba1));
$prueba2 = str_replace("\\\\\\\"", "", $_REQUEST['dato3']);
$lDatos3 = JDecode(str_replace("\\", "", $prueba2));

$id    = $_REQUEST['id'];
$cc1    = $_REQUEST['cc1'];
$cc2    = $_REQUEST['cc2'];
$cc3    = $_REQUEST['cc3'];
$cc4    = $_REQUEST['cc4'];

$archivo = version_file($archivo, $file);
include("../config.php");
$contenido = abrir($path_bmd.$file);
//echo $archivo."---".$conf[1]."---";

$arrastre = ($conf[2] * $id + $conf[3] + ($id + 1) * $conf[6]) % 3;
$dato       = encoBmd2($col[0][1], $cc1, $id * $conf[1] + $col[0][2], $col[0][3], $arrastre);
for($j=0;$j<$col[0][3];$j++)
    $contenido[$id * $conf[1] + $col[0][2] + $j] = chr($dato[$j]);

$dato     = encoBmd2($col[1][1], $cc2, $id * $conf[1] + $col[1][2], $col[1][3], $arrastre);
for($j=0;$j<$col[1][3];$j++)
    $contenido[$id * $conf[1] + $col[1][2] + $j] = chr($dato[$j]);

$dato      = encoBmd2($col[2][1], $cc3, $id * $conf[1] + $col[2][2], $col[2][3], $arrastre);
for($j=0;$j<$col[2][3];$j++)
    $contenido[$id * $conf[1] + $col[2][2] + $j] = chr($dato[$j]);

$texto       = iconv( "UTF-8",$save_txt_lang, stripcslashes($cc4));
$dato      = encoBmd2(0, $texto, $id * $col[3][1] + $i * $conf[2], strlen($texto), $conf[2] * $id + $conf[3]);

for($j=0;$j<count($dato);$j++)
    $contenido[$id * $conf[1] + $col[3][2] + $j] = chr($dato[$j]);
for($j=count($dato);$j<$col[3][3];$j++){
    $valor_e = encoBmd2( 1,chr(0), $id * $col[3][1] + $i * $conf[2] + $j, 1, $conf[2] * $id + $conf[3]);
    $contenido[$id * $conf[1] + $col[3][2] + $j] = pasarHex($valor_e[0],1);
}

if($conf2[6]==1) $contenido2 = substr($contenido, $conf2[9] + $conf2[7] * $id, $conf2[8]);
$limit = strlen($contenido2)/$conf2[1];
for($i=0;$i<$limit;$i++){
    $posicion = $i * $conf2[1];
    $arrastre = $conf2[2] * $i + $conf2[3];
    for($h = 0;$h < count($col2); $h++){
        $l_dato2 = encoBmd2( 1,$lDatos2[$i]["o".$h], $posicion + $col2[$h][2], $col2[$h][3], $arrastre);
        for($j=0;$j<$col2[$h][3];$j++)
            $contenido2[$posicion + $col2[$h][2] + $j] = chr($l_dato2[$j]);
        for($j=0;$j<$conf2[8];$j++)
            $contenido[$conf2[9] + $conf2[7] * $id + $j] = $contenido2[$j];
    }
}

if($conf3[6]==1) $contenido3 = substr($contenido, $conf3[9] + $conf3[7] * $id, $conf3[8]);
$limit = strlen($contenido3)/$conf3[1];
for($i=0;$i<$limit;$i++){
    $posicion = $i * $conf3[1];
    $arrastre = $conf3[2] * $i + $conf3[3];
    for($h = 0;$h < count($col3); $h++){
        $l_dato3 = encoBmd2( 1,$lDatos3[$i]["o".$h], $posicion + $col3[$h][2], $col3[$h][3], $arrastre);
        for($j=0;$j<$col3[$h][3];$j++)
            $contenido3[$posicion + $col3[$h][2] + $j] = chr($l_dato3[$j]);
        for($j=0;$j<$conf3[8];$j++)
            $contenido[$conf3[9] + $conf3[7] * $id + $j] = $contenido3[$j];
    }
}

$fp = fopen($path_bmd.$file,"w+");
fwrite($fp, $contenido);
fclose($fp);
//echo $_REQUEST['dato2'];
echo "OK";
?>
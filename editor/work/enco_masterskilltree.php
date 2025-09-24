<?php
require_once('session.php');

$file    = $_REQUEST['file'];
$archivo = $_REQUEST['archivo'];
include("funciones.php");
$prueba2 = str_replace("\\\\\\\"", "", $_REQUEST['dato2']);
$lDatos2 = JDecode(str_replace("\\", "", $prueba2));
$prueba3 = str_replace("\\\\\\\"", "", $_REQUEST['dato3']);
$lDatos3 = JDecode(str_replace("\\", "", $prueba3));

$archivo = version_file($archivo, $file);
include("../config.php");
$contenido = abrir($path_bmd.$file);

    if($conf[6]==1) {
        $start = $lDatos3[0]["e"];
        $auxiliar = $contenido;
        $contenido = substr($contenido, $conf[9] + $conf[7] * $start, $conf[8]);
    }
    $maximo = 0;
    for($i=0;$i<count($lDatos3);$i++){
        $posicion  = $lDatos3[$i]["i"]* $conf[1];
        $arrastre = $conf[2] * $lDatos3[$i]["i"] + $conf[3];
        for($h = 0;$h < count($col); $h++){
            if($col[$h][1]==0)
                $lDatos3[$i]["o".$h] = iconv( "UTF-8", $save_txt_lang, $lDatos3[$i]["o".$h]);
            $dato =    encoBmd2(
                    $col[$h][1], 
                    $lDatos3[$i]["o".$h], 
                    $posicion+$col[$h][2], 
                    $col[$h][3],
                    $arrastre);
            for($j=0;$j<$col[$h][3];$j++)
                $contenido[$posicion+$col[$h][2] + $j] = chr($dato[$j]);
        }
    }
    if($conf[6]==1){
        for($j=0;$j<$conf[8];$j++)
            $auxiliar[$conf[9] + $conf[7] * $start + $j] = $contenido[$j];
        $contenido = $auxiliar;
    }

    for($i=0;$i<count($lDatos2);$i++){
        $posicion  = $lDatos2[$i]["i"]* $conf2[1];
        $arrastre = $conf2[2] * $lDatos2[$i]["i"] + $conf2[3];
        for($h = 0;$h < count($col2); $h++){
            if($col2[$h][1]==0)
                $lDatos2[$i]["o".$h] = iconv( "UTF-8", $save_txt_lang, $lDatos2[$i]["o".$h]);
            $dato =    encoBmd2(
                    $col2[$h][1], 
                    $lDatos2[$i]["o".$h], 
                    $posicion+$col2[$h][2], 
                    $col2[$h][3],
                    $arrastre);
            for($j=0;$j<$col2[$h][3];$j++)
                $contenido[$posicion+$col2[$h][2] + $j] = chr($dato[$j]);
        }
    }

$fp = fopen($path_bmd.$file,"w+");
fwrite($fp, $contenido);
fclose($fp);
echo "OK";
?>
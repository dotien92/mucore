<?php
require_once('session.php');

$archivo = $_REQUEST['archivo'];
$file    = $_REQUEST['file'];
$dato     = $_REQUEST['dato'];
$id     = $_REQUEST['id'];

include("funciones.php");
$archivo = version_file($archivo, $file);
include("../config.php");
$contenido = abrir("../archivos/bmd/".$file);
$largo     = strlen($contenido);

if($dato=="lista2"){
    $start = 0;
    $etapa = 0;
    $limit = ($_REQUEST["limit"] == null)? intval((strlen($contenido)) / $conf2[1]) : $start + $_REQUEST["limit"];
    $r         = "";
    for($i=$start;$i<$limit;$i++){
        $posicion = $i * $conf2[1];
        $arrastre = $conf2[2] * $i + $conf2[3];
        $t        = "";
        for($h = 0;$h < count($col2); $h++){
            $pasar = array();
            for($j=0;$j<$col2[$h][3];$j++)
                $pasar[$j] = substr($contenido, $posicion + $col2[$h][2] + $j, 1);
            $dato = decoBmd2($col2[$h][1], $pasar, $posicion+$col2[$h][2], $col2[$h][3], $arrastre);
            $t .= "o".$h.":".$dato.",";
        }
        $r .= "{e:".$etapa.",i:".$i.",".substr_replace($t, '', -1)."},\n";
    }
    echo  '{"datos": ['.substr_replace ($r, '', -2).']}';
}
elseif($dato=="lista3"){
    $start = ($_REQUEST["start"] == null)? 0 : $_REQUEST["start"];
    if($conf[6]==1){
        $contenido = substr($contenido, $conf[9] + $conf[7] * $start, $conf[8]);
        $etapa = $start;
        $start = 0;
    }
    else
        $etapa = 0;
    $limit = ($_REQUEST["limit"] == null)? intval((strlen($contenido)) / $conf[1]) : $start + $_REQUEST["limit"];
    $r         = "";
    for($i=$start;$i<$limit;$i++){
        $posicion = $i * $conf[1];
        $arrastre = $conf[2] * $i + $conf[3];
        $t        = "";
        for($h = 0;$h < count($col); $h++){
            $pasar = array();
            for($j=0;$j<$col[$h][3];$j++)
                $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
            $dato = decoBmd2($col[$h][1], $pasar, $posicion+$col[$h][2], $col[$h][3], $arrastre);
            $t .= "o".$h.":".$dato.",";
        }
        $r .= "{e:".$etapa.",i:".$i.",".substr_replace($t, '', -1)."},\n";
    }
    echo  '{"datos": ['.substr_replace ($r, '', -2).']}';
}?>
<?php
require_once('session.php');

$archivo = $_REQUEST['archivo'];
$file    = $_REQUEST['file'];
$dato     = $_REQUEST['dato'];
$id     = $_REQUEST['id'];

include("funciones.php");
require_once ("BinaryParser.php");
$archivo = version_file($archivo, $file);
include("../config.php");
$contenido = abrir("../archivos/bmd/".$file);
$largo     = strlen($contenido);

if($dato=="lista"){
    $cant   = $largo / $conf[1];
    $r        = "";

    for($i=0;$i<$cant;$i++){
        $r .= "{e:0,i:".$i.",o0:'".addslashes(iconv($load_txt_lang, "UTF-8", decoBmd2(0, substr($contenido, $i * $conf[1] + $col[3][2], $col[3][3]), $id * $col[3][1] + $i * $conf[2], $col[3][3], $conf[2] * $id + $conf[3])))."'},\n";
    }
    echo  '{"datos": ['.substr_replace ($r, '', -2).']}';
}
elseif($dato=="datos"){
    $arrastre = $conf[2] * $id + $conf[3] + ($id + 1) * $conf[6];
    $r    = $id;
    $r    .= "|".decoBmd2(1, substr($contenido, $id * $conf[1] + $col[0][2], $col[0][3]), $id * $conf[1] + $i * $conf[2] + $col[0][2], $col[0][3], $arrastre);
    $r    .= "|".decoBmd2(1, substr($contenido, $id * $conf[1] + $col[1][2], $col[1][3]), $id * $conf[1] + $i * $conf[2] + $col[1][2], $col[1][3], $arrastre);
    $r    .= "|".decoBmd2(1, substr($contenido, $id * $conf[1] + $col[2][2], $col[2][3]), $id * $conf[1] + $i * $conf[2] + $col[2][2], $col[2][3], $arrastre);
    $r    .= "|".iconv($load_txt_lang, "UTF-8", decoBmd2(0, substr($contenido, $id * $conf[1] + $col[3][2], $col[3][3]), $id * $col[3][1] + $i * $conf[2], $col[3][3], $conf[2] * $id + $conf[3]));
    echo $r;
}
elseif($dato=="lista2"){
    $r    = "";

    if($id=='NUEVO'){
        for($j=0;$j<15;$j++){
            $r .= "{e:0,i:".$j.",o0: 0,o1: 0,o2: 0,o3: 0,o4: 0,o5: 0,o6: 0,o7: 0,o8: 0,o9: 0,o10: 0,o11: 0,o12: 0,o13: 0,o14: 0,o15: 0,o16: 0,o17: 0},\n";
        }
    }
    else{
        if($conf2[6]==1) $contenido = substr($contenido, $conf2[9] + $conf2[7] * $id, $conf2[8]);
        $limit = strlen($contenido)/$conf2[1];
        for($i=0;$i<$limit;$i++){
            $posicion = $i * $conf2[1];
            $arrastre = $conf2[2] * $i + $conf2[3];
            $t        = "";
            for($h = 0;$h < count($col2); $h++){
                $pasar = array();
                for($j=0;$j<$col2[$h][3];$j++)
                    $pasar[$j] = substr($contenido, $posicion + $col2[$h][2] + $j, 1);
                $dato = decoBmd2($col2[$h][1], $pasar, $posicion+$col2[$h][2], $col2[$h][3], $arrastre);
                if($col2[$h][1]==0)
                    $dato = "'".addslashes(iconv($load_txt_lang, "UTF-8", $dato))."'";
                $t .= "o".$h.":".$dato.",";
            }
            $r .= "{e:".$i.",i:".$i.",".substr_replace($t, '', -1)."},\n";
        }
    }
    echo  '{"datos": ['.substr_replace ($r, '', -2).']}';
}
elseif($dato=="lista3"){
    $r    = "";

    if($id=='NUEVO'){
        for($j=0;$j<15;$j++){
            $r .= "{e:0,i:".$j.",o0: 0,o1: 0,o2: 0,o3: 0,o4: 0,o5: 0,o6: 0,o7: 0},\n";
        }
    }
    else{
        if($conf3[6]==1) $contenido = substr($contenido, $conf3[9] + $conf3[7] * $id, $conf3[8]);
        $limit = strlen($contenido)/$conf3[1];
        for($i=0;$i<$limit;$i++){
            $posicion = $i * $conf3[1];
            $arrastre = $conf3[2] * $i + $conf3[3];
            $t        = "";
            for($h = 0;$h < count($col3); $h++){
                $pasar = array();
                for($j=0;$j<$col3[$h][3];$j++)
                    $pasar[$j] = substr($contenido, $posicion + $col3[$h][2] + $j, 1);
                $dato = decoBmd2($col3[$h][1], $pasar, $posicion+$col3[$h][2], $col3[$h][3], $arrastre);
                if($col3[$h][1]==0)
                    $dato = "'".addslashes(iconv($load_txt_lang, "UTF-8", $dato))."'";
                ($col3[$h][1]==1 && $col3[$h][7]==1) ? ($t .= "o".$h.":".neg_simple($col3[$h][1],$dato,$col3[$h][3]).",") : ($t .= "o".$h.":".$dato.",");
            }
            $r .= "{e:".$i.",i:".$i.",".substr_replace($t, '', -1)."},\n";
        }
    }
    echo  '{"datos": ['.substr_replace ($r, '', -2).']}';
}?>
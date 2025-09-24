<?php
require_once('session.php');

$archivo = $_REQUEST['archivo'];
$file    = $_REQUEST['file'];
$file2   = $_REQUEST['file2'];

    include("funciones.php");
    $archivo_orig = $archivo;
    $archivo = version_file($archivo, $file2);
    include("../config.php");

    if($archivo=="item"){
        $contenido = abrir($path_bmd.$file2);
        $d_extras = parse_txt($path_bmd.$file);
        
        $conversion1 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 7, 11 => 8, 12 => 12, 13 => 14, 14 => 15, 15 => 16, 17 => 17, 18 => 18, 19=> 19, 20 => 20, 21 => 21, 16 => 22, 22 => 29, 23 => 30, 24 => 31, 25 => 32, 26 => 33, 27 => 34, 28 => 35);
        $conversion2 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 11 => 9, 10 => 10, 12 => 14, 13 => 23, 14 => 17, 15 => 18, 16 => 19, 17 => 20, 18 => 21, 19 => 29, 20 => 30, 21 => 31, 22 => 32, 23 => 33, 24 => 34, 25 => 35);
        $conversion3 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 10, 11 => 14, 12 => 23, 13 => 19, 14 => 17, 15 => 18, 16 => 21, 17 => 28, 18 => 30, 19 => 31, 20 => 32, 21 => 33, 22 => 34);
        $conversion4 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 14, 11 => 36, 12 => 37, 13 => 38, 14 => 39, 15 => 40, 16 => 41, 17 => 42, 18 => 29, 19 => 30, 20 => 31, 21 => 32, 22 => 33, 23 => 34);
        $conversion5 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 24);
        $conversion6 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 24, 10 => 24, 11 => 19, 12 => 28, 13 => 30, 14 => 31, 15 => 32, 16 => 33, 17 => 34, 18 => 35);
        for($k=0;$k<16;$k++){
            for($i=0;$i<512;$i++){
                $posicion = ($k * 512 + $i) * $conf[1];
                if($k<6 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion1 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k>=6 && $k<12 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion2 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==12 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion3 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==13 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion4 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==14 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion5 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==15 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion6 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }

            }
        }
    }
    if($archivo=="items6"){
        $contenido = abrir($path_bmd.$file2);
        $d_extras = parse_txt($path_bmd.$file);
        
        $conversion1 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 7, 11 => 8, 12 => 12, 13 => 14, 14 => 15, 15 => 16, 17 => 17, 18 => 18, 19=> 19, 20 => 20, 21 => 21, 16 => 22, 23 => 27, 24 => 28, 25 => 29, 26 => 30, 27 => 31, 28 => 32, 29=> 33, 22=> 26);
        $conversion2 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 11 => 9, 10 => 10, 12 => 14, 13 => 22, 14 => 17, 15 => 18, 16 => 19, 17 => 20, 18 => 21, 19 => 26, 20 => 27, 21 => 28, 22 => 29, 23 => 30, 24 => 31, 25 => 32, 26 => 33);
        $conversion3 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 10, 11 => 14, 12 => 22, 13 => 19, 14 => 17, 15 => 18, 16 => 21, 17 => 25, 18 => 27, 19 => 28, 20 => 29, 21 => 30, 22 => 31, 23 => 32, 24 => 33);
        $conversion4 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 14, 11 => 34, 12 => 35, 13 => 36, 14 => 37, 15 => 38, 16 => 39, 17 => 40, 18 => 26, 19 => 27, 20 => 28, 21 => 29, 22 => 30, 23 => 31, 24 => 32, 25 => 33);
        $conversion5 = array(8 => 0, 9 => 23, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 2);
        $conversion6 = array(8 => 0, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6, 10 => 22, 11 => 19, 12 => 25, 13 => 27, 14 => 28, 15 => 29, 16 => 30, 17 => 31, 18 => 32, 19 => 33);
        for($k=0;$k<16;$k++){
            for($i=0;$i<512;$i++){
                $posicion = ($k * 512 + $i) * $conf[1];
                if($k<6 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion1 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k>=6 && $k<12 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion2 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==12 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion3 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==13 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion4 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==14 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion5 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }
                if($k==15 && strlen($d_extras[$k][$i][8])>2){
                    foreach($conversion6 AS $key => $value){
                        $dato =    encoBmd2($col[$value][1], $d_extras[$k][$i][$key], $col[$value][2], $col[$value][3], 0);
                        for($j=0;$j<$col[$value][3];$j++) $contenido[$posicion + $col[$value][2] + $j] = chr($dato[$j]);
                    }
                }

            }
        }
    }
    
    $nec_crc = ver_crc($archivo, $contenido);
    if($nec_crc!="no"){
        $size = strlen($contenido);
        $contenido = substr($contenido, 0, $size - 4).$nec_crc;
    }
    $file = substr_replace($file, '', -4);

    header("Content-Type: application/octet-stream");
    header("Content-Length: " . strlen($contenido));
    header("Content-Disposition: attachment; filename=\"".$archivo_orig.".bmd\"");
    print($contenido);
?>
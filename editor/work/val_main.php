<?php
include("funciones.php");
$save = $_REQUEST['save'];
$main = $_REQUEST['main'];
$ver  = $_REQUEST['ver'];
$ser  = $_REQUEST['ser'];
$ip   = $_REQUEST['ip'];
$port = $_REQUEST['port'];

include("../config.php");
$contenido = abrir($path_main.$main);
$ver_ser = stripos($contenido, 'ip address');

if($save == "ok"){
    for($i=0;$i<5;$i++)
        $contenido[$ver_ser-132+$i] = $ver[$i];
    for($i=0;$i<16;$i++)
        $contenido[$ver_ser-124+$i] = $ser[$i];
    $ver_ip  = stripos($contenido, 'connection.muonline.com.tw');
    if($ver_ip<1){
        $ver_ip  = stripos($contenido, 'findhack');
        if($var_ip>0){
            for($i=0;$i<50;$i++)
                if($i<strlen($ip))
                    $contenido[$ver_ip - 400 + $i] = $ip[$i];
                else
                    $contenido[$ver_ip - 400 + $i] = chr(0);
        }
    }
    else{
        for($i=0;$i<50;$i++)
            if($i<strlen($ip))
                $contenido[$ver_ip - 100 + $i] = $ip[$i];
            else
                $contenido[$ver_ip - 100 + $i] = chr(0);
    }
    $ver_port = stripos($contenido, 'AVCUIMercenaryInputBox');
    $port      = pasarHex($port, 2);
    for($i=0;$i<2;$i++)
        $contenido[$ver_port + 30 + $i] = $port[$i];
    
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . strlen($contenido));
    header("Content-Disposition: attachment; filename=\"".$main."\"");
    print($contenido);
}
else{
    $version = substr($contenido, $ver_ser - 132, 5);
    $serial  = substr($contenido, $ver_ser - 124, 16);
    $ver_ip  = stripos($contenido, 'findhack');
    $ip      = substr($contenido, $ver_ip - 400, 50);
    $ver_port= stripos($contenido, 'AVCUIMercenaryInputBox');
    $port     = substr($contenido, $ver_port + 30, 2);
    $port     = cantidad($port, 0, 2);
    if($ver_ip<1){
        $ver_ip  = stripos($contenido, 'connection.muonline.com.tw');
        $ip      = substr($contenido, $ver_ip - 100, 50);
    }
    $ip = trim($ip);
    echo $main."|".$version."|".$serial."|".$ip."|".$port;
}
?>

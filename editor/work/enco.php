<?php
require_once('session.php');

$archivo = $_REQUEST['archivo'];
$file    = $_REQUEST['file'];
$extra   = $_REQUEST['extra'];

include("funciones.php");
$prueba1 = str_replace("\\\\\\\"", "", $_REQUEST['datos']);
$lDatos  = orderArray(JDecode(str_replace("\\", "", $prueba1)),o0);
include("../config.php");
$path_file=$path_bmd;
$contenido = abrir($path_file.$file);

if($archivo=="text"){
    $ext    = ".bmd";
    $largo    = strlen($contenido);
    $limit    = cantidad( $contenido, 2, 4);
    $inicio    = 6;
    $h        = 0;
    $i        = 0;
    $cTexto    = array();
    $modificar    = $lDatos[$h]["o0"];
    $salvar    = substr($contenido, 0, 6);
    while($inicio<$largo){
        $lTexto   = cantidad( $contenido, $inicio + 4, 4);
        if($modificar==$i){
            $dato = iconv( "UTF-8", $save_txt_lang, $lDatos[$h]["o1"]);
            $arrastre = (1 - $inicio) % 3;
            $salvar .= pasarHex($i,4);
            $salvar .= pasarHex(strlen($dato),4);
            $salvar .= encoBmd3($dato, $inicio + 2,$arrastre);
            $h++;
            $modificar = $lDatos[$h]["o0"];
        }
        else{
            $salvar  .= substr($contenido, $inicio, $lTexto + 8);
        }
        $inicio  += $lTexto + 8;
        $i          = cantidad( $contenido, $inicio, 4);
    }
    $contenido = $salvar;
}
elseif($archivo=="NpcName"){
    $ext    = ".txt";
    $salvar    = "";
    for($i=0;$i<count($lDatos);$i++){
        $salvar .= $lDatos[$i]["o0"]."\t".$lDatos[$i]["o1"]."\t".$lDatos[$i]["o2"]."\r\n";
    }
    $contenido = $salvar;
}
elseif($archivo=="message"){
    $ext        = ".wtf";
    $inicio     = 28;
    $cuantos    = cantidad( $contenido, 24, 4);
    $h        = 0;
    $modificar    = $lDatos[$h]["i"];
    $salvar    = substr($contenido, 0, 28);
    for($i=0;$i<$cuantos;$i++){
        if($modificar==$i){
            $dato = iconv( "UTF-8", $save_txt_lang, $lDatos[$h]["o2"]);
            $salvar .= pasarHex($lDatos[$h]["o0"],1);
            $salvar .= pasarHex($lDatos[$h]["o1"],1);
            $lTexto  = strlen($dato);
            $salvar .= pasarHex($lTexto,2);
            $salvar .= decoWtf($dato, $lTexto);
            $lTexto = cantidad( $contenido, $inicio + 2, 2);
            $h++;
            $modificar = $lDatos[$h]["i"];
        }
        else{
            $dato1  = cantidad( $contenido, $inicio, 1);
            $dato2  = cantidad( $contenido, $inicio + 1, 1);
            $lTexto = cantidad( $contenido, $inicio + 2, 2);
            $salvar .= substr($contenido, $inicio, $lTexto + 4);
        }
        $inicio  += $lTexto + 4;
    }
    $contenido = $salvar;
}
elseif($archivo=="QuestWords"){
    $ext       = ".bmd";
    $largo     = strlen($contenido);
    $h           = 0;
    $modificar = $lDatos[$h]["i"];
    $i         = 0;
    $inicio    = 0;

    while($inicio<$largo){
        for($j=0;$j<2;$j++)
            $pasar2[$j] = substr($contenido, $inicio + 4 + $j, 1);
        $lTexto   = decoBmd2(1, $pasar2, 4, 2, 0);
        if($modificar==$i){
            $dato = iconv( "UTF-8", $save_txt_lang, $lDatos[$h]["o1"]);
            $temp1   = encoBmd2( 1,$lDatos[$h]["o0"].chr(0).chr(0).chr(0), 0, 4, 0);
            $salvar .= pasarHex($temp1[0],1).pasarHex($temp1[1],1).pasarHex($temp1[2],1).pasarHex($temp1[3],1);
            $elTexto = strlen($dato) + 1;
            $temp2   = encoBmd2( 1,$elTexto, 4, 2, 0);
            $salvar .= pasarHex($temp2[0],1).pasarHex($temp2[1],1);
            $valor_e = encoBmd2( 1,chr(0), $elTexto - 1, 1, 0);
            $salvar .= encoBmd3($dato, 0,0).pasarHex($valor_e[0],1);
            $h++;
            $modificar = $lDatos[$h]["i"];
            
        }
        else{
            $salvar .= substr($contenido, $inicio, $lTexto + 6);
        }
        $inicio += $lTexto + 6;
        $i++;
    }
    $contenido = $salvar;
}
elseif($archivo=="ServerList"){
    $ext    = ".bmd";
    $inicio = 0;
    $largo  = strlen($contenido);
    $h        = 0;
    $modificar = $lDatos[$h]["i"];
    $r      = "";
    $i      = 0;
    $pepe   = "";
    while($inicio<$largo){
        $lTexto  =  decoBmd2(1, substr($contenido, $inicio + 51, 2), 51, 2, 0);
        if($i==$modificar){
            $temp1   = encoBmd2( 1,$lDatos[$h]["o0"], 0, 2, 0);
            $salvar .= pasarHex($temp1[0],1).pasarHex($temp1[1],1);
            $dato    = iconv( "UTF-8", $save_txt_lang, $lDatos[$h]["o1"]);
            $salvar .= encoBmd3($dato, 2,0);
            for($j=1;$j<=(32- strlen($dato));$j++){
                $valor_e = encoBmd2(1, chr(0),1 + strlen($dato) + $j, 1, 0);
                $salvar .= pasarHex($valor_e[0],1);
            }
            $salvar .= substr($contenido, $inicio +34, 17);
            $dato2   = iconv( "UTF-8", $save_txt_lang, $lDatos[$h]["o2"]);
            $elTexto = strlen($dato2);
            $temp2   = encoBmd2( 1, $elTexto + 1 , 51, 2, 0);
            $salvar .= pasarHex($temp2[0],1).pasarHex($temp2[1],1);
            $valor_e = encoBmd2( 1,chr(0), $elTexto, 1, 0);
            
            $salvar .= encoBmd3($dato2, 54,0).pasarHex($valor_e[0],1);
            $h++;
            $modificar = $lDatos[$h]["i"];
        }
        else{
            $salvar .= substr($contenido, $inicio, $lTexto + 53);
        }
        $inicio += $lTexto + 53;
        $i++;
    }
    $contenido = $salvar;
}
elseif($archivo=="slide"){
    $ext    = ".bmd";
    $dato    = "";
    for($i=0;$i<count($lDatos);$i++){
        $cant_actual = decoBmd2(1, substr($contenido, 16 + ($lDatos[$i]["o0"] - 1) * 8200 - 4, 4), $lDatos[$i]["o0"] + 2, 4, 0);
        if($cant_actual < $lDatos[$i]["o1"]){
            $new_cant = encoBmd2(1, $lDatos[$i]["o1"], $lDatos[$i]["o0"] + 2, 4, 0);
            for($j=0;$j<4;$j++){
                $contenido[16 + ($lDatos[$i]["o0"] - 1) * 8200 - 4 + $j] = chr($new_cant[$j]);
            }
        }
        $lDatos[$i]["o2"] = iconv( "UTF-8", $save_txt_lang, $lDatos[$i]["o2"]);
        $dato =    encoBmd2(0, $lDatos[$i]["o2"], $lDatos[$i]["o1"] + $lDatos[$i]["o0"] - 1, 256, 0);
        for($j=0;$j<count($dato);$j++)
            $contenido[16 + ($lDatos[$i]["o1"] - 1) * 256 + ($lDatos[$i]["o0"] - 1) * 8200 + $j] = chr($dato[$j]);
    }
}
elseif($archivo=="itemsetoption"){
    for($i=0;$i<256;$i++){
        $posicion  = $i* $conf[1];
        $arrastre = $conf[2] * $i + $conf[3];
        for($h = 0;$h < count($col); $h++){
            $dato =    encoBmd2(
                    $col[$h][1], 
                    $lDatos[0]["o".$h], 
                    $posicion+$col[$h][2], 
                    $col[$h][3],
                    $arrastre);
            for($j=0;$j<$col[$h][3];$j++)
                $contenido[$posicion+$col[$h][2] + $j] = chr($dato[$j]);
        }
    }
}

else{
    $ext    = ".bmd";
    if($conf[6]==1) {
        $start = $lDatos[0]["e"];
        $auxiliar = $contenido;
        $contenido = substr($contenido, $conf[9] + $conf[7] * $start, $conf[8]);
    }
    $maximo = 0;
    for($i=0;$i<count($lDatos);$i++){
        $posicion  = $lDatos[$i]["i"]* $conf[1];
        $arrastre = $conf[2] * $lDatos[$i]["i"] + $conf[3];
        for($h = 0;$h < count($col); $h++){
            if($col[$h][1]==0)
                $lDatos[$i]["o".$h] = iconv( "UTF-8", $save_txt_lang, $lDatos[$i]["o".$h]);
            $dato =    encoBmd2(
                    $col[$h][1], 
                    $lDatos[$i]["o".$h], 
                    $posicion+$col[$h][2], 
                    $col[$h][3],
                    $arrastre);
            for($j=0;$j<$col[$h][3];$j++)
                $contenido[$posicion+$col[$h][2] + $j] = chr($dato[$j]);
            if(($archivo=="movereq" || $archivo=="movereq2") && $h==0 && $lDatos[$i]["o".$h]>$maximo) $maximo = $lDatos[$i]["o".$h];
        }
    }
    if($conf[6]==1){
        for($j=0;$j<$conf[8];$j++)
            $auxiliar[$conf[9] + $conf[7] * $start + $j] = $contenido[$j];
        $contenido = $auxiliar;
    }
    if($archivo=="movereq" || $archivo=="movereq2"){
        $actual = cantidad( $contenido, 0, 4);
        if($maximo>$actual){
            $maximo = pasarHex($maximo, 1);
            $contenido[0] = $maximo;
        }
    }

}
//echo $archivo."---";
$archivo = preg_replace("[^A-Za-z]", "", $archivo);
$nec_crc = ver_crc($archivo, $contenido);
//echo $archivo."---";
if($nec_crc!="no"){
    $size = strlen($contenido);
    $contenido = substr($contenido, 0, $size - 4).$nec_crc;
}
$fp = fopen($path_file.$file,"w+");
fwrite($fp, $contenido);
fclose($fp);
//echo $_REQUEST['datos'];
?>OK
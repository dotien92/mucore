<?php

error_reporting(E_ALL ^ E_NOTICE); /* Dao Van Trong - Trong.CF */

function abrir($archivo){
    $fp = fopen($archivo,"rb");
    $contenido = fread($fp, filesize($archivo));
    fclose($fp);
    return $contenido;
}

function decoBmd($tipo, $valor){
    switch ($tipo) {
        case 2:
            $resultado = $valor ^ 171;
            break;
        case 1:
            $resultado = $valor ^ 207;
            break;
        case 0:
            $resultado = $valor ^ 252;
            break;
        default:
            $resultado = 0;
            break;
    }
    return $resultado;
}

function decoBmd2($modo, $pasar, $inicio, $cantidad, $arrastre){
    $resultado = '';
    for($i=0;$i<$cantidad;$i++){
        $tipo = ($inicio + $i + $arrastre) % 3;
        $valor =ord($pasar[$i]);
        if($modo == 1){
            $resultado += decoBmd($tipo, $valor)*pow( 256, $i);
            if($resultado>2147483647)
                $resultado -= 4294967296;
        }
        else{
            $res_aux = decoBmd($tipo, $valor);
            if(($res_aux == 0 || $res_aux == 11 || $res_aux == 10))
                break;
            if($res_aux!=255)
                $resultado .= chr($res_aux);
        }
    }
    return $resultado;
}

function decoBmd3($pasar, $cantidad){
    $resultado = '';
    for($i=0;$i<$cantidad;$i++){
        $tipo = ($i) % 3;
        $valor =ord($pasar[$i]);
        $res_aux = decoBmd($tipo, $valor);
//        if($res_aux!=255)
            $resultado .= chr($res_aux);
    }
    return $resultado;
}

function decoBmd4($pasar, $inicio, $cantidad){
    $resultado = '';
    for($i=0;$i<$cantidad;$i++){
        $tipo = ($inicio + $i + $arrastre) % 3;
        $valor =ord($pasar[$i]);
        $resultado .= chr(decoBmd($tipo, $valor));
    }
    return $resultado;
}

function decoWtf($pasar, $cantidad){
    $resultado = '';
    for($i=0;$i<$cantidad;$i++){
        $valor =ord($pasar[$i]);
        $valor = $valor ^ 202;
        $resultado .= chr($valor);
    }
    return $resultado;
}

function encoBmd2($modo, $cambio, $inicio, $cantidad, $arrastre){
    if($modo == 1)
        if($cambio==-1){
            ($cantidad==1) ? ($cambio = 255) : ($cambio = 4294967295);
        }
    for($i=0;$i<$cantidad;$i++){
        if($modo == 0)
            $resultado[$i] = decoBmd(($inicio + $i + $arrastre) % 3, ord($cambio[$i]));
        else{
            $resultado[$i] = decoBmd(($inicio + $i + $arrastre) % 3, calModulo($cambio));
            $cambio        = intval($cambio/256);
        }
    }
    return $resultado;
}

function encoBmd3($cambio, $inicio, $arrastre){
    for($i=0;$i<strlen($cambio);$i++)
        $resultado .= chr(decoBmd(($inicio + $i + $arrastre) % 3, ord($cambio[$i])));
    return $resultado;
}

function orderArray ($toOrderArray, $field, $inverse = false) {  
    $position = array();  
    $newRow = array();  
    foreach ($toOrderArray as $key => $row) {
        $position[$key]  = $row[$field];
        $newRow[$key] = $row;
    }
    asort($position);
    $returnArray = array();
    foreach ($position as $key => $pos) {
        $returnArray[] = $newRow[$key];
    }
    return $returnArray;
}

function pasarHex($numero, $cantidad){
    for($i=0;$i<$cantidad;$i++){
        $a = $numero % 256;
        $numero = intval($numero/256);
        $resultado .= chr($a);
    }
    return $resultado;
}

function cantidad( $contenido, $inicio, $cantidad){
    $resultado = '';
    for($i=0;$i<$cantidad;$i++){
        $valor =ord(substr($contenido, $inicio + $i, 1));
        $resultado += $valor*pow( 256, $i);
    }
    return $resultado;
}

function neg_simple($modo, $valor, $cantidad){
    if($modo == 1)
        ($valor == 255 && $cantidad == 1 || $valor == 65535 && $cantidad == 2) ? ($resultado=  -1) :($resultado = $valor);
    else
        $resultado = str_replace("ÿ", "", $valor);
    return $resultado;
}

function calModulo($valor){
    $resultado = $valor % 256;
    if($resultado<0)
        $resultado += 256;
    return $resultado;
}

function xlsBOF() {
    return pack("vvvvvv", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
}
            
function xlsEOF() { 
    return pack("ss", 0x0A, 0x00);
}
            
function xlsWriteNumber($Row, $Col, $Value) { 
    $a  = pack("sssss", 0x203, 14, $Row, $Col, 0x0); 
    $a .= pack("d", $Value); 
    return $a; 
} 

function xlsWriteLabel($Row, $Col, $Value ) { 
    $L  = strlen($Value); 
    $a  = pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L); 
    $a .= $Value; 
return $a; 
} 

function convXLS($tipo, $Value, $Row, $Col){
    ($tipo == 1) ? $a = xlsWriteNumber($Row, $Col, $Value) : ($a = xlsWriteLabel($Row, $Col, $Value ));
return $a;
}

function deco_gmu($archivo,$medio){
    global $path_oz;
    global $path_graf;
    $nombre = explode(".", $archivo);
    $size = (sizeof($nombre)-1);
    $ext  = strtolower($nombre[$size]);
    switch ($ext) {
        case "ozb":
            $sacar   = 4;
            $formato = "bmp";
        break;
        case "ozj":
            $sacar   = 24;
            $formato = "jpg";
        break;
        case "ozt":
            $sacar   = 4;
            $formato = "tga";
        break;
        default:
        break;
    }
    if(isset($sacar)){
        $contenido = abrir($path_oz.$archivo);
        $contenido = substr($contenido, $sacar, strlen($contenido)-$sacar);
        if($medio==1){
            if($formato == "tga"){
                $contenido = imagepng(imagecreatefromtga($contenido));
            }
            return $contenido;
        }
        else{
            $fp = fopen($path_graf.$nombre[0].".".$formato,"w+");
            fwrite($fp, $contenido);
            fclose($fp);
        }
    }
}

function enco_gmu($archivo, $medio){
    global $path_oz;
    global $path_graf;
    $nombre = explode(".", $archivo);
    $size = (sizeof($nombre)-1);
    $ext  = strtolower($nombre[$size]);
    switch ($ext) {
        case "bmp":
            $poner   = 4;
            $formato = "ozb";
        break;
        case "jpg":
            $poner   = 24;
            $formato = "ozj";
        break;
        case "tga":
            $poner   = 4;
            $formato = "ozt";
        break;
        default:
        break;
    }
    if(isset($poner)){
        $contenido  = abrir($path_graf.$archivo);
        $poner_temp = substr($contenido, 0, $poner);
        if($medio==1){
            if($formato == "ozt"){
                $contenido = imagepng(imagecreatefromtga($contenido));
            }
            return $contenido;
        }
        else{
            $contenido  = $poner_temp.$contenido; 
            $fp = fopen($path_oz.$nombre[0].".".$formato,"w+");
            fwrite($fp, $contenido);
            fclose($fp);
        }
    }
}

function imagecreatefromtga ( $data, $return_array = 0 )
{
    $pointer = 18;
    $x = 0;
    $y = 0;
    $w = base_convert ( bin2hex ( strrev ( substr ( $data, 12, 2 ) ) ), 16, 10 );
    $h = base_convert ( bin2hex ( strrev ( substr ( $data, 14, 2 ) ) ), 16, 10 );
    $img = imagecreatetruecolor( $w, $h );

    while ( $pointer < strlen ( $data ) )
    {
        imagesetpixel ( $img, $x, $h - $y, base_convert ( bin2hex ( strrev ( substr ( $data, $pointer, 3 ) ) ), 16, 10 ) );
        $x++;

        if ($x == $w)
        {
            $y++;
            $x=0;
        }

        $pointer += 4;
    }
   
    if ( $return_array )
        return array ( $img, $w, $h );
    else
        return $img;
}

function version_file($archivo, $file){
    $patha="../archivos/bmd/";
    $largo = filesize($patha.$file);
    switch ($archivo) {
        case "gate":
            switch ($largo) {
                case 7168:
                    return "gate3";
                break;
                case 6144:
                    return "gate";
                break;
                case 5120:
                    return "gate4";
                break;
                case 2304:
                    return "gate2";
                break;
                case 900:
                    return "gate2";
                break;
                default:
                    return "gate";
                break;
            }
        break;
        case "item":
            switch ($largo) {
                case 14080:
                    return "item3";
                break;
                case 32772:
                    return "item4";
                break;
                case 38916:
                    return "item2";
                break;
                case 688132:
                    return "item";
                break;
                default:
                    return "item";
                break;
            }
        break;
        case "ItemAddOption":
            switch ($largo) {
                case 131072:
                    return "ItemAddOption";
                break;
                case 98304:
                    return "ItemAddOption3";
                break;
                case 81920:
                    return "ItemAddOption2";
                break;
                default:
                    return "ItemAddOption";
                break;
            }
        break;
        case "itemsetoption":
            switch ($largo) {
                case 4868:
                    return "itemsetoption2";
                break;
                case 6980:
                    return "itemsetoption";
                break;
                case 7044:
                    return "itemsetoption6";
                break;
                default:
                    return "itemsetoption6";
                break;
            }
        break;
        case "itemsettype":
            switch ($largo) {
                case 2052:
                    return "itemsettype2";
                break;
                case 32772:
                    return "itemsettype";
                break;
                default:
                    return "itemsettype";
                break;
            }
        break;
        case "itemtooltip":
            switch ($largo) {
                case 2052:
                    return "itemtooltip";
                break;
                case 1015812:
                    return "itemtooltip2";
                break;
                default:
                    return "itemtooltip2";
                break;
            }
        break;
        case "message":
            switch ($largo) {
                case 1444:
                    return "message";
                break;
                default:
                    return "message";
                break;
            }
        break;
        case "Minimap":
            switch ($largo) {
                case 4849:
                    return "Minimap";
                break;
                case 11649:
                    return "Minimap2";
                break;
                default:
                    return "Minimap";
                break;
            }
        break;
        case "MonsterSkill":
            switch ($largo) {
                case 1444:
                    return "MonsterSkill";
                break;
                case 452:
                    return "MonsterSkill2";
                break;
                case 228:
                    return "MonsterSkill2";
                break;
                default:
                    return "MonsterSkill";
                break;
            }
        break;
        case "movereq":
            switch ($largo) {
                case 4204:
                    return "movereq2";
                break;
                case 4004:
                    return "movereq";
                break;
                case 2884:
                    return "movereq";
                break;
                default:
                    return "movereq";
                break;
            }
        break;
        case "Quest":
            switch ($largo) {
                case 116800:
                    return "questa";
                break;
                case 136000:
                    return "questb";
                break;
                case 148800:
                    return "Quest2";
                break;
                case 142400:
                    return "Quest";
                break;
                default:
                    return "Quest";
                break;
            }
        break;
        case "skill":
            switch ($largo) {
                case 52804:
                    return "skills62";
                break;
                case 48004:
                    return "skill";
                break;
                case 13316:
                    return "skill2";
                break;
                case 15364:
                    return "skill3";
                break;
                case 27204:
                    return "skill4";
                break;
                case 2564:
                    return "skill5";
                break;
                default:
                    return "skill";
                break;
            }
        break;
        case "skills6":
            switch ($largo) {
                case 48004:
                    return "skills6";
                break;
                case 52804:
                    return "skills62";
                break;
                case 57204:
                    return "skills63";
                break;
                default:
                    return "skills6";
                break;
            }
        break;
        case "text":
            switch ($largo) {
                case 180000:
                    return "text2";
                break;
                case 900000:
                    return "text2";
                break;
                case 299924:
                    return "text2";
                break;
                default:
                    return "text";
                break;
            }
        break;
        default:
            return $archivo;
        break;
    }
}

function CrcCalc($buffer, $CheckVal, $salteo)
{
    $CrcKey = $CheckVal * 512;
    $tmpbuff = 0;
    $var_temp = array(0xFFFFFFFF, 0x7FFFFFFF, 0x3FFFFFFF, 0x1FFFFFFF, 0x0FFFFFFF, 0x07FFFFFF, 0x03FFFFFF, 0x01FFFFFF, 0x00FFFFFF);
    if($salteo>0) $buffer = substr($buffer, $salteo);
    $size = strlen($buffer);
    for( $i = 0 ; $i <= ($size-8); $i+=4){
        $tmpbuff = cantidad($buffer, $i, 4);
        ((($i / 4) + $CheckVal) % 2) ? ($CrcKey += $tmpbuff) : ($CrcKey ^= $tmpbuff);
        if(($i % 16) == 0) $CrcKey ^= ($CheckVal + $CrcKey) >> ((($i /4) % 8) + 1) & $var_temp[(($i /4) % 8) + 1];
    }
    return $CrcKey;
}

function ver_crc($archivo, $buffer){
    $salteo = 0;
    $CheckVal = 0;
    switch ($archivo) {
        case "ArcaBattleBootyMix":
            $CheckVal = 0xE2F1;
            $salteo   = 4;
        break;
        case "AttributeVariation":
            $CheckVal = 0xE2F1;
            $salteo   = 4;
        break;
        case "BuffEffect":
            $CheckVal = 0xE2F1;
            $salteo   = 4;
        break;
        case "Filter":
            $CheckVal = 0x3E7D;
        break;
        case "FilterName":
            $CheckVal = 0x2BC1;
        break;
        case ($archivo=="item" || $archivo=="items6"):
            $CheckVal = 0xE2F1;
        break;
        case ($archivo=="itemsetoption" || $archivo=="itemsetoption6"):
            $CheckVal = 0xA2F1;
        break;
        case "itemsettype":
            $CheckVal = 0xE5F1;
        break;
        case "ItemTooltip":
            $CheckVal = 0xE2F1;
        break;
        case ($archivo=="MasterSkillTreeData"):
            $CheckVal = 0x2BC1;
        break;
        case ($archivo=="MasterSkillTooltip"):
            $CheckVal = 0x2BC1;
        break;
        case ($archivo=="Minimap" || $archivo=="Minimap2"):
            $CheckVal = 0x2BC1;
        break;
        case "PentagramJewelOptionValue":
            $CheckVal = 0xE2F1;
            $salteo   = 4;
        break;
        case "PentagramMixNeedSource":
            $CheckVal = 0xE2F1;
            $salteo   = 4;
        break;
        case "pet":
            $CheckVal = 0x7F1D;
            $salteo   = 12;
        break;
        case "shopcategoryitems":
            $CheckVal = 0xE2F1;
        break;
        case "shopui":
            $CheckVal = 0xE2F1;
        break;
        case "skill":
            $CheckVal = 0x5A18;
        break;
        case ($archivo=="skills6" || $archivo =="skills62" || $archivo =="skills63"):
            $CheckVal = 0x5A18;
        break;
        case "MasterSkillTooltip":
            $CheckVal = 0x5A18;
        break;
    }
    if($CheckVal!=0){
        $valor = CrcCalc($buffer,$CheckVal, $salteo);
        $datos = "";
        for($i=0;$i<4;$i++){
            $datos .= chr(calModulo($valor));
            $valor  = ($valor) >> (8);
        }
        return $datos;
    }
    else{
        return "no";
    }
}

function DecodeATT($srcBuf)
{
    $dstBuf = '     ';
    $XorKeys = array(0xD1, 0x73, 0x52, 0xF6, 0xD2, 0x9A, 0xCB, 0x27, 0x3E, 0xAF, 0x59, 0x31, 0x37, 0xB3, 0xE7, 0xA2);
    $Key = 0x5E;
    $largo_file = strlen($srcBuf);
    $dstBuf[0] = chr(0);
    $dstBuf[1] = chr(255);
    $dstBuf[2] = chr(255);
    
    if($largo_file == 131076){
        for($i=0; $i < $largo_file; $i++)
        {
            list($tmpdesa, $Key) = buff_deco($i, ord(substr($srcBuf, $i, 1)), $XorKeys[($i)%16], $Key);
            if(($i>3) && ($i%2==0))
                $dstBuf[$i/2+1] = chr($tmpdesa);
        }
    }
    else{
        for($i=0; $i < $largo_file; $i++)
        {
            list($tmpdesa, $Key) = buff_deco($i, ord(substr($srcBuf, $i, 1)), $XorKeys[($i)%16], $Key);
            if(($i>3))
                $dstBuf[$i-1] = chr($tmpdesa);
        }
    }
    return $dstBuf;
}

function buff_deco($i, $tmpbuff, $XorKey, $Key)
{
    $valor[0] = decoBmd($i%3,((0x100 + $tmpbuff^$XorKey) - $Key) & 0x000000ff);
    $tmpdesa  = decoBmd($i%3,((0x100 + $tmpbuff^$XorKey) - $Key) & 0x000000ff);
    $valor[1] = ($tmpbuff + 0x3D) & 0x000000ff;;

    return $valor;
}

function EncodeATT($srcBuf)
{
    $dstBuf = '     ';
    $XorKeys = array(0xD1, 0x73, 0x52, 0xF6, 0xD2, 0x9A, 0xCB, 0x27, 0x3E, 0xAF, 0x59, 0x31, 0x37, 0xB3, 0xE7, 0xA2);
    $Key = 0x5E;
    $largo_file = strlen($srcBuf);
    
    for($i=0; $i < $largo_file; $i++)
    {
        list($tmpdesa, $Key) = buff_enco($i, ord(substr($srcBuf, $i, 1)), $XorKeys[($i)%16], $Key);
        $dstBuf[$i] = chr($tmpdesa);
    }
    return $dstBuf;
}

function buff_enco($i, $tmpbuff, $XorKey, $Key)
{
    $tmpdesa  = ((decoBmd($i%3, $tmpbuff) + $Key) & 0x000000ff) ^ $XorKey;
    $valor[0] = $tmpdesa;
    $valor[1] = ($tmpdesa + 0x3D) & 0x000000ff;
    
    return $valor;
}

function DecodeMAP($srcBuf)
{
    $dstBuf = '     ';
    $XorKeys = array(0xD1, 0x73, 0x52, 0xF6, 0xD2, 0x9A, 0xCB, 0x27, 0x3E, 0xAF, 0x59, 0x31, 0x37, 0xB3, 0xE7, 0xA2);
    $Key = 0x5E;
    $largo_file = strlen($srcBuf);
    $dstBuf[0] = chr(0);
    
    for($i=0; $i < $largo_file; $i++)
    {
        list($tmpdesa, $Key) = buff_desa($i, ord(substr($srcBuf, $i, 1)), $XorKeys[($i)%16], $Key);
        if($i>1)
            $dstBuf[$i-2] = chr($tmpdesa);
    }
    return $dstBuf;
}

function object2array($object) {
    if (is_object($object) || is_array($object)) {
        foreach ($object as $key => $value) {
            $array[$key] = object2array($value);
        }
    }else {
        $array = $object;
    }
    return $array;
}

function JDecode($arr){
    if (version_compare(PHP_VERSION,"5.2","<"))
    {    
        require_once("JSON.php"); //if php<5.2 need JSON class
        $json = new Services_JSON();
        $data2=$json->decode($arr);
    } else
    {
        $data2 = json_decode($arr, true);
    }
    $data = object2array($data2);
    return $data;
}

function parse_txt($file){
    $archivo = file($file);
    foreach($archivo as $linea){
        $pos = strpos($linea, "//");
        if ($pos === false) {
            $comen = "";
        }
        else{
            $comen = substr($linea,$pos);
            $linea = substr_replace($linea,'',$pos);
        }
        $lim_text = explode("\"", $linea);
        for($i=0;$i<count($lim_text);$i++){
            $lim_text[$i] = preg_replace('/\t+/', ' ', $lim_text[$i]);
            $lim_text[$i] = preg_replace('/\s+/', "\t", $lim_text[$i]);
            $lim_text[$i] = trim($lim_text[$i]);
            $i++;
        }
        $linea = "";
        for($i=0;$i<count($lim_text);$i++)
            $linea .= "\t".$lim_text[$i];

        $linea = preg_replace('/\t+/', "\t", $linea);
        $linea = trim($linea);

        $valores  = explode("\t", $linea);
        if(strlen($linea)>0 & strlen($linea)<3){
            $tipo = $linea;
        }
        elseif(strlen($linea)>3){
            for($i=1;$i<count($valores);$i++){
                if(!isset($tipo)) $tipo = 0;
                $l_valores[$tipo][$valores[0]][$i] = $valores[$i];
            }
        }
    }
    $fp = fopen("l_valores.txt","w+");
    $pepe = print_r($l_valores, true);
    fwrite($fp, $pepe);
    fclose($fp);
    return $l_valores;
}

function parse_cashshop_category($file){
    $archivo = file($file);
    $l_valores = "1\r\n";
    foreach($archivo as $linea){
        $partes = explode("@", $linea);
        $l_valores .= $partes[0]."\t\"".$partes[1]."\"\r\n";
    }    
    $l_valores .= "end";
    return $l_valores;
}

function parse_cashshop_package($file){
    $archivo = file($file);
    $l_valores = "1
//CatID    Sort    PackID    ProdID    ItemID    Pk.Val    Pr.Opt1    Pr.Opt2    Pr.Opt3    Pr.Opt4\r\n";
    foreach($archivo as $linea){
        $partes = explode("@", $linea);
        $val1    = explode("|", $partes[19]);
        $val2    = explode("|", $partes[23]);
        (is_numeric($val2[0])) ? ($val2_0 = $val2[0]) : ($val2_0 = 0);
        (is_numeric($val2[1])) ? ($val2_1 = $val2[1]) : ($val2_1 = 0);
        (is_numeric($val2[2])) ? ($val2_2 = $val2[2]) : ($val2_2 = 0);
        (is_numeric($val2[3])) ? ($val2_3 = $val2[3]) : ($val2_3 = 0);
        $l_valores .= $partes[0]."\t".$partes[1]."\t".$partes[2]."\t".$val1[0]."\t".$partes[20]."\t".$partes[5]."\t".$val2_0."\t".$val2_1."\t".$val2_2."\t".$val2_3."\r\n";
    }    
    $l_valores .= "end";
    return $l_valores;
}

function parse_cashshop_product($file){
    $linea = file($file);
    $l_valores = "1
//ID1    ID2    Value    ItemID    Dur    Rate    Quant    Days    Name\r\n";
    for($i=0;$i<count($linea);$i++){
        $partes = explode("@", $linea[$i]);
        $partes_aux = explode("@", $linea[$i+1]);
        if($partes[3]!="test"){
            if($partes[2]=="Duration") $l_valores .= $partes[0]."\t".$partes[6]."\t".$partes[5]."\t".$partes[13]."\t".$partes[3]."\t0\t0\t".$partes_aux[3]."\t\"".$partes[1]."\"\r\n";
            if($partes[2]=="Rate") $l_valores .= $partes[0]."\t".$partes[6]."\t".$partes[5]."\t".$partes[13]."\t0\t".$partes[3]."\t0\t".$partes_aux[3]."\t\"".$partes[1]."\"\r\n";
            if($partes[2]=="Quantity") $l_valores .= $partes[0]."\t".$partes[6]."\t".$partes[5]."\t".$partes[13]."\t0\t0\t".$partes[3]."\t".$partes_aux[3]."\t\"".$partes[1]."\"\r\n";
        }
    }    
    $l_valores .= "end";
    return $l_valores;
}

function listarFolders($path){
    $dir = opendir($path);
    $files = array();
    while ($elemento = readdir($dir)){
        if( $elemento != "." && $elemento != ".." && is_dir($path.$elemento))
            $devolver .= listarFolders( $path.$elemento.'/' );
    }
    $url     = str_replace("/", "\\/", $path);
    $url     = substr_replace(str_replace(".", "", $url), '', -2);
    
    $dirs     = explode("/", $path);
    $dir     = $dirs[count($dirs) - 2];

    $listado = str_replace("/", "_", $path);
    $listado = str_replace(".", "", $listado);

    if($dir!="archivos" || count($dirs)>3)
        $directorio = "{\"id\":\"_a".$listado."\",\"text\":\"".$dirs[count($dirs) - 2]."\",\"url\":\"".$url."\",\"isFolder\":true,\"iconCls\":\"\",\"children\":[".substr_replace($devolver, '', -1)."]},";
    else
        $directorio = $devolver;
    return $directorio;
}

function listarFiles($path, $filters){
    $dir = opendir($path);
    $files = array();
    while ($elemento = readdir($dir)){
        if( $elemento != "." && $elemento != ".."){
            if(!is_dir($path.'/'.$elemento)){
                $q_menu = "";
                $partes = explode(".",$elemento);
                $ext    = strtolower($partes[count($partes)-1]);
                if($ext=="att")    (strtolower(substr($partes[0],0,3))=="enc") ? ($q_menu = "menu_attd") : ($q_menu = "menu_atte");
                if($ext=="bmd") $q_menu = "menu_".exportable(strtolower($partes[0]),$ext);
                if($ext=="bkp") $q_menu = "menu_bkp".exportable(strtolower($partes[0]),$ext);
                if($ext=="exe") $q_menu = "menu_main";
                if($ext=="jpg") $q_menu = "menu_jpg";
                if($ext=="tga") $q_menu = "menu_tga";
                if($ext=="bmp") $q_menu = "menu_bmp";
                if($ext=="ozj") $q_menu = "menu_ozj";
                if($ext=="ozt") $q_menu = "menu_ozt";
                if($ext=="ozb") $q_menu = "menu_ozb";
                if(strlen($q_menu)>6)
                    $ficheros .= "{\"id\":\"_".$elemento."\",\"text\":\"".$elemento."\",\"url\":\"".$path.'/'.$elemento."\",\"isFolder\":false,\"q_menu\":\"".$q_menu."\",\"iconCls\":\"".$ext."-icon\",\"children\":[]},";
            }
        }
    }
    return $ficheros;
}

function exportable($nombre, $ext){
    $first4 =substr($nombre,0,4);
    if($ext=="bkp" || $ext=="xls"){
        if($first4=="item" || $first4=="gate" || $first4=="jewe" || $first4=="move" || $first4=="skil")
            return "s";
        else
            return "";
    }
    if($ext=="bmd"){
        if($first4=="item" || $first4=="gate" || $first4=="jewe" || $first4=="skil")
            return "bmds";
        elseif($first4=="move")
            return "bmdsm";
        elseif($first4=="slid")
            return "bmdsl";
        elseif($first4=="buff" || $first4=="cred" || $first4=="dial" || $first4=="filt" || $first4=="mast" || $first4=="mini" || $first4=="mix" || $first4=="mons" || $first4=="pet" || $first4=="npcd" || $first4=="ques" || $first4=="serv" || $first4=="shop" || $first4=="sock" || $first4=="text")
            return "bmd";
        else
            return "";
    }
}
function DecoEncoDat($srcBuf)
{
    $dstBuf = '     ';
    $XorKeys = array(0xA1, 0xB2, 0xAA, 0x12, 0x23, 0xF1, 0xF3, 0xD3, 0x78, 0x02);
    $largo_file = strlen($srcBuf);
    for($i=0; $i < $largo_file; $i++)
    {
        $dstBuf[$i] = chr(ord(substr($srcBuf, $i, 1)) ^ $XorKeys[($i)%10]);
    }
    return $dstBuf;
}
?>
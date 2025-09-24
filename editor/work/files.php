{"datos": [
<?php
include("funciones.php");
$archivo  = $_REQUEST['archivo'];
$tipo     = $_REQUEST['tipo'];
include("../config.php");

$que_tipo  = "path_".$tipo;
$path_file = $$que_tipo;

$archivo = preg_replace("[^A-Za-z]", "", $archivo);

$directorio=dir($path_file);
while ($file = $directorio->read()){
//    if(strpos($archivo, $file)!==false){
    if(strpos(strtolower($file), strtolower($archivo))===0){
        if($archivo!="Filter") {
            if($archivo!="item") {
                if($archivo!="Quest") {
                    $cadena .= "{file: \"<a class='linkarchivo' href=".$_REQUEST['tarea'].".php?archivo=".$_REQUEST['archivo']."&file=$file&tipo=$tipo&file2=".$_REQUEST['file2'].">$file</a>\"},";
                }
                else{
                    if(strpos(strtolower($file), "questprogress")===0 || strpos(strtolower($file), "questwords")===0){
                    }
                    else{
                        $cadena .= "{file: \"<a class='linkarchivo' href=".$_REQUEST['tarea'].".php?archivo=".$_REQUEST['archivo']."&file=$file&tipo=$tipo&file2=".$_REQUEST['file2'].">$file</a>\"},";
                    }
                }
            }
            else{
                if(strpos(strtolower($file), "itemadd")===0 || strpos(strtolower($file), "itemset")===0){
                }
                else{
                    $cadena .= "{file: \"<a class='linkarchivo' href=".$_REQUEST['tarea'].".php?archivo=".$_REQUEST['archivo']."&file=$file&tipo=$tipo&file2=".$_REQUEST['file2'].">$file</a>\"},";
                }
            }
        }
        else{
            if(strpos("FilterName", $file)==false){
                $cadena .= "{file: \"<a class='linkarchivo' href=".$_REQUEST['tarea'].".php?archivo=".$_REQUEST['archivo']."&file=$file&tipo=$tipo&file2=".$_REQUEST['file2'].">$file</a>\"},";
            }
        }
    }
        
}
$directorio->close();
$cadena = substr_replace($cadena, '', -1);
echo $cadena;
?>
]}
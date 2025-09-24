<?php
$isForMainPanel = $_REQUEST['isForMainPanel'];
$path        = $_REQUEST['path'];
$filters     = $_REQUEST['filters'];
include("funciones.php");


if($isForMainPanel == true){
    if($path=="") $path= "/archivos";
    echo "{files:[".substr_replace(listarFiles("..".$path, $filters), '', -1)."]}";
}
else 
    echo "[".substr_replace(listarFolders( '../archivos/' ), '', -1)."]";

?>
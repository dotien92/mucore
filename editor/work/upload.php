<?php
if(isset($_FILES['file']['name'])){
    $file     = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];

    $fp = fopen($tmp_file,"rb");
    $contenido = fread($fp, filesize($tmp_file));
    fclose($fp);

    if (PHP_OS == "WIN32" || PHP_OS == "WINNT")
        $tmp_filea = explode("\\",$tmp_file);
    else
        $tmp_filea = explode("/",$tmp_file);
    $tmp_file  = $tmp_filea[count($tmp_filea)-1];
    $fp = fopen("../archivos/bmd/".$tmp_file,"w+");
    fwrite($fp, $contenido);
    fclose($fp);

    if(isset($_FILES['file2']['name'])){
        $file2     = $_FILES['file2']['name'];
        $tmp_file2 = $_FILES['file2']['tmp_name'];

        $fp = fopen($tmp_file2,"rb");
        $contenido = fread($fp, filesize($tmp_file2));
        fclose($fp);

        if (PHP_OS == "WIN32" || PHP_OS == "WINNT")
            $tmp_filea2 = explode("\\",$tmp_file2);
        else
            $tmp_filea2 = explode("/",$tmp_file2);
        $tmp_file2  = $tmp_filea2[count($tmp_filea2)-1];
        $fp = fopen("../archivos/bmd/".$tmp_file2,"w+");
        fwrite($fp, $contenido);
        fclose($fp);
    }
    echo "{success:true, files:'".$tmp_file."|".$tmp_file2."'}";
}
else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>MuEditorMagicHand</title>
    <link rel="stylesheet" type="text/css" href="../css/ext-all.css"/>
    <link rel="stylesheet" type="text/css" href="../css/fileuploadfield.css"/>
    <script type="text/javascript" src="ext-base.js"></script>
    <script type="text/javascript" src="ext-all.js"></script>
    <script type="text/javascript" src="upload_js.php?<?php echo "web=".$_REQUEST['web']."&archivo=".$_REQUEST['archivo']."&tipo=".$_REQUEST['tipo']?>"></script>
    <script type="text/javascript" src="FileUploadField.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/forms.css"/>
    <style type="text/css">
        p {
            width: 750px;
        }
        .ext-ie .x-form-check-wrap, .ext-gecko .x-form-check-wrap {
            padding-top: 3px;
        }
        fieldset legend {
            white-space: nowrap;
        }
    </style>
</head>
<body>
 <div id="ventana"></div>
</body>
</html>
<?php
}
?>
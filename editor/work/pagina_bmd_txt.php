<?php
require_once('session.php');

include("../i18n/".$lang."/locale/text.php");
?>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Exportador de <?php echo $_REQUEST['archivo']?>.<?php echo $_REQUEST['tipo']?></title>
    <link rel="stylesheet" type="text/css" href="../css/ext-all.css" />
    <script type="text/javascript" src="ext-base.js"></script>
    <script type="text/javascript" src="ext-all.js"></script>
    <script type="text/javascript" src="sel_files.php?archivo=<?php echo $_REQUEST['archivo']?>&tarea=export_bmd_txt&tipo=bmd&title=<?php echo $efile?>"></script>
</head>
<body>
<div id="editor-grid"></div>
</body>
</html>

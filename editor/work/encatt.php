<?php
require_once('session.php');

include("../i18n/".$lang."/locale/text.php");
?>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor de <?php echo $_REQUEST['archivo']?></title>
    <link rel="stylesheet" type="text/css" href="../css/ext-all.css" />
    <script type="text/javascript" src="ext-base.js"></script>
    <script type="text/javascript" src="ext-all.js"></script>
    <script type="text/javascript" src="DataView-more.js"></script>
    <script type="text/javascript" src="view_encatt.php"></script>
    <link rel="stylesheet" type="text/css" href="../css/data-view.css" />
</head>
<body>
<div id="editor-grid"></div>
<iframe name="download" style="display: none;" id="download"></iframe>
</body>
</html>
<?php
require_once('session.php');
include("../i18n/".$lang."/locale/text.php");
?>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $editor2;?> MasterSkillTree.bmd</title>
    <link rel="stylesheet" type="text/css" href="../css/ext-all.css" />
     <script type="text/javascript" src="ext-base.js"></script>
    <script type="text/javascript" src="ext-all.js"></script>
    <script type="text/javascript" src="masterskilltree2.php?archivo=MasterSkillTree&file=<?php echo $_REQUEST['file']?>&tipo=bmd"></script>
    <script type="text/javascript" src="../i18n/locale/<?php  echo $lang?>/ext-lang.js"></script>
</head>
<body>
<div id="editor-grid"></div>
<iframe name="download" style="display: none;" id="download"></iframe>
</body>
</html>
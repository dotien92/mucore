<?php 
$LogFileLocation = "logs_tracker/admin_logs.txt";
$fh = fopen(dirname(dirname(__FILE__)) . "/" . $LogFileLocation, "a+");
fwrite($fh, date("dMy H:i:s") . "	" . GetRealUserIP() . "	" . $_SERVER["REQUEST_URI"] . "
");
fclose($fh); ?>
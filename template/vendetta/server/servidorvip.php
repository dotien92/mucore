<?PHP
if (eregi("server/servidorvip.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require 'engine/global_config.php';

$onlineoffline = "6mp.sytes.net";
if ($check=@fsockopen($onlineoffline,55901,$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	echo 'Online'; 
	}
else 
	{ 
	echo '<span style="color:#FF0000"> Offline</span>'; 
	} 
?>
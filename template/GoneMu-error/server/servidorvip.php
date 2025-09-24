<?PHP
if (eregi("server/servidorvip.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require 'engine/global_config.php';

$onlineoffline = "127.0.0.1";
if ($check=@fsockopen($onlineoffline,55920,$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	echo '<img src="template/'.$core['config']['template'].'/images/on.png" alt="Online">'; 
	}
else 
	{ 
	echo '<img src="template/'.$core['config']['template'].'/images/off.png" alt="Offline">'; 
	} 
?>
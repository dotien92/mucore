<?php
function check_inject($type) { 
    $badchars = array("DROP", "drop", "UPDATE", "update", "SELECT", "select", "DELETE", "delete", "WHERE", "where", "CREATE", "create", "TABLE", "table", "*", "'", '"', "$", "(", ")", "`", ";", "/", " \ ", "-1", "-2", "-3", "-4", "-5", "-6", "-7", "-8", "-9");
 // $badchars = array(";","'","*","/"," \ ","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where", "-1", "-2", "-3","-4", "-5", "-6", "-7", "-8", "-9");
    foreach($type as $value) { 
    $value = clean_variable($value);
    if(in_array($value, $badchars)) { 
        die("SQL Injection Detected - Make sure only to use letters and numbers!\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']);
    }   else { 
            $check = preg_split("//", $value, -1, PREG_SPLIT_OFFSET_CAPTURE); 
            foreach($check as $char) { 
                if(in_array($char, $badchars)) { 
                    die("SQL Injection Detected - Make sure only to use letters and numbers!\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']); 
                }
            }
        }
    }
}
  
function clean_variable($var) { 
    $newvar = preg_replace('/[^a-zA-Z0-9\_\-\@\\/ \!\    \=\>\<\
\#\$\%\^\.\+\-\&\*\?\;\(\)\`\:\.\}\{\]\[]/', '', $var);
    return $newvar;
    /*return str_replace("/", "",$newvar);*/
};
$_REQUEST = clean_variable($_REQUEST);
$_POST = clean_variable($_POST);
$_GET = clean_variable($_GET);
$_COOKIE = clean_variable($_COOKIE);
$_SESSION = clean_variable($_SESSION); 
?>
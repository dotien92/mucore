<?php
/*
   Author:    Jamie Telin (jamie.telin@gmail.com), currently at employed Zebramedia.se
*/

class GoogleTranslateApi{

    var $modo = 0;
    var $BaseUrl = 'http://ajax.googleapis.com/ajax/services/language/translate';
    var $FromLang = 'kr';
    var $ToLang = 'es';
    var $Version = '1.0';
    
    var $CallUrl;
    
    var $Text = '';
    
    var $TranslatedText;
    var $DebugMsg;
    var $DebugStatus;
    
    function GoogleTranslateApi(){
        $this->CallUrl = $this->BaseUrl . "?v=" . $this->Version . "&q=" . urlencode($this->Text) . "&langpair=" . $this->FromLang . "%7C" . $this->ToLang;
    }
    
    function makeCallUrl(){
        $this->CallUrl = $this->BaseUrl . "?v=" . $this->Version . "&q=" . urlencode($this->Text) . "&langpair=" . $this->FromLang . "%7C" . $this->ToLang;
    }
    
    function translate($text = ''){
        if($text != ''){
            $this->Text = $text;
        }
        $this->makeCallUrl();
        if($this->Text != '' && $this->CallUrl != ''){
            if($modo == 1){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->CallUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_REFERER, "http://www.tu-anime.com/editor4/index.php");
                $contents = curl_exec($ch);
                curl_close($ch);
            }
            else{
                $handle = fopen($this->CallUrl, "rb");
                $contents = '';
                while (!feof($handle)) {
                $contents .= fread($handle, 8192);
                }
                fclose($handle);
            }

            $json = json_decode($contents, true);
            
            if($json['responseStatus'] == 200){ //If request was ok
                $this->TranslatedText = $json['responseData']['translatedText'];
                $this->DebugMsg = $json['responseDetails'];
                $this->DebugStatus = $json['responseStatus'];
                return $this->TranslatedText;
            } else { //Return some errors
                echo $this->CallUrl."---".$json['responseDetails']."---".$json['responseStatus'];
                return false;
                $this->DebugMsg = $json['responseDetails'];
                $this->DebugStatus = $json['responseStatus'];
            }
        } else {
            return false;
        }
    }
}
$arch  = $_REQUEST['archivo'];
$num   = $_REQUEST['cantidad'];
$text  = $_REQUEST['text_tran'];
$id    = $_REQUEST['text_id'];
$from  = $_REQUEST['from'];
$to    = $_REQUEST['to'];

$translate = new GoogleTranslateApi;
$translate->FromLang = $from;
$translate->ToLang = $to;
$l_translated = "";
for($i=1;$i<=$num;$i++){
    if(strlen($_REQUEST["text_tran".$i])>0){
        $text = $_REQUEST["text_tran".$i];
        $t_translated  = str_replace("% ", "%", $translate->translate($text));
        $t_translated  = str_replace("%D", "%d", $t_translated);
        $t_translated  = str_replace("&#39;", "'", $t_translated);
        $t_translated  = str_replace("&quot;", "\"", $t_translated);
        $t_translated  = str_replace("\\", "", $t_translated);
        $l_translated .= "|".str_replace("%S", "%s", $t_translated);
    }
    else{
        $l_translated .= "|";
    }
}
if($arch=="skill" & $id>299) $id -= 300;
echo $id.$l_translated;
?>
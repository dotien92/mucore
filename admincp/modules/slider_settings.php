<?
if (isset($_POST['slider_settings'])) {
    if (empty($_POST['image1']) || empty($_POST['title1']) || empty($_POST['time1']) || empty($_POST['other_info1']) || empty($_POST['link1'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
          if (strlen($_POST['c_key']) != '0') {
            echo notice_message_admin('Encryption key must be 8 digits length, letters and numbers only.', '0', '1', '0');
        } elseif (strlen($_POST['s_s']) != '0') {
            echo notice_message_admin('MUCore Serial Number must be 20 digits length.', '0', '1', '0');    
        } else {
            require('../engine/slider_config.php');
            $new_db = fopen("../engine/slider_config.php", "w");
            $data   = "<?\r\n";
            $data .= "\$core['slider']['on_off'] = \"" . $core['config']['on_off'] . "\";\r\n";
            $data .= "\$core['slider']['link1'] = \"" . $_POST['link1']  . "\";\r\n";            
            $data .= "\$core['slider']['image1'] = \"" . $_POST['image1']  . "\";\r\n";
            $data .= "\$core['slider']['title1'] = \"" . $_POST['title1']  . "\";\r\n";
            $data .= "\$core['slider']['time1'] = \"" . $_POST['time1']  . "\";\r\n";
            $data .= "\$core['slider']['other_info1'] = \"" . $_POST['other_info1']  . "\";\r\n";
            $data .= "\$core['slider']['link2'] = \"" . $_POST['link2']  . "\";\r\n";            
            $data .= "\$core['slider']['image2'] = \"" . $_POST['image2']  . "\";\r\n";
            $data .= "\$core['slider']['title2'] = \"" . $_POST['title2']  . "\";\r\n";
            $data .= "\$core['slider']['time2'] = \"" . $_POST['time2']  . "\";\r\n";
            $data .= "\$core['slider']['other_info2'] = \"" . $_POST['other_info2']  . "\";\r\n";
            $data .= "\$core['slider']['link3'] = \"" . $_POST['link3']  . "\";\r\n";            
            $data .= "\$core['slider']['image3'] = \"" . $_POST['image3']  . "\";\r\n";
            $data .= "\$core['slider']['title3'] = \"" . $_POST['title3']  . "\";\r\n";
            $data .= "\$core['slider']['time3'] = \"" . $_POST['time3']  . "\";\r\n";
            $data .= "\$core['slider']['other_info3'] = \"" . $_POST['other_info3']  . "\";\r\n";
            $data .= "\$core['slider']['link4'] = \"" . $_POST['link4']  . "\";\r\n";            
            $data .= "\$core['slider']['image4'] = \"" . $_POST['image4']  . "\";\r\n";
            $data .= "\$core['slider']['title4'] = \"" . $_POST['title4']  . "\";\r\n";
            $data .= "\$core['slider']['time4'] = \"" . $_POST['time4']  . "\";\r\n";
            $data .= "\$core['slider']['other_info4'] = \"" . $_POST['other_info4']  . "\";\r\n";    
            $data .= "?>";
            fwrite($new_db, $data);
            fclose($new_db);
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=slider_settings');
        }      
    }
    
} else {
    if (isset($_POST['module_active'])) {
        require('../engine/slider_config.php');
        $new_db = fopen("../engine/slider_config.php", "w");
        $data   = "<?\r\n";
            $data .= "\$core['slider']['on_off'] = \"" . $core['config']['on_off'] . "\";\r\n";
            $data .= "\$core['slider']['link1'] = \"" . $_POST['link1']  . "\";\r\n";            
            $data .= "\$core['slider']['image1'] = \"" . $_POST['image1']  . "\";\r\n";
            $data .= "\$core['slider']['title1'] = \"" . $_POST['title1']  . "\";\r\n";
            $data .= "\$core['slider']['time1'] = \"" . $_POST['time1']  . "\";\r\n";
            $data .= "\$core['slider']['other_info1'] = \"" . $_POST['other_info1']  . "\";\r\n";
            $data .= "\$core['slider']['link2'] = \"" . $_POST['link2']  . "\";\r\n";            
            $data .= "\$core['slider']['image2'] = \"" . $_POST['image2']  . "\";\r\n";
            $data .= "\$core['slider']['title2'] = \"" . $_POST['title2']  . "\";\r\n";
            $data .= "\$core['slider']['time2'] = \"" . $_POST['time2']  . "\";\r\n";
            $data .= "\$core['slider']['other_info2'] = \"" . $_POST['other_info2']  . "\";\r\n";
            $data .= "\$core['slider']['link3'] = \"" . $_POST['link3']  . "\";\r\n";            
            $data .= "\$core['slider']['image3'] = \"" . $_POST['image3']  . "\";\r\n";
            $data .= "\$core['slider']['title3'] = \"" . $_POST['title3']  . "\";\r\n";
            $data .= "\$core['slider']['time3'] = \"" . $_POST['time3']  . "\";\r\n";
            $data .= "\$core['slider']['other_info3'] = \"" . $_POST['other_info3']  . "\";\r\n";
            $data .= "\$core['slider']['link4'] = \"" . $_POST['link4']  . "\";\r\n";            
            $data .= "\$core['slider']['image4'] = \"" . $_POST['image4']  . "\";\r\n";
            $data .= "\$core['slider']['title4'] = \"" . $_POST['title4']  . "\";\r\n";
            $data .= "\$core['slider']['time4'] = \"" . $_POST['time4']  . "\";\r\n";
            $data .= "\$core['slider']['other_info4'] = \"" . $_POST['other_info4']  . "\";\r\n";    
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        
        $new_db2 = fopen("../engine/cms_data/maintenance/maintenance.cms", "w");
        fwrite($new_db2, stripslashes($_POST['reason']));
        fclose($new_db2);
    }
    
    require('../engine/slider_config.php');
    echo '<form action="" name="slider_settings" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Turn your Configuration Slider On and Off</td>
</tr>
<tr>';
    if ($core['config']['on_off'] == '1') {
        echo '<td align="left" class="panel_buttons" style="background: #0C0;"><b>Configuration Slider is active.</b></td>
<td align="right" class="panel_buttons" style="background: #0C0;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Configuration Slider Off"><input type="hidden" name="module_active" value="0">';
        
        
    } elseif ($core['config']['on_off'] == '0') {
        echo '<td align="left" class="panel_buttons" style="background: #C00;"><b>Configuration Slider is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #C00;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Configuration Slider On"><input type="hidden" name="module_active" value="1">';
    }
    echo '</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Reason for turning website Off</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Let users know why website is Off.</b>
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><textarea cols="60" rows="3" name="reason">';
    include('../engine/cms_data/maintenance/maintenance.cms');
    echo '</textarea></td>
</tr>


</table>
</form>'; 
    
    
    echo '
<form action="" name="form_edit" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="3">Configuration Slider #1</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Link Slider #1</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="link1" value="' . $core['slider']['link1'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( http://google.com )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Image Slider #1</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="image1" value="' . $core['slider']['image1'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Image name .jpg,.png etc Exeample ( slider.jpg)</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Title Slider #1</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="title1" value="' . $core['slider']['title1'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Time Slider #1</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="time1" value="' . $core['slider']['time1'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( 30 Jun ~ 20 Dec )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Other Info Slider #1</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="other_info1" value="' . $core['slider']['other_info1'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
 <td align="center" class="panel_title" colspan="3">Configuration Slider #2</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Link Slider #2</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="link2" value="' . $core['slider']['link2'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( http://google.com )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Image Slider #2</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="image2" value="' . $core['slider']['image2'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Image name .jpg,.png etc Exeample ( slider.jpg)</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Title Slider #2</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="title2" value="' . $core['slider']['title2'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Time Slider #2</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="time2" value="' . $core['slider']['time2'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( 30 Jun ~ 20 Dec )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Other Info Slider #2</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="other_info2" value="' . $core['slider']['other_info2'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
 <td align="center" class="panel_title" colspan="3">Configuration Slider #3</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Link Slider #3</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="link3" value="' . $core['slider']['link3'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( http://google.com )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Image Slider #3</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="image3" value="' . $core['slider']['image3'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Image name .jpg,.png etc Exeample ( slider.jpg)</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Title Slider #3</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="title3" value="' . $core['slider']['title3'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Time Slider #3</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="time3" value="' . $core['slider']['time3'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( 30 Jun ~ 20 Dec )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Other Info Slider #3</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="other_info3" value="' . $core['slider']['other_info3'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
 <td align="center" class="panel_title" colspan="3">Configuration Slider #4</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Link Slider #4</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="link4" value="' . $core['slider']['link4'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( http://google.com )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Image Slider #4</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="image4" value="' . $core['slider']['image4'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Image name .jpg,.png etc Exeample ( slider.jpg)</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Title Slider #4</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="title4" value="' . $core['slider']['title4'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Time Slider #4</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="time4" value="' . $core['slider']['time4'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">Exeample ( 30 Jun ~ 20 Dec )</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Other Info Slider #4</td>
<td align="left" class="panel_text_alt2" width="25%" valign="top"><input type="text" name="other_info4" value="' . $core['slider']['other_info4'] . '" maxlength="100"></td>
<td align="left" class="panel_text_alt1" width="25%" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="right" class="panel_buttons" colspan="3">
<input type="hidden" name="slider_settings">
<input type="submit" value="Save"></td>
</tr>
</table>
</form>
';
}

?> 
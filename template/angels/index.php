<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<link href="template/<?=$core['config']['template'] ?>/images/rank.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/images/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/images/jquery.nivo.slider.pack.js"></script>
<link href='http://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/images/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/images/themes/default/default.css" type="text/css" media="screen" />
<style>
.sm {}
.sm a { padding:6px;-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;border:1px solid #aba29c;box-shadow:inset 0 0 10px #837b76; font-size:11px;}
.sm a:hover { padding:6px; background:#243802; color:#FFFFFF;-webkit-border-radius: 5px;
-moz-border-radius: 5px;font-size:11px;
border:1px solid #b0a2a2;box-shadow:inset 0 0 10px #000000;
border-radius: 5px;}
.server_name { color:#602010; font-size:11px; font-weight:bold; font-family: Arial;}
.server_ontot { color:red; font-size:11px; font-weight:bold; font-family: Arial;}
.server_stats { color:#3a3a3a; font-size:11px;  font-family: Arial;}
.server_online { color:#200601; font-size:11px;  font-family: Arial;}
.location { color:#2e1812; font-size:13px;  font-family: Arial; font-weight:600}
.welcome { color:#e3d4cc; font-size: 13px; font-weight: 600 ;   font-family: Arial; text-shadow:#000 0px 0px 1px;}
.time { color:#fff; font-size: 13px; font-weight: 500 ;   font-family: Arial; text-shadow:#3f5b0a 0px 0px 1px;}
.tit { color:#602010; font-size: 13px; font-weight: 600 ;   font-family: Arial; padding-left:10px;}
.titime { color:#0e1801; font-size: 11px;   font-family: Arial; padding-right:10px;}
.texts { color:#27130d; font-size: 13px;   font-family: Arial; padding-right:10px;padding-left:10px;}
.shd {text-shadow:#c7beaa 0px 0px 1px;}
.rnk {color:#081101; font-size: 11px;   font-family: Arial;}
.pl { padding-left:10px;}
.p2 { padding-left:5px;}
.bot { margin-top:38px; margin-left:-80px; }
.username {
background:url(template/<?=$core['config']['template'] ?>/images/acc_field.png);
width:214px;
border: 0px;
height:33px;
padding-left:5px;
color: #474747;
font: 11px "Tahoma", Tahoma, Helvetica, sans-serif;
}
.password {
background:url(template/<?=$core['config']['template'] ?>/images/pass_field.png);
width:138px;
border: 0px;
height:33px;
padding-left:5px;
color: #474747;
font: 11px "Tahoma", Tahoma, Helvetica, sans-serif;
}
.password2 {
color: #474747;
font: 11px "Tahoma", Tahoma, Helvetica, sans-serif;
}
.pos { margin-top:-15px; margin-left:65px; }
.sub_{ font-size:11px;
color:#79716b;
text-shadow:#000000 1px 1px 1px;
font-family:Arial, Helvetica, sans-serif;}
.sub_ a , .sub a:hover, .sub a:visited{ font-size:11px;
color:#79716b;
text-shadow:#000000 1px 1px 1px;
font-family:Arial, Helvetica, sans-serif;}
.Estilo1 {color: #009900}
.pos2 { margin-left:-30px;}
</style>
<?php

$link_identifier = mssql_connect($core['db_host'], $core['db_user'], $core['db_password']);
mssql_select_db($core['db_name'], $link_identifier);

if($core['config']['on_off'] == '0' || $core['debug'] == '1'){
    if(isset($_SESSION['admin_login_auth'])){
        echo '<div align="center" style="color: red; background-color: white; padding:2px"><b>Warning: The website is currently turned off!</b></div>';
    }

}

?>
<body bgcolor="#1c1d1c" background="template/<?=$core['config']['template'] ?>/images/bg.jpg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-repeat:no-repeat; background-position:top" onload="MM_preloadImages('template/<?=$core['config']['template'] ?>/images/m11.png','template/<?=$core['config']['template'] ?>/images/m22.png','template/<?=$core['config']['template'] ?>/images/m33.png','template/<?=$core['config']['template'] ?>/images/m44.png','template/<?=$core['config']['template'] ?>/images/m55.png','template/<?=$core['config']['template'] ?>/images/m66.png')">
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/lv_LV/all.js#xfbml=1";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>                     

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="template/<?=$core['config']['template'] ?>/images/fot.jpg" style="background-position:bottom; background-repeat:no-repeat">
  <tr>
    <td><table width="210" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="210" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="template/<?=$core['config']['template'] ?>/images/ml.png" width="190" height="129" /></td>
            <td><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image33','','template/<?=$core['config']['template'] ?>/images/m11.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/m1.png" name="Image33" width="81" height="129" border="0" id="Image33" /></a></td>
            <td><a href="index.php?page_id=register" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image34','','template/<?=$core['config']['template'] ?>/images/m22.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/m2.png" name="Image34" width="88" height="129" border="0" id="Image34" /></a></td>
            <td><a href="index.php?page_id=downloads" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image35','','template/<?=$core['config']['template'] ?>/images/m33.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/m3.png" name="Image35" width="118" height="129" border="0" id="Image35" /></a></td>
            <td><a href="http://www.hastlegames.com/" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image36','','template/<?=$core['config']['template'] ?>/images/m44.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/m4.png" name="Image36" width="69" height="129" border="0" id="Image36" /></a></td>
            <td><a href="webshop/" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image37','','template/<?=$core['config']['template'] ?>/images/m55.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/m5.png" name="Image37" width="108" height="129" border="0" id="Image37" /></a></td>
            <td><a href="index.php?page_id=contact" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image38','','template/<?=$core['config']['template'] ?>/images/m66.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/m6.png" name="Image38" width="122" height="129" border="0" id="Image38" /></a></td>
            <td><img src="template/<?=$core['config']['template'] ?>/images/mr.png" width="190" height="129" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><div align="right"><img src="template/<?=$core['config']['template'] ?>/images/sub_header.png" alt=""  height="281" border="0" /></div></td>
      </tr>
      <tr>
        <td width="961" height="58" background="template/<?=$core['config']['template'] ?>/images/time_date.png" style=" background-repeat:no-repeat; background-position:top" valign="bottom"><table width="546" height="49" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td width="273"><div align="center" class="welcome"><span id="result_box" lang="en" xml:lang="en"><div align="center"><?
          if($user_login == '1'){
              echo '<div class="tmp_left_menu">
         </div>
         <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
         <tr>
         <td align="center" class="zer">Welcome '.$user_auth_id.'. to HastleMU
         </td>
         </tr>
         <tr>
         </tr>
         </table>
         
         ';
          }else{
              echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
             <table width="8%" cellspacing="1" cellpadding="0" border="0" align="center">
  <tr>You are not loged in,</td>
    <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'">Log in</a>
    </td></tr>
</table>
</form>';
          }
          ?></div>
 </span></div></td>
              <td width="45">&nbsp;</td>
              <td width="157"><div align="center" class="time"><?=date('H:i:s') ;?> <?=date('j/m/y') ;?></div></td>
              <td width="71">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="template/<?=$core['config']['template'] ?>/images/content_top.png" width="966" height="15" alt="" /></td>
      </tr>
      <tr>
        <td background="template/<?=$core['config']['template'] ?>/images/content_warp.jpg"><table width="210" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td valign="top"><table width="210" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="693" height="53" background="template/<?=$core['config']['template'] ?>/images/top_slide.png" class="sm"><div align="center"><a href="index.php" class="sm">Inicio</a> - <a href="index.php?page_id=downloads">Descargas</a> - <a href="index.php?page_id=rankings">Rankings</a> - <a href="index.php?page_id=register">Registro</a> - <a href="http://hastlegames.com" target="_blank">Forums</a> - <a href="/webshop">WebShop</a> - <a href="index.php?page_id=guide">Guías</a></div></td>
                  </tr>
                  <tr>
                    <td  width="693" height="255" background="template/<?=$core['config']['template'] ?>/images/slide_bg.png"><div class="slider-wrapper theme-default">
                        <div class="ribbon"></div>
                      <div id="slider" class="nivoSlider"> <img src="template/<?=$core['config']['template'] ?>/images/slide1.png" alt=""  data-transition="fade"> <img src="template/<?=$core['config']['template'] ?>/images/slide2.png" alt=""  data-transition="fade"> <img src="template/<?=$core['config']['template'] ?>/images/slide3.png" alt="" data-transition="fade" /> </div>
                      <div id="htmlcaption" class="nivo-html-caption"></div>
                    </div>
                        <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
      </script></td>
                  </tr>
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/sub_slide.png" width="693" height="24" /></td>
                  </tr>
                  <tr>
                    <td width="693" height="49" background="template/<?=$core['config']['template'] ?>/images/location.png"><table width="358" height="27" border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="326" class="location">MuCore - <div class="pos"><?         
$load_pages = file('engine/cms_data/pag_d.cms');
foreach ($load_pages as $pages_loaded){
    $pages_loaded = explode("¦",$pages_loaded);
    
    if($pages_loaded[3] == $page_check_id){
        $p_loaded_array = preg_split( "/\ /", $pages_loaded[5]); 
        $p_l = '1';
        break;
    }
}
if($p_l == '1'){
$load_mods = file('engine/cms_data/mods.cms');
foreach ($load_mods as $mods_loaded){
    $mods_loaded = explode("¦",$mods_loaded);
    if(in_array($mods_loaded[0],$p_loaded_array)){
        $_c_id_m[] = $mods_loaded[0];
    }else {
        $_c_id_m[] = 'NULL';
    }
}
$co=0;
foreach ($p_loaded_array as $give){
    #echo $give;
    if(in_array($give,$_c_id_m)){
        foreach ($load_mods as $give_me_out){
            $give_me_out = explode("¦",$give_me_out);
            if($give_me_out[0] == $give){
                if($give_me_out[4] == '1'){
                    if($_GET[LOAD_GET_PAGE] == USER_CMS_PAGE && isset($_GET[USER_GET_PAGE])){
                        $construct_title = $secondary_l;
                    }else{
                        $construct_title = $give_me_out[3];
                    }
                
                    echo '<div>
                    '.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</div>';
                }
            }
        }
    }
}
}
?></div></span></td>
                          <td width="43">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td background="template/<?=$core['config']['template'] ?>/images/cms_bg.png"><table width="658" border="0" align="center" cellpadding="4" cellspacing="4">
                        <tr>
                          <td>
                  
<?
          if(CMS_NAVBAR == '1'){
              if(isset($_GET[LOAD_GET_PAGE])){
                      $l_load = file("engine/cms_data/pag_d.cms");
                      foreach ($l_load as $l_name){
                          $l_name = explode("¦",$l_name);
                          if($l_name[3] == $page_check_id){
                              $primary_l = $l_name[2];
                              break;
                          }

                      }
                  }
                  
                  if(isset($_GET[USER_GET_PAGE])){
                      $ti2_td = xss_clean(safe_input($_GET[USER_GET_PAGE],"_"));
                      $l2_load = file("engine/cms_data/mods_uss.cms");
                      foreach ($l2_load as $l2_name){
                          $l2_name = explode("¦",$l2_name);
                          if($l2_name[3] == $ti2_td){
                              $secondary_l = $l2_name[2];
                              break;
                          }
                      }
                  }
                  
                  if(!isset($_GET[LOAD_GET_PAGE])){
                                        #&gt;
                                        $title_p =  '';
                                    }elseif  (isset($_GET[LOAD_GET_PAGE])){
                                        if(isset($_GET[USER_GET_PAGE])){
                                            $usercp_module_title =  str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '';
                                        }else{ $title_p =  '';}
                                    }
                  
              
          }

if($page_check_id != ANNOUNCEMENTS_CMS_PAGE){
    require('engine/announcement_config.php');
if($core['ANNOUNCEMENT']['ACTIVE'] == '1'){
    $ann_file = array_reverse(file('engine/variables_mods/announcements.tDB'));
    $count_ann = '0';
    foreach ($ann_file as $ann){
        $ann = explode("¦",$ann);
        if($ann[3] > time()){
            $ann_found = '1';
            $ann_title = $ann[1];
            $ann_date = $ann[2];
            $ann_id = $ann[0];
;            break;
        }
    }
}
    if($ann_found == '1'){
        echo '
        <div class="tmp_m_content"> 
                    <div  class="tmp_right_title">'.text_announcement.'</div>
                    <div class="tmp_page_content">
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                      <tr>
                      <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.gif" width="38" height="38"></td>
                      <td align="left" style="padding-top: 2px; padding-bottom: 2px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
                      <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
                      </tr>
                      <tr>
                      <td colspan="2"  align="left" style="background-image:url(template/'.$core['config']['template'].'/images/inner_line.jpg); height: 2px;"></td>
                      </tr>
                      
                      ';
        if($core['ANNOUNCEMENT']['AUTHOR'] == '1'){
            echo '<tr>
            <td colspan="2" align="right"><b>'.$core['config']['admin_nick'].'</b> (Administrator)</td>
            </tr>';
            
        }
        echo '</table></div>
                            </div>
                        ';
    }
}
          
$load_pages = file('engine/cms_data/pag_d.cms');
foreach ($load_pages as $pages_loaded){
    $pages_loaded = explode("¦",$pages_loaded);
    
    if($pages_loaded[3] == $page_check_id){
        $p_loaded_array = preg_split( "/\ /", $pages_loaded[5]); 
        $p_l = '1';
        break;
    }
}
if($p_l == '1'){
$load_mods = file('engine/cms_data/mods.cms');
foreach ($load_mods as $mods_loaded){
    $mods_loaded = explode("¦",$mods_loaded);
    if(in_array($mods_loaded[0],$p_loaded_array)){
        $_c_id_m[] = $mods_loaded[0];
    }else {
        $_c_id_m[] = 'NULL';
    }
}
$co=0;
foreach ($p_loaded_array as $give){
    #echo $give;
    if(in_array($give,$_c_id_m)){
        foreach ($load_mods as $give_me_out){
            $give_me_out = explode("¦",$give_me_out);
            if($give_me_out[0] == $give){
                if($give_me_out[4] == '1'){
                    if($_GET[LOAD_GET_PAGE] == USER_CMS_PAGE && isset($_GET[USER_GET_PAGE])){
                        $construct_title = $secondary_l;
                    }else{
                        $construct_title = $give_me_out[3];
                    }
                
                    echo '<div class="tmp_m_content"> 
                    <div class="tmp_page_content">';
                    if($give_me_out[1] == '1'){
                        if(is_file("pages_modules/".$give_me_out[2]."")){
                            include('pages_modules/'.$give_me_out[2].'');
                        }else{
                            echo 'Unable to load module file, reason: not found.';
                        }
                    }elseif ($give_me_out[1] == '0'){
                        if(is_file('engine/cms_data/cms_co/'.$give_me_out[0].'_cms.cms')){
                            include('engine/cms_data/cms_co/'.$give_me_out[0].'_cms.cms');
                        }else{
                            echo 'Unable to load module content, reason: not found.';
                        }
                    }
                    echo '</div> </div>';
                }
            }
        }
    }
}
}
?></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/cms_bgr.png" width="693" height="42" /></td>
                  </tr>
                  <tr>
                    <td height="5"></td>
                  </tr>
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/sub_cms.png" width="693" height="46" /></td>
                  </tr>
                  <tr>
                    <td width="693" height="103" background="template/<?=$core['config']['template'] ?>/images/sub_cms_bg.png" valign="top"><table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="126" class="sub_" valign="top"><ul>
                              <li>Announcements</li>
                              <li>News</li>
                              <li>Events</li>
                              <li><a href="#">Updates </a></li>
                          </ul></td>
                          <td width="126" class="sub_" valign="top"><ul>
                              <li><a href="index.php?page_id=register">Register</a></li>
                              <li><a href="index.php?page_id=lost_password">Lost Password </a></li>
                              </ul></td>
                          <td width="124" class="sub_" valign="top"><ul>
                              <li><a href="index.php?page_id=rankings&amp;rank=guilds">Guilds</a></li>
                            <li><a href="index.php?page_id=rankings">Characters</a></li>
                            <li><a href="index.php?page_id=rankings&killers"Killers</li>
                            <li>Donors</li>
                          </ul></td>
                          <td width="122" class="sub_" valign="top"><ul>
                              <li><a href="index.php?page_id=login">Account</a></li>
                              <li>Characters</li>
                            <li>Bugs</li>
                            <li>Donations</li>
                          </ul></td>
                          <td width="167" class="sub_" valign="top"><ul>
                              <li><a href="http://facebook.com/hastlegames">Facebook</a></li>
                            <li>Tiwtter</li>
                            <li>Forums</li>
                            <li>Yahoo</li>
                          </ul></td>
                        </tr>
                    </table>
                      </td>
                  </tr>
              </table></td>
              <td valign="top"><table width="210" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/right_top.png" width="242" height="10" /></td>
                  </tr>
                  <tr>
                    <td background="template/<?=$core['config']['template'] ?>/images/right_bg.png" height="100%"><table width="210" border="0" align="center" cellpadding="1" cellspacing="1">
                        <tr>
                          <td><img src="template/<?=$core['config']['template'] ?>/images/acc_title.png" width="230" height="33" /></td>
                        </tr>
                        <tr>
                          <td><table width="210" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="template/<?=$core['config']['template'] ?>/images/lg_bt_top.png" width="230" height="1" /></td>
                              </tr>
                              <tr>
                                <td background="template/<?=$core['config']['template'] ?>/images/lg_bg.png"><div align="left"><?
          if($user_login == '1'){
              echo '<div class="tmp_left_menu">
              <ul>';
        $m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','¦');
          $count_m_uss = 0;
        foreach ($m_uss_row_ as $tr){
            explode("¦",$tr);
            $count_m_uss++;
            if($tr[6] == '1'){
                if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
                    echo '<div class="pos2"><li class="line2"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li></div>';
                }
                
            }
        }
        echo ' </ul>
         </div>
         <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
         <tr>
          <td align="left" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">Settings</a></td>
          <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
         </tr>
         </table>
         
         ';
          }else{
              echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
             <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height:25px; padding-left: 2px;" width="130"><input type="text" name="uss_id" maxlength="10" class="username" value="USER ID" OnClick="this.value=\'\'"
></td>
    <td rowspan="2"><div class="bot"><input type="image" src="template/'.$core['config']['template'].'/images/login.png" onclick="uss_login_form.submit();"></div></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 2px;"><input type="password" name="uss_password" class="password" value="muign" OnClick="this.value=\'\'"
 maxlength="12"><input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="border-bottom:1px dashed #2d231c" colspan="2" align="left" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'"><img src="template/'.$core['config']['template'].'/images/reg_new.png" /></a></td>
  </tr>
     <tr>
    <td style="border-bottom:1px dashed #2d231c"  colspan="2" align="left"  class="yellow"><a href="index.php?page_id=register"><img src="template/'.$core['config']['template'].'/images/lostpw.png" /></a></span></td>
  </tr>
</table>
</form>';
          }
          ?></div>
                </td>
                              </tr>
                              <tr>
                                <td><img src="template/<?=$core['config']['template'] ?>/images/lg_bt_top.png" width="230" height="1" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          
                          <td><a href="index.php?page_id=rankings"><img src="template/<?=$core['config']['template'] ?>/images/top_title.png" width="230" height="33" border="0" /></a></td>
                        </tr>
                       
                        <tr>
                          <td><table width="210" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><table width="230" height="30" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                <?
$query=mssql_query("select TOP 10 * from MuOnline.dbo.Character Where ctlcode !='32' and ctlcode !='8' order by Resets desc, cLevel desc");
while($row=mssql_fetch_assoc($query)){
$namez=$row['Name'];
$levelz=$row['cLevel'];
$resetsz=$row['Resets'];

?>
                                      <td width="20" height="30" background="template/<?=$core['config']['template'] ?>/images/rnk_1.png"><div align="center" class="rnk shd"><?=++$count1;?></div></td>
                                      <td width="163" height="30" background="template/<?=$core['config']['template'] ?>/images/rnk_2.png"><div align="left" class="rnk shd pl"><?=$namez?></td></div></td>
                                      <td width="47" height="30" background="template/<?=$core['config']['template'] ?>/images/rnk_3.png"><div align="center" class="rnk shd"><?=$resetsz?></div></td>
                                    </tr>
                                           <?

}
?>
                                                                            </table></td>
                              </tr>
                              <tr>
                                <td><img src="template/<?=$core['config']['template'] ?>/images/rank_line.png" width="230" height="1" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><img src="template/<?=$core['config']['template'] ?>/images/info_title.png" width="230" height="33" /></td>
                        </tr>
                        <tr>
                          <td><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><table width="230" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="85" height="22"><div align="center" class="server_stats"><span id="result_box" lang="ru" xml:lang="ru">Server</span></div></td>
                                      <td width="79"><div align="center" class="server_stats"><span id="result_box" lang="ru" xml:lang="es">Conectados</span></div></td>
                                      <td width="66"><div align="center" class="server_stats"><span id="result_box" lang="ru" xml:lang="es">Estado</span></div></td>
                                    </tr>
                                </table></td>
                              </tr>
                                    <tr>
                                <td width='230' height='20' ><table width='230' border='0' cellspacing='0' cellpadding='0'>
                                    <tr>
                                      <td width='85' class='server_name p2'> Normal </td>
                                      <? $sql = mssql_query("SELECT count(*) FROM MEMB_STAT WHERE ConnectStat = '1'");     
    $online= mssql_result($sql, 0, 0);    ?>
                                      <td width='79'><div align='center' class='server_online '><span class="Estilo1">
                                        <?=$online?></span></div></td>
                                      <td width='66'><div align='center'><?PHP
if (eregi("status/servidor.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require 'engine/global_config.php';

$onlineoffline = "127.0.0.1";
if ($check=@fsockopen($onlineoffline,55901,$ERROR_NO,$ERROR_STR,(float)0.5)) 
    { 
    fclose($check); 
    echo '<img src="template/'.$core['config']['template'].'/images/on.png" />'; 
    }
else 
    { 
    echo '<img src="template/'.$core['config']['template'].'/images/off.png" />'; 
    } 
?></div></td>
                                    </tr>
                                </table></td>
                              </tr>                             
                          </table></td>
                        </tr>
                        <tr>
                          <td><img src="template/<?=$core['config']['template'] ?>/images/fb.png" width="230" height="33" /></td>
                        </tr>
                        <tr><td>
                        <div style="width:230px;">
                        <fb:like send="true" width="230" show_faces="true"></fb:like>
                        </div>
                        </tr>
                        <tr>
                          <td><img src="template/<?=$core['config']['template'] ?>/images/vote.png" width="230"/></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="http://www.xtremetop100.com/"> <img src="http://www.xtremetop100.com/votenew.jpg" border="0" height="51" width="88" /></a><br />
                              <span class="server_online">Vote For Us Every 12 Hours And Earn 1000 Credits</span></div></td>
                        </tr>
                        
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/right_bt.png" width="242" height="9" /></td>
                    
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="template/<?=$core['config']['template'] ?>/images/content_footer.png" width="966" height="203" alt="" /></td>
        
      </tr>
      <tr>
        <td>&nbsp;</td>
        
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
</table>
</body>
</html>
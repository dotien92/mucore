<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="shortcut icon" HREF="l2_favic.html" type="image/x-icon" />
<!-- CSS -->

<style type="text/css" media="all">@import "template/<?=$core['config']['template'] ?>/templates/stress/css/superfis.css";</style>
<style type="text/css" media="all">@import "template/<?=$core['config']['template'] ?>/templates/stress/css/style000.css";</style>
<style type="text/css" media="all">@import "template/<?=$core['config']['template'] ?>/templates/stress/css/rank.css";</style>
<style type="text/css" media="all">
@import "template/<?=$core['config']['template'] ?>/templates/stress/css/dlelinea.css";.style1 {font-size: 13px}
.login_field{
background:url() right;
border: 0px;
padding-top:1px;
padding-bottom:1px;
height: 13px;
width: 118px;
background-color:cec0ac;
border:#666666 dotted 1px;
color: #595959;
padding-left:5px;
font: 11px "Tahoma", Tahoma, Helvetica, sans-serif;
}
input{
border: 0px;
padding-top:2px;
color: #000000;
font: bold 11px "Tahoma", Tahoma, Helvetica, sans-serif;
}
field{
border: 0px;
padding-top:2px;
color: #770001;
font: bold 11px "Tahoma", Tahoma, Helvetica, sans-serif;
}
.buttonscontainer {width: 196px;}

.sidemenu {position:relative;z-index:3;margin:10px -10px 25px; padding-left:12px;}
				.sidemenu dt {position:relative;height:38px;margin:0 -4px;padding:0 28px;line-height:38px; text-decoration:none;}
				.sidemenu dt .bg {position:absolute;left:0;top:0;z-index:1;width:199px;height:38px;background: url(template/<?=$core['config']['template'] ?>/templates/stress/images/sidemenu_title.png) no-repeat 0 0;}
					.sidemenu dt.selected .bg {background: url(template/<?=$core['config']['template'] ?>/templates/stress/images/sidemenu_title_selected.html) no-repeat 0 0; text-decoration:none;}
					.sidemenu dt a {position:relative;z-index:2;line-height:40px;}
					.sidemenu dt span {position:relative;z-index:2;line-height:40px;}
				.sidemenu dd {margin:0 0 13px;padding:0 13px;}
					.sidemenu ul {margin:0;padding:0;list-style-type:none;}
					.sidemenu ul li {padding:0 10px 3px 0;background: url(template/<?=$core['config']['template'] ?>/templates/stress/images/sidemenu_separator.png) no-repeat  ; height:2; width:200px; text-decoration:none;}
						.sidemenu ul li a {margin:0 0 3px;padding:0 0 0 16px;background: url(template/<?=$core['config']['template'] ?>/templates/stress/images/bullit.png) no-repeat 0 3px; text-decoration:none;}
						.sidemenu dd li.selected a {background: url(templates/stress/images/bullit_selected.html) no-repeat 0 3px; text-decoration:none;}
.style5 {color: #422100}
</style>
<!-- JAVASCRIPT -->

<script type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/jquery00.js"></script>
<script type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/superfis.js"></script>
<script type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/jquery01.js"></script>
<script type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/slidevie.js"></script>
<script language="javascript" type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/l2web000.js"></script>
<script type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/menu0000.js"></script>
<script type="text/javascript" SRC="template/<?=$core['config']['template'] ?>/templates/stress/js/dle_ajax.js"></script>
<script type="text/javascript">
var i = 1;
var y = 2;
var status;
$(document).ready(function() { 
$('div#event_frontpage').slideView();
$('#stripTransmitter0 li').each(function() {
$(this).addClass(' teaser_' + i);
i++;
});
});
</script>
</head>
<body class="mainpage">
<div id="foot-repeat">
<div id="allouter">
<div id="top-header"> 
<div class="container">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="92%" valign="top"><div align="left"><span class="style5">
        <marquee direction="left" behavior="scroll">
          <?=build_header_title(); ?> - En busqueda del continente perdidio.
        </marquee></span> </div></td>
    </tr>
  </table>
</div>   
</div>
<div id="outercontent">
<div class="header">
</div>
<div id="dock">
<div id="login">
<!-- SERVERTIME -->
<div align="left" class="style1"><span class="iRg_text style5" id="result_box">Hora del servidor</span><br>
<?=date('H:i j/m') ;?></div>
</div>
<div id="kwickswrap">
<ul id="kwicks" class="kwicks" >
<!-- CONTENTMENU_TOP -->
<li id="kwick1"><a HREF="index.php?page_id=news" title="Game Notice">Notice</a></li>
<li id="kwick2"><a HREF="index.php?page_id=downloads" title="Game Downloads">Download</a></li>
<li id="kwick3"><a HREF="index.php?page_id=register" title="Game Register">Register</a></li>
<li id="kwick4"><a HREF="index.php?page_id=rankings" title="Game Rankings">Rankings</a></li>
<li id="kwick5"><a HREF="index.php?page_id=donate" title="Server Doante">Donate</a></li>
</ul>
</div>
</div>
<div id="maincontent" class="inside">
<div id="maincontent2">             
<div class="container">
<div id="submenu">          
</div>        
<div id="sidebar">
<div id="sidebar-left">
<div id="block-block-2" class="block block-block">
<div class="content"><div style="padding: 0pt 0pt 30px 20px; margin-top: -20px; float: left;">
<a HREF="index.php?page_id=register" title="Usted necesita registrarse,para poder jugar!">
<!-- GAMESTART -->
<img alt="? ???????" SRC="template/<?=$core['config']['template'] ?>/templates/stress/images/o_server.png" /></a></div>
</div>
</div>
<div id="block-views-banner_image" class="block block-views">
<div class="content"><div class='view view-banner-image'><div class='view-content view-content-banner-image'>
<center></center><br>
<!-- LEFTOPTIONS -->
<table width="57%"  border="0" cellpadding="2" cellspacing="2">
<tr>
<td style="padding-left:20px">
<div align="left"><div class="sidemenu"><ul>
  <span class=""><li>
    <?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms','¦');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode("¦",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<li class="list_menu"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="list_menu"><a  href="'.$li[10].'"  target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';
					   	
					   	break;
					   }


					  	
					  }
					  
		  ?>
  </li></span>	</ul>
</div>



</td>
      </tr>
    </table>
    <center>
      <table width="200" height="38" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="36" background="template/<?=$core['config']['template'] ?>/templates/stress/images/sidemenu_title.png"><div align="center" class="style5">Panel de Control </div></td>
        </tr>
      </table>
      <table width="75%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
                  <span style="background-repeat:repeat-y">
                  <?
		  if($user_login == '1'){
		  	echo '<div class="sidemenu"><ul>
  <span class="">';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','¦');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode("¦",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '<li class="list_menu"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
				}
				
			}
		}
		echo '</span></ul>
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td align="left" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td   width="120"><input type="text" size="18" name="uss_id" maxlength="10" class="FlareMU_LoginForm" value="USER ID" OnClick="this.value=\'\'"></td>
    <td width="1171" rowspan="2" valign="middle"><input type="image" src="template/'.$core['config']['template'].'/images/ok.png"  onclick="uss_login_form.submit();"></td>
  </tr>

  <tr>
    <td ><input type="password" name="uss_password" size="18" class="FlareMU_LoginForm" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'">
    <input type="hidden" name="process_login"></td>
  </tr>
<tr>
					  <td colspan="2" style="background-image: url(template/'.$core['config']['template'].'/images/inner_line.png); height: 2px;" align="left"></td>
					  </tr>

    <tr>
    <td style="height: 25px; padding-left: 2px; font-size: 10px;" colspan="2" align="left"> - <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'">'.link_lost_password.'</a<span class="register"><br></span>  - <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'">'.link_sign_up.'</a></td>
  </tr>
<tr>
					  <td colspan="2" style="background-image: url(template/'.$core['config']['template'].'/images/inner_line.png); height: 2px;" align="left"></td>
					  </tr>

</table>
</form>';
		  }
		  ?>
                  </span>
                </td>
            </tr>
          </table></td>
        </tr>
      </table>
      </center>
  </div>
  </div>
</div>
</div>



<div id="block-views-banner_image_text" class="block block-views">


  <div class="content"><div class='view view-banner-image-text'><div class='view-content view-content-banner-image-text'>
        <div align="center"></div>
  </div></div>
</div>
</div>
  </div>
</div> 
            	
          <div id="mainbar"><span id='dle-info'></span>
<div id='dle-content'><div class="in-content">
<!-- CONTENT -->
              <div class="in-content-bottom">
                                <div id="contentbar">
                                                                        <div class='view view-news-index'>
<div class='view-content view-content-news-index'><ul class="newslist resultlist">
       <li>
<div id='news-id-7'>
  <span style="font-size: small;">
<table width="100%" cellpadding="0" cellspacing="0" class="news_tab">
<tr>
	<td class="news_title"><center>
	  <table width="619" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50"><img src="template/<?=$core['config']['template'] ?>/templates/stress/images/inside-b.png" width="37" height="67" /></td>
          <td width="473"><div align="center">
            <table width="359" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="84" class="iR_rank_type"><div align="center">
                  <?=build_header_title(); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
          </div></td>
        </tr>
      </table>
	</center></td>
</tr>
<tr>
	<td class="news_content" colspan="2">
                  <div class="tmp_m_content">
                    <div class="tmp_page_content"><center>
      </center></div> </div><div class="tmp_m_content">
        <div class="tmp_page_content"><span class="tmp_right_side1">
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
                  echo '
                  
                  <div class="where_nav">
                  <table cellpadding="0" cellspacing="0" border="0" >
                  <tr>
                  <td width="100%" align="left">'.$title_p.'</td>
                  </table>
                  </div>';
		  	
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
;			break;
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
					 <div  class="tmp_right_title">'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</div>
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
?>
		</span>
          
        </div> 
                    </div></p>
	  <br></td>
</tr>
</table>
</span></div>
</li>
                        	
                        
                        </ul>
</div>
                                                                        </div>
                 </div>
              </div>
            </div></div>
            
                
           </div>
          <div class="clear"></div>
        </div>
      </div> 
    </div>
    <div class="clear"></div>
    <div id="footerouter">
      <div id="footer">
        <div class="container">
          <p>
          <div align="center" class="footer_font">
<b><?=build_footer(),$XX= base64_decode('');?></b>
</div>
          </p>
        </div>

	   
      </div>
</div>
    </div>
  </div>
</div>
</div>
</body>

</html>

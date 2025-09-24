<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0054)http://perfectworld.vendettagn.com/tos.php?ckattempt=1 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<?
mssql_connect($core['db_host'],$core['db_user'],$core['db_password']);
mssql_select_db($core['db_name']);
?>
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
	<link rel="shortcut icon" href="http://perfectworld.vendettagn.com/index_files/icon.png" type="image/x-icon">
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/index_files/jquery.min.js"></script><style type="text/css"></style>
	<link href="template/<?=$core['config']['template'] ?>/index_files/css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/index_files/perfect_world.css">
	<script type="text/javascript">
	<!--
	function clock() {
		document.write('<div id="clock"></div>');
		// here's the PHP code that spawn out the server local time
				// now we represent the server time as javascript date
		var server = new Date(2013, 8, 21, 1, 34, 30).getTime();
		// calculate the client time
		var client = new Date().getTime();
		// run our ticker
		tick(client-server);
	}
	function tick(diff) {
		var d = new Date(new Date().getTime()-diff);
		var i = d.getMinutes(); if(i < 10) i='0'+i;
		var s = d.getSeconds(); if(s < 10) s='0'+s;
		var clock = document.getElementById("clock");
		if(clock) {
			clock.innerHTML=''+
			d.getHours()+':'+i+':'+s;
			setTimeout('tick(' + diff + ');', 1000);
		}
	}
	//-->
	</script>
</head>
<body>
	<div id="wrapper">
		<div id="nav_menu">
			<div id="menu">
  				<div align="center">
					<a href="index.php">Inicio</a><a href="index.php?page_id=register">Reg&iacute;strate</a> <a href="index.php?page_id=rankings">Rankings</a> <a href="http://foro.musephirot.com" target="_blank">Foro</a><a href="index.php?page_id=user_cp&amp;panel=votar">Votar por Cr&eacute;ditos</a> <a href="index.php?page_id=contact">Cont&aacute;ctanos</a> <a href="index.php?page_id=webshop">Tienda</a></div>
			</div>
		</div>
		<div id="header"></div>
			<div id="left_side">
				<a href="index.php?page_id=downloads"><div id="game_start"></div></a>
				<div id="red_module_top">
				  <div id="module_title">Panel de Usuario</div></div>
					<div id="red_module_bg">
						<div id="module_area">
															<table width="700" border="0" cellspacing="0" cellpadding="0">
		  	  <?
		  if($user_login == '1'){
		  	echo '
		  	';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','¦');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode("¦",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '<li><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'" id="lost">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a>';
				}
				
			}
		}
		echo ' 
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td align="left" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'" id="lost">'.link_account_settings.'</a></td>
		  <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout" id="lost">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 2px;  " width="130"><input type="text" name="uss_id" maxlength="10" id="login_field" value="Usuario" OnClick="this.value=\'\'"></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 2px;"><input type="password" name="uss_password" id="login_field" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
  </tr>
      <td><input type="image" src="template/'.$core['config']['template'].'/index_files/login.jpg" width="219" height="34" onclick="uss_login_form.submit();"></td>
 </tr>
  <tr>
<td>
<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'" id="lost"><img src="template/'.$core['config']['template'].'/index_files/pass.jpg"></a>
</td>
 </tr>
  <tr>
<td>
<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'" id="lost"><img src="template/'.$core['config']['template'].'/index_files/new.jpg"></a>
</td>
  </tr>
</table>
</form>';
		  }
		  ?>
		  	</form>
		  	</td>
                  <td style="border-style: none; border-width: medium" width="36">&nbsp;</td>
                </tr>
              </table>
						  <tr><td>&nbsp;						  </td></tr>
									
								</tbody></table>
													</div>
					</div>
				<div id="red_module_bt"></div>
				<div id="gray_module_top">
				  <div id="module_title">Estad&iacute;sticas</div></div>
				<div id="gray_module_bg">
					<div id="module_area">
						<div id="nfo2"><div id="sts">Servidor Normal</div><div id="sts2"><? include("server/servidor.php"); ?></div></div>
                        
						<div id="nfo1"><div id="sts">Servidor Vip</div><div id="sts2"><? include("server/servidor.php"); ?></div></div>
                        <div id="nfo2"><div id="sts">Servidor CS</div><div id="sts2"><? include("server/servidor.php"); ?></div></div>
						<br>
					</div>
				</div>
				<div id="gray_module_bt"></div>
				<div id="gray_module_top">
				  <div id="module_title">Caracter&iacute;sticas</div></div>
				<div id="gray_module_bg">
					<div id="module_area">
						<div id="nfo2">
						  <div id="sts">Experiencia</div>
						  <div id="sts2">1700x</div></div>
						<div id="nfo1">
						  <div id="sts">Drop</div>
						  <div id="sts2">70%</div></div>
						<div id="nfo2">
						  <div id="sts">Jewel Drop</div>
						  <div id="sts2">70%</div></div>
						<div id="nfo1"><div id="sts">Gold</div>
						<div id="sts2">10x</div></div>
						<div id="nfo2"><div id="sts"></div></div>
					</div>
				</div>
				<div id="red_module_bt"></div>
				<div id="left_side_bt"></div>
			</div>
		<div id="slide_bg">
			<div id="slide_padding">
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivoSlider">
						<img src="template/vendetta/index_files/slide/slide_1.jpg" data-thumb="template/vendetta/index_files/slide/slide_1.jpg" alt="" data-transition="fade" style="display: none; width: 683px;">
						<img src="template/vendetta/index_files/slide/slide_2.jpg" data-thumb="template/vendetta/index_files/slide/slide_2.jpg" alt="" data-transition="fade" style="display: none; width: 683px;">
						<img src="template/vendetta/index_files/slide/slide_3.jpg" data-thumb="template/vendetta/index_files/slide/slide_3.jpg" alt="" data-transition="fade" style="display: none; width: 683px;">
					</div>
				</div>
			</div>
    			<script type="text/javascript" src="template/vendetta/index_files/jquery.nivo.slider.js"></script>
    			<script type="text/javascript">
				$(window).load(function() {
				$('#slider').nivoSlider();
				});
			</script>
		</div>
		<div id="page_title"><div id="t_c"><div align="right">
				<div id="g_tile_c">Mu SephiroT-X</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div id="center_modules">
          <p>
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
                                        $title_p =  '<a  href="'.$core['config']['website_url'].'" id="lost">'.$core['config']['websitetitle'].'</a>';
                                    }elseif  (isset($_GET[LOAD_GET_PAGE])){
                                        if(isset($_GET[USER_GET_PAGE])){
                                            $usercp_module_title =  str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '<a  href="'.$core['config']['website_url'].'" id="lost">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'" id="lost">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'" id="lost">'.$usercp_module_title.'</a>';
                                        }else{ $title_p =  '<a  href="'.$core['config']['website_url'].'" id="lost">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'" id="lost">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';}
                                    }
                  echo '
                  
                  <div class="where_nav">
                  <table cellpadding="0" cellspacing="0" border="0" >
                  <tr>
                  <td align="left"><img src="template/'.$core['config']['template'].'/index_files/arrow.gif" border="0"></td>
                  <td>&nbsp;</td>
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
					  <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/index_files/announcement.gif" width="38" height="38"></td>
					  <td align="left" style="padding-top: 2px; padding-bottom: 2px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
					  <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
					  </tr>
					  <tr>
					  <td colspan="2"  align="left" style="background-image:url(template/'.$core['config']['template'].'/index_files/inner_line.jpg); height: 2px;"></td>
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
					<div id="lost">';
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
            </p>
          </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
		</div>
		<div id="social">
	  		<div align="right" style="padding-right:23px;"><img src="template/<?=$core['config']['template'] ?>/index_files/spacer.gif" width="102" height="63" border="0" usemap="#Map">
				<map name="Map" id="Map">
					<area shape="circle" coords="50,47,14" href="#" target="_blank">
					<area shape="circle" coords="15,48,14" href="http://www.facebook.com/MuSephirotx" target="_blank">
				</map>
			</div>
		</div>
	</div>
</div>
<div id="footer"><div id="footer_c"><div id="footer_links"><div id="f_left"><a href="/index.php?page_id=contact" id="f">Contact Us</a></div><div id="f_right"><a href="http://foro.musephirot.com" id="f" target="_blank">Forums</a></div>
</div>
<div id="copy">Template Adaptada y Modificada por M4NU31</div>
</div>
</div>

<style>.myToolbar {z-index:100000} .myToolbar .tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden}</style><style>.tb_button {padding:2px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}</style></body></html>
<!-- 
************************* WWW.LINKSFIRE.NET *************************
************************* WWW.LINKSFIRE.NET *************************
************************* WWW.LINKSFIRE.NET *************************
************************* WWW.LINKSFIRE.NET *************************
 -->
<?
mssql_connect($core['db_host'],$core['db_user'],$core['db_password']);
mssql_select_db($core['db_name']);
?>
<?php require_once("config/config.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>

	<link type="text/css" rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/arclordGame305a.css?_=080516" />
		<link type="text/css" rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/menu.css" />
<script src="template/<?=$core['config']['template'] ?>/Scripts/jquery-1.6.2.min.js"></script>
<script src="template/<?=$core['config']['template'] ?>/Scripts/menu.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>

	<style type="text/css">
		.popLayerBox {position:absolute; left:50%; top:500px; margin:-263px 0 0 -305px; display: none; z-index: 10000000;}
		.popLayerBox iframe {margin:0;padding:0;}	
	</style>
</head>
<body>
<div id="siteVisualWrap">
	<div id="siteVisualConts">
		<div class="G_ContsWrap">
			<div class="space363"></div>
			<div id="menu">
    <ul class="menu">
    <li><a href="<?=ROOT_INDEX?>"><span><?=link_home;?></span></a></li>
        <li><a href="" class="parent"><span><?php echo MENU_LENGUAJE_NOVEDADES;?></span></a>
            <div><ul>
                <li><a href="<?=ROOT_INDEX?>"><span><?php echo text_notice;?></span></a></li>
                <li><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE  ?>"><span><?php echo text_announcement;?></span></a></li>
            </ul></div>
        </li>
        
        
              <li><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings" class="parent"><span><?php echo MENU_LENGUAJE_RANKINGS;?></span></a>
            <div><ul>
                <li><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings"><span><?php echo MENU_LENGUAJE_RANKINGS_PERSONAJES;?></span></a></li>
                <li><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings&rank=guilds"><span><?php echo MENU_LENGUAJE_RANKINGS_GUILDS;?></span></a></li>
            </ul></div>
        </li>
       
       
                     <li><a href="" class="parent"><span><?php echo MENU_LENGUAJE_JUGAR;?></span></a>
            <div><ul>
                <li><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE  ?>"><span><?=link_new_account;?></span></a></li>
                <li><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads"><span><?php echo MENU_LENGUAJE_JUGAR_DESCARGAR;?></span></a></li>
            </ul></div>
        </li>
       
           <li><a href="<?php echo MENU_LINK_CUSTOM1;?>"><span><?php echo MENU_NOMBRE_CUSTOM1;?></span></a></li>
           
        <li><a href="<?php echo MENU_LINK_CUSTOM2;?>" class="parent"><span><?php echo MENU_NOMBRE_CUSTOM2;?></span></a>
            <div><ul>
                <li><a href="<?php echo MENU_LINK_CUSTOM2_SUB1;?>"><span><?php echo MENU_NOMBRE_CUSTOM2_SUB1;?></span></a></li>
                <li><a href="<?php echo MENU_LINK_CUSTOM2_SUB2;?>"><span><?php echo MENU_NOMBRE_CUSTOM2_SUB2;?></span></a></li>
                <li><a href="<?php echo MENU_LINK_CUSTOM2_SUB3;?>"><span><?php echo MENU_NOMBRE_CUSTOM2_SUB3;?></span></a></li>
                <li><a href="<?php echo MENU_LINK_CUSTOM2_SUB4;?>"><span><?php echo MENU_NOMBRE_CUSTOM2_SUB4;?></span></a></li>
            </ul></div>
        </li>
    </ul><div style="visibility:hidden">
  <p><a href="http://apycom.com/">.</a></p>
</div>
</div>
			<div id="contentStart">
				<div class="gContsBodyDiv">
					<section id="gContsBodyWrap">
				<section class='gContsViewWrap'>
						<?php 

if(isset($_GET['page_id'])){
   switch ($_GET['page_id']) {
   }
}else{
  include('imagesl.php');
}

?>
<div class="contenidolf1">
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
                  	$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>';
                  }elseif (isset($_GET[LOAD_GET_PAGE])){
                  	if(isset($_GET[USER_GET_PAGE])){
                  		$usercp_module_title = str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a> &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a> &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
                  	}else{
                  		$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a> &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';
                  	}
                  }
                  echo '
                  
                  <div class="where_nav">
                  <table cellpadding="0" cellspacing="0" border="0" >
                  <tr>
                  <td align="left"><img src="template/'.$core['config']['template'].'/images/arrow.gif" border="0"></td>
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
					<div class="tmp_right_title"><h2>'.text_announcement.'</h2></div>
					<div class="article_body">
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
					  <tr>
					  <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.gif" width="38" height="38"></td>
					  <td align="left" style="padding-top: 2px; padding-bottom: 2px;" class="ann_titulo"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
					  <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
					  </tr>
					  <tr>
					  <td colspan="2"  align="left" style="background-image:url(template/'.$core['config']['template'].'/images/inner_line.jpg); height: 2px;"></td>
					  </tr>
					  
					  ';
		if($core['ANNOUNCEMENT']['AUTHOR'] == '1'){
			echo '<tr>
			<td height="40" colspan="2" align="right"><b>'.$core['config']['admin_nick'].'</b> (Administrator)</td>
			</tr>';
			
		}
		echo '</table></div>
							</div><div style=" height: 1px;"> </div>
						<p>';
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
						  
						  echo '</p>
						
					<div class="tmp_m_content"> 
					<div class="tmp_right_title"><h2>'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</h2></div>
					<div class="article_body">';
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
		echo '</div> </div>			<div style=" height: 1px;"> </div>
		';
				}
			}
		}
	}
}
}
?>
</div>
				</section>
					<section class="gContsSideWrap">
	<article class="mainRankingWrap">
		<h2>
		  <div align="center" class="mainrankingflechaind"><img src="template/<?=$core['config']['template'] ?>/images/sub_nav_title_bg.gif" width="24" height="18"><?=text_member_area; ?><img src="template/<?=$core['config']['template'] ?>/images/sub_nav_title_bg2.gif" width="24" height="18"></div></h2>
		<div class="mainRankingArae">
			<div class="mainRankingBox" id="ranking_Tabbox">	<div id="region_sidebar">
            <div class="view-content">
      <div class="item-list">
			<ul> <?
		  if($user_login == '1'){
		  	echo '<div class="tmp_left_menu">
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','¦');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			#explode("¦",$tr);
			
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					if($tr[7] != '1'){
						echo '<li class="list_menu"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
					}
				}
				
			}
		}
		echo ' </ul>
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td style="padding-left:15px; padding-bottom:5px; padding-top:5px;" align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td style="padding-right:25px; padding-bottom:5px;padding-top:5px;" align="right" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 30px; padding-top:6px;" width="130"><input name="uss_id" type="text" id="pvp-login-username" style="width:150px" OnClick="this.value=\'\'" value="USER ID" maxlength="10" ></td>
    <td rowspan="2"><input type="image" src="template/'.$core['config']['template'].'/images/login.png" width="55" height="55" onclick="uss_login_form.submit();" style=" padding-left:10PX;  padding-top:5pX"></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 30px;"><input type="password" name="uss_password"  style="width:150px" id="pvp-login-username" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="height: 25px; padding-left: 20px;" colspan="2" align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'">'.link_lost_password.'</a></td>
  </tr>
     <tr>
    <td style="height: 25px; padding-left: 20px;" colspan="2" align="left"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'">'.link_sign_up.'</a></td>
  </tr>
</table>
</form>';
		  }
		  ?></ul>
			</div></div>
	</div></div>
		</div>
	</article>
</section><section class="gContsSideWrap">
						

	<article class="mainRankingWrap2">
		<h2>  <div align="center" class="mainrankingflechaind2"><img src="template/<?=$core['config']['template'] ?>/images/sub_nav_title_bg.gif" width="24" height="18"><?=text_menu?><img src="template/<?=$core['config']['template'] ?>/images/sub_nav_title_bg2.gif" width="24" height="18"></div></h2>
		<div class="mainRankingArae">
			<div class="mainRankingBox" id="ranking_Tabbox"> 
            					<div id="region_sidebar">
            <div class="view-content">
      <div class="item-list">
					<ul><?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms','¦');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode("¦",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<li class="list_menu"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="list_menu"><a href="'.$li[10].'" target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li> ';
					   	
					   	break;
					   }


					  	
					  }
					  
		  ?>
					</ul>
				
                </div></div></div>
                    
  </div></div>
	</article>
    <?
$load_pages_lef = file('engine/cms_data/pag_d.cms');
foreach ($load_pages_lef as $pages_loaded_lef){
	$pages_loaded_lef = explode("¦",$pages_loaded_lef);
	if($pages_loaded_lef[3] == $page_check_id){
		$p_loaded_array_lef = preg_split( "/\ /", $pages_loaded_lef[4]); 
		$p_l_lef = '1';
		break;
	}
}
if($p_l_lef == '1'){
$load_mods_lef = file('engine/cms_data/mods.cms');
foreach ($load_mods_lef as $mods_loaded_lef){
	$mods_loaded_lef = explode("¦",$mods_loaded_lef);

	if(in_array($mods_loaded_lef[0],$p_loaded_array_lef)){
		$_c_id_m_lef[] = $mods_loaded_lef[0];
	}else {
		$_c_id_m_lef[] = 'NULL';
	}
}
$co=0;
foreach ($p_loaded_array_lef as $give_lef){
	#echo $give;
	if(in_array($give_lef,$_c_id_m_lef)){
		foreach ($load_mods_lef as $give_me_out_lef){
			$give_me_out_lef = explode("¦",$give_me_out_lef);
			if($give_me_out_lef[0] == $give_lef){
				if($give_me_out_lef[4] == '1'){
					echo '
		
		<div align="center" class="mainrankingflechaind3"> <div class="mainRankingWrap3"><h2><p><img src="template/'.$core['config']['template'].'/images/espaciomenumodulo.png"></p> <img src="template/'.$core['config']['template'].'/images/sub_nav_title_bg.gif">'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out_lef[3])).'<img src="template/'.$core['config']['template'].'/images/sub_nav_title_bg2.gif"></h2></div></div>
	
		 <div class="mainRankingBox">
			<div class="mainRankingAraemod">';
				
					
				if($give_me_out_lef[1] == '1'){
					$mod_file_lef = $give_me_out_lef[2];
					if(is_file('pages_modules/'.$mod_file_lef.'')){
						include('pages_modules/'.$mod_file_lef.'');
					}else{
						echo 'Unable to load module file, reason: not found.';
					}
				}elseif ($give_me_out_lef[1] == '0'){
					if(is_file('engine/cms_data/cms_co/'.$give_me_out_lef[0].'_cms.cms')){
						include('engine/cms_data/cms_co/'.$give_me_out_lef[0].'_cms.cms');
					}else{
						echo 'Unable to load module content, reason: not found.';
					}
					
					#echo $give_me_out_lef[4];
				}
				
				echo '</div></div>';
				}
			}
		}
		#echo $module;
	}
}
}
      ?>
					</section>
				</div>
			</div>
			<article class="gLogo"><a href="<?=ROOT_INDEX?>"><img src="template/<?=$core['config']['template'] ?>/images/space.gif" width="270" height="105" alt="Archlord"></a></article>
			<article id="gStarter"><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE  ?>" title="<?=link_new_account;?>" onFocus="this.blur();"></a></article>
			<article id="gDownload"><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads" title="<?php echo MENU_LENGUAJE_JUGAR_DESCARGAR;?>" onFocus="this.blur();" rel="nofollow"></a></article>
			<!-- s:GST -->
		  <article id="gGST_Wrap">
				<div class="gGST_BoxOff">
				      <td colspan="0"><table align="center" style="width: 100%;" cellspacing=;"0" cellpadding="0">
					              <tr>
					                                               
				                  <tr>
					                  <td class="style16" ><table style="width: 100%; text-align:left;" cellspacing="0" cellpadding="0">
					                    <tr>
					                      <td width="179" class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_SERVER;?></strong>:</td>
					                      <td width="52" class="stadisticas_td_bg" style="width: 52px"><? include("config/servidor.php"); ?></td>
				                        </tr>
					                  
					                    <tr>
					                      <td class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_SERVERCS;?></strong>:</td>
					                      <td class="stadisticas_td_bg"><? include("config/estadocs.php"); ?></td>
				                        </tr>
					                    <tr>
					                      <td></td>
					                      <td></td>
				                        </tr>
					                    <tr>
					                      <td class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_SERVERVIP;?></strong>:</td>
					                      <td class="stadisticas_td_bg"><? include("config/servidorvip.php"); ?></td>
				                        </tr>
			
					                    </table>
					                    <table  style="width: 100%; text-align:left;" cellspacing="0" cellpadding="0">
					                      <tr>
					                        <?
//Estadisticas Usuarios

$statistics_accounts=mssql_query("SELECT count(*) memb___id FROM MuOnline.dbo.MEMB_INFO");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['accounts_reults']=$row['memb___id'];
?>
					                        <td width="224" class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_CUENTAS;?></strong>:</td>
					                        <td width="233" class="stadisticas_td_bg"><?=$core['accounts_reults'];?></td>
					                        <?

}
?>
				                          </tr>
					                
					                      <tr>
					                        <?
//Estadisticas Personajes

$statistics_accounts=mssql_query("SELECT count(*) AccountID FROM MuOnline.dbo.Character");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['character_reults']=$row['AccountID'];
?>
					                        <td class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_PERSONAJES;?></strong>:</td>
					                        <td class="stadisticas_td_bg"><?=$core['character_reults'];?></td>
					                        <?

}
?>
				                          </tr>
					                    
					                      <tr>
					                        <?
//Estadisticas Clanes

$statistics_accounts=mssql_query("SELECT count(*) G_Name FROM MuOnline.dbo.Guild");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['guild_reults']=$row['G_Name'];
?>
					                        <td class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_CLANES;?></strong>:</td>
					                        <td class="stadisticas_td_bg"><?=$core['guild_reults'];?></td>
					                        <?

}
?>
				                          </tr>

					                      <tr>
					                        <?
//Estadisticas Usuarios Conectados

$statistics_players=mssql_query("SELECT count(*) ConnectStat FROM MuOnline.dbo.MEMB_STAT WHERE ConnectStat='1'");
while($row=mssql_fetch_assoc($statistics_players)){
$core['config']['statistics_results']=$row['ConnectStat'];
?>
					                        <td class="stadisticas_td_bg"><strong><?php echo EDS_LENGUAJE_TOTALONLINE;?></strong>:</td>
					                        <td class="stadisticas_td_bg"><?=$core['config']['statistics_results'];?></td>
					                        <?

}
?>
				                          </tr>
					                 
				                        </table></td>
				                  </tr>
					           <td style="height:5px;"></td>
					              </table>
				</div>
		  </article>
		</div>
	</div>
</div>
<div id="siteVisualBottom"><div class="visualBottom"></div></div>
<div id="layerBack" style="display: none; position: absolute; left: 0; top: 0; z-index: 100000; opacity: 0.7; filter:alpha(opacity=70); height: 1500px; background-color: rgb(0, 0, 0); width: 100%;"></div>
<div id="popLayerBox" class="popLayerBox">
	<iframe src="about:blank" width="600" height="500" scrolling="no" frameborder="0" name="ipopLayerBox" id="iScpopup"></iframe>
    <input type="hidden" id="hGameID" value="1"/>
</div>
<div align="center" style="
margin-top:60px;padding-top:22px;
min-width:1010px;  padding-bottom:20px; background: url(template/<?=$core['config']['template'] ?>/images/footer_bg.jpg)">
  <p>
    <?=build_footer();?>
  </p>
  <p>&nbsp;</p>
  <h4>Template by <strong><a href="http://linksfire.net/">linksfire.net</a></strong></h4>
</div>
</body>
</html>

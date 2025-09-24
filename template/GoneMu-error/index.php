<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" media="screen" type="text/css" href="template/<?=$core['config']['template'] ?>/css/main.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="template/<?=$core['config']['template'] ?>/css/core_plugins.css" />
		<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/overlib/overlib.js"></script>
		<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/main.js"></script>
	    <style type="text/css">
<!--
.Estilo39 {font-family: Arial, Helvetica, sans-serif}
.Estilo40 {color: #c5c0ad}
.Estilo41 {font-weight: bold}
.tmp_left_m {}
.tmp_left_title {background:url(template/<?=$core['config']['template'] ?>/imagesnew/left_title_bg.jpg); height:39px; width:228px; font: 13px/33px Tahoma, Helvetica, sans-serif; text-align:center; color:#fff }
.tmp_right_side {padding:3px;}
.Estilo43 {color: #FFFF00}
.Estilo44 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
        </style>
</head>

	<body>
	<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
		<div id="main">
			<div id="header"></div>
			<div class="leftPart">
		      <div class="accountLogin">
		        <table width="100%" border="0">
                                    <tr>
                                      <td width="32">&nbsp;</td>
                                      <td width="1050">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="32">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="32">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="32"><img src="template/<?=$core['config']['template'] ?>/images/space_login.png" border="0"></td>
                                      <td align="center"><div align="left"><span class="general">
                                        <?
		  if($user_login == '1'){
		  	echo '';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '';
				}
				
			}
		}
		echo 'Bienvenido '.$_SESSION['user_auth_id'].', <br>Disfruta del Juego...';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
<table cellpadding="0" cellspacing="0" width="277">
<tr>
<td style="padding-bottom:0px;">
<input type="text" name="uss_id" maxlength="10" value="Usuario"  style="background-color:#0c0c0c; border-color:#373737; color:#766b52; height:18px; font-size:12px; padding-top:3px; padding-left:3px;" OnClick="this.value=\'\'">
</td></tr>
<tr><td style="padding-bottom:0px;">
<input type="password" name="uss_password" class="login_field" value="Password" size="16" maxlength="10" style="background-color:#0c0c0c; border-color:#373737; color:#766b52; height:18px; font-size:12px; padding-top:3px; padding-left:3px;" OnClick="this.value=\'\'"><input type="hidden" name="process_login">
</td></tr>
<td style="padding-bottom:0px;">
<input type="image" src="template/'.$core['config']['template'].'/images/submit_button.png" style="height:24px;width:54px;padding:0px;border:0px;cursor:pointer;" onclick="uss_login_form.submit();"></td></tr></table></form>';
		  }
		  ?>
                                      </span></div></td>
                                    </tr>
                                  </table>
		      </div>
			    <div class="mainMenu">
				<div class="mainMenuItemList">
								<div class="menuLinkOuter"><a href="index.php"><span class="Estilo39">
								  <?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms',',');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode(",",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<li class="d2_mnu"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="d2_mnu"><a  href="'.$li[10].'"  target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';
					   	
					   	break;
					   }


					  	
					  }
					  
		  ?>
								</span></a></div>
								<div class="menuLinkOuter"></div>
				  </div>
			    </div>
			</div>
			<div class="rightSide">
			    <div class="statistics">
					<div class="statsText">
					  <table width="100%" border="0">

                          <tr>
                            <td width="47%"><span class="Estilo44">Server FREE: </span></td>
                            <td width="53%"><strong>
                              <? include("server/servidor.php"); ?>
                            </strong></td>
                          </tr>
                          <tr>
                            <td><span class="Estilo44">Server CS: </span></td>
                            <td><strong>
                              <? include("server/servidorcs.php"); ?>
                            </strong></td>
                          </tr>
                          <tr>
                            <td><span class="Estilo44">Server VIP: </span></td>
                            <td><strong>
                              <? include("server/servidorvip.php"); ?>
                            </strong></td>
                          </tr>
                        </table>
				  </div>
			    </div>
			    <div class="top20">
					<div class="top20text">
													<div class="top20Entity">
													  <table width="160" align="left">
                                                        <tr>
                                                          <?
$query=mssql_query("select TOP 20 * from MuOnline.dbo.Character Where ctlcode !='32' and ctlcode !='8' order by Resets desc, cLevel desc");
while($row=mssql_fetch_assoc($query)){
$namez=$row['Name'];
$levelz=$row['cLevel'];
$resetsz=$row['Resets'];

?>
                                                        <td style="color: rgb(196, 37, 0); font-weight: bold;">
                                                              <div align="left">
                                                                  <?=++$count1;?>
                                                          </div></td><td><div align="center" class="Estilo40">
                                                                  <div align="left">
                                                                    <span class="Estilo41">
                                                                    <?=$namez;?>
                                                                    </span>
                                                                   (
                                                                   <?=$resetsz;?>
                                                                  )        </div>
                                                                </div></td>
                                                        </tr>
                                                        <?

}
?>
                                                      </table>
													</div>
													<div class="top20Entity"></div>
				  </div>
			    </div>
			</div>
		  <div id="contents">
				<img src="template/<?=$core['config']['template'] ?>/images/arrow_up.png" id="scrollUp" />
				<div id="voteButton" onClick="location.href='http://www.xtremetop100.com/';"></div>
								<div id="blankAccountMenu"></div>
								<div id="mainContentInfo">
					<div class="hdTitle"><span style="background-image:url(template/<?=$core['config']['template'] ?>/images/inner_line.jpg); background-repeat:repeat-y; ">
					  </span><span>
					  </span>
					  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100%" height="30" valign="middle"><table width="100%" border="0">
                            <tr>
                              <td><div align="center">
                                <span class="Estilo43">
                                <?
		  if($user_login == '1'){
		  	echo '<div>
		  	';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '   <strong>-</strong> <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'" class="Estilo42">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a> ';
				}
				
			}
		}
		echo ' 
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td align="left" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<div style="text-align: center; font-size: 11px; color: #ffcb05;"></div>';
		  }
		  ?>
                              </span>                              </div></td>
                            </tr>
                          </table></td>
                        </tr>
                        <?=$XX= base64_decode('PCEtLSBUZW1wbGF0ZSBBdmFudGFzaWEgQnkgcE9zSG9CZUxsb3hEIFBhcmEgSUcgLS0+IA==');?>
                      </table>
					  <span class="tmp_right_side">
					  <?
		  if(CMS_NAVBAR == '1'){
		  	if(isset($_GET[LOAD_GET_PAGE])){
                  	$l_load = file("engine/cms_data/pag_d.cms");
                  	foreach ($l_load as $l_name){
                  		$l_name = explode(",",$l_name);
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
                  		$l2_name = explode(",",$l2_name);
                  		if($l2_name[3] == $ti2_td){
                  			$secondary_l = $l2_name[2];
                  			break;
                  		}
                  	}
                  }
                  
                  if(!isset($_GET[LOAD_GET_PAGE])){
                                        #&gt;
                                        $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>';
                                    }elseif  (isset($_GET[LOAD_GET_PAGE])){
                                        if(isset($_GET[USER_GET_PAGE])){
                                            $usercp_module_title =  str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
                                        }else{ $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';}
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
		$ann = explode(",",$ann);
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
	$pages_loaded = explode(",",$pages_loaded);
	
	if($pages_loaded[3] == $page_check_id){
		$p_loaded_array = preg_split( "/\ /", $pages_loaded[5]); 
		$p_l = '1';
		break;
	}
}
if($p_l == '1'){
$load_mods = file('engine/cms_data/mods.cms');
foreach ($load_mods as $mods_loaded){
	$mods_loaded = explode(",",$mods_loaded);
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
			$give_me_out = explode(",",$give_me_out);
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
					  </span></div>
					<img class="hdHr" src="template/<?=$core['config']['template'] ?>/images/newsHr.png" /><div class="hdAuthor"></div>
								</div>
				<img src="template/<?=$core['config']['template'] ?>/images/arrow_down.png" id="scrollDown" onMouseover="moveLayer(-1);" />
		  </div>
			<div id="footerTop">
			</div>
		</div>
		<div id="footerHr">
		</div>
		<div id="footer">
		  <div align="center">
		    <?=build_footer(),$XX= base64_decode('VGVtcGxhdGUgYWRhcHRhZG8gcG9yIEthc3Bhcg==');?>
          </div>
		</div>
	</body>

<!-- Mirrored from gonemu.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 15 Oct 2011 13:58:55 GMT -->
</html>

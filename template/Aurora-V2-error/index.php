<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php echo build_header_seo(); ?>
<title><?php echo build_header_title(); ?></title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<link href="template/<?php echo $core['config']['template']; ?>/css/estilo.css" rel="stylesheet" type="text/css" />
<?php echo LoadCustom('bs_head'); ?>
<?php echo LoadCustom('fontawesome'); ?>
</head>
<body>
<center>
<table border="1" width="1046" id="table1" cellspacing="0" cellpadding="0" style="border-width: 0px" class="tabla_footer">
	<tr>
		<td colspan="3" style="border-style: none; border-width: medium" height="18">
		<div align="center">
			<table border="0" width="670" id="table10" cellspacing="0" cellpadding="0">
				<tr>
					<td width="123">
					<a href="index.php">
					<img src="template/<?php echo $core['config']['template']; ?>/images/inicio.png" width="123" height="60" onMouseOver="this.src='template/<?php echo $core['config']['template']; ?>/images/inicio2.png';" onMouseOut="this.src='template/<?php echo $core['config']['template']; ?>/images/inicio.png';" /></a></td>
					<td width="92">
					<a href="index.php?page_id=statics">
					<img src="template/<?php echo $core['config']['template']; ?>/images/datos.png" width="92" height="60" onMouseOver="this.src='template/<?php echo $core['config']['template']; ?>/images/datos2.png';" onMouseOut="this.src='template/<?php echo $core['config']['template']; ?>/images/datos.png';" /></a></td>
					<td width="103">
					<a href="index.php?page_id=user_cp&panel=reset_character">
					<img src="template/<?php echo $core['config']['template']; ?>/images/userpanel.png" width="103" height="60" onMouseOver="this.src='template/<?php echo $core['config']['template']; ?>/images/userpanel2.png';" onMouseOut="this.src='template/<?php echo $core['config']['template']; ?>/images/userpanel.png';" /></a></td>
					<td width="112">
					<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/mu.png" width="112" height="58"></td>
					<td width="93">
					<a href="index.php?page_id=terms">
					<img src="template/<?php echo $core['config']['template']; ?>/images/servicio.png" width="93" height="60" onMouseOver="this.src='template/<?php echo $core['config']['template']; ?>/images/servicio2.png';" onMouseOut="this.src='template/<?php echo $core['config']['template']; ?>/images/servicio.png';" /></a></td>
					<td width="98">
					<a href="index.php?page_id=contact">
					<img src="template/<?php echo $core['config']['template']; ?>/images/contacto.png" width="98" height="60" onMouseOver="this.src='template/<?php echo $core['config']['template']; ?>/images/contacto2.png';" onMouseOut="this.src='template/<?php echo $core['config']['template']; ?>/images/contacto.png';" /></a></td>
					<td>
					<a href="index.php?page_id=lost_password">
					<img src="template/<?php echo $core['config']['template']; ?>/images/pass.png" width="113" height="60" onMouseOver="this.src='template/<?php echo $core['config']['template']; ?>/images/pass2.png';" onMouseOut="this.src='template/<?php echo $core['config']['template']; ?>/images/pass.png';" /></a></td>
				</tr>
			</table>
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="border-style: none; border-width: medium" height="218">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" width="221" valign="top">
		<table border="1" width="100" id="table2" style="border-width: 0px" cellspacing="0" cellpadding="0">
			<tr>
				<td style="border-style: none; border-width: medium" height="143">&nbsp;<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium">
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/login.png" width="221" height="76"></td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium" background="template/<?php echo $core['config']['template']; ?>/images/cont.png">
				<table border="1" width="100%" id="table5" style="border-width: 0px">
					<tr>
						<td style="border-style: none; border-width: medium" width="31">&nbsp;</td>
						<td style="border-style: none; border-width: medium" valign="top">
<?php
if($user_login == '1'){
	echo '<div class="tmp_left_menu">';
	$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	$count_m_uss = 0;
	foreach ($m_uss_row_ as $line){
		$tr = explode(",",$line);
		$count_m_uss++;
		if(isset($tr[6]) && $tr[6] == '1'){
			if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
				echo '<ul class="barrajean"><img src="template/'.$core['config']['template'].'/images/jewel_bles2.png" class="imgMiddle" width="16" height="16" align="left"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></ul>';
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
	 </table>';
} else {
	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
	 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
	  <tr>
	    <td colspan="2" align="center"><input type="text" name="uss_id" maxlength="10" size="12" class="login" value="Usuario" OnClick="this.value=\'\'"></td>
	  </tr>
	  <tr>
	    <td colspan="2" align="center"><input type="password" name="uss_password" class="login" value="PASSWORD" maxlength="12" size="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
	  </tr>
	  <tr>
	    <td rowspan="2" width="25%"><input type="image" src="template/'.$core['config']['template'].'/images/ok.png" width="39" height="40" onclick="uss_login_form.submit();"></td>
	    <td rowspan="2" width="75%">
		<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'"><font size="1" color="#CC6600"> ¿Mi contraseña?</font></a>
	<br>
	<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'"><font size="1" color="#CC6600"> ¡Registrate!</font></a></td>
	  </tr></table>
	</form>';
}
?>
						</td>
						<td style="border-style: none; border-width: medium" width="36">&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium">
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/cont2.png" width="221" height="64"></td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium">
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/menu.png" width="221" height="76"></td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium" background="template/<?php echo $core['config']['template']; ?>/images/cont.png">
				<table border="1" width="100%" id="table6" style="border-width: 0px">
					<tr>
						<td style="border-style: none; border-width: medium" width="31">&nbsp;</td>
						<td style="border-style: none; border-width: medium" valign="top">
						<div class="tmp_left_menu">
<?php
$m_row_ = get_sort('engine/cms_data/pag_d.cms',',');
foreach ($m_row_ as $line){
	$li = explode(",", $line);
	switch ($li[7]){
		case '0':
			if($li[8] == '1'){
				if($li[6] != '0'){
					echo '<ul class="barrajean"><img src="template/'.$core['config']['template'].'/images/jewel_bles2.png" class="imgMiddle" width="16" height="16" align="left"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></ul>';
				}
			}
			break;
		case '1':
			$target = ($li[11] == '1') ? "_blank" : "_self";
			echo '<ul class="barrajean">
				<img src="template/'.$core['config']['template'].'/images/jewel_bles2.png" class="imgMiddle" width="16" height="16" align="left">
				<a href="'.$li[10].'" target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></ul>';
			break;
	}
}
?>
						</div>
						</td>
						<td style="border-style: none; border-width: medium" width="36">&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium">
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/cont2.png" width="221" height="64"></td>
			</tr>
			</table>
		</td>
		<td style="border-style: none; border-width: medium" width="604" valign="top">
		<table border="1" width="100" id="table3" style="border-width: 0px" cellspacing="0" cellpadding="0">
			<tr>
				<td style="border-style: none; border-width: medium" height="54">&nbsp;</td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium">
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/contenido1.png" width="604" height="168"></td>
			</tr>
			
			<tr>
				<td height="670" valign="top" background="template/<?php echo $core['config']['template']; ?>/images/contenido.png" style="border-style: none; border-width: medium" width="604">
					<?php include ("topcs.php"); ?>
                <table border="0" width="604" id="table11" cellspacing="0" cellpadding="0">
					<tr>
						<td width="62">&nbsp;</td>
						<td width="480">
						<span class="marco_contenido">
<?php
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
		$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>';
	}elseif(isset($_GET[LOAD_GET_PAGE])){
		if(isset($_GET[USER_GET_PAGE])){
			$usercp_module_title =  str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
			$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>  &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
		}else{
			$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';
		}
	}
}
?>
<?php
if($page_check_id != ANNOUNCEMENTS_CMS_PAGE){
	require('engine/announcement_config.php');
	if($core['ANNOUNCEMENT']['ACTIVE'] == '1'){
		$ann_file = array_reverse(file('engine/variables_mods/announcements.tDB'));
		$count_ann = 0;
		foreach ($ann_file as $ann){
			$ann = explode(",",$ann);
			if($ann[3] > time()){
				$ann_found = 1;
				$ann_title = $ann[1];
				$ann_id = $ann[0];
				break;
			}
		}
	}
	if(isset($ann_found) && $ann_found == '1'){
		echo '
		<div class="tmp_m_content"> 
			<div class="tmp_right_title">
				<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="47">&nbsp;</td>
						<td>'.text_announcement.'</td>
					</tr>
					<tr>
						<td colspan="3" class="line-menu"></td>
					</tr>
				</table>
			</div>
			<div class="tmp_page_content">
				<table cellpadding="0" cellspacing="0" border="0" width="95%">
					<tr>
						<td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.gif" width="38" height="38"></td>
						<td align="left" style="padding-top: 2px; padding-bottom: 2px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'"><div class="iN_news_content">'.$ann_title.'</div></a></td>
						<td align="right" class="ann_date">'.date('F j, Y ').'</td>
					</tr>
					<tr>
						<td colspan="2" align="left" style="background-image:url(template/'.$core['config']['template'].'/images/inner_line.jpg); height: 2px;"></td>
					</tr>';
		if($core['ANNOUNCEMENT']['AUTHOR'] == '1'){
			echo '<tr>
				<td colspan="2" align="right"><b>'.$core['config']['admin_nick'].'</b> (Administrator)</td>
			</tr>';
		}
		echo '</table></div></div>';
	}
}

$load_pages = file('engine/cms_data/pag_d.cms');
foreach ($load_pages as $pages_loaded){
	$pages_loaded = explode(",",$pages_loaded);
	if($pages_loaded[3] == $page_check_id){
		$p_loaded_array = preg_split("/\ /", $pages_loaded[5]); 
		$p_l = 1;
		break;
	}
}
if(isset($p_l) && $p_l == 1){
	$load_mods = file('engine/cms_data/mods.cms');
	foreach ($load_mods as $mods_loaded){
		$mods_loaded = explode(",",$mods_loaded);
		if(in_array($mods_loaded[0],$p_loaded_array)){
			$_c_id_m[] = $mods_loaded[0];
		}else {
			$_c_id_m[] = 'NULL';
		}
	}
	foreach ($p_loaded_array as $give){
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
						 <div class="tmp_right_title">                     
							<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td width="1%">&nbsp;</td>
									<td width="47">&nbsp;</td>
									<td>'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</td>
								</tr>
								<tr>
									<td colspan="3" class="line-menu"></td>
								</tr>
							</table>
						</div></div>
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
						</span></td>
						<td width="62">&nbsp;</td>
					</tr>
				</table>
                </td>
			</tr>
			<tr>
				<td style="border-style: none; border-width: medium">
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/contenido2.png" width="604" height="179"></td>
			</tr>
		</table>
		</td>
		<td style="border-style: none; border-width: medium" width="221" valign="top">
		<table border="0" width="100" id="table4" cellspacing="0" cellpadding="0">
			<tr>
				<td>
				<img border="0" src="template/<?php echo $core['config']['template']; ?>/images/estadisticas.png" width="221" height="76"></td>
			</tr>
			<tr>
				<td background="template/<?php echo $core['config']['template']; ?>/images/cont.png">
				<table border="1" width="100%" id="table7" style="border-width: 0px">
					<tr>
						<td style="border-style: none; border-width: medium" width="31">&nbsp;</td>
						<td style="border-style: none; border-width: medium" valign="top">
						<table border="0" width="100%" id="table12" cellspacing="0" cellpadding="0">
							<tr>
								<td>Server Free</td>
								<td width="45"><div align="center"><?php include("server/servidor.php"); ?></div></td>
							</tr>
							<tr>
								<td>Server VIP</td>
								<td width="45"><div align="center"><?php include("server/servidorvip.php"); ?></div></td>
							</tr>
							<tr>
								<td>Server CS</td>
								<td width="45"><div align="center"><?php include("server/servidorcs.php"); ?></div></td>
							</tr>
							<tr>
<?php
$statistics_accounts=mssql_query("SELECT count(*) memb___id FROM MuOnline97.dbo.MEMB_INFO");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['accounts_reults']=$row['memb___id'];
?>
								<td>Cuentas</td>
								<td width="45"><div align="center"><?php echo $core['accounts_reults'];?></div></td>
<?php } ?>
							</tr>
							<tr>
<?php
$statistics_accounts=mssql_query("SELECT count(*) AccountID FROM MuOnline97.dbo.Character");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['character_reults']=$row['AccountID'];
?>
								<td>Personajes</td>
								<td width="45"><div align="center"><?php echo $core['character_reults'];?></div></td>
<?php } ?>
							</tr>
							<tr>
								<td>Cuentas VIP</td>
								<td width="45"><div align="center"> 
								<?php 
								$Sql = mssql_query("SELECT COUNT(*) FROM MuOnline97.dbo.MEMB_INFO Where Vip='1'");
								echo mssql_result($Sql, 0, 0); ?>
								</div></td>
							</tr>
							<tr>
<?php
$statistics_accounts=mssql_query("SELECT count(*) G_Name FROM MuOnline97.dbo.Guild");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['guild_reults']=$row['G_Name'];
?>
								<td>Clanes</td>
								<td width="45"><div align="center"><?php echo $core['guild_reults'];?></div></td>
<?php } ?>
							</tr>
							<tr>
<?php
$statistics_players=mssql_query("SELECT count(*) ConnectStat FROM MuOnline97.dbo.MEMB_STAT WHERE ConnectStat='1'");
while($row=mssql_fetch_assoc($statistics_players)){
$core['config']['statistics_results']=$row['ConnectStat'];
?>
								<td>Jugando</td>
								<td width="45"><div align="center"><font color="#008000"><?php echo $core['config']['statistics_results'];?></font></div></td>
<?php } ?>
							</tr>
						</table>
						</td>
						<td style="border-style: none; border-width: medium" width="36">&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td><img border="0" src="template/<?php echo $core['config']['template']; ?>/images/cont2.png" width="221" height="64"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><img border="0" src="template/<?php echo $core['config']['template']; ?>/images/reset.png" width="221" height="76"></td>
			</tr>
			<tr>
				<td background="template/<?php echo $core['config']['template']; ?>/images/cont.png">
				<table border="1" width="100%" id="table8" style="border-width: 0px">
					<tr>
						<td style="border-style: none; border-width: medium" width="31">&nbsp;</td>
						<td style="border-style: none; border-width: medium" valign="top">
						<div align="center">
						  <table width="160" align="center">
						    <tr>
						      <td width="23"><div align="center"><strong>#</strong></div></td>
						      <td width="78"><div align="center"><strong>Nombre</strong></div></td>
						      <td width="43"><div align="center"><strong>Resets</strong></div></td>
					        </tr>
<?php
$query=mssql_query("select TOP 10 * from MuOnline97.dbo.Character Where ctlcode !='32' and ctlcode !='8' order by Resets desc, cLevel desc");
$count2=0;
while($row=mssql_fetch_assoc($query)){
$namez=$row['Name'];
$resetsz=$row['Resets'];
?>
						    <tr>
						      <td style="color: rgb(196, 37, 0); font-weight: bold;" class="barrajean"><div align="center"><strong><?php echo ++$count2;?></strong></div></td>
						      <td class="barrajean"><div align="center"><?php echo $namez;?></div></td>
						      <td class="barrajean"><div align="center"><strong><?php echo $resetsz;?></strong></div></td>
						    </tr>
<?php } ?>
					      </table>
						</div></td>
						<td style="border-style: none; border-width: medium" width="36">&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td><img border="0" src="template/<?php echo $core['config']['template']; ?>/images/cont2.png" width="221" height="64"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><img border="0" src="template/<?php echo $core['config']['template']; ?>/images/guild.png" width="221" height="76"></td>
			</tr>
			<tr>
				<td background="template/<?php echo $core['config']['template']; ?>/images/cont.png">
				<table border="1" width="100%" id="table9" style="border-width: 0px">
					<tr>
						<td style="border-style: none; border-width: medium" width="31">&nbsp;</td>
						<td style="border-style: none; border-width: medium" valign="top">
						<div align="center">
						  <table width="160" align="center">
						    <tr>
						      <td><div align="center"><strong>#</strong></div></td>
						      <td><div align="center"><strong>Nombre</strong></div></td>
						      <td><div align="center"><strong>Score</strong></div></td>
						      <td><div align="center"><strong>Logo</strong></div></td>
					        </tr>
<?php
$Guild=mssql_query("select TOP 10 * from MuOnline97.dbo.Guild order by G_Score desc");
$count1=0;
while($row=mssql_fetch_assoc($Guild)){
$G_Namez=$row['G_Name'];
$G_Markz=$row['G_Mark'];
$G_Scorez=$row['G_Score'];
$logo=urlencode(bin2hex($G_Markz));
?>
  <tr>
    <td style="color: rgb(196, 37, 0); font-weight: bold;" class="barrajean"><div align="center"><strong><?php echo ++$count1;?></strong></div></td>
    <td class="barrajean"><div align="center"><?php echo $G_Namez;?></div></td>
    <td class="barrajean"><div align="center"><strong><?php echo $G_Scorez;?></strong></div></td>
    <td class="barrajean"><div align="center"><img src="get.php?aL=<?php echo $logo;?>.png" alt="" width="20" height="20"></div></td>
  </tr>
<?php } ?>
					      </table>
						</div></td>
						<td style="border-style: none; border-width: medium" width="36">&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td><img border="0" src="template/<?php echo $core['config']['template']; ?>/images/cont2.png" width="221" height="64"></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" width="221">&nbsp;</td>
		<td style="border-style: none; border-width: medium" width="604">
		<div align="center"><span class="footer_font" style="border-style: none; border-width: medium">
		  <?php echo build_footer(), $XX= base64_decode('dGVtcGxhdGUgYnkgOiBhbm9ubWFw'); ?>
	  </span></div></td>
		<td style="border-style: none; border-width: medium" width="221">&nbsp;</td>
	</tr>
</table></center>
</body>
</html>
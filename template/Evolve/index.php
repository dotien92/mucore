<?php
require ( "config/RafaMaster.php" ) ;
include ( "engine/connect_core.php" ) ;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<link rel="shortcut icon" href="template/<?=$core['config']['template'] ?>/images/icon.ico" /> 
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/cursor.css" type="text/css" media="screen" />
<link href="template/<?=$core['config']['template'] ?>/css/common.css" type="text/css" rel="stylesheet" />
<link href="template/<?=$core['config']['template'] ?>/css/global.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="template/<?=$core['config']['template'] ?>/css/dtree.css" rel="stylesheet" />
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery-1.3.2.min.js"></script>
<script src="template/<?=$core['config']['template'] ?>/js/core_global.js" language="javascript" type="text/javascript"></script>
<style type="text/css">
<!--
/*
MUCore Css Start
*/
.where_nav a{
color: #ffffff;
text-decoration: underline;
}

.where_nav a:hover{
color: #ffffff;
text-decoration: none;
} 

.iN_title{
font-size:17px;
font-weight:bold;
}

.iN_title_mirror{
font-size:17px;
font-weight:bold;
color:#990000;
}

.iN_description{
font:11px/14px Arial, Verdana, sans-serif;
color:#777;
}

.iN_download_title{
font:bold 14px/18px arial; color:#898989;
}

.iN_download_cat{
font-size:17px;
font-weight:bold;
color:#990000;
}

.iN_title a{
font-size:17px;
font-weight:bold;
text-decoration: none;
} 

.iN_title a:hover{
font-size:17px;
font-weight:bold;
text-decoration: none;
color:#990000;
}

.iN_date{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:10px;
color:#666666;
}

.iN_news_table tr:hover{
background: #ffffff;
}

.iN_news_content{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
color:#333333;
margin:0px;
padding-top: 6px;
}

.iN_news_content a{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
margin:0px;
text-decoration: underline;
} 

.iN_news_content a:hover{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
margin:0px;
text-decoration: none;
} 

.iN_new_read_more{
color:#ffffff; 
font: 10px Arial, Helvetica, sans-serif; 
background: #8b0e0e;
padding: 1px;
} 

.iN_new_read_more a{
color: #ffffff;
font-size: 10px;
}

.iRg_text{
font: bold 13px Arial, sans-serif; color: #555555;
}

.iRg_inf{
font: 11px fantasy; #555555;
} 

.iRg_line{
background:url(template/<?=$core['config']['template']; ?>/images/inner_line.jpg); background-position:bottom; background-repeat:repeat-x;
font: 11px fantasy; color: #555555;
padding-bottom: 4px
}

.iRg_line_top{
background:url(template/<?=$core['config']['template']; ?>/images/inner_line.jpg); background-position:top; background-repeat:repeat-x;
font: 11px fantasy; color: #555555;
}

.iR_func_status{
border: 1px solid #cccccc; 
background: #ffffff; 
padding-left: 4px;
font-size: 11px;
}

.iR_func_status_lacking{
background: #CC3300;
padding: 1px; 
padding-left: 3px; 
padding-right: 3px; 
color: #ffffff;
}

.iR_func_status_free{
background: #00FF00; 
padding: 1px; 
padding-left: 3px; 
padding-right: 3px; 
color: #000000;
}

.iR_func_status_free a{
font-size: 11px;
color: #000000;
} 

.iRg_inf a{
font: 11px fantasy; 
text-decoration: underline;
}

.iRg_inf a:hover{
font: 11px fantasy;
text-decoration: none;
}

.iRg_input{
font-size: 10pt;
font-family: verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
background-color: #ffffff;
border: 1px solid #cccccc;
height: 18px;
} 

.iRg_terms_agree{
font: 12px Arial, Verdana, sans-serif; 
}

.iRg_terms_agree a{
font: 12px Arial, Verdana, sans-serif; 
text-decoration: underline;
} 

.iR_rank{
background-color: #181C18;
font: bold 11px Georgia, "Times New Roman", Times, serif; color: #ffffff;
}

.iR_stats{
font: 11px Georgia, "Times New Roman", Times, serif; color: #ffffff;
background-color: #5F6D5F;
padding: 1px;
}

.iR_stats_2{
font: 11px Georgia, "Times New Roman", Times, serif; color: #ffffff;
background-color: #CCCCFF;
padding: 1px;
color: #555555;
}

.iR_stats_bg{
background-color: #996600;
}

.iR_stats_level{
border: 1px solid #cccccc;
font: 11px Georgia, "Times New Roman", Times, serif; color: #555555;
background: #ECECFF;
padding: 1px;
}

.iR_stats_reset{
border: 1px solid #cccccc;
font: 11px Georgia, "Times New Roman", Times, serif; color: #555555;
background: #CECEFF;
padding: 1px;
}

.iR_name{
font: bold 13px Arial, sans-serif; color: #FF3300;
}

.iR_class{
font: 12px Impact, fantasy; color: #666666;
}

.iR_status{
font-size: 11px;
}

.iR_task{
font: 11px Georgia, "Times New Roman", Times, serif; 
}

.iR_rank_type{
font: bold 16px Arial, sans-serif; 
}

.iR_rank_type a{
font: bold 16px Arial, sans-serif; 
text-decoration: none;
}

.iR_rank_type a:hover{
font: bold 16px Arial, sans-serif;
text-decoration: none;
color: #990000;
}

.iR_rank_type_sub{
font: 10px fantasy; 
}

.iR_rank_type_sub a{
font: 10px fantasy; 
text-decoration: none;
}

.iR_rank_type_sub a:hover{
font: 10px fantasy; color:#990000;
text-decoration: none;
}

.msg_success{
background: #c2ffaf;
border: 1px solid #cccccc; 
padding: 4px;
padding-left: 33px;
margin-bottom: 6px;
margin-top: 6px;
background-image:url(template/<?=$core['config']['template']; ?>/images/success.gif);
background-repeat:no-repeat;
background-position: 10px;
font-size: 11px;
font-weight: bold;
color: #444444;
}

.msg_error{
background: #F9F2B9;
border: 1px solid #cccccc; 
padding: 4px;
padding-left: 33px;
margin-bottom: 6px;
margin-top: 6px;
background-image:url(template/<?=$core['config']['template']; ?>/images/warning.gif);
background-repeat:no-repeat;
background-position: 10px;
font-size: 11px;
font-weight: bold;
color: #444444;
}

.chat_bg{
border: 1px solid #cccccc; 
background: #ffffff; 
padding: 4px;
font-size: 11px;
}

.chat_even{
background: #D7D7FF;
padding: 2px; 
}

.chat_odd{
padding: 2px; 
}

.warehouse_block{ 
border: 0px;
text-align: center;
background: url(template/<?=$core['config']['template']; ?>/images/warehouse_block.gif);
}

.warehouse_item_block {
border: 0px;
padding: 0px;
text-align: center;
background: url(template/<?=$core['config']['template']; ?>/images/warehouse_item_block.gif);
}

.warehouse_bg {
border: 0px;
padding: 0px;
text-align: center;
background: url(template/<?=$core['config']['template']; ?>/images/warehouse_bg.gif);
}

.item_name{
font: 12px Arial, sans-serif; 
color: #ffffff;
font-weight: bold;
}

.item_dur{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.item_requirement{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.item_skill{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.item_options{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.iD_dashed{
border-top: #ffffff dashed 1px;
}

.downloads tr:hover{
background: #ffffff;
}

.curent_step{
background: #FFEF73; border: 1px solid #cccccc; 
padding: 2px;
font:bold 11px Arial;
color:#555555;
}

.step{
background: #ECECEC; 
border: 1px solid #cccccc; 
padding: 2px;
font:bold 11px Arial;
color: #D4D4D4;
}

.hidden_password{
border: 1px solid #cccccc; 
background: #ECECEC; 
padding: 2px;
width: 200px;
color: #ECECEC;
}

.footer_font{
font: normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ffffff;
}

.footer_font a{
padding-bottom:5px;
font: normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ff0000;
text-decoration: none;
} 

.footer_font a:hover{
font: normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ff0000;
text-decoration: underline;
} 

.table_list{
background: #ffffff;
color: #000000;
border: outset 1px #DEE0E2;
} 

.table_list .title{
background: #DFDFFF;
font: bold 11px tahoma, verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
padding: 2px;
padding-left: 4px;
color: #595959;
border: outset 1px #555555;
} 

.table_list .even{
background: #ECECFF;
}


.table_list .content{
font: 11px tahoma, verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
padding: 2px;
padding-left: 4px;
} 

#rss_feed{
margin-left: 0;
padding-left: 0;
list-style: none;
}

#rss_feed li
{
padding-left: 17px;
background-image: url(template/<?=$core['config']['template']; ?>/images/rss_icon.gif);
background-repeat: no-repeat;
background-position: 0;
} 

#rss_feed li a{
text-decoration: none;
}

#rss_feed li a:hover{
text-decoration: underline;
}
/*
MUCore CSS End
*/ -->
</style>
</head>
<body oncontextmenu="return false">
<div id="bodyMain">
<div id="content">
<a id="webshopButtonLink" href="<?php echo tienda; ?>" title="Webshop" ></a>
<a id="downloadButtonLink" href="index.php?page_id=downloads" title="Downloads" class="ajaxLink"></a><div id="columnLeft">
        <div class="panelBody">
        	<div class="vertmenu">
   <h1>Game</h1>
   <ul>
<?
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
</div>
<div class="minSeparator"></div>
<div class="vertmenu">
   <h1>Social</h1>
   <ul>
      <li><a href="<?php echo foro; ?>" tabindex="20" title="Forum" target="_blank">Forum</a></li>
<li><a href="<?php echo fbpage; ?>" tabindex="21" title="Facebook Page" target="_blank">Facebook Page</a></li>
<li><a href="<?php echo fbgroup; ?>" tabindex="22" title="Facebook Group" target="_blank">Facebook Group</a></li>
   </ul>
</div>
<div class="minSeparator"></div>        </div>
		<div class="panelFooter"></div>
		
				<h2 id="linkRanking"></h2>
        <div class="panelBody">
           <div class="vertmenu">
	<h1>Ranking</h1>
</div>
<table width="100%" class="front_ranking">
	<tr>
		<th style="text-align: right;" colspan="4">PRO / Resets</th>
	</tr>
		
		<tr class="tr_names" style="font-weight:bold;">
		<td class="td_rank">1</td>
		<td class="td_name">Nombre</td>
		<td align="right" class="td_name">Nivel</td>
                <td align="right" class="td_num">Resets</td>
	</tr>
<tr>
<?
$Chars=$core_db->Execute("select TOP 10 Name,cLevel,Resets from Character Where ctlcode !='32' and ctlcode !='8' order by Resets desc, cLevel desc");
while(!$Chars->EOF){
?>
                            <td><div align="center" class="td_rank">
                               <span style="color:#DDBE49;"><?=++$count1;?></span>
                            </div></td>
                            <td><div align="center" class="td_name">
                                <?=$Chars->fields[0];?>
                            </div></td>
                            <td><div align="center" class="td_name">
                                <?=$Chars->fields[1];?>
                            </div></td>
                            <td><div align="center" class="td_num">
                                <spa style="color: Red; text-shadow: 0 0 5px #FF0000;">[ <?=$Chars->fields[2];?> ]</spa>
                            </div></td>
                          </tr>
                          <?
$Chars->MoveNext();
}
?>
	
		</table>

        </div>
		<div class="panelFooter"></div>
					</div>
	<div id="columnMid">
   	   <div id="contentMidHeader"></div>
   	  	<div id="contentMidBody">
   	  	   	  		   <div id="body_image">
       <img src="template/<?=$core['config']['template'] ?>/images/slide01.gif" /></div>
   <div>
        <img src="template/<?=$core['config']['template'] ?>/images/news_icon_head.png" style="margin-right:5px;" />
        <img src="template/<?=$core['config']['template'] ?>/images/news_icon_head.png"  style="margin-right:5px;" />
        <img src="template/<?=$core['config']['template'] ?>/images/news_icon_head.png"  style="margin-right:5px;" />
        <img src="template/<?=$core['config']['template'] ?>/images/news_icon_head.png"  style="margin-right:5px;" />
   </div>
      	  	<div style="min-height: 300px;">
   	  	<div id="news">
   <div class="newsContent">
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
					<div class="tmp_right_title">'.text_announcement.'</div>
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
					<div><h3>'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</h3></div>
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
   </div>
   <div class="newsSeparator"></div>
	   

</div>
   	  	</div>
   	  			
   	  	<div style="clear:both"></div>
   	  	</div>
   	  	<div id="contentMidFooter">
      	</div>
   	  	</div>
	<div id="columnRight">
        <div class="panelBody">
            <div class="vertmenu">
	<?
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
		  <td align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td align="right" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <div id="loginErrorDiv"></div>
             <h1>Username</h1>
		<div class="inputText" id="usernameDiv" style="text-align: center; margin: 0 auto;">
<input type="text" name="uss_id" maxlength="10" class="textbox" id="usernameRightLogin" value="USER ID" OnClick="this.value=\'\'">
  </div>
    <h1>Password</h1>
		<div class="inputText" id="passwordDiv" style="text-align: center; margin: 0 auto;">
       <input type="password" name="uss_password" class="textbox" id="usernameRightLogin" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login">
 </div>
		<div style="padding: 0px 10.5px;">
		   <button type="submit" style="border: 0; background: transparent">
				<img src="template/'.$core['config']['template'].'/images/button_login_f.png" width="136px" heght="29px" alt="submit" onclick="uss_login_form.submit();">
			</button>
    </div>
<div class="minSeparator"></div>
	<span style="padding:10px 0px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'l"
		title="Forgot Password Help">'.link_lost_password.'</a> </span>
</form>';
		  }
		  ?>
</div>
<div>
	
	<div>
		<a href="index.php?page_id=register" title="New Account Registration">
        <img src="template/<?=$core['config']['template'] ?>/images/button_new_account_f.png" />
		</a>
	</div>
</div>




            
                    </div>
		<div class="panelFooter"></div>
		
		        <h2 id="linkServerStatus"></h2>
        <div class="panelBody">
          <div class="vertmenu">
<div></div>

<div id="events" style="padding: 0px 10.5px; "></div>
<div>
<table width="100%" cellspacing="1px" cellpadding="1px">
<tr>
<?
//Estadisticas Cuentas

$statistics_accounts=mssql_query("SELECT count(*) memb___id FROM MuOnline.dbo.MEMB_INFO");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['accounts_reults']=$row['memb___id'];
?>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #D358F7; text-shadow: 0 0 5px #D358F7;" font-size:11px;>Total Cuentas</spa></td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right><?=$core['accounts_reults'];?></div></td>
<? } ?>
</tr>
<?
//Estadisticas Personajes

$statistics_accounts=mssql_query("SELECT count(*) AccountID FROM MuOnline.dbo.Character");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['character_reults']=$row['AccountID'];
?>
<tr>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #D358F7; text-shadow: 0 0 5px #D358F7;" font-size:11px;>Total Personajes</spa></td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right><?=$core['character_reults'];?></div></td>
<? } ?>
</tr>
<?
//Estadisticas Clanes

$statistics_accounts=mssql_query("SELECT count(*) G_Name FROM MuOnline.dbo.Guild");
while($row=mssql_fetch_assoc($statistics_accounts)){
$core['guild_reults']=$row['G_Name'];
?>
<tr>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #D358F7; text-shadow: 0 0 5px #D358F7;" font-size:11px;>Total Guilds</spa></td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right><?=$core['guild_reults'];?></div></td>
<? } ?>
</tr>
<tr>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #F7FE2E; text-shadow: 0 0 5px #F7FE2E;" font-size:11px;><?php echo gs1; ?></span>
</td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right>
<? if ($check=@fsockopen($RafaMaster['db_host'],$RafaMaster['Puerto']['GsPvP'],$ERROR_NO,$ERROR_STR,0.1)) { fclose($check); echo '<font color="#58FA58">Online</font>'; } else {  echo '<font color="#FF0000">Offline</font>'; } ?>
<br></div>
</td>
</tr>
<tr>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #F7FE2E; text-shadow: 0 0 5px #F7FE2E;" font-size:11px;><?php echo gs2; ?></span>
</td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right>
<? if ($check=@fsockopen($RafaMaster['db_host'],$RafaMaster['Puerto']['GsNoPvP'],$ERROR_NO,$ERROR_STR,0.1)) { fclose($check); echo '<font color="#58FA58">Online</font>'; } else {  echo '<font color="#FF0000">Offline</font>'; } ?>
<br></div>
</td>
</tr>
<tr>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #F7FE2E; text-shadow: 0 0 5px #F7FE2E;" font-size:11px;><?php echo gs3; ?></span>
</td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right>
<? if ($check=@fsockopen($RafaMaster['db_host'],$RafaMaster['Puerto']['GsVIP'],$ERROR_NO,$ERROR_STR,0.1)) { fclose($check); echo '<font color="#58FA58">Online</font>'; } else {  echo '<font color="#FF0000">Offline</font>'; } ?>
<br></div>
</td>
</tr>
<tr>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #F7FE2E; text-shadow: 0 0 5px #F7FE2E;" font-size:11px;><?php echo gs4; ?></span>
</td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right>
<? if ($check=@fsockopen($RafaMaster['db_host'],$RafaMaster['Puerto']['GsSig'],$ERROR_NO,$ERROR_STR,0.1)) { fclose($check); echo '<font color="#58FA58">Online</font>'; } else {  echo '<font color="#FF0000">Offline</font>'; } ?>
<br></div>
</td>
</tr>

<tr>
<?
//Estadisticas Usuarios Conectados

$statistics_players=mssql_query("SELECT count(*) ConnectStat FROM MuOnline.dbo.MEMB_STAT WHERE ConnectStat='1'");
while($row=mssql_fetch_assoc($statistics_players)){
$core['config']['statistics_results']=$row['ConnectStat'];
?>
<td width=50% style='border-bottom:1px dashed #645f57'>
<spa style="color: #D358F7; text-shadow: 0 0 5px #D358F7;" font-size:11px;>Usuarios Onlines</span>
</td>
<td width=50% style='border-bottom:1px dashed #645f57'>
<div align=right>
<?=$core['config']['statistics_results'];?>
<br></div>
</td>
<? } ?>
</tr>
</table>
</div>
          </div>



        </div>
		<div class="panelFooter"></div>
				
	</div>
	<div style="clear: both;" id="footerline" ></div>
</div>

<div id="footer">
	<?=build_footer(),$XX= base64_decode('PGNlbnRlcj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6IFZlcmRhbmE7Ij48c3BhIHN0eWxlPSJjb2xvcjogUmVkOyB0ZXh0LXNoYWRvdzogMCAwIDVweCAjRkYwMDAwOyI+QWRhcHRlZCBieSA8L3NwYW4+PHNwYSBzdHlsZT0iY29sb3I6IFllbGxvdzsgdGV4dC1zaGFkb3c6IDAgMCA1cHggUmVkOyI+UmFmYU1Ac3Rlcjwvc3Bhbj48L2NlbnRlcj4=');?></div>
</div>
</div>
</body>
</html>
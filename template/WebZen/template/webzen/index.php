<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="template/<?=$core['config']['template'] ?>/_Css/common.css" />
<link type="text/css" rel="stylesheet" href="template/<?=$core['config']['template'] ?>/Games/global_gnb20100107.css" /> 
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/_Script/jsRegistText.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/_Script/jsMenuLinkFunction.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/_Script/jsGeneralFunction.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/_Script/jsBoardFunction.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/_Script/jsGameController.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/Games/global_gnb20100325.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/_Script/jquery.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">setNavLoginSts(false);</script>
	<style type="text/css">
	#Main_Layer { position:relative; width:100%; top:150px; margin:0; padding:0; z-index:10000; }
	#Main_Layer #Layer_Align { position:absolute; width:340px; height:452px; left:50%; top:-20px;margin-left:-350px; }
	#Layer_Box { position:absolute; width:340px; height:452px; margin:0; padding:0; z-index:99; }
	#Layer_Box #LayerContent {font-size:0;line-height:0;}
	#Layer_Box #CookieBox {height:33px; margin:0; padding:3px 10px 0 15px;font-size:0;line-height:0; background:url('SUN/event/100531_newMember/popup_img_02.jpg') left top no-repeat; }
	#Layer_Box #CookieBox img { margin:2px 45px 0 0; vertical-align:middle; cursor:pointer; }
	#Layer_Box #CookieBox img.close {margin-right:0;}
	#Layer_Box #CookieBox input { width:14px; height:14px; margin:3px 3px 0 0; vertical-align:middle; }
	.where_nav a{
color: #FFF;
text-decoration: underline;
}

.where_nav a:hover{
color: #FFF;
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
background: #FFF;
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
color:#FFF; 
font: 10px Arial, Helvetica, sans-serif; 
background: #8b0e0e;

padding: 5px;
}

.iN_new_read_more a{
color: #FFF;
font-size: 10px;
}
.iRg_text{
font: bold 13px Arial, sans-serif; color: #555555;
}


.iRg_inf{
font: 11px fantasy;  #555555;
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
background: #FFF; 
padding-left: 4px;
font-size: 11px;
}

.iR_func_status_lacking{
background: #CC3300;
padding: 1px; 
padding-left: 3px; 
padding-right: 3px; 
color: #FFF;
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
background-color: #FFF;
border: 1px solid #cccccc;
height: 18px;
}



.iRg_terms_agree{
font:  12px Arial, Verdana, sans-serif; 
}

.iRg_terms_agree a{
font:  12px Arial, Verdana, sans-serif; 
text-decoration: underline;
}

.iR_rank{
background-color: #181C18;
font: bold 11px Georgia, "Times New Roman", Times, serif; color: #FFF;
}

.iR_stats{
font: 11px Georgia, "Times New Roman", Times, serif; color: #FFF;
background-color: #5F6D5F;
padding: 1px;
}

.iR_stats_2{
font: 11px Georgia, "Times New Roman", Times, serif; color: #FFF;
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
font:  11px Georgia, "Times New Roman", Times, serif; 
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
background-image:url(template/<?=$core['config']['template'] ?>/images/success.gif);
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
background-image:url(template/<?=$core['config']['template'] ?>/images/warning.gif);
background-repeat:no-repeat;
background-position: 10px;
font-size: 11px;
font-weight: bold;
color: #444444;
}


.chat_bg{
border: 1px solid #cccccc; 
background: #FFF; 
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
background: url(template/<?=$core['config']['template'] ?>/images/warehouse_block.gif);
}

.warehouse_item_block {
border: 0px;
padding: 0px;
text-align: center;
background: url(template/<?=$core['config']['template'] ?>/images/warehouse_item_block.gif);
}

.warehouse_bg {
border: 0px;
padding: 0px;
text-align: center;
background: url(template/<?=$core['config']['template'] ?>/images/warehouse_bg.gif);
}

.item_name{
font: 12px Arial, sans-serif; 
color: #FFF;
font-weight: bold;
}

.item_dur{
font: 11px Arial, sans-serif; 
color: #FFF;
}

.item_requirement{
font: 11px Arial, sans-serif; 
color: #FFF;
}

.item_skill{
font: 11px Arial, sans-serif; 
color: #FFF;
}

.item_options{
font: 11px Arial, sans-serif; 
color: #FFF;
}

.iD_dashed{
border-top: #FFF dashed 1px;
}

.downloads tr:hover{
background: #FFF;
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
font:  normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #999;
}

.footer_font a{
padding-bottom:5px;
font:  normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ff0000;
text-decoration: none;
}

.footer_font a:hover{
font:  normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ff0000;
text-decoration: underline;
}

.table_list{
background: #FFF;
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
background-image: url(template/<?=$core['config']['template'] ?>/images/rss_icon.gif);
background-repeat: no-repeat;
background-position: 0;
}

#rss_feed li a{
text-decoration: none;
}

#rss_feed li a:hover{
text-decoration: underline;
}
.language_select{
margin-top: 4px;
 }

.language_select a{
 font: 11px Arial, Helvetica, sans-serif;
color: #999;
 text-decoration: none;
 }

.language_select a:hover{
font: 11px Arial, Helvetica, sans-serif;
color: #999;
text-decoration: underline;
 }
 
.usercp_module{
font-weight:bold;
background-color:#000;
color: #FFF;
padding: 2px;
padding-left: 4px;
width: 140px;
}
#mainwrapper #mainbody #maincenter .newsforum ul table tr th ul {
	text-align: left;
}

#header
{
background-image: url(template/<?=$core['config']['template'] ?>/images/header.png); height:72px;
background-repeat: no-repeat;
background-position: top;
}

-->
</style>

<div align="left" id="header"><img src="template/<?=$core['config']['template'] ?>/images/header1.png" width="1594" height="72" border="0" usemap="#Map"><map name="Map">
  <area shape="rect" coords="295,15,381,40" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>news">
  <area shape="rect" coords="397,16,488,39" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register">
  <area shape="rect" coords="496,16,591,38" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads">
  <area shape="rect" coords="841,19,928,38" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings">
  <area shape="rect" coords="989,19,1060,38" href="LINK TIENDA">
  <area shape="rect" coords="1103,18,1166,37" href="LINK FORO">
  <area shape="rect" coords="649,14,747,68" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>news">
</map></div>
</head>
<body onload="fnEXP(1);fnGuild(1);">
<div id="mainwrapper">
<div class="mainvisual">
<div class="left_image"></div>
		<div class="right_image"></div>
</div>
	<div id="mainheader"></div>
	<div id="mainbody">
		<div id="mainleft">
<div class="gamebutton">
				<a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register"><img src="template/<?=$core['config']['template'] ?>/Mu/main/bt_gamestart.gif" width="195px" height="44px" alt="START GAME" /></a>
				<a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads"><img src="template/<?=$core['config']['template'] ?>/Mu/main/bt_download.gif" width="195px" height="44px" alt="DOWNLOAD" /></a>
</div>
			<div class="mainWcoinButton"></div>			
			<div class="quickbnr">
				<h3>QUICK LINKS</h3>
				<ul class="quicklink">
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
<table><tr><td height="5"></td></tr></table>
</div>
		</div>
		<!-- //Content Left -->

		<!-- Content Center -->
		<div id="maincenter">

			<div class="centerbnr">
			  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="510" height="162" id="FlashID" title="Images">
			    <param name="movie" value="template/<?=$core['config']['template'] ?>/cu3er.swf">
			    <param name="quality" value="high">
			    <param name="wmode" value="opaque">
			    <param name="swfversion" value="6.0.65.0">
			    <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
			    <param name="expressinstall" value="Scripts/expressInstall.swf">
			    <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
			    <!--[if !IE]>-->
			    <object type="application/x-shockwave-flash" data="template/<?=$core['config']['template'] ?>/cu3er.swf" width="510" height="162">
			      <!--<![endif]-->
			      <param name="quality" value="high">
			      <param name="wmode" value="opaque">
			      <param name="swfversion" value="6.0.65.0">
			      <param name="expressinstall" value="Scripts/expressInstall.swf">
			      <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
			      <div>
			        <h4>El contenido de esta p&aacute;gina requiere una versi&oacute;n m&aacute;s reciente de Adobe Flash Player.</h4>
			        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
		          </div>
			      <!--[if !IE]>-->
		        </object>
			    <!--<![endif]-->
		      </object>
			</div>

			<!-- NEWS & EVENTS -->
		  <div class="newsforum">
			<div class="nf_title">
			  <h3 class="news">NOTICE & EVENTS</h3>
					<a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>news"><img src="template/<?=$core['config']['template'] ?>/Mu/main/is_more.gif" width="33px" height="6px" alt="MORE" /></a>
		    </div>
		    <ul>
		      <table width="530" border="0" cellspacing="0" cellpadding="0">
		        <tr>
		          <th width="20" scope="col">&nbsp;</th>
		          <th width="580" scope="col"><ul>
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
	              </ul></th>
	            </tr>
	          </table>
		    </ul>
		  </div>
			<!-- //NEWS & EVENTS -->

</div>
		<!-- //Contents Center -->

		<!-- Content Right -->
		<div id="mainright">
			<div class="servertime">
				<h3>Global Server Time</h3>
				<span class="stime" id="ServerTime"><span><script LANGUAGE="JavaScript">
<!-- COMIENZO
Stamp = new Date();
year = Stamp.getYear();
if (year < 2000) year = 1900 + year;
document.write('<font size="1" face="Arial">Fecha: ' + (Stamp.getMonth() + 1) +"/"+Stamp.getDate()+ "/"+ year + '</font><BR>');
var Hours;
var Mins;
var Time;
Hours = Stamp.getHours();
if (Hours >= 12) {
Time = " P.M.";
}
else {
Time = " A.M.";
}
if (Hours > 12) {
Hours -= 12;
}
if (Hours == 0) {
Hours = 12;
}
Mins = Stamp.getMinutes();
if (Mins < 10) {
Mins = "0" + Mins;
}
document.write('<font size="1" face="Arial">Hora: ' + Hours + ":" + Mins + Time + '</font>');
// FIN -->
</script></span>
            </span>
			</div>

<table id="LoginPanel1_pnlLogInBefore" cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td>
	
<script type="text/javascript">
function fnValidateForm()
{
	var txtUserID = document.getElementById("txtUserID");
	var txtUserPW = document.getElementById("txtPassWD");
	
	//ID Check
	if(!fnValidateEmpty(txtUserID, TEXT11)) return false;

	if(txtUserID.value.search(/[^a-zA-Z0-9]/) != -1)
	{
		alert(TEXT12);
		txtUserID.focus();
		return false;
	}
	if(!fnValidateSize(txtUserID, TEXT13, 4, 0, 0)) return false;
	if(fnIsNumeric(txtUserID.value))
	{
		alert(TEXT14);
		txtUserID.focus();
		return false;
	}

	//PassWD Check
	if(!fnValidateEmpty(txtUserPW, TEXT16)) return false;
	if(txtUserPW.value.search(/[^a-zA-Z0-9]/) != -1)
	{
		alert(TEXT17);
		txtUserPW.focus();
		return false;
	}
	if((txtUserPW.value.search(/[^a-zA-Z]/) == -1) || (txtUserPW.value.search(/[^0-9]/) == -1))
	{
		alert(TEXT18);
		txtUserPW.focus();
		return false;
	}
	if(!fnValidateSize(txtUserPW, TEXT19, 6, 0, 0)) return false;
	if(txtUserID.value == txtUserPW.value)
	{
		alert(TEXT27);
		txtUserPW.focus();
		return false;
	}

	$.ajax(
        { 
            type: "POST", 
            url: "/_Common/procLogin.aspx/GetLoginProcess", 
            data: "{'strID': '" + $('#txtUserID').val() + "', 'strPW': '" + $('#txtPassWD').val() + "'}", 
            contentType: "application/json; charset=utf-8", 
            dataType: "json",
            async: false,
            success: function(msg) 
            {
                var objResult = msg;
                
                if(objResult != null && objResult.length ==3)
                {
                    if(objResult[0] == 1)
                    {
                        location.href = document.URL;
                    }
                    else if(objResult[0] == 2)
                    {
                        location.href='http://member.webzen.com/Account/Join/viewRegistEmailKeyNotYet.aspx';
                    }
                    else if(objResult[0] == 3)
                    {
                        location.href='http://member.webzen.com/MyPage/Secession/SecessionCancel.aspx';
                    }
                    else if(objResult[0] == 4)
                    {
                        alert(TEXT30);
                        document.getElementById("txtUserID").focus();
                    }
                    else if(objResult[0] == 5)
                    {
                        alert(TEXT31);
                        document.getElementById("txtUserID").focus();
                    }
                    else if(objResult[0] == 6)
                    {
                        location.href='http://member.webzen.com/Account/Rejoin/';
                    }
                    else if(objResult[0] == 7)
                    {
                        if (objResult[2] == null || objResult[2] == "")
                        {
                            alert(TEXT51);
                            document.getElementById("txtUserID").focus();
                        }
                        else
                        {
                            alert(objResult[2]);
                            document.getElementById("txtUserID").focus();
                        }
            
                    }
                    else if(objResult[0] == 8)
                    {
                            alert('Referrer Error');
                            document.getElementById("txtUserID").focus();
                    }
                    else if (objResult[0] == -1)
                    {
                        if (objResult[1] < 2)
                        {
                            alert(TEXT32);
                            document.getElementById("txtUserID").focus();
                        }
                        else
                        {
                            alert("You have " + (Number(objResult[1]) + 1) + " failed attempts to login, we're recommending that you recover your user ID and password from forgot ID/Password");
                            document.getElementById("txtUserID").focus();
                        }
                    }
                    else if (objResult[0] == -2)
                    {
                        alert(TEXT33);
                        document.getElementById("txtUserID").focus();
                    }
                    else if (objResult[0] == -3)
                    {
                        alert(TEXT34);
                        document.getElementById("txtUserID").focus();
                    }
                    else if (objResult[0] == -4)
                    {
                        alert(TEXT35);
                        document.getElementById("txtUserID").focus();
                    }
                    else
                    {
                        alert(TEXT37);
                        document.getElementById("txtUserID").focus();
                    }
                }
            },
            error: function(xhr, status, error) 
            {
                alert(TEXT49);
                document.getElementById("txtUserID").focus();
                
            }
        })
        
             
       return false;
}
</script>
<!-- Login Form -->
<div class="tmp_left_m">
  <table width="150" border="0" cellspacing="0" cellpadding="0">
    <tr>
		      <th width="20" scope="col">&nbsp;</th>
		      <th width="130" scope="col">&nbsp;</th>
	      </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><?
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
					echo '<li class="list_menu"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
				}
				
			}
		}
		echo ' </ul>
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
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 2px;  " width="130" background="#000"><input type="text" name="uss_id" maxlength="10" class="login_field" value="USER ID" OnClick="this.value=\'\'"></td>
    <td rowspan="2"><input type="image" src="template/'.$core['config']['template'].'/Mu/common/btn/bt_login.gif" onclick="uss_login_form.submit();"></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 2px;"><input type="password" name="uss_password" class="login_field" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="height: 25px; padding-left: 2px;" colspan="2" align="left" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'">'.link_lost_password.'</a></td>
  </tr>
     <tr>
    <td style="height: 25px; padding-left: 2px;"  colspan="2" align="left"  class="yellow">'.text_start_play_now.'</span> <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'">'.link_sign_up.'</a></td>
  </tr>
</table>
</form>';
		  }
		  ?></td>
	      </tr>
	    </table>
</div>
<!-- //Login Form -->

</td></tr></table>

			<ul class="rightbnr">
				

<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="quickbnr">
<h3><!-- e:mu movie 100806 --></h3>
<ul class="quicklink">
  <img src="template/<?=$core['config']['template'] ?>/Mu/main/title_trailer.gif" width="157" height="10">
<ul class="leftbanner">
  <li class="sns">
    <img src="template/<?=$core['config']['template'] ?>/Mu/data/banner/left_main_snsImg100408.jpg" border="0" usemap="#MapGo"></a>
    <map name="MapGo">
      <area shape="rect" coords="9,32,46,83" alt="Go to MU Facebook" href="http://www.facebook.com/" target="_blank">
      <area shape="rect" coords="50,32,87,84" alt="Go to MU YouTube" href="http://www.youtube.com/" target="_blank">
      <area shape="rect" coords="91,31,127,83" alt="Go to MU Orkut" href="http://www.orkut.com/" target="_blank">
      <area shape="rect" coords="132,31,168,84" alt="Go to MU Twitter" href="http://twitter.com/" target="_blank">
      </map>
  </li>
  <li> </li>
  
  <!-- left Banner -->
  <li><!--  20100810 ? ????? ??? -->
    <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>news"><img src="template/<?=$core['config']['template'] ?>/Mu/data/banner/left_main_100810.gif" border="0"></a></li>
    <p>&nbsp;</p>
    <p><img src="template/<?=$core['config']['template'] ?>/Mu/main/title_worldlink.gif" width="102" height="10"></p>
    <p>&nbsp;</p>
    <p>
  <?
                    if($core['language_switch'] == '1'){
                        foreach ($languages as $language_id =>  $language_data){
                            echo '&nbsp;<img  src="template/'.$core['config']['template'].'/images/flags/'.$language_data[2].'">  <a  href="'.ROOT_INDEX.'?change_language='.$language_id.'">'.$language_data[0].'</a>';
                        }
                    }
                    ?>
      <!-- //left Banner --></p>
</ul>
</ul>
</div>
</div>
</div>
</div>
<div id="footer" align="center">
  <?=build_footer(),$XX= base64_decode('PGRpdiBjbGFzcz0iZm9vdGVyX2ZvbnQiIGFsaWduPSJjZW50ZXIiPlRlbXBsYXRlIGJ5ICYjMjcy
O2EmIzExMDM7JiMxMDYzO29pJyBTJiMxMDgyOyYjMTA5NTstDQo8L2Rpdj4=');?>
</div>
<!-- AceCounter Log Gathering Script V.70.20080707 -->
<script type="text/javascript">
if(typeof _GUL == 'undefined'){
var _GUL = 'webzenlog.loginside.co.kr';var _GPT='80'; var _AIMG = new Image(); var _bn=navigator.appName; var _PR = location.protocol=="https:"?"https://"+_GUL+":443":"http://"+_GUL+":"+_GPT;if( _bn.indexOf("Netscape") > -1 || _bn=="Mozilla"){ setTimeout("_AIMG.src = _PR+'index2dcc.html?cookie';",1); } else{ _AIMG.src = _PR+'/?cookie'; };
document.writeln("<scr"+"ipt language='javascript' src='/acecounter/acecounter_V70.js'></scr"+"ipt>");
}
</script>
<noscript><img src='http://webzenlog.loginside.co.kr/?uid=3&amp;je=n&amp;' border=0 width=0 height=0></noscript>
<!-- AceCounter Log Gathering Script End -->

<!-- //Footer -->
</form>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body></html>
<script language="javascript" >


</script>
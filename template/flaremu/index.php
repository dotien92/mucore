<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=build_header_title(); ?></title>
<script language="JavaScript" type="text/JavaScript" src="livehelp/include/javascript.html"></script>

<script type="text/javascript" SRC="js/js_popup.html"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

//-->
</script>
<script language="JavaScript1.2">


var rector=3

///////DONE EDITTING///////////
var stopit=0 
var a=1

function init(which){
stopit=0
shake=which
shake.style.left=0
shake.style.top=0
}

function rattleimage(){
if ((!document.all&&!document.getElementById)||stopit==1)
return
if (a==1){
shake.style.top=parseInt(shake.style.top)+rector+"px"
}
else if (a==2){
shake.style.left=parseInt(shake.style.left)+rector+"px"
}
else if (a==3){
shake.style.top=parseInt(shake.style.top)-rector+"px"
}
else{
shake.style.left=parseInt(shake.style.left)-rector+"px"
}
if (a<4)
a++
else
a=1
setTimeout("rattleimage()",50)
}

function stoprattle(which){
stopit=1
which.style.left=0
which.style.top=0
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/islide.js" type="text/javascript"></script>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/images/fcv.css" type="text/css">
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/images/fcv2.css" type="text/css">
<style type="text/css">
.i { 
background-image:url(template/<?=$core['config']['template'] ?>/images/input.gif);
background-repeat:no-repeat;
height:26px;
width:158px;
border:0px;
color:#7e592f;
padding-left:4px;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;}
.ii { 
background-image:url(template/<?=$core['config']['template'] ?>/images/input2.gif);
background-repeat:no-repeat;
height:26px;
width:158px;
border:0px;
color:#7e592f;
padding-left:4px;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;}
.tmp_left_menu a { color:#fff; font:normal 12px Arial, Helvetica, sans-serif; }


.tmp_left_menu li.list_menu { height:30px; line-height:20px; width:248;  color:#ffffff; background: url(template/<?=$core['config']['template'] ?>/images/menu1.png) no-repeat ; padding-top:3px; padding-left:35px; text-shadow:#000 1px 2px 1px; font-size:13px; 	display:block;}

.list_menu22 {background-image:url(background="template/<?=$core['config']['template'] ?>/images/ac2.png")
}
.tmp_left_menu li.list_menu:hover {
	background-image:url(template/<?=$core['config']['template'] ?>/images/menu3.png);
	height:30px;
	text-shadow:#000 0px 0px  2px ;
	color:#fff;
	display:block;
	padding-left:35px;
	width:248;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:13px;
}

-->
</style>

</head>
<body bgcolor="#000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('template/<?=$core['config']['template'] ?>/images/register_1.png','template/<?=$core['config']['template'] ?>/images/downloads_2.png','template/<?=$core['config']['template'] ?>/images/webshop_3.png','template/<?=$core['config']['template'] ?>/images/contact_4.png','template/<?=$core['config']['template'] ?>/images/11.png','template/<?=$core['config']['template'] ?>/images/33.png')">
<!-- Save for Web Slices (flaremubet.psd) -->
<table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="150" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="template/<?=$core['config']['template'] ?>/images/game_start.png" width="395" height="104" alt=""></td>
        <td><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('register','','template/<?=$core['config']['template'] ?>/images/register_1.png',1)"><img  src="template/<?=$core['config']['template'] ?>/images/register_.png" name="register" width="140" height="104" border="0"></a></td>
        <td><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('downloads','','template/<?=$core['config']['template'] ?>/images/downloads_2.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/downloads_.png" name="downloads" width="147" height="104" border="0"></a></td>
        <td><a href="http://shop.flaremu.net/" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('webshop','','template/<?=$core['config']['template'] ?>/images/webshop_3.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/webshop_.png" name="webshop" width="149" height="104" border="0"></a></td>
        <td><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>contact" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('contact','','template/<?=$core['config']['template'] ?>/images/contact_4.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/contact_.png" name="contact" width="168" height="104" border="0"></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="394"><img src="template/<?=$core['config']['template'] ?>/images/game_start-08.png" alt="" width="394" height="247" border="0" usemap="#Map"></td>
        <td  width="606" height="247" background="template/<?=$core['config']['template'] ?>/images/header.png"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','606','height','247','wmode','transparent','src','header','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','#CCCCCC','movie','header' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="606" height="247" wmode="transparent">
          <param name="movie" value="header.swf">
          <param name="wmode" value="transparent">
          <param name="quality" value="high"><param name="BGCOLOR" value="#CCCCCC">
          <embed src="header.swf" width="606" height="247" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#CCCCCC"></embed>
        </object></noscript></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="template/<?=$core['config']['template'] ?>/images/menu.png" alt="" width="1000" height="33" border="0" usemap="#Map2"></td>
  </tr>
  <tr>
    <td><table width="150" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><img src="template/<?=$core['config']['template'] ?>/images/left.png" width="68" height="352" alt=""></td>
        <td valign="top"><table width="851" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="851"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="309" height="62"  background="template/<?=$core['config']['template'] ?>/images/itime.png"><Br><center><font color="#996600"><script LANGUAGE="JavaScript">
<!-- COMIENZO
Stamp = new Date();
year = Stamp.getYear();
if (year < 2000) year = 1900 + year;
document.write('<font size="2" face="Arial"><B>Fecha: ' + (Stamp.getMonth() + 1) +"/"+Stamp.getDate()+ "/"+ year + '</B></font><BR>');
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
document.write('<font size="2" face="Arial"><B>Hora: ' + Hours + ":" + Mins + Time + '</B></font>');
// FIN -->
</script></font></center></td>
                <td background="template/<?=$core['config']['template'] ?>/images/live.png" width="286" height="62"><!-- stardevelop.com Live Help International Copyright - All Rights Reserved //-->
<!--  BEGIN stardevelop.com Live Help Messenger Code - Copyright - NOT PERMITTED TO MODIFY IMAGE MAP/CODE/LINKS //-->
<div id="floatLayer" align="left" style="position:absolute; left:10px; top:10px; visibility:hidden; z-index:5000;">
  <map name="LiveHelpInitiateChatMap" id="LiveHelpInitiateChatMap">
    <area shape="rect" coords="50,210,212,223" href="http://livehelp.stardevelop.com/" target="_blank" alt="stardevelop.com Live Help"/>
    <area shape="rect" coords="113,183,197,206" href="#" onclick="openLiveHelp();acceptInitiateChat();return false;" alt="Accept"/>
    <area shape="rect" coords="206,183,285,206" href="#" onclick="declineInitiateChat();return false;" alt="Decline"/>
    <area shape="rect" coords="263,86,301,104" href="#" onclick="declineInitiateChat();return false;" alt="Close"/>
  </map>
  <div id="InitiateText" align="center" style="position:relative; left:30px; top:145px; width:275px; height:35px; z-index:5001; text-align:center; font-family: Verdana, Tahoma, Helvetica, sans-serif; font-size: 14px; font-weight: bold; color: #000000">Do you have any questions that I can help you with?</div>
  <img src="livehelp/locale/en/template/<?=$core['config']['template'] ?>/images/InitateChat.gif" alt="stardevelop.com Live Help" width="323" height="229" border="0" usemap="#LiveHelpInitiateChatMap"/></div>

  <div align="left">
    <div align="center">
     
      <a href="#" target="_blank" onclick="openLiveHelp(); return false"><img src="template/<?=$core['config']['template'] ?>/premium/online.png" id="LiveHelpStatus" name="LiveHelpStatus" border="0" width="279" height="54"/></a>
      
    </div></td>
                <td width="256" height="62" background="template/<?=$core['config']['template'] ?>/images/login.png"><?
		  if($user_login == '1'){
		  	echo '<div class="list_menu">
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','¦');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode("¦",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					
				}
				
			}
		}
		echo ' </ul>
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td align="left" class="forgot_pass"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td align="right" class="forgot_pass"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
		  	  <table width="239" border="0" cellspacing="0" cellpadding="0">
		  	    <tr>
		  	      <td width="198"><table width="239" height="27" border="0" cellpadding="0" cellspacing="0">
		  	        <tr>
		  	          <td width="114"><span style="height: 25px; padding-left: 2px;  ">
		  	            <input type="text"  name="uss_id" maxlength="10" class="i"  value="USER ID" OnClick="this.value=\'\'" size="20">
		  	            <span style="height: 25px; padding-left: 2px;">
		  	            <input type="password" size="20" name="uss_password"  class="ii"  value="PASSWORD" maxlength="10" onClick="this.value=\'\'">
		  	            </span></span></td>
		  	          <td width="125"><span style="height: 25px; padding-left: 2px;">
		  	            <input type="hidden" name="process_login">
		  	            <input name="image" type="image"  onClick="uss_login_form.submit();" src="template/'.$core['config']['template'].'/images/login.gif">
		  	            </span></td>
	  	            </tr>
		  	        </table></td>
	  	        </tr>
		  	    <tr>
		  	      <td><table width="239" border="0" cellspacing="0" cellpadding="0">
		  	        <tr>
		  	          <td width="119"><div align="right"></div></td>
	  	            </tr>
		  	        </table></td>
	  	        </tr>
	  	      </table>
		  	</form>';
		  }

?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="267" background="template/<?=$core['config']['template'] ?>/images/bgc.png" bgcolor="#2E170F" style="background-repeat:no-repeat; background-position:top" valign="top"><table width="100%" height="113" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr class="list_menu">
                <td width="300" valign="top" class="list_menu"><table width="162" height="25" border="0" align="center" class="list_menu" cellpadding="0" cellspacing="3">
                  <tr class="list_menu"><td class="list_menu" width="215" style="padding-left:8px; "><div align="center" class="list_menu"><?
		  if($user_login == '1'){
		  	echo '<div class="list_menu" align="center">
		  	<ul class="list_menu">';
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
		 
		 ';
		  }else
		  ?></div></td></tr>
                </table><table width="90" height="205" border="0" align="right" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="288" height="21"><table width="284" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="263" height="18"><div class="tmp_left_menu">
                            
                     
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
                        </div></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="19"><div align="center"><a href="http://shop.flaremu.net/" onMouseOut="MM_swapImgRestore()"  onMouseOver="MM_swapImage('i','','template/<?=$core['config']['template'] ?>/images/11.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/1.png" name="i" width="288" height="62" border="0" ></a></div></td>
                  </tr>
                  <tr>
                    <td height="38"><div align="center"><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('22','','template/<?=$core['config']['template'] ?>/images/22.png',0)"><img src="template/<?=$core['config']['template'] ?>/images/2.png" name="22" width="288" height="59" border="0"></a></div></td>
                  </tr>
                  <tr>
                    <td height="19"><div align="center"><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>contact" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('33','','template/<?=$core['config']['template'] ?>/images/33.png',1)"><img src="template/<?=$core['config']['template'] ?>/images/3.png" name="33" width="288" height="60" border="0"></a></div></td>
                  </tr>
                  <tr>
                    <td height="19"><div align="center">

				
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="270">
            <tbody><tr>
		   <td height="35" width="270" background="template/<?=$core['config']['template'] ?>/images/ttitl.png" style="background-repeat:no-repeat">
<div align="center" sub-title>
  <div align="center" class="sub-title"></div>
</div></td>
            </tr>
            <td style="padding-left: 10px; " align="left"><br>
            </table><br>
				</div></td>
                  </tr>
                </table>                
 
                  </td>
                <td width="551" valign="top"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                  <table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/a.png" width="545" height="24"></td>
                  </tr>
                  <tr>
                    <td height="495" background="template/<?=$core['config']['template'] ?>/images/b.png" valign="top"><table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td valign="top">
                          <table width="500" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="31" background="template/<?=$core['config']['template'] ?>/images/conts.png" valign="top" style="background-repeat:no-repeat; background-position:top; padding-top:5px;"><div align="center"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><div class="tmp_m_content">
                                <div class="tmp_page_content"><?
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
                  echo '';
		  	
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
?></div>
                              </div>
                              <div class="tmp_m_content">
                                <div class="tmp_page_content"> </div>
                                </div></td>
                            </tr>
                          </table></div></td>
                            </tr>
                          </table><br>
                          <table width="494" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="498">
                  <div class="tmp_m_content"> 
				
					<div class="tmp_page_content">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
		 <td align="left" width="22" height="32">&nbsp;</td> 
		 <td align="left" class="iN_title" width="97%">&nbsp;</td>
		</tr>
		<tr>
		 <td colspan="2" algin="left" style="background-image:url(template/RealZ_Stress/template/<?=$core['config']['template'] ?>/images/inner_line.jpg); height: 2px;"></td>
		</tr>
		<tr>
		 <td colspan="2" align="left" class="iN_date">&nbsp;</td>
		</tr>
		 <td colspan="2" algin="left" style="background-image:url(template/RealZ_Stress/template/<?=$core['config']['template'] ?>/images/inner_line.jpg); height: 2px;"></td>
		</tr>
		<tr>
		 <td colspan="2" align="left" class="iN_news_content"><p>&nbsp;</p></td>
		</tr>
				<tr>
		 <td colspan="2" align="right">&nbsp;</td>
		</tr>
		 <td colspan="2" algin="left" style="background-image:url(template/RealZ_Stress/template/<?=$core['config']['template'] ?>/images/inner_line.jpg); height: 2px;"></td>
		</tr>
		
		<tr>
		 <td colspan="2" align="right" height="32">&nbsp;</td>
		</tr>

		</table>
		
		
		</div> </div><div class="tmp_m_content"> 
				
					<div class="tmp_page_content">
					  <div align="center"></div></div> </div></td>
                            </tr>
                          </table>
                          
                          </td>
                      </tr>
                    </table>
                      </td>
                  </tr>
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/c.png" width="545" height="16"></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#2E170F"><img src="template/<?=$core['config']['template'] ?>/images/bgfc.png" width="851" height="31" alt=""></td>
          </tr>
        </table></td>
        <td valign="top"><img src="template/<?=$core['config']['template'] ?>/images/right.png" width="81" height="353" alt=""></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="template/<?=$core['config']['template'] ?>/images/footer.png" alt="" width="1000" height="263" border="0" usemap="#Map3"></td>
  </tr>
</table>
<!-- End Save for Web Slices -->

<map name="Map">
<area shape="poly" coords="177,243,188,209,214,192,230,192,251,198,268,215,270,237,271,245" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads">
</map>
<map name="Map2"><area shape="rect" coords="331,10,383,29" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>news">
<area shape="rect" coords="389,11,458,28" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register">
<area shape="rect" coords="465,12,556,25" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads">
<area shape="rect" coords="567,13,639,27" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings">
<area shape="rect" coords="648,13,736,23" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>cs">
<area shape="rect" coords="745,13,802,25" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>banned">
<area shape="rect" coords="817,14,886,25" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>contact">
</map>
<map name="Map3"><area shape="rect" coords="81,82,183,94" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register">
<area shape="rect" coords="81,101,208,115" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>lost_password">
<area shape="rect" coords="294,80,432,95" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads">
<area shape="rect" coords="296,101,439,115" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads">
<area shape="rect" coords="294,120,442,135" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads">
<area shape="rect" coords="508,82,678,96" href="http://tuwebshop">
<area shape="rect" coords="509,103,677,113" href="http://tuwebshop">
<area shape="rect" coords="509,119,686,134" href="http://tuwebshop">
<area shape="rect" coords="726,81,874,94" href="http://tuforo">
<area shape="rect" coords="727,102,903,113" href="http://tuforo">
<area shape="rect" coords="725,123,801,133" href="http://tuforo">
</map><div align="center" class="footer_font">

</div>
</body>

<!-- Mirrored from www.flaremu.net/ by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 23 Apr 2011 15:26:14 GMT -->
</html>
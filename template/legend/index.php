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
<link href="template/<?=$core['config']['template'] ?>/images/mu_logo.png" rel="shortcut icon" type="image/x-icon" />
<style>
body {
	padding: 0;
	margin: 0px 0px 0px 0px;
	font-family: Tahoma, Verdana, Geneva, Arial, Helvetica, Helvetica;
	font-size: 11px;
	color:#7d6a6a;
}
.color_1 { color:#817e7e}
.n { text-decoration:none}
.n a {font-family: 'Archivo Narrow', sans-serif; font-size:15px;text-decoration:none; color:#dbd1d4; text-decoration:none; padding:9px; text-shadow:#000 0px 1px 0px;}
.n a:hover {font-family: 'Archivo Narrow', sans-serif; font-size:15px;text-decoration:none; color:#fff; background:rgba(0, 0, 0, 0.29);;-webkit-border-radius: 6px;
-moz-border-radius: 6px;
border-radius: 6px; }
.title {font-family: 'Archivo Narrow', sans-serif;  font-size:15px; color:#867f7f; text-shadow:#000 0px 1px 0px; padding-bottom:5px;}
.titlemodule {font-family: 'Archivo Narrow', sans-serif;  font-size:13px; color:#fff; text-shadow:#000 0px 1px 0px;padding-top: 5px;}



a:link {color:#b8a5a5; text-decoration:none}      /* unvisited link */
a:visited {color:#b8a5a5;text-decoration:none}  /* visited link */
a:hover {color:#fff;text-decoration:none}  /* mouse over link */
a:active {color:#b8a5a5;text-decoration:none}  /* selected link */ 

.tooltip {
    display: inline;
    position: relative;
}

.tooltip:hover {
    color: #c00;
    text-decoration: none;
}
.okk { margin-top:-36px; margin-right:-30px; }
.tooltip:hover:after {
    background: #111;
    background: rgba(0,0,0,.8);
    border-radius: .5em;
    bottom: 1.35em;
    color: #fff;
    content: attr(title);
    display: block;
    left: 1em;
    padding: .3em 1em;
    position: absolute;
    text-shadow: 0 1px 0 #000;
    white-space: nowrap;
    z-index: 98;
}

.tooltip:hover:before {
    border: solid;
    border-color: #111 transparent;
    border-color: rgba(0,0,0,.8) transparent;
    border-width: .4em .4em 0 .4em;
    bottom: 1em;
    content: "";
    display: block;
    left: 2em;
    position: absolute;
    z-index: 99;
}

.color_8 { color:#86788a;text-shadow:#1a2b3f 0px 0px 2px;}
.color_4 { color:#b31f1f;text-shadow:#000 0px 1px 0px;}
.color_2 { color:#b36f1f;text-shadow:#000 0px 1px 0px;}
.username { border: 1px solid #2f2b2b;
background: #0d0a09;
color: #474747;
font-size: 11px;
height:33px;
width: 212px;
padding-left: 5px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
.password { border: 1px solid #2f2b2b;
background: #0d0a09;
color: #474747;
font-size: 11px;
height:33px;
width:133px;
padding-left: 5px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
   -moz-box-shadow:    inset 0 0 3px #000000;
   -webkit-box-shadow: inset 0 0 3px #000000;
   box-shadow:         inset 0 0 3px #000000;}

#slidebox{position:relative; overflow:hidden;}
#slidebox, #slidebox ul {width:654px;height:229px;}
#slidebox, #slidebox ul li{width:654px;height:229px;}
#slidebox ul li{position:relative; left:0;  float:left;list-style: none;  font-family:Verdana, Geneva, sans-serif; font-size:13px;}
#slidebox .next, #slidebox .previous{position:absolute; z-index:2; display:block; width:37px; height:38px;top:139px;}
#slidebox .next{right:0; margin-right:44px; background:url(template/<?=$core['config']['template'] ?>/images/arrows.png) no-repeat left top;background-position:-37px 0;cursor:pointer;opacity: 0.3; -webkit-transition: all 0.6s ease; -moz-transition: all 0.6s ease; -o-transition: all 0.6s ease;}
#slidebox .next:hover{background:url(template/<?=$core['config']['template'] ?>/images/arrows.png) no-repeat left top;background-position:-37px 0;cursor:pointer;opacity: 1;
   transition: opacity .25s ease-in-out;
   -moz-transition: opacity .25s ease-in-out;
   -webkit-transition: opacity .25s ease-in-out;}
#slidebox .previous{margin-left:44px; background:url(template/<?=$core['config']['template'] ?>/images/arrows.png) no-repeat left top; background-position:0px 0;cursor:pointer;opacity: 0.3; -webkit-transition: all 0.6s ease; -moz-transition: all 0.6s ease; -o-transition: all 0.6s ease;}
#slidebox .previous:hover{background:url(template/<?=$core['config']['template'] ?>/images/arrows.png) no-repeat left top; background-position:0px 0; cursor:pointer;opacity: 1;
   transition: opacity .25s ease-in-out;
   -moz-transition: opacity .25s ease-in-out;
   -webkit-transition: opacity .25s ease-in-out;}
#slidebox .thumbs{position:absolute; z-index:2; bottom:10px; right:48%;   vertical-align: middle; padding:10px;-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;background: #ffa90a; /* Old browsers */
background: -moz-linear-gradient(top, #ffa90a 0%, #fe6e09 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffa90a), color-stop(100%,#fe6e09)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #ffa90a 0%,#fe6e09 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #ffa90a 0%,#fe6e09 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #ffa90a 0%,#fe6e09 100%); /* IE10+ */
background: linear-gradient(to bottom, #ffa90a 0%,#fe6e09 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffa90a', endColorstr='#fe6e09',GradientType=0 ); /* IE6-9 */}
#slidebox .thumbs a{display:block; margin-left:5px; float:left; font-family:Verdana, Geneva, sans-serif; font-size:9px; text-decoration:none; padding:4px 7px; background:url(slidebox_thumb.html); color:#fff; text-indent:-9999;-webkit-border-radius: 100px;
-moz-border-radius: 100px;
border-radius: 100px;   -moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000; border:1px solid #6a3814;}
#slidebox .thumbs a:hover{background:#b86224; color:#e16913;}
#slidebox .thumbs .thumbActive{background:#b86224; color:#e16913; display:block; margin-left:5px; float:left; font-family:Verdana, Geneva, sans-serif; font-size:9px; text-decoration:none; padding:4px 7px;}


.news{ /*header of 1st demo*/
cursor: hand;
cursor: pointer;
background-image:url(template/<?=$core['config']['template'] ?>/images/closed.png);
width:658px;
margin: 2px;
height:48px;
line-height: 3.5;
font-family: 'Archivo Narrow', sans-serif; font-size:14px;text-decoration:none; color:#615959; text-decoration:none; text-shadow:#000 0px 1px 0px;
}
.news:hover{ /*header of 1st demo*/
cursor: hand;
cursor: pointer;
background-image:url(template/<?=$core['config']['template'] ?>/images/open.png);
width:658px;
margin: 2px;
height:48px;color:#fff;
line-height: 3.5;
font-family: 'Archivo Narrow', sans-serif; font-size:14px;text-decoration:none; color:#fff; text-decoration:none; text-shadow:#000 0px 1px 0px;
}
.news3{ /*class added to contents of 1st demo when they are open*/
background-image:url(template/<?=$core['config']['template'] ?>/images/open.png);color:#fff;
}

.dust { background:rgba(0, 0, 0, 0.4); padding:5px;-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;}

.sideLinks ul li a { display:block; color:#90ff90; margin:2px; padding:2px 4px; background:url(template/<?=$core['config']['template'] ?>/images/normal.png);width:204px; height:19px;}
.asd { margin-top:-10px; margin-left:-40px;}
</style>

	<script src="template/<?=$core['config']['template'] ?>/images/jcarousellite_1.0.1c5.js" type="text/javascript"></script>
	<script src="template/<?=$core['config']['template'] ?>/images/news_1.0.1c5.js" type="text/javascript"></script>
	<script type="text/javascript">

//Initialize first demo:
ddaccordion.init({
headerclass: "news", //Shared CSS class name of headers group
	contentclass: "news2", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: false, //persist state of opened contents within browser session?
	toggleclass: ["", "news3"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "slow", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

//Initialize 2nd demo:
ddaccordion.init({
	headerclass: "technology", //Shared CSS class name of headers group
	contentclass: "thelanguage", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	scrolltoheader: false, //scroll to header each time after it's been expanded by the user?
	persiststate: false, //persist state of opened contents within browser session?
	toggleclass: ["closedlanguage", "openlanguage"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

</script>
	<script type="text/javascript">

$(function() {
	$("#slidebox").jCarouselLite({
		vertical: true,
		hoverPause:true,
		btnPrev: ".previous",
		btnNext: ".next",
		visible: 1,
		start: 0,
		scroll: 1,
		circular: true,
		auto:5000,
		speed:200,				
		btnGo:
		    [".1", ".2"],
		
		afterEnd: function(a, to, btnGo) {
				if(btnGo.length <= to){
					to = 0;
				}
				$(".thumbActive").removeClass("thumbActive");
				$(btnGo[to]).addClass("thumbActive");
		    }
	});
});
</script>
</head>
<body bgcolor="#000000" background="template/<?=$core['config']['template'] ?>/images/bgr.jpg"  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="template/<?=$core['config']['template'] ?>/images/bg.jpg" style="background-repeat:no-repeat; background-position:top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="962" height="62" background="template/<?=$core['config']['template'] ?>/images/rss.png" valign="bottom"><table width="890" height="59" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="440">&nbsp;</td>
        <td width="450"><marquee><?
$config = simplexml_load_file('engine/config_mods/rss_feed_settings.xml');
if($config->active == '0'){
	echo msg('0','Sorry, this feature is temporarily unavailable at the moment.');
}else{
	include('engine/rss_feed.php'); 
	$rss = new lastRSS; 
	$rss->cache_dir = './engine/cache/rss';
	$rss->cache_time = trim($config->rss_time)*60; 
	$count_rss = 0;
	

	if ($rs = $rss->get($config->rss_url)) {
		echo '<ul id="SSR">';
		foreach ($rs['items'] as $item){
			$count_rss++;
			$item['title'] = str_replace("<![CDATA[","",$item['title']);
			$item['title'] = str_replace("]]>","",$item['title']);
			echo '<li><a href="'.$item['link'].'" target="_blank">'.set_limit($item['title'],trim($config->rss_length),'...').'</a></li>';
			
			if($count_rss >= trim($config->rss_count)){
				break;
			}
		}
		echo '</ul>';
		
	}else{
		echo msg('0',''.rss_feed.'');
	}
	
}
?></marquee></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="962" height="77" background="template/<?=$core['config']['template'] ?>/images/menu.png"><div align="center" class="n"><a href="index.php">Home</a> <a href="index.php?page_id=downloads">Downloads</a> <a href="index.php?page_id=register">Register</a> <a href="index.php?page_id=rankings">Rankings</a> <a href="http://hastlegames.com/"index.php?page_id=donate">Donate</a> <a href="index.php?page_id=cs">CastleSiege</a><a href="index.php?page_id=contact">Contact</a></div></td>
  </tr>
  <tr>
    <td><img src="template/<?=$core['config']['template'] ?>/images/header.png" width="962" height="367" alt=""></td>
  </tr>
  <tr>
    <td><table width="962" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="212" valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  width="270" height="95" background="template/<?=$core['config']['template'] ?>/images/vote.png"><table width="235" height="72" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td width="108"><div align="right"><div id="soc"><a href="#"><img src="template/<?=$core['config']['template'] ?>/images/votenew.jpg" width="88" height="51" border="0" /></a></div>
                </div></td>      
                <td width="127" class="color_1">Vote for server every 12 hours and earn 1000 credits!!!</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="template/<?=$core['config']['template'] ?>/images/menu_1.png" width="270" height="24" alt=""></td>
          </tr>
          <tr>
            <td background="template/<?=$core['config']['template'] ?>/images/menu_3.png" valign="top"><table width="270" height="447" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="162" background="template/<?=$core['config']['template'] ?>/images/menu_2.png" style="background-position:top; background-repeat:no-repeat; padding-left:8px;" valign="top" ><table width="234" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="234" height="39" background="template/<?=$core['config']['template'] ?>/images/module_t.png"><div align="center" class="titlemodule">ACCOUNT PANEL </div></td>
                  </tr>
                  <tr><td background="template/<?=$core['config']['template'] ?>/images/module_bg.png" style="padding-top:5px; padding-bottom:5px;">
                    
<table width="200" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td><table width="219" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="143"><?
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
					echo '<li class="menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
				}
				
			}
		}
		echo ' </ul>
		 </div>
		  <table width="159" border="0" cellpadding="0" cellspacing="1" style="padding-left:33px; padding-right:-10px;">
		 <tr>
		  <td class="forgot_pass" style="padding: 5px; background: rgba(0, 0, 0, 0.3); border: 1px solid #292727;">
		  <a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'"><span class="forgot_pass" style="padding-left:2px;"><span class="zer"><div align="center">Settings</div></font></span></a></div></td>
		  <td class="forgot_pass" style="padding: 5px;
background: rgba(0, 0, 0, 0.3);
border: 1px solid #292727;" ><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout"><span class="zer"><div align="center">Log Out</div></font></span></a></div></td>
		 </tr>


		 
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			  <table width="159" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td style="height: 25px; padding-left: 2px;  " width="130"><input type="text" name="uss_id" maxlength="10" class="username" value="USER ID" OnClick="this.value=\'\'"
></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 2px;"><input type="password" name="uss_password" class="password" value="PASSWORD" OnClick="this.value=\'\'"
 maxlength="12"></td>
  
    <td rowspan="2"><span style="height: 25px; padding-left: 2px;">
      <input type="hidden" name="process_login">
    </span></td></tr>
    <table width="159" border="0" align="center" cellpadding="0" cellspacing="0">
			   <tr>
			     <td align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			       <tr>
			         <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			           
		             </table></td>
			         <td><input name="image" type="image"  onclick="uss_login_form.submit();" src="template/'.$core['config']['template'].'/images/login.png" class="okk" align="right"></td>
		           </tr>
		         </table></td>
		       </tr>
		      </table>
		  	</form>
		  	</form></td>
                      </tr>';
		  }
		  ?></td>
        <td width="73">
  </td>
      </tr>
    </table></td>
  </tr>
</table>
		  	</form>
		  	</td>
                  </tr>
                  <tr>
                    <td><img src="template/<?=$core['config']['template'] ?>/images/module_bt.png" width="234" height="3" /></td>
                  </tr>
                  <tr>
                    <td height="7"> </td>
                  </tr>
                </table>
                  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><div id="soc"><a href="index.php?page_id=market" ><img src="template/<?=$core['config']['template'] ?>/images/w.png" width="230" height="57" border="0" /></a></div></td>
                    </tr>
                    <tr>
                      <td height="7"></td>
                    </tr>
                  </table>
				   <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                     <tr>
                    <td height="18"><table width="177" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="184"><tr><td width=50%  style='border-bottom:1px dashed #3a1c0a'><span style="color:#825c45; font-size:11px;">Main Server</span></td>
						  <td width=50%  style='border-bottom:1px dashed #3a1c0a'><div align=right><?PHP
if (eregi("status/servidor.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require 'engine/global_config.php';

$onlineoffline = "127.0.0.1";
if ($check=@fsockopen($onlineoffline,55901,$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	echo '<font color=#006600>Online</font>'; 
	}
else 
	{ 
	echo '<font color=#741c1c>Offline</font>'; 
	} 
?><br></div></td>  </tr>     	<tr>
	<td width=50%  style='border-bottom:1px dashed #3a1c0a'>
	<span style="color:#825c45; font-size:11px;">Castle Siege</span>
	</td>
    <td width=50%  style='border-bottom:1px dashed #3a1c0a'>
	<div align=right><span style="color:#741c1c;font-size:11px;"><?PHP
if (eregi("status/statusgscs.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require 'engine/global_config.php';

$onlineoffline = "127.0.0.1";
if ($check=@fsockopen($onlineoffline,55919,$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	echo '<font color=#006600>Online</font>'; 
	}
else 
	{ 
	echo '<font color=#741c1c>Offline</font>'; 
	} 
?></span>
	 <br></div></td>  
	</tr></td>
						  
						  
						  
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                  </table>
                  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                    
                    <tr>
                      <td height="7"></td>
                    </tr>
                  </table>
                  <table width="234" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="234" height="39" background="template/<?=$core['config']['template'] ?>/images/module_t.png"><div align="center" class="titlemodule">MENU</div></td>
                    </tr>
                    <tr>
                      <td background="template/<?=$core['config']['template'] ?>/images/module_bg.png"  style="padding-top:5px; padding-bottom:5px;"><table width="221" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="padding-left:4px;"><?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms','¦');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode("¦",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<li class="meniu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="meniu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="'.$li[10].'"  target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';
					   	
					   	break;
					   }


					  	
					  }
					  
		  ?>
						  
						 </div></td>
                        </tr>
                     </table></td>
                    </tr>
                    <tr>
                      <td><img src="template/<?=$core['config']['template'] ?>/images/module_bt.png" width="234" height="3" /></td>
                    </tr>
                    <tr>
                      <td height="7"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="template/<?=$core['config']['template'] ?>/images/menu_4.png" width="270" height="35" alt="" /></td>
          </tr>

        </table></td>
        <td width="750"><table width="200" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="692" height="237" background="template/<?=$core['config']['template'] ?>/images/slide.png"><table width="654" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><div id="slidebox">
<div class="next"></div>
<div class="previous"></div>

	<ul>
    	<li><img src="template/<?=$core['config']['template'] ?>/images/ex700soon.gif" width="654" height="229" class="asd" alt="s" title="eX702 Coming Soon !!!"  data-transition="fade" /></li>
	</ul>
</div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="692" height="72" background="template/<?=$core['config']['template'] ?>/images/title.png"><div align="center" class="title"><?=build_header_title(); ?></div></td>
          </tr>
          <tr>
            <td background="template/<?=$core['config']['template'] ?>/images/content.png"><table width="692" height="496" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="496" background="template/<?=$core['config']['template'] ?>/images/shadow.png" style="background-repeat:no-repeat; background-position:top" valign="top"><table width="655" border="0" align="center" cellpadding="0" cellspacing="0"  style="padding-bottom:0px">
                  
                  <tr>
                    <td height="1">&nbsp;</td>
                  </tr>
                </table>
                  <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>
          
<table width="656" border="0" cellspacing="0" cellpadding="0" class="dust" align="center"><tr>
  <td><?
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
</tr></table></td>
                  </tr>
                </table>
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="692" height="227" background="template/<?=$core['config']['template'] ?>/images/footer.png" style="padding-right:7px; padding-top:14px; background-repeat:no-repeat; background-position:top;"><table width="419" height="62" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top"><div align="center"><?=build_footer(),$XX= base64_decode('');?></div> </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table></td>
  </tr>
</table>

</body>
</html>

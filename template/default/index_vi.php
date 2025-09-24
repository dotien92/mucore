<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8"/>
<?php /* date_default_timezone_set('Asia/Ho_Chi_Minh'); */ ?>
<?php require_once('engine/slider_config.php');
      require ('engine/statistics_config.php');?>
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<meta name="keywords" content="MU, MU online"/>
<meta name="description" content="Private MU Online server"/>
<link rel="shortcut icon" href="template/<?=$core['config']['template'] ?>/favicon.ico" type="image/x-icon">
<link type="text/css" rel="stylesheet" href="template/<?=$core['config']['template'] ?>/style.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script src="js/jquery.js"></script>
<script src="js/core_global.js"></script>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/Main.min.js"></script>
<!--
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>


<script src="template/<?=$core['config']['template'] ?>/js/jquery.nivo.slider.js"></script>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/images/slider/nivo-slider.css" type="text/css" />
-->
<script type="text/javascript">
/* <![CDATA[ */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-35893324-2']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

/* ]]> */
</script>
<script>
var lang=new Array("Opens in","Open, starts in","Starts in","Hurry, lefts only");
</script>

<?php
if($_GET['page_id'] == 'guides')
{
?>
<script type="text/javascript">
function disableselect(e) {
    return false;
}

function reEnable() {
    return true;
}

document.onselectstart = new Function("return false");

if (window.sidebar) {
    document.onmousedown = disableselect;
    document.onclick = reEnable;
}
</script>
<?php } ?>

<script type="text/javascript">
var weekdaystxt=["Sunday", "Monday", "Thuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
var monthtxt=["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"]
function showLocalTime(container, servermode, offsetMinutes, displayversion){
  if (!document.getElementById || !document.getElementById(container)) return
  this.container=document.getElementById(container)
  this.displayversion=displayversion
  var servertimestring=(servermode=="server-php")? '<?php print date("F d, Y H:i:s", time())?>' : (servermode=="server-ssi")? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : '<%= Now() %>'
  this.localtime=this.serverdate=new Date(servertimestring)
  this.localtime.setTime(this.serverdate.getTime()+offsetMinutes*60*1000) //add user offset to server time
  this.updateTime()
  this.updateContainer()
}

showLocalTime.prototype.updateTime=function(){
  var thisobj=this
  this.localtime.setSeconds(this.localtime.getSeconds()+1)
  setTimeout(function(){thisobj.updateTime()}, 1000) //update time every second
}

showLocalTime.prototype.updateContainer=function(){
  var thisobj=this
  if (this.displayversion=="long")
  this.container.innerHTML=this.localtime.toLocaleString()
  else{
    var hour=this.localtime.getHours()
    var minutes=this.localtime.getMinutes()
    var seconds=this.localtime.getSeconds()
    var dayofweek=weekdaystxt[this.localtime.getDay()]
    var month=monthtxt[this.localtime.getMonth()]
    this.container.innerHTML=this.localtime.getDate()+"."+month+"."+this.localtime.getFullYear()+", "+formatField(hour, 2)+":"+formatField(minutes)+":"+formatField(seconds)
  }
  setTimeout(function(){thisobj.updateContainer()}, 1000)
}

function formatField(num, isHour){
  return (num<=9)? "0"+num : num
}
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('.guideaccButton').click(function() {

        $('.guideaccButton').removeClass('on');

         $('.guideaccContent').slideUp('normal');

        if($(this).next().is(':hidden') == true) {

            $(this).addClass('on');

            $(this).next().slideDown('normal');
         }

     });

});
</script>

<script type="text/javascript">
function show_status() {
$('.server_status').slideDown('normal');
$('.flagWrap li.first').addClass('on');
$('.flagWrap').addClass('on');
$('.flagWrap li.status').hide();
}
function hide_status() {
$('.server_status').slideUp('normal');
$('.flagWrap li.first').removeClass('on');
$('.flagWrap').removeClass('on');
$('.flagWrap li.status').show();
}
</script>

</head>
<body>
<?php

$link_identifier = mssql_connect($core['db_host'], $core['db_user'], $core['db_password']);
mssql_select_db($core['db_name'], $link_identifier);

if($core['config']['on_off'] == '0' || $core['debug'] == '1'){
    if(isset($_SESSION['admin_login_auth'])){
        echo '<div align="center" style="color: red; background-color: white; padding:2px"><b>Warning: The website is currently turned off!</b></div>';
    }

}


function CheckGS($ip,$port)
{
    if(!@fsockopen($ip,$port,$err,$err_str,0.1))
    {
        return false;
    }
    else
    {
        return true;
    }
}

?>
<header>
    <div class="g_Line_left"></div>
    <div class="g_Line_right"></div>
    <section>
    <article>
      <div class="server_time">Server time: &nbsp;
        <span id="timecontainer"></span>
        <script type="text/javascript">
          new showLocalTime("timecontainer", "server-php", 0, "short")
        </script>
      </div>
      <ul class="flagWrap" onMouseOver="show_status()" onMouseOut="hide_status()">
        <li class="first">Tr&#7841;ng th&#225;i M&#225;y Ch&#7911;</li>
        <li class="status">
        <?php
          if(CheckGS("127.0.0.1",55901))
          {
              $gs = '<font color="#00ff00"><b>&#272;ang Ho&#7841;t &#272;&#7897;ng</b></font>';
            echo $gs;
          }
          else
          {
              $gs = '<font color="#e4151d"><b>&#272;ang B&#7843;o Tr&#236;</b></font>';
            echo $gs;
          }
        ?>
        </li>
        <!--<li class="first">Language</li>-->
        <?php
          /*if($core['language_switch'] == '1')
          {
              foreach ($languages as $language_id =>  $language_data)
              {
                  echo '<li><img  src="template/'.$core['config']['template'].'/images/flags/'.$language_data[2].'">  <a href="'.ROOT_INDEX.'?change_language='.$language_id.'">'.$language_data[0].'</a></li>';
              }
          } */
        ?>
      </ul>
    </article>

    <?php

    $acc1 = mssql_query("SELECT count(memb___id) from MEMB_INFO");
    $acc = mssql_fetch_row($acc1);
    $char1 = mssql_query("SELECT count(Name) from Character");
    $char = mssql_fetch_row($char1);
    $guild1 = mssql_query("SELECT count(G_Name) from Guild");
    $guild = mssql_fetch_row($guild1);
    $on1 = mssql_query("SELECT count(memb___id) from MEMB_STAT where ConnectStat = '1'");
    $on = mssql_fetch_row($on1);

    ?>

    <div class="server_status">
      <table width="100%">
        <tr>
          <td>Connect Server</td>
          <td align="right">
          <?php
            if(CheckGS("127.0.0.1",44405))
            {
                echo '<font color="#00ff00"><b>&#272;ang Ho&#7841;t &#272;&#7897;ng</b></font>';
            }
            else
            {
                echo '<font color="#e4151d"><b>&#272;ang B&#7843;o Tr&#236;</b></font>';
            }
          ?>
          </td>
        </tr>
        <tr>
          <td>Game Server</td>
          <td align="right">
          <?php
            echo $gs;
          ?>
          </td>
        </tr><!--
        <tr>
          <td>Siege Server</td>
          <td align="right">
          <?php /**
            if(CheckGS("127.0.0.1",56914))
            {
                echo '<font color="#00ff00"><b>&#272;ang Ho&#7841;t &#272;&#7897;ng</b></font>';
            }
            else
            {
                echo '<font color="#e4151d"><b>&#272;ang B&#7843;o Tr&#236;</b></font>';
            } */
          ?>
          </td>
        </tr>-->
        <tr>
          <td colspan="2"><img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_top.gif" width="200px"></td>
        </tr>
        <tr>
          <td>S&#7889; T&#224;i Kho&#7843;n</td>
          <td align="right"><?=$acc[0];?></td>
        </tr>
        <tr>
          <td>S&#7889; Nh&#226;n V&#7853;t</td>
          <td align="right"><?=$char[0];?></td>
        </tr>
        <tr>
          <td>S&#7889; Guild</td>
          <td align="right"><?=$guild[0];?></td>
        </tr>
        <tr>
          <td>&#272;ang Online</td>
          <td align="right"><?=$on[0];?></td>
        </tr>
      </table>
    </div>
  </section>
</header>
<div id="siteVisualWrap">
    <div id="siteVisualConts">
        <div class="G_ContsWrap">
            <div class="visualSpace"></div>
            <nav id="GameNavi">
        <ul id="GameMenuSkip">
          <li>
            <a href="index.php?page_id=news" class="depth01"><span class="onLeft"></span><span class="onCent">TRANG CH&#7910;</span><span class="onRight"></span></a>
          </li>
          <li>
            <a href="index.php?page_id=terms" class="depth01"><span class="onLeft"></span><span class="onCent">N&#7896;I QUY</span><span class="onRight"></span></a>
          </li>
          <li>
            <a href="index.php?page_id=register" class="depth01"><span class="onLeft"></span><span class="onCent">&#272;&#258;NG K&#221;</span><span class="onRight"></span></a>
          </li>
          <li>
            <a href="index.php?page_id=downloads" class="depth01"><span class="onLeft"></span><span class="onCent">T&#7842;I GAME</span><span class="onRight"></span></a>
          </li>
          <li>
            <a href="index.php?page_id=rankings" class="depth01"><span class="onLeft"></span><span class="onCent">X&#7870;P H&#7840;NG</span><span class="onRight"></span></a>
          </li>
          <li>
            <a href="https://www.facebook.com/MuOnlineDeveloper" class="depth01"><span class="onLeft"></span><span class="onCent">DI&#7876;N &#272;&#192;N</span><span class="onRight"></span></a>
          </li>
        </ul>
            </nav>
            <div id="contentStart">
        <section id="gContsBodyWrap">

        <?php /*if($_GET['page_id'] != 'guides') { ?>

          <div id="sliderWrap">

            <div style="float:left; width: 630px; height: 147px;">
              <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                  <img src="template/<?=$core['config']['template'] ?>/images/slider/slider_1.jpg"  alt="" />
                  <img src="template/<?=$core['config']['template'] ?>/images/slider/slider_2.jpg"  alt="" />
                </div>
                <script>
                $(window).load(function() {
                $('#slider').nivoSlider();
                });
                </script>
              </div>
            </div>

            <?php

            $csData = mssql_fetch_array(mssql_query("SELECT TOP 1 OWNER_GUILD FROM MuCastle_Data"));
            $gData = mssql_fetch_array(mssql_query("SELECT TOP 1 G_Mark FROM Guild WHERE G_Name = '".$csData[0]."'"));

            // Castle Siege banner config
            $cs_battle_day = 7;
              $cs_battle_time = "18:00:00";
              $cs_battle_duration = 120;

            $offset = null;

            $weekDays = array("", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
              $battleDay = $weekDays[$cs_battle_day];
              $today = date("l");
              $battleTime = $cs_battle_time;
              $battleDate = strtotime("next $battleDay $battleTime");
              $timeOffset = $battleDate - time();
              if($today == $battleDay) {
                  $currentTime = strtotime(date("H:i:s"));
                  $battleTimeToday = strtotime($battleTime);
                  $timeOffsetToday = $battleTimeToday - time();
                  if($battleTimeToday > $currentTime) {
                      $offset = $timeOffsetToday;
                  } else {
                      $timeOffsetToday = $timeOffsetToday*(-1);
                      if(($cs_battle_duration*60) > $timeOffsetToday) {
                          // CS BATTLE IN PROGRESS
                  $offset = null;
                      } else {
                          // CS BATTLE IS ON NEXT DATE
                          $offset = $timeOffset;
                      }
                  }
              } else {
                  // CS BATTLE IS ON NEXT DATE
                  $offset = $timeOffset;
              }

            $input_seconds = $offset;
            $csTime = null;

            if($input_seconds >= 1) {
              $days_module = $input_seconds % 86400;
              $days = ($input_seconds-$days_module)/86400;
              $hours_module = $days_module % 3600;
                  $hours = ($days_module-$hours_module)/3600;
                  $minutes_module = $hours_module % 60;
                  $minutes = ($hours_module-$minutes_module)/60;
                  $seconds = $minutes_module;
                  $csTime = array($days,$hours,$minutes,$seconds);
              }

            ?>

            <div style="float:left; margin-top: 15px; margin-right: 15px; margin-left: 15px; width: 285px; height: 133px;">
              <div style="float:left; text-align:left; width: 60px;">
                          <div style="background: #1d1c1a;width:60px;">
                  <img src="get.php?aL=<?=urlencode(bin2hex($gData[0]))?>" width="60" height="60" alt="sign" style="vertical-align:middle;">
                </div>
                      </div>
              <div style="float:left; margin-left: 10px; text-align:left; width: 100px;">
                <div class="siege_info" style="margin-top: 0px;">Castle Owner</div>
                <div class="siege_guild" style="margin-top: 15px;">
                  <span><a href="index.php?page_id=guild_members&gname=<?=$csData[0]?>"><?=$csData[0]?></a></span>
                </div>
              </div>
              <div style="text-align:left; margin-top: 66px;">
                            <div class="siege_info">Castle Siege Battle Starts In</div>
                            <div class="siege_guild" style="margin-top: 10px;"> <?=$csTime[0]?><span>d</span>  <?=$csTime[1]?><span>h</span> <?=$csTime[2]?><span>m</span> <?=$csTime[3]?><span>s</span></div>
                        </div>
            </div>

          </div>

          <?php } */?>

          <ul class="location">
            <li>
              <?php echo $core['config']['websitetitle']?>&nbsp;<span>&gt;</span></b>
              <?php
                $load_pages = file('engine/cms_data/pag_d.cms');
                foreach ($load_pages as $pages_loaded)
                {
                  $pages_loaded = explode("¶",$pages_loaded);
                  if($pages_loaded[3] == $page_check_id)
                  {
                    $p_loaded_array = preg_split( "/\ /", $pages_loaded[5]);
                    $p_l = '1';
                    break;
                  }
                }
                if($p_l == '1')
                {
                  $load_mods = file('engine/cms_data/mods.cms');
                  foreach ($load_mods as $mods_loaded)
                  {
                    $mods_loaded = explode("¶",$mods_loaded);
                    if(in_array($mods_loaded[0],$p_loaded_array))
                    {
                      $_c_id_m[] = $mods_loaded[0];
                    }
                    else
                    {
                      $_c_id_m[] = 'NULL';
                    }
                  }
                  $co=0;
                  foreach ($p_loaded_array as $give)
                  {
                    #echo $give;
                    if(in_array($give,$_c_id_m))
                    {
                      foreach ($load_mods as $give_me_out)
                      {
                        $give_me_out = explode("¶",$give_me_out);
                        if($give_me_out[0] == $give)
                        {
                          if($give_me_out[4] == '1')
                          {
                            if($_GET[LOAD_GET_PAGE] == USER_CMS_PAGE && isset($_GET[USER_GET_PAGE]))
                            {
                              $construct_title = $secondary_l;
                            }
                            else
                            {
                              $construct_title = $give_me_out[3];
                            }
                            echo ''.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'';
                          }
                        }
                      }
                    }
                  }
                }
              ?>
            </li>
          </ul>
          <section class="gContsViewWrap">

             <?php
          if(CMS_NAVBAR == '1'){
              if(isset($_GET[LOAD_GET_PAGE])){
                      $l_load = file("engine/cms_data/pag_d.cms");
                      foreach ($l_load as $l_name){
                          $l_name = explode("¶",$l_name);
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
                          $l2_name = explode("¶",$l2_name);
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
                                            $usercp_module_title =  str_replace($menu_links_title,$menu_links_translated,$secondary_l);
$title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
                                        }else{ $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';}
                                    }


          }

if($page_check_id != ANNOUNCEMENTS_CMS_PAGE){
    require('engine/announcement_config.php');
if($core['ANNOUNCEMENT']['ACTIVE'] == '1'){
    $ann_file = array_reverse(file('engine/variables_mods/announcements.tDB'));
    $count_ann = '0';
    foreach ($ann_file as $ann){
        $ann = explode("¶",$ann);
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
                      <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.png" width="16" height="16"></td>
                      <td align="left" style="padding-top: 2px; padding-bottom: 2px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
                      <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
                      </tr>
                      <tr>
                      <td colspan="0"  align="left" style="background-image:url(template/'.$core['config']['template'].'/ssimages/inner_line.jpg); height: 0px;"></td>
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
    $pages_loaded = explode("¶",$pages_loaded);

    if($pages_loaded[3] == $page_check_id){
        $p_loaded_array = preg_split( "/\ /", $pages_loaded[5]);
        $p_l = '1';
        break;
    }
}
if($p_l == '1'){
$load_mods = file('engine/cms_data/mods.cms');
foreach ($load_mods as $mods_loaded){
    $mods_loaded = explode("¶",$mods_loaded);
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
            $give_me_out = explode("¶",$give_me_out);
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
?>
          </section>
          <section class="gContsInfoWrap">
            <div class="gContsInfoBg">

              <?php

                if($_GET['page_id'] == 'guides')
                {
                  if(isset($_GET['guide']))
                  {
                    include('inc/guides_menu.php');
                  }
                }
                else
                {

                  if($user_login == '1')
                  {
                    echo '
                    <h2 class="title" id="h1Title">Control Panel</h2>
                    <img src="template/'.$core['config']['template'].'/images/sub_nav_bg_top.gif">
                    <div class="menuSubWrap">
                      <menu>

                    <ul>';

                    $m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','¶');
                    $count_m_uss = 0;
                    foreach ($m_uss_row_ as $tr)
                    {
                      //explode("¶",$tr);
                      $count_m_uss++;
                      if($tr[6] == '1')
                      {
                        if($tr[3] != ACCOUNTSETTINGS_CMS_USER)
                        {
                          if($tr[7] != '1')
                          {
                            echo '<li><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
                          }
                        }
                      }
                    }
                    echo '
                        </ul>
                      </menu>
                      <div style="width:260px; height:37px; padding-left:20px; padding-top: 6px;">
                        <button class="small_button" style="float:left;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">&#272;&#7893;i M&#7853;t Kh&#7849;u</a>
                        <button class="small_button" style="float:right;"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">Tho&#225;t </a>
                      </div>
                    </div>
                    <div class="space20"></div>

                    ';
                  }
                  else
                  {
                    echo '
                      <h2 class="title" id="h1Title">&#272;&#259;ng Nh&#7853;p</h2>
                      <div class="box_bottom"></div>
                      <form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
                            <div align="left" style="width: 280px; margin-top: 10px; margin-bottom: 10px;">
                              <div style="margin-top: 20px;"></div>
                              <div style="float:left; width: 100px; font-size: 12px; line-height: 20px;">T&#234;n T&#224;i Kho&#7843;n:</div>
                              <div style="float:left; width: 180px;"><input type="text" value="" name="uss_id" class="field" style="width: 177px;" maxlength="10"></div>
                              <div style="clear:both;"></div>
                              <div style="margin-top: 10px;"></div>
                              <div style="float:left; width: 100px; font-size: 12px; line-height: 20px;">M&#7853;t Kh&#7849;u:</div>
                              <div style="float:left; width: 180px;"><input type="password" value="" name="uss_password" class="field" style="width: 177px;" maxlength="12"></div>
                              <input type="hidden" name="process_login">
                              <div style="clear:both;"></div>
                        </div>
                            <div style="clear:both;"></div>
                            <div align="right" style="margin-top: 12px; width: 284px;">
                              <div style="float:left;"><a href="index.php?page_id=lost_password">&raquo; Qu&#234;n M&#7853;t Kh&#7849;u</a></div>
                              <div style="float:right;">
                                <input type="submit" class="small_button" value="&#272;&#259;ng Nh&#7853;p">
                              </div>
                          <div style="float:left;"><a href="index.php?page_id=register">&raquo; &#272;&#259;ng K&#253;</a></div>
                              <div style="clear:both;"></div>
                            </div>
                      </form>
                    ';
                  }
                ?>


                <h2 class="title" id="h1Title">Menu</h2>
                <img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_top.gif">
                <div class="menuSubWrap">
                  <menu>
                    <?php
                      $m_row_ = get_sort('engine/cms_data/pag_d.cms','¶');
                      #  echo $test[1][2][3];
                      foreach ($m_row_ as $li){
                        #  explode("¶",$li);
                        switch ($li[7]){
                          case '0':
                            if($li[8] == '1'){
                              if($li[6] != '0'){

                                echo '<li>';

                                echo '<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'" style="text-decoration: none">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
                              }
                            }
                            break;
                          case '1':
                            switch ($li[11]){
                              case '1': $target = "_blank"; break;
                              case '0': $target = "_self"; break;
                            }

                            echo '<li>';

                            echo '<a  href="'.$li[10].'"  target="'.$target.'" style="text-decoration: none">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';

                          break;
                        }
                      }
                    ?>
                  </menu>
                </div>
                <div class="space20"></div>
                <article class="gSubInfoBox">
                  <h2>Rankings<a href="index.php?page_id=rankings" class="more">&raquo; More</a></h2>
                  <article class="mainRankBox" id="MainRankingtap1" style="display: block;">
                    <h3>
                      <div onclick="ranking.tab('castle');return false;" style="cursor: pointer;"><strong>Characters</strong></div>
                      <div style="cursor: pointer;" onclick="ranking.tab('crywolf');return false;"><span>Guilds</span></div>
                    </h3>
                    <ul id="Ranktab1">
                      <?php
                      $query = mssql_query("SELECT TOP 5 Name,cLevel,RESETS,Grand_Resets from Character where CtlCode < '8' order by Grand_Resets desc, RESETS desc, cLevel desc");
                      for($i=0;$i < mssql_num_rows($query);++$i)
                      {
                        $row = mssql_fetch_row($query);
                        $rank = $i+1;
                        echo'
                        <li>
                          <div style="float:left; padding-right:20px;"> '.$rank.' </div>
                          <div style="float:left"><strong>
                             '.$row[0].'
                          </strong></div>
                         <div style="float:right">'.$row[1].' [<b><font color="orange"> '.$row[2].' </font></b>] [<b><font color="gold"> '.$row[3].' </font></b>]</div>
                        </li>';
                      } ?>
                    </ul>
                  </article>
                  <article class="mainRankBox" id="MainRankingtap2" style="display:none;">
                    <h3>
                      <div style="cursor: pointer;" onclick="ranking.tab('castle');return false;"><span>Characters</span></div>
                      <div style="cursor: pointer;" onclick="ranking.tab('crywolf');return false;"><strong>Guilds</strong></div>
                    </h3>
                    <ul id="Ranktab1">
                      <?php
                      $query = mssql_query("SELECT TOP 5 G_Name,G_Master,G_Score,G_Mark from Guild where G_Name != 'ADMINS' order by G_Score desc");
                      for($i=0;$i < mssql_num_rows($query);++$i)
                      {
                        $row = mssql_fetch_row($query);
                        $rank = $i+1;
                        echo'
                        <li>
                          <div style="float:left; padding-right:20px;"> '.$rank.' </div>
                          <div style="float:left"><strong>
                             '.$row[0].'
                          </strong></div>
                         <div style="float:right">[<b><font color="orange"> '.$row[1].' </font></b>] [<b><font color="gold"> '.$row[2].' </font></b>] <img src="get.php?aL='.urlencode(bin2hex($row[3])).'" width="20" height="20" alt="sign" style="vertical-align:middle;"></div>
                        </li>';
                      } ?>
                    </ul>
                  </article>
                </article>
                <div class="space20"></div>



                <h2 class="title" id="h1Title">Events Schedule</h2>
                <img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_top.gif">
                <div class="menuSubWrap">
                  <div style="width:280px; padding: 10px 10px 10px 10px;">
                    <dl id="events">
                      <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/time.js"></script>
                      <script type="text/javascript">MuEvents.init('00:00:00');</script>
                    </dl>
                  </div>
                </div>
                <img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_bottom.gif">
                <div class="space20"></div>

                <h2 class="title" id="h1Title">Facebook</h2>
                <img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_top.gif">
                <div class="menuSubWrap">
                  <div style="width:280px; padding: 10px 10px 10px 10px;">
                    <div class="fb-page" data-href="https://www.facebook.com/MuOnlineDeveloper" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                      <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/MuOnlineDeveloper"><a href="https://www.facebook.com/MuOnlineDeveloper">MuOnline</a></blockquote>
                      </div>
                    </div>
                    <div id="fb-root"></div>
                    <script>
                      (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=238975489621813";
                        fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));
                    </script>
                  </div>
                </div>
                <img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_bottom.gif">
                <div class="space20"></div>

                <?php } ?>
              </div>
            </section>
          </section>
            </div>
            <article class="gLogo"><a href="index.php"><img src="template/<?=$core['config']['template'] ?>/images/space.gif" width="260" height="70" alt="MU Online"></a></article>
            <article id="gStarter"><a href="index.php?page_id=downloads" title="DOWNLOAD" onFocus="this.blur();"></a></article>
            <!--<article id="gGST_Wrap">
                <div class="gGST_BoxOn" id="gstYourTime">
                    <span>Verzia</span><span>eX702</span>
                </div>
                <div class="gGST_BoxOff">
                    <span>Online Hr·Ëi</span><span>137</span>
                </div>
            </article>-->
        </div>
    </div>
</div>

<footer>
    <article class="f_copyright">
        <!--<div><img src="template/<?=$core['config']['template'] ?>/images/f_logo.gif" alt="Webzen"></div>-->
        <small>
      Copyright &copy; <?=date('Y');?> MuOnline. All Rights Reserved.<br>
      MU Online is a registered trademark of Webzen, Inc.<br>
      Template & modules by <a href="http://forum.ragezone.com/members/1333359135.html" target="_blank">jacubb</a>, Edit by <a href="http://forum.ragezone.com/members/2000128811.html" target="_blank">Trong</a>.
        </small>
    </article>
</footer>
</body>
</html>

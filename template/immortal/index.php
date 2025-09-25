<?php
include ( "engine/connect_core.php" ) ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<link rel="shortcut icon" href="template/<?=$core['config']['template'] ?>/images/icon.ico" /> 
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/cursor.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/default.css" type="text/css" />
        <link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/cms.css" type="text/css" />
        <link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/main.css" type="text/css" />
        <!--<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/news.css" type="text/css" />-->        
        
        <!-- Load scripts -->
        <script src="template/<?=$core['config']['template'] ?>/js/html5shiv.js"></script>
        <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.min.js"></script>
        <script type="text/javascript">
        window.Config = window.Config || {};
        Config.URL = Config.URL || '<?= addslashes($core['config']['website_url']); ?>/';
        Config.Slider = Config.Slider || {id: 'slider'};
        </script>
        <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/router.js"></script>
        <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/require.js"></script>
        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<body oncontextmenu="return false">
<style type="text/css">
<!--
/*
MUCore Css Start
*/
.tmp_right_content { width: 100%; background-color:#FFFFFF; }
.tmp_m_content { margin:4px; padding:2px; margin-bottom: 10px;}
.tmp_m_content .tmp_right_title {background:url('template/<?=$core['config']['template'] ?>/images/menu.png')  repeat-y; height:37px; width:538px; font:normal 20px/30px Verdana; color:#655645; padding-left:30px; }
.tmp_m_content .tmp_page_content { font:normal 12px/24px Arial, Helvetica, sans-serif; color:#375264; margin:5px; }


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
    <body>
        <!--[if lte IE 8]>
            <style type="text/css">
                body {
                    background-image:url(images/bg.jpg);
                    background-position:top center;
                }
            </style>
        <![endif]-->
        <section id="wrapper">
        

            <header id="hand"></header>
            <header><a href="#" id="hand2" target="_blank"></a></header>
            <header><a href="#" id="hand3" target="_blank"></a></header>
            <header><a href="#" id="hand4" target="_blank"></a></header>
            <header id="hand5"></header>
            <header><a href="index.php?page_id=register" id="hand6"></a></header>
            <header id="hand7"></header>
            <ul id="top_menu">
                                    <li><a href="index.php" direct="0"><?=link_home;?></a></li>
                                    <li><a href="index.php?page_id=register" direct="0"><?=link_new_account;?></a></li>
                                    <li><a href="index.php?page_id=rankings" direct="1">Rankings</a></li>
                                    <li><a href="#" direct="1" target="_blank">Forum</a></li>
                                    <li><a href="index.php?page_id=market" direct="1">Market</a></li>
                                    <? if($user_login == '1'){
                                        echo '<li><a>Hi!,  ';
                                        echo $user_auth_id;
                                        echo '</a></li>';
                                    } else {
                                        echo '<li><a href="index.php?page_id=login" direct="0">Login</a></li>';
                                    }
                                    ?>
                                    
                                    
                            </ul>
            <div id="main">
                <aside id="left">
                    <article>
                            <h1 class="top"></h1>
                            <section class="body">
                                <?
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
                    echo '<li class="list"><spa style="color: Red; text-shadow: 0 0 5px #FF0000;">&raquo;</spa> <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
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
             <table width="190" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 2px;  " width="130"><input type="text" name="uss_id" maxlength="10" class="login_field" value="USER ID" OnClick="this.value=\'\'"></td>
    <td rowspan="2"><input type="submit" name"login_submit" onclick="uss_login_form.submit();" value="Log in!"></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 2px;"><input type="password" name="uss_password" class="login_field" value="PASSWORD" maxlength="12" size="16" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
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
          ?>
                            </section>
                        </article>
<article>
                        <h1 class="top"><?=text_menu;?></h1>
                        <ul id="left_menu">
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
                                                    </ul>
                    </article>
                                        
                                            <article>
                            <h1 class="top">Top 10 Resets</h1>
                            <section class="body">
                            <div align="center"><table width="190" align="center">
                          <tr>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">#</span></div></td>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Nombre</span></div></td>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Nivel</span></div></td>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Resets</span></div></td>
                        </tr>

                          <tr>
                            <?
$Chars=$core_db->Execute("select TOP 10 Name,cLevel,Resets from Character Where ctlcode !='32' and ctlcode !='8' order by Resets desc, cLevel desc");
while(!$Chars->EOF){
?>
                            <td><div align="center" class="Estilo36">
                               <span style="color:#DDBE49;"><?=++$count1;?></span>
                            </div></td>
                            <td><div align="center" class="Estilo36">
                                <?=$Chars->fields[0];?>
                            </div></td>
                            <td><div align="center" class="Estilo36">
                                <?=$Chars->fields[1];?>
                            </div></td>
                            <td><div align="center" class="Estilo36">
                                <?=$Chars->fields[2];?>
                            </div></td>
                          </tr>
                          <?
$Chars->MoveNext();
}
?>
                        </table></div>
                            
                            </section>
                        </article>
                                            <article>
                            <h1 class="top">Top 5 Guilds</h1>
                            <section class="body">
                                <div align="center"><table width="190" align="center">
                              <tr>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">#</span></div></td>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Clan</span></div></td>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Puntos</span></div></td>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Logo</span></div></td>
                </tr>
<?
$Guild=$core_db->Execute("select TOP 5 G_Name,G_Score,G_Mark from Guild order by G_Score desc");
$count=0;
while(!$Guild->EOF){
?>
  <td><div align="center"  style="color:#DDBE49;"><?=++$count?></div></td>
      <td><div align="center" class="Estilo36">
          <?=$Guild->fields[0];?>
      </div></td>
    <td><div align="center" class="Estilo36">
          <?=$Guild->fields[1];?>
      </div></td>
    <td align="center"><img src="get.php?aL=<?=urlencode(bin2hex($Guild->fields[2]))?>" alt="" width="18" height="18" style="border: 1px solid #2a2a2a; background-color:#000000;" align="absmiddle"></td>
  </tr>
  <?
$Guild->MoveNext();
}
?>
                            </table></div>
                            </section>
                        </article>

                        <?
$SiegeInfo = $core_db->Execute("SELECT OWNER_GUILD,MONEY,TAX_RATE_CHAOS,TAX_RATE_STORE,TAX_HUNT_ZONE,SIEGE_START_DATE,SIEGE_END_DATE FROM MuCastle_DATA");
$GuildInfo = $core_db->Execute("SELECT G_Master,G_Mark,G_Score,G_Name FROM Guild WHERE G_Name = ?", array($SiegeInfo->fields[0])); 
$MasterInfo = $core_db->Execute("SELECT Resets,cLevel,".$TablaNivelMaster." FROM Character WHERE Name = ?", array($GuildInfo->fields[0])); 
$PaisMasterInfo = $core_db2->Execute("SELECT country FROM MEMB_INFO WHERE memb___id = ?", array($GuildInfo->fields[0])); 
$PaisG1 = $PaisMasterInfo->fields[0];
$AsistenteGuildInfo = $core_db->Execute("SELECT Name FROM GuildMember WHERE G_Name = ? AND G_Status = 64", array($SiegeInfo->fields[0]));
?>
                        <article>
                            <h1 class="top">Castle Siege</h1>
                            <section class="body">
                                <div align="center"><table cellspacing="1" class="stadisticas_tab_bg" width="200" height="100" style="background-color:#000000;"> 
 <tr>
  <td colspan="2" height="15" style="background-color: #000000; color: #9C752E; font-family: Verdana, Geneva, sans-serif; font-size: 10px;"><center><b>GANADORES DEL CASTLE SIEGE</b></center></td></tr>
    <tr>
      <td style="background-image:url(template/<?=$core['config']['template'] ?>/images/statscs.jpg);">
                                    <table style="border:0px;" width="180" height="70" align="center" class="stadisticas_td_bg_izq">
                                       <tr>
                                          <td align="center"><b>Clan:</b><br /><span style="color:#FF0000; font-size:20px; font-weight:bold;"><?=$SiegeInfo->fields[0]?></span></center></td>
                                          <td align="center" rowspan="2"><img src="get.php?aL=<?=urlencode(bin2hex($GuildInfo->fields[1]));?>.png" alt="" width="50" height="50" align="absmiddle" style="border:1px solid #2a2a2a;background-color:#272725;"/></td>
                                       </tr>
                                       <tr>
                                          <td align="center"><b>Lider:</b> <span style="color:#FF6600; font-size:11px; font-weight:bold;"><?=$GuildInfo->fields[0]?></span></td>
                                       </tr>
                                    </table>                                  
  </td>
 </tr>
</table></div>
                            </section>
                        </article>
                                    </aside>

                <aside id="right">
                    <section id="slider_bg" >
                            <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.nivo.slider.pack.js"></script>
<link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/slider.css" />

<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>    
<div align="center" id='slider_block'>
                                            <div id="slider-wrapper">
                                                <div id="slider" class="nivoSlider">
                                                            <a href="index.html"><img src="template/<?=$core['config']['template'] ?>/images/slides/1.jpg" title=""/></a>
                                                            <a href="index.html"><img src="template/<?=$core['config']['template'] ?>/images/slides/2.jpg" title=""/></a>
                                                            <a href="index.html"><img src="template/<?=$core['config']['template'] ?>/images/slides/3.jpg" title=""/></a>
                                                            <a href="index.html"><img src="template/<?=$core['config']['template'] ?>/images/slides/4.jpg" title=""/></a>
                                                            <a href="index.html"><img src="template/<?=$core['config']['template'] ?>/images/slides/5.jpg" title=""/></a>
                                                        </div>
                        </div>
                    </section>

                    <div id="content_ajax">
    <article>
    
        <section class="body">
                        
            <div align="center"><?
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
                  <td align="left"><img src="template/'.$core['config']['template'].'/images/arrow.png" border="0"></td>
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
?></div>
            
            <div class="clear"></div>
            
        

            <div class="comments" id='comments_21'></div>
        </section>
    </article>


<div id="news_pagination">&nbsp;&nbsp;&nbsp;</div></div>
                </aside>

                <div class="clear"></div>
                <div align="right" style="width: 990px;" class="language_select">
  <?
  if($core['language_switch'] == '1'){
      foreach ($languages as $language_id => $language_data){
          echo '&nbsp;<img src="template/'.$core['config']['template'].'/images/flags/'.$language_data[2].'"> <a href="'.ROOT_INDEX.'?change_language='.$language_id.'">'.$language_data[0].'</a>';
      }
  }
  ?></div>
  </div>
            <footer>
                <a href="http://raxezdev.com/fusioncms" id="logo" target="_blank"></a><a href="<?php echo FB; ?>" id="logo2" target="_blank"></a>
            </footer>
        </section>
    </body>
<link href='http://fonts.googleapis.com/css?family=Federant' rel='stylesheet' type='text/css'>

<div align="center">Copyright &copy; <?=date('Y')?>.<br>All rights reserved.</div>
</html>
<?php 
header('Content-Type: text/html; charset=utf-8');
/* echo "<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"table_panel\">
<tr>
 <td align=\"center\" class=\"panel_title\" colspan=\"2\">MUCore Engine Version</td>
</tr>
<tr>
<td align=\"left\" class=\"panel_title_sub\" colspan=\"2\">Current version</td>
</tr>
<tr>
<td align=\"left\" class=\"panel_text_alt1\" width=\"45%\" valign=\"top\">Your MUCore Current Version.
</td>
<td align=\"left\" class=\"panel_text";
echo "_alt2\" width=\"45%\" valign=\"top\">
";
echo "</td>
</tr>


<td align=\"left\" class=\"panel_title_sub\" colspan=\"2\">Version Status</td>
</tr>
<tr>
<td align=\"left\" class=\"panel_text_alt1\" width=\"45%\" valign=\"top\">MUCore version status.
</td>
<td align=\"left\" class=\"panel_text_alt2\" width=\"45%\" valign=\"top\">
";
echo "</td>
</tr>

<tr>
<td align=\"left\" class=\"panel_title_sub\" colspan=\"2\">Latest version available</td>
</tr>
<tr>
<td align=\"left\" class=\"panel_t";
echo "ext_alt1\" width=\"45%\" valign=\"top\">Latest stable version of MUCore available
.
</td>
<td align=\"left\" class=\"panel_text_alt2\" width=\"45%\" valign=\"top\"><b>";
echo "</td>
</tr>
</table>

*/
echo "
<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"table_panel\" style=\"margin-top: 20px;\">
<tr>
 <td align=\"center\" class=\"panel_title\" colspan=\"2\">About MuCore 1.08 - English</td>
</tr>

<tr>
<td align=\"left\" class=\"panel_title_sub\" ";
echo "colspan=\"2\">Important Information</td>
</tr>
<tr>
<td align=\"left\" class=\"panel_text_alt1\" width=\"45%\" valign=\"top\">This is a project that was originally released only for the Hispanic community, however we decided to release this on its original version aswell.<br><br> This script has been modified by <b>MaryJo</b>.<br/> Completed by <b> <font color=\"#4a7a14\">Dao Van Trong</font> - <font color=\"#CC0000\"><blink>Trong.CF</blink></font></b></td>
<td align=\"left\" class=\"panel_text_alt2\" width=\"45%\" valign=\"top\">";
echo "</td>
</tr>

<tr>
<td align=\"left\" class=\"panel_title_sub\" colspan=\"2\">Suggestions and Support</td>
</tr>
<tr>
<td align=\"left\" class=\"panel_text_alt1\" width=\"45%\" valign=\"top\">Official Support Forum for this release.
</td>
<td align=\"left\" class=\"panel_text_alt2\" ";
echo "width=\"45%\" valign=\"top\">";
echo "</td>
</tr>
</table>

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"table_panel\" style=\"margin-top: 20px;\">
<tr>
 <td align=\"center\" class=\"panel_title\" colspan=\"2\">Network News</td>
</tr>
<tr>
<td align=\"left\" class=\"pan";
echo "el_text_alt1 panel_text_logo\" valign=\"top\">";
$last_date = strtotime("Fri, 15 Oct 2015 10:15:10 GMT");
$new_time = "604800";
require ("script/lastrss.php");
$rss = new lastRSS();
$rss->cache_dir = "script/temp";
$rss->cache_time = 1200;
$rss->cp = "UTF-8";
$rss->date_format = "l";
$rssurl = "http://forum.ragezone.com/external.php?type=RSS&forumids=197";
$count_rss = 0;
if ($rs = $rss->get($rssurl)) {
    foreach ($rs["items"] as $item) {
        ++$count_rss;
        if (time() - strtotime($item["pubDate"]) < $new_time) {
            echo "<div align=\"left\" class=\"rss_feed\"><b><a href=\"" . $item["link"] . "\" target=\"_blank\">" . $item["title"] . "</a></b> " . $new_item . " <img src=\"styles/default/new.gif\"></div>";
        } else {
            echo "<div align=\"left\" class=\"rss_feed\"><a href=\"" . $item["link"] . "\" target=\"_blank\">" . $item["title"] . "</a></div>";
        }
    }
} else {
    echo "Error: It's not possible to get rss url.";
}
echo "
</td>
</tr>
</table>"; ?>
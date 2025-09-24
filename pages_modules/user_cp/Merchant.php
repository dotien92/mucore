<html>
<head>
<style type="text/css">
.vaults {
    table-layout : fixed;
    background-color : #212121;
    border : 1px solid #100f0d;
    margin : 0px;
    padding : 0px;
}

.normal_text{
    font-family : Verdana, Arial, Helvetica, sans-serif;
    font-size : 11px;
    color : #cccccc;
}

.full_title{
    font-family : Verdana, Arial, Helvetica, sans-serif;
    color : #B9955B;
    font-size : 12px;
    font-weight: bold;
}

.waretitle {
    font-family : Verdana, Arial, Helvetica, sans-serif;
    font-size : 11px;
    background:	#000000;
    font-style: oblique;
    font-weight: bold;
}

.sell {
    text-align : center;
    position : absolute;
    margin-left : 100px;
    margin-top : 70px;
    width : 300px;
    display : none;
    border : 1px solid #100f0d;
    background-color : #212121;
    color : #fff;
}

.stitle {
    text-align : center;
    background-color : #3B170B;
    color : #000;
    font-weight : bold;
    font-size : 11px;
}

.field {
    border : 0px solid #000000;
    border-top: 1px solid #999999;
    border-bottom: 1px solid #CCCCCC;
    border-right: 1px solid #CCCCCC;
    border-left: 1px solid #999999;
    background-color : #FFFFFF;
    font-family : Verdana, Arial, Helvetica, sans-serif;
    font-size : 11px;
    color : #000000;
    padding-left : 0;
    padding-right : 0;
    padding-top : 0;
    padding-bottom : 0;
}

.m {
    background-repeat: no-repeat;
    width:100%;
    height : 100%;
    border : 0px;
    margin : 0px;
    padding : 0px;
}
</style>
</head>
</html>
<?
include "./MarketSystem/sys/func_market.inc.php";
$sql_online_check = mssql_query("SELECT * FROM MEMB_STAT WHERE ConnectStat=0 AND memb___id='$user_auth_id'");
$online_check = mssql_num_rows($sql_online_check);




$market['mucoins']=1;
$market['pcpoints']=1;
?>
<div align="center" id="sub_page_content">
<?php if (safe_input($_POST["sell_start"], "")) {
    $s_item_sn = safe_input($_POST["serial"], "");
    $s_item_price = safe_input($_POST["price"], "");
    $s_item_price_type = safe_input($_POST["price_type"], "");

    if ($online_check <= 0) {
        echo msg("0", "You are logged in game.");
        $denegar = 1;
    }

    if (strlen($s_item_sn) != 8 or $s_item_sn == "00000000") {
        echo msg("0", "You can't sell this item.");
        $denegar = 1;
    }

    if (
        !eregi(
            "^[0-9\.]{1,15}$",
            $s_item_price or is_numeric($s_item_price) == false
        )
    ) {
        echo msg("0", "Wrong price.");
        $denegar = 1;
    }
    switch ($s_item_price_type) {
        case "zen":
            break;
        case "credits":
            if ($market["mucoins"] == 0) {
                echo msg("0", "Price is missing.");
                $denegar = 1;
            }
            break;
        case "pcpoints":
            if ($market["pcpoints"] == 0) {
                echo msg("0", "Price is missing.");
                $denegar = 1;
            }
            break;
        default:
            echo msg("0", "Wrong price.");
            $denegar = 1;
            break;
    }

    $sqll = mssql_query("declare @items varbinary(7680);
    set @items = (select [items] from [warehouse] where AccountID='$user_auth_id');
    print @items;");
    $sqll = mssql_get_last_message();

    $sqll = substr($sqll, 2);

    $i = -1;
    while ($i < 119) {
        $i++;
        $item = ItemInfo(substr($sqll, 20 * $i, 20));
        if ($item["sn"] == $s_item_sn) {
            $item_code = substr($sqll, 20 * $i, 20);
            $i = 150;
            $item_sn = $item["sn"];
        }
    }

    unset($i);

    if ($sell_item_content) {
        $item_code = null;
    }

    if ($item_code) {
        $newitem = "0x" . $item_code;
        $query =
            "
        declare @it varbinary(7680),
        @it1 varbinary(10),
        @it2 varbinary(10),
        @it3 int;
        set @it 	= (select [items] from [warehouse] where [accountid]='$user_auth_id');
        set @it1 	= " .
            $newitem .
            ";
        set @it3	= 0;
        while (@it3<121) BEGIN
        set @it2 = substring(@it,10*@it3+1,10);
        if (@it1 = @it2) BEGIN
        select @it3 as 'marked';
        set @it3 = 120;
        END
        set @it3 = @it3+1;
        END
        ";
        $res = mssql_fetch_array(mssql_query($query));
        mssql_query("declare @items varbinary(7680);
        set @items = (select [items] from [warehouse] where [AccountId]='$user_auth_id');
        print @items;");
        $ci = mssql_get_last_message();
        if ($denegar != 1) {
            mssql_query(
                "update [warehouse] set [items]=" .
                    substr_replace(
                        $ci,
                        "FFFFFFFFFFFFFFFFFFFF",
                        $res[0] * 20 + 2,
                        20
                    ) .
                    " where [AccountId]='$user_auth_id' and [items]=" .
                    $ci .
                    ""
            );

            mssql_query(
                "INSERT INTO [MuCore_Market] ([cat_id],[item_id],[sticklevel],[item],[price],[price_type],[seller],[start_date],[is_sold]) VALUES('" .
                    $item["type"] .
                    "','" .
                    $item["id"] .
                    "','" .
                    $item["sticklevel"] .
                    "','$item_code','$s_item_price','$s_item_price_type','$user_auth_id','" .
                    time() .
                    "','0')"
            );
            echo msg("1", "Item has been listed on the market.");
        }
    }

    echo "<div align='center' class='normal_text'>" .
        $sell_item_content .
        "</div>";
} ?>
<div align='center' class='normal_text'>
<table width="530" align="center" border="0" cellspacing="3" cellpadding="0">
<!--<table width="530" align="center" border="0" cellspacing="0" cellpadding="0">
<tr><td align="left" class="full_title"><em>Market Panel</em></td></tr>
<tr><td>Selecciona los item que deseas publicar</td></tr></table>-->
<tr><td rowspan=2 align="center">
<div style='width:194px;'><script type="text/javascript" SRC="MarketSystem/plugins/tooltip.js"></script>
<table border="0" cellpadding="0" cellspacing="0" class="vaults" width="192">
<tr><th colspan="8" scope="col" bgcolor="#190B07"><font color="#B9955B">Vault</th></tr>
<tr>
<?php
$il = 20;
$wh_content = "";
//mssql_query("Use MuOnline;");
mssql_query("
declare @items varbinary(7680);
set @items = (select [items] from [warehouse] where [AccountId]='$user_auth_id');
print @items;
");
$current_items = mssql_get_last_message();
$user_items = substr($current_items, 2);
$check = "011111111";
$xx = 0;
$yy = 1;
$line = 1;
$onn = 0;
$i = -1;
while ($i < 119) {
    $i++;
    if ($xx == 8) {
        $xx = 1;
        $yy++;
    } else {
        $xx++;
    }

    $TT = substr($check, $xx, 1);
    if (round($i / 8) == $i / 8 && $i != 0) {
        $wh_content .= "</tr><tr>";
        $line++;
    }

    $l = $i;
    $item = ItemInfo(substr($user_items, $il * $i, $il));

    if ($nor == true) {
        $refundABLE = false;
        $cursor = "default";
        $_rnote = "";
        $ondblclick = "";
    }
    if (!$item["Y"]) {
        $InsPosY = 1;
    } else {
        $InsPosY = $item["Y"];
    }

    if (!$item["X"]) {
        $InsPosX = 1;
    } else {
        $InsPosX = $item["X"];
        $xxx = $xx;
        $InsPosXX = $InsPosX;
        $InsPosYY = $InsPosY;
        while ($InsPosXX > 0) {
            $check = substr_replace($check, $InsPosYY, $xxx, 1);
            $InsPosXX = $InsPosXX - 1;
            $InsPosYY = $InsPosY + 1;
            $xxx++;
        }
    }

    $item["name"] = addslashes($item["name"]);
    if ($TT > 1) {
        $check = substr_replace($check, $TT - 1, $xx, 1);
    } else {
        unset($plusche, $rqs, $luck, $skill, $option, $exl);
        if ($item["name"]) {
            if ($item["level"]) {
                $plusche = "+" . $item["level"];
            }
            $rqs = "";
            if ($item["str"]) {
                $rqs .= $item["str"] . " Strength required<br>";
            }

            if ($item["nrg"]) {
                $rqs .= $item["nrg"] . " Energy required<br>";
            }

            if ($item["cmd"]) {
                $rqs .= $item["cmd"] . " Command required<br>";
            }

            if ($item["agi"]) {
                $rqs .= $item["agi"] . " Agility required<br>";
            }
            if (
                !@$item["luck"] &&
                !@$item["exl"] &&
                !@$item["skill"] &&
                !@$item["option"]
            ) {
                $addx = "<br>";
            }

            if (@$item["opt"]) {
                $option = "<font color=#9aadd5>" . $item["opt"] . "</font><br>";
            }

            if (@$item["luck"]) {
                $luck = "<font color=#9aadd5>" . $item["luck"] . "</font>";
            }
            if (@$item["skill"]) {
                $skill =
                    "<br><font color=#9aadd5>" . $item["skill"] . "<br></font>";
            }

            if (@$item["exl"]) {
                $exl =
                    "<font color=#4d668d>" .
                    str_replace("^^", "<br>", $item["exl"]) .
                    "</font>";
            }

            if ($item["level"]) {
                $item["level"] = " +" . $item["level"];
            } else {
                $item["level"] = null;
            }

            if ($market["mucoins"] = 1) {
                $credits_option_value =
                    "<option value='credits'>Credits</option>";
            } else {
                $credits_option_value = "";
            }
            if ($market["pcpoints"] = 1) {
                $pcpoints_option_value =
                    "<option value='pcpoints'>WCoinP</option>";
            } else {
                $pcpoints_option_value = "";
            }
            $wh_content .=
                "
            <td colspan='" .
                $InsPosX .
                "' rowspan='" .
                $InsPosY .
                "' style='width:" .
                24 * $InsPosX .
                "px;height:" .
                (24 * $InsPosY - $InsPosY - 1) .
                "px;border:0px;margin:0px;padding:0px;' >
            <script>function fireMyPopup$i() {document.getElementById(\"mypopup$i\").style.display = \"block\";}</script>
            <div class='sell' id='mypopup$i' name='mypopup$i' >
            <div class='stitle' " .
                $item["anc"] .
                "><font color='" .
                $item["color"] .
                "'>" .
                $item["name"] .
                $item["level"] .
                "</font>
            </div>
            <center><img src=" .
                $item["thumb"] .
                "><br>
            <font color=lightblue>
            <font color=white><br>Durability: " .
                $item["dur"] .
                "</font><br>
            <font color=#FF99CC>" .
                $item["jog"] .
                "</font>
            <font color=#FFCC00>" .
                $item["harm"] .
                "</font>
            <br>$option $luck $skill $exl<br>
            <font color=#4d668d>" .
                $item["socket"] .
                "</font>
            <br>" .
                $item["sn"] .
                "</center>
            <br><form method='post' action='' name='sell$i'>
            <input type='hidden' name='sell_start' value='1'>
            <input type='hidden' name='serial' value=" .
                $item["sn"] .
                ">
            Price: 	<input class='field' name='price' type='text' value='0' size='11' maxlength='10'>
            <select name='price_type' class='field'>
            <option value='zen'>Zen</option>
            $pcpoints_option_value
            $credits_option_value
            </select>
            <br><br>
            <input type='button' class='button' value='Sell' onclick=\"sell$i.submit()\").style.display=\"none\">
            <input type='button' class='button' value='Cancel' onClick='document.getElementById(\"mypopup$i\").style.display=\"none\"'></form>
            </b></font color><br></div>
            <div class='m'>
            <a href='javascript:void(0);' onclick='fireMyPopup$i()' onmouseover='Tip(\"<center><img src=" .
                $item["thumb"] .
                "><br><font color=white><br>Durability: " .
                $item["dur"] .
                "</font><br><font color=#FF99CC>" .
                $item["jog"] .
                "</font><font color=FFCC00>" .
                $item["harm"] .
                "</font><br>$luck $option $skill $exl<br><font color=#4d668d>" .
                $item["socket"] .
                "</font></center>\", TITLEFONTCOLOR,\"" .
                $item["color"] .
                "\",TITLE, \"" .
                $item["name"] .
                $item["level"] .
                "\",TITLEBGCOLOR, \"" .
                $item["anco"] .
                "\")' onmouseout='UnTip()' style='width:" .
                24 * $InsPosX .
                "px;height:" .
                (24 * $InsPosY - $InsPosY - 1) .
                "px;'><img src='" .
                $item["thumb"] .
                "' class='m'></div></td>
            ";
        } else {
            $wh_content .= "<td colspan='1' rowspan='1' style='width:24px;height:24px;border:0px;margin:0px;padding:0px;'><div style='height: 24px;width: 24px;'>
                <img src='MarketSystem/misc_images/v.gif' class='m'></div></td>";
        }
    }
}
echo $wh_content;
$zeny = mssql_query(
    "Select money from warehouse where AccountID='$user_auth_id'"
);
$zeny = mssql_fetch_row($zeny);
$coin = mssql_query(
    "Select WCoinP from T_InGameShop_Point where AccountID='$user_auth_id'"
);
$coin = mssql_fetch_row($coin);
?>
</tr>
<tr><th colspan="8" scope="col" bgcolor="#190B07">Zen:  <?echo number_format($zeny[0])?></th></tr>
</table>
</div>
</td>
<td align="center">
<div style='width:194px;'><script type="text/javascript" SRC="MarketSystem/plugins/tooltip.js"></script>
<table border="0" cellpadding="0" cellspacing="0" class="vaults" width="192">
<tr><th colspan="8" scope="col" bgcolor="#190B07"><font color="#B9955B">Expanded vault</th></tr>
<tr>
<?php
$il = 20;
$wh_content = "";

$xx = 0;
$yy = 1;
$line = 1;
$onn = 0;
$i = 119;
while ($i < 239) {
    $i++;
    if ($xx == 8) {
        $xx = 1;
        $yy++;
    } else {
        $xx++;
    }

    $TT = substr($check, $xx, 1);
    if (round($i / 8) == $i / 8 && $i != 0) {
        $wh_content .= "</tr><tr>";
        $line++;
    }

    $l = $i;
    $item = ItemInfo(substr($user_items, $il * $i, $il));

    if ($nor == true) {
        $refundABLE = false;
        $cursor = "default";
        $_rnote = "";
        $ondblclick = "";
    }
    if (!$item["Y"]) {
        $InsPosY = 1;
    } else {
        $InsPosY = $item["Y"];
    }

    if (!$item["X"]) {
        $InsPosX = 1;
    } else {
        $InsPosX = $item["X"];
        $xxx = $xx;
        $InsPosXX = $InsPosX;
        $InsPosYY = $InsPosY;
        while ($InsPosXX > 0) {
            $check = substr_replace($check, $InsPosYY, $xxx, 1);
            $InsPosXX = $InsPosXX - 1;
            $InsPosYY = $InsPosY + 1;
            $xxx++;
        }
    }

    $item["name"] = addslashes($item["name"]);
    if ($TT > 1) {
        $check = substr_replace($check, $TT - 1, $xx, 1);
    } else {
        unset($plusche, $rqs, $luck, $skill, $option, $exl);
        if ($item["name"]) {
            if ($item["level"]) {
                $plusche = "+" . $item["level"];
            }
            $rqs = "";
            if ($item["str"]) {
                $rqs .= $item["str"] . " Strength required<br>";
            }

            if ($item["nrg"]) {
                $rqs .= $item["nrg"] . " Energy required<br>";
            }

            if ($item["cmd"]) {
                $rqs .= $item["cmd"] . " Command required<br>";
            }

            if ($item["agi"]) {
                $rqs .= $item["agi"] . " Agility required<br>";
            }
            if (
                !@$item["luck"] &&
                !@$item["exl"] &&
                !@$item["skill"] &&
                !@$item["option"]
            ) {
                $addx = "<br>";
            }

            if (@$item["opt"]) {
                $option = "<font color=#9aadd5>" . $item["opt"] . "</font><br>";
            }

            if (@$item["luck"]) {
                $luck = "<font color=#9aadd5>" . $item["luck"] . "</font>";
            }
            if (@$item["skill"]) {
                $skill =
                    "<br><font color=#9aadd5>" . $item["skill"] . "<br></font>";
            }

            if (@$item["exl"]) {
                $exl =
                    "<font color=#4d668d>" .
                    str_replace("^^", "<br>", $item["exl"]) .
                    "</font>";
            }

            if ($item["level"]) {
                $item["level"] = " +" . $item["level"];
            } else {
                $item["level"] = null;
            }

            if ($market["mucoins"] = 1) {
                $credits_option_value =
                    "<option value='credits'>Mu Coins</option>";
            } else {
                $credits_option_value = "";
            }
            if ($market["pcpoints"] = 1) {
                $pcpoints_option_value =
                    "<option value='pcpoints'>PC Points</option>";
            } else {
                $pcpoints_option_value = "";
            }
            $wh_content .=
                "
            <td colspan='" .
                $InsPosX .
                "' rowspan='" .
                $InsPosY .
                "' style='width:" .
                24 * $InsPosX .
                "px;height:" .
                (24 * $InsPosY - $InsPosY - 1) .
                "px;border:0px;margin:0px;padding:0px;' >
            <script>function fireMyPopup$i() {document.getElementById(\"mypopup$i\").style.display = \"block\";}</script>
            <div class='sell' id='mypopup$i' name='mypopup$i' >
            <div class='stitle' " .
                $item["anc"] .
                "><font color='" .
                $item["color"] .
                "'>" .
                $item["name"] .
                $item["level"] .
                "</font>
            </div>
            <center><img src=" .
                $item["thumb"] .
                "><br>
            <font color=lightblue>
            <font color=white><br>Durability: " .
                $item["dur"] .
                "</font><br>
            <font color=#FF99CC>" .
                $item["jog"] .
                "</font>
            <font color=#FFCC00>" .
                $item["harm"] .
                "</font>
            <br>$luck $option $skill $exl<br>
            <font color=#4d668d>" .
                $item["socket"] .
                "</font>
            <br>" .
                $item["sn"] .
                "</center>
            <br><form method='post' action='' name='sell$i'>
            <input type='hidden' name='sell_start' value='1'>
            <input type='hidden' name='serial' value=" .
                $item["sn"] .
                ">
            Price: 	<input class='field' name='price' type='text' value='0' size='11' maxlength='10'>
            <select name='price_type' class='field'>
            <option value='zen'>Zen</option>
            $pcpoints_option_value
            $credits_option_value
            </select>
            <br><br>
            <input type='button' class='button' value='Sell' onclick=\"sell$i.submit()\").style.display=\"none\">
            <input type='button' class='button' value='Cancel' onClick='document.getElementById(\"mypopup$i\").style.display=\"none\"'></form>
            </b></font color><br></div>
            <div class='m'>
            <a href='javascript:void(0);' onclick='fireMyPopup$i()' onmouseover='Tip(\"<center><img src=" .
                $item["thumb"] .
                "><br><font color=white><br>Durability: " .
                $item["dur"] .
                "</font><br><font color=#FF99CC>" .
                $item["jog"] .
                "</font><font color=FFCC00>" .
                $item["harm"] .
                "</font><br>$luck $option $skill $exl<br><font color=#4d668d>" .
                $item["socket"] .
                "</font></center>\", TITLEFONTCOLOR,\"" .
                $item["color"] .
                "\",TITLE, \"" .
                $item["name"] .
                $item["level"] .
                "\",TITLEBGCOLOR, \"" .
                $item["anco"] .
                "\")' onmouseout='UnTip()' style='width:" .
                24 * $InsPosX .
                "px;height:" .
                (24 * $InsPosY - $InsPosY - 1) .
                "px;'><img src='" .
                $item["thumb"] .
                "' class='m'></div></td>
            ";
        } else {
            $wh_content .= "<td colspan='1' rowspan='1' style='width:24px;height:24px;border:0px;margin:0px;padding:0px;'><div style='height: 24px;width: 24px;'>
                <img src='MarketSystem/misc_images/v.gif' class='m'></div></td>";
        }
    }
}
echo $wh_content;
?>
</tr>
<tr><th colspan="8" scope="col" bgcolor="#190B07">WCoinP:  <?echo number_format($coin[0])?></th></tr>
</table>
</div>
</td>
</tr>
</table>
</div>
</div>
<br><br>
<font color="yellow"><b>Warning: You can't sell items from the expanded vault.</b></font>

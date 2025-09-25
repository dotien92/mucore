<html>
<head>
<style type="text/css">
.normal_text{
font-family : Verdana, Arial, Helvetica, sans-serif; 
font-size : 11px; 
color : #cccccc;
}

.language_field {
border : 0px solid #000000;
border-top: 1px solid #000000;	
border-left: 1px solid #000000;		
background-color : #FFFFFF;
font-family : Verdana, Arial, Helvetica, sans-serif;
font-size : 11px;
color : #000000;
padding-left : 0;
padding-right : 0;
padding-top : 0;
padding-bottom : 0;
}

.rankings-table{

}

.full_title{
font-family : Verdana, Arial, Helvetica, sans-serif;
color : #B9955B;
font-size : 12px;
font-weight: bold;
}
.market-table{
width:100%;
border-collapse:separate;
border-spacing:0;
margin-top:10px;
background:#111111;
border:1px solid #2c2c2c;
border-radius:6px;
overflow:hidden;
}
.market-table thead td{
background:#1f1b16;
padding:10px 8px;
text-transform:uppercase;
font-size:10px;
letter-spacing:0.5px;
color:#d4b98a;
}
.market-table td{
padding:12px 10px;
border-bottom:1px solid #1f1f1f;
}
.market-row:nth-child(even){
background:#151515;
}
.market-row:hover{
background:#1d1d1d;
}
.market-item{display:flex;gap:12px;align-items:center;}
.market-item-thumb {
    width:56px;
    height:56px;
    border:1px solid #3a3a3a;
    background:#0d0d0d;
    border-radius:6px;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:4px;
    position: relative; /* Quan trọng để badge định vị trong khung này */
}
.market-item-level-badge {
    position: absolute;
    top: -6px;
    right: -6px;
    background: #2a2014;
    color: #fce0b0;
    font-size: 10px;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 8px;
    line-height: 1;
}
.market-item-badge {
    position: absolute;
    top: -6px;
    left: -6px;      /* góc trái thay vì góc phải */
    background: #cf6b2f;
    color: #fff;
    font-size: 10px;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 8px;
    line-height: 1;
}
.market-item-thumb img {
    width: 56px;        /* cố định chiều ngang */
    height: 56px;       /* cố định chiều cao */
    object-fit: contain; /* giữ đúng tỉ lệ, không bị méo */
    display: block;
}
.market-item-body{display:flex;flex-direction:column;gap:4px;}
.market-item-name{display:flex;align-items:center;gap:8px;font-weight:bold;color:#f5c37c;font-size:12px;}
.market-item-level{padding:2px 8px;border-radius:999px;background:#2a2014;color:#fce0b0;font-size:10px;letter-spacing:0.4px;text-transform:uppercase;}
.market-item-meta{font-size:11px;color:#9aa0b4;}
.market-badge{font-size:10px;padding:2px 8px;border-radius:999px;background:#3e3122;color:#fff;text-transform:uppercase;letter-spacing:0.6px;}
.market-badge-new{background:#cf6b2f;}
.market-price{display:inline-flex;flex-direction:column;align-items:center;gap:2px;color:#f4d8ac;font-size:11px;}
.market-price strong{font-size:13px;color:#ffe6ba;}
.market-price-label{font-size:10px;color:#ac9772;text-transform:uppercase;letter-spacing:0.4px;}
.market-price.dash{color:#4d4d4d;font-style:italic;}
</style>
</head>
</html>
<?
include "/MarketSystem/sys/func_market.inc.php";

$sql_online_check = mssql_query("SELECT ConnectStat FROM MEMB_STAT WHERE memb___id='$user_auth_id'");
$online_check = mssql_fetch_array($sql_online_check);

if($online_check[0] != 0){ 
echo	msg('0','You are logged in game.');
$denegar = 1;
}

switch(safe_input($_GET['op2'],'')){
case 'Buy':
$buy_item_id=safe_input($_GET['op3'],'');

if(!eregi("^[0-9\.]{1,5}$", $buy_item_id)){
echo	msg('0',"Destroyed item.");
$denegar = 1;
}
$MarketItem = mssql_query("SELECT * FROM [MuCore_Market] where id = '$buy_item_id'");
$MarketItem = mssql_fetch_array($MarketItem);

if($MarketItem['is_sold'] == 1 OR $MarketItem['seller'] == null){
echo	msg('0',"Item was bought or doesn't exist.");
$denegar = 1;
}

$ItemInfo 	= ItemInfo($MarketItem['item']);
$query		= mssql_query("declare @it varbinary(7680); 
set @it=(select [Items] from [warehouse] where [AccountID]='$user_auth_id'); 
print @it");
$mycuritems	= mssql_get_last_message();
$newitem	= $MarketItem['item'];
$test		= 0;
$slot 		= smartsearch($mycuritems,$ItemInfo['X'],$ItemInfo['Y']);
$test		= $slot*20;

$MarketItemSeller=$MarketItem['seller'];
$MarketItemPrice = $MarketItem['price'];
$MarketItemPriceType= $MarketItem['price_type'];

if($MarketItemSeller == $user_auth_id){
$return_item=1;
}
if(!$return_item){
if($MarketItemPriceType == 'zen' && $denegar != 1){
//mssql_query("Use Me_MuOnline;");
$bank_zen = mssql_query("select purse from MEMB_INFO WHERE memb___id='$user_auth_id'");
$bank_zen = mssql_fetch_row($bank_zen);
//mssql_query("Use MuOnline;");
if($bank_zen[0] < $MarketItemPrice){
echo	msg('0',"You don't have enough money.");
$denegar = 1;
}
$new_bank_zen=$bank_zen[0] - $MarketItemPrice;
//mssql_query("Use Me_MuOnline;");
$bank_zen_s = mssql_query("select purse from MEMB_INFO WHERE memb___id='$MarketItemSeller'");
$bank_zen_s = mssql_fetch_row($bank_zen_s);
//mssql_query("Use MuOnline;");

$new_bank_zen_s=$bank_zen_s[0] + $MarketItemPrice;

$new_amount_of_money = "UPDATE MEMB_INFO set purse = '$new_bank_zen' where memb___id = '$user_auth_id'";
$new_amount_of_money_s = "UPDATE MEMB_INFO set purse = '$new_bank_zen_s' where memb___id = '$MarketItemSeller'";

}
if($MarketItemPriceType == 'credits' && $denegar != 1){
$credits = mssql_query("select credits from MEMB_CREDITS WHERE memb___id='$user_auth_id'");
$credits = mssql_fetch_row($credits);
if($credits[0] < $MarketItemPrice){
echo	msg('0',"You don't have enough credits.");
$denegar = 1;
}

$credits_s = mssql_query("select credits from MEMB_CREDITS WHERE memb___id='$MarketItemSeller'");
$credits_s = mssql_fetch_row($credits_s);

$new_credits=$credits[0] - $MarketItemPrice;

$new_credits_s=$credits_s[0] + $MarketItemPrice;

$new_amount_of_money = "UPDATE MEMB_CREDITS SET credits = '$new_credits' where memb___id = '$user_auth_id'";
$new_amount_of_money_s = "UPDATE MEMB_CREDITS SET credits = '$new_credits_s' where memb___id = '$MarketItemSeller'";
}
if($MarketItemPriceType == 'pcpoints' && $denegar != 1){
$bank_pcpoints= mssql_query("select WCoinP from T_InGameShop_Point WHERE AccountID='$user_auth_id'");
$bank_pcpoints = mssql_fetch_row($bank_pcpoints);
if($bank_pcpoints[0] < $MarketItemPrice){
echo	msg('0',"You don't have enough W Coins.");
$denegar = 1;
}

$bank_pcpoints_s = mssql_query("select WCoinP from T_InGameShop_Point WHERE AccountID='$MarketItemSeller'");
$bank_pcpoints_s = mssql_fetch_row($bank_pcpoints_s);

$new_bank_pcpoints=$bank_pcpoints[0] - $MarketItemPrice;
$new_bank_pcpoints_s=$bank_pcpoints_s[0] + $MarketItemPrice;

$new_amount_of_money = "UPDATE T_InGameShop_Point SET WCoinP = '$new_bank_pcpoints' where AccountID = '$user_auth_id'";
$new_amount_of_money_s = "UPDATE T_InGameShop_Point SET WCoinP = '$new_bank_pcpoints_s' where AccountID = '$MarketItemSeller'";
}
}

if ($slot==1337){
echo	msg('0',"You don't have enough space in vault.");
$denegar = 1;
}
if(!$buy_item_content && $denegar != 1){

$mynewitems = substr_replace($mycuritems, $newitem, ($test+2), 20);
$do_add_item=mssql_query("update [warehouse] set [Items]=".$mynewitems." where [AccountId]='$user_auth_id'");
if(!$return_item){
if($MarketItemPriceType == 'zen'){
//mssql_query("Use Me_MuOnline;");
}
$set_new_amount_of_money = mssql_query($new_amount_of_money);
$set_new_amount_of_money_s = mssql_query($new_amount_of_money_s);
//mssql_query("Use MuOnline;");
$do_add_item=mssql_query("update [MuCore_Market] set [sold_date] = '".time()."',[purchased_by] = '$user_auth_id',[is_sold] = '1' where [id]='$buy_item_id'");
echo	msg('1',"Item was successfully bought and placed to vault");

}
else{
echo	msg('1',"Item was returned to vault");

$do_add_item=mssql_query("delete [MuCore_Market] where [id]='$buy_item_id'");
}
}
echo "<div align='center' class='normal_text'>".$buy_item_content."</div>";
break;
default:


$sql = mssql_query("SELECT count(*) from MuCore_Market where is_sold = '0'");
$items_in_market=mssql_result($sql, 0, 0);

$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '0'");	 
$cat_0_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '1'");	 
$cat_1_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '2'");	 
$cat_2_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '3'");	 
$cat_3_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '4'");	 
$cat_4_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '5'");	 
$cat_5_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '6'");	 
$cat_6_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '7'");	 
$cat_7_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '8'");	 
$cat_8_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '9'");	 
$cat_9_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '10'");	 
$cat_10_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '11'");	 
$cat_11_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '12'");	 
$cat_12_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '13'");	 
$cat_13_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '14'");	 
$cat_14_c= mssql_result($sql, 0, 0);
$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '15'");	 
$cat_15_c= mssql_result($sql, 0, 0);
?>
<div align="center" id="sub_page_content">
<script type="text/javascript" SRC="MarketSystem/plugins/tooltip.js"></script>
<div align='center' class='normal_text'>
<table width=100% align="center" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<table width="540" align="center" border="0" cellspacing="0" cellpadding="0">
<tr>
<?
if(safe_input($_GET['op2'],'') == 'List'){
if(safe_input($_GET['op3'],'') OR safe_input($_GET['op3'],'') == 0){
$list_item_type=safe_input($_GET['op3'],'');

if(is_numeric($list_item_type)){
$cont = 1;
}

if($cont == 1){

$sql = mssql_query("SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '$list_item_type'");
$items_in_market=mssql_result($sql, 0, 0);
print "<td align=\"left\" class=\"full_title\"><em>In offer are $items_in_market items</em></td>";
}
}
}
else{
$show_items='*';
print "<td align=\"left\" class=\"full_title\"><em>In offer are: $items_in_market items</em></td>";
}

?>

</tr>
</table>
<?php
$sql = mssql_query("SELECT * FROM [MuCore_Shop_Items]");
for ($i = 0; $i < mssql_num_rows($sql); ++$i) {
    $array = mssql_fetch_array($sql);
    $item_name = $array["name"];
    $item_id = $array["id"];
    $item_type = $array["type"];
    $stick_level = $array["stickLevel"];
    $item_type_ = $item_type + 1;

    $get_count = mssql_query(
        "SELECT count(*) FROM [MuCore_Market] where is_sold = '0' and cat_id = '$item_type' and item_id = '$item_id' and sticklevel = '$stick_level'"
    );
    $item_count = mssql_result($get_count, 0, 0);

    if ($item_count > 0) {
        $ii[$item_type]++;
        if ($stick_level > 0) {
            $TypeContent[$item_type] .=
                "document.getElementById('select_id').options[" .
                $ii[$item_type] .
                "] = new Option( '$item_name($item_count)', '$item_type-$item_id-$stick_level');
";
        } else {
            $TypeContent[$item_type] .=
                "document.getElementById('select_id').options[" .
                $ii[$item_type] .
                "] = new Option( '$item_name($item_count)', '$item_type&op4=$item_id');
";
            //$TypeContent[$item_type] .= "<option value=\"$item_type-$item_id\">$item_name($item_count)</option>";
        }
    }
}
unset($i);
?>
<script>
function getItemList(item_type){
if(item_type == 0){
<?php print $TypeContent[0]; ?>
}
else if(item_type == 1){
<?php print $TypeContent[1]; ?>
}
else if(item_type == 2){
<?php print $TypeContent[2]; ?>
}
else if(item_type == 3){
<?php print $TypeContent[3]; ?>
}
else if(item_type == 4){
<?php print $TypeContent[4]; ?>
}
else if(item_type == 5){
<?php print $TypeContent[5]; ?>
}
else if(item_type == 6){
<?php print $TypeContent[6]; ?>
}
else if(item_type == 7){
<?php print $TypeContent[7]; ?>
}
else if(item_type == 8){
<?php print $TypeContent[8]; ?>
}
else if(item_type == 9){
<?php print $TypeContent[9]; ?>
}
else if(item_type == 10){
<?php print $TypeContent[10]; ?>
}
else if(item_type == 11){
<?php print $TypeContent[11]; ?>
}
else if(item_type == 12){
<?php print $TypeContent[12]; ?>
}
else if(item_type == 13){
<?php print $TypeContent[13]; ?>
}
else if(item_type == 14){
<?php print $TypeContent[14]; ?>
}
else if(item_type == 15){
<?php print $TypeContent[15]; ?>
}
else{
//item_list_html_content='<option value="-">---</option>';
sub_page("index.php?page_id=market");
}
document.getElementById("select_id").style.display = "block";
//document.getElementById('select_id').innerHTML=item_list_html_content;
}
function getItemList2(value){
if(value == 'all'){
location = "index.php?page_id=market";
}
else{
location = "index.php?page_id=market&op2=List&op3="+value;
}
}
</script>
<form action="" method="post">
<table>
<tr>
<td><font color="#AF7D55">Filter </font></td>
<td><select id="select_type" class="iRg_input" name="select_type" onchange="getItemList2(this.form.select_type.value)" >
<option value="all">All</option>
<option value="0" <?php echo "0" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Swords (<? print $cat_0_c;?>)</option>
<option value="1" <?php echo "1" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Axes (<? print $cat_1_c;?>)</option>
<option value="2" <?php echo "2" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Maces (<? print $cat_2_c;?>)</option>
<option value="3" <?php echo "3" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Spears (<? print $cat_3_c;?>)</option>
<option value="4" <?php echo "4" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Bows (<? print $cat_4_c;?>)</option>
<option value="5" <?php echo "5" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Staffs (<? print $cat_5_c;?>)</option>
<option value="6" <?php echo "6" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Shields (<? print $cat_6_c;?>)</option>
<option value="7" <?php echo "7" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Helms (<? print $cat_7_c;?>)</option>
<option value="8" <?php echo "8" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Armors (<? print $cat_8_c;?>)</option>
<option value="9" <?php echo "9" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Pants (<? print $cat_9_c;?>)</option>
<option value="10" <?php echo "10" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Gloves (<? print $cat_10_c;?>)</option>
<option value="11" <?php echo "11" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Boots (<? print $cat_11_c;?>)</option>
<option value="12" <?php echo "12" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Mix 1 (<? print $cat_12_c;?>)</option>
<option value="13" <?php echo "13" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Mix 2 (<? print $cat_13_c;?>)</option>
<option value="14" <?php echo "14" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Mix 3 (<? print $cat_14_c;?>)</option>
<option value="15" <?php echo "15" == $list_item_type
    ? 'selected="selected"'
    : ""; ?> >Scrolls (<? print $cat_15_c;?>)</option>
</select></td><td></td>
</tr>
</table></form>
<br><table width="530" align="center" border="1" cellspacing="0" cellpadding="0" class="iR_func_status market-table">
<thead><tr>
<td align="center"><b><font color="#AF7D55">#</font></b></td>
<td align="center"><b><font color="#AF7D55">Item</font></b></td>
<td align="center"><b><font color="#AF7D55">Credit</font></b></td>
<td align="center"><b><font color="#AF7D55">WCoinP</font></b></td>
<td align="center"><b><font color="#AF7D55">Zen</font></b></td>
<td align="center"><b><font color="#AF7D55">Nhân vật</font></b></td>
<td align="center"><b><font color="#AF7D55">Ngày</font></b></td>
</tr>
</thead>
<?

$list_query="SELECT * FROM [MuCore_Market] where [is_sold] = '0' order by start_date desc";
if(safe_input($_GET['op2'],'') == 'List'){
if(safe_input($_GET['op3'],'') OR safe_input($_GET['op3'],'') == 0){

$list_item_type=safe_input($_GET['op3'],'');

if(is_numeric($list_item_type)){
$cont = 1;
}

if($cont == 1){
$list_query = "SELECT * FROM [MuCore_Market] where [is_sold] = '0'  AND cat_id = '$list_item_type' order by start_date desc";
}
}
}
$m_table_class='';

$listResult = mssql_query($list_query);
if ($listResult && mssql_num_rows($listResult) > 0) {
    while ($MarketItem = mssql_fetch_array($listResult, MSSQL_ASSOC)) {

$MarketItemInfo=ItemInfo($MarketItem['item']);

$MarketItemSellerName=$MarketItem['seller'];

$get_seller_char_name = $core_db->GetRow("SELECT TOP 1 Name,mu_id FROM [Character] where AccountID = ? order by Resets desc", array($MarketItemSellerName));
$get_seller_char_name = $get_seller_char_name ? array_values($get_seller_char_name) : array('', '');

switch($MarketItem['price_type']){
case 'zen':
$credits_price='-';
$pcpoints_price='-';
$zen_price=$MarketItem['price'];
break;
case 'credits':
$zen_price='-';
$pcpoints_price='-';
$credits_price=$MarketItem['price'];
break;
case 'pcpoints':
$zen_price='-';
$credits_price='-';
$pcpoints_price=$MarketItem['price'];
break;
default:
break;
}

if($MarketItemInfo['level']){
$MarketItemInfo['level']=" +".$MarketItemInfo['level'];
}
else
{
$MarketItemInfo['level']=NULL;
}

if (@$MarketItemInfo['luck'])
$luck='<br><font color=#9aadd5>'.$MarketItemInfo['luck'].'</font>';
if (@$MarketItemInfo['skill'])
$skill='<br><font color=#9aadd5>'.$MarketItemInfo['skill'].'</font>';

if (@$MarketItemInfo['opt'])
$option='<font color=#9aadd5>'.$MarketItemInfo['opt'].'</font>';

if (@$MarketItemInfo['exl'])
$exl='<font color=#4d668d>'.str_replace('^^','<br>', $MarketItemInfo['exl']).'</font>';

$time_after_start_date=time() - $MarketItem['start_date'];

if($time_after_start_date < 86400){
$new_gif_value='<img src="template/'.$core['config']['template'].'/images/new.gif" title="Nuevo">';
}
else{
$new_gif_value='&nbsp;';
}

$pcpoints_price_=0;
$credits_price_=0;
$zen_price_=0;
if($credits_price!='-'){
$credits_price_=number_format($credits_price);
}
elseif($zen_price!='-'){
$zen_price_=number_format($zen_price);
}
elseif($pcpoints_price!='-'){
$pcpoints_price_=number_format($pcpoints_price);
}
if($credits_price_ != 0){
 $precio = $credits_price_." Credits";
}
elseif($zen_price_ !=0){
 $precio = $zen_price_." Zen";
 }
 elseif($pcpoints_price_ != 0){
 $precio = $pcpoints_price_." WCoinP";
 }
$itemName = htmlspecialchars($MarketItemInfo['name']);
$sellerName = $get_seller_char_name[0] ? htmlspecialchars($get_seller_char_name[0]) : 'Unknown';
$priceSummary = ($credits_price!='-') ? number_format($credits_price).' Credits' : (($zen_price!='-') ? number_format($zen_price).' Zen' : (($pcpoints_price!='-') ? number_format($pcpoints_price).' WCoinP' : '0'));
$confirmMessage = sprintf('Bạn có chắc muốn mua %s từ %s với giá %s?', $itemName, $sellerName, $priceSummary);
$confirmJson = json_encode($confirmMessage);
$buyUrl = json_encode('index.php?page_id=market&op2=Buy&op3='.$MarketItem['id']);
$categoryText = isset($MarketItemInfo['category']) ? ItemCatName($MarketItemInfo['category']) : ItemCatName($MarketItem['cat_id']);
$categoryText = htmlspecialchars($categoryText);


$itemLevelBadge = isset($MarketItemInfo['level']) && $MarketItemInfo['level'] !== '' ? trim($MarketItemInfo['level']) : '+0';

if ($MarketItemInfo['category'] == 14) {
    $itemMetaLine = 'Số lượng: ';
} else {
    $itemMetaLine = 'Độ bền: ';
}
$itemMetaLine .= intval($MarketItemInfo['dur']);
$isNewBadge = ($time_after_start_date < 86400) 
    ? '<span class="market-item-badge">Mới</span>' 
    : '';
$levelBadgeHtml = '<span class="market-item-level-badge">'.$itemLevelBadge.'</span>';

if ($MarketItemInfo['category'] == 14) {
    $levelBadgeHtml = '<span class="market-item-level-badge">+'.intval($MarketItemInfo['dur']).'</span>';
} else {
    $levelBadgeHtml = '<span class="market-item-level-badge">'.$itemLevelBadge.'</span>';
}


$creditsDisplay = ($credits_price=='-') ? '<span class="market-price dash">-</span>' : '<span class="market-price"><strong>'.number_format($credits_price).'</strong><span class="market-price-label">Credits</span></span>';
$pcpointsDisplay = ($pcpoints_price=='-') ? '<span class="market-price dash">-</span>' : '<span class="market-price"><strong>'.number_format($pcpoints_price).'</strong><span class="market-price-label">WCoinP</span></span>';
$zenDisplay = ($zen_price=='-') ? '<span class="market-price dash">-</span>' : '<span class="market-price"><strong>'.number_format($zen_price).'</strong><span class="market-price-label">Zen</span></span>';
$tooltipContent = "<center><img src=".$MarketItemInfo['thumb']."><br><font color=white><br>Durability: ".$MarketItemInfo['dur']."</font><br><font color=#FF99CC>".$MarketItemInfo['jog']."</font><font color=FFCC00>".$MarketItemInfo['harm']."</font><br>$option $luck $skill $exl<br><font color=#4d668d>".$MarketItemInfo['socket']."</font></center>";
$tooltipEscaped = addslashes($tooltipContent);
$itemCell = '
<div class="market-item">
  <div class="market-item-thumb">
    '.$isNewBadge.'
    <img src="'.$MarketItemInfo['thumb'].'" alt="'.$itemName.'">
    '.$levelBadgeHtml.'
  </div>
  <div class="market-item-body">
    <div class="market-item-name">
      <span style="color:'.$MarketItemInfo['color'].'">'.$itemName.'</span>
    </div>
    <div class="market-item-meta">'.$itemMetaLine.'</div>
  </div>
</div>';
$dateDisplay = date("j.n.Y",$MarketItem['start_date']);
$sellerDisplay = $sellerName;
print "<script type='text/javascript'>function buyitem_".$MarketItem['id']."(){var answer = confirm(".$confirmJson.");if(answer){location = " . $buyUrl . ";}}</script>";
print "<tr class='market-row' style='cursor: pointer;'>";
print "<td align='center'>".$MarketItem['id']."</td>";
print "<td align='left' onclick='buyitem_".$MarketItem['id']."(); return false;' onmouseover='Tip(\"".$tooltipEscaped."\", TITLEFONTCOLOR,\"".$MarketItemInfo['color']."\",TITLE, \"".$MarketItemInfo['name'].$MarketItemInfo['level']."\",TITLEBGCOLOR, \"".$MarketItemInfo['anco']."\")' onmouseout='UnTip()'>".$itemCell."</td>";
print "<td align='center'>".$creditsDisplay."</td>";
print "<td align='center'>".$pcpointsDisplay."</td>";
print "<td align='center'>".$zenDisplay."</td>";
print "<td align='center'><span class='market-item-meta'>".$sellerDisplay."</span></td>";
print "<td align='center'><span class='market-item-meta'>".$dateDisplay."</span></td>";
print "</tr>";

if($m_table_class !='even'){
$m_table_class='even';
}
else{
$m_table_class='';
}
unset($luck);
unset($skill);
unset($MarketItem);
unset($MarketItemInfo);
unset($option);
unset($exl);
}
}
unset($i);
?>
</table></td></table></div></div>
<br><br>
<font color="yellow"><b>Information: <br>You can buy items only if you have enogh space in vault. You can't expanded vault.</font>

<?
break;
}
?>
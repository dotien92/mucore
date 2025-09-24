<?

$link_identifier = mssql_connect($core['db_host'], $core['db_user'], $core['db_password']);
mssql_select_db($core['db_name'], $link_identifier);

$is_online = mssql_fetch_row(mssql_query("select ConnectStat from MEMB_STAT WHERE memb___id='$user_auth_id'"));


if($is_online[0] == 1){
echo msg('0','Log out from game!');
}
else
{ 

if (isset($_POST['movezen_s'])){


$money_from = htmlspecialchars(stripslashes($_POST['money_from']),ENT_QUOTES);

$money_to = htmlspecialchars(stripslashes($_POST['money_to']),ENT_QUOTES);

$money_amount = htmlspecialchars(stripslashes($_POST['money_amount']),ENT_QUOTES);

if (!eregi("^[0-9\]{1,11}$", $money_amount))
{ 
$money_amount=0;
}


//


$select_char_names = "select GameID1,GameID2,GameID3,GameID4,GameID5 from AccountCharacter WHERE ID='$user_auth_id'";
$select_char_names = mssql_query($select_char_names);
$select_char_names = mssql_fetch_row($select_char_names);

$char_name1=$select_char_names[0];
$char_name2=$select_char_names[1];
$char_name3=$select_char_names[2];
$char_name4=$select_char_names[3];
$char_name5=$select_char_names[4];

//Selecting zen

$warehouse_zen = "select Money from warehouse WHERE AccountID='$user_auth_id'";
$warehouse_zen = mssql_query( $warehouse_zen );
$warehouse_zen = mssql_fetch_row($warehouse_zen);

//mssql_query("Use Me_MuOnline;");
$purse_zen = "select purse from MEMB_INFO WHERE memb___id='$user_auth_id'";
$purse_zen = mssql_query( $purse_zen );
$purse_zen = mssql_fetch_row($purse_zen);
//mssql_query("Use MuOnline;");

$char_name1_zen = "select Money from Character WHERE Name='$char_name1'";
$char_name1_zen = mssql_query( $char_name1_zen );
$char_name1_zen = mssql_fetch_row($char_name1_zen);

$char_name2_zen = "select Money from Character WHERE Name='$char_name2'";
$char_name2_zen = mssql_query( $char_name2_zen );
$char_name2_zen = mssql_fetch_row($char_name2_zen);

$char_name3_zen = "select Money from Character WHERE Name='$char_name3'";
$char_name3_zen = mssql_query( $char_name3_zen );
$char_name3_zen = mssql_fetch_row($char_name3_zen);

$char_name4_zen = "select Money from Character WHERE Name='$char_name4'";
$char_name4_zen = mssql_query( $char_name4_zen );
$char_name4_zen = mssql_fetch_row($char_name4_zen);

$char_name5_zen = "select Money from Character WHERE Name='$char_name5'";
$char_name5_zen = mssql_query( $char_name5_zen );
$char_name5_zen = mssql_fetch_row($char_name5_zen);

//end of selecting zen


if ($money_from=='warehouse'){$money_from_zen=$warehouse_zen[0];
}
elseif ($money_from=='purse'){$money_from_zen=$purse_zen[0];
}
elseif ($money_from=='0'){$money_from_zen=$char_name1_zen[0];
}
elseif ($money_from=='1'){$money_from_zen=$char_name2_zen[0];
}
elseif ($money_from=='2'){$money_from_zen=$char_name3_zen[0];
}
elseif ($money_from=='3'){$money_from_zen=$char_name4_zen[0];
}
elseif ($money_from=='4'){$money_from_zen=$char_name5_zen[0];
}

if ($money_to=='warehouse'){$money_to_zen=$warehouse_zen[0];
}
elseif ($money_to=='purse'){$money_to_zen=$purse_zen[0];
}
elseif ($money_to=='0'){$money_to_zen=$char_name1_zen[0];
}
elseif ($money_to=='1'){$money_to_zen=$char_name2_zen[0];
}
elseif ($money_to=='2'){$money_to_zen=$char_name3_zen[0];
}
elseif ($money_to=='3'){$money_to_zen=$char_name4_zen[0];
}
elseif ($money_to=='4'){$money_to_zen=$char_name5_zen[0];
}

//

$money_from_zen=$money_from_zen-$money_amount;

$money_to_zen=$money_to_zen+$money_amount;

if($money_from_zen <0)
{
$WarnOkContent =msg('0','Not enough zen!');
}
elseif($money_amount <= 0)
{
$WarnOkContent =msg('0','Enter amount of zen what you want to transfer!');
}
elseif($money_from == $money_to){
$WarnOkContent =msg('0','from = where!');
}
elseif($money_to=='warehouse' AND $money_to_zen > 1000000000){
$WarnOkContent =msg('0','Limit of vault is 1,000,000,000 zen!');

}
elseif($money_to=='purse' AND $money_to_zen > 10000000000){
$WarnOkContent =msg('0','Limit of web bank is 10,000,000,000 zen!');

}
elseif($money_to=='0' AND $money_to_zen > 2000000000){
$WarnOkContent =msg('0','Limit of character is 2,000,000,000 zen!');
}
elseif($money_to=='1' AND $money_to_zen > 2000000000){
$WarnOkContent =msg('0','Limit of character is 2,000,000,000 zen!');
}
elseif($money_to=='2' AND $money_to_zen > 2000000000){
$WarnOkContent =msg('0','Limit of character is 2,000,000,000 zen!');
}
elseif($money_to=='3' AND $money_to_zen > 2000000000){
$WarnOkContent =msg('0','Limit of character is 2,000,000,000 zen!');
}
elseif($money_to=='4' AND $money_to_zen > 2000000000){
$WarnOkContent =msg('0','Limit of character is 2,000,000,000 zen!');
}
else{



//
if($money_from=='warehouse') {
	mssql_query("
	UPDATE dbo.warehouse SET
	 Money = '$money_from_zen'
	 WHERE AccountID='$user_auth_id'");


}
elseif($money_from=='purse') {
//mssql_query("Use Me_MuOnline;");
	mssql_query("
	UPDATE dbo.MEMB_INFO SET
	 purse = '$money_from_zen'
	 WHERE memb___id='$user_auth_id'");
//mssql_query("Use MuOnline;");


}
elseif($money_from=='0') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_from_zen'
	 WHERE Name='$char_name1'
	 AND AccountID='$user_auth_id'");


}
elseif($money_from=='1') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_from_zen'
	 WHERE Name='$char_name2'
	 AND AccountID='$user_auth_id'");


}
elseif($money_from=='2') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_from_zen'
	 WHERE Name='$char_name3'
	 AND AccountID='$user_auth_id'");


}
elseif($money_from=='3') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_from_zen'
	 WHERE Name='$char_name4'
	 AND AccountID='$user_auth_id'");

}
elseif($money_from=='4') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_from_zen'
	 WHERE Name='$char_name5'
	 AND AccountID='$user_auth_id'");

}



if($money_to=='warehouse') {
	mssql_query("
	UPDATE dbo.warehouse SET
	 Money = '$money_to_zen'
	 WHERE AccountID='$user_auth_id'");


}
elseif($money_to=='purse') {
//mssql_query("Use Me_MuOnline;");
	mssql_query("
	UPDATE dbo.MEMB_INFO SET
	 purse = '$money_to_zen'
	 WHERE memb___id='$user_auth_id'");
//mssql_query("Use MuOnline;");


}
elseif($money_to=='0') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_to_zen'
	 WHERE Name='$char_name1'
	 AND AccountID='$user_auth_id'");


}
elseif($money_to=='1') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_to_zen'
	 WHERE Name='$char_name2'
	 AND AccountID='$user_auth_id'");


}
elseif($money_to=='2') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_to_zen'
	 WHERE Name='$char_name3'
	 AND AccountID='$user_auth_id'");


}
elseif($money_to=='3') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_to_zen'
	 WHERE Name='$char_name4'
	 AND AccountID='$user_auth_id'");

}
elseif($money_to=='4') {
	mssql_query("
	UPDATE dbo.Character SET
	 Money = '$money_to_zen'
	 WHERE Name='$char_name5'
	 AND AccountID='$user_auth_id'");

}


//

$WarnOkContent = msg('1','Transfer was successfull');



}
$ZenTransferContent .= $WarnOkContent;


}


$select_charnames = "select GameID1,GameID2,GameID3,GameID4,GameID5 from AccountCharacter WHERE Id='$user_auth_id'";
$select_charnames = mssql_query($select_charnames);
$select_charnames = mssql_fetch_row($select_charnames);

$char_name1=$select_charnames[0];
$char_name2=$select_charnames[1];
$char_name3=$select_charnames[2];
$char_name4=$select_charnames[3];
$char_name5=$select_charnames[4];

//Selecting zen

$warehouse_zen = "select Money from warehouse WHERE AccountID='$user_auth_id'";
$warehouse_zen = mssql_query( $warehouse_zen );
$warehouse_zen = mssql_fetch_row($warehouse_zen);

//mssql_query("Use Me_MuOnline;");
$purse_zen = "select purse from MEMB_INFO WHERE memb___id='$user_auth_id'";
$purse_zen = mssql_query( $purse_zen );
$purse_zen = mssql_fetch_row($purse_zen);
//mssql_query("Use MuOnline;");

$char_name1_zen = "select Money from Character WHERE Name='$char_name1'";
$char_name1_zen = mssql_query( $char_name1_zen );
$char_name1_zen = mssql_fetch_row($char_name1_zen);

$char_name2_zen = "select Money from Character WHERE Name='$char_name2'";
$char_name2_zen = mssql_query( $char_name2_zen );
$char_name2_zen = mssql_fetch_row($char_name2_zen);

$char_name3_zen = "select Money from Character WHERE Name='$char_name3'";
$char_name3_zen = mssql_query( $char_name3_zen );
$char_name3_zen = mssql_fetch_row($char_name3_zen);

$char_name4_zen = "select Money from Character WHERE Name='$char_name4'";
$char_name4_zen = mssql_query( $char_name4_zen );
$char_name4_zen = mssql_fetch_row($char_name4_zen);

$char_name5_zen = "select Money from Character WHERE Name='$char_name5'";
$char_name5_zen = mssql_query( $char_name5_zen );
$char_name5_zen = mssql_fetch_row($char_name5_zen);

//end of selecting zen
$warehouse_zen[0]=number_format($warehouse_zen[0]);
$purse_zen[0]=number_format($purse_zen[0]);

$char_name1_zen[0]=number_format($char_name1_zen[0]);
$char_name2_zen[0]=number_format($char_name2_zen[0]);
$char_name3_zen[0]=number_format($char_name3_zen[0]);
$char_name4_zen[0]=number_format($char_name4_zen[0]);
$char_name5_zen[0]=number_format($char_name5_zen[0]);

$char_zen1="$char_name1($char_name1_zen[0])";
$char_zen2="$char_name2($char_name2_zen[0])";
$char_zen3="$char_name3($char_name3_zen[0])";
$char_zen4="$char_name4($char_name4_zen[0])";
$char_zen5="$char_name5($char_name5_zen[0])";

if($char_name1){
$char_zen1="<option value=\"0\">$char_zen1</option>";
}
else{
$char_zen1='';
}
if($char_name2){
$char_zen2="<option value=\"1\">$char_zen2</option>";
}
else{
$char_zen2='';
}
if($char_name3){
$char_zen3="<option value=\"2\">$char_zen3</option>";
}
else{
$char_zen3='';
}
if($char_name4){
$char_zen4="<option value=\"3\">$char_zen4</option>";
}
else{
$char_zen4='';
}
if($char_name5){
$char_zen5="<option value=\"4\">$char_zen5</option>";
}
else{
$char_zen5='';
}


?>
<form method="post" action="">
	<br />
	<table cellspacing="0" cellpadding="0" border="0">

	<tr>
<td>
<b>From</b><br />
<select name="money_from" class="iRg_zen">
<option value="warehouse">Vault (<? echo $warehouse_zen[0]; ?>)</option>
	<option value="purse">Web bank (<? echo $purse_zen[0]; ?>)</option>
	<? echo $char_zen1;
	echo $char_zen2;
	echo $char_zen3;
	echo $char_zen4;
	echo $char_zen5;
  ?>
</select>
</td>
</tr>
<tr>
<td>
<b>Where</b><br />
<select name="money_to" class="iRg_zen">
<option value="warehouse">Vault (<? echo $warehouse_zen[0]; ?>)</option>
	<option value="purse">Web bank (<? echo $purse_zen[0]; ?>)</option>
	<? echo $char_zen1;
	echo $char_zen2;
	echo $char_zen3;
	echo $char_zen4;
	echo $char_zen5;
  ?>
</select>
</td>
</tr>
<tr>
<td>
<b>Amount</b><br />
<input type="text" class="iRg_input" size="12" maxlength="11" name="money_amount" value="0" />
<input type="submit" class="button-gray" name="movezen_s" value="Transfer" />
</td>
</tr>
</table>
</form>
<?

}

?>
<p>Note:</p>
<li>Vault limit: 1.000.000.000</li>
<li>Character limit: 2.000.000.000</li>
<li>Web bank limit: 10.000.000.000</li>

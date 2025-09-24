<?
/**
* @+===========================================================================+
* @¦ MUCore v1.0.8 Premium                                                     ¦
* @¦ Credits: Isumeru & MaryJo & Dao Van Trong - Trong.CF                      ¦
* @+===========================================================================+
*/
require("../VoteLottery_Config.php");

$num = mssql_num_rows(mssql_query("Select * from VoteBag"));
if($num <= 0) { echo notice_message_admin("The Lottery Bag its already clean."); }
else
{$query = mssql_query("Delete from VoteBag");
if(!$query)
{
echo notice_message_admin("The Lottery Bag cant be cleaned.");
}
else
{
echo notice_message_admin("The Lottery Bag is now clean!");
}
}
?>
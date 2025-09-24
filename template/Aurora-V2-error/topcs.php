<style type="text/css">

.flcn {
	background: url(template/<?=$core['config']['template']?>/images/cstop.png);
	color: #FF6600;
	font-weight: bold;
        font-size: 20px;
	-moz-border-radius: 8px 8px 8px 8px;
}
.Estilo1 {color: #33FFFF}

.flcn {
	color: #FFFFFF;
}
</style>
<table width="84%" border="0" align="center">
  <tr>
<?php
//Dont Touch Bitch ^^!!
$siege = "SELECT OWNER_GUILD, MONEY, TAX_RATE_CHAOS, TAX_RATE_STORE, TAX_HUNT_ZONE, SIEGE_START_DATE, SIEGE_END_DATE FROM MuCastle_DATA";
$checksiege = mssql_query($siege);
$row = mssql_fetch_row($checksiege);
$siege2 = "SELECT TOP 50 REG_SIEGE_GUILD FROM MuCastle_REG_SIEGE";
$checksiege2 = mssql_query($siege2);
$row1 = mssql_fetch_row($checksiege2);
?>

<td height="95" align="center" class="flcn"><?=$row[0]?></td>



</tr>
</table>
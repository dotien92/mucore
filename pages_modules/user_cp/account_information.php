<article class="rankingWrap">
<ul class="shadowz" style="width:200px;">
<li class="du">Account Information</li></ul>
<table width="100%" class="rankTable" align="center">
        <thead>
            <tr>
            <th width="20%"><b>Credits</b></th>
            <th width="20%"><b>WCoinP</b></th>
            <th width="20%"><b>WCoinC</b></th>
            <th width="20%"><b>WCoinG</b></th>
            </tr>
        </thead>       
        <tbody>
        <?php
$idw = mssql_query("Select memb_guid , memb___id from MEMB_INFO where memb___id ='".$user_auth_id."'");
$idw_c = mssql_fetch_row($idw);        
$select_cred_check= mssql_query("Select credits from MEMB_CREDITS where memb___id='".$user_auth_id."'"); 
$s_c_checks= mssql_fetch_row($select_cred_check);
$select_wcoinp_check= mssql_query("Select WCoinP from GameShop_Data where MemberGuid='".$idw_c[0]."'");
$s_wp_checks= mssql_fetch_row($select_wcoinp_check); 
$select_wcoinc_check= mssql_query("Select WCoinC from GameShop_Data where MemberGuid='".$idw_c[0]."'");
$s_wc_checks= mssql_fetch_row($select_wcoinc_check); 
$select_wcoing_check= mssql_query("Select WCoinG from GameShop_Data where MemberGuid='".$idw_c[0]."'");
$s_wg_checks= mssql_fetch_row($select_wcoing_check); 

        echo'
<tr align="center">
<td>'.$s_c_checks[0].'</td>
<td>'.$s_wp_checks[0].'</td>
<td>'.$s_wc_checks[0].'</td>
<td>'.$s_wg_checks[0].'</td>
</tr>'; ?>
</tbody></table></article>         


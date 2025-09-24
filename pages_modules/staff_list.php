<?
ob_start();
if("1" == "1"){
$load_staff_settings = simplexml_load_file('engine/config_mods/staff_manager_settings.xml');
$active = trim($load_staff_settings->active);
if($active == '0'){
    echo msg('0',text_sorry_feature_disabled);
}else{
$smf = file('engine/variables_mods/staff_members.tDB');
echo '<article class="rankingWrap">
  <ul class="shadowz" style="width:200px;">
<li class="du">Staff Members</li></ul>
<table width="100%" class="rankTable" align="center">
        <thead>
            <tr>
            <th width="4%"><b>#</b></th>
            <th width="30%"><b>Name</b></th>
            <th width="40%"><b>Posistion</b></th>
            </tr>
        </thead>       
';
        $count=0;
foreach ($smf as $staff_data){
    $staff_data = explode(":",$staff_data);
    $count++;
echo '
<tr align="center">
<td>' .$count.'</td>
<td>'.$staff_data[1].'</td>
<td>'.$staff_data[2].'</td>
</tr> ';
}
if($count=='0'){
    echo '
    <td colspan="4" align="center">'.msg('0',text_module_vote_credits_t6).'</td>';

}
echo '</table></article>';
}
}
?>
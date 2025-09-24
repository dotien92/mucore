<?
function ItemCatName($cat)
{
switch($cat){
case 0:
return 'Swords';
break;
case 1:
return 'Axes';
break;
case 2:
return 'Maces';
break;
case 3:
return 'Spears';
break;
case 4:
return 'Bows';
break;
case 5:
return 'Staffs';
break;
case 6:
return 'Shields';
break;
case 7:
return 'Helms';
break;
case 8:
return 'Armors';
break;
case 9:
return 'Pants';
break;
case 10:
return 'Gloves';
break;
case 11:
return 'Boots';
break;
case 12:
return 'Items';
break;
case 13:
return 'Jewels';
break;
case 14:
return 'Wings+Orbs';
break;
case 15:
return 'Scrolls';
break;
default:
return "Unknown Category";
break;
}
}

// function harmony($cat,$ham,$lvl)
// {
//   $zbran= array(
//   "Minimum attack power increase+",
//   "Maximum attack power increase+",
//   "Required Strength decrease+",
//   "Required Agility decrease+",
//   "Attack power increase+",
//   "Critical damage increase+0",
//   "Skill attack power increase+",
//   "Attack success rate increase (PVP)+",
//   "SD decrease rate increase+",
//   "SD ignore rate when attacking increase+"
//   );
//   $armor = array(
//   "Defense power increase+",
//   "Maximum AG increase+",
//   "Maximum HP increase+",
//   "HP automatic increase rate increase+",
//   "MP automatic increase rate increase+",
//   "Defense success rate increase (PVP)+",
//   "Damage decrease rate increase+",
//   "SD rate increase+"
//   );
  
  
//   $zbrane[1] = array('2<br>','3<br>','4<br>','5<br>','6<br>','7<br>','9<br>','11<br>','12<br>','14<br>','15<br>','16<br>','17<br>','20<br>','23<br>','26<br>');
//   $zbrane[2] = array('3<br>','4<br>','5<br>','6<br>','7<br>','8<br>','10<br>','12<br>','14<br>','17<br>','20<br>','23<br>','26<br>','29<br>','32<br>','35<br>');
//   $zbrane[3] = array('6<br>','8<br>','10<br>','12<br>','14<br>','16<br>','20<br>','23<br>','26<br>','29<br>','32<br>','35<br>','37<br>','40<br>','43<br>','46<br>');
//   $zbrane[4] = array('6<br>','8<br>','10<br>','12<br>','14<br>','16<br>','20<br>','23<br>','26<br>','29<br>','32<br>','35<br>','37<br>','40<br>','43<br>','46<br>');
//   $zbrane[5] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','7<br>','8<br>','9<br>','11<br>','12<br>','14<br>','16<br>','19<br>','22<br>','25<br>');
//   $zbrane[6] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','12<br>','14<br>','16<br>','18<br>','20<br>','22<br>','24<br>','30<br>','33<br>','36<br>');
//   $zbrane[7] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','12<br>','14<br>','16<br>','18<br>','22<br>','24<br>','26<br>');
//   $zbrane[8] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','5<br>','7<br>','9<br>','11<br>','14<br>','16<br>','18<br>');
//   $zbrane[9] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','3<br>','5<br>','7<br>','9<br>','10<br>','11<br>','12<br>');
//   $zbrane[10] =array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','10<br>','12<br>','14<br>');
                   
                   
//   $armory[1] = array('3<br>','4<br>','5<br>','6<br>','7<br>','8<br>','10<br>','12<br>','14<br>','16<br>','18<br>','20<br>','22<br>','25<br>','28<br>','31<br>');
//   $armory[2] = array('0<br>','0<br>','0<br>','4<br>','6<br>','8<br>','10<br>','12<br>','14<br>','16<br>','18<br>','20<br>','22<br>','25<br>','28<br>','31<br>');
//   $armory[3] = array('0<br>','0<br>','0<br>','7<br>','9<br>','11<br>','13<br>','15<br>','17<br>','19<br>','21<br>','23<br>','25<br>','30<br>','32<br>','34<br>');
//   $armory[4] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','1<br>','2<br>','3<br>','4<br>','5<br>','6<br>','7<br>','8<br>','9<br>','10<br>');
//   $armory[5] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','1<br>','2<br>','3<br>','4<br>','5<br>','6<br>','7<br>');
//   $armory[6] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','3<br>','4<br>','5<br>','6<br>','8<br>','10<br>','12<br>');
//   $armory[7] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','3<br>','4<br>','5<br>','6<br>','7<br>','8<br>','9<br>');
//   $armory[8] = array('0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','0<br>','5<br>','6<br>','7<br>');
                   
//    if ($cat<=5) return '<br><b>'.$zbran[$ham-1].''.$zbrane[$ham][$lvl].'</b>';
//    else return '<br><b>'.$armor[$ham-1].''.$armory[$ham][$lvl].'</b>';                



// }

// function socket($option)
// {
//   $opt = array(
//   254=> "<font color=#D0D0D0>None(No socket application)</font>",
//   0=> "Fire(Level type)(Increases Attack & Wizardry +20)",
//   1=> "Fire(Increases Attack Speed +7)",
//   2=> "Fire(Increases Maximum Attack & Wizardry +30)",
//   3=> "Fire(Increases Minimum Attack & Wizardry +20)",
//   4=> "Fire(Increases Attack & Wizardry +20)",
//   5=> "Fire(AG cost decrease +40%)",
//   10=> "Water(Block rating increase +10%)",
//   11=> "Water(Defence increase +30)",
//   12=> "Water(Shield protection increase +7%)",
//   13=> "Water(Damage reduction +4%)",
//   14=> "Water(Damage reflection +5%)",
//   16=> "Ice(HP incerase after kill monster +2885)",
//   17=> "Ice(Mana incerase after kill monster +7097)",
//   18=> "Ice(Skill attack increase +37)",
//   19=> "Ice(Attack rating increase +25)",
//   20=> "Ice(Item durability increase +30%)",
//   21=> "Wind(Automatic HP recovery increase +8)",
//   22=> "Wind(Maximum HP increase +4%)",
//   23=> "Wind(Maximum Mana increase +4%)",
//   24=> "Wind(Automatic Mana recovery increase +7)",
//   25=> "Wind(Maximum AG increase +25)",
//   26=> "Wind(AG value increase +3)",
//   29=> "Lighting(Excellent damage increase +15)",
//   30=> "Lighting(Excellent damage rate +10%)",
//   31=> "Lighting(Critical damage increase +30)",
//   32=> "Lighting(Critical damage rate +8%)",
//   36=> "Earth(Stamina increase +30)"
// ); 
  
//  return $opt[$option]; 
  

// }


function LoadItemBase(){
global $itembase_array;
$itembase_array=NULL;
$market_item_base_load=file("sys_/item_base.dsw");
$itembase_array=array();
foreach($market_item_base_load as $market_item_base_line)
{
if(!eregi("#",$market_item_base_line)){
$market_item_base = explode("|",$market_item_base_line);
$item_id=$market_item_base[1];
$item_type=$market_item_base[2];
$itembase_array[$item_type.";".$item_id]=$market_item_base;
}
}
return;
}
function LoadShopBase(){
global $shopbase_array;
$shopbase_array=NULL;
$market_shop_base_load=file("sys_/shop.dsw");
$shopbase_array=array();
foreach($market_shop_base_load as $market_shop_base_line)
{
if(!eregi("#",$market_shop_base_line)){
$market_shop_base = explode("|",$market_shop_base_line);
$item_type=$market_shop_base[1];
$item_id=$market_shop_base[2];
$shopbase_array[$item_type.";".$item_id]=$market_shop_base;
}
}
return;
}
function ItemInfo($_item) {

	if (substr($_item,0,2)=='0x') 
		$_item	= substr($_item,2);
	//if (strlen($_item)==20) 
		//$_item .= "FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";

	if ((strlen($_item)!=20) || (!ereg("(^[a-zA-Z0-9])",$_item)) || ($_item == 'FFFFFFFFFFFFFFFFFFFF'))
		return false;
	// Get the hex contents
  //$bulo = $_item;

	$level = substr($_item, 0, 1);
	$level2 = substr($_item, 1, 1);
	$level3 = substr($_item, 14, 2);
	$level1 = hexdec(substr($level, 0, 1));
	if(($level1 % 2) <> 0)
	{
	$level2 = "1" . $level2;
	$level1--; }

	if(hexdec($level3) >= 128)
	{ 	$level1 += 16;  }
	$level1 /= 2;
	$level2 = hexdec($level2);
	$itemtype = $level1;

	$iop 	= hexdec(substr($_item,2,2)); 	// Item Level/Skill/Option Data
	$itemdur= hexdec(substr($_item,4,2)); 	// Item Durability
	$serial	= substr($_item,6,8);		// Item SKey
	$ioo 	= hexdec(substr($_item,14,2)); 	// Item Excellent Info/ Option
	//$ac	= hexdec(substr($_item,16,2)); 	// Ancient data
	//$itemtype 	= hexdec(substr($_item,18,1)); 	// Item Type
	//$jog = hexdec(substr($_item,19,1)); // JoG option
	//$harm = hexdec(substr($_item,20,1)); // Harmony option
	//$harmlvl = hexdec(substr($_item,21,1)); // Harmony option level
	//$socket = substr($_item,22,10);
	//$soc1 = hexdec(substr($_item,22,2));
	//$soc2 = hexdec(substr($_item,24,2));
	//$soc3 = hexdec(substr($_item,26,2));
	//$soc4 = hexdec(substr($_item,28,2));
	//$soc5 = hexdec(substr($_item,30,2));
	// The ancient types with no set options
	
//   if ($jog == 8)
//   {
//     switch($itemtype)
//     {
//       case 7: $jogopt = "<br>SD Recovery Rate increase +20<br>Defense Success Rate increase +10 (PvP)<br>";
//               break;
//       case 8: $jogopt = "<br>SD Auto Recovery<br>Defense Success Rate increase +10 (PvP)<br>";
//               break;
//       case 9: $jogopt = "<br>Defensive Skill +200 (PvP)<br>Defense Success Rate increase +10 (PvP)<br>";
//               break;
//       case 10: $jogopt = "<br>Max HP increase +200<br>Defense Success Rate increase +10 (PvP)<br>";
//               break;
//       case 11: $jogopt = "<br>Max SD increase +700<br>Defense Success Rate increase +10 (PvP)<br>";
//               break;
//       default: $jogopt = "<br>Additional Damage +200 (PvP)<br>Attack Success Rate increase +10 (PvP)<br>";
//     } 
//   }  
    
//   if($harm!=0)
//   {
//     $harmon = harmony($itemtype,$harm,$harmlvl);    
//   }
//   else $harmon = '';
  
  
//   if($socket!= "FFFFFFFFFF")
//   {
//     $sock = "<br><font color=CC33CC>Socket item option</font><br><br>";
//     if($soc1!=255) $sock.="Socket 1: ".socket($soc1)."<br>";
//     if($soc2!=255) $sock.="Socket 2: ".socket($soc2)."<br>";
//     if($soc3!=255) $sock.="Socket 3: ".socket($soc3)."<br>";
//     if($soc4!=255) $sock.="Socket 4: ".socket($soc4)."<br>";
//     if($soc5!=255) $sock.="Socket 5: ".socket($soc5)."<br>";
    
//     $pieces1 = explode("(", socket($soc1));
//     $pieces2 = explode("(", socket($soc2));
//     $pieces3 = explode("(", socket($soc3));
//     $pieces4 = explode("(", socket($soc4));
//     $pieces5 = explode("(", socket($soc5));
    
//     //if($pieces1[0]==
  
//   } 
  
  
  
//   if ($ac==4) 
// 		$ac=5;
// 	if ($ac==9) 
// 		$ac=10;
	// Debug
/*	switch ($itemtype) {
		case 12:
			$itemtype=14;
			break;
		case 13:
			$itemtype=12;
			break;
		case 14:
			$itemtype=13;
			break;
	} */
	// Skill Check
	if ($iop<128) 
		$skill	= '';
	else {
		$skill	= 'This weapon has a special skill';
		$iop	= $iop-128;
	}
	// Item Level Check
	$itemlevel	= floor($iop/8);
	$iop		= $iop-$itemlevel*8;
	// Luck Check
	if($iop<4)
		$luck	= ''; 
	else {
		$luck	= "Luck (success rate of jewel of soul +25%)<br>Luck (critical damage rate +5%)<br>";
		$iop	= $iop-4;
	}
	// Excellent option check
	if($ioo-128>=0){$ioo=$ioo-128; }
	if($ioo>=64)	{ $iop+=4; $ioo+=-64; }
	if($ioo<32)	{ $iopx6=0; } else { $iopx6=1; $ioo+=-32; }
	if($ioo<16)	{ $iopx5=0; } else { $iopx5=1; $ioo+=-16; }
	if($ioo<8)	{ $iopx4=0; } else { $iopx4=1; $ioo+=-8; }
	if($ioo<4)	{ $iopx3=0; } else { $iopx3=1; $ioo+=-4; }
	if($ioo<2)	{ $iopx2=0; } else { $iopx2=1; $ioo+=-2; }
	if($ioo<1)	{ $iopx1=0; } else { $iopx1=1; $ioo+=-1; }
	$fquery		= mssql_query("select * from [MuCore_Shop_Items] where [i_id]=".$level2." and [i_type]=".$itemtype." and [i_stick_Level]=".$itemlevel);
	if (mssql_num_rows($fquery)<1)
	{
		$fquery	= mssql_query("select * from [MuCore_Shop_Items] where [i_id]=".$level2." and [i_type]=".$itemtype);
		$nolevel= 0;
	}
	else 
		$nolevel=1;

	$fresult	= mssql_fetch_array($fquery);	
	$iopxltype	= $fresult['i_exc_option'];
	$itemname	= $fresult['name'];
	// Case that item is not found -> stop the proccess
	if (!$fresult) 
		return false;

	$itemexl = "";
	switch ($iopxltype) {
	case 1 :
		//$op1	= 'Increase Mana per kill +8';
		//$op2	= 'Increase hit points per kill +8';
		//$op3	= 'Increase attacking(wizardly)speed+7';
		//$op4	= 'Increase wizardly damage +2%';
		//$op5	= 'Increase Damage +level/20';
		//$op6	= 'Excellent Damage Rate +10%';
		$op1	= 'Excellent Damage Rate +10%'; // done
		$op2	= 'Increase Damage +level/20'; // done
		$op3	= 'Increase damage +2%'; //done
		$op4	= 'Increase attack (magic)speed+7'; //done
		$op5	= 'Increase life gained when killing monster +life/8'; //done
		$op6	= 'Increase mane gained when killing monster +mana/8';
		$inf	= 'Additional Damage';
		break;
	case 2:
		//$op1	= 'Increase Zen After Hunt +40%';
		//$op2	= 'Defense success rate +10%';
		//$op3	= 'Reflect damage +5%';
		//$op4	= 'Damage Decrease +4%';
		//$op5	= 'Increase MaxMana +4%';
		//$op6	= 'Increase MaxHP +4%';
		$op1	= 'Increase max heath +4%';
		$op2	= 'Increase max mana +4%';
		$op3	= 'Damage Decrease +4%';
		$op4	= 'Reflect damage +4%';
		$op5	= 'Defense success rate +10%';
		$op6	= 'Increase Zen After Hunt +30%';
		$inf	= 'Additional Defense';
		$skill	= '';
		break;
	case 3: 
		$op1	= ' Increase +50 health';
		$op2	= ' InCrease +50 mana';
		$op3	= ' 3% chance to ignore enemy defense';
		$op4	= ' Increase +50 maximun stamina';
		$op5	= ' Increase attack (magic) speed +5';
		$op6	= '';
		$inf	= 'Additional Damage';
		$skill	= '';
		$nocolor= true;
    break;
	case 4: // v0.9
		$op1	= ' Ignore Enemy Defense 5%';
		$op2	= ' 5% Reflect Probabilities';
		$op3	= ' Life Recovery +5%';
		$op4	= ' Mana Recovery +5%';
		$op5	= '';
		$op6	= '';
		$inf	= 'Additional Damage';
		$skill	= '';
		$nocolor= true;
    break;
  case 5: // v0.9
		$op1	= ' +125 HP';
		$op2	= ' +125 Mana';
		$op3	= ' Ignore Enemy Defense 3%';
		$op4	= ' Increase command +85';
		$op5	= '';
		$op6	= '';
		$inf	= 'Additional Damage';
		$skill	= '';
		$nocolor= true;
    break;
     case 6: // v0.9
		$op1	= ' +125 HP';
		$op2	= ' +125 Mana';
		$op3	= ' Ignore Enemy Defense 3%';
		$op4	= '';
		$op5	= '';
		$op6	= '';
		$inf	= 'Additional Damage';
		$skill	= '';
		$nocolor= true;
    break;
}
	
  if ($iopx1==1) 		$itemexl.='^^'.$op1;
	if ($iopx2==1) 		$itemexl.='^^'.$op2;
	if ($iopx3==1) 		$itemexl.='^^'.$op3;
	if ($iopx4==1) 		$itemexl.='^^'.$op4;
	if ($iopx5==1) 		$itemexl.='^^'.$op5;
	if ($iopx6==1) 		$itemexl.='^^'.$op6;

	if ($fresult['i_option']==4) {
		$itemoption= ($iop).'%';
		$inf	= ' Automatic HP Recovery rate ';
	} elseif ($fresult['i_option']==3) {
		$itemoption= $iop*5;
		$inf	= ' Additional Defense rate ';
	}
	else 
		$itemoption	= $iop*4;

	$c		= '#FFFFFF'; // White -> Normal Item
	if (($iop>1) || ($luck!='')) $c = '#8CB0EA';
	if ($itemlevel>6) $c = '#F4CB3F';
	$tipche		= 0;
	if ($itemexl!='') { 	    // Green -> Excellent Item
		$c	= '#2FF387'; 
		$tipche	= 1;
	}
  if($fresult['s4'] == 1) $c = '#CC66CC';
	if ($itemoption==0)
		$itemoption	= '';
	else
		$itemoption 	= $inf." +".$itemoption;

	if ($itemexl!='') 
		$incrall=20;

	/*if ($fresult['cmd'])
		$fresult['cmd']+=$incrall;

	if ($fresult['str']) 
		$fresult['str']+=($itemlevel*7)+($itemoption*5)+$incrall;

	if ($fresult['agi']) 
		$fresult['agi']+=($itemlevel*4)+$incrall; */

	// In case the item is ancient
	if ($ac>0) {
		$itemexl='';
		$c	= '#2FF387';// Blue -> Ancient Item
		$ancias ='style="background:#0066CC"';
    $ancia ='#0066CC';
    $itemname="Anc ".$itemname."";
    if ($itemoption) 
			$itemoption .= "<br>";
		$itemoption.='Ancient: +'.$ac.' stamina';
		$tipche=2;
	}
	if (@$nocolor) 	$c='#F4CB3F';

	// Fenrir (from v0.4);
	if (($fresult['i_type']==12) && ($fresult['i_id']==37))
	{
		$skill	= "Plasma storm skill (Mana:50)";
		$c	= "#8CB0EA";
		if ($iopx1==1) {
			$itemname.=" +Destroy";
			$itemoption="Increase final damage 10%<br>Increase speed";
		}
		elseif ($iopx2==1) {
			$itemname.=" +Protect";
			$itemoption="Absorb final damage 10%<br>Increase speed";
		}
		elseif ($iopx3==1) { // v0.9
			$itemname="<font color=#F4CB3F>Golden Fenrir</font>";
			$itemoption="Increase speed";
		}
	} 
	else
		if ((@!$nocolor) &&($itemexl!='') && ($itemname)) $itemname = 'Exc '.$itemname;

	if ($nolevel==1) 
		$ilvl=0;
	else
		$ilvl=$itemlevel;
		
	$output['sticklevel']	= $fresult['i_stick_level'];
	$output['category']	= $fresult['category'];
	$output['type'] = $fresult['i_type'];
	$output['id'] = $fresult['i_id'];
	// Item name
	$output['name'] = $itemname;
	// Item level
	$output['level']= $ilvl;
	// Item option level
	$output['opt']	= $itemoption;
	// Item excellent options
	$output['exl']	= $itemexl;
	// Item Luck (two lines)
	$output['luck']	= $luck;
	// Item Skill
	$output['skill']= $skill;
	// JoG option
  $output['jog']= $jogopt;
  // Harmony option
  $output['harm']=$harmon;
  // Socket options
  $output['socket']=$sock;
	// Item Durability
  $output['dur']	= $itemdur;
  $output['anc'] = $ancias;
  $output['anco'] = $ancia;
	// Horizontal Slots The item takes
	$output['X']	= $fresult['size_x'];
	// Vertical Slots The item takes
	$output['Y']	= $fresult['size_y'];
	// Requirements
	/*$output['str']	= $fresult['str'];
	$output['agi']	= $fresult['agi'];
	$output['nrg']	= $fresult['nrg'];
	$output['cmd']	= $fresult['cmd'];*/
	$output['refund']= $fresult['i_sell'];
	// Item thumbnail link
	$output['thumb']= ItemImage($fresult['i_id'], $fresult['i_type'], $tipche, $itemlevel);
	// Item title color
	$output['color']= $c;
	// Item s/n
	$output['sn']	= $serial;

	$output['inf']	= $inf;
  //$output['lala'] = $bulo;
	// Output the result array()
	return $output;
}

function ItemImage($theid,$type,$ExclAnci,$lvl=0) {
	/*switch ($type) {
		case 14:
			$type=12;
			break;
		case 12:
			$type=13;
			break;
		case 13:
			$type=14;
			break;
	} */
	switch ($ExclAnci) {
		case 1:	// Excellent item
		$tnpl	= '10';
		break;
		case 2:	// Ancient item
		$tnpl	= '01';
		break;
		default:// Normal Item
		$tnpl	= '00';

	}
  if($type==15 and $theid>=32) $lvl=1;
	$itype	= $type*16;
	if ($theid>31) { 
		$nxt	="F9"; 
		$theid	+=-32; 
	} 
	else 
		$nxt	= "00";
	if ($itype<128)  {
		$tipaj = "00";
		$theid += $itype;
	} else {
		$tipaj = "80";
		$itype += -128;
		$theid += $itype;
	}
	$itype	+= $theid;
	$itype	= sprintf("%02X",$itype,00);
	$iid 	= sprintf("%02X",$theid,00);

	if (file_exists('MarketSystem/items/'.$tnpl.$itype.$tipaj.$nxt.'.gif'))
		$output = 'MarketSystem/items/'.$tnpl.$itype.$tipaj.$nxt.'.gif';
	else 
		$output = 'MarketSystem/items/00'.$itype.$tipaj.$nxt.'.gif';

	$i	= $lvl+1;	
	while ($i>0) {
		$i+=-1;
		$il=sprintf("%02X", $i, 00);
		if (file_exists('MarketSystem/items/'.$tnpl.$itype.$tipaj.$nxt.$il.'.gif')){
			$output='MarketSystem/items/'.$tnpl.$itype.$tipaj.$nxt.$il.'.gif';
			$i=0;
		}
			
	}
	return $output;
}

function smartsearch($whbin,$itemX,$itemY) {

	if (substr($whbin,0,2)=='0x') $whbin=substr($whbin,2);	
	$items 	= str_repeat('0', 120);
	$itemsm = str_repeat('1', 120);
	$i	= 0; 
	while ($i<120) {
		$_item	= substr($whbin,(20*$i), 20);		
		$level = substr($_item, 0, 1);
		$level2 = substr($_item, 1, 1);
		$level3 = substr($_item, 14, 2);
		$level1 = hexdec(substr($level, 0, 1));
		if(($level1 % 2) <> 0)
		{
		$level2 = "1" . $level2;
		$level1--; }
		if(hexdec($level3) >= 128)
		{ 	$level1 += 16;  }
		$level1 /= 2;
		$level2 = hexdec($level2);
		
		$res	= mssql_fetch_row(mssql_query("select [size_x],[size_y] from [MuCore_Shop_Items] where [i_id]=$level2 and [i_type]=$level1"));
		$y	= 0;
		while($y<$res[1]) {
			$y++;$x=0;
			while($x<$res[0]) {
				$items	= substr_replace($items, '1', ($i+$x)+(($y-1)*8), 1);
				$x++;	
			} 
		}	
		$i++;
	}
	$y	= 0;
	while($y<$itemY) {
		$y++;$x=0;
		while($x<$itemX) {
			$x++;
			$spacerq[$x+(8*($y-1))] = true;
		} 
	}
	$walked	= 0;
	$i	= 0;
	while($i<120) {
		if (isset($spacerq[$i])) {
			$itemsm	= substr_replace($itemsm, '0', $i-1, 1);
			$last	= $i;
			$walked++;
		}
		if ($walked==count($spacerq)) $i=119;
		$i++;
	}
	$useforlength	= substr($itemsm,0,$last);
	$findslotlikethis='^'.str_replace('++','+',str_replace('1','+[0-1]+', $useforlength));
	$i=0;$nx=0;$ny=0;
	while ($i<120) {
		if ($nx==8) { $ny++; $nx=0; }
		if ((eregi($findslotlikethis,substr($items, $i, strlen($useforlength)))) && ($itemX+$nx<9) && ($itemY+$ny<16))
			return $i;
		$i++;
		$nx++;
	}
	return 1337;
}
?>
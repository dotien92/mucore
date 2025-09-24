<?php

if($_GET['guide'] == 'lvlup')
{
  $lvlup = 'on';
  $lvlup2 = 'style="display: block;"';
  
  $lvl1 = '';
  $lvl2 = '';
  $lvl3 = '';
  $lvl4 = '';
  $lvl5 = '';
  
  if($_GET['sub'] == 'start')
    $lvl1 = 'class="on"';
  if($_GET['sub'] == '30')
    $lvl2 = 'class="on"';  
  if($_GET['sub'] == '50')
    $lvl3 = 'class="on"';  
  if($_GET['sub'] == '80')
    $lvl4 = 'class="on"';  
  if($_GET['sub'] == '220')
    $lvl5 = 'class="on"';     
}

if($_GET['guide'] == 'event')
{
  $events = 'on';
  $events2 = 'style="display: block;"';
  
  $bc = '';
  $cs = '';
  $cc = '';
  $cw = '';
  $ds = '';
  $it = '';
  $ka = '';
  $ww = '';
  $ht = '';
  $aw = '';
  
  if($_GET['sub'] == 'blood-castle')
    $bc = 'class="on"';
  if($_GET['sub'] == 'castle-siege')
    $cs = 'class="on"';  
  if($_GET['sub'] == 'chaos-castle')
    $cc = 'class="on"';
  if($_GET['sub'] == 'crywolf')
    $cw = 'class="on"';  
  if($_GET['sub'] == 'devil-square')
    $ds = 'class="on"';  
  if($_GET['sub'] == 'illusion-temple')
    $it = 'class="on"';  
  if($_GET['sub'] == 'kanturu')
    $ka = 'class="on"';  
  if($_GET['sub'] == 'white-wizard-invasion')
    $ww = 'class="on"';    
  if($_GET['sub'] == 'hatchery')
    $ht = 'class="on"';
  if($_GET['sub'] == 'arca-war')
    $aw = 'class="on"';   
}

if($_GET['guide'] == 'character')
{
  $chars = 'on';
  $chars2 = 'style="display: block;"';
  
  $dk = ''; 
  $dw = ''; 
  $elf = ''; 
  $mg = '';
  $dl = '';
  $sum = '';
  $rf = '';
  
  if($_GET['sub'] == 'dark-knight')
    $dk = 'class="on"';
  if($_GET['sub'] == 'dark-wizard')
    $dw = 'class="on"';
  if($_GET['sub'] == 'fairy-elf')
    $elf = 'class="on"';
  if($_GET['sub'] == 'magic-gladiator')
    $mg = 'class="on"';
  if($_GET['sub'] == 'dark-lord')
    $dl = 'class="on"';
  if($_GET['sub'] == 'summoner')
    $sum = 'class="on"';
  if($_GET['sub'] == 'rage-fighter')
    $rf = 'class="on"';
}

if($_GET['guide'] == 'game')
{
  $games = 'on';
  $games2 = 'style="display: block;"'; 
  
  $game1 = ''; 
  $game2 = ''; 
  $game3 = ''; 
  $game4 = '';
  
  if($_GET['sub'] == 'maps')
    $game1 = 'class="on"'; 
  if($_GET['sub'] == 'quests')
    $game2 = 'class="on"';   
  if($_GET['sub'] == 'npcs')
    $game3 = 'class="on"';   
  if($_GET['sub'] == 'monsters')
    $game4 = 'class="on"';   
}

if($_GET['guide'] == 'system')
{
  $systems = 'on';
  $systems2 = 'style="display: block;"'; 
  
  $system1 = ''; 
  $system2 = ''; 
  $system3 = ''; 
  $system4 = '';
  $system5 = '';
  $system6 = '';
  $system7 = '';
  $system8 = '';
  $system9 = '';
  $system10 = '';
  
  if($_GET['sub'] == 'basic-info')
    $system1 = 'class="on"'; 
  if($_GET['sub'] == 'svatba')
    $system2 = 'class="on"';   
  if($_GET['sub'] == 'lucky-items')
    $system3 = 'class="on"';   
  if($_GET['sub'] == 'vylepsovani-itemu')
    $system4 = 'class="on"';   
  if($_GET['sub'] == 'talisman-of-chaos-assembly')
    $system5 = 'class="on"';   
  if($_GET['sub'] == 'socket-system')
    $system6 = 'class="on"';   
  if($_GET['sub'] == 'auto-hunting-mode')
    $system7 = 'class="on"';   
  if($_GET['sub'] == 'minimizer')
    $system8 = 'class="on"';  
  if($_GET['sub'] == 'skill-trade')
    $system9 = 'class="on"';   
  if($_GET['sub'] == 'party')
    $system10 = 'class="on"';   
}

if($_GET['guide'] == 'item')
{
  $items = 'on';
  $items2 = 'style="display: block;"'; 
  
  $item1 = '';
  $item2 = '';
  $item3 = '';
  $item4 = '';
  $item5 = '';
  $item6 = '';
  $item7 = '';
  $item8 = '';
  $item9 = '';
  $item10 = '';
  $item11 = '';
  $item12 = '';
  $item13 = '';
  $item14 = '';
  $item15 = ''; 
  
  if($_GET['sub'] == 'rare-item-ticket')
    $item1 = 'class="on"';  
  if($_GET['sub'] == 'sword')
    $item2 = 'class="on"';    
  if($_GET['sub'] == 'staff')
    $item3 = 'class="on"';    
  if($_GET['sub'] == 'bow')
    $item4 = 'class="on"';    
  if($_GET['sub'] == 'axe')
    $item5 = 'class="on"';    
  if($_GET['sub'] == 'scepter')
    $item6 = 'class="on"';    
  if($_GET['sub'] == 'spear')
    $item7 = 'class="on"';    
  if($_GET['sub'] == 'mace')
    $item8 = 'class="on"';    
  if($_GET['sub'] == 'shield')
    $item9 = 'class="on"';    
  if($_GET['sub'] == 'excellent-items')
    $item10 = 'class="on"';    
  if($_GET['sub'] == 'ancient-set-items')
    $item11 = 'class="on"';    
  if($_GET['sub'] == 'set-items')
    $item12 = 'class="on"';    
  if($_GET['sub'] == 'wings')
    $item13 = 'class="on"';    
  if($_GET['sub'] == 'jewels')
    $item14 = 'class="on"';    
  if($_GET['sub'] == 'others')
    $item15 = 'class="on"';    
}

if($_GET['guide'] == 'update')
{
  $updates = 'on';
  $updates2 = 'style="display: block;"'; 
  
  $update1 = '';
  $update2 = '';
  $update3 = ''; 
  
  if($_GET['sub'] == 'ex700-plus-item')
    $update1 = 'class="on"';
  if($_GET['sub'] == 'ex700-plus-ui')
    $update2 = 'class="on"';  
  if($_GET['sub'] == 'ex700-plus-wing')
    $update3 = 'class="on"';  
}

?>

<h2 class="title">Tutorials</h2> 
<img src="template/<?=$core['config']['template'];?>/images/sub_nav_bg_top.gif">            
<div class="menuSubWrap">
  <dl class="guideAccList">
    <dt class="guideaccButton <?=$lvlup;?>">Levels UP</dt>
    <dd class="guideaccContent" <?=$lvlup2;?> >
      <a href="index.php?page_id=guides&guide=lvlup&sub=start" <?=$lvl1;?>>Startù</a>
      <a href="index.php?page_id=guides&guide=lvlup&sub=30" <?=$lvl2;?>>Level 1~30</a>
      <a href="index.php?page_id=guides&guide=lvlup&sub=50" <?=$lvl3;?>>Level 30~50</a>
      <a href="index.php?page_id=guides&guide=lvlup&sub=80" <?=$lvl4;?>>Level 50~80</a>
      <a href="index.php?page_id=guides&guide=lvlup&sub=220" <?=$lvl5;?>>Level 220~</a>
    </dd>
    <dt class="guideaccButton <?=$games;?>">Game content</dt>
    <dd class="guideaccContent" <?=$games2;?> >
      <a href="index.php?page_id=guides&guide=game&sub=maps" <?=$game1;?>>Mapy</a>
      <a href="index.php?page_id=guides&guide=game&sub=quests" <?=$game2;?>>Quests</a>
      <a href="index.php?page_id=guides&guide=game&sub=npcs" <?=$game3;?>>Npc</a>
      <a href="index.php?page_id=guides&guide=game&sub=monsters" <?=$game4;?>>Monsters</a>
    </dd>
    <dt class="guideaccButton <?=$systems;?>">Game systems</dt>
    <dd class="guideaccContent" <?=$systems2;?> >
      <a href="index.php?page_id=guides&guide=system&sub=basic-info">Basic information</a>
      <a href="index.php?page_id=guides&guide=system&sub=svatba">Wedding</a>
      <a href="index.php?page_id=guides&guide=system&sub=lucky-items">Lucky item</a>
      <a href="index.php?page_id=guides&guide=system&sub=vylepsovani-itemu">Enhancing items</a>
      <a href="index.php?page_id=guides&guide=system&sub=talisman-of-chaos-assembly">Talisman of Chaos Assembly</a>
      <a href="index.php?page_id=guides&guide=system&sub=socket-system">Sockets System</a>
      <a href="index.php?page_id=guides&guide=system&sub=auto-hunting-mode">MU Helper</a>
      <a href="index.php?page_id=guides&guide=system&sub=minimizer">Minimizer</a>
      <a href="index.php?page_id=guides&guide=system&sub=skill-trade">Skill &amp; Trade</a>
      <a href="index.php?page_id=guides&guide=system&sub=party">Party</a>
    </dd>
    <dt class="guideaccButton <?=$events;?>">Events</dt>
    <dd class="guideaccContent" <?=$events2;?> >
      <a href="index.php?page_id=guides&guide=event&sub=arca-war" <?=$aw;?>>Arca War</a>
      <a href="index.php?page_id=guides&guide=event&sub=blood-castle" <?=$bc;?>>Blood Castle</a>
      <a href="index.php?page_id=guides&guide=event&sub=castle-siege" <?=$cs;?>>Castle Siege</a>
      <a href="index.php?page_id=guides&guide=event&sub=chaos-castle" <?=$cc;?>>Chaos Castle</a>
      <a href="index.php?page_id=guides&guide=event&sub=crywolf" <?=$cw;?>>Crywolf</a>
      <a href="index.php?page_id=guides&guide=event&sub=devil-square" <?=$ds;?>>Devil Square</a>
      <a href="index.php?page_id=guides&guide=event&sub=hatchery" <?=$ht;?>>Hatchery</a>
      <a href="index.php?page_id=guides&guide=event&sub=illusion-temple" <?=$it;?>>Illusion Temple</a>
      <a href="index.php?page_id=guides&guide=event&sub=white-wizard-invasion" <?=$ww;?>>Inv·zia Bieleho »arodeja</a>
      <a href="index.php?page_id=guides&guide=event&sub=kanturu" <?=$ka;?>>Kanturu</a>


    </dd>
    <dt class="guideaccButton <?=$chars;?>">Characters</dt>
    <dd class="guideaccContent" <?=$chars2;?> >
      <a href="index.php?page_id=guides&guide=character&sub=dark-knight" <?=$dk;?>>Dark Knight</a>
      <a href="index.php?page_id=guides&guide=character&sub=dark-wizard" <?=$dw;?>>Dark Wizard</a>
      <a href="index.php?page_id=guides&guide=character&sub=fairy-elf" <?=$elf;?>>Fairy Elf</a>
      <a href="index.php?page_id=guides&guide=character&sub=magic-gladiator" <?=$mg;?>>Magic Gladiator</a>
      <a href="index.php?page_id=guides&guide=character&sub=dark-lord" <?=$dl;?>>Dark Lord</a>
      <a href="index.php?page_id=guides&guide=character&sub=summoner" <?=$sum;?>>Summoner</a>
      <a href="index.php?page_id=guides&guide=character&sub=rage-fighter" <?=$rf;?>>Rage Fighter</a>
    </dd>
    <dt class="guideaccButton <?=$items;?>">Items</dt>
    <dd class="guideaccContent" <?=$items2;?> >
      <a href="index.php?page_id=guides&guide=item&sub=rare-item-ticket" <?=$item1;?>>Rare Item Ticket</a>
      <a href="index.php?page_id=guides&guide=item&sub=sword" <?=$item2;?>>Sword</a>
      <a href="index.php?page_id=guides&guide=item&sub=staff" <?=$item3;?>>Staff</a>
      <a href="index.php?page_id=guides&guide=item&sub=bow" <?=$item4;?>>Bow</a>
      <a href="index.php?page_id=guides&guide=item&sub=axe" <?=$item5;?>>Axe</a>
      <a href="index.php?page_id=guides&guide=item&sub=scepter" <?=$item6;?>>Scepter</a>
      <a href="index.php?page_id=guides&guide=item&sub=spear" <?=$item7;?>>Spear</a>
      <a href="index.php?page_id=guides&guide=item&sub=mace" <?=$item8;?>>Mace</a>
      <a href="index.php?page_id=guides&guide=item&sub=shield" <?=$item9;?>>Shield</a>
      <a href="index.php?page_id=guides&guide=item&sub=excellent-items" <?=$item10;?>>Excellent Items</a>
      <a href="index.php?page_id=guides&guide=item&sub=ancient-set-items" <?=$item11;?>>Ancient Set Items</a>
      <a href="index.php?page_id=guides&guide=item&sub=set-items" <?=$item12;?>>Set Items</a>
      <a href="index.php?page_id=guides&guide=item&sub=wings" <?=$item13;?>>Wings</a>
      <a href="index.php?page_id=guides&guide=item&sub=jewels" <?=$item14;?>>Jewels</a>
      <a href="index.php?page_id=guides&guide=item&sub=others" <?=$item15;?>>Others</a>
    </dd>
    <dt class="guideaccButton <?=$updates;?>">Update</dt>
    <dd class="guideaccContent" <?=$updates2;?> >
      <a href="index.php?page_id=guides&guide=update&sub=ex700-plus-item" <?=$update1;?>>eX702 Item</a>
      <a href="index.php?page_id=guides&guide=update&sub=ex700-plus-ui" <?=$update2;?>>eX702 Interface</a>
      <a href="index.php?page_id=guides&guide=update&sub=ex700-plus-wing" <?=$update3;?>>eX702 Wings</a>
    </dd>
  </dl>
</div>


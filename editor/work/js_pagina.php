<?php
require_once('session.php');

include("../i18n/".$lang."/locale/text.php");
$js_p = array(
        array(1, 1, "abbm","ArcaBattleBootyMix", array("ArcaBattleBootyMix"=>$edit_file." ArcaBattleBootyMix.bmd")),
        array(1, 1, "avt","AttributeVariation", array("AttributeVariation"=>$edit_file." AttributeVariation.bmd")),
        array(1, 1, "buffeffect","BuffEffect", array("BuffEffect"=>$edit_file." BuffEffect.bmd")),
        array(1, 1, "credit","Credit", array("Credit"=>$edit_file." Credit.bmd")),
        array(1, 1, "dialog","Dialog", array("Dialog"=>$edit_file." Dialog.bmd")),
        array(1, 1, "filter","Filter", array("Filter"=>$edit_file." Filter.bmd")),
        array(1, 1, "filtername","FilterName", array("FilterName"=>$edit_file." FilterName.bmd","FilterNamebkp"=>$edit_file." FilterName.bkp")),
        array(1, 1, "gate","Gate", array("gate"=>$edit_file." Gate.bmd")),
        array(1, 1, "item","Item", array("item"=>$edit_file." item.bmd")),
        array(1, 1, "items6","Item", array("items6"=>$edit_file." item.bmd")),
        array(1, 1, "itemaddoption","ItemAddOption", array("ItemAddOption"=>$edit_file." ItemAddOption.bmd")),
        array(1, 1, "itemleveltooltip","ItemLevelTooltip", array("itemleveltooltip"=>$edit_file." ItemLevelTooltip.bmd")),
        array(1, 1, "itemsetoption","ItemSetOption", array("itemsetoption"=>$edit_file." ItemSetOption.bmd")),
        array(1, 1, "itemsettype","ItemSetType", array("itemsettype"=>$edit_file." itemsettype.bmd")),
        array(1, 1, "itemtooltip","ItemTooltip", array("itemtooltip"=>$edit_file." ItemTooltip.bmd")),
        array(1, 1, "itemtooltiptext","ItemTooltipText", array("itemtooltiptext"=>$edit_file." ItemTooltipText.bmd")),
        array(1, 1, "joho","JewelOfHarmonyOption", array("JewelOfHarmonyOption"=>$edit_file." JewelOfHarmonyOption.bmd")),
        array(1, 1, "johs","JewelOfHarmonySmelt", array("JewelOfHarmonySmelt"=>$edit_file." JewelOfHarmonySmelt.bmd")),
        array(15, 1, "mapc","MapCharacters", array("MapCharacters"=>$edit_file." MapCharacters.bmd")),
        array(14, 1, "mst","MasterSkillTree", array("MasterSkillTree"=>$edit_file." MasterSkillTree.bmd")),
        array(1, 1, "mstd","MasterSkillTreeData", array("MasterSkillTreeData"=>$edit_file." MasterSkillTreeData.bmd")),
        array(1, 1, "mstt","MasterSkillTooltip", array("MasterSkillTooltip"=>$edit_file." MasterSkillTooltip.bmd")),
        array(1, 1, "minimap","Minimap", array("Minimap"=>$edit_file." Minimap.bmd")),
        array(8, 1, "mix","Mix", array("mix"=>$edit_file." Mix.bmd")),
        array(1, 1, "monsterskill","MonsterSkill", array("MonsterSkill"=>$edit_file." MonsterSkill.bmd")),
        array(1, 1, "movereq","MoveReq", array("movereq"=>$edit_file." movereq.bmd")),
        array(1, 1, "penmnst","PentagramMixNeedSource", array("PentagramMixNeedSource"=>$edit_file." PentagramMixNeedSource.bmd")),
        array(1, 1, "penjovt","PentagramJewelOptionValue", array("PentagramJewelOptionValue"=>$edit_file." PentagramJewelOptionValue.bmd")),
        array(1, 1, "pet","Pet", array("pet"=>$edit_file." pet.bmd")),
        array(1, 1, "petdata","PetData", array("petdata"=>$edit_file." PetData.bmd")),
        array(1, 1, "npcdialogue","NPCDialogue", array("NPCDialogue"=>$edit_file." NPCDialogue.bmd")),
        array(13, 1, "quest","Quest", array("Quest"=>$edit_file." Quest.bmd")),
        array(1, 1, "questprogress","QuestProgress", array("QuestProgress"=>$edit_file." QuestProgress.bmd")),
        array(1, 1, "questwords","QuestWords", array("QuestWords"=>$edit_file." QuestWords.bmd")),
        array(1, 1, "serverlist","ServerList", array("ServerList"=>$edit_file." ServerList.bmd")),
        array(1, 1, "shopcategoryitems","ShopCategoryItems", array("ShopCategoryItems"=>$edit_file." ShopCategoryItems.bmd")),
        array(1, 1, "shopui","ShopUI", array("ShopUI"=>$edit_file." ShopUI.bmd")),
        array(1, 1, "skill","Skill", array("skill"=>$edit_file." Skill.bmd")),
        array(1, 1, "skills6","Skill", array("skills6"=>$edit_file." Skill.bmd")),
        array(1, 1, "slide","Slide", array("slide"=>$edit_file." slide.bmd")),
        array(1, 1, "socketitem","SocketItem", array("socketitem"=>$edit_file." socketitem.bmd")),
        array(1, 1, "text","Text", array("text"=>$edit_file." Text.bmd")),
        array(2, 1, "deco_gra", $deco_enco, array("deco"=>$deco_gra,"enco"=>$enco_gra)),
        array(3, 1, "message","message", array("message"=>$edit_file." message.wtf")),
        array(4, 0, "uso","message", array("message"=>"")),
        array(4, 0, "todo","message", array("message"=>"")),
        array(4, 0, "aportes","message", array("message"=>"")),
        array(4, 0, "carpetas","message", array("message"=>"")),
        array(4, 0, "creditos","credios", array("message"=>"")),
        array(5, 1, "gatetxt","Gate", array("gate"=>$export_file." Gate.bmd")),
        array(5, 1, "itemtxt","Item", array("item"=>$export_file." Item.bmd")),
        array(5, 1, "item6txt","Items6", array("items6"=>$export_file." Item.bmd Season 6")),
        array(5, 1, "itemaddoptiontxt","ItemAddOption", array("ItemAddOption"=>$export_file." ItemAddOption.bmd")),
        array(5, 1, "itemsetoptiontxt","ItemSetOption", array("itemsetoption"=>$export_file." ItemSetOption.bmd")),
        array(5, 1, "itemsettypetxt","ItemSetType", array("itemsettype"=>$export_file." itemSetType.bmd")),
        array(5, 1, "jewelofharmonyoptiontxt","JewelOfHarmonyOption", array("JewelOfHarmonyOption"=>$export_file." JewelOfHarmonyOption.bmd")),
        array(5, 1, "movereqtxt","MoveReq", array("movereq"=>$export_file." MoveReq.bmd")),
        array(5, 1, "mstdtxt","MasterSkillTreeData", array("MasterSkillTreeData"=>$export_file." MasterSkillTreeData.bmd")),
        array(5, 1, "questtxt","Quest", array("Quest"=>$export_file." Quest.bmd")),
        array(5, 1, "skilltxt","Skill", array("skill"=>$export_file." Skill.bmd ENCTEAM")),
        array(5, 1, "skills6txt","Skill", array("skills6"=>$export_file." Skill.bmd TitanTech")),
        array(6, 1, "main","main", array("main"=>$cisv)),
        array(7, 1, "decatt","decatt", array("EncTerrain"=>"Decode EncTerrain.att")),
        array(7, 1, "encatt","decatt", array("DecTerrain"=>"Encode DecTerrain.att")),
        array(11, 1, "decdsdat","decdsdat", array("DataServer"=>"Decode/Encode DataServer.ini.dat")),
        array(11, 1, "deceddat","deceddat", array("ExDB"=>"Decode/Encode ExDB.ini.dat")),
        array(10, 1, "itemtxtcli","Item", array("item"=>$export_file." Item.txt")),
        array(10, 1, "itemtxtcli2","Item", array("items6"=>$export_file." Item.txt")),
        array(12, 1, "npcnames","NpcName", array("NpcName"=>$edit_file." NpcName.txt")),
        array(16, 1, "ibsc","IBSCategory", array("IBSCategory"=>"IBSCategory.txt to SCF_CashShop_Category.txt")),
        array(16, 1, "ibspa","IBSPackage", array("IBSPackage"=>"IBSPackage.txt to SCF_CashShop_Package.txt")),
        array(16, 1, "ibspr","IBSProduct", array("IBSProduct"=>"IBSProduct.txt to SCF_CashShop_Product.txt")),

);
for($h = 0;$h < count($js_p); $h++){
    $llinks = "";
    $valor   = $js_p[$h][0];
    $enlaces = $js_p[$h][1];
    $valor0  = $js_p[$h][2];
    $valor1  = $js_p[$h][3];
    $valor2  = $js_p[$h][4];
    $l_key   = array_keys($valor2);

    switch ($valor) {
        case 1:
            $titulo1 = $ttitulo1.$valor1.".bmd";
            $titulo2 = $ttitulo12.$valor1.".bmd";
            $file    = "pagina";
            $tipo    = "bmd";
        break;
        case 2:
            $titulo1 = $ttitulo2;
            $titulo2 = $ttitulo22."\"OZB\", \"OZJ\", \"OZT\"";
            $tipo    = "graficos";
            $file    = "decgra";
        break;
        case 3:
            $titulo1 = $ttitulo1.$valor1.".wtf";
            $titulo2 = $ttitulo12.$valor1.".wtf";
            $file    = "pagina";
            $tipo    = "wtf";
        break;
        case 4:
            $titulo1 = $ttitulo4;
            $titulo2 = $ttitulo42;
            $file    = "s";
        break;
        case 5:
            $titulo1 = "Exportación desde el Cliente al Server";
            $titulo2 = "Exportar ".$valor1.".bmd";
            $tipo    = "bmd";
            $file    = "export_bmd_txt";
        break;
        case 6:
            $titulo1 = "Modificar valores del Main";
            $titulo2 = "Enlaces para main.exe";
            $tipo    = "main";
            $file    = "pagina_main";
        break;
        case 7:
            $titulo1 = $ttitulo1.$l_key[0].".att";
            $titulo2 = $ttitulo12.$l_key[0].".att";
            $tipo    = "att";
            $file    = "decatt";
        break;
        case 8:
            $titulo1 = $ttitulo1.$valor1.".bmd";
            $titulo2 = $ttitulo12.$valor1.".bmd";
            $tipo    = "bmd";
            $file    = "mix";
        break;
        case 9:
            $titulo1 = $ttitulo4;
            $titulo2 = $ttitulo42;
            $tipo    = "att";
            $file    = "encatt";
        break;
        case 10:
            $titulo1 = $txdsac;
            $titulo2 = $ttitulo12.$valor1.".txt";
            $tipo    = "txt";
            $file    = "export_txt_bmd";
        break;
        case 11:
            $titulo1 = $ttitulo1.$l_key[0].".ini.dat";
            $titulo2 = $ttitulo12.$l_key[0].".ini.dat";
            $tipo    = "ini.dat";
            $file    = "decencinidat";
        break;
        case 12:
            $titulo1 = $ttitulo1.$l_key[0].".txt";
            $titulo2 = $ttitulo12.$l_key[0].".txt";
            $file    = "pagina";
            $tipo    = "txt";
        break;
        case 13:
            $titulo1 = $ttitulo1.$valor1.".bmd";
            $titulo2 = $ttitulo12.$valor1.".bmd";
            $file    = "quest";
            $tipo    = "bmd";
        break;
        case 14:
            $titulo1 = $ttitulo1.$valor1.".bmd";
            $titulo2 = $ttitulo12.$valor1.".bmd";
            $file    = "masterskilltree";
            $tipo    = "bmd";
        break;
        case 15:
            $titulo1 = $ttitulo1.$valor1.".bmd";
            $titulo2 = $ttitulo12.$valor1.".bmd";
            $file    = "mapcharacters";
            $tipo    = "bmd";
        break;
        case 16:
            $titulo1 = $ttitulo1.$valor1.".txt";
            $titulo2 = $ttitulo12.$valor1.".txt";
            $file    = "cashshop";
            $tipo    = "txt";
        break;
        default:
        break;
    }

    if(is_array($valor2)){
        $llinks = "<table  class=\"tablecol\" width=\"100%\"><tr>";
        foreach($valor2 as $key => $value){
//            $key     = preg_replace("/[0-9]/", "", $key);
            $llinks .= "<td><a class=\"linkarchivo\" href=\"work/upload.php?web=".$file."&archivo=".$key."&tipo=".$tipo."\" target=\"_blank\">$value</a></td></tr><tr>";
//            if($valor==1 || $valor==3)
//                $llinks .= "<td><a class=\"linkarchivo\" href=\"work/pagina_bmd_txt.php?archivo=$key&tipo=$tipo\" target=\"_blank\">$value</a></td></tr><tr>";
        }
        $llinks .= "</tr></table>";
    }
    else 
        $llinks .= "<a class=\"linkarchivo\" href=\"work/".$file.".php?archivo=$valor2\" target=\"_blank\">".$valor1."</a>";
?>

    var <?php echo $valor0?> = {
        id: '<?php echo $valor0?>-panel',
        title: '<?php echo $titulo1?>',
        autoScroll: true,
        bodyStyle: 'padding:10px;',
        defaults: {
            bodyCssClass: 'fondoa',
            collapsible: true,
            frame: false
        },
        items:[<?php if($enlaces==1) echo "{title: '".$titulo2."',html: '".$llinks."'},";?>
            {
            title: '<?php echo $tesp?>',
            bodyCssClass: 'fondoa',
            autoLoad: {url: 'i18n/<?php echo $lang?>/<?php echo $valor0?>_p.txt?<?php echo rand();?>'},
        }]
    };
<?php
}
?>
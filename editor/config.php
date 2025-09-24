<?php

$path_bmd     = "../archivos/bmd/";
$path_bmd_txt = "../archivos/bmd_txt/";
$path_xls     = "../archivos/xls/";
$path_oz      = "../archivos/oz/";
$path_graf    = "../archivos/graficos/";
$path_wtf     = "../archivos/bmd/";
$path_main    = "../archivos/main/";
$path_txt     = "../archivos/txt/";
$path_att     = "../archivos/att/";
$path_dec_att = "../archivos/deco_att/";

$pagina1   = array(
            array("Swords","Tipo 0", "Swords", 0, 512),
            array("Axes","Tipo 1", "Axes", 512, 512),
            array("Scepters","Tipo 2", "Scepters", 1024, 512),
            array("Spears","Tipo 3", "Spears", 1536, 512),
            array("Bows","Tipo 4", "Bows y Crossbows", 2048, 512),
            array("Staffs","Tipo 5", "Staffs", 2560, 512),
            array("Shields","Tipo 6", "Shields", 3072, 512),
            array("Helm","Tipo 7", "Helm", 3584, 512),
            array("Armor","Tipo 8", "Armor", 4096, 512),
            array("Pants","Tipo 9", "Pants", 4608, 512),
            array("Gloves","Tipo 10", "Gloves", 5120, 512),
            array("Boots","Tipo 11", "Boots", 5632, 512),
            array("Wings","Tipo 12", "Wings, Orbs, Joyas y Mis.", 6144, 512),
            array("Pets","Tipo 13", "Pets, Rings, Pendants y Mis.", 6656, 512),
            array("Pots","Tipo 14", "Pots, Event, Mis.", 7168, 512),
            array("Scrolls","Tipo 15", "Scrolls", 7680, 512)
        );
$pagina1a  = array(
            array("Swords","Tipo 0", "Swords", 0, 32),
            array("Axes","Tipo 1", "Axes", 32, 32),
            array("Scepters","Tipo 2", "Scepters", 64, 32),
            array("Spears","Tipo 3", "Spears", 96, 32),
            array("Bows","Tipo 4", "Bows y Crossbows", 128, 32),
            array("Staffs","Tipo 5", "Staffs", 160, 32),
            array("Shields","Tipo 6", "Shields", 192, 32),
            array("Helm","Tipo 7", "Helm", 224, 32),
            array("Armor","Tipo 8", "Armor", 256, 32),
            array("Pants","Tipo 9", "Pants", 288, 32),
            array("Gloves","Tipo 10", "Gloves", 320, 32),
            array("Boots","Tipo 11", "Boots", 352, 32),
            array("Wings","Tipo 12", "Wings, Orbs, Joyas y Mis.", 384, 32),
            array("Pets","Tipo 13", "Pets, Rings, Pendants y Mis.", 416, 32),
            array("Pots","Tipo 14", "Pots, Event, Mis.", 448, 32),
            array("Scrolls","Tipo 15", "Scrolls", 480, 32)
        );
$pagina1b  = array(
            array("Swords","Tipo 0", "Swords", 0, 16),
            array("Axes","Tipo 1", "Axes", 16, 16),
            array("Scepters","Tipo 2", "Scepters", 32, 16),
            array("Spears","Tipo 3", "Spears", 48, 16),
            array("Bows","Tipo 4", "Bows y Crossbows", 64, 16),
            array("Staffs","Tipo 5", "Staffs", 80, 16),
            array("Shields","Tipo 6", "Shields", 96, 16),
            array("Helm","Tipo 7", "Helm", 112, 16),
            array("Armor","Tipo 8", "Armor", 128, 16),
            array("Pants","Tipo 9", "Pants", 144, 16),
            array("Gloves","Tipo 10", "Gloves", 160, 16),
            array("Boots","Tipo 11", "Boots", 178, 16),
            array("Wings","Tipo 12", "Wings, Orbs, Joyas y Mis.", 192, 16),
            array("Pets","Tipo 13", "Pets, Rings, Pendants y Mis.", 208, 16),
            array("Pots","Tipo 14", "Pots, Event, Mis.", 224, 16),
            array("Scrolls","Tipo 15", "Scrolls", 240, 16)
        );
$pagina2 = array(
            array("Quest1", "Quest 1", $quest1, 0, 16),
            array("Quest2", "Quest 2", $quest2, 1, 16),
            array("Quest3", "Quest 3", $quest3, 2, 16),
            array("Quest4", "Quest 4", $quest4, 3, 16),
            array("Quest5", "Quest 5", $quest5, 4, 16),
            array("Quest6", "Quest 6", $quest6, 5, 16),
            array("Quest7", "Quest 7", $quest7, 6, 16),
        );
$pagina2a= array(
            array("Quest1", "Quest 1", $quest1, 0, 16),
            array("Quest2", "Quest 2", $quest2, 1, 16),
        );
$pagina2b= array(
            array("Quest1", "Quest 1", $quest1, 0, 16),
            array("Quest2", "Quest 2", $quest2, 1, 16),
            array("Quest3", "Quest 3", $quest3, 2, 16),
            array("Quest4", "Quest 4", $quest4, 3, 16)
        );
$pagina3 = array(
            array("Skill", "Skill ".$skill_norm, "Skill ".$skill_norm, 0, 300,1),
            array("Skilltree", "Skill Tree", "Skill Tree", 300, 300)
        );
$pagina3a= array(
            array("Skill", "Skill ".$skill_norm, "Skill ".$skill_norm, 0, 300,1),
            array("Skilltree", "Skill Tree", "Skill Tree", 300, 100)
        );
$pagina3b= array(
            array("Skill", "Skill ".$skill_norm, "Skill ".$skill_norm, 0, 300,1),
            array("Skilltree", "Skill Tree", "Skill Tree", 300, 350)
        );

switch ($archivo) {
    case "ArcaBattleBootyMix":
        $conf = array(-1, 20, 1, 2, "ArcaBattleBootyMix.bmd","ArcaBattleBootyMix.bmd");
        $col  = array(
            array(  "1", 1,   4, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "2", 1,   8, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "3", 1,  12, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "4", 1,  16, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "5", 1,  20, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
        );
    break;
    case "AttributeVariation":
        $conf = array(-1, 3140, 1, 2, "AttributeVariation.bmd","AttributeVariation.bmd");
        $col  = array(
            array(  "1", 1,   4,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "2", 1,   8,  4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "3", 1,  12,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "4", 1,  16,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "5", 1,  20,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "6", 1,  24,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "7", 1,  28,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "8", 1,  32,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "9", 1,  36,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "10", 1,  40,  4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "11", 1,  44,  4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "12", 0,  48,256, 100, 2, 0, 1, 256, $col_t255),
            array(  "?", 1, 304,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "14", 0, 308,256, 100, 2, 0, 1, 256, $col_t255),
            array(  "?", 1, 564,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "16", 0, 568,256, 100, 2, 0, 1, 256, $col_t255),
            array(  "?", 1, 824,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "18", 0, 828,256, 100, 2, 0, 1, 256, $col_t255),
            array(  "?", 1,1084,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "20", 0,1088,256, 100, 2, 0, 1, 256, $col_t255),
            array(  "?", 1,1344,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "22", 0,1348,256, 100, 2, 0, 1, 256, $col_t255),
            array(  "?", 1,1604,  4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "24", 0,1608,256, 140, 2, 0, 1, 256, $col_t255),
            array( "25", 0,1864,256, 140, 2, 0, 1, 256, $col_t255),
            array( "26", 0,2120,256, 140, 2, 0, 1, 256, $col_t255),
            array( "27", 0,2376,256, 140, 2, 0, 1, 256, $col_t255),
            array( "28", 0,2632,256, 140, 2, 0, 1, 256, $col_t255),
            array( "29", 0,2888,256, 140, 2, 0, 1, 256, $col_t255),
        );
    break;
    case "BuffEffect":
        $buscar = 1;
        $conf = array(7, 158, 1, 2, "BuffEffect.bmd","BuffEffect.bmd");
        $col  = array(
            array( "C1", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1, 6, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 7, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C4", 1, 8, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Name", 0, 9, 51, 200, 2, 0, 1, 51, $col_t51),
            array( "C6", 1, 60, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 61, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "Info", 0, 62, 100, 400, 2, 0, 1, 100, $col_t100)
        );
    break;
    case "Credit":
        $buscar = 1;
        $conf = array(1, 33, 0, 0, "Credit.bmd","Credit.bmd");
        $col  = array(
            array( "C1", 1, 0, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "Info", 0, 1, 32, 400, 2, 0, 1, 32, $col_t32)
        );
    break;
    case "Dialog":
        $buscar = 1;
        $conf = array(0, 1024, 2, 0, "Dialog.bmd","Dialog.bmd");
        $col  = array(
            array( "Texto", 0, 0, 300, 300, 3, 0, 1, 300, $col_t300),
            array( "C2", 1, 300, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C3", 1, 304, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C4", 1, 308, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C5", 1, 312, 4, 20, 2, 0, 1, -1.2147483647, $col_1a2m),
            array( "C6", 1, 316, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Opcion 1", 0, 320, 64, 28, 3, 0, 1, 60, $col_t64),
            array( "Opcion 2", 0, 384, 64, 150, 3, 0, 1, 64, $col_t64),
            array( "Opcion 3", 0, 448, 64, 120, 3, 0, 1, 64, $col_t64),
            array( "C11", 0, 512, 64, 60, 3, 0, 1, 64, $col_t64),
            array( "C12", 0, 576, 64, 28, 3, 0, 1, 64, $col_t64),
            array( "C13", 0, 640, 64, 28, 3, 0, 1, 64, $col_t64),
            array( "C14", 0, 704, 64, 28, 3, 0, 1, 64, $col_t64),
            array( "C15", 0, 768, 64, 28, 3, 0, 1, 64, $col_t64),
            array( "C16", 0, 832, 64, 28, 3, 0, 1, 64, $col_t64),
            array( "C17", 0, 896, 64, 28, 3, 0, 1, 64, $col_t64),
            array( "C18", 0, 960, 64, 28, 3, 0, 1, 64, $col_t64)
        );
    break;
    case "Filter":
        $buscar = 1;
        $conf = array(0, 20, 1, 0, "Filter.bmd","Filter.bmd");
        $col  = array(
            array( "Texto", 0, 0, 20, 20, 3, 0, 1, 20, $col_t20)
        );
    break;
    case "FilterName":
        $buscar = 1;
        $conf = array(0, 20, 1, 0, "FilterName.bmd","FilterName.bmd");
        $col  = array(
            array( "C1", 0, 0, 20, 20, 3, 0, 1, 20, $col_t20)
        );
    break;
    case "gate":
        $conf = array(-1, 12, 0, 0, "Gate.bmd","Gate.bmd");
        $col  = array(
            array( "Flag"  , 1, 0, 1, 45, 2, 1, 0, 0.2, $col_flag,1),
            array( "Mapa"  , 1, 1, 1, 50, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X1"    , 1, 2, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y1"    , 1, 3, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X2"    , 1, 4, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y2"    , 1, 5, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Target", 1, 6, 2, 55, 2, 1, 0, 0.511, $col_desgate,1),
            array( "Dir"   , 1, 8, 1, 35, 2, 1, 0, 0.7, $col_dir,1),
            array( "Nivel" , 1, 10, 2, 45, 2, 1, 0, 0.4, $col_lvlgate,1)
        );
    break;
    case "gate2":
        $conf = array(-1, 9, 0, 0, "Gate.bmd","Gate.bmd");
        $col  = array(
            array( "Flag"  , 1, 0, 1, 45, 2, 1, 0, 0.2, $col_flag,1),
            array( "Mapa"  , 1, 1, 1, 50, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X1"    , 1, 2, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y1"    , 1, 3, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X2"    , 1, 4, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y2"    , 1, 5, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Target", 1, 6, 1, 55, 2, 1, 0, 0.511, $col_desgate,1),
            array( "Dir"   , 1, 7, 1, 35, 2, 1, 0, 0.7, $col_dir,1),
            array( "Nivel" , 1, 8, 1, 45, 2, 1, 0, 0.255, $col_lvlgate,1)
        );
    break;
    case "gate3":
        $conf = array(-1, 14, 1, 0, "Gate.bmd","Gate.bmd");
        $col  = array(
            array( "Flag"  , 1, 0, 1, 45, 2, 1, 0, 0.2, $col_flag,1),
            array( "Mapa"  , 1, 1, 1, 50, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X1"    , 1, 2, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y1"    , 1, 3, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X2"    , 1, 4, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y2"    , 1, 5, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Target", 1, 6, 2, 55, 2, 1, 0, 0.511, $col_desgate,1),
            array( "Dir"   , 1, 8, 1, 35, 2, 1, 0, 0.7, $col_dir,1),
            array( "Nivel" , 1, 10, 2, 45, 2, 1, 0, 0.65535, $col_lvlgate,1),
            array( "Nuevo" , 1, 12, 2, 45, 2, 1, 0, 0.65535, $col_0a655,0)
        );
    break;
    case "gate4":
        $conf = array(-1, 10, 2, 0, "Gate.bmd","Gate.bmd");
        $col  = array(
            array( "Flag"  , 1, 0, 1, 45, 2, 1, 0, 0.2, $col_flag,1),
            array( "Mapa"  , 1, 1, 1, 50, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X1"    , 1, 2, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y1"    , 1, 3, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "X2"    , 1, 4, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Y2"    , 1, 5, 1, 35, 2, 1, 0, 0.255, $col_0a255,1),
            array( "Target", 1, 6, 2, 55, 2, 1, 0, 0.511, $col_desgate,1),
            array( "Dir"   , 1, 8, 1, 35, 2, 1, 0, 0.7, $col_dir,1),
            array( "Nivel" , 1, 9, 1, 45, 2, 1, 0, 0.255, $col_lvlgate,1)
        );
    break;
    case "item":
        $buscar = 1;
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 84, 0, 0, "item.bmd","item.bmd");
        $col  = array(
            array( "Nombre" , 0,  0, 30,140, 2, 0, 1, 32, $col_t32),
            array( "Manos"  , 1, 30, 2, 50, 2, 1, 0, 0.65535, "Arma 1 o 2 manos<br /><b>0</b> una mano<br /><b>1</b> 2 manos"),
            array( "ItemLvl", 1, 32, 2, 48, 2, 1, 0, -1.65535, ""),
            array( "Slot"   , 1, 34, 1, 40, 2, 1, 1, -1.254, ""),
            array( "Skill"  , 1, 35, 1, 40, 2, 1, 0, 0.255, ""),
            array( "X"      , 1, 36, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Y"      , 1, 37, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMin", 1, 38, 1, 48, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMax", 1, 39, 1, 48, 2, 1, 0, 0.255, ""),
            array( "% Da&ntilde;o" , 1, 40, 1, 40, 2, 1, 0, 0.255, ""),
            array( "11"    , 1, 41, 1, 40, 2, 1, 0, 0.255, ""),
            array( "12"    , 1, 42, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Speed"    , 1, 43, 1, 40, 2, 1, 0, 0.255, ""),
            array( "14"    , 1, 44, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Duration", 1, 45, 1, 48, 2, 1, 0, 0.255, ""),
            array( "MagiDur", 1, 46, 1, 40, 2, 1, 0, 0.255, ""),
            array( "MagiPwr", 1, 47, 1, 48, 2, 1, 0, 0.255, ""),
            array( "Str"    , 1, 48, 2, 48, 2, 1, 0, 0.65535, ""),
            array( "Agi"    , 1, 50, 2, 48, 2, 1, 0, 0.65535, ""),
            array( "Ene"    , 1, 52, 2, 40, 2, 1, 0, 0.65535, ""),
            array( "Vit"    , 1, 54, 2, 40, 2, 1, 0, 0.65535, ""),
            array( "Com"    , 1, 56, 1, 40, 2, 1, 0, 0.255, ""),
            array( "23"    , 1, 57, 1, 40, 2, 1, 0, 0.255, ""),
            array( "ReqLvl"    , 1, 58, 2, 48, 2, 1, 0, 0.65535, ""),
            array( "25"    , 1, 60, 1, 40, 2, 1, 0, 0.255, ""),
            array( "26"    , 1, 61, 1, 40, 2, 1, 0, 0.255, ""),
            array( "27"    , 1, 62, 1, 40, 2, 1, 0, 0.255, ""),
            array( "28"    , 1, 63, 1, 40, 2, 1, 0, 0.255, ""),
            array( "29"    , 1, 64, 4, 40, 2, 1, 0, -1.2147483647, ""),
            array( "Type"   , 1, 68, 1, 40, 2, 1, 0, 0.255, ""),
            array( "DwSmGm" , 1, 69, 1, 40, 2, 1, 0, 0.255, ""),
            array( "DkBkBm" , 1, 70, 1, 40, 2, 1, 0, 0.255, ""),
            array( "FeMeHe" , 1, 71, 1, 40, 2, 1, 0, 0.255, ""),
            array( "MgDm"   , 1, 72, 1, 40, 2, 1, 0, 0.255, ""),
            array( "DlLe"   , 1, 73, 1, 40, 2, 1, 0, 0.255, ""),
            array( "SBsDiM" , 1, 74, 1, 40, 2, 1, 0, 0.255, ""),
            array( "37", 1, 75, 1, 40, 2, 1, 0, 0.255, ""),
            array( "38", 1, 76, 1, 40, 2, 1, 0, 0.255, ""),
            array( "39", 1, 77, 1, 40, 2, 1, 0, 0.255, ""),
            array( "40", 1, 78, 1, 40, 2, 1, 0, 0.255, ""),
            array( "41", 1, 79, 1, 40, 2, 1, 0, 0.255, ""),
            array( "42", 1, 80, 1, 40, 2, 1, 0, 0.255, ""),
            array( "43", 1, 81, 1, 40, 2, 1, 0, 0.255, ""),
            array( "44", 1, 82, 1, 20, 2, 1, 0, 0.255, ""),
            array( "45", 1, 83, 1, 20, 2, 1, 0, 0.255, "")
        );
    break;
    case "item2":
        $paginar =  1;
        $paginas =  $pagina1a;
        $conf = array(-1, 76, 2, 0, "item.bmd","item.bmd");
        $col  = array(
            array( "Nombre" , 0, 0, 30, 140, 2, 0, 1, 32, $col_t32),
            array( "Manos"  , 1, 30, 1, 50, 2, 1, 0, 0.255, "Arma 1 o 2 manos<br /><b>0</b> una mano<br /><b>1</b> 2 manos"),
            array( "C3"     , 1, 31, 1, 28, 2, 1, 1, 0.255, ""),
            array( "C3"     , 1, 32, 1, 28, 2, 1, 1, -1.254, ""),
            array( "C3"     , 1, 33, 1, 28, 2, 1, 0, 0.255, ""),
            array( "C4"     , 1, 34, 1, 20, 2, 1, 0, 0.255, ""),
            array( "C5"     , 1, 35, 1, 20, 2, 1, 0, 0.255, ""),
            array( "Skill"  , 1, 36, 1, 20, 2, 1, 0, 0.255, ""),
            array( "X"      , 1, 37, 1, 20, 2, 1, 0, 0.255, ""),
            array( "Y"      , 1, 38, 1, 28, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMin", 1, 39, 1, 28, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMax", 1, 40, 1, 20, 2, 1, 0, 0.255, ""),
            array( "% Da&ntilde;o" , 1, 41, 1, 20, 2, 1, 0, 0.255, ""),
            array( "12"     , 1, 42, 1, 20, 2, 1, 0, 0.255, ""),
            array( "13"     , 1, 43, 1, 20, 2, 1, 0, 0.255, ""),
            array( "14"     , 1, 44, 1, 20, 2, 1, 0, 0.255, ""),
            array( "15"     , 1, 45, 1, 28, 2, 1, 0, 0.255, ""),
            array( "16"     , 1, 46, 2, 20, 2, 1, 0, 0.65535, ""),
            array( "18"     , 1, 48, 2, 28, 2, 1, 0, 0.65535, ""),
            array( "19"     , 1, 50, 1, 28, 2, 1, 0, 0.255, ""),
            array( "19"     , 1, 51, 1, 28, 2, 1, 0, 0.255, ""),
            array( "20"     , 1, 52, 1, 20, 2, 1, 0, 0.255, ""),
            array( "19"     , 1, 53, 1, 28, 2, 1, 0, 0.255, ""),
            array( "21"     , 1, 54, 1, 20, 2, 1, 0, 0.255, ""),
            array( "21"     , 1, 55, 1, 20, 2, 1, 0, 0.255, ""),
            array( "22"     , 1, 56, 1, 20, 2, 1, 0, 0.255, ""),
            array( "23"     , 1, 57, 1, 20, 2, 1, 0, 0.255, ""),
            array( "24"     , 1, 58, 1, 28, 2, 1, 0, 0.255, ""),
            array( "24"     , 1, 59, 1, 28, 2, 1, 0, 0.255, ""),
            array( "25", 1, 60, 1, 20, 2, 1, 0, 0.255, ""),
            array( "26", 1, 61, 1, 20, 2, 1, 0, 0.255, ""),
            array( "27", 1, 62, 1, 20, 2, 1, 0, 0.255, ""),
            array( "28", 1, 63, 1, 20, 2, 1, 0, 0.255, ""),
            array( "29", 1, 64, 1, 20, 2, 1, 0, 0.255, ""),
            array( "29", 1, 65, 1, 20, 2, 1, 0, 0.255, ""),
            array( "29", 1, 66, 1, 20, 2, 1, 0, 0.255, ""),
            array( "29", 1, 67, 1, 20, 2, 1, 0, 0.255, ""),
            array( "30", 1, 68, 1, 20, 2, 1, 0, 0.255, ""),
            array( "31", 1, 69, 1, 20, 2, 1, 0, 0.255, ""),
            array( "32", 1, 70, 1, 20, 2, 1, 0, 0.255, ""),
            array( "33", 1, 71, 1, 20, 2, 1, 0, 0.255, ""),
            array( "34", 1, 72, 1, 20, 2, 1, 0, 0.255, ""),
            array( "35", 1, 73, 1, 20, 2, 1, 0, 0.255, ""),
            array( "36", 1, 74, 1, 20, 2, 1, 0, 0.255, ""),
            array( "37", 1, 75, 1, 20, 2, 1, 0, 0.255, "")
        );
    break;
    case "item3":
        $paginar =  1;
        $paginas =  $pagina1b;
        $conf = array(-1, 55, 2, 0, "item.bmd","item.bmd");
        $col  = array(
            array( "Nombre" , 0, 0, 30, 140, 2, 0, 1, 32, $col_t32),
            array( "Manos"  , 1, 30, 1, 50, 2, 1, 0, 0.255, "Arma 1 o 2 manos<br /><b>0</b> una mano<br /><b>1</b> 2 manos"),
            array( "C3"     , 1, 31, 1, 30, 2, 1, 1, 0.255, ""),
            array( "C4"     , 1, 32, 1, 30, 2, 1, 1, -1.254, ""),
            array( "C5"     , 1, 33, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C6"     , 1, 34, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C7"     , 1, 35, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Skill"  , 1, 36, 1, 30, 2, 1, 0, 0.255, ""),
            array( "X"      , 1, 37, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Y"      , 1, 38, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMin", 1, 39, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMax", 1, 40, 1, 40, 2, 1, 0, 0.255, ""),
            array( "% Da&ntilde;o" , 1, 41, 1, 40, 2, 1, 0, 0.255, ""),
            array( "12"     , 1, 42, 1, 30, 2, 1, 0, 0.255, ""),
            array( "13"     , 1, 43, 1, 30, 2, 1, 0, 0.255, ""),
            array( "14"     , 1, 44, 1, 30, 2, 1, 0, 0.255, ""),
            array( "15"     , 1, 45, 1, 30, 2, 1, 0, 0.255, ""),
            array( "16"     , 1, 46, 1, 30, 2, 1, 0, 0.255, ""),
            array( "17"     , 1, 47, 1, 30, 2, 1, 0, 0.255, ""),
            array( "18"     , 1, 48, 1, 30, 2, 1, 0, 0.255, ""),
            array( "19"     , 1, 49, 1, 30, 2, 1, 0, 0.255, ""),
            array( "20"     , 1, 50, 1, 30, 2, 1, 0, 0.255, ""),
            array( "21"     , 1, 51, 1, 30, 2, 1, 0, 0.255, ""),
            array( "22"     , 1, 52, 1, 30, 2, 1, 0, 0.255, ""),
            array( "23"     , 1, 53, 1, 30, 2, 1, 0, 0.255, ""),
            array( "24"     , 1, 54, 1, 30, 2, 1, 0, 0.255, "")
        );
    break;
    case "item4":
        $paginar =  1;
        $paginas =  $pagina1a;
        $conf = array(-1, 64, 2, 0, "item.bmd","item.bmd");
        $col  = array(
            array( "Nombre"         , 0, 0, 30, 140, 2, 0, 1, 32, $col_t32),
            array( "Manos"          , 1, 30, 1, 50, 2, 1, 0, 0.255, "Arma 1 o 2 manos<br /><b>0</b> una mano<br /><b>1</b> 2 manos"),
            array( "C3"             , 1, 31, 1, 30, 2, 1, 1, 0.255, ""),
            array( "C4"             , 1, 32, 1, 30, 2, 1, 1, -1.254, ""),
            array( "C5"                , 1, 33, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C6"             , 1, 34, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C7"             , 1, 35, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Skill"          , 1, 36, 1, 30, 2, 1, 0, 0.255, ""),
            array( "X"              , 1, 37, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Y"              , 1, 38, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMin"    , 1, 39, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMax"    , 1, 40, 1, 40, 2, 1, 0, 0.255, ""),
            array( "% Da&ntilde;o"     , 1, 41, 1, 40, 2, 1, 0, 0.255, ""),
            array( "12"             , 1, 42, 1, 30, 2, 1, 0, 0.255, ""),
            array( "13"             , 1, 43, 1, 30, 2, 1, 0, 0.255, ""),
            array( "14"             , 1, 44, 1, 30, 2, 1, 0, 0.255, ""),
            array( "15"             , 1, 45, 1, 30, 2, 1, 0, 0.255, ""),
            array( "16"             , 1, 46, 1, 30, 2, 1, 0, 0.255, ""),
            array( "17"             , 1, 47, 1, 30, 2, 1, 0, 0.255, ""),
            array( "18"             , 1, 48, 2, 30, 2, 1, 0, 0.65535, ""),
            array( "20"             , 1, 50, 1, 30, 2, 1, 0, 0.255, ""),
            array( "21"             , 1, 51, 1, 30, 2, 1, 0, 0.255, ""),
            array( "22"             , 1, 52, 3, 50, 2, 1, 0, 0.16581375, ""),
            array( "25"             , 1, 55, 1, 30, 2, 1, 0, 0.255, ""),
            array( "26"             , 1, 56, 1, 30, 2, 1, 0, 0.255, ""),
            array( "27"             , 1, 57, 1, 30, 2, 1, 0, 0.255, ""),
            array( "28"             , 1, 58, 1, 30, 2, 1, 0, 0.255, ""),
            array( "29"             , 1, 59, 1, 30, 2, 1, 0, 0.255, ""),
            array( "30"             , 1, 60, 1, 30, 2, 1, 0, 0.255, ""),
            array( "31"             , 1, 61, 1, 30, 2, 1, 0, 0.255, ""),
            array( "32"             , 1, 62, 1, 30, 2, 1, 0, 0.255, ""),
            array( "33"             , 1, 63, 1, 30, 2, 1, 0, 0.255, "")
        );
    break;
    case "items6":
        $buscar = 1;
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 84, 0, 0, "item.bmd","item.bmd");
        $col  = array(
            array( "Nombre"         , 0,  0, 30,140, 2, 0, 1, 32, $col_t32),
            array( "Manos"          , 1, 30, 2, 50, 2, 1, 0, 0.65535, "Arma 1 o 2 manos<br /><b>0</b> una mano<br /><b>1</b> 2 manos"),
            array( "ItemLvl"        , 1, 32, 2, 48, 2, 1, 0, -1.65535, ""),
            array( "Slot"           , 1, 34, 1, 40, 2, 1, 1, -1.254, ""),
            array( "Skill"          , 1, 36, 2, 40, 2, 1, 0, 0.65535, ""),
            array( "X"              , 1, 38, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Y"              , 1, 39, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMin"     , 1, 40, 1, 48, 2, 1, 0, 0.255, ""),
            array( "Da&ntilde;oMax"        , 1, 41, 1, 48, 2, 1, 0, 0.255, ""),
            array( "% Da&ntilde;o"         , 1, 42, 1, 40, 2, 1, 0, 0.255, ""),
            array( "10"            , 1, 43, 1, 40, 2, 1, 0, 0.255, ""),
            array( "11"            , 1, 44, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Speed"            , 1, 45, 1, 40, 2, 1, 0, 0.255, ""),
            array( "13"            , 1, 46, 1, 40, 2, 1, 0, 0.255, ""),
            array( "Duration"        , 1, 47, 1, 48, 2, 1, 0, 0.255, ""),
            array( "MagiDur"        , 1, 48, 1, 40, 2, 1, 0, 0.255, ""),
            array( "MagiPwr"        , 1, 49, 1, 48, 2, 1, 0, 0.255, ""),
            array( "Str"            , 1, 50, 2, 48, 2, 1, 0, 0.65535, ""),
            array( "Agi"            , 1, 52, 2, 48, 2, 1, 0, 0.65535, ""),
            array( "Ene"            , 1, 54, 2, 40, 2, 1, 0, 0.65535, ""),
            array( "Vit"            , 1, 56, 2, 40, 2, 1, 0, 0.65535, ""),
            array( "Com"            , 1, 58, 2, 40, 2, 1, 0, 0.255, ""),
            array( "ReqLvl"            , 1, 60, 2, 48, 2, 1, 0, 0.65535, ""),
            array( "23"            , 1, 62, 1, 40, 2, 1, 0, 0.255, ""),
            array( "24"            , 1, 63, 1, 40, 2, 1, 0, 0.255, ""),
            array( "25"            , 1, 64, 4, 40, 2, 1, 0, -1.2147483647, ""),
            array( "Type"           , 1, 68, 1, 40, 2, 1, 0, 0.255, ""),
            array( "DwSmGm"         , 1, 69, 1, 40, 2, 1, 0, 0.255, ""),
            array( "DkBkBm"         , 1, 70, 1, 40, 2, 1, 0, 0.255, ""),
            array( "FeMeHe"         , 1, 71, 1, 40, 2, 1, 0, 0.255, ""),
            array( "MgDm"           , 1, 72, 1, 40, 2, 1, 0, 0.255, ""),
            array( "DlLe"           , 1, 73, 1, 40, 2, 1, 0, 0.255, ""),
            array( "SBsDiM"         , 1, 74, 1, 40, 2, 1, 0, 0.255, ""),
            array( "New PJ"            , 1, 75, 1, 40, 2, 1, 0, 0.255, ""),
            array( "34"            , 1, 76, 1, 40, 2, 1, 0, 0.255, ""),
            array( "35"            , 1, 77, 1, 40, 2, 1, 0, 0.255, ""),
            array( "36"            , 1, 78, 1, 40, 2, 1, 0, 0.255, ""),
            array( "37"            , 1, 79, 1, 40, 2, 1, 0, 0.255, ""),
            array( "38"            , 1, 80, 1, 40, 2, 1, 0, 0.255, ""),
            array( "39"            , 1, 81, 1, 40, 2, 1, 0, 0.255, ""),
            array( "40"            , 1, 82, 1, 40, 2, 1, 0, 0.255, ""),
            array( "41"            , 1, 83, 1, 40, 2, 1, 0, 0.255, "")
        );
    break;
    case "ItemAddOption":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 16, 0, 0, "itemaddoption.bmd","itemaddoption.bmd");
        $col  = array(
            array( "Id"         , 1,  8, 4, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "Option1"    , 1,  0, 2, 50, 2, 1, 0, 0.65535, $iao_tip1),
            array( "Val.Option1", 1,  2, 2, 70, 2, 1, 0, 0.65535, $col_0a655),
            array( "Option2"    , 1,  4, 2, 50, 2, 1, 0, 0.65535, $col_0a655),
            array( "Val.Option2", 1,  6, 2, 70, 2, 1, 0, 0.65535, $col_0a655),
            array( "Time"       , 1, 12, 4, 50, 2, 1, 0, 0.65535, $iaotime),
        );
    break;
    case "ItemAddOption2":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 10, 0, 0, "itemaddoption.bmd","itemaddoption.bmd");
        $col  = array(
            array( "Id"         , 1,  8, 2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "Option1"    , 1,  0, 2, 50, 2, 1, 0, 0.65535, $iao_tip1),
            array( "Val.Option1", 1,  2, 2, 70, 2, 1, 0, 0.65535, $col_0a655),
            array( "Option2"    , 1,  4, 2, 50, 2, 1, 0, 0.65535, $col_0a655),
            array( "Val.Option2", 1,  6, 2, 70, 2, 1, 0, 0.65535, $col_0a655)
        );
    break;
    case "ItemAddOption3":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 12, 0, 0, "itemaddoption.bmd","itemaddoption.bmd");
        $col  = array(
            array( "Id"         , 1,  8, 2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "Option1"    , 1,  0, 2, 50, 2, 1, 0, 0.65535, $iao_tip1),
            array( "Val.Option1", 1,  2, 2, 70, 2, 1, 0, 0.65535, $col_0a655),
            array( "Option2"    , 1,  4, 2, 50, 2, 1, 0, 0.65535, $col_0a655),
            array( "Val.Option2", 1,  6, 2, 70, 2, 1, 0, 0.65535, $col_0a655),
            array( "?", 1, 10, 2, 70, 2, 1, 0, 0.65535, $col_0a655)
        );
    break;
    case "itemleveltooltip":
        $conf = array(-1, 102, 0, 0, "itemleveltooltip.bmd","itemleveltooltip.bmd");
        $col  = array(
            array( "C1" , 1,   0, 2, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C2" , 0,   2, 64, 150, 2, 0, 1, 49, $col_t64),
            array( "C3" , 1,  66, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C5" , 1,  68, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C7" , 1,  70, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C9" , 1,  72, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C11", 1,  74, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C13", 1,  76, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C15", 1,  78, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C17", 1,  80, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C19", 1,  82, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C21", 1,  84, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C23", 1,  86, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C25", 1,  88, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C27", 1,  90, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C29", 1,  92, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C31", 1,  94, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C33", 1,  96, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C35", 1,  98, 2, 30, 2, 1, 1, -1.254, ""),
            array( "C37", 1, 100, 2, 30, 2, 1, 1, -1.254, ""),
        );
    break;
    case "itemsetoption":
        $conf = array(-1, 109, 2, 0, "itemsetoption.bmd","itemsetoption.bmd");
        $col  = array(
            array( "Name", 0, 0, 64, 200, 2, 0, 1, 64, $col_t64),
            array( "2-1 Opt", 1, 64, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.2-1", 1, 76, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "2-2 Opt", 1, 65, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.2-2", 1, 77, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "3-1 Opt", 1, 66, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.3-1", 1, 78, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "3-2 Opt", 1, 67, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.3-2", 1, 79, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "4-1 Opt", 1, 68, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.4-1", 1, 80, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "4-2 Opt", 1, 69, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.4-2", 1, 81, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "5-1 Opt", 1, 70, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.5-1", 1, 82, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "5-2 Opt", 1, 71, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.5-2", 1, 83, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "6-1 Opt", 1, 72, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.6-1", 1, 84, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "6-2 Opt", 1, 73, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.6-2", 1, 85, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "7-1 Opt", 1, 74, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.7-1", 1, 86, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "7-2 Opt", 1, 75, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.7-2", 1, 87, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 88, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 89, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 90, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 91, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 92, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 1", 1, 93, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 1", 1, 98, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 2", 1, 94, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 2", 1, 99, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 3", 1, 95, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 3", 1, 100, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 4", 1, 96, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 4", 1, 101, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 5", 1, 97, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 5", 1, 102, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "DW", 1, 103, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "DK", 1, 104, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "ELF", 1, 105, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "MG", 1, 106, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "DL", 1, 107, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "SUM", 1, 108, 1, 30, 2, 1, 1, -1.254, $col_1a254)
        );
    break;
    case "itemsetoption6":
        $conf = array(-1, 110, 1, 0, "itemsetoption.bmd","itemsetoption.bmd");
        $col  = array(
            array( "Name"   , 0,  0, 64, 200, 2, 0, 1, 64, $col_t64),
            array( "2-1 Opt", 1, 64, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.2-1", 1, 76, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "2-2 Opt", 1, 65, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.2-2", 1, 77, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "3-1 Opt", 1, 66, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.3-1", 1, 78, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "3-2 Opt", 1, 67, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.3-2", 1, 79, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "4-1 Opt", 1, 68, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.4-1", 1, 80, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "4-2 Opt", 1, 69, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.4-2", 1, 81, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "5-1 Opt", 1, 70, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.5-1", 1, 82, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "5-2 Opt", 1, 71, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.5-2", 1, 83, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "6-1 Opt", 1, 72, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.6-1", 1, 84, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "6-2 Opt", 1, 73, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.6-2", 1, 85, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "7-1 Opt", 1, 74, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.7-1", 1, 86, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "7-2 Opt", 1, 75, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val.7-2", 1, 87, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 88, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 89, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 90, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 91, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "?", 1, 92, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 1", 1, 93, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 1", 1, 98, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 2", 1, 94, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 2", 1, 99, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 3", 1, 95, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 3", 1, 100, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 4", 1, 96, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 4", 1, 101, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Full 5", 1, 97, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "Val Ful 5", 1, 102, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "DW", 1, 103, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "DK", 1, 104, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "ELF", 1, 105, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "MG", 1, 106, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "DL", 1, 107, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "SUM", 1, 108, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "NewPJ", 1, 109, 1, 30, 2, 1, 1, -1.254, $col_1a254)
        );
    break;
    case "itemsetoption2":
        $conf = array(-1, 76, 2, 0, "itemsetoption.bmd","itemsetoption.bmd");
        $col  = array(
            array( "C1", 0, 0, 32, 200, 2, 0, 1, 64, $col_t64),
            array( "C2", 1, 32, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 33, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 34, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 35, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 36, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 37, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 38, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 39, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 40, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 41, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 42, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 43, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 44, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 45, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 46, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 47, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 48, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 49, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 50, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 51, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 52, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 53, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 54, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 55, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 56, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 57, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 58, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 59, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 60, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 61, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 62, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 63, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C2", 1, 64, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C3", 1, 65, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C4", 1, 66, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C5", 1, 67, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C6", 1, 68, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "C7", 1, 69, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C8", 1, 70, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C9", 1, 71, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C10", 1, 72, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C11", 1, 73, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C12", 1, 74, 1, 30, 2, 1, 1, -1.254, $col_1a254),
            array( "C13", 1, 75, 1, 30, 2, 1, 1, -1.254, $col_1a254)
        );
    break;
    case "itemsettype":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 4, 2, 0, "itemsettype.bmd","itemsettype.bmd");
        $col  = array(
            array( "Link a", 1, 0, 1, 40, 2, 1, 0, 0.255, $col_0a255),
            array( "Link b", 1, 1, 1, 40, 2, 1, 0, 0.255, $col_0a255),
            array( "mixItemLevel a", 1, 2, 1, 80, 2, 1, 0, 0.255, $col_0a255),
            array( "mixItemLevel b", 1, 3, 1, 80, 2, 1, 0, 0.255, $col_0a255)
        );
    break;
    case "itemsettype2":
        $paginar =  1;
        $paginas =  $pagina1a;
        $conf = array(-1, 4, 2, 0, "itemsettype.bmd","itemsettype.bmd");
        $col  = array(
            array( "Link a", 1, 0, 1, 30, 2, 1, 1, -1.254, $col_0a255),
            array( "Link b", 1, 1, 1, 30, 2, 1, 1, -1.254, $col_0a255),
            array( "mixItemLevel a", 1, 2, 1, 30, 2, 1, 1, -1.254, $col_0a255),
            array( "mixItemLevel b", 1, 3, 1, 30, 2, 1, 1, -1.254, $col_0a255)
        );
    break;
    case "itemtooltip":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(2, 122, 1, 0, "itemtooltip.bmd","itemtooltip.bmd");
        $col  = array(
            array( "C1", 1,   0,  2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1,   2,  2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 0,   4, 64, 350, 2, 0, 1, 258, $col_t64),
            array( "C4", 1,  68,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C5", 1,  70,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C6", 1,  72,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C7", 1,  74,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C8", 1,  76,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C9", 1,  78,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C10", 1,  80,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C11", 1,  82,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C12", 1,  84,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C13", 1,  86,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C14", 1,  88,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C15", 1,  90,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C16", 1,  92,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C17", 1,  94,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C18", 1,  96,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C19", 1,  98,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C20", 1, 100,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C21", 1, 102,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C22", 1, 104,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C23", 1, 106,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C24", 1, 108,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C25", 1, 110,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C26", 1, 112,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C27", 1, 114,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C28", 1, 116,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C29", 1, 118,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
            array( "C30", 1, 120,  2, 30, 2, 1, 1, -1.65534, $col_1a654),
        );
    break;
    case "itemtooltip2":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(2, 124, 2, 0, "itemtooltip.bmd","itemtooltip.bmd");
        $col  = array(
            array( "C1", 1,   0,  2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1,   2,  2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 0,   4, 64, 350, 2, 0, 1, 258, $col_t64),
            array( "C4", 1,  68,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C5", 1,  70,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C6", 1,  72,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C7", 1,  74,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C8", 1,  76,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C9", 1,  78,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C10", 1,  80,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C11", 1,  82,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C12", 1,  84,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C13", 1,  86,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C14", 1,  88,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C15", 1,  90,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C16", 1,  92,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C17", 1,  94,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C18", 1,  96,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C19", 1,  98,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C20", 1, 100,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C21", 1, 102,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C22", 1, 104,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C23", 1, 106,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C24", 1, 108,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C25", 1, 110,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C26", 1, 112,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C27", 1, 114,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C28", 1, 116,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C29", 1, 118,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
            array( "C30", 1, 120,  2, 30, 2, 1, 1, -1.65535, $col_1a654),
        );
    break;
    case "itemtooltiptext":
        $conf = array(1, 260, 1, 0, "itemtooltiptext.bmd","itemtooltiptext.bmd");
        $col  = array(
            array( "C1", 1, 0, 2, 30, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 0, 2, 258, 350, 2, 0, 1, 258, $col_t64),
        );
    break;
    case "JewelOfHarmonyOption":
        $conf = array(-1, 180, 0, 0, "JewelOfHarmonyOption.bmd","JewelOfHarmonyOption.bmd");
        $col  = array(
            array( "Options", 1, 0, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Name", 0, 4, 64, 170, 2, 0, 1, 64, $col_t64),
            array( "lvl 0", 1, 68, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 0", 1, 124, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 1", 1, 72, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 1", 1, 128, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 2", 1, 76, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 2", 1, 132, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 3", 1, 80, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 3", 1, 136, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 4", 1, 84, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 4", 1, 140, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 5", 1, 88, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 5", 1, 144, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 6", 1, 92, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 6", 1, 148, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 7", 1, 96, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 7", 1, 152, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 8", 1, 100, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 8", 1, 156, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 9", 1, 104, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 9", 1, 160, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 10", 1, 108, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 10", 1, 164, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 11", 1, 112, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 11", 1, 168, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 12", 1, 116, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 12", 1, 172, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "lvl 13", 1, 120, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "req Zen 13", 1, 176, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "JewelOfHarmonySmelt":
        $paginar =  1;
        $paginas =  $pagina1;
        $conf = array(-1, 68, 0, 0, "JewelOfHarmonySmelt.bmd","JewelOfHarmonySmelt.bmd");
        $col  = array(
            array( "C4", 1, 4, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C5", 1, 5, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C6", 1, 6, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C7", 1, 7, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C8", 1, 8, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C9", 1, 9, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C10", 1, 10, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C11", 1, 11, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C12", 1, 12, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C13", 1, 13, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C14", 1, 14, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C15", 1, 15, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C16", 1, 16, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C17", 1, 17, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C18", 1, 18, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C19", 1, 19, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C20", 1, 20, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C21", 1, 21, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C22", 1, 22, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C23", 1, 23, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C24", 1, 24, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C25", 1, 25, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C26", 1, 26, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C27", 1, 27, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C28", 1, 28, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C29", 1, 29, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C30", 1, 30, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C31", 1, 31, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C32", 1, 32, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C33", 1, 33, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C34", 1, 34, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C35", 1, 35, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C36", 1, 36, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C37", 1, 37, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C38", 1, 38, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C39", 1, 39, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C40", 1, 40, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C41", 1, 41, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C42", 1, 42, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C43", 1, 43, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C44", 1, 44, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C45", 1, 45, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C46", 1, 46, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C47", 1, 47, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C48", 1, 48, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C49", 1, 49, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C50", 1, 50, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C51", 1, 51, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C52", 1, 52, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C53", 1, 53, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C54", 1, 54, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C55", 1, 55, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C56", 1, 56, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C57", 1, 57, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C58", 1, 58, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C59", 1, 59, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C60", 1, 60, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C61", 1, 61, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C62", 1, 62, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C63", 1, 63, 1, 30, 2, 1, 0, 0.255, ""),
            array( "C64", 1, 64, 4, 30, 2, 1, 0, 0.255, "")
        );
    break;
    case "MapCharacters":
        $conf = array(-1, 4, 0, 0, "MapCharacters.bmd","MapCharacters.bmd");
        $col  = array(
            array( "C4", 1,  4, 4, 50, 2, 1, 0, 0.255, "")
        );
    break;
    case "MasterSkillTree":
        $conf = array(-1, 5, 1, 0, "MasterSkillTree.bmd","MasterSkillTree.bmd",1,0,45);
        $col  = array(
            array( "C1", 1, 0, 1, 20, 2, 1, 1, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 35, 2, 1, 1, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 35, 2, 1, 1, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 35, 2, 1, 1, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 35, 2, 1, 1, 0.255, $col_0a255)
        );
        $conf2 = array(-1, 132, 0, 0, "MasterSkillTree.bmd","MasterSkillTree.bmd");
        $col2  = array(
            array( "C1", 1, 45, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C2", 1, 49, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C3", 1, 53, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C4", 1, 57, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C5", 1, 61, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C6", 1, 65, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C7", 1, 69, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8", 1, 73, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C9", 1, 77, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C10", 1, 81, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C11", 1, 85, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C12", 1, 89, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C13", 1, 93, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C14", 1, 97, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C15", 1, 101, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C16", 1, 105, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C17", 1, 109, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "18", 1, 113, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "19", 1, 117, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "20", 1, 121, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "21", 1, 125, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "22", 1, 129, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "23", 1, 133, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "24", 1, 137, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "25", 1, 141, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "26", 1, 145, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "27", 1, 149, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "28", 1, 153, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "29", 1, 157, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "30", 1, 161, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "31", 1, 165, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "32", 1, 169, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "33", 1, 173, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "MasterSkillTree2":
        $conf = array(-1, 132, 0, 0, "MasterSkillTree.bmd","MasterSkillTree.bmd");
        $col  = array(
            array( "C1", 1, 45, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C2", 1, 49, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C3", 1, 53, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C4", 1, 57, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C5", 1, 61, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C6", 1, 65, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C7", 1, 69, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8", 1, 73, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C9", 1, 77, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C10", 1, 81, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C11", 1, 85, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C12", 1, 89, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C13", 1, 93, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C14", 1, 97, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C15", 1, 101, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C16", 1, 105, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C17", 1, 109, 4, 35, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "18", 1, 113, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "19", 1, 117, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "20", 1, 121, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "21", 1, 125, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "22", 1, 129, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "23", 1, 133, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "24", 1, 137, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "25", 1, 141, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "26", 1, 145, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "27", 1, 149, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "28", 1, 153, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "29", 1, 157, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "30", 1, 161, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "31", 1, 165, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "32", 1, 169, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "33", 1, 173, 4, 20, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "MasterSkillTooltip":
        $conf = array(-1, 616, 2, 0, "MasterSkillTooltip.bmd","MasterSkillTooltip.bmd");
        $col  = array(
            array( "0"        , 1,   0,   4,  30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "1"        , 1,   4,   1,  30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "2"        , 0,   6,  64, 180, 2, 0, 1,  64, $col_1a2m),
            array( "3"        , 0,  70, 256, 350, 2, 0, 1, 256, $col_1a2m),
            array( "4"        , 0, 326, 290, 300, 2, 0, 1, 290, $col_1a2m),
        );
    break;
    case "MasterSkillTreeData":
        $conf = array(-1, 24, 0, 0, "MasterSkillTreeData.bmd","MasterSkillTreeData.bmd");
        $col  = array(
            array( "0"        , 1, 0, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "1"        , 1, 1, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "2"        , 1, 2, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "3"        , 1, 3, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "4"        , 1, 4, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "5"        , 1, 5, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "6"        , 1, 6, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "7"        , 1, 7, 1, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "8"        , 1, 8, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "12"        , 1, 12, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "16"        , 1, 16, 4, 50, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "20"        , 1, 20, 1, 40, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "21"        , 1, 21, 1, 40, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "22"        , 1, 22, 1, 40, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "23"        , 1, 23, 1, 40, 2, 1, 1, -1.2147483647, $col_1a2m),
        );
    break;
    case "message":
        $buscar = 1;
        $conf = array(2, 158, 1, 2, "message.wtf","message.wtf");
        $col  = array(
            array( "C1", 1, 4, 2, 45, 2, 1, 0, 0.65535, ""),
            array( "C2", 1, 6, 1, 30, 2, 1, 0, 0.255, ""),
            array( "Texto", 0, 9, 255, 200, 2, 0, 1, 255, "")
        );
    break;
    case "Minimap":
        $buscar = 1;
        $conf = array(4, 48, 0, 0, "Minimap.bmd","Minimap.bmd");
        $col  = array(
            array( "Type", 1, 0, 4, 45, 2, 1, 0, 0.2, "<b>0</b> no load<br /><b>1</b> NPC<br /><b>2</b> Gate"),
            array( "X", 1, 4, 4, 30, 2, 1, 0, 0.65535, ""),
            array( "Y", 1, 8, 4, 30, 2, 1, 0, 0.255, ""),
            array( "Rotation Angle", 1, 12, 4, 100, 2, 1, 0, 0.359, ""),
            array( "Text", 0, 16, 32, 200, 2, 0, 1, 36, "")
        );
    break;
    case "Minimap2":
        $buscar = 1;
        $conf = array(4, 116, 1, 0, "Minimap.bmd","Minimap.bmd");
        $col  = array(
            array( "Type", 1, 0, 4, 45, 2, 1, 0, 0.2, "<b>0</b> no load<br /><b>1</b> NPC<br /><b>2</b> Gate"),
            array( "X", 1, 4, 4, 30, 2, 1, 0, 0.65535, ""),
            array( "Y", 1, 8, 4, 30, 2, 1, 0, 0.255, ""),
            array( "Rotation Angle", 1, 12, 4, 100, 2, 1, 0, 0.359, ""),
            array( "Text", 0, 16, 100, 200, 2, 0, 1, 36, "")
        );
    break;
    case "mix":
        $conf = array(-1, 656, 1, 1, "mix.bmd","mix.bmd");
        $col  = array(
            array(          "MixId", 1,  56, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array(       "HeadCode", 1,  60, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m)
    );
    break;
    case "MonsterSkill":
        $conf = array(-1, 48, 0, 2, "MonsterSkill.bmd","MonsterSkill.bmd");
        $col  = array(
            array( "Id Monter", 1, 4, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Type1", 1, 28, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Uni1", 1, 8, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Type2", 1, 32, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Uni2", 1, 12, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Type3", 1, 36, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Uni3", 1, 16, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Type4", 1, 40, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Uni4", 1, 20, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Type5", 1, 44, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Uni5", 1, 24, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "MonsterSkill2":
        $conf = array(-1, 28, 2, 2, "MonsterSkill.bmd","MonsterSkill.bmd");
        $col  = array(
            array( "C1" , 1,  4, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C2" , 1,  8, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C5" , 1, 12, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C7" , 1, 16, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C7" , 1, 20, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C7" , 1, 24, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8" , 1, 28, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "movereq":
        $conf = array(-1, 80, 1, 2, "movereq.bmd","movereq.bmd");
        $col  = array(
            array(             "Index", 1,  4,  4,  30, 2, 1, 0, 0.255, $col_0a255, 1),
            array(  "Nombre en Server", 0,  8, 32, 160, 2, 0, 1, 32, $col_t32, 1),
            array( "Nombre en Cliente", 0, 40, 32, 160, 2, 0, 1, 32, $col_t32, 1),
            array(               "Zen", 1, 76,  4,  60, 2, 1, 0, 0.16777215, $col_0a167, 1),
            array(           "Lvl Req", 1, 72,  4,  30, 2, 1, 0, 0.65535, $col_0a655, 1),
            array(              "Gate", 1, 80,  4,  30, 2, 1, 0, 0.16777215, $col_0a167, 1)
        );
    break;
    case "movereq2":
        $conf = array(-1, 84, 0, 2, "movereq.bmd","movereq.bmd");
        $col  = array(
            array(             "Index", 1,  4,  4,  30, 2, 1, 0, 0.65535, $col_0a255, 1),
            array(  "Nombre en Server", 0,  8, 32, 160, 2, 0, 1, 32, $col_t32, 1),
            array( "Nombre en Cliente", 0, 40, 32, 160, 2, 0, 1, 32, $col_t32, 1),
            array(               "Zen", 1, 80,  4,  30, 2, 1, 0, 0.16777215, $col_0a167, 1),
            array(           "Lvl Req", 1, 72,  4,  30, 2, 1, 0, 0.65535, $col_0a655, 1),
            array(             "Nuevo", 1, 76,  4,  60, 2, 1, 0, 0.16777215, $col_0a167, 0),
            array(              "Gate", 1, 84,  4,  30, 2, 1, 0, 0.16777215, $col_0a167, 1)
        );
    break;
    case "NPCDialogue":
        $conf = array(-1, 88, 2, 0, "NPCDialogue.bmd","NPCDialogue.bmd");
        $col  = array(
            array( "C1", 1,  0,  2,  40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1,  2,  2,  40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 1,  4,  4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C4", 1,  8,  4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C5", 1,  12, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C6", 1,  16, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C7", 1,  20, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C8", 1,  24, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C9", 1,  28, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C10", 1,  32, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C11", 1,  36, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C12", 1,  40, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C13", 1,  44, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C14", 1,  48, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C15", 1,  52, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C16", 1,  66, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C17", 1,  60, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C18", 1,  64, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C19", 1,  68, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C20", 1,  72, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C21", 1,  76, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C22", 1,  80, 4,  40, 2, 1, 0, 0.16777215, $col_0a167),
            array("C23", 1,  84, 4,  40, 2, 1, 0, 0.16777215, $col_0a167)
        );
    break;
    case "NpcName":
        $conf = array(2, 100, 0, 0, "NpcName.txt","NpcName.txt");
        $col  = array(
            array( "Monster Index", 1,  0,  2,  80, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1,  2,  2,  40, 2, 1, 0, 0.65535, $col_0a655),
            array( "Nombre", 0,  4,  4,  40, 2, 0, 1, 32, $col_t32),
        );
    break;
    case "PentagramMixNeedSource":
        $conf = array(-1, 92, 1, 2, "PentagramMixNeedSource.bmd","PentagramMixNeedSource.bmd");
        $col  = array(
            array(  "C1", 1,  4, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C2", 1,  8, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C3", 1, 12, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C4", 1, 16, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C5", 1, 20, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C6", 1, 24, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C7", 1, 28, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C8", 1, 32, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "C9", 1, 36, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C10", 1, 40, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C11", 1, 44, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C12", 1, 48, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C13", 1, 52, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C14", 1, 56, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C15", 1, 60, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C16", 1, 64, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C17", 1, 68, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C18", 1, 72, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C19", 1, 76, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C20", 1, 80, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C21", 1, 84, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C22", 1, 88, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
            array( "C23", 1, 92, 4, 50, 2, 1, 0, 0.16777215, $col_0a167),
        );
    break;
    case "PentagramJewelOptionValue":
        $conf = array(0, 372, 0, 2, "PentagramJewelOptionValue.bmd","PentagramJewelOptionValue.bmd");
        $col  = array(
            array( "Text", 0, 116,256, 260, 2, 0, 1, 256, $col_t256),
            array(  "1", 1,   4, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "2", 1,   8, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "3", 1,  12, 2, 32, 2, 1, 0, 0.65535, $col_0a655),
            array(  "4", 1,  14, 2, 32, 2, 1, 0, 0.65535, $col_0a655),
            array(  "5", 1,  16, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "6", 1,  20, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "7", 1,  24, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "8", 1,  28, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array(  "9", 1,  32, 4, 32, 2, 1, 0, 0.16777215, $col_0a167),
            array( "10", 1,  36, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "11", 1,  40, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "12", 1,  44, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "13", 1,  48, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "14", 1,  52, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "15", 1,  56, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "16", 1,  60, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "17", 1,  64, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "18", 1,  68, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "19", 1,  72, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "20", 1,  76, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "21", 1,  80, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "22", 1,  84, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "23", 1,  88, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "24", 1,  92, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "25", 1,  96, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "26", 1, 100, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "27", 1, 104, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "28", 1, 108, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
            array( "29", 1, 112, 4, 40, 2, 1, 0, 0.16777215, $col_0a167),
        );
    break;
    case "pet":
        $conf = array(-1, 416, 1, 0, "pet.bmd","pet.bmd");
        $col  = array(
            array( "C1", 1, 12, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C2", 1, 16, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C3", 1, 20, 1, 60, 2, 1, 0, 0.16777215, ""),
            array( "C4", 1, 21, 1, 60, 2, 1, 0, 0.16777215, ""),
            array( "C5", 1, 22, 1, 60, 2, 1, 0, 0.16777215, ""),
            array( "C6", 1, 23, 1, 60, 2, 1, 0, 0.16777215, ""),
            array( "C7", 1, 24, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C8", 1, 28, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C9", 1, 32, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C10", 1, 36, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C11", 1, 40, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C12", 1, 231, 2, 60, 2, 1, 0, 0.16777215, ""),
            array( "C12", 1, 233, 2, 60, 2, 1, 0, 0.16777215, ""),
            array( "C13", 1, 235, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C14", 1, 239, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C15", 1, 243, 4, 60, 2, 1, 0, 0.16777215, ""),
            array( "C16", 1, 247, 4, 60, 2, 1, 0, 0.16777215, "")
        );
    break;
    case "petdata":
        $conf = array(-1, 48, 0, 0, "PetData.bmd","PetData.bmd");
        $col  = array(
            array(  "1", 1,  0, 4, 42, 2, 1, 0, 0.16777215, ""),
            array(  "2", 1,  4, 4, 42, 2, 1, 0, 0.16777215, ""),
            array(  "3", 1,  8, 1, 42, 2, 1, 1, -1.254, ""),
            array(  "4", 1,  9, 1, 42, 2, 1, 0, 0.16777215, ""),
            array(  "5", 1, 10, 1, 42, 2, 1, 0, 0.16777215, ""),
            array(  "6", 1, 11, 1, 42, 2, 1, 0, 0.16777215, ""),
            array(  "7", 1, 12, 1, 42, 2, 1, 0, 0.16777215, ""),
            array(  "8", 1, 13, 1, 42, 2, 1, 0, 0.16777215, ""),
            array(  "9", 1, 14, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "10", 1, 15, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "11", 1, 16, 4, 42, 2, 1, 0, 0.16777215, ""),
            array( "12", 1, 20, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "13", 1, 21, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "14", 1, 22, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "15", 1, 23, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "16", 1, 24, 4, 42, 2, 1, 0, 0.16777215, ""),
            array( "17", 1, 28, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "18", 1, 29, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "19", 1, 30, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "20", 1, 31, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "21", 1, 32, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "22", 1, 33, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "23", 1, 34, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "24", 1, 35, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "25", 1, 36, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "26", 1, 37, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "27", 1, 38, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "28", 1, 39, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "29", 1, 40, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "30", 1, 41, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "31", 1, 42, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "32", 1, 43, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "33", 1, 44, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "34", 1, 45, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "35", 1, 46, 1, 42, 2, 1, 0, 0.16777215, ""),
            array( "36", 1, 47, 1, 42, 2, 1, 0, 0.16777215, ""),
        );
    break;
    case "Quest2":
        $conf = array(3, 744, 0, 0, "quest.bmd","quest.bmd");
        $col  = array(
            array( "C1", 1, 0, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 1, 4, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C4", 0, 6, 32, 160, 2, 0, 1, 32, $col_t32)
        );
        $conf2= array(-1, 24, 0, 2, "quest.bmd","quest.bmd",1,744,384,38);
        $col2 = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 2, 28, 2, 1, 0, 0.65535, $col_0a65535),
            array( "C4", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 10, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 11, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 12, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 13, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 14, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C14", 1, 16, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C15", 1, 18, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 20, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C17", 1, 22, 2, 45, 2, 1, 0, 0.65535, $col_0a655)
        );
        $conf3= array(-1, 20, 0, 1, "quest.bmd","quest.bmd",1,744,320,424);
        $col3 = array(
            array( "C18", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C19", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C20", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C21", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C22", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C23", 1, 8, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C24", 1, 12, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C25", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "Quest":
        $conf = array(3, 712, 0, 0, "quest.bmd","quest.bmd");
        $col  = array(
            array( "C1", 1, 0, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 1, 4, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C4", 0, 6, 32, 160, 2, 0, 1, 32, $col_t32)
        );
        $conf2 = array(-1, 22, 0, 2, "quest.bmd","quest.bmd",1,712,352,38);
        $col2  = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 2, 28, 2, 1, 0, 0.65535, $col_0a65535),
            array( "C4", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 10, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 11, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 12, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 13, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C14", 1, 14, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C15", 1, 16, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 18, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C17", 1, 20, 2, 45, 2, 1, 0, 0.65535, $col_0a655)
        );
        $conf3 = array(-1, 20, 0, 2, "quest.bmd","quest.bmd",1,712,320,392);
        $col3  = array(
            array( "C18", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C19", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C20", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C21", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C22", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C23", 1, 8, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C24", 1, 12, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C25", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "Quest3":
        $paginar = 1;
        $paginas = $pagina2;
        $conf = array(-1, 20, 0, 2, "quest.bmd","quest.bmd",1,712,320,392);
        $col  = array(
            array( "C18", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C19", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C20", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C21", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C22", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C23", 1, 8, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C24", 1, 12, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C25", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "questa":
        $conf = array(3, 584, 0, 2, "quest.bmd","quest.bmd", 1);
        $col  = array(
            array( "C1", 1, 0, 1, 40, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "C2", 1, 1, 1, 40, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "C3", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "C4", 0, 5, 32, 160, 2, 0, 1, 32, $col_t32)
        );
        $conf2= array(-1, 18, 0, 2, "quest.bmd","quest.bmd",1,584,288,38);
        $col2 = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 10, 2, 28, 2, 1, 0, 0.65535, $col_0a255),
            array( "C13", 1, 12, 2, 28, 2, 1, 0, 0.65535, $col_0a255),
            array( "C15", 1, 14, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 16, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
        );
        $conf3= array(-1, 16, 0, 1, "quest.bmd","quest.bmd",1,584,320,328);
        $col3 = array(
            array( "C18", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C19", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C20", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C22", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C24", 1, 6, 2, 60, 2, 1, 0, 0.65535, $col_0a655),
            array( "C24", 1, 8, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C20", 1, 12, 4, 45, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "quest2a":
        $paginar = 1;
        $paginas = $pagina2a;
        $conf = array(-1, 18, 0, 2, "quest.bmd","quest.bmd",1,584,288,38);
        $col  = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 10, 2, 28, 2, 1, 0, 0.65535, $col_0a255),
            array( "C13", 1, 12, 2, 28, 2, 1, 0, 0.65535, $col_0a255),
            array( "C15", 1, 14, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 16, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
        );
    break;
    case "quest3a":
        $paginar = 1;
        $paginas = $pagina2a;
        $conf = array(-1, 16, 0, 1, "quest.bmd","quest.bmd",1,584,320,328);
        $col  = array(
            array( "C18", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C19", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C20", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C22", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C24", 1, 6, 2, 60, 2, 1, 0, 0.65535, $col_0a655),
            array( "C24", 1, 8, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C20", 1, 12, 4, 45, 2, 1, 1, -1.2147483647, $col_1a2m)
        );
    break;
    case "questb":
        $conf = array(3, 680, 1, 0, "quest.bmd","quest.bmd");
        $col  = array(
            array( "C1", 1, 0, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 1, 4, 1, 40, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 0, 5, 32, 160, 2, 0, 1, 32, $col_t32)
        );
        $conf2= array(-1, 20, 0, 2, "quest.bmd","quest.bmd",1,680,320,38);
        $col2 = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 10, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 11, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 12, 2, 28, 2, 1, 0, 0.65535, $col_0a655),
            array( "C14", 1, 14, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C15", 1, 16, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 18, 2, 35, 2, 1, 0, 0.65535, $col_0a655)
        );
        $conf3= array(-1, 20, 0, 0, "quest.bmd","quest.bmd",1,680,320,360);
        $col3 = array(
            array( "C1", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C3", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C4", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C5", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C6", 1, 8, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C7", 1, 12, 4, 45, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "quest2b":
        $paginar = 1;
        $paginas = $pagina2b;
        $conf = array(-1, 20, 0, 2, "quest.bmd","quest.bmd",1,680,320,38);
        $col  = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 10, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 11, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 12, 2, 28, 2, 1, 0, 0.65535, $col_0a655),
            array( "C14", 1, 14, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C15", 1, 16, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 18, 2, 35, 2, 1, 0, 0.65535, $col_0a655)
        );
    break;
    case "quest3b":
        $paginar = 1;
        $paginas = $pagina2b;
        $conf = array(-1, 20, 0, 0, "quest.bmd","quest.bmd",1,680,320,360);
        $col  = array(
            array( "C1", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C3", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C4", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C5", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C6", 1, 8, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C7", 1, 12, 4, 45, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "questc":
        $conf = array(3, 744, 0, 0, "quest.bmd","quest.bmd");
        $col  = array(
            array( "C1", 1, 0, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C2", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "C3", 1, 4, 1, 40, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 0, 5, 32, 160, 2, 0, 1, 32, $col_t32)
        );
        $conf2= array(-1, 21, 0, 2, "quest.bmd","quest.bmd",1,744,320,38);
        $col2 = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 10, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 11, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 12, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 13, 2, 28, 2, 1, 0, 0.65535, $col_0a655),
            array( "C14", 1, 15, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C15", 1, 17, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 19, 2, 35, 2, 1, 0, 0.65535, $col_0a655)
        );
        $conf3= array(-1, 20, 0, 0, "quest.bmd","quest.bmd",1,744,320,424);
        $col3 = array(
            array( "C1", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C3", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C4", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C5", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C6", 1, 8, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C7", 1, 12, 4, 45, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "quest2c":
        $paginar = 1;
        $paginas = $pagina2b;
        $conf = array(-1, 20, 0, 2, "quest.bmd","quest.bmd",1,680,320,38);
        $col  = array(
            array( "C1", 1, 0, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C3", 1, 2, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C4", 1, 3, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C5", 1, 4, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C6", 1, 5, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C7", 1, 6, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C8", 1, 7, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C9", 1, 8, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C10", 1, 9, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 10, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 11, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 12, 1, 28, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 13, 2, 28, 2, 1, 0, 0.65535, $col_0a655),
            array( "C14", 1, 15, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C15", 1, 17, 2, 35, 2, 1, 0, 0.65535, $col_0a655),
            array( "C16", 1, 19, 2, 35, 2, 1, 0, 0.65535, $col_0a655)
        );
    break;
    case "quest3c":
        $paginar = 1;
        $paginas = $pagina2b;
        $conf = array(-1, 20, 0, 0, "quest.bmd","quest.bmd",1,680,320,360);
        $col  = array(
            array( "C1", 1, 0, 1, 45, 2, 1, 0, 0.255, $col_0a255),
            array( "C2", 1, 1, 1, 45, 2, 1, 1, -1.254, $col_1a254),
            array( "C3", 1, 2, 2, 45, 2, 1, 1, -1.65534, $col_1a654),
            array( "C4", 1, 4, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C5", 1, 6, 2, 45, 2, 1, 0, 0.65535, $col_0a655),
            array( "C6", 1, 8, 4, 60, 2, 1, 0, -1.2147483647, $col_1a2m),
            array( "C7", 1, 12, 4, 45, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "C8", 1, 16, 4, 45, 2, 1, 0, -1.2147483647, $col_1a2m)
        );
    break;
    case "QuestProgress":
        $conf = array(-1, 41, 1, 0, "QuestProgress.bmd","QuestProgress.bmd");
        $col  = array(
            array( "C1", 1, 0, 2, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C3", 1, 2, 2, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C5", 1, 4, 1, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C6", 1, 5, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C10", 1, 9, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C14", 1, 13, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C18", 1, 17, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C22", 1, 21, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C26", 1, 25, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C30", 1, 29, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C34", 1, 33, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655),
            array( "C38", 1, 37, 4, 40, 2, 1, 0, 0.2147483647, $col_0a655)
        );
    break;
    case "QuestWords":
        $buscar = 1;
        $conf = array(1, 1000, 0, 0, "QuestWords.bmd","QuestWords.bmd");
        $col  = array(
            array( "C1", 1, 0, 0, 35, 2, 1, 0, 0.0, ""),
            array( "Texto", 0, 0, 0, 500, 2, 0, 1, 10000, $col_tinf)
        );
    break;
    case "ServerList":
        $buscar = 1;
        $conf = array(2, 607, 2, 0, "ServerList.bmd","ServerList.bmd");
        $col  = array(
            array( "C1"    , 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "Nombre", 0, 2, 32, 100, 2, 0, 1, 32, $col_t32),
//            array( "C3", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
//            array( "C4", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
//            array( "C5", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
//            array( "C6", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
//            array( "C7", 1, 2, 2, 40, 2, 1, 0, 0.65535, $col_0a655),
            array( "Texto" , 0, 2, 32, 200, 2, 0, 1, 10000, $col_tinf),
        );
    break;
    case "ShopCategoryItems":
        $conf = array(-1, 20, 1, 2, "ShopCategoryItems.bmd","ShopCategoryItems.bmd");
        $col  = array(
            array(  "C1", 1,  4,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C2", 1,  6,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C3", 1,  8,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C4", 1, 10,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C5", 1, 12,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C6", 1, 14,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C7", 1, 16,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C8", 1, 18,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(  "C9", 1, 20,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "C10", 1, 22,  2, 40, 2, 0, 0, 0.65535, $col_0a655),
        );
    break;
    case "ShopUI":
        $conf = array(3, 72, 0, 2, "ShopUI.bmd","ShopUI.bmd");
        $col  = array(
            array(   "C1", 1,  4,  4, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(   "C2", 1,  8,  4, 40, 2, 0, 0, 0.65535, $col_0a655),
            array(   "C3", 1, 12,  4, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "Text", 0, 16, 60, 50, 2, 0, 1, 60, $col_t60)
        );
    break;
    case ($archivo=="skill" || $archivo=="skillscf"):
        $buscar  = 1;
        $paginar = 1;
        $paginas = $pagina3;
        $conf = array(0, 80, 1, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"            , 0, 0, 32, 50, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"        , 1, 32, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Damage"            , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Mana"            , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Agility"        , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"        , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"        , 1, 44, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Energy"        , 1, 48, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Level"        , 1, 52, 2, 28, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "Property1"        , 1, 54, 1, 28, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "UseType"        , 1, 55, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Brand"            , 1, 56, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "KillCount"        , 1, 57, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[0]"    , 1, 58, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[1]"    , 1, 59, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[2]"    , 1, 60, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DW/SM"            , 1, 61, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DK/BK"            , 1, 62, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Elf/ME"            , 1, 63, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "MG"            , 1, 64, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DL"            , 1, 65, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SUM"            , 1, 66, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "IconNumber"        , 1, 68, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SkillType"        , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skill2":
        $conf = array(0, 52, 2, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"         , 0, 0, 32, 50, 2, 0, 1, 32, $col_t32),
            array( "SkillLevel"   , 1, 32, 1, 40, 2, 0, 0, 0.255, $col_0a255),
            array( "Damage"       , 1, 33, 1, 40, 2, 0, 0, 0.255, $col_0a255),
            array( "Mana"         , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "Distance"     , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "TimeDelay"    , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "TimeDelay"    , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m),
            array( "TimeDelay"    , 1, 44, 2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "TimeDelay"    , 1, 46, 2, 40, 2, 0, 0, 0.65535, $col_0a655),
            array( "TimeDelay"    , 1, 48, 1, 40, 2, 1, 1, -1.254, $col_1a254),
            array( "TimeDelay"    , 1, 49, 1, 40, 2, 0, 0, 0.255, $col_0a255),
            array( "TimeDelay"    , 1, 50, 1, 40, 2, 0, 0, 0.255, $col_0a255),
            array( "TimeDelay"    , 1, 51, 1, 40, 2, 0, 0, 0.255, $col_0a255)
        );
    break;
    case "skill3":
        $conf = array(0, 60, 0, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"         , 0, 0, 32, 50, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"   , 1, 32, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "Damage"       , 1, 33, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "Mana"         , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"     , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"    , 1, 44, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 46, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 48, 1, 40, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "TimeDelay"    , 1, 49, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 50, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 51, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 52, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 53, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 54, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 55, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 56, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 57, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 58, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 59, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skill4":
        $paginar = 1;
        $paginas = $pagina3a;
        $conf = array(0, 68, 1, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"         , 0, 0, 32, 50, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"   , 1, 32, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Damage"       , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"     , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"    , 1, 44, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"    , 1, 48, 2, 40, 2, 1, 1, -1.65534, $col_1a654, 1),
            array( "TimeDelay"    , 1, 50, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "TimeDelay"    , 1, 52, 1, 40, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "TimeDelay"    , 1, 53, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 54, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 55, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 56, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 57, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 58, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 59, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 60, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 61, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 62, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 63, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 64, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 65, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 66, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 67, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skill5":
        $conf = array(-1, 40, 2, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"         , 0, 0, 32, 300, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"   , 1, 32, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "Damage"       , 1, 33, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "Distance"     , 1, 34, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 35, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 36, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 37, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 38, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1),
            array( "TimeDelay"    , 1, 39, 1, 40, 2, 0, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skills6":
        $buscar  = 1;
        $paginar = 1;
        $paginas = $pagina3;
        $conf = array(0, 80, 1, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"            , 0, 0, 32, 50, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"        , 1, 32, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Damage"            , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Mana"            , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Agility"        , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"        , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"        , 1, 44, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Energy"        , 1, 48, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Level"        , 1, 52, 2, 28, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "Property1"        , 1, 54, 1, 28, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "UseType"        , 1, 55, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Brand"            , 1, 56, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "KillCount"        , 1, 57, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[0]"    , 1, 58, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[1]"    , 1, 59, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[2]"    , 1, 60, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DW/SM"            , 1, 61, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DK/BK"            , 1, 62, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Elf/ME"            , 1, 63, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "MG"            , 1, 64, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DL"            , 1, 65, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SUM"            , 1, 66, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "NewPJ"            , 1, 67, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "IconNumber"        , 1, 68, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SkillType"        , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skills62":
        $buscar  = 1;
        $paginar = 1;
        $paginas = $pagina3;
        $conf = array(1, 88, 2, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"            , 0, 0, 32, 150, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"        , 1, 32, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Damage"            , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Mana"            , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Agility"        , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"        , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"        , 1, 44, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Energy"        , 1, 48, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Level"        , 1, 52, 2, 28, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "Property1"        , 1, 54, 1, 28, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "UseType"        , 1, 55, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Brand"            , 1, 56, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "KillCount"        , 1, 57, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[0]"        , 1, 58, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[1]"        , 1, 59, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[2]"        , 1, 60, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 61, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 62, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 63, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DW/SM"            , 1, 64, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DK/BK"            , 1, 65, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Elf/ME"            , 1, 66, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "MG"            , 1, 67, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DL"            , 1, 68, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SUM"            , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "NewPJ"            , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "IconNumber"        , 1, 71, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SkillType"        , 1, 72, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 73, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 74, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 75, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 76, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 77, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 78, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 79, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 80, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 81, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 82, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 83, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 84, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 85, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 86, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 87, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skills63":
        $buscar  = 1;
        $paginar = 1;
        $paginas = $pagina3b;
        $conf = array(1, 88, 2, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"            , 0, 0, 32, 150, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"        , 1, 32, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Damage"            , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Mana"            , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Agility"        , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"        , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"        , 1, 44, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Energy"        , 1, 48, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Level"        , 1, 52, 2, 28, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "Property1"        , 1, 54, 1, 28, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "UseType"        , 1, 55, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Brand"            , 1, 56, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "KillCount"        , 1, 57, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[0]"        , 1, 58, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[1]"        , 1, 59, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[2]"        , 1, 60, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 61, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 62, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 63, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DW/SM"            , 1, 64, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DK/BK"            , 1, 65, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Elf/ME"            , 1, 66, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "MG"            , 1, 67, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DL"            , 1, 68, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SUM"            , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "NewPJ"            , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "IconNumber"        , 1, 71, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SkillType"        , 1, 72, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 73, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 74, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 75, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 76, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 77, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 78, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 79, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 80, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 81, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 82, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 83, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 84, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 85, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 86, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 87, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "skills64":
        $buscar  = 1;
        $paginar = 1;
        $paginas = $pagina3a;
        $conf = array(1, 88, 2, 0, "skill.bmd","skill.bmd");
        $col  = array(
            array( "Name"            , 0, 0, 32, 150, 2, 0, 1, 32, $col_t32, 1),
            array( "SkillLevel"        , 1, 32, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Damage"            , 1, 34, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Mana"            , 1, 36, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Agility"        , 1, 38, 2, 40, 2, 0, 0, 0.65535, $col_0a655, 1),
            array( "Distance"        , 1, 40, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "TimeDelay"        , 1, 44, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Energy"        , 1, 48, 4, 40, 2, 0, 0, -1.2147483647, $col_1a2m, 1),
            array( "Req.Level"        , 1, 52, 2, 28, 2, 1, 0, 0.65535, $col_0a655, 1),
            array( "Property1"        , 1, 54, 1, 28, 2, 1, 1, -1.254, $col_1a254, 1),
            array( "UseType"        , 1, 55, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Brand"            , 1, 56, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "KillCount"        , 1, 57, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[0]"        , 1, 58, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[1]"        , 1, 59, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Req.Status[2]"        , 1, 60, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 61, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 62, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 63, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DW/SM"            , 1, 64, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DK/BK"            , 1, 65, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "Elf/ME"            , 1, 66, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "MG"            , 1, 67, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "DL"            , 1, 68, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SUM"            , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "NewPJ"            , 1, 70, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "IconNumber"        , 1, 71, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "SkillType"        , 1, 72, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 73, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 74, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 75, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 76, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 77, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 78, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 79, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 80, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 81, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 82, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 83, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 84, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 85, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 86, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1),
            array( "??"            , 1, 87, 1, 28, 2, 1, 0, 0.255, $col_0a255, 1)
        );
    break;
    case "slide":
        $buscar = 1;
        $conf = array(2, 256, 0, 0, "slide.bmd","slide.bmd");
        $col  = array(
            array( "Cat"   , 1, 0, 4, 30, 2, 1, 0, 0.32, $col_0a32),
            array( "Id"    , 1, 4, 4, 30, 2, 1, 0, 0.32, $col_0a32),
            array( "tslide", 0, 16, 256, 500, 2, 0, 1, 255, $col_t255)
        );
    break;
    case "socketitem":
        $buscar = 1;
        $conf = array(2, 104, 1, 0, "socketitem.bmd","socketitem.bmd");
        $col  = array(
            array( "C1", 1, 0, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Numero del Seed", 1, 4, 4, 100, 2, 1, 1, -1.2147483647, "<b>1</b>:&nbsp;Fuego<br /> <b>2</b>: Agua<br /> <b>3</b>: Hielo<br /> <b>4</b>: Aire<br /> <b>5</b>: Rayo<br /> <b>6</b>: Tierra"),
            array( "Nombre de la Opcion", 0, 8, 64, 200, 2, 0, 1, 64, $col_t64),
            array( "C4", 1, 72, 4, 30, 2, 1, 1, -1.2147483647, $col_1a2m),
            array( "Seed +1", 1, 76, 4, 50, 2, 1, 1, -1.2147483647, "Valor de Aumento del Seed Sphere +1"),
            array( "Seed +2", 1, 80, 4, 50, 2, 1, 1, -1.2147483647, "Valor de Aumento del Seed Sphere +2"),
            array( "Seed +3", 1, 84, 4, 50, 2, 1, 1, -1.2147483647, "Valor de Aumento del Seed Sphere +3"),
            array( "Seed +4", 1, 88, 4, 50, 2, 1, 1, -1.2147483647, "Valor de Aumento del Seed Sphere +4"),
            array( "Seed +5", 1, 92, 4, 50, 2, 1, 1, -1.2147483647, "Valor de Aumento del Seed Sphere +5"),
            array( "C10", 1, 96, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C11", 1, 97, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C12", 1, 98, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C13", 1, 99, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C14", 1, 100, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C15", 1, 101, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C16", 1, 102, 1, 30, 2, 1, 0, 0.255, $col_0a255),
            array( "C17", 1, 103, 1, 30, 2, 1, 0, 0.255, $col_0a255)
        );
    break;
    case "text":
        $buscar = 1;
        $conf = array(1, 1000, 0, 0, "text.bmd","text.bmd");
        $col  = array(
            array( "C1", 1, 0, 0, 35, 2, 1, 0, 0.0, ""),
            array( "Texto", 0, 0, 0, 500, 2, 0, 1, 10000, $col_tinf)
        );
    break;
    case "text2":
        $buscar = 1;
        $conf = array(0, 300, 0, 0, "text.bmd","text.bmd");
        $col  = array(
            array( "Texto", 0, 0, 300, 500, 2, 0, 1, 300, $col_tinf)
        );
    break;
}
?>
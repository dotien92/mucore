<?php
require_once('session.php');

    $file2   = $_REQUEST['file2'];
    $file    = $_REQUEST['file'];
    $archivo = $_REQUEST['archivo'];

    include("funciones.php");
    $archivo_orig = $archivo;
    $archivo = version_file($archivo, $file);
    include("../config.php");
    $path_file=$path_bmd;
    $contenido = abrir($path_file.$file);

        $top  = "/////////////////////////////////////////////////////////////////////////////////\r\n";
        $top .= "// Creado con Mu Editor MagicHand\r\n";
        $top .= "/////////////////////////////////////////////////////////////////////////////////\r\n";
        $top .= "\r\n";
        $top .= "\r\n";
        
        $start = ($_REQUEST["start"] == null)? 0 : $_REQUEST["start"];

    if($archivo=="text"){
        $limit  = cantidad( $contenido, 2, 4);
        $inicio = 6;
        $datos = $top;
        for($i=0;$nTexto<=$limit;$i++){
            $nTexto   = cantidad( $contenido, $inicio, 4);
            $lTexto   = cantidad( $contenido, $inicio + 4, 4);
            $arrastre = (1 - $inicio) % 3;
            $datos .= $nTexto."\t";
            $pasar = array();
            for($j=0;$j<$lTexto;$j++)
                $pasar[$j] = substr($contenido, $inicio + 8 + $j, 1);
            $datos .= iconv($txt_lang, "UTF-8", decoBmd2(0, $pasar, $inicio + 8, $lTexto, $arrastre))."\r\n";
            $inicio += $lTexto + 8;
        }
    }
    elseif($archivo=="message"){
        $inicio  = 28;
        $cuantos = cantidad( $contenido, 24, 4);

        $datos = $top;

        for($i=0;$i<$cuantos;$i++){
            $dato1  = cantidad( $contenido, $inicio, 1);
            $dato2  = cantidad( $contenido, $inicio + 1, 1);
            $lTexto = cantidad( $contenido, $inicio + 2, 2);
            $pasar = array();
            for($j=0;$j<$lTexto;$j++)
                $pasar[$j] = substr($contenido, $inicio + 4 + $j, 1);
            $datos .= $dato1."\t";
            $datos .= $dato2."\t";
            $datos .= decoWtf($pasar, $lTexto)."\r\n";
            $inicio += $lTexto + 4;
        }
    }
    elseif($archivo=="MasterSkillTreeData"){
        $etapa = 0;
        $limit = ($_REQUEST["limit"] == null)? intval((strlen($contenido)) / $conf[1]) : $start + $_REQUEST["limit"];
        $datos = "";
        $t     = "";
        for($i=$start;$i<$limit;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $t .= $i;
            for($h = 0;$h < count($col); $h++){
                $pasar = array();
                for($j=0;$j<$col[$h][3];$j++)
                    $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                $dato = decoBmd2($col[$h][1], $pasar, $posicion+$col[$h][2], $col[$h][3], $arrastre);
                ($col[$h][1]==1 && $col[$h][7]==1) ? ($t .= "\t".neg_simple($col[$h][1],$dato,$col[$h][3])) : ($t .= "\t".$dato);
            }
            $t .= "\r\n";
        }
        $datos = $t;
    }
    elseif($archivo=="JewelOfHarmonySmelt"){
        if($conf[6]==1){
            $contenido = substr($contenido, $conf[9] + $conf[7] * $start, $conf[8]);
            $start = 0;
        }
        $limit = ($_REQUEST["limit"] == null)? intval((strlen($contenido)) / $conf[1]) : $start + $_REQUEST["limit"];
        
        $datos .= "ORDEN\t";
        for($h = 0;$h < count($col); $h++)
            $datos .= $col[$h][0]."\t";
        $datos = substr_replace($datos, '', -1);
        $datos .= "\n";

        for($i=$start;$i<$limit;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $datos .= $i."\t";
            for($h = 0;$h < count($col); $h++){
                $pasar = array();
                for($j=0;$j<$col[$h][3];$j++)
                    $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                $dato = decoBmd2($col[$h][1], $pasar, $posicion+$col[$h][2], $col[$h][3], $arrastre);
                $datos .= $dato."\t";
            }
            $datos = substr_replace($datos, '', -1);
            $datos .= "\n";
        }
        $datos = substr_replace($datos, '', -1);
    }
    elseif($archivo=="items6"){
        $datos    = $top;
        $d_extras = parse_txt($path_bmd.$file2);
        for($k=0;$k<16;$k++){
            $datos .= $k."\r\n";
            if($k<6)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    DmgMin    DmgMax    Speed    Dur    MagiDur    MagiPwr    ReqLvl    Str    Agi    Ene    Vit    Com    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM    NewPJ\r\n";
            if($k>=6 && $k<11)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Def Speed    Dur    ReqLvl    Str    Agi    Ene    Vit    Com    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM    NewPJ\r\n";
            if($k==11)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Def WalkSpd    Dur    ReqLvl    Str    Agi    Ene    Vit    Com    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM    NewPJ\r\n";
            if($k==12)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Def    Dur    ReqLvl    Ene    Str    Agi    Com    Zen    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM    NewPJ\r\n";
            if($k==13)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Dur    Ice    Poison    Light    Fire    Earth    Wind    Water    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM    NewPJ\r\n";
            if($k==14)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Valor    ItemLvl\r\n";
            if($k==15)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    ReqLvl    Ene    Zen    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM    NewPJ\r\n";

            for($i=0;$i<512;$i++){
                $posicion = ($k * 512 + $i) * $conf[1];
                $vacio = 1;

                for($j=0;$j<44;$j++)
                    $dato[$j] = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], 0);
                $extra_space = "";
                for($j=0; $j<(($col[0][3]-(strlen($dato[0])+2))/8); $j++)
                    $extra_space .= "\t";
                $dato[0] = "\"".$dato[0]."\"  ".$extra_space;
                if($dato[3] == 255) $dato[3] = -1;
                
                if($dato[1]>0 || $dato[2]>0 || $dato[3]>0 || $dato[4]>0 || $dato[5]>0){
                    if($k<6)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[7]."\t".$dato[8]."\t".$dato[12]."\t".$dato[14]."\t".$dato[15]."\t".$dato[16]."\t".$dato[23]."\t".$dato[17]."\t".$dato[18]."\t".$dato[19]."\t0\t0\t".$dato[27]."\t".$dato[28]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\t".$dato[34]."\r\n";
                    if($k>=6 && $k<11)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[10]."\t".$dato[12]."\t".$dato[14]."\t".$dato[23]."\t".$dato[17]."\t".$dato[18]."\t".$dato[19]."\t0\t0\t".$dato[26]."\t".$dato[27]."\t".$dato[28]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\r\n";
                    if($k==11)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[10]."\t".$dato[13]."\t".$dato[14]."\t".$dato[23]."\t".$dato[17]."\t".$dato[18]."\t".$dato[19]."\t0\t0\t".$dato[26]."\t".$dato[27]."\t".$dato[28]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\r\n";
                    if($k==12)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[10]."\t".$dato[14]."\t".$dato[23]."\t".$dato[19]."\t".$dato[17]."\t".$dato[18]."\t".$dato[21]."\t".$dato[25]."\t".$dato[27]."\t".$dato[28]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\r\n";
                    if($k==13)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[14]."\t".$dato[34]."\t".$dato[35]."\t".$dato[36]."\t".$dato[37]."\t".$dato[38]."\t".$dato[39]."\t".$dato[40]."\t".$dato[26]."\t".$dato[27]."\t".$dato[28]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\r\n";
                    if($k==14)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[23]."\t".$dato[2]."\r\n";
                    if($k==15)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[23]."\t".$dato[19]."\t".$dato[25]."\t".$dato[27]."\t".$dato[28]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\r\n";
                }
            }
            $datos .= "end\r\n";
        }
    }
    elseif($archivo=="item"){
        $datos    = $top;
        $d_extras = parse_txt($path_bmd.$file2);
        for($k=0;$k<16;$k++){
            $datos .= $k."\r\n";
            if($k<6)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    DmgMin    DmgMax    Speed    Dur    MagiDur    MagiPwr    ReqLvl    Str    Agi    Ene    Vit    Com    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM\r\n";
            if($k>=6 && $k<12)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Def    DefRate    Dur    ReqLvl    Str    Agi    Ene    Vit    Com    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM\r\n";
            if($k==12)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Def    Dur    ReqLvl    Ene    Str    Agi    Com    Zen    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM\r\n";
            if($k==13)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    Dur    Ice    Poison    Light    Fire    Earth    Wind    Water    Tipo    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM\r\n";
            if($k==14)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Valor    ItemLvl\r\n";
            if($k==15)
                $datos .= "//Index    Slot    Skill    X    Y    Serial    Opt    Drop    Nombre                                  Lvl    ReqLvl    Ene    Zen    DwSmGm    DkBkBm    FeMeHe    MgDm    DlLe    SBsDiM\r\n";

            for($i=0;$i<512;$i++){
                $posicion = ($k * 512 + $i) * $conf[1];
                $vacio = 1;

                for($j=0;$j<44;$j++)
                    $dato[$j] = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], 0);
                $extra_space = "";
                for($j=0; $j<(($col[0][3]-(strlen($dato[0])+2))/8); $j++)
                    $extra_space .= "\t";
                $dato[0] = "\"".$dato[0]."\"  ".$extra_space;
                if($dato[3] == 255) $dato[3] = -1;
                
                if($dato[1]>0 || $dato[2]>0 || $dato[3]>0 || $dato[4]>0 || $dato[5]>0){
                    if($k<6)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[7]."\t".$dato[8]."\t".$dato[12]."\t".$dato[14]."\t".$dato[15]."\t".$dato[16]."\t".$dato[23]."\t".$dato[17]."\t".$dato[18]."\t".$dato[19]."\t0\t0\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\t".$dato[34]."\t".$dato[35]."\r\n";
                    if($k>=6 && $k<12)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[10]."\t".$dato[9]."\t".$dato[14]."\t".$dato[23]."\t".$dato[17]."\t".$dato[18]."\t".$dato[19]."\t0\t0\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\t".$dato[34]."\t".$dato[35]."\r\n";
                    if($k==12)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[10]."\t".$dato[14]."\t".$dato[23]."\t".$dato[19]."\t".$dato[17]."\t".$dato[18]."\t".$dato[21]."\t".$dato[28]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\t".$dato[34]."\t".$dato[35]."\r\n";
                    if($k==13)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[14]."\t".$dato[36]."\t".$dato[37]."\t".$dato[38]."\t".$dato[39]."\t".$dato[40]."\t".$dato[41]."\t".$dato[42]."\t".$dato[29]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\t".$dato[34]."\t".$dato[35]."\r\n";
                    if($k==14)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[24]."\t".$dato[2]."\r\n";
                    if($k==15)
                        $datos .= $i."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$d_extras[$k][$i][5]."\t".$d_extras[$k][$i][6]."\t".$d_extras[$k][$i][7]."\t".$dato[0]."\t".$dato[2]."\t".$dato[23]."\t".$dato[19]."\t".$dato[28]."\t".$dato[30]."\t".$dato[31]."\t".$dato[32]."\t".$dato[33]."\t".$dato[34]."\t".$dato[35]."\r\n";
                }
            }
            $datos .= "end\r\n";
        }
    }
    elseif($archivo=="ItemAddOption"){
        
        $datos0 = "// Options for 380lvl Items(Only in PvP):
// 0) None
// 1)Attack Success Rate increase
// 2)Additional Damage
// 3)Defense Success Rate increase
// 4)Defensive Skill
// 5)Max HP increase
// 6)Max SD increase
// 7)SD Auto Recovery
// 8)SD Recovery Rate increase
//Item Group
//Item Id    Option1    V.Opt1    Option2    V.Opt2    Time\r\n0\r\n";
        $datos1 = "// Halloween and Cherry Blossoms event option:
// 0) None
// 1) +%d speed attack
// 2) +%d damage
// 3) +%d defense
// 4) +%d% maximum HP
// 5) +%d% maximum Mana
//Item Id    Option1    V.Opt1    Option2    V.Opt2    Time\r\n0\r\n";
        $datos2 = "// Partial charge option:
// 6) +%d% acquire additional ???
// 7) +%d% increased chance of acquiring additional items
// 8) ??? be acquired
//Item Group
//Item Id    Option1    V.Opt1    Option2    V.Opt2    Time\r\n2\r\n";
        for($k=0;$k<16;$k++){
            for($i=0;$i<512;$i++){
                $posicion = ($k * 512 + $i) * $conf[1];
                $datosn = $k;
                $vacio = 1;
                for($h = 0;$h < count($col); $h++){
                    $pasar = array();
                    for($j=0;$j<$col[$h][3];$j++)
                        $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                    $dato = decoBmd2($col[$h][1], $pasar, $posicion + $col[$h][2], $col[$h][3], 0);
                    if($dato>0)
                        $vacio = 0;
                    $datosn .= "\t".$dato;
                }
                if($vacio == 0){
                    if($k<13)
                        $datos0 .= $datosn."\r\n";
                    if($k==13)
                        $datos2 .= $datosn."\r\n";
                    if($k==14)
                        $datos1 .= $datosn."\r\n";
                }
            }
    //        $datos = substr_replace($datos, '', -2);
        }
        $datos = $top.$datos0."end\r\n".$datos1."end\r\n".$datos2."end";
    }
    elseif($archivo=="itemsetoption"){

        $datos    = $top;
        $datos .= "//Index    Name                                2-1Opt    Val.2-1    2-2Opt    Val.2-2    3-1Op    Val.3-1    3-2Opt    Val.3-2    4-1Opt    Val.4-1    4-2Opt    Val.4-2    5-1Opt    Val.5-1    5-2Opt    Val.5-2    6-1Opt    Val.6-1    6-2Opt    Val.6-2    7-1Opt    Val.7-1    7-2Opt    Val.7-2    ?    ?    ?    ?    Full1    ValFul1    Full2    ValFul2    Full3    ValFul3    Ful4    ValFul4    Full5    ValFul5    DW    DK    ELF    MG    DL    SUM\r\n";

        for($i=0;$i<64;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $vacio = 1;

            $datosn = $i."\t";
            for($j=0;$j<count($col);$j++){
                if($j<>29){
                    $dato  = iconv($txt_lang, "UTF-8", decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre));
                    $ldato = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre);
                    $extra_space = "";
                    if($col[$j][1]==0){
                        for($k=0; $k<(($col[$j][3]-strlen($ldato)-2)/8); $k++)
                            $extra_space .= "\t";
                        $datosn .= "\"".$ldato."\"".$extra_space;
                    }
                    else{
                        if($dato<>255) $vacio = 0;
                        ($col[$j][1]==1 && $col[$j][7]==1) ? ($datosn .= neg_simple($col[$j][1],$dato,$col[$j][3])) : ($datosn .= $dato);
                        $datosn .= "\t";
                    }
                }
            }
            if($vacio == 0)    $datos .= $datosn."\r\n";
        }
        $datos .= "end\r\n";
    }
    elseif($archivo=="itemsetoption6"){

        $datos    = $top;
        $datos .= "//Index    Name                                2-1Opt    Val.2-1    2-2Opt    Val.2-2    3-1Op    Val.3-1    3-2Opt    Val.3-2    4-1Opt    Val.4-1    4-2Opt    Val.4-2    5-1Opt    Val.5-1    5-2Opt    Val.5-2    6-1Opt    Val.6-1    6-2Opt    Val.6-2    7-1Opt    Val.7-1    7-2Opt    Val.7-2    ?    ?    ?    ?    Full1    ValFul1    Full2    ValFul2    Full3    ValFul3    Ful4    ValFul4    Full5    ValFul5    DW    DK    ELF    MG    DL    SUM    NewPJ\r\n";

        for($i=0;$i<64;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $vacio = 1;

            $datosn = $i."\t";
            for($j=0;$j<count($col);$j++){
                if($j<>29){
                    $dato  = iconv($txt_lang, "UTF-8", decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre));
                    $ldato = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre);
                    $extra_space = "";
                    if($col[$j][1]==0){
                        for($k=0; $k<(($col[$j][3]-strlen($ldato)-2)/8); $k++)
                            $extra_space .= "\t";
                        $datosn .= "\"".$ldato."\"".$extra_space;
                    }
                    else{
                        if($dato<>255) $vacio = 0;
                        ($col[$j][1]==1 && $col[$j][7]==1) ? ($datosn .= neg_simple($col[$j][1],$dato,$col[$j][3])) : ($datosn .= $dato);
                        $datosn .= "\t";
                    }
                }
            }
            if($vacio == 0)    $datos .= $datosn."\r\n";
        }
        $datos .= "end\r\n";
    }
    elseif($archivo=="itemsettype"){

        $datos    = $top;
        for($k=0;$k<16;$k++){
            $datos2 = "//Type\r\n";
            $datos2 .= "//index    Link a    Link b        mixItemLevel a    mixItemLevelb\r\n".$k."\r\n";
            $datos3 = "";
            
            for($i=0;$i<512;$i++){
                $posicion = ($k * 512 + $i) * $conf[1];
                $posicion2= $i * $conf[1];
                $arrastre = $conf[2] * $i + $conf[3];
                $vacio = 1;

                for($j=0;$j<4;$j++)
                    $dato[$j] = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion2 + $col[$j][2], $col[$j][3], $arrastre);
                
                if($dato[0]>0 || $dato[1]>0 || $dato[2]>0 || $dato[3]>0){
                    $datos3 .= $i."\t".$dato[0]."\t".$dato[1]."\t\t".$dato[2]."\t\t".$dato[3]."\r\n";
                }
            }
            if(strlen($datos3)>1) $datos .= $datos2.$datos3."end\r\n";
        }
    }
    elseif($archivo=="JewelOfHarmonyOption"){
        
        $datos0 = "//Type Weapon\r\n//Options Name                                Weighted Minlvl    lv0    rzen0    lv1    rzen1    lv2    rzen2    lv3    rzen3    lv4    rzen4    lv5    rzen5    lv6    rzen6    lv7    rzen7    lv8    rzen8    lv9    rzen9    lv10    rzen10    lv11    rzen11    lv12    rzen12    lv13    rzen13\r\n1\r\n";
        $datos1 = "//Type Pet\r\n//Options Name                                Weighted Minlvl    lv0    rzen0    lv1    rzen1    lv2    rzen2    lv3    rzen3    lv4    rzen4    lv5    rzen5    lv6    rzen6    lv7    rzen7    lv8    rzen8    lv9    rzen9    lv10    rzen10    lv11    rzen11    lv12    rzen12    lv13    rzen13\r\n2\r\n";
        $datos2 = "//Type Defense\r\n//Options Name                                Weighted Minlvl    lv0    rzen0    lv1    rzen1    lv2    rzen2    lv3    rzen3    lv4    rzen4    lv5    rzen5    lv6    rzen6    lv7    rzen7    lv8    rzen8    lv9    rzen9    lv10    rzen10    lv11    rzen11    lv12    rzen12    lv13    rzen13\r\n3\r\n";

        $d_extras = parse_txt($path_bmd.$file2);
        
        for($k=0;$k<3;$k++){
            for($i=0;$i<10;$i++){
                $posicion = ($k * 10 + $i) * $conf[1];
                $datosn = "";
                $vacio = 1;
                for($h = 0;$h < count($col); $h++){
                    $extra_space = "";
                    $pasar = array();
                    for($j=0;$j<$col[$h][3];$j++)
                        $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                    $dato = decoBmd2($col[$h][1], $pasar, $posicion + $col[$h][2], $col[$h][3], 0);
                    if($dato>0)
                        $vacio = 0;
                    if($col[$h][1]==0){
                        for($j=0; $j<(($col[$h][3]-strlen($dato)-2)/8); $j++)
                            $extra_space .= "\t";
                        $dato = "\"".$dato."\"".$extra_space.$d_extras[$k + 1][$i + 1][2]."\t".$d_extras[$k + 1][$i + 1][3];
                    }
                    else{
                        if($dato<1000){
                            $dato = $dato."    ";
                        }
                    }
                    $datosn .= $dato."\t";                    
                }
                $datosn = substr_replace($datosn, '', -1);
                if($vacio == 0){
                    if($k==0)
                        $datos0 .= $datosn."\r\n";
                    if($k==1)
                        $datos1 .= $datosn."\r\n";
                    if($k==2)
                        $datos2 .= $datosn."\r\n";
                }
            }
    //        $datos = substr_replace($datos, '', -2);
        }
        $datos = $top.$datos0."end\r\n".$datos1."end\r\n".$datos2."end";
    }
    elseif($archivo_orig=="skill" || $archivo_orig=="skillscf"){

        $datos    = $top;
        $datos .= "//Property 1 [-1 (None), 0 (ice), 1 (Poison), 2 (Lightning), 3 (Fire), 4 (Earth), 5 (Wind), 6 (water)]
//Property 2 [-1 (None), 0 (Physics), 1 (magic)]
//Brand [requires specific skills, but can be used]
//Use Type [[0 (general skills), 1 (job skills), 3 (Master Level: passive), 4 (Master Level: Active)]
//Skill Type(from Season4) [0 (general skills), 1 (buff: beneficial effects to ours), 2 (damage: harmful effects to the enemy), 3 (treatment: recovery destination)]\r\n\r\n";
        $datos .= "//                                                Skill                    Time    Req    Req                    Kill    Req.[0]    Req.[1]    Req.[2]                                Skill    Skill    Req.    Cost        Duration    Req.    Icon    Skill\r\n";
        $datos .= "//Index    Name                                   Level    Damage    Mana    Agility    DistanceDelay    Energy    Level    Prop1    Prop2    UseType    Brand    Count    Status    Status    Status    DW    DK    ELF    MG    DL    SUM    NewPJ    Rank    Group    MasterP    Stamina    CostSD        ??    Agility    Number    Type\r\n";

        $d_extras = parse_txt($path_bmd.$file2);
        for($i=0;$i<600;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $vacio = 1;

            $datosn = $i."\t";
            for($j=0;$j<count($col);$j++){
                $dato  = iconv($txt_lang, "UTF-8", decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre));
                $ldato = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre);
                $extra_space = "";
                if($col[$j][1]==0){
                    for($k=0; $k<(($col[$j][3]-strlen($ldato) - 2)/8); $k++)
                        $extra_space .= "\t";
                    $datosn .= "\"".$ldato."\"\t".$extra_space;
                }
                else{
                    if($dato>0) $vacio = 0;
                    ($col[$j][1]==1 && $col[$j][7]==1) ? ($datosn .= neg_simple($col[$j][1],$dato,$col[$j][3])) : ($datosn .= $dato);
                    $datosn .= "\t";
                    if($j==9) $datosn .= $d_extras[0][$i][11]."\t";
                    if($j==23) $datosn .= "0\t0\t0\t0\t0\t0\t0\t0\t";
                }
            }
            if($vacio == 0)    $datos .= $datosn."\r\n";
        }
        $datos .= "end\r\n";
    }
    elseif($archivo_orig=="skills6"){

        $datos    = $top;
        $datos .= "//Property 1 [-1 (None), 0 (ice), 1 (Poison), 2 (Lightning), 3 (Fire), 4 (Earth), 5 (Wind), 6 (water)]
//Property 2 [-1 (None), 0 (Physics), 1 (magic)]
//Brand [requires specific skills, but can be used]
//Use Type [[0 (general skills), 1 (job skills), 3 (Master Level: passive), 4 (Master Level: Active)]
//Skill Type(from Season4) [0 (general skills), 1 (buff: beneficial effects to ours), 2 (damage: harmful effects to the enemy), 3 (treatment: recovery destination)]\r\n\r\n";
        $datos .= "//                                                Skill                    Time    Req    Req                    Kill    Req.[0]    Req.[1]    Req.[2]                                Skill    Skill    Req.    Cost        Duration    Req.    Icon    Skill\r\n";
        $datos .= "//Index    Name                                   Level    Damage    Mana    Agility    DistanceDelay    Energy    Level    Prop1    Prop2    UseType    Brand    Count    Status    Status    Status    DW    DK    ELF    MG    DL    SUM    NewPJ    Rank    Group    MasterP    Stamina    CostSD        ??    Agility    Number    Type\r\n";

        $d_extras = parse_txt($path_bmd.$file2);
        for($i=0;$i<650;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $vacio = 1;

            $datosn = $i."\t";
            for($j=0;$j<count($col);$j++){
                $dato  = iconv($txt_lang, "UTF-8", decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre));
                $ldato = decoBmd2($col[$j][1], substr($contenido, $posicion + $col[$j][2], $col[$j][3]), $posicion + $col[$j][2], $col[$j][3], $arrastre);
                $extra_space = "";
                if($col[$j][1]==0){
                    for($k=0; $k<(($col[$j][3]-strlen($ldato) - 2)/8); $k++)
                        $extra_space .= "\t";
                    $datosn .= "\"".$ldato."\"\t".$extra_space;
                }
                else{
                    if($dato>0) $vacio = 0;
                    ($col[$j][1]==1 && $col[$j][7]==1) ? ($datosn .= neg_simple($col[$j][1],$dato,$col[$j][3])) : ($datosn .= $dato);
                    $datosn .= "\t";
                    if($j==9) $datosn .= $d_extras[0][$i][11]."\t";
                    if($j==23) $datosn .= "0\t0\t0\t0\t0\t0\t0\t0\t";
                }
            }
            if($vacio == 0)    $datos .= $datosn."\r\n";
        }
        $datos .= "end\r\n";
    }
    elseif($archivo_orig=="Quest"){
        $d_extras = parse_txt($path_bmd."Quest(Kor).txt");
        $archi0 = $archivo;

        $archivo = $archi0."2";
        include("../config.php");
        $col2   = $col;
        $conf2  = $conf;

        $archivo = $archi0."3";
        include("../config.php");
        $col3   = $col;
        $conf3  = $conf;

        $archivo = $archi0;
        include("../config.php");
        

        $datos    = $top;
        $limit = intval((strlen($contenido)) / $conf[1]);
        for($i=0;$i<$limit;$i++){
            $vacio = 1;
            $datos2= "";
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            
            $pasar_npc = decoBmd2(1, substr($contenido, $posicion + $col[2][2], $col[2][3]),$posicion+$col[2][2] + $i*$conf[2], $col[2][3], 0);
            $pasar_txt = decoBmd2(0, substr($contenido, $posicion + $col[3][2], $col[3][3]),$posicion+$col[3][2] + $i*$conf[2], $col[3][3], 0);
            $pasar_cnt = decoBmd2(1, substr($contenido, $posicion + $col[0][2], $col[0][3]),$posicion+$col[0][2] + $i*$conf[2], $col[0][3], 0);
            $pasar_cnt2= decoBmd2(1, substr($contenido, $posicion + $col[1][2], $col[1][3]),$posicion+$col[1][2] + $i*$conf[2], $col[1][3], 0);
            if($pasar_npc>0){
                $datos .= "//Quest    Quest    Quest\r\n//Type    Index    SubType    NPC    Quest Name\r\n";
                $datos .= "0\t".$i."\t2\t".$pasar_npc."\t".$pasar_txt."\r\n";

                $contenido2 = substr($contenido, $conf2[9] + $conf2[7] * $i, $conf2[8]);

                $datos2 = "";
                for($k=0;$k<$pasar_cnt;$k++){
                    $posicion2 = $k * $conf2[1];
                    $arrastre2 = $conf2[2] * $k + $conf2[3];
                    for($j=0;$j<17;$j++)
                        $dato[$j] = decoBmd2(1, substr($contenido2, $posicion2 + $col2[$j][2], $col2[$j][3]), $posicion2 + $col2[$j][2], $col2[$j][3], $arrastre2);
                    $datos2 .= $dato[1]."\t".$dato[2]."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t\t\t\t\t\t\t".$dato[6]."\t".$dato[13]."\t".$dato[14]."\t".$dato[15]."\t".$dato[16]."\t".$dato[7]."\t".$dato[8]."\t".$dato[9]."\t".$dato[10]."\t".$dato[11]."\t".$dato[12]."\r\n";
                }
                if($dato[1] == 1)
                    $datos .= "//\r\n//Quest Item     Item     Item    Item     Monster    Monster    Drop    Quest    Quest    Add\r\n//Type    Type    SubType    Level    Number    MinLvl     MaxLvl    Rate    Type    SubType    Point        Msg1    Msg2    Msg3    Msg4    DW    DK    Elf    MG    DL    SU\r\n";
                if($dato[1] == 2)
                    $datos .= "//\r\n//Quest             Monster                Quest        Add\r\n//Type    Monster            Number                Type    SubType    Point        Msg1    Msg2    Msg3    Msg4    DW    DK    Elf    MG    DL    SU\r\n";

                $datos .= $datos2."end\r\n\r\n";

                $datos .= "//\r\n//Quest    Quest\r\n//Type    Index\r\n";
                $datos .= "1\t".$i."\r\n";

                $datos .= "//\r\n//    Level    Level    need    need    need\r\n//    Min    Max    str    agi    zen    Msg\r\n";

                $contenido3 = substr($contenido, $conf3[9] + $conf3[7] * $i, $conf3[8]);

                for($k=0;$k<$pasar_cnt2;$k++){
                    $posicion3 = $k * $conf3[1];
                    $arrastre3 = $conf3[2] * $k + $conf3[3];
                    for($j=0;$j<8;$j++)
                        $dato[$j] = neg_simple(1, decoBmd2(1, substr($contenido3, $posicion3 + $col3[$j][2], $col3[$j][3]), $posicion3 + $col3[$j][2], $col3[$j][3], $arrastre3),$col3[$j][3]);
                    $datos .= $dato[1]."\t".$dato[2]."\t".$dato[3]."\t".$dato[4]."\t".$dato[5]."\t".$dato[6]."\t".$dato[7]."\r\n";
                }
                $datos .= "end\r\n\r\n///////////////////////////////////////////////////////////////////////////////\r\n\r\n";

            }
        }
    }
    elseif($archivo_orig=="movereq"){

        $datos    = $top;
        $datos .= "//Index    Nombre en Server                     Nombre en Cliente                    Zen      Lvl Req    Gate\r\n";
        $limit = intval((strlen($contenido)) / $conf[1]);
        for($i=0;$i<$limit;$i++){
            $vacio = 1;
            $datos2= "";
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            for($h = 0;$h < count($col); $h++){
                if($col[$h][10] == 1){
                    $pasar = array();
                    for($j=0;$j<$col[$h][3];$j++)
                        $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                    $dato = iconv($txt_lang, "UTF-8", decoBmd2($col[$h][1], $pasar, $posicion+$col[$h][2], $col[$h][3], $arrastre));
                    $extra_space = "";
                    if($col[$h][1]==0){
                        for($j=0; $j<(($col[$h][3]-strlen($dato))/8); $j++)
                            $extra_space .= "\t";
                        $datos2 .= $dato.$extra_space."\t";
                    }
                    else{
                        ($col[$h][1]==1 && $col[$h][7]==1) ? ($datos2 .= neg_simple($col[$h][1],$dato,$col[$h][3])."$extra_space\t") : ($datos2 .= $dato."$extra_space\t");
                        if($dato>0) $vacio = 0;
                    }
                }
            }
            if($vacio==0){
                $datos .= $datos2;
                $datos = substr_replace($datos, '', -1);
                $datos .= "\r\n";
            }
        }
    }
    elseif($archivo_orig=="gate"){

        $datos    = $top;
        $datos .= "//Gate    Flag    Map    X1    Y1    X2    Y2    Target    Dir    Level\r\n";

        for($i=1;$i<512;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $datos2   = $i."\t";
            $vacio    = 1;
            for($h = 0;$h < count($col); $h++){
                if($col[$h][10] == 1){
                    $pasar = array();
                    for($j=0;$j<$col[$h][3];$j++)
                        $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                    $dato = decoBmd2($col[$h][1], $pasar, $posicion+$col[$h][2], $col[$h][3], $arrastre);
                    if($dato!=0)
                        $vacio = 0;
                    ($col[$h][1]==1 && $col[$h][7]==1) ? ($datos2 .= neg_simple($col[$h][1],$dato,$col[$h][3])."$extra_space\t") : ($datos2 .= $dato."$extra_space\t");
                }
            }
            if($vacio==0){
                $datos .= $datos2;
                $datos = substr_replace($datos, '', -1);
                $datos .= "\r\n";
            }
        }
        $datos = substr_replace($datos, '', -2);
    }
    else{
        $start = ($_REQUEST["start"] == null)? 0 : $_REQUEST["start"];
        if($conf[6]==1){
            $contenido = substr($contenido, $conf[9] + $conf[7] * $start, $conf[8]);
            $etapa = $start;
            $start = 0;
        }
        else
            $etapa = 0;
            
        $limit = ($_REQUEST["limit"] == null)? intval((strlen($contenido)) / $conf[1]) : $start + $_REQUEST["limit"];
        $r         = "";
        $datos = $top;

        for($h = $start;$h < count($col); $h++){
            if($col[$h][10] == 1){
                $extra_space = " ";
                for($j=0; $j<(($col[$h][3]-$col[$h][0])/8); $j++)
                    $extra_space .= "\t";
                $datos .= $col[$h][0].$extra_space."\t";
            }
        }
        $datos = substr_replace($datos, '', -1);
        $datos .= "\n";

        for($i=$start;$i<$limit;$i++){
            $posicion = $i * $conf[1];
            $arrastre = $conf[2] * $i + $conf[3];
            $t        = "";
            for($h = 0;$h < count($col); $h++){
                $pasar = array();
                for($j=0;$j<$col[$h][3];$j++)
                    $pasar[$j] = substr($contenido, $posicion + $col[$h][2] + $j, 1);
                $dato = decoBmd2($col[$h][1], $pasar, $posicion+$col[$h][2], $col[$h][3], $arrastre);
                if($col[$h][1]==0){
                    for($j=0; $j<(($col[$h][3]-strlen($dato))/8); $j++)
                        $extra_space .= "\t";
                    $datos .= $dato."$extra_space\t";
                }
                else{
                    ($col[$h][1]==1 && $col[$h][7]==1) ? ($datos .= neg_simple($col[$h][1],$dato,$col[$h][3])."$extra_space\t") : ($datos .= $dato."$extra_space\t");
                }
            }
            $datos = substr_replace($datos, '', -1);
            $datos .= "\r\n";
        }
        $datos = substr_replace($datos, '', -2);
    }

    header("Content-Type: application/octet-stream");
    header("Content-Length: " . strlen($datos));
    header("Content-Disposition: attachment; filename=\"".$archivo_orig.".txt\"");
    print($datos);
?>
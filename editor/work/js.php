<?php
require_once('session.php');

include("../i18n/".$lang."/locale/text.php");

$cant_trans = 10;

$archivo  = $_REQUEST['archivo'];
$file     = $_REQUEST['file'];
$tipo     = $_REQUEST['tipo'];
$busqueda = $_REQUEST['busqueda'];

$f_original= preg_replace("[^A-Za-z]", "", $archivo);
$variables = "var archivo = \"$f_original\";\n
              var file    = \"$file\";\n";

include("funciones.php");
$archivo  = version_file($archivo, $file);
include("../config.php");

$field = "            {name: 'i'},\n            {name: 'e'},\n";
$campos_trad  = "";
$campos_trad2 = "";
$num           =  0;
for($i = 0;$i < count($col); $i++){
    ($col[$i][7]==1) ? ($verdad="true") : ($verdad="false");
    if($col[$i][1]==0){
        $num++;
        $campos_trad  .= "'text_tran".$num."': l_trans[i].get(\"o".$i."\"),";
        $campos_trad2 .= "if(partes_tans[".$num."].length > 0) erecord.set(\"o".$i."\", partes_tans[".$num."]);\n";
        $editor = ",
            editor: new fm.TextField({
                allowBlank: ".$verdad.",
                minLength: 0,
                maxLength: ".$col[$i][8]."
            })";
        $h_trad = true;
    }
    if($col[$i][1]==1){
        list( $minval, $maxval) = explode( '.', $col[$i][8]);
        if($maxval!=0){
            $editor = ",
                editor: new fm.NumberField({
                    allowBlank: false,
                    allowNegative: ".$verdad.",
                    allowDecimals: false,
                    minValue: ".$minval.",
                    maxValue: ".$maxval."
                })";
        }
    }
    
    ($conf[0]==$i) ? ($ae ="id:'o".$i."',\n\t\t\t") : ($ae="");
    ($col[$i][6]==0) ? ($a="left") : ($a="right");
    $lcol .= "
        {
            ".$ae."header: \"".$col[$i][0]."\",
            dataIndex: 'o".$i."',
            width: ".$col[$i][4].",
            hideable: false,
            menuDisabled: true,
            resizable: true,
            tooltip: '".$col[$i][9]."',
            align: '".$a."'".$editor."
        },";
    $field .= "            {name: 'o".$i."'},\n";
}
if($h_trad) $cm = "        sm2,";
$cm .= "
        {
            header: '',
            width: 28,
            sortable: false,
            fixed:false,
            menuDisabled: true,
            hideable: false,
            id: 'numberer',";

if($paginas[0][5]!=1){
    $cm .= "
            dataIndex: 'a',
            renderer : function(value, meta, record, rowIndex, colIndex, store){
                var num = -1;
                store.each(function(r){
                if(r._groupId == record._groupId){
                    num++;
                }
                return record != r;
                });
                return num;
            }
        },\n";
}
else{
    $cm .= "
            dataIndex: 'i'\n
        },\n";
}

$cm .= substr_replace($lcol, '', -1);
$field = substr_replace($field, '', -2);

if($paginar==1){
    $store = "store.load({params:{start: 0, limit: ".$paginas[0][4]."}});";
    $cbotones = "vertipo.setText('<span class=\"tipos\">".$viendo.": ".$paginas[0][2]."</span>');";
    for($i = 0;$i < count($paginas); $i++){
        $tooltip = "";
        if($f_original=="ItemAddOption" &  $i<12) $tooltip = "cm.setColumnTooltip(2,'".$iao_tip1."');\r\ncm.setColumnHeader(0,'');";
        if($f_original=="ItemAddOption" & $i==14) $tooltip = "cm.setColumnTooltip(2,'".$iao_tip2."');\r\ncm.setColumnHeader(0,'');";
        if($f_original=="ItemAddOption" & $i==13) $tooltip = "cm.setColumnTooltip(2,'".$iao_tip3."');\r\ncm.setColumnHeader(0,'');";
        if($f_original=="ItemAddOption" & ($i==12 | $i==15)) $tooltip = "cm.setColumnTooltip(2,'');\r\ncm.setColumnHeader(0,'');";
        if($f_original==="item"){
            for($j=8;$j<44;$j++){
                if($j<31 | $j>36){
                    $h = $j + 1;
                    $tooltip .= "cm.setColumnHeader(".$h.",'C".$j."');\r\n";
                }
            }
        }
        if($f_original==="item" & $i>=0 & $i<6){
            $tooltip .= "cm.setColumnHeader(9,'DañoMin');\r\n";
            $tooltip .= "cm.setColumnHeader(10,'DañoMax');\r\n";
            $tooltip .= "cm.setColumnHeader(11,'% Daño');\r\n";
            $tooltip .= "cm.setColumnHeader(14,'Speed');\r\n";
            $tooltip .= "cm.setColumnHeader(16,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(17,'MagiDur');\r\n";
            $tooltip .= "cm.setColumnHeader(18,'MagiPwr');\r\n";
            $tooltip .= "cm.setColumnHeader(19,'Str');\r\n";
            $tooltip .= "cm.setColumnHeader(20,'Agi');\r\n";
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(22,'Vit');\r\n";
            $tooltip .= "cm.setColumnHeader(23,'Com');\r\n";
            $tooltip .= "cm.setColumnHeader(25,'ReqLvl');\r\n";
            $tooltip .= "cm.setColumnHeader(31,'Type');\r\n";
        }
        if($f_original==="item" & $i>5 & $i<12){
            $tooltip .= "cm.setColumnHeader(11,'DefRate');\r\n";
            $tooltip .= "cm.setColumnHeader(12,'Def');\r\n";
            $tooltip .= "cm.setColumnHeader(16,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(19,'Str');\r\n";
            $tooltip .= "cm.setColumnHeader(20,'Agi');\r\n";
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(22,'Vit');\r\n";
            $tooltip .= "cm.setColumnHeader(23,'Com');\r\n";
            $tooltip .= "cm.setColumnHeader(25,'ReqLvl');\r\n";
            $tooltip .= "cm.setColumnHeader(31,'Type');\r\n";
        }
        if($f_original==="item" &  $i==12){
            $tooltip .= "cm.setColumnHeader(12,'Def');\r\n";
            $tooltip .= "cm.setColumnHeader(16,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(19,'Str');\r\n";
            $tooltip .= "cm.setColumnHeader(20,'Agi');\r\n";
            $tooltip .= "cm.setColumnHeader(23,'Com');\r\n";
            $tooltip .= "cm.setColumnHeader(25,'ReqLvl');\r\n";
            $tooltip .= "cm.setColumnHeader(30,'Zen');\r\n";
        }
        if($f_original==="item" &  $i==13){
            $tooltip .= "cm.setColumnHeader(15,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(31,'Type');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'Ice');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'Poison');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'Light');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'Fire');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'Earth');\r\n";
            $tooltip .= "cm.setColumnHeader(43,'Wind');\r\n";
            $tooltip .= "cm.setColumnHeader(44,'Water');\r\n";
        }
        if($f_original==="item" &  $i==14){
            $tooltip .= "cm.setColumnHeader(26,'Value');\r\n";
        }
        if($f_original==="item" &  $i==15){
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(30,'Zen');\r\n";
            $tooltip .= "cm.setColumnHeader(25,'Req.Lvl');\r\n";
        }
        if($f_original==="items6" & $i>=0 & $i<6){
            $tooltip .= "cm.setColumnHeader(9,'DañoMin');\r\n";
            $tooltip .= "cm.setColumnHeader(10,'DañoMax');\r\n";
            $tooltip .= "cm.setColumnHeader(11,'% Daño');\r\n";
            $tooltip .= "cm.setColumnHeader(14,'Speed');\r\n";
            $tooltip .= "cm.setColumnHeader(16,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(17,'MagiDur');\r\n";
            $tooltip .= "cm.setColumnHeader(18,'MagiPwr');\r\n";
            $tooltip .= "cm.setColumnHeader(19,'Str');\r\n";
            $tooltip .= "cm.setColumnHeader(20,'Agi');\r\n";
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(22,'Vit');\r\n";
            $tooltip .= "cm.setColumnHeader(23,'Com');\r\n";
            $tooltip .= "cm.setColumnHeader(24,'ReqLvl');\r\n";
            $tooltip .= "cm.setColumnHeader(28,'Type');\r\n";
            $tooltip .= "cm.setColumnHeader(27,'25');\r\n";
            $tooltip .= "cm.setColumnHeader(36,'34');\r\n";
            $tooltip .= "cm.setColumnHeader(37,'35');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'36');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'37');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'38');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'39');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'40');\r\n";
            $tooltip .= "cm.setColumnHeader(43,'41');\r\n";
        }
        if($f_original==="items6" & $i>5 & $i<12){
            $tooltip .= "cm.setColumnHeader(11,'DefRate');\r\n";
            $tooltip .= "cm.setColumnHeader(12,'Def');\r\n";
            $tooltip .= "cm.setColumnHeader(16,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(19,'Str');\r\n";
            $tooltip .= "cm.setColumnHeader(20,'Agi');\r\n";
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(22,'Vit');\r\n";
            $tooltip .= "cm.setColumnHeader(23,'Com');\r\n";
            $tooltip .= "cm.setColumnHeader(24,'ReqLvl');\r\n";
            $tooltip .= "cm.setColumnHeader(28,'Type');\r\n";
            $tooltip .= "cm.setColumnHeader(27,'25');\r\n";
            $tooltip .= "cm.setColumnHeader(36,'34');\r\n";
            $tooltip .= "cm.setColumnHeader(37,'35');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'36');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'37');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'38');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'39');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'40');\r\n";
            $tooltip .= "cm.setColumnHeader(43,'41');\r\n";
        }
        if($f_original==="items6" &  $i==12){
            $tooltip .= "cm.setColumnHeader(12,'Def');\r\n";
            $tooltip .= "cm.setColumnHeader(16,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(19,'Str');\r\n";
            $tooltip .= "cm.setColumnHeader(20,'Agi');\r\n";
            $tooltip .= "cm.setColumnHeader(23,'Com');\r\n";
            $tooltip .= "cm.setColumnHeader(24,'ReqLvl');\r\n";
            $tooltip .= "cm.setColumnHeader(27,'Zen');\r\n";
            $tooltip .= "cm.setColumnHeader(36,'34');\r\n";
            $tooltip .= "cm.setColumnHeader(37,'35');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'36');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'37');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'38');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'39');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'40');\r\n";
            $tooltip .= "cm.setColumnHeader(43,'41');\r\n";
        }
        if($f_original==="items6" &  $i==13){
            $tooltip .= "cm.setColumnHeader(15,'Duration');\r\n";
            $tooltip .= "cm.setColumnHeader(28,'Type');\r\n";
            $tooltip .= "cm.setColumnHeader(36,'Ice');\r\n";
            $tooltip .= "cm.setColumnHeader(37,'Poison');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'Light');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'Fire');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'Earth');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'Wind');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'Water');\r\n";
            $tooltip .= "cm.setColumnHeader(27,'25');\r\n";
        }
        if($f_original==="items6" &  $i==14){
            $tooltip .= "cm.setColumnHeader(25,'Value');\r\n";
            $tooltip .= "cm.setColumnHeader(27,'25');\r\n";
            $tooltip .= "cm.setColumnHeader(36,'34');\r\n";
            $tooltip .= "cm.setColumnHeader(37,'35');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'36');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'37');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'38');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'39');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'40');\r\n";
            $tooltip .= "cm.setColumnHeader(43,'41');\r\n";
        }
        if($f_original==="items6" &  $i==15){
            $tooltip .= "cm.setColumnHeader(21,'Ene');\r\n";
            $tooltip .= "cm.setColumnHeader(27,'Zen');\r\n";
            $tooltip .= "cm.setColumnHeader(26,'Req.Lvl');\r\n";
            $tooltip .= "cm.setColumnHeader(36,'34');\r\n";
            $tooltip .= "cm.setColumnHeader(37,'35');\r\n";
            $tooltip .= "cm.setColumnHeader(38,'36');\r\n";
            $tooltip .= "cm.setColumnHeader(39,'37');\r\n";
            $tooltip .= "cm.setColumnHeader(40,'38');\r\n";
            $tooltip .= "cm.setColumnHeader(41,'39');\r\n";
            $tooltip .= "cm.setColumnHeader(42,'40');\r\n";
            $tooltip .= "cm.setColumnHeader(43,'41');\r\n";
        }
        $cbotones .= "    var ".$paginas[$i][0]." = new Ext.Action({
            text: '<span class=\"tipos\">".$paginas[$i][1]."</span>',
            tooltip: '".$paginas[$i][2]."',
            handler: function(){
                cambiar();
                grid.store.commitChanges();
                store.load({params:{start: ".$paginas[$i][3].", limit: ".$paginas[$i][4]."}});
                ".$tooltip."
                vertipo.setText('<span class=\"tipos\">".$viendo.": ".$paginas[$i][2]."</span>');
            }
        });\n";
        $botones .=    "            ".$paginas[$i][0].",\n";
    }
    $bbar = "        bbar: [\n".substr_replace ($botones, '', -2)."\n        ],\n";
}
else
    $store = "store.load();";


?>
Ext.onReady(function(){
    Ext.QuickTips.init();

Ext.app.SearchField = Ext.extend(Ext.form.TwinTriggerField, {
    initComponent : function(){
        Ext.app.SearchField.superclass.initComponent.call(this);
        this.on('specialkey', function(f, e){
            if(e.getKey() == e.ENTER){
                this.onTrigger2Click();
            }
        }, this);
    },

    validationEvent:false,
    validateOnBlur:false,
    trigger1Class:'x-form-clear-trigger',
    trigger2Class:'x-form-search-trigger',
    hideTrigger1:true,
    width:180,
    hasSearch : false,
    paramName : 'busqueda',

    onTrigger1Click : function(){
        if(this.hasSearch){
            cambiar();
            this.el.dom.value = '';
            var o = {start: 0};
            this.store.baseParams = this.store.baseParams || {};
            this.store.baseParams[this.paramName] = '';
            this.store.reload({params:o});
            this.triggers[0].hide();
            this.hasSearch = false;
        }
    },

    onTrigger2Click : function(){
        cambiar();
        var v = this.getRawValue();
        if(v.length < 1){
            this.onTrigger1Click();
            return;
        }
        var o = {start: 0};
        this.store.baseParams = this.store.baseParams || {};
        this.store.baseParams[this.paramName] = v;
        this.store.reload({params:o});
        this.hasSearch = true;
        this.triggers[0].show();
    }
});

    var fm = Ext.form;
    var xg = Ext.grid;
    
    var sm2 = new xg.CheckboxSelectionModel({
        listeners: {
            selectionchange: function(sm) {
                if (sm.getCount()) {
                    translate.enable();
                } else {
                    translate.disable();
                }
            }
        }
    });
    
    function cambiar(){
        <?php
        if($tipo=="txt")
            echo "            var modifiedRecords = grid.store.getRange();";
        else
            echo "            var modifiedRecords = grid.store.getModifiedRecords();";
        ?>
        if (modifiedRecords.length > 0) {
            var cambios = new Array();
            for(var i = 0; i < modifiedRecords.length; i++) {
                cambios.push(modifiedRecords[i].data);
            }
            var con = new Ext.data.Connection();
            con.request({
                url: 'enco.php',
                params: {'datos': Ext.util.JSON.encode(cambios), 'archivo': '<?php echo $archivo?>', 'file': file},
                method: 'POST',
                callback: function(opts, success, response)  {
                    return;
                }
            });
        }

    }

    var cm = new Ext.grid.ColumnModel([<?php echo $cm."\n"?>
    ]);


    //top toolbar
    var vertipo = new Ext.Action({
        text: ''
    });
    <?php echo $variables?>
    
    var salvar = new Ext.Action({
        text: '<span class="tipos"><?php echo $save?> <?php echo $conf[5]?></span>',
        handler: function(){
            <?php
            if($tipo=="txt")
                echo "            var modifiedRecords = grid.store.getRange();";
            else
                echo "            var modifiedRecords = grid.store.getModifiedRecords();";
            ?>
            if (modifiedRecords.length > 0) {
                var cambios = new Array();
                for(var i = 0; i < modifiedRecords.length; i++) {
                    cambios.push(modifiedRecords[i].data);
                }
                var con = new Ext.data.Connection();
                con.request({
                    url: 'enco.php',
                    params: {'datos': Ext.util.JSON.encode(cambios), 'archivo': '<?php echo $archivo?>', 'file': file},
                    method: 'POST',
                    callback: function(opts, success, response)  {
                        if (!success || ("OK" != response.responseText)) {
                            Ext.MessageBox.alert("Error", success ?
                                response.responseText  :
                                "Error saving data - try again");
                                return;
                        }
                        else{
                            grid.store.commitChanges();
                            document.getElementById('download').src = 'download.php?archivo='+archivo+'&tipo=<?php echo $tipo?>&file='+file;
                            return;
                        }
                    }
                });
            }
        }
    });

    var buscar = new Ext.Action({
        text: '<span class="tipos">Buscar</span>',
        handler: function(){
            store.load({params:{busqueda: 'error'}});
        }
    });

    var f_lang = new Ext.data.JsonStore({
        url: '../i18n/from_langs.php',
        root: 'languages',
        fields: ['id', 'encode']
    });

    var from_encode = new Ext.form.ComboBox({
        store: f_lang,
        displayField:'encode',
        typeAhead: true,
        triggerAction: 'all',
        width:95,
        forceSelection:true
    });

    from_encode.on('select', function(newValue) {
        var con = new Ext.data.Connection();
        con.request({
            url: 'change_lang.php',
            params: {'lang_load': newValue.value},
            method: 'POST'
        });
        setTimeout(location.reload(), 500);
    });

    var to_encode = new Ext.form.ComboBox({
        store: f_lang,
        displayField:'encode',
        typeAhead: true,
        triggerAction: 'all',
        width:95,
        forceSelection:true
    });

    to_encode.on('select', function(newValue) {
        var con = new Ext.data.Connection();
        con.request({
            url: 'change_lang.php',
            params: {'lang_save': newValue.value},
            method: 'POST'
        });
        setTimeout(location.reload(), 500);
    });

    var l_trans     = sm2.getSelections();
    var l_count     = sm2.getCount();
    function traducir(i){
        if(i<l_count){
            var con = new Ext.data.Connection();
            con.request({
                url: 'googletranslate.php',
                params: {<?php echo $campos_trad;?>'text_id': l_trans[i].get("i"),'archivo':'<?php echo $f_original?>','cantidad':'<?php echo $num?>','from':btn.text,'to':btn2.text},
                method: 'GET',
                callback: function(opts, success, response)  {
                    if (!success || ("Error" == response.responseText)) {
                        i = i + <?php echo $cant_trans?>;
                        traducir(i);
                    }
                    else{
                        var partes_tans=response.responseText.split("|");
                        erecord = grid.getStore().getAt(partes_tans[0]);
                        <?php echo $campos_trad2;?>
                        sm2.deselectRow(partes_tans[0]);
                        i = i + <?php echo $cant_trans?>;
                        traducir(i);
                    }
                }
            });
        }
    }

    var translate = new Ext.Action({
        text: '<span class="tipos"><?php echo $t_translate?></span>',
        handler: function(){
            if(btn.text=="xx" || btn2.text=="xx"){
                alert("<?php echo $from_to;?>");
            }
            else{
                l_trans     = sm2.getSelections();
                l_count     = sm2.getCount();
                for(var x=0;x<<?php echo $cant_trans?>;x++) traducir(x);
            }
        },
        disabled: true
    });

<?php echo "$cbotones";?>

    cm.defaultSortable = false;

    var store = new Ext.data.JsonStore({
        url: 'deco.php?archivo=<?php  echo $archivo?>&file=<?php echo $file?>&busqueda=<?php  echo $busqueda?>',
        root: 'datos',
        fields: [
<?php echo "$field"?>

            ]
    });

    var l_flags = [{
        text:'xx',
        iconCls:'flag-xx',
        checked:true
    },{
        text:'es',
        iconCls:'flag-es',
    },{
        text:'en',
        iconCls:'flag-us'
    },{
        text:'ru',
        iconCls:'flag-ru'
    },{
        text:'ko',
        iconCls:'flag-kr'
    },{
        text:'pl',
        iconCls:'flag-pl'
    },{
        text:'pt',
        iconCls:'flag-br'
    },{
        text:'ja',
        iconCls:'flag-jp'
    },{
        text:'th',
        iconCls:'flag-th'
    }];
        
    var btn = new Ext.CycleButton({
        showText: true,
        items: l_flags
    });

    var btn2 = new Ext.CycleButton({
        showText: true,
        items: l_flags
    });

    var from = new Ext.CycleButton({
        showText: true,
        items: [{
                text:'Cod. Origen',
                iconCls:'flag-xx',
            },{
                text:'ISO-8859-1',
                iconCls:'flag-es',
<?php if($load_txt_lang=="ISO-8859-1") echo "                checked:true"; ?>
            },{
                text:'UTF-8',
                iconCls:'flag-us',
<?php if($load_txt_lang=="UTF-8") echo "                checked:true"; ?>
            },{
                text:'ISO 8859-2',
                iconCls:'flag-pl',
<?php if($load_txt_lang=="ISO 8859-2") echo "                checked:true"; ?>
            },{
                text:'windows-1251',
                iconCls:'flag-ru',
<?php if($load_txt_lang=="windows-1251") echo "                checked:true"; ?>
            },{
                text:'EUC-KR',
                iconCls:'flag-kr',
<?php if($load_txt_lang=="EUC-KR") echo "                checked:true"; ?>
            },{
                text:'ISO-8859-1',
                iconCls:'flag-br',
            },{
                text:'EUC-JA',
                iconCls:'flag-jp',
<?php if($load_txt_lang=="EUC-JA") echo "                checked:true"; ?>
            },{
                text:'windows-874',
                iconCls:'flag-th',
<?php if($load_txt_lang=="windows-874") echo "                checked:true"; ?>
            }],
        changeHandler:function(){
            if(from.text!='Cod. Origen'){
                var con = new Ext.data.Connection();
                con.request({
                    url: 'change_lang.php',
                    params: {'lang_load': from.text},
                    method: 'POST',
                    success: function(responseObject) {
                        setTimeout(location.reload(), 500);
                    }
                });
            }
        }
    });

    var to = new Ext.CycleButton({
        showText: true,
        items: [{
                text:'Cod. Destino',
                iconCls:'flag-xx',
            },{
                text:'ISO-8859-1',
                iconCls:'flag-es',
<?php if($save_txt_lang=="ISO-8859-1") echo "                checked:true"; ?>
            },{
                text:'UTF-8',
                iconCls:'flag-us',
<?php if($save_txt_lang=="UTF-8") echo "                checked:true"; ?>
            },{
                text:'ISO 8859-2',
                iconCls:'flag-pl',
<?php if($load_txt_lang=="ISO 8859-2") echo "                checked:true"; ?>
            },{
                text:'windows-1251',
                iconCls:'flag-ru',
<?php if($save_txt_lang=="windows-1251") echo "                checked:true"; ?>
            },{
                text:'EUC-KR',
                iconCls:'flag-kr',
<?php if($save_txt_lang=="EUC-KR") echo "                checked:true"; ?>
            },{
                text:'ISO-8859-1',
                iconCls:'flag-br',
            },{
                text:'EUC-JA',
                iconCls:'flag-jp',
<?php if($save_txt_lang=="EUC-JA") echo "                checked:true"; ?>
            },{
                text:'windows-874',
                iconCls:'flag-th',
<?php if($save_txt_lang=="windows-874") echo "                checked:true"; ?>
            }
        ],
        changeHandler:function(){
            if(to.text!='Cod. Destino'){
                var con = new Ext.data.Connection();
                con.request({
                    url: 'change_lang.php',
                    params: {'lang_save': to.text},
                    method: 'POST'
                });
            }
        }
    });

    var menu1 = new Ext.Toolbar.SplitButton({
        text: '<span class="tipos">Archivo</span>',
        iconCls: 'blist',
        menu : {
            items: [{
                text: '<b>Guardar</b>',
                menu: {
                    items: [
                        {
                            text: '<span class="tipos">En formato <b>.bmd</b></span>',
                            iconCls: 'ico_txt',
                            formato: 'bmd',
                            handler: guardar.createDelegate(),
                        },
                        {
                            text: '<span class="tipos">En formato <b>.bkp</b></span>',
                            iconCls: 'ico_txt',
                            formato: 'bkp',
                            handler: guardar.createDelegate(),
                        },
                        {
                            text: '<span class="tipos">En formato <b>.xls</b></span>',
                            iconCls: 'ico_xls',
                            formato: 'xls',
                            handler: guardar.createDelegate(),
                        }
                    ]
                }
            },{
                text: '<b>Combinar</b>',
                menu: {
                    items: [
                        {
                            text: '<span class="tipos">Desde archivo <b>.bmd</b></span>',
                            iconCls: 'ico_txt',
                            formato: 'bmd'
                        },
                        {
                            text: '<span class="tipos">Desde archivo <b>.bkp</b></span>',
                            iconCls: 'ico_txt',
                            formato: 'bmd'
                        },
                        {
                            text: '<span class="tipos">Desde archivo <b>.xls</b></span>',
                            iconCls: 'ico_xls',
                            formato: 'bmd'
                        }
                    ]
                }
            }
            ]
        }
    });

    var myMask = new Ext.LoadMask(Ext.getBody(), {msg:"<?php echo $loading;?>"});
    myMask.show();

    var grid = new Ext.grid.EditorGridPanel({
        store: store,
        waitMsg:'Loading',
        cm: cm,
        loadMask: myMask,
<?php
if($h_trad)
echo "        sm: sm2,\n";
?>
        renderTo: 'editor-grid',
        width: 800,
        height: 500,
<?php if($conf[0]!=-1) echo "        autoExpandColumn:'o".$conf[0]."',\r\n"; ?>
        title:'<span class="cleft"><?php  echo $conf[5]?></span><span class="cright">Magichand Mu Editor</span>',
        frame:true,
        tbar: [salvar,  
            <?php if($buscar==1) echo "'  ', new Ext.app.SearchField({ store: store, width:240 }),  ";?> <?php if($h_trad) echo " btn, translate, btn2,'-', from, to, \n";?> 
            '->', vertipo
        ],
        <?php  echo $bbar?>
        stripeRows: true,    
        view: new Ext.ux.BufferView({
            rowHeight: 19,
            scrollDelay: false
        }),

        columnLines : true,
        clicksToEdit:2
    });
<?php  echo $store?>

   function TamVentana() {
      var Tamanyo = [0, 0];
      if (typeof window.innerWidth != 'undefined')
      {
        Tamanyo = [
            window.innerWidth,
            window.innerHeight
        ];
      }
      else if (typeof document.documentElement != 'undefined'
          && typeof document.documentElement.clientWidth !=
          'undefined' && document.documentElement.clientWidth != 0)
      {
     Tamanyo = [
            document.documentElement.clientWidth,
            document.documentElement.clientHeight
        ];
      }
      else   {
        Tamanyo = [
            document.getElementsByTagName('body')[0].clientWidth,
            document.getElementsByTagName('body')[0].clientHeight
        ];
      }
      return Tamanyo;
    }
    var Tam = TamVentana();
    grid.setSize(Tam[0],Tam[1]);

    window.onresize = function() {
        var Tam = TamVentana();
        grid.setSize(Tam[0],Tam[1]);
    };
    function guardar(formato){
        if(formato.formato == 'bmd'){
            var fileurl = 'enco.php';
            var Records = grid.store.getModifiedRecords();
        }
        else{
            var fileurl = 'save.php';
            var Records = grid.store.getRange();
        }
        if (Records.length > 0) {
            var cambios = new Array();
            for(var i = 0; i < Records.length; i++) {
                cambios.push(Records[i].data);
            }
            var con = new Ext.data.Connection();
            con.request({
                url: fileurl,
                params: {'datos': Ext.util.JSON.encode(cambios), 'archivo': '<?php echo $archivo?>', 'file': file, 'formato': formato.formato},
                method: 'POST',
                callback: function(opts, success, response)  {
                    if (!success || ("OK" != response.responseText)) {
                        Ext.MessageBox.alert("Error", success ?
                            response.responseText  :
                            "Error saving data - try again");
                            return;
                    }
                    else{
                        if(formato.formato == 'bmd'){
                            document.getElementById('download').src = 'download.php?archivo='+archivo+'&tipo=<?php echo $tipo?>&file='+file;
                            grid.store.commitChanges();
                        }
                        if(formato.formato == 'bkp')
                            document.getElementById('download').src = 'download.php?archivo='+archivo+'&tipo=<?php echo $tipo?>&file='+file+'&backup=bkp';
                        if(formato.formato == 'xls')
                            document.getElementById('download').src = 'download.php?archivo='+archivo+'&tipo=<?php echo $tipo?>&file='+file+'&backup=xls';
                        return;
                    }
                }
            });
        }
    }
});
<?php
require_once('session.php');
include("../i18n/".$lang."/locale/text.php");
$web     = $_REQUEST['web'];
$archivo = $_REQUEST['archivo'];
$file    = $_REQUEST['file'];
$file2   = $_REQUEST['file2'];
$tipo    = $_REQUEST['tipo'];
$alto    = 150;
$archivo2 = $archivo;
if(substr($archivo, -2)=="s6") $archivo2 = substr($archivo, 0, -2);
if(substr($archivo, -3)=="scf") $archivo2 = substr($archivo, 0, -3);
if($archivo=="skills6") $archivo2 = "skill";

?>
Ext.onReady(function(){

    Ext.QuickTips.init();

    var bd = Ext.getBody();

    var fp = new Ext.FormPanel({
        fileUpload: true,
        width: 500,
        frame: true,
        url: 'upload.php',
        title: '<?php echo $upload2;?>',
        autoHeight: true,
        bodyStyle: 'padding: 10px 10px 0 10px;',
        labelWidth: 50,
        items: [{
            anchor: '100%',
            xtype: 'fileuploadfield',
            id: 'form-file',
            emptyText: '<?php echo $select;?> <?php echo $archivo2;?>(xxx).<?php echo $tipo;?>',
            fieldLabel: 'File',
            validator : function(v) {
                        var split_path = v.split("\\");
                        var nombre = split_path[split_path.length - 1];
                        if (!/<?php echo $archivo2;?>/i.test(nombre) || !/\.<?php echo $tipo;?>$/i.test(nombre)) {
                            return 'Archivos del tipo <?php echo $archivo2;?><b>xxx</b>.<?php echo $tipo;?>.';
                        }
                        return true;
                    },
            name: 'file',
            buttonText: '<?php echo $select2;?>'
        }<?php if(($web == "export_bmd_txt" || $web == "export_txt_bmd") && ($archivo2 =="item" || $archivo=="JewelOfHarmonyOption" || $archivo=="skill" || $archivo=="skills6")){ 
            $alto = 175; 
            ($tipo == "bmd") ? ($tipo2 = "txt") : ($tipo2 = "bmd");
        ?>,{
            anchor: '100%',
            xtype: 'fileuploadfield',
            id: 'form-file2',
            emptyText: '<?php echo $select;?> <?php echo $archivo2;?>(xxx).<?php echo $tipo2;?>',
            fieldLabel: 'File 2',
            name: 'file2',
            buttonText: '<?php echo $select2;?>'
        }<?php }?><?php if(($archivo == "DecTerrain")){ 
            $alto = 175; 
            $mapa = "+'&map='+ Ext.getCmp(\"map\").getValue()";
        ?>,{
            anchor: '86%',
            xtype: 'textfield',
            id: 'map',
            emptyText: '<?php echo $map_num;?>',
            fieldLabel: '<?php echo $map;?>',
            name: 'map'
        }<?php }?>],
        buttons: [{
            text: '<?php echo $upload;?>',
            handler: function(){
                if(fp.getForm().isValid()){
                    fp.getForm().submit({
                        waitMsg: 'Subiendo Archivo...',
                        success: function(fp, o){
                            var partes = o.result.files.split("|");
                            var partes2 = o.result.files;
                            self.location='<?php echo $web;?>.php?archivo=<?php echo $archivo;?>&file='+partes[0]+'&tipo=<?php echo $tipo;?>&file2='+partes[1]<?php echo $mapa;?>;
                        },
                        failure: function(gridForm, o) {
                            Ext.Msg.alert('Error', '<?php echo $tryagain;?>');
                        }
                    });
                }
            }
        }]
    });
    
    var vent = new Ext.Window({
        applyTo:'ventana',
        layout:'fit',
        width:500,
        height:<?php echo $alto;?>,
        closeAction:'hide',
        plain: true,
        border: false,
        items: fp
    });
    vent.show();
});
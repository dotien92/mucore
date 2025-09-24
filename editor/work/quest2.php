<?php
require_once('session.php');

$archivo  = $_REQUEST['archivo'];
$file     = $_REQUEST['file'];
$tipo     = $_REQUEST['tipo'];
include("../i18n/".$lang."/locale/text.php");
include("funciones.php");
$archivo1 = version_file($archivo, $file);

?>
Ext.onReady(function(){

    Ext.QuickTips.init();
    var archivo = '<?php echo $archivo?>';
    var file    = '<?php echo $file?>';
    
    var store = new Ext.data.GroupingStore({
        proxy: new Ext.data.HttpProxy({
            url: 'deco_quest.php?dato=lista&file='+file+'&archivo='+archivo, 
            method: 'POST'
        }),            
        reader: new Ext.data.JsonReader({
            root: 'datos'
        },
        [ 
            {name: 'i', type: 'int'},
            {name: 'e', type: 'int'},
            {name: 'o0'}
        ])
    });

    store.load();

    var store2 = new Ext.data.GroupingStore({
        proxy: new Ext.data.HttpProxy({
            url: 'deco_quest.php', 
            method: 'POST'
        }),            
        reader: new Ext.data.JsonReader({
            root: 'datos'
        },
        [ 
            {name: 'i', type: 'int'},
            {name: 'e', type: 'int'},
            {name: 'o0', type: 'int'},
            {name: 'o1', type: 'int'},
            {name: 'o2', type: 'int'},
            {name: 'o3', type: 'int'},
            {name: 'o4', type: 'int'},
            {name: 'o5', type: 'int'},
            {name: 'o6', type: 'int'},
            {name: 'o7', type: 'int'},
            {name: 'o8', type: 'int'},
            {name: 'o9', type: 'int'},
            {name: 'o10', type: 'int'},
            {name: 'o11', type: 'int'},
            {name: 'o12', type: 'int'},
            {name: 'o13', type: 'int'},
            {name: 'o14', type: 'int'},
            {name: 'o15', type: 'int'},
            {name: 'o16', type: 'int'},
            {name: 'o17', type: 'int'}
        ])
    });

    var store3 = new Ext.data.GroupingStore({
        proxy: new Ext.data.HttpProxy({
            url: 'deco_quest.php', 
            method: 'POST'
        }),            
        reader: new Ext.data.JsonReader({
            root: 'datos'
        },
        [ 
            {name: 'i', type: 'int'},
            {name: 'e', type: 'int'},
            {name: 'o0', type: 'int'},
            {name: 'o1', type: 'int'},
            {name: 'o2', type: 'int'},
            {name: 'o3', type: 'int'},
            {name: 'o4', type: 'int'},
            {name: 'o5', type: 'int'},
            {name: 'o6', type: 'int'},
            {name: 'o7', type: 'int'}
        ])
    });

    var gridForm = new Ext.FormPanel({
        id: 'company-form',
        frame: true,
        title:'<span class="cleft">Quest.bmd</span><span class="cright">Magichand Mu Editor</span>',
        labelAlign: 'top',
        bodyStyle:'padding:0px',
        width: 1020,
        height: 600,
        layout: 'column',
        buttons: [{
            text: '<b>Guardar</b>',
            handler: function(){
                var rulesUsed2    = store2.getRange();
                var cambiosrules2 = new Array();
                for(var i = 0; i < rulesUsed2.length; i++) {
                    cambiosrules2.push(rulesUsed2[i].data);
                }
                var rulesUsed3    = store3.getRange();
                var cambiosrules3 = new Array();
                for(var i = 0; i < rulesUsed3.length; i++) {
                    cambiosrules3.push(rulesUsed3[i].data);
                }
                var con2 = new Ext.data.Connection();
                con2.request({
                    url: 'enco_quest.php',
                    params: {'dato2': Ext.util.JSON.encode(cambiosrules2),
                        'dato3': Ext.util.JSON.encode(cambiosrules3),
                        'id': Ext.getCmp("id").getValue(),
                        'cc1': Ext.getCmp("cc1").getValue(),
                        'cc2': Ext.getCmp("cc2").getValue(),
                        'cc3': Ext.getCmp("cc3").getValue(),
                        'cc4': Ext.getCmp("cc4").getValue(),
                        'archivo': archivo, 
                        'file': file
                    },
                    method: 'POST',
                    callback: function(opts, success, response)  {
                        if (!success || ("OK" != response.responseText)) {
                            Ext.MessageBox.alert("Error", success ? response.responseText : "Error Translating - try again");
                            return;
                        }
                        else{
                            store2.commitChanges();
                            store3.commitChanges();
                            document.getElementById('download').src = 'download.php?archivo='+archivo+'&tipo=<?php echo $tipo?>&file='+file;
                            return;

                        }
                    }
                });
            }
        }],
        items: [{
            columnWidth: 0.20,
            layout: 'fit',
            items: {
                xtype: 'grid',
                store: store,
                id: 'tabla',
                frame: true,
                stripeRows: true,
                columns: [
                    {id:'combinacion',header: '', width: 120, sortable: false, dataIndex: 'o0',menuDisabled: true}
                ],
                view: new Ext.grid.GroupingView({
                    forceFit:true
                }),
                sm: new Ext.grid.RowSelectionModel({
                    singleSelect: true,
                    listeners: {
                        rowselect: function(sm, row, rec) {
//                            Ext.getCmp("tit").setRawValue(rec.data.t);
                            var con = new Ext.data.Connection();
                            con.request({
                                url: 'deco_quest.php?dato=datos',
                                params: {'id': rec.data.i,'file': file,'archivo': archivo},
                                method: 'POST',
                                callback: function(opts, success, response)  {
                                    if (!success || ("error" == response.responseText)) {
                                        Ext.MessageBox.alert("Error", success ?
                                            response.responseText  :
                                            "Error saving data - try again");
                                            return;
                                    }
                                    else{
                                        var partes = response.responseText.split("|");
                                        Ext.getCmp("id").setRawValue(rec.data.i);
                                        Ext.getCmp("cc1").setRawValue(partes[1]);
                                        Ext.getCmp("cc2").setRawValue(partes[2]);
                                        Ext.getCmp("cc3").setRawValue(partes[3]);
                                        Ext.getCmp("cc4").setRawValue(partes[4]);
                                        store2.load({params:{'id': rec.data.i,'dato': 'lista2','file': file,'archivo': archivo}});
                                        store3.load({params:{'id': rec.data.i,'dato': 'lista3','file': file,'archivo': archivo}});
                                        return;
                                    }
                                }
                            });
                        }
                    }
                }),
                height: 520,
                title:'Lista de Quest',
                border: true,
                listeners: {
                    viewready: function(g) {
                        g.getSelectionModel().selectRow(0);
                    }
                }
            }
        },{
            columnWidth: 0.18,
            xtype: 'fieldset',
            labelWidth: 150,
            header: true,
            defaults: {width: 160, border:true},
            autoHeight: true,
            bodyStyle: Ext.isIE ? 'padding:0 0 5px 5px;' : 'padding:10px 5px;',
            style: {
                "margin-left": "5px",
                "margin-right": Ext.isIE6 ? (Ext.isStrict ? "-10px" : "-13px") : "5px"
            },
            border: false,
            frame:true,
            items: [{
                    fieldLabel: 'ID',
                    xtype: 'hidden',
                    height: 20,
                    id: 'id',
                    name: 't'
                },{
                    fieldLabel: '<span class="tipos">Cant. Objetos de Mision</span>',
                    xtype: 'textfield',
                    height: 20,
                    id: 'cc1',
                    name: 't'
                },{
                    fieldLabel: '<span class="tipos">Type ...</span>',
                    xtype: 'textfield',
                    height: 20,
                    id: 'cc2',
                    name: 't'
                },{
                    fieldLabel: '<span class="tipos">NPC Number</span>',
                    xtype: 'textfield',
                    height: 20,
                    id: 'cc3',
                    name: 't'
                },{
                    fieldLabel: '<span class="tipos">Nombre de la Busqueda</span>',
                    xtype: 'textfield',
                    height: 20,
                    id: 'cc4',
                    name: 't'
                }]
        },{
        columnWidth: 0.60,
        layout: 'anchor',
        items: [{
            xtype: 'editorgrid',
            store: store3,
            id: 'tabla3',
            stripeRows: true,
            columns: [{
                    id:'id_rule',
                    header: "Quest", 
                    width: 40, 
                    sortable: false, 
                    dataIndex: 'o0',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header:  "Tipo", width: 40, sortable: false, dataIndex: 'o1',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Quest Index", width: 75, sortable: false, dataIndex: 'o2',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Min lvl", width: 50, sortable: false, dataIndex: 'o3',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Max lvl", width: 50, sortable: false, dataIndex: 'o4',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Need Str", width: 60, sortable: false, dataIndex: 'o5',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Need Zen", width: 60, sortable: false, dataIndex: 'o6',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Mensaje", width: 60, sortable: false, dataIndex: 'o7',menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                }
            ],
            height: 250,
            style: {
                "padding-bottom": "10px",
            },
            title:'Requerimientos para hacer la Quest',
            border: true,
            frame:true,
        },{
            xtype: 'editorgrid',
            store: store2,
            id: 'tabla2',
            stripeRows: true,    
            columns: [{
                    id:'listab1',
                    header: "...", 
                    width: 20, 
                    sortable: false, 
                    dataIndex: 'o0',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: false
                    })
                },{
                    header: "Quest<br />Type", 
                    width: 35, 
                    sortable: false, 
                    dataIndex: 'o1',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "Item<br />Type", 
                    width: 34, 
                    sortable: false, 
                    dataIndex: 'o2',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "Item<br />Index", 
                    width: 34, 
                    sortable: false, 
                    dataIndex: 'o3',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "Item<br />lvl", 
                    width: 30, 
                    sortable: false, 
                    dataIndex: 'o4',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "Cantidad<br />Item", 
                    width: 55, 
                    sortable: false, 
                    dataIndex: 'o5',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "...", 
                    width: 20, 
                    sortable: false, 
                    dataIndex: 'o6',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "DW", 
                    width: 25, 
                    sortable: false, 
                    dataIndex: 'o7',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "DK", 
                    width: 25, 
                    sortable: false, 
                    dataIndex: 'o8',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "FE", 
                    width: 25, 
                    sortable: false, 
                    dataIndex: 'o9',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "MG", 
                    width: 25, 
                    sortable: false, 
                    dataIndex: 'o10',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "DL", 
                    width: 25, 
                    sortable: false, 
                    dataIndex: 'o11',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "SU", 
                    width: 25, 
                    sortable: false, 
                    dataIndex: 'o12',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                }<?php if($archivo1=="Quest2"){?>,{
                    header: "NEW PJ", 
                    width: 39, 
                    sortable: false, 
                    dataIndex: 'o13',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                }<?php }?>,{
                    header: "MSG1", 
                    width: 39, 
                    sortable: false, 
                    dataIndex: '<?php if($archivo1=="Quest2") echo "o14"; else echo "o13";?>',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "MSG2", 
                    width: 39, 
                    sortable: false, 
                    dataIndex: '<?php if($archivo1=="Quest2") echo "o15"; else echo "o14";?>',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "MSG3", 
                    width: 39, 
                    sortable: false, 
                    dataIndex: '<?php if($archivo1=="Quest2") echo "o16"; else echo "o15";?>',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                },{
                    header: "MSG4", 
                    width: 39, 
                    sortable: false, 
                    dataIndex: '<?php if($archivo1=="Quest2") echo "o17"; else echo "o16";?>',
                    menuDisabled: true,
                    align: 'right',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowNegative: false,
                        allowDecimals: true
                    })
                }
            ],
            height: 250,
            title:'Objeto de la Mision (Items o Mobs)',
            border: true,
            frame:true,
        }]
        }],
        renderTo: "editor-grid"
    });
});
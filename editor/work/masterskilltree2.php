<?php
require_once('session.php');

$archivo  = $_REQUEST['archivo'];
$file     = $_REQUEST['file'];
$tipo     = $_REQUEST['tipo'];
include("../i18n/".$lang."/locale/text.php");

?>
Ext.onReady(function(){

    Ext.QuickTips.init();
    var archivo = '<?php echo $archivo?>';
    var file    = '<?php echo $file?>';
    
    var store2 = new Ext.data.GroupingStore({
        proxy: new Ext.data.HttpProxy({
            url: 'deco_masterskilltree.php?archivo='+archivo+'&file='+file+'&dato=lista2', 
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
            {name: 'o17', type: 'int'},
            {name: 'o18', type: 'int'},
            {name: 'o19', type: 'int'},
            {name: 'o20', type: 'int'},
            {name: 'o21', type: 'int'},
            {name: 'o22', type: 'int'},
            {name: 'o23', type: 'int'},
            {name: 'o24', type: 'int'},
            {name: 'o25', type: 'int'},
            {name: 'o26', type: 'int'},
            {name: 'o27', type: 'int'},
            {name: 'o28', type: 'int'},
            {name: 'o29', type: 'int'},
            {name: 'o30', type: 'int'},
            {name: 'o31', type: 'int'},
            {name: 'o32', type: 'int'}
        ])
    });

    store2.load();

    var store3 = new Ext.data.GroupingStore({
        proxy: new Ext.data.HttpProxy({
            url: 'deco_masterskilltree.php?archivo='+archivo+'&file='+file+'&dato=lista3', 
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
            {name: 'o4', type: 'int'}
        ])
    });

    store3.load();
    
    var gridForm = new Ext.FormPanel({
        id: 'company-form',
        frame: true,
        title:'<span class="cleft">MasterSkillTree.bmd</span><span class="cright">Magichand Mu Editor</span>',
        labelAlign: 'top',
        bodyStyle:'padding:0px',
        width: 1020,
        height: 600,
        layout: 'column',
        buttons: [{
            text: '<b><?php echo $save;?></b>',
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
                    url: 'enco_masterskilltree.php',
                    params: {'dato2': Ext.util.JSON.encode(cambiosrules2),
                        'dato3': Ext.util.JSON.encode(cambiosrules3),
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
            columnWidth: 0.13,
            layout: 'fit',
            items: {
                xtype: 'editorgrid',
                store: store3,
                id: 'tabla3',
                stripeRows: true,
                columns: [{
                        id:'id_rule',
                        header: "1", 
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
                        header:  "2", width: 20, sortable: false, dataIndex: 'o1',menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },{
                        header: "3", width: 20, sortable: false, dataIndex: 'o2',menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },{
                        header: "4", width: 20, sortable: false, dataIndex: 'o3',menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },{
                        header: "5", width: 20, sortable: false, dataIndex: 'o4',menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    }
                ],
                height: 300,
                style: {
                    "padding-bottom": "0px",
                },
                title:'<?php echo $parte;?> 1',
                border: true,
                frame:true,
            }
        },{
            columnWidth: 0.87,
            layout: 'fit',
            items: {
                xtype: 'editorgrid',
                store: store2,
                id: 'tabla2',
                stripeRows: true,    
                columns: [{
                        id:'listab1',
                        header: "1", 
                        width: 15, 
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
                        header: "2", 
                        width: 38, 
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
                        header: "3", 
                        width: 30, 
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
                        header: "4", 
                        width: 18, 
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
                        header: "5", 
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
                        header: "6", 
                        width: 30, 
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
                        header: "7", 
                        width: 30, 
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
                        header: "8", 
                        width: 40, 
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
                        header: "9", 
                        width: 40, 
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
                        header: "10", 
                        width: 40, 
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
                        header: "11", 
                        width: 30, 
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
                        header: "12", 
                        width: 20, 
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
                        header: "13", 
                        width: 30, 
                        sortable: false, 
                        dataIndex: 'o12',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "14", 
                        width: 40, 
                        sortable: false, 
                        dataIndex: 'o13',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "15", 
                        width: 30, 
                        sortable: false, 
                        dataIndex: 'o14',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "16", 
                        width: 30, 
                        sortable: false, 
                        dataIndex: 'o15',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "17", 
                        width: 40, 
                        sortable: false, 
                        dataIndex: 'o16',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "18", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o17',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "19", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o18',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "20", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o19',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "21", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o20',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "22", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o21',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "23", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o22',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "24", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o23',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "25", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o24',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "26", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o25',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "27", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o26',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "28", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o27',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "29", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o28',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "30", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o29',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "31", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o30',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "32", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o31',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    },{
                        header: "33", 
                        width: 20, 
                        sortable: false, 
                        dataIndex: 'o32',
                        menuDisabled: true,
                        align: 'right',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: true
                        })
                    }
                ],
                height: 510,
                title:'<?php echo $parte;?> 2',
                border: true,
                frame:true,
            }
        }],
        renderTo: "editor-grid"
    });
});
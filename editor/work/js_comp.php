<?php
require_once('session.php');

$archivo  = $_REQUEST['archivo'];
$file     = $_REQUEST['file'];
$f_original= preg_replace("[^A-Za-z]", "", $archivo);
include("../i18n/".$lang."/locale/text.php");

?>
Ext.onReady(function(){

    Ext.QuickTips.init();
    var archivo = '<?php echo $f_original?>';
    var file    = '<?php echo $file?>';
    
    var store2 = new Ext.data.GroupingStore({
      proxy: new Ext.data.HttpProxy({
                url: 'deco_comp.php', 
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
        {name: 'o10', type: 'int'}
      ])
    });

    var store3 = new Ext.data.GroupingStore({
      proxy: new Ext.data.HttpProxy({
                url: 'deco_comp.php', 
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
        {name: 'o10', type: 'int'}
      ])
    });

    function resaltar_dif(data, cell, record, rowIndex, columnIndex, store){
        var diff = Ext.util.Format.substr(data, 0, 1);
        var text = Ext.util.Format.substr(data, 1, 100);
        if(diff == 2){
            cell.css = "redcell";
            return '<span style="color:red; font-weight: bold">' + text + '</span>';
        }else{
            return text;
        }
    }


    var gridForm = new Ext.FormPanel({
        id: 'company-form',
        frame: true,
        title:'<span class="cleft">Mix.bmd</span><span class="cright">Magichand Mu Editor</span>',
        labelAlign: 'left',
        bodyStyle:'padding:0px',
        width: 1020,
        height: 600,
        layout: 'column',
        items: [{
            columnWidth: 0.50,
            layout: 'fit',
            items: {
                xtype: 'grid',
                store: store2,
                id: 'tabla2',
                stripeRows: true,
                singleSelect: false,
                columns: [
                    {
                        id:'id_rule',
                        header: "StartId", 
                        width: 40, 
                        sortable: false, 
                        dataIndex: 'o0',
                        menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header:  "EndId", width: 40, sortable: false, dataIndex: 'o1',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "Minlvl", width: 40, sortable: false, dataIndex: 'o2',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "Maxlvl", width: 45, sortable: false, dataIndex: 'o3',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MinOpt", width: 42, sortable: false, dataIndex: 'o4',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MaxOpt", width: 45, sortable: false, dataIndex: 'o5',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MinDur", width: 45, sortable: false, dataIndex: 'o6',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MaxDur", width: 45, sortable: false, dataIndex: 'o7',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MinCnt", width: 45, sortable: false, dataIndex: 'o8',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MaxCnt", width: 45, sortable: false, dataIndex: 'o9',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header:   "Type", width: 35, sortable: false, dataIndex: 'o10',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    }
                ],
                height: 520,
                style: {
                    "padding-left": "5px",
                },
                title:'Items Usados',
                border: true,
                frame:true,
            }
        },{
            columnWidth: 0.50,
            layout: 'fit',
            items: {
                xtype: 'editorgrid',
                store: store3,
                id: 'tabla3',
                stripeRows: true,
                columns: [
                    {
                        id:'id_rule',
                        header: "StartId", 
                        width: 40, 
                        sortable: false, 
                        dataIndex: 'o0',
                        menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header:  "EndId", width: 40, sortable: false, dataIndex: 'o1',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "Minlvl", width: 40, sortable: false, dataIndex: 'o2',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "Maxlvl", width: 45, sortable: false, dataIndex: 'o3',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MinOpt", width: 42, sortable: false, dataIndex: 'o4',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MaxOpt", width: 45, sortable: false, dataIndex: 'o5',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MinDur", width: 45, sortable: false, dataIndex: 'o6',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MaxDur", width: 45, sortable: false, dataIndex: 'o7',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MinCnt", width: 45, sortable: false, dataIndex: 'o8',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header: "MaxCnt", width: 45, sortable: false, dataIndex: 'o9',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    },
                    {header:   "Type", width: 35, sortable: false, dataIndex: 'o10',menuDisabled: true,
                        align: 'right',
                        renderer: resaltar_dif,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowNegative: false,
                            allowDecimals: false
                        })
                    }
                ],
                height: 520,
                style: {
                    "padding-left": "5px",
                },
                title:'Items Usados',
                border: true,
                frame:true
            }
        }],
        renderTo: "editor-grid"
    });
    store2.load({params:{'dato': 'lista2','file': file}});
    store3.load({params:{'dato': 'lista3','file': file}});

    Ext.getCmp('tabla2').on('bodyscroll', function(scrollLeft, scrollTop){
        var state = Ext.getCmp('tabla3').getView().getScrollState();
        state.left = scrollLeft;
        state.top  = scrollTop;
        Ext.getCmp('tabla3').getView().restoreScroll(state);
    });
});
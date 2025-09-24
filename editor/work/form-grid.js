Ext.onReady(function(){

    Ext.QuickTips.init();

    var bd = Ext.getBody();


	var ds = new Ext.data.JsonStore({
		url: 'files2.php?tipo=main',
		root: 'datos',
		fields: [
            {name: 'file'}
		]
	});
    ds.load();

    var colModel = new Ext.grid.ColumnModel([
        {id:'titulo', width: 182, sortable: true, locked:false, dataIndex: 'file', menuDisabled: true}
    ]);

    var gridForm = new Ext.FormPanel({
        id: 'company-form',
        frame: true,
        labelAlign: 'Left',
        bodyStyle:'padding:0px',
        width: 540,
	height: 300,
        layout: 'column',
        items: [{
            columnWidth: 0.35,
            layout: 'fit',
            items: {
                xtype: 'grid',
                ds: ds,
				id: 'tabla',
                cm: colModel,
                sm: new Ext.grid.RowSelectionModel({
                    singleSelect: true,
                    listeners: {
                        rowselect: function(sm, row, rec) {
							var con = new Ext.data.Connection();
							con.request({
								url: 'val_main.php',
								params: {'main': rec.data.file},
								method: 'POST',
								callback: function(opts, success, response)  {
									if (!success || ("error" == response.responseText)) {
										Ext.MessageBox.alert("Error", success ?
											response.responseText  :
											"Error - try again");
											return;
									}
									else{
										var partes = response.responseText.split("|");
										Ext.getCmp("main").setRawValue(partes[0]);
										Ext.getCmp("ver").setRawValue(partes[1]);
										var cod_ver = '';
										for(var i=0;i<5;i++) cod_ver += partes[1].charCodeAt(i) - 49 - i;
										var ver2 = cod_ver.substr(0,1) + '.' + cod_ver.substr(1,2) + '.' + cod_ver.substr(3,2);
										Ext.getCmp("ver2").setRawValue(ver2);
										Ext.getCmp("ser").setRawValue(partes[2]);
										Ext.getCmp("ip").setRawValue(partes[3]);
										Ext.getCmp("port").setRawValue(partes[4]);
										return;
									}
								}
							});
                        }
                    }
                }),
                height: 280,
                title:'Main',
                border: true,
                listeners: {
                    viewready: function(g) {
                        g.getSelectionModel().selectRow(0);
                    }
                }
            }
        },{
            columnWidth: 0.65,
            xtype: 'fieldset',
            labelWidth: 90,
            defaults: {width: 200, border:false},
            autoHeight: true,
            bodyStyle: Ext.isIE ? 'padding:0 0 5px 15px;' : 'padding:10px 15px;',
            border: false,
            style: {
                "margin-left": "10px",
                "margin-right": Ext.isIE6 ? (Ext.isStrict ? "-10px" : "-13px") : "0"
            },
            items: [{
				fieldLabel: 'Main',
				xtype: 'textfield',
				height: 20,
				id: 'main',
				disabled: true,
				name: 't'
			},{
				fieldLabel: 'Versión Main',
				xtype: 'textfield',
				height: 20,
				id: 'ver',
				name: 't'
			},{
				fieldLabel: 'Versión Server',
				xtype: 'textfield',
				height: 20,
				id: 'ver2',
				name: 't'
			},{
                fieldLabel: 'Serial',
				xtype: 'textfield',
				height: 20,
				id: 'ser',
                name: 'e'
            },{
                fieldLabel: 'IP',
				xtype: 'textfield',
				height: 20,
				id: 'ip',
                name: 'p'
            },{
                fieldLabel: 'Port',
				xtype: 'textfield',
				height: 20,
				id: 'port',
                name: 'p'
            }],
			buttons: [{
				text: 'Main >> Server',
				handler: function(){
					var cod_ver = '';

					for(var i=0;i<5;i++) cod_ver += Ext.getCmp("ver").getValue().charCodeAt(i) - 49 - i;
					var ver2 = cod_ver.substr(0,1) + '.' + cod_ver.substr(1,2) + '.' + cod_ver.substr(3,2);
					Ext.getCmp("ver2").setRawValue(ver2);
				}
			},{
				text: 'Server >> Main',
				handler: function(){
					var cod_ver = '';
					
					var ver = Ext.getCmp("ver2").getValue().replace(/\./g, "");
					for(var i=0;i<5;i++) cod_ver += String.fromCharCode(parseInt(ver.charAt(i)) + 49 + i);
					Ext.getCmp("ver").setRawValue(cod_ver);
				}
			},{
				text: 'Guardar',
				handler: function(){
					document.getElementById('download').src = 'val_main.php?save=ok&main='+Ext.getCmp("main").getValue()+'&ver='+Ext.getCmp("ver").getValue()+'&ser='+Ext.getCmp("ser").getValue()+'&ip='+Ext.getCmp("ip").getValue()+'&port='+Ext.getCmp("port").getValue();
				}
			}]
        }],
        renderTo: bd
    });
});
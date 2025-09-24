Ext.ns('Ext.ux');

    Ext.getBody().on("contextmenu", Ext.emptyFn, null, {preventDefault: true});
    var meditar = new Ext.Action({
        text: '<span class="tipos">Editar</span>'
    });
    var meserver= new Ext.Action({
        text: '<span class="tipos">Exportar al server</span>'
    });
    var mconxls = new Ext.Action({
        text: '<span class="tipos">Convertir a formato XLS</span>'
    });
    var mfixmov = new Ext.Action({
        text: '<span class="tipos">Fix cantidad de moves</span>'
    });
    var mfixsli = new Ext.Action({
        text: '<span class="tipos">Fix cantidad de slides to show</span>'
    });
    var mexpatt = new Ext.Action({
        text: '<span class="tipos">Exportar .att al server</span>'
    });
    var mde3map = new Ext.Action({
        text: '<span class="tipos">Decodificar .map en 3 capas</span>'
    });
    var mco3map = new Ext.Action({
        text: '<span class="tipos">Codificar 3 .map</span>'
    });
    var mcliatt = new Ext.Action({
        text: '<span class="tipos">Exportar .att al cliente</span>'
    });
    var mmain   = new Ext.Action({
        text: '<span class="tipos">Cambiar IP, Serial, Version</span>'
    });
    var mconjpg = new Ext.Action({
        text: '<span class="tipos">Convertir a .jpg</span>'
    });
    var mcontga = new Ext.Action({
        text: '<span class="tipos">Convertir a .tga</span>'
    });
    var mconbmp = new Ext.Action({
        text: '<span class="tipos">Convertir a .bmp</span>'
    });
    var mconozj = new Ext.Action({
        text: '<span class="tipos">Convertir a .ozj</span>'
    });
    var mconozt = new Ext.Action({
        text: '<span class="tipos">Convertir a .ozt</span>'
    });
    var mconozb = new Ext.Action({
        text: '<span class="tipos">Convertir a .ozb</span>'
    });
    var mintgra = new Ext.Action({
        text: '<span class="tipos">Ver interface para graficos</span>'
    });
    var mveresp = new Ext.Action({
        text: '<span class="tipos">Ver especificaciones</span>'
    });
    var mpasbmd = new Ext.Action({
        text: '<span class="tipos">Pasar a .bmd</span>'
    });
    var mdown   = new Ext.Action({
        text: '<span class="tipos">Descargar Archivo</span>'
    });	
Ext.ux.FileManager = Ext.extend(Ext.Window,{
	title: '<span class="titulo">Mu Editor MagicHand (Juan Perez) / Logout</span>',
	layout: 'border',
	width: 900,
	height:500,
	url: '/',
	closable: false,
	multiSelect: false,
	singleSelect:true,
	draggable: false,
	resizable: false,
	params: {},
	root: '/',
	filters: null,

	text: {
		location: 'Location',
		root: 'Archivos',
		required: 'You must provide an URL where this component load the files',
		loading: 'Loading files... please wait.'
	},
	
	initComponent: function(){
		//the url is required!!
		if(Ext.isEmpty(this.url)){
			throw this.text.required;
		}
		
		this.tbar = [
		       this.text.location,' ',
		       {xtype:'textfield',width:300,id:this.id+'AddresBar',value:this.root,enableKeyEvents:true,listeners:{scope:this,specialkey: function(f,e){ if(e.getKey()==e.ENTER){ this.gotoUrl(); }}}},' ',
		       {iconCls:'up-icon',text:'Up Directory',handler:this.upDirectory,scope:this},
		       {iconCls:'up-file',text:'Upload File',handler:this.upDirectory,scope:this},
		       {iconCls:'up-icon',text:'Help',handler:this.upDirectory,scope:this},
		       {iconCls:'up-icon',text:'Select Languaje',handler:this.upDirectory,scope:this},
		       {iconCls:'up-icon',text:'Hacer Una Sugerencia',handler:this.upDirectory,scope:this},
		 ];
		
		this.nav = new Ext.tree.TreePanel({
			region: 'west',
			width:180,
			collapsible: true,
			split: true,
			tbar:[
			      {text:'Expand All',iconCls:'expand-icon',handler:function(){this.nav.expandAll();},scope:this},
			      {text:'Collapse All',iconCls:'collapse-icon',handler:function(){this.nav.collapseAll();},scope:this}
			],
			margins     : '3 0 3 3',
	        cmargins    : '3 3 3 3',
			dataUrl: this.url,
		 	autoScroll: true
		});

		this.nav.getLoader().on("beforeload", function(treeLoader, node) {
			treeLoader.baseParams = Ext.apply(treeLoader.baseParams,this.params);
	    },this);
		
		var rootNode = new Ext.tree.AsyncTreeNode({
		   	text: this.text.root,
		   	draggable:false
    	});
		this.nav.setRootNode(rootNode);
		
		this.filesStore = new Ext.data.JsonStore({
			url: this.url,
			fields: ['text','url','iconCls','isFolder','id','q_menu'],
			root: 'files'
		});
		this.filesStore.load({
			params: Ext.apply({
				path: this.root,
				isForMainPanel: true,
				filters: this.filters
			},this.params)
		});
		
		 var tpl = new Ext.XTemplate(
		   '<tpl for=".">',
		       '<div class="thumb-wrap" title="{text}*{q_menu}">',
			    '<div class="thumb {iconCls}"></div>',
			    '<p>{text}</p></div>',
		   '</tpl>',
		   '<div class="x-clear"></div>'
		);
		
		this.dataview = new Ext.DataView({
            	store: this.filesStore,
            	tpl: tpl,
            	autoHeight:true,
            	multiSelect: this.multiSelect,
            	singleSelect: this.singleSelect,
            	overClass:'x-view-over',
            	itemSelector:'div.thumb-wrap',
            	emptyText: 'No files to display'
          });

		this.main = new Ext.Panel({
			region: 'center',
			margins   : '3 3 3 0',
			autoScroll: true,
			bodyStyle: 'padding:5px;',
			items: this.dataview
		});
		
		this.items = [this.nav,this.main];
		
		Ext.ux.FileManager.superclass.initComponent.apply(this, arguments);
		
		this.nav.on('click',this.clickNode,this);
		this.dataview.on('dblclick',this.dblclick,this);
		this.dataview.on('contextmenu',this.contextmenu,this);
		this.filesStore.on('beforeload',function(){this.body.mask(this.text.loading);},this);
		this.filesStore.on('load',function(){this.body.unmask();},this);
		
		this.addEvents('selectfile');
	},

	onRender: function(){	
	       Ext.ux.FileManager.superclass.onRender.apply(this, arguments);
		   this.nav.getRootNode().expand();
     },
    
     clickNode: function(node,event){
	    	this.nav.getRootNode().expand();
	    	var n = this.nav.getNodeById(node.attributes.id);
	    	if(!Ext.isEmpty(n)){n.expand();}
    	
		this.filesStore.load({params:{
			path: node.attributes.url,
			isForMainPanel: true,
			filters: this.filters
		}});
		
		if(this.nav.getRootNode().id === node.id){
			Ext.getCmp(this.id+'AddresBar').setValue(this.root);
			this.path = this.root;
		}else{	
			Ext.getCmp(this.id+'AddresBar').setValue(node.attributes.url);
			this.path = node.attributes.url;
		}
    },
    	
    contextmenu: function(dataview,index,html,event) {
		event.stopEvent();
		dataview.select( index, false, true);

		var sep_dato = html.title.split('*');
		var menu_xxx = new Ext.menu.Menu({
			items : [meditar, meserver, mconxls, mfixmov, mfixsli, mexpatt, mde3map, mco3map, mcliatt, mmain, mconjpg, mcontga, mconbmp, mconozj, mconozt, mconozb, mintgra, mveresp, mpasbmd]
		});

		if(sep_dato[1]=="menu_bmds") new Ext.menu.Menu({items : [meditar, meserver, mconxls, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_bmd" ) new Ext.menu.Menu({items : [meditar, mconxls, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_bmdsl")new Ext.menu.Menu({items : [meditar, mconxls, mfixsli, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_bmdsm")new Ext.menu.Menu({items : [meditar, meserver, mconxls, mfixmov, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_xls" ) new Ext.menu.Menu({items : [meditar, mpasbmd, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_xlss") new Ext.menu.Menu({items : [meditar, mpasbmd, meserver, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_bkp" ) new Ext.menu.Menu({items : [meditar, mpasbmd, mconxls, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_bkps") new Ext.menu.Menu({items : [meditar, mpasbmd, meserver, mconxls, mveresp, mdown]}).showAt(event.getXY());

		if(sep_dato[1]=="menu_main") new Ext.menu.Menu({items : [mmain, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_atte") new Ext.menu.Menu({items : [mcliatt, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_attd") new Ext.menu.Menu({items : [mexpatt, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_ozt" ) new Ext.menu.Menu({items : [mcontga, mintgra, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_ozj" ) new Ext.menu.Menu({items : [mconjpg, mintgra, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_ozb" ) new Ext.menu.Menu({items : [mconbmp, mintgra, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_jpg" ) new Ext.menu.Menu({items : [mconozj, mintgra, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_tga" ) new Ext.menu.Menu({items : [mconozt, mintgra, mveresp, mdown]}).showAt(event.getXY());
		if(sep_dato[1]=="menu_bmp" ) new Ext.menu.Menu({items : [mconozb, mintgra, mveresp, mdown]}).showAt(event.getXY());
	},
    	
    dblclick: function(dataview,index,html,event){
    		var item = dataview.store.getAt(index);
    		if(item.get('isFolder')){
    			var node = this.nav.getNodeById(item.get('id'));
    			if(!Ext.isEmpty(node)){
    				node.expand();
        			node.select();
    			}
    			this.clickNode({attributes:{url:item.get('url'),id:item.get('id')}});
    		}else{
    			this.openFile();
    		}
    },
    	
	cancel: function(){
		this.close();
	},
	
	openFile: function(){
		var files = this.dataview.getSelectedRecords();
		if(this.dataview.getSelectionCount()>0){
    		this.fireEvent('selectfile',files);
    		this.close();
		}
	},
	
	gotoUrl: function(){
		var path = Ext.getCmp(this.id+'AddresBar').getValue();
		if(!Ext.isEmpty(path) && this.path !== path){
			this.clickNode({attributes:{url:path}});
		}
	},
	
	upDirectory: function(){
		if(this.path !== this.root){
			var match = /\/[\w\.\- ]+$/.exec(this.path);
			if(!Ext.isEmpty(match)){
				var up = match[0];
				var idSearch = this.path.replace(/\//g, "_").substring(0,this.path.length-up.length);
				var node = this.nav.getNodeById(idSearch);
				if(!Ext.isEmpty(node)){
					node.select();
    			}else{
    				this.nav.getRootNode().select();
    			}
				this.clickNode({attributes:{url:this.path.substring(0,this.path.length-up.length)}});
			}
		}
	}

});


Ext.reg('filemanager', Ext.ux.FileManager);

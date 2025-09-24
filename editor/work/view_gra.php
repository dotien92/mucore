<?php
require_once('session.php');

include("../i18n/".$lang."/locale/text.php");
($_REQUEST['archivo']) ? ($decenc_succ=$dec_succ) : ($decenc_succ=$enc_succ);
?>
Ext.onReady(function(){
    var xd = Ext.data;
    var listado = new Array();
    
    var convertir = new Ext.Action({
        text: '<span class="tipos"><?php echo $con_select;?></span>',
        handler: function(){
            var con = new Ext.data.Connection();
            var largo = listado.length;
            for(var i=0;i<largo;i++){
                con.request({
                    url: 'get-gra-images.php',
                    params: {'archivo': '<?php echo $_REQUEST['archivo'];?>','deco': 'ok', 'file': listado[i]},
                    method: 'POST',
                    callback: function(opts, success, response)  {
                        if (!success || ("OK" != response.responseText)) {
                            Ext.MessageBox.alert("Error", success ?
                                response.responseText  :
                                "Error Decoding File Try Again");
                        }
                    }
                });
            }
            var s = largo != 1 ? 's' : '';
            Ext.MessageBox.alert(largo+' Grafico'+s, ' <?php echo $decenc_succ;?>');
        }
    });

    var store = new Ext.data.JsonStore({
        url: 'get-gra-images.php?archivo=<?php echo $_REQUEST['archivo'];?>',
        root: 'images',
        id:'name',
        fields: ['id', 'name']
    });
    store.load();

    var tpl = new Ext.XTemplate(
        '<tpl for=".">',
            '<div class="thumb-wrap" id="{id}">',
            '<div class="thumb"><img src="get-gra-images.php?archivo=<?php echo $_REQUEST['archivo'];?>&file={name}" title="{name}"></div>',
            '<span class=""><b>{name}</b></span></div>',
        '</tpl>',
        '<div class="x-clear"></div>'
    );

    var dataview = new Ext.DataView({
            id: 'lista_gra',
            store: store,
            tpl: tpl,
            autoHeight:false,
            autoScroll: true,
            multiSelect: true,
            overClass:'x-view-over',
            itemSelector:'div.thumb-wrap',
            emptyText: 'No Image to display',
           
            listeners: {
                dblclick: {
                    fn: function(dv,nodes){
                        var con = new Ext.data.Connection();
                        con.request({
                            url: 'get-gra-images.php',
                            params: {'archivo': '<?php echo $_REQUEST['archivo'];?>','deco': 'ok', 'file': dataview.store.getById(nodes).data.name},
                            method: 'POST',
                            callback: function(opts, success, response)  {
                                if (!success || ("OK" != response.responseText)) {
                                    Ext.MessageBox.alert("Error", success ?
                                        response.responseText  :
                                        "Error Decoding File Try Again");
                                        return;
                                }
                                else{
                                    Ext.MessageBox.alert(dataview.store.getById(nodes).data.name, '<?php echo $decenc_succ;?>');
                                    return;
                                }
                            }
                        });
                    }
                },
                selectionchange: {
                    fn: function(dv,nodes){
                        var l = nodes.length;
                        listado.length = l;
                        for(var i=0;i<l;i++){
                            listado[i] = nodes[i].id;
                        }
                    }
                }                
            }
        })

    var panel = new Ext.Panel({
        id:'images-view',
        frame:true,
        width:1000,
        Height: 450,
        autoScroll: true,
        autoHeight:false,
        collapsible:true,
        layout:'fit',
        tbar: [convertir],
        title:'Image Decoder<form style="float:right; padding-right:20px;" action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1"></form><span style="float:right; padding-right:20px;"><?php echo $like_ed;?> <?php echo $donate;?> </span>',
        items: dataview
    });

    panel.render(document.body);

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
    panel.setSize(Tam[0],Tam[1]);

    window.onresize = function() {
        var Tam = TamVentana();
        panel.setSize(Tam[0],Tam[1]);
    };
});
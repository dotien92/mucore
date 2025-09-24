<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mu Editor MagicHand</title>

<link rel="stylesheet" type="text/css" href="../css/ext-all.css" />
<link rel="stylesheet" type="text/css" href="../css/Ext.ux.FileManager.css" />

<script type="text/javascript" src="ext-base.js"></script>
<script type="text/javascript" src="ext-all.js"></script>

<script type="text/javascript" src="Ext.ux.FileManager.js"></script>

<script type="text/javascript">

Ext.onReady(function(){
    Ext.QuickTips.init();

    function out(files){
        var log = Ext.get('log');
        for(var i=0;i<files.length;i++){
            var file = files[i];
            log.createChild({tag:'p',html:'->'+file.get('url')});
        }
    }
    
    var manager = new Ext.ux.FileManager({
        url: 'prueba_files.php',
        root:'/archivos',
        filters:'bmd bkp xls'
    });

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
    manager.setSize(Tam[0],Tam[1]);

    window.onresize = function() {
        var Tam = TamVentana();
        manager.setSize(Tam[0],Tam[1]);
    };    
    manager.show();
    
});
</script>
<style type="text/css">

</style>
</head>
<body>
</body>
</html>

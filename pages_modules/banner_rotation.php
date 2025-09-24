<?
/**
* @+===========================================================================+
* @¦ MUCore v1.0.8 Premium                                                     ¦
* @¦ Credits: Isumeru & MaryJo & Dao Van Trong - Trong.CF                      ¦
* @+===========================================================================+
*/
$banner_config = simplexml_load_file('engine/config_mods/banner_settings.xml');

echo '
<script type="text/javascript" src="js/jquery.innerfade.js"></script>
<script type="text/javascript">
       $(document).ready(
                function(){

                    
                    $(\'ul#banners\').innerfade({
                        speed: ' . $banner_config->fade . ',
                        timeout: ' . $banner_config->delay . ',
                        type: \'sequence\',
                        containerheight: \'' . $banner_config->height . 'px\'
                    });
                    

                    


            });
      </script>
      

<style type="text/css">
ul#banners {list-style:none; margin:0;padding:0;}
li#banners { margin:0;padding:0;}
</style>

<ul id="banners">';
$list_banners = file('engine/variables_mods/banners.tDB');
foreach ($list_banners as $banner) {
    $banner = explode("¦", $banner);
    echo '
    <li>
    <a href="' . $banner[3] . '" title="' . $banner[1] . '">
    <img src="' . $banner[2] . '" alt="' . $banner[1] . '" border="0"></a>
    </li>';
}

echo '
</ul>
';
/**
* @+===========================================================================+
* @¦ MUCore v1.0.8 Premium                                                     ¦
* @¦ Credits: Isumeru & MaryJo & Dao Van Trong - Trong.CF                      ¦
* @+===========================================================================+
*/
?>
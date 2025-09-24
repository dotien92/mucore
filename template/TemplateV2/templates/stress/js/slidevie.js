jQuery(function(){
   jQuery("div.svw").prepend("<img src='templates/apotek/images/svwloader.gif' class='ldrgif' alt='loading...'/ >"); 
});
var j = 0;
var y = 1;
$(document).ready(function() {
  window.setInterval(function(){
      $('li.teaser_'+y+' a').trigger('click');
      y++;
      if(y==8) y=1;
  },5000);
});
jQuery.fn.slideView = function(settings) {
	  settings = jQuery.extend({
     easeFunc: "easeInOutExpo", /* <-- easing function names changed in jquery.easing.1.2.js */
     easeTime: 750,
     toolTip: false
  }, settings);
	return this.each(function(){
		var container = jQuery(this);
		container.find("img.ldrgif").remove(); // removes the preloader gif
		container.removeClass("svw").addClass("stripViewer");		
		var pictWidth = container.find("li").find("img").width();
		var pictHeight = container.find("li").find("img").height();
		var pictEls = container.find("li").size();
		var stripViewerWidth = pictWidth*pictEls;
		container.find("ul").css("width" , stripViewerWidth); //assegnamo la larghezza alla lista UL	
		container.css("width" , pictWidth);
		container.css("height" , pictHeight);
		container.each(function(i) {
			jQuery("div#stripTransmitter" + j + " a").each(function(z) {
				jQuery(this).bind("click", function(){
                                    jQuery(this).addClass("current").parent().parent().find("a").not(jQuery(this)).removeClass("current"); // wow!
                                    var cnt = - (pictWidth*z);
                                    jQuery(this).parent().parent().parent().prev().find("ul").animate({ left: cnt}, settings.easeTime, settings.easeFunc);
                                    return false;
                                 });
                                $(this).click(function(){
                                    y=z+1;
                                    if(y==8) y=1;
                                 });
			      });
			});
		j++;
  });	
};
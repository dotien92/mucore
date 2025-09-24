// Jquery 
$(document).ready(function() {

	// Kwicks
	$('.kwicks').kwicks({
		max: 216,
		duration: 400,
		sticky: true
	}); 
	

  
  // better anchor
  anchor.init()
	
	// Form clear & restore default value
	/*Drupal.settings.inputDefaults = {}
  $("input:text").focus(function() {
    var element = $(this);
    Drupal.settings.inputDefaults[element.attr("id")] = element.val();
    element.val('');
  });
  $("input:text").blur(function() {
    var element = $(this);
    if (element.val() == '') {
      element.val(Drupal.settings.inputDefaults[element.attr("id")]);
    }
  });*/
  
});

// better anchor
anchor = {
	init : function()  {
		$("a.anchorLink").click(function () {	
			elementClick = $(this).attr("href")
			destination = $(elementClick).offset().top;
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 1100 );
		  	return false;
		})
	}
}

// Spamless e-mail.. semoga
function email(name, domain, extension) {
   if (!document.write) return false;
   if (document.write) {
      var name; var domain; var extension;
      document.write('' + name + '@' + domain + '.' + extension + '');
   }
}

// IE Flash Fix
Flash = function(swf, width, height, version)
{
    this.swf = swf || "";
    this.width = width || "100%";
    this.height = height || "100%";
    this.requiredVersion = version || 6;
    this.id = "";
    this.params = new Object();
    this.variables = new Object();
};
Flash.hasVersion = function(requiredVersion)
{
    var hasVersion = false;
    if (navigator.plugins.length > 0 && navigator.plugins["Shockwave Flash"]) { // NS/Mozilla
        var description = navigator.plugins["Shockwave Flash"].description;
        var version = description.match(/\d{1,2}/);
        hasVersion = (version >= requiredVersion);
    }
    else if (window.ActiveXObject && window.execScript && navigator.userAgent.indexOf('Mac') == -1) { // Win IE
        Flash.hasActiveX = false;
        window.execScript("On error resume next: Flash.hasActiveX = IsObject(CreateObject('ShockwaveFlash.ShockwaveFlash." + requiredVersion + "'))", "VBScript");
        hasVersion = Flash.hasActiveX;
        delete Flash.hasActiveX;
    }
    return hasVersion;
};
Flash.resizeTo = function(id, w, h) { 
    var movie = document.getElementById(id); 
	movie.width = w; 
	movie.height = h;
};

Flash.prototype.getSWF = function() { return this.swf; };
Flash.prototype.setSWF = function(swf) { this.swf = swf; };
Flash.prototype.getWidth = function() { return this.width; };
Flash.prototype.setWidth = function(w) { this.width = w; };
Flash.prototype.getHeight = function() { return this.height; };
Flash.prototype.setHeight = function(h) { this.height = h; };
Flash.prototype.getRequiredVersion = function() { return this.requiredVersion; };
Flash.prototype.setRequiredVersion = function(v) { this.requiredVersion = v; };
Flash.prototype.getId = function() { return this.id; };
Flash.prototype.setId = function(id) { this.id = id; };
Flash.prototype.getParam = function(name) { return this.params[name]; };
Flash.prototype.getParams = function() { return this.params; };
Flash.prototype.setParam = function(name, value) { this.params[name] = value; };
Flash.prototype.getVariable = function(name) { return this.variables[name];	};
Flash.prototype.getVariables = function() { return this.variables; };
Flash.prototype.setVariable = function(name, value) { this.variables[name] = value;	};

Flash.prototype.getVariablePairs = function()
{
    var variablePairs = new Array();
    for (var name in this.getVariables()) {
        variablePairs.push(name + "=" + escape(this.getVariable(name)));
    }
    if (variablePairs.length > 0) {
        return variablePairs.join("&");
    }
    else {
        return null;
    }
};
Flash.prototype.getParamTags = function()
{
    var paramTags = "";
    for (var param in this.getParams()) {
        paramTags += '<param name="' + param + '" value="' + this.getParam(param) + '" />';
    }
    if (paramTags == "") {
        paramTags = null;
    }
    return paramTags;
};
Flash.prototype.getHTML = function()
{
    var flashHTML = "";
    if (window.ActiveXObject && navigator.userAgent.indexOf('Mac') == -1) { // PC IE
        flashHTML += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' + this.getWidth() + '" height="' + this.getHeight() + '" id="' + this.getId() + '">';
        flashHTML += '<param name="movie" value="' + this.getSWF() + '" />';
        if (this.getParamTags() != null) {
            flashHTML += this.getParamTags();
        }
        if (this.getVariablePairs() != null) {
            flashHTML += '<param name="flashVars" value="' + this.getVariablePairs() + '" />';
        }
        flashHTML += '</object>';
    }
    else { // Everyone else
        flashHTML += '<embed type="application/x-shockwave-flash" src="' + this.getSWF() + '" width="' + this.getWidth() + '" height="' + this.getHeight() + '" id="' + this.getId() + '"';
        for (var param in this.getParams()) {
            flashHTML += ' ' + param + '="' + this.getParam(param) + '"';
        }
        if (this.getVariablePairs() != null) {
            flashHTML += ' flashVars="' + this.getVariablePairs() + '"';
        }
        flashHTML += '></embed>';
    }
    
    return flashHTML;
};
Flash.prototype.render = function(elementId)
{
    if(Flash.hasVersion(this.getRequiredVersion())) {
        if (elementId) {
            document.getElementById(elementId).innerHTML = this.getHTML();
        }
        else {
            document.write(this.getHTML());
        }
    }
};

// Suppress IE errors
function handleError() { return true;}
window.onerror = handleError; 


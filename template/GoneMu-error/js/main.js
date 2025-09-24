var i = 0;
var j = 0;

function scrollUp() {
	$("#mainContentInfo").scrollTop($("#mainContentInfo").scrollTop() - 5);
	if(i == 0) setTimeout("scrollUp();", 40);
}

function scrollDown() {
	$("#mainContentInfo").scrollTop($("#mainContentInfo").scrollTop() + 5);
	if(j == 0) setTimeout("scrollDown();", 40);
}

$(document).ready(function() {
	$("#scrollUp").mouseenter(function() {
		i = 0;
	});
	$("#scrollUp").mouseover(function() {
		scrollUp();
	});
	$("#scrollUp").mouseleave(function() {
		i = 1;
	});
	
	$("#scrollDown").mouseenter(function() {
		j = 0;
	});
	$("#scrollDown").mouseover(function() {
		scrollDown();
	});
	$("#scrollDown").mouseleave(function() {
		j = 1;
	});
});

function ask_url(ask,url,target){
	var detStatus=confirm(ask);
	if (detStatus){
		if(target){
		    location.href = url;
		}else{
			top.location = url;
		}
		
	}else{
		return false;
	}
}

function ask_form(ask,form_name){
	var detStatus=confirm(ask);
	if (detStatus){
		return true;
	}else{
		return false;
	}
}

function vote(ids){
	var dot = '.'; 
	$(".links").hide('slow');
	$("#vote_counter").show('slow');
	interval = setInterval(function(){
		$("#vote_counter").html("Processing data <b>"+dot+"</b> ");
		dot = dot + '.';
		if (dot.length > 10){
			dot = '.';
		} 
	}, 600);
	$.post("vote_submit.php", { vote_link: ids }, function(data){      
		timeout = setTimeout(function(){
			clearInterval(interval);
			$("#vote_counter").hide('slow');
			$("#vote_error").html(data); 
			$("#vote_error").show('slow');
			setTimeout(function(){
				clearTimeout(timeout);
				$("#vote_error").hide('slow');
				addVPoints();
				$(".links").show(800); 
			}, 3000);	
			$('.links').load("vote_submit.php");		
		}, 10000);
	});   
}

function addVPoints(){
	$.post("vote_submit.php", { check: "points" }, function(data){                                            
        $('#m_credits').fadeOut('slow').html(data).fadeIn('slow');                              
    });
}
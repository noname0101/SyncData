
//using JQuery library to populate drop-down select lists
function selectFrom(result){
	var select = $('#dropdownFrom');
	$(result).find('Name').each(function(){
		//obtain text value of current variable
	    var label = $(this).text();
	    //create option for drop-down list
	    select.append("<option>"+label+"</option>");
	    });
	
		var select = $('#dropdownTo');
		$(result).find('Name').each(function(){
		var label = $(this).text();
		select.append("<option>"+label+"</option>");
	
	});
} 

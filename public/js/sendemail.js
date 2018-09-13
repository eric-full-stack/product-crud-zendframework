$("#sendemail").click(function() { 
	var data = [];
	$("input[type='checkbox'][data-id]:checked").each(function(id, element){
		data.push({id: $(element).attr('data-id')})
	})
	$.ajax({
		url: "/product/sendEmail",
		data: {data},
		method: "POST",
		dataType: 'json',	
		success: function (res){
			console.log(res)
		},	
		error: function(e){
			console.log(e)
		}
	})
});
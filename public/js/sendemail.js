$("#sendemail").click(function() { 
	$("#spinner").removeClass('hide');
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
			if(res===1)
				alert('Mail sent successfully!')
			else
				alert(res)
			$("#spinner").addClass('hide');
		},	
		error: function(e){
			console.log(e)
		}
	})
});
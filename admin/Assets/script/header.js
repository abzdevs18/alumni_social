	$(document).ready(function(){
			$('#alum_u').keyup(function(){
				var alum = $(this).val();
				$.post("inc/u_table.php",{
	  				name:alum
	  			},function(data){
	  				$(".re").html(data);
	  				console.log(data);
	  			});
			});
			$("#recipient").keyup(function(){
	  			var alum = $(this).val();
	  			// $("#u-res-msg").show();
	  			$.post("inc/msg_search.php",{
	  				name:alum
	  			},function(data){
	  				$(".re").html(data);
	  				console.log(data);
	  			});
	  			console.log("KO");
	  		});
		});
	$(document).on('click', "#suspended", function(){
		var id = $(this).val();
		$.post("inc/suspended.php",{
			id:id
		},function(data){		
			alert("Account Suspended");		
			console.log(data);
		});
	});
	$(document).on('click', "#verified", function(){
		var id = $(this).val();
		$.post("inc/verified.php",{
			id:id
		},function(data){	
			alert("Account verified");		
			console.log(data);
		});
	});
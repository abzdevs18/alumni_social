$(document).ready(function(){

	 $('#pInfo').click(function(){
	 	var address = $('.address').val();
	 	var phone = $('.phoneNum').val();
	 	var email = $('.personalEmail').val();

	 	$.ajax({
	 		url:'inc/about_actions.php',
	 		type:'POST',
	 		data:{
	 			address:address,
	 			phone:phone,
	 			email:email
	 		},
	 		success:function(d){
	 			if (d == 'success') {
	 				$('#contAdd').hide();
	 				console.log(d);
	 			} 
	 		},
	 		error:function(err){
	 			console.log(err);
	 		}
	 	});
	 	console.log("uyg");
	 });
	 $('#aboutme').keydown(function(){
	 	$('#btn-about-up').show();
	 });
	 $('#btn-about-up').click(function(){
	 	var intro = $('#aboutme').text();
	 	$.ajax({
	 		url:'inc/about_actions.php',
	 		type:'POST',
	 		data:{
	 			intro:intro
	 		},
	 		success:function(d){
	 			if (d == 'success') {
	 				$('#btn-about-up').hide();
	 				console.log(d);
	 			} 
	 		},
	 		error:function(err){
	 			console.log(err);
	 		}
	 	});
	 	console.log(intro);
	 });
	 $('#xperience').keydown(function(){
	 	$('#btn-about-up-2').show();
	 });
	 $('#btn-about-up-2').click(function(){
	 	var xp = $('#xperience').text();
	 	$.ajax({
	 		url:'inc/about_actions.php',
	 		type:'POST',
	 		data:{
	 			xp:xp
	 		},
	 		success:function(d){
	 			if (d == 'success') {
	 				$('#btn-about-up-2').hide();
	 				intro();
	 				console.log(d);
	 			} 
	 		},
	 		error:function(err){
	 			console.log(err);
	 		}
	 	});
	 	console.log(intro);
	 });
intro()

	 function intro(){
	 	$.ajax({
	 		type:'inc/fetch-intro.php',
	 		success:function(d){
	 			$('#xperience').text(d);
	 		}
	 	});
	 }
});
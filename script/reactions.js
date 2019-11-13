function reaction(p_id){
	$.ajax({
		url:'inc/like.php',
		type:'POST',
		data: {
			id:p_id
		},
		success: function(data){
			console.log(data);
			$('#l-us').append(data);
			$('#nl').html(data);
				$('#r_icons').css(
					"color","darkred"
				)
		},
		error:function(err){
			console.log(err);
		}
	});
}
// $(document).on('click','.fa-heart',function(){
// 	var p_id = $("#likethepost").val();
// 	// reaction();
// 	// console.log(post_ID);
// 	$.ajax({
// 		url:'inc/like.php',
// 		type:'POST',
// 		data: {
// 			id:p_id
// 		},
// 		success: function(data){
// 			console.log(data);
// 			// $('#l-us').append(data);
// 			$('#nl').html(data);
// 				$('#r_icons').css(
// 					"color","darkred"
// 				)
// 		},
// 		error:function(err){
// 			console.log(err);
// 		}
// 	});
	
// });



$(document).ready(function(){
	$('#adminP').click(function(){
		var content =$('#content').val();
		// var progress = $('#progress');
		var photo_data;
		var video_data;
		/*FormData for upload a file using jquery without using form*/
         var fd = new FormData();
        /*You can add attributes here to send to the url*/	
        fd.append('content',content);

		if ($('.upload-video').val() && $('.upload-photo').val() == '') {
			var type="video";
        	video_data = $('#vidUp').prop('files')[0];
        	fd.append('admin_video',video_data);	
        	fd.append('file_type',type);

		}else if ($('.upload-photo').val() && $('.upload-video').val() == '' ) {
			var type="image";
        	photo_data = $('#pUpload').prop('files')[0];
        	fd.append('admin_photo',photo_data);	
        	fd.append('file_type',type);
		}
		$.ajax({
			url:'inc/adminUpload.php',
			type:'POST',
		    processData: false, // important
		    contentType: false, // important
			data:fd,
			beforeSend:function(){
				$('#progress').show();
			},
			success:function(data){
				fd.delete('admin_photo');
				// alert("Success Upload");
    			$("#pUpload").attr('src',''); 
			    $('.upload-form').hide();
			    $('.background-upload').hide();

			},
			error:function(err){
				console.log(err);
			}
		});
	});
	// $('#admin_reg').click(function(){
	// 	$('#signup').submit(function(e){
	// 		e.preventDefault();
	// 		var name = $('#name').val();
	// 		var lastname = $('#lastname').val();
	// 		var email = $('#email').val();
	// 		var password = $('#password').val();
	// 		var photo = $("#photo").prop('files')[0];
	// 		var gender = $("input[name=gender]:checked").val();

	// 		var fd = new FormData();
	// 		fd.append('Name',name);
	// 		fd.append('lastname',lastname);
	// 		fd.append('gender',gender);
	// 		fd.append('email',email);
	// 		fd.append('password',password);
	// 		fd.append('photo',photo);
	// 		$.ajax({
	// 			url:'inc/signup.php',
	// 			type:'POST',
	// 			processData:false,
	// 			contentType:false,
	// 			data:fd,
	// 			success:function(data){
	// 				console.log(data);
	// 			},
	// 			error:function(data){
	// 				if (data.fields == 'empty') {
	// 					alert("YEs");
	// 				}
	// 			}
	// 		});
	// 	});
	// });
});
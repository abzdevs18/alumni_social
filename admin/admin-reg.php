<!DOCTYPE html>
<html>
<head>
	<title>Admin-Alumni</title>
	<link rel="icon" type="text/css" href="image/logo.ico">
	<link rel="stylesheet" type="text/css" href="Assets/css/admin.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/admin.css">
</head>
<body>
	<div class="msg_list" style="border:none;">
		<form method="POST" action="inc/signup.php" enctype="multipart/form-data" id="signup">
			<div class="heading_signup">
				<h3>Create Account for Admin</h3>
				<span style="font-size: 14px;">NORSU-SC Alumni Monitoring System</span>			
			</div>
			<div class="inputs_sign">
				<div>
					<div style="width: 47%;float: left;">
						<div class="img_container">
							<img src="../image/logo.ico">
						</div>
						<input type="file" name="photo" id="photo">
					</div>
					<div style="display: flex;flex-direction: column;padding-right: 10px;width: 50%;float: right;" class="n">
						<input type="text" name="Name" placeholder="Name/Username" id="name">
						<input type="text" name="Lastname" placeholder="Lastname" id="lastname">
							
						<div style="display: flex;flex-direction: row;padding:20px 0px;">
							<span>Gender</span> 
							<input type="radio" name="gender" value="Male">Male
							<input type="radio" name="gender" value="Female">Female
								
						</div>
					</div>
				</div>
				<input type="email" name="email" placeholder="Email" id="email" style="width: 97%;">
				<input type="password" name="password" placeholder="Password" id="password" style="width: 97%;">
				<input type="submit" name="signup" value="Sign up" id="admin_reg">
			</div>
			<span style="margin-top: 10px;font-size: 12px;position: absolute;">Already have an account? <a href="index.php">Login</a></span>
		</form>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="Assets/script/adminUp.js"></script>
<!-- <script>
	$(document).ready(function(){
		$('#signup').submit(function(e){
			e.preventDefault();
			// var name = $("input[name=Name]").val();
			var name = $('#name').val();
			var lastname = $('#lastname').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var photo = $("#photo").prop('files')[0];
			var gender = $("input[name=gender]:checked").val();
		/*	var lastname = $("input[name=Lastname]").val();
			var email = $("input[name=email]").val();
			var password = $("input[name=password").val();*/
			var dataForm = new FormData();
			dataForm.append('Fname',name);
			dataForm.append('Lname',lastname);
			dataForm.append('photo',photo);
			// dataForm.append('gender',gender);
			dataForm.append('email',email);
			dataForm.append('password',password);
			$.ajax({
				url:'inc/signup.php',
				type:'POST',
				data: dataForm,
				dataType:'json',				
			    processData: false,
			    contentType: false,
				success:function(){
					console.log("Nices");
				},
				error:function(err){
					console.log(err);
				}
			});
			return false;
		});
	});
</script> -->
</body>
</html>
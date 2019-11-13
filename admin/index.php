<?php
	session_start();
	error_reporting(0);
	if (!$_SESSION['id']) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alumni Monitoring</title>
	<link rel="icon" type="text/css" href="image/logo.ico">
	<script src="Assets/script/morris/jquery.min.js"></script>
	<link rel="stylesheet" href="../style/fa/css/all.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/admin.css">
</head>
<body style="width: 100%;height: 100vh;overflow: hidden;">
	<div class="user_list" style="margin: 150px auto;">
		<div class="wrap_login">
			<div class="logo_heading">
						<div class="img_container">
							<img src="../image/logo.ico">
						</div>
				<p style="font-size: 23px;">Create Account for <b>Admin</b></p>
				<span style="font-size: 14px;">NORSU-SC Alumni Monitoring System</span>		
			</div>
			<div class="login_form">
				<form method="POST" action="inc/login.php" style="padding-bottom: 20px" id="log_form">
					<input type="text" name="email" placeholder="Email" id="email" autofocus style="width: 97%;">
					<div style="position: relative;display: flex;">
					<input type="password" name="password" placeholder="Password" id="password">
					<label for="password" style="position: absolute;right: 0;margin: 15px 10px;"><i class="fas fa-eye show-pass" style="font-size: 20px;cursor: pointer;"></i><i class="fas fa-eye-slash hide-pass" style="display: none;cursor:pointer;font-size: 20px;"></i></label><br>
						
					</div>
					<input type="submit" name="login" value="Sign in" id="submit">
				</form>
			<!-- 	<span style="/* padding-top: 10px; */position: absolute;font-size: 14px;">Don't have an account? <a href="admin-reg.php">Register</a></span> -->
			</div>
		</div>
	</div>

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(document).ready(function(){
/*		$('#submit').click(function(e){
			e.preventDefault();
			var email = $('#email').val();
			var password = $('#password').val();

			if (email == '' || password == '') {
				if (email == '') {
					$('#email').css("border","2px solid red");
					$('#email').effect("shake");

				}else if (password == ''){
					$('#password').css("border","2px solid red");
					$('#password').effect("shake");
				}
			}
		});	*/
		$('.show-pass').click(function(){
			$('#password').attr('type','text');
			$(this).hide();
			$(".hide-pass").show();
			console.log("hello");
		});
		$('.hide-pass').click(function(){
			$('#password').attr('type','password');
			$(this).hide();
			$('.show-pass').show();
		});
	});
</script>
</body>
</html>
<?php
}else{
	header("Location: home.php");
	exit();
}
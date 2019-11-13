<?php
	session_start();
	error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Alumni Monitoring System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="icon" href="image/logo.ico">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/formStyle.css">
	<link rel="stylesheet" href="style/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="style/headerStyle.css">
	<link rel="stylesheet" type="text/css" href="style/chat.css">
	<link rel="stylesheet" type="text/css" href="admin/Assets/css/message.css">
	<link rel="stylesheet" type="text/css" href="style/add_ons.css">
    <link href="script/slides/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="script/slides/ninja-slider.js" type="text/javascript"></script>
	<script src="script/jquery.min.js"></script>
	<script src="script/load_post.js"></script>
	<script src="script/contact.js"></script>
	<script>
        function lightbox(idx) {
            //show the slider's wrapper: this is required when the transitionType has been set to "slide" in the ninja-slider.js
            var ninjaSldr = document.getElementById("ninja-slider");
            ninjaSldr.parentNode.style.display = "block";

            nslider.init(idx);

            var fsBtn = document.getElementById("fsBtn");
            fsBtn.click();
        }

        function fsIconClick(isFullscreen, ninjaSldr) { //fsIconClick is the default event handler of the fullscreen button
            if (isFullscreen) {
                ninjaSldr.parentNode.style.display = "none";
            }
        }
/* ON scroll to bottom function Script */
$(document).ready(function(){
	var flag = 0;
	$.ajax({
		url: 'data.php',
		type: "POST",
		data:{
			'offset':flag,
			'limit':3
		},
		beforeSend:function(){
			$('#loadingIocn').show();
		},
		success: function(data){
			$('.post_container').append(data); /*ALways use append() not html()*/
			flag += 3;
			$('#loadingIocn').hide();
		},
		error:function(e){
			console.log(e);
		}
	});
	$(window).scroll(function(){
        if ($(window).scrollTop() >= $(document).height() - $(window).height()) {

			$.ajax({
				url: 'data.php',
				type: "POST",
				data:{
					'offset':flag,
					'limit':3
				},
				success: function(data){
					$('.post_container').append(data); /*ALways use append() not html()*/
					flag += 3;
				},
				error:function(e){
					console.log(e);
				}
			});
        }
    });
});

/*End on scroll load function Script*/
    </script>
	<style>
	::-webkit-scrollbar {
		/*display: none;*/
		width: 10px;
		border-radius: 10px;
	}
	::-webkit-scrollbar-thumb{
		border-radius: 10px;
		background-color: #777;
		box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	}
	::-webkit-scrollbar-track{
		border-radius: 10px;
		background-color: #f3f3f3;
	}
        .gallery img{
            width:179px;
            cursor:pointer;
        }
        /*a {color:#1155CC;}*/
        ul li {padding: 10px 0;}
        #ninja-slider.fullscreen .slider-inner {
        	margin-top: 70px !important;
        }
        body::-webkit-scrollbar:hover{
        	display: block;
        }
        body::-webkit-scrollbar:hover {
		    width: 0.9em; 
		}
	</style>

	<script src="script/post.js"></script>
	  <script>
	  	$(document).ready(function(){
	  		$("#searchField").keyup(function(){
	  			$('#search_result').show();
	  			var name = $("#searchField").val();

	  			$.post("script/search.php",{
	  				suggestionName: name
	  			}, function(data) {
	  				$('#search_result').html(data);
	  			});
	  		});
	  		$("#recipient").keyup(function(){
	  			var alum = $(this).val();
	  			// $("#u-res-msg").show();
	  			$.post("script/msg_search.php",{
	  				name:alum
	  			},function(data){
	  				$(".re").html(data);
	  			});
	  		});

	  		$("#batch").change(function(){
	  			var n = $(this).val();
	  			$.post("script/batch_search.php",{
	  				year:n
	  			},function(data){
	  				$("#disp").html(data);
	  				// console.log(data);
	  			});
	  		});	
	  		$(".p-p-wrap").click(function(){
	  			$('.pop-prof').hide();
	  		});
	  	});

	function showUp(id){
		$('.pop-prof').show();
		$.ajax({
			url:'divisions/modal.php',
			type: 'POST',
			data:{
				id:id
			},
			success:function(suc){
				$("#quick-prof").html(suc);
			},
			error:function(err){
				console.log(err);
			}
		});
		console.log(id);
	}

	/*  	$(document).on('click','#r_icons',function(){
	  		
	  	})*/

	  	$(document).ready(function(){
	  		$(".save").click(function(){
		  		var school = $("#school").val();
		  		var degree = $("#degree").val();
		  		var batch = $("#year").val() + '-'+ $("#to").val();
		  		$.ajax({
		  			url:'inc/add_education.php',
		  			type: 'POST',
		  			data:{
		  				school:school,
		  				degree:degree,
		  				batch:batch
		  			},
		  			success:function(suc){
		  				$("#container-of-newschool").html(suc);
		  				$("#addU").hide();
		  				console.log(suc);
		  			},
		  			error:function(err){
		  				console.log(err);
		  			}
		  		});			
	  		});

	  		$("#mploymentBtnSave").click(function(){
		  		var jobTitle = $("#job-title").val();
		  		var company = $("#company").val();
		  		var job_relation = $("#job_relation").val();
		  		var location = $("#location").val();
		  		var batch = $("#month").val() + '-'+ $("#yearStart").val();
		  		$.ajax({
		  			url:'inc/add_employment.php',
		  			type: 'POST',
		  			data:{
		  				jobTitle:jobTitle,
		  				company:company,
		  				job_relation:job_relation,
		  				location:location,
		  				batch:batch
		  			},
		  			success:function(suc){
		  				$(".hj").append(suc);
		  				$("#addW").hide();
		  				console.log(suc);
		  			},
		  			error:function(err){
		  				console.log(err);
		  			}
		  		});			
	  		});

	  	});
	  </script>
</head>
<body>
	<header>
		<nav>
			<div class="headerLeft">
				<a href="index.php?page=timeline"><img src="image/hero.png"></a>
				<?php if (isset($_SESSION['usrName'])) {?>
				<a href="timeline.php?page=timeline"><span>Home</span></a>
				<?php
				}?>
				<div style="display: flex;flex-direction: column;">
						<div class="search">
							<i class="fas fa-search customStyle"></i>
							<input type="text" name="query" placeholder="search subject/mentor" id="searchField">
						</div>
					<div id="search_result" style="width: 400px;margin-left: 7px;">
						
					</div>					
				</div>
			</div>
			<?php
			//if $_SESSION['usrName'] is already created as session
			if (!isset($_SESSION['usrName'])) {?>
			<div class="headerRight">
				<a href="index.php"><span>Sign Up</span></a>
				<a href="login.php"><span>Login</span></a>
			</div>	
			<?php 
			}else{
				?>
			<div class="headerRight">
				<div class="h_icons" style="padding: 0px 10px;">
					<div style="margin: -5px 0px;padding: 0px 0px 10px;" class="notification">
						<div style="text-align: center;">
							<a href="timeline.php?page=timeline" style="border: none;padding: 10px 4px;"><i class="far fa-bell h_icon notifications
								"></i><br>
								<span style="font-size: 13px;">Notifications</span>
							</a>
						</div>
						<div class="drop-down-notification">
							<i class="fas fa-caret-up"></i>
							<div class="drop-notif" style="padding:5px;">
								<span style="padding-left: 0px !important;color: #333;padding: 5px 0px;">You have 2 new Messages</span>
							</div>
							<?php
								include 'inc/conn_db.php';
								$us = $_SESSION['usrID'];
								$c = mysqli_query($conn,"SELECT * FROM comments WHERE user_id != '$us' ORDER BY comment_timestamp DESC LIMIT 5");
								while($rw = mysqli_fetch_assoc($c)){
									$msg_sender = $rw['user_id'];
									$img = "SELECT * FROM user_user_photo WHERE user_id = '$msg_sender' AND profile_photo = 1";
									$q_img = mysqli_query($conn,$img);
									$r = mysqli_fetch_assoc($q_img);

							?>
							<div class="notif-msg">
								<!-- <div class="notif-head"> -->
									<?php
									if($r){?>
										<div class="notif-head" style="background-image: url('inc/uploaded/200px-Negros_Oriental_State_University.png');background-position: center;background-size: contain;background-repeat: no-repeat;">
									<?php } else {?>
										<div class="notif-head" style="background-image: url('inc/uploaded/200px-Negros_Oriental_State_University.png');background-position: center;background-size: contain;background-repeat: no-repeat;">	
										<?php	
									}
										?>
									</div>								
								<!-- </div> -->
								<div class="notif-content">
									<?php 

									$n = mysqli_query($conn,"SELECT * FROM users WHERE id = '$msg_sender'");
									$rt = mysqli_fetch_assoc($n);

									?>
									<span><b><?php echo $rt['userName']; ?></b> comment on Admin's Post</p></span>
									<p><?php echo $rw['comment_content']; ?></p>
								</div>
							</div>
							<?php
								}
						?>
						</div>
					</div>
					<div class="h_icons" style="margin: -5px 0px;padding: 0px 5px 10px;cursor: pointer;">
						<div style="text-align: center;">
							<a href="alumni.php?page=alumni" style="border: none;padding: 10px 4px;"><i class="fas fa-users h_icon"></i><br>
								<span style="font-size: 13px;">Alumni</span>
							</a>
						</div>
					</div>
					<div class="chat h_icons" style="margin: -5px 0px;padding: 0px 5px 10px;">
						<div style="text-align: center;">
							<a href="message.php" style="border: none;padding: 10px 4px;"><i class="far fa-comments h_icon"></i><br>
								<span style="font-size: 13px;">Messaging</span>
							</a>
						</div>
					<!--<div class="message_drp">
							Drop Down Messages
						</div> -->
					</div>
					<div style="display: flex;flex-direction: row;">
						<a href="timeline.php?page=timeline">
							<div class="h_prof_icon_img">

							<?php
							include 'inc/conn_db.php';
							$id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>">
							<?php 
								} else {?>
							<img src="image/default/user_default.png">
							<?php
								}
							
							?>

							</div>
						</a>
						<a href="timeline.php?page=timeline">
							<div style="display: flex;flex-direction: column;" class="p_name">
							<span style="margin-top: 0px;"><?php echo $_SESSION['usrName']; ?></span>
							<!--<i><?php echo $_SESSION['usrLastName'];?></i>-->
							</div>
						</a>
						<div class="log_out_drp">
							<a href="inc/log_out.php"><i class="fas fa-sign-out-alt"></i></a>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
				?>
		</nav>
	</header>

	<div class="pop-prof" style="display: none;">
		<div id="quick-prof">

			<!-- use modal in division/modal.php -->
			<!-- We are going tp show here the result for Modal -->
		</div>
		<div class="p-p-wrap"></div>		
	</div>
	<?php include 'divisions/modal_employment.php'; ?>
	<?php include 'divisions/modal_university.php'; ?>
	<?php include 'divisions/modal_personal.php'; ?>





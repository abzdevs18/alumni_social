<?php
 include 'header.php';
 include 'inc/conn_db.php';
	$currentPage = $_REQUEST['page'];
 if ($_SESSION['usrName']) {?>
 <style type="text/css">
 	/*Navigation Styling on active*/

.active {
	border-bottom: 2px solid #2c82b9;
	background-color: rgba(32,33,36,0.059);
}
.active > li {
	color: #2c82b9;
}
</style>
<main>
	<div class="home_container">
		<div class="home_header">
		<!-- Wall_image query starts here -->
							<?php
							$id = $_SESSION['usrID'];
							$img = "SELECT * FROM wall_img WHERE user_id = '$id' AND wall_use = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>

			<div class="home_background" id="backgroundImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgb(24, 24, 24) 500px),url('<?php echo "inc/uploaded/wall/". $row['wall_path'];?>');background-repeat: no-repeat;background-size: cover;">
			<?php
				}else{?>

			<div class="home_background" id="backgroundImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgb(24, 24, 24) 500px),url('image/default/wall.jpg');background-repeat: no-repeat;background-size: cover;">
			<?php	}
			?>

		<!-- Wall_image query ENDS here -->
				<div class="u_wrap">
					<i class="fas fa-camera-retro" id="u_cover">
						<form method="POST" action="inc/wall_update.php" enctype="multipart/form-data" id="user_wall_img_form">
							
						
						<input type="file" name="b_photo" id="backgroundImageSrc" style="position: absolute;margin: 0px 1px;width: 180px;height: 40px; opacity: 0; cursor: pointer;/* background-color: red; */border-radius: 30px;"/>
						</form>
					</i>
					<span id="e_b_prof">Update cover photo</span>					
				</div>
				<!-- <img src="image/background.jpg" id="blah" style="width: 100%;"> -->
			</div>	
			<nav>
				<ul class="navigation_menu">
					<a href="timeline.php?page=timeline" style="color: #222;" title="Timeline" class="<?php if($currentPage == 'timeline'){echo 'active';}?>"><li>Timeline</li></a>
					<a href="about.php?page=about" style="color: #222;" title="Profile" class="<?php if($currentPage == 'about'){echo 'active';}?>"><li>Profile</li></a>
					<a href="alumni.php?page=alumni" style="color: #222;" title="Alumni" class="<?php if($currentPage == 'alumni'){echo 'active';}?>"><li>Alumni</li></a>
					<div class="profile_image">
						<div class="p_image">

						<!-- Profile image in the center of navigation -->

							<?php
							$id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>" name="profile_img" id="profileImageContainer" alt="Profile Image">
							<?php 
								} else {?>
							<img src="image/default/user_default.png" name="profile_img" id="profileImageContainer" alt="Profile Image">
							<?php
								}
							
							?>
						<!-- End of the profile -->
							<span style="position: absolute;margin:69px 80px;" id="u_prof">
								<div>
								<i class="fas fa-pencil-alt" style="color: #fff;padding: 15px;border-radius: 50%;background-color: #222;cursor: pointer;">
								<form method="POST" action="inc/profile_update.php" enctype="multipart/form-data" id="user_profile_img_form" style="position: absolute">
									<input type="file" name="photo" style="position: absolute; margin: -30px -20px;width: 45px; height: 45px;opacity: 0;cursor: pointer;" alt="update profile image" id="profileImage" accept="image/*">
								</form>
									
								</i>

								</div>
							</span>
						</div>						
						<span><b><?php echo $_SESSION['usrName'];?></b><!-- <?php echo $_SESSION['usrLastName'];?> --></b></span>
						<!-- <i style="font-size: 12px;">Dumaguete Philippines</i> -->
					</div>
					<a href="photo.php?page=photo" style="color: #222;" title="Photos" class="<?php if($currentPage == 'photo'){echo 'active';}?>"><li>Photos</li></a>
					<a href="videos.php?page=video" style="color: #222;" title="Videos" class="<?php if($currentPage == 'video'){echo 'active';}?>"><li>Videos</li></a>
					<a href="sys.php?page=system" id="bckSave" style="color: #222;" title="Videos" class="<?php if($currentPage == 'system'){echo 'active';}?>"><li id="save">About Us</li></a>
				</ul>
			</nav>
		</div>
<?php
}else{
	header("Location: index.php");
	exit();
}

?>
<!-- Study this part -->
<script>
	$(document).ready(function(){
		function readURL(input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		    	// css one of jquery method which give you the ability to change css property and value
		      $('#backgroundImage').css('background-image', 'linear-gradient(rgba(0, 0, 0, 0.1), rgb(24, 24, 24) 500px)' + ', url("' + e.target.result + '")');
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}
		$("#backgroundImageSrc").change(function() {
			$("#user_wall_img_form").submit();
		  readURL(this);
		});

	 // Script for changing profile image
		function profileImg(input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#profileImageContainer').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}
		
		$("#profileImage").change(function() {
			$('#user_profile_img_form').submit();
		  profileImg(this);
		});

	});
</script>



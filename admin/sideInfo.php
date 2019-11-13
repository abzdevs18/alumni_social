<?php
include '../inc/conn_db.php';
if ( isset($_POST['id']) ) {
	$id = $_POST['id'];
	$info = mysqli_query($conn, "SELECT `id`,`course`, `userName`, `userLastName` FROM users WHERE id = '$id'");
	if ($info) {
		$row = mysqli_fetch_assoc($info);
		$u_id = $row['id'];
		$about = mysqli_query($conn, "SELECT * FROM about WHERE f_k = '$u_id'");
		$ab = mysqli_fetch_assoc($about);
		$intro = $ab['intro'];
			$img = "SELECT * FROM wall_img WHERE user_id = '$id' AND wall_use = 1";
			$q_img = mysqli_query($conn,$img);
			/*JOb*/

					/*EMployment query*/
					$emp = mysqli_query($conn,"SELECT * FROM add_emp WHERE f_k = '$id'");
					$em = mysqli_fetch_assoc($emp);

			if ($q_img) {
				$wall = mysqli_fetch_assoc($q_img);?>
					<div class="pro-wrp">
						<?php
						if($wall){?>
							<div style="background-image:linear-gradient(to top, rgba(51,51,51,0.2), rgba(51,51,51,0)),url('<?php echo "../inc/uploaded/wall/". $wall['wall_path'];?>');height: 160px;background-size: contain;background-repeat: no-repeat;background-position: center;background-size: cover;">
						<?php
							} else {?>
							<div style="background-image:linear-gradient(to top, rgba(51,51,51,0.2), rgba(51,51,51,0)),url('../image/default/wall.jpg');height: 160px;background-size: contain;background-repeat: no-repeat;background-position: center;background-size: cover;">
						<?php	} ?>
						</div>
						<div style="display: flex;">
							<div id="cont-img">

						<!-- Profile image in the center of navigation -->

							<?php
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
							$p_img = mysqli_query($conn,$img);
							$rim = mysqli_fetch_assoc($p_img);
							if($rim){?>
							<div class="pro-img" style="background-image:url('<?php echo "../inc/uploaded/". $rim['img_path'];?>');background-size: contain;background-repeat: no-repeat;background-position: center;background-size: cover;">
							<?php 
								} else {?>
							<div class="pro-img" style="background-image:url('../image/default/user_default.png');background-size: contain;background-repeat: no-repeat;background-position: center;background-size: cover;">
							<?php
								}
							
							?>
						<!-- End of the profile -->								
								</div>
								<div style="margin-top: 20px;text-align: center;">
							<!-- 		Contact #: <span style="font-size: 13px;font-style: italic;"><?php echo $row['id'];?></span> -->
									<input type="hidden" id="jkl" value="<?php echo $row['id'];?>">
									<span style="color: #555;font-size: 20px;"><?php echo $row['userName'];?></span><br />
									<span style="color: #555;font-size: 20px;"><?php echo $row['userLastName'];?></span><br />
									
								</div>	
							</div>
							<div id="introProf">
								<div style="padding: 3px 0px;">
									Course: <span style="font-size: 13px;font-style: italic;"><?php echo $row['course'];?></span>
								</div>
								<div style="padding: 3px 0px;">
									Contact #: <span style="font-size: 13px;font-style: italic;"><?php echo $ab['phone'];?></span>
								</div>
								<div>
									Email: <span style="font-size: 13px;font-style: italic;"><?php echo $ab['email'];?></span>
								</div>
								<!-- Job information -->
								<div>
									Work's at: <span style="font-size: 13px;font-style: italic;"><?php echo $em['company'];?></span>
								</div>
								<div>
									Job Title: <span style="font-size: 13px;font-style: italic;"><?php echo $em['jobTitle'];?></span>
								</div><br />
								<?php echo $intro; ?>
								<div id="p-action-btn">
									<!-- <button class="reMvPrev more">show more..</button> -->
									<a href="inc/suspended.php?id=<?php echo $id; ?>" style="float: right;"><button class="reMvPrev">Suspend</button></a>								
								</div>
							</div>								
						</div>
					</div>
			<?php
			}
	}
}
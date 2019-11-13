<?php
	include 'home.php';
	 if ($_SESSION['usrName']) {
	 	?>
		<div class="home_content">
			<div class="about_container" style="position: -webkit-sticky;position: sticky;bottom: 1rem;align-self: flex-end;">
				<!-- MESSAGE PART IN TIMELINE -->
				<div>
						<div style="color: #222;padding: 15px;padding-top: 0px;">
						<div style="color: #222;padding: 15px;background-color: #f3f3f3;">
							<span style="font-weight: bold;font-size: 15px;">Messages</span>
						</div>	
						<hr> 
						<?php

							
							$currentUser =  $_SESSION['usrID'];
							$msg = "SELECT DISTINCT * FROM tbl_msg WHERE msg_sender != '$currentUser' ORDER BY msg_time DESC LIMIT 5";			
							$q = mysqli_query($conn, $msg);		
							while ($rw = mysqli_fetch_assoc($q)) {
								$msg_sender = $rw['msg_sender'];
								$msg_receiver = $rw['msg_receiver'];
								// $dw = "SELECT users.id AS 'id', users.userName AS 'fd', user_user_photo.user_id, user_user_photo.img_path FROM users INNER JOIN user_user_photo ON users.id = user_user_photo.user_id WHERE users.id = '$msg_sender'";
								$dw = "SELECT * FROM users WHERE id = '$msg_sender'";
								$dw_q = mysqli_query($conn,$dw);
							if ($dw_q) {
								$row = mysqli_fetch_assoc($dw_q);
								$m_id = $row['id'];
								?>
								<a href="message.php?user=<?php echo $m_id; ?>">
								<div style="width: 100%;background-color: #f3f3f3;padding: 5px;">
									<div class="r-msg-wrapper">

									<?php
										$img = "SELECT * FROM user_user_photo WHERE user_id = '$msg_sender' AND profile_photo = 1";
										$q_img = mysqli_query($conn,$img);
										$r = mysqli_fetch_assoc($q_img);
										if($r){?>
											<div class="sender-recent-msg" style="background-image: url('<?php echo "inc/uploaded/".$r['img_path']; ?>');border-radius: 3px;">	
											<?php 
										} else {?>
										<div class="sender-recent-msg" style="background-image: url('image/default/user_default.png');border-radius: 3px;">
										<?php
											}?>
										</div>
										<div class="recent-msg-wrap">
											<span class="recent-msg-head"><?php echo $row['userName']; ?></span>
											<p class="recent-msg"><?php echo $rw['msg_content']; ?></p>
										</div>
									</div>
								</div>
								</a>
						<?php
							}
						}	
						?>

					<div style="background-color: #f3f3f3;margin-top: 15px">
						<div style="color: #222;padding: 15px;">
							<span style="font-weight: bold;font-size: 15px;">Latest Videos</span>
							<!-- <span style="float: right;font-size: 20px;margin-top: -5px;"><b>&#8230;</b></span> -->
						</div>	
						<hr> 
						<?php
						$v = mysqli_query($conn,"SELECT * FROM `video_upload` ORDER BY video_id DESC");
						$vid = mysqli_fetch_assoc($v);
						$f_k = $vid['video_fk'];
						?>
						<div class="v_section">
							<video width="100%" style="margin: 5px 0px;" controls="false">
								<source src="<?php echo "admin/uploads/video/".$vid['video_path'];?>" type="video/mp4">
							</video>
						</div>
					</div>
					<div style="background-color: #f3f3f3;">
							<span style="font-weight: bold;font-size: 15px;"></span>
						</div>
						<hr> 
						<div style="display: flex;flex-direction: row;background-color: #f3f3f3;" class="sidebar_menu">
							<a href="index.html"><p>Menu</p></a>
							<a href="#"><p>About</p></a>
							<a href="#"><p>Contact</p></a>			
							<a href="#"><p>Creator</p></a>
						</div>
					</div>
				</div>
			</div>
			<div class="post_container">
				<!-- Comment Go here -->
			<!-- 
				Script the will provide
				content in here is located in:
				header.php 
				head part 
			-->
				
				<!-- Comment ends Here -->
				<div id="loadingIocn" style="display: none;">
					<img src="image/loading.gif" style="width: 70px;margin: 0 auto;display: block;">
				</div>
			</div>
			<div class="feature_container">
				<div style="background-color: #f3f3f3;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Online Alumni</span>
						<!-- <span style="float: right;font-size: 20px;margin-top: -5px;"><b>&#8230;</b></span> -->
					</div>	
					<hr> 
					<?php
					$idd = $_SESSION['usrID'];
						$query = "SELECT * FROM users WHERE online = 1 AND id != '$idd'";
						$query_result = mysqli_query($conn, $query);
						while ($rows = mysqli_fetch_assoc($query_result)) {
							$m_id = $rows['id'];
							$online = $rows['online'];
					?>

					<a href="message.php?user=<?php echo $m_id; ?>">
						<div style="width: 100%;background-color: #f3f3f3;padding: 5px;transition: all .3s ease-in-out;cursor: pointer;" id="o-user">
							<div class="r-msg-wrapper" style="height: 45px;">
								<?php
									$img = "SELECT * FROM user_user_photo WHERE user_id = '$m_id' AND profile_photo = 1";
									$q_img = mysqli_query($conn,$img);
									$row = mysqli_fetch_assoc($q_img);
									if($row){?>
										<div class="sender-recent-msg o-alum" style="background-image: url('<?php echo "inc/uploaded/".$row['img_path']; ?>');">	
										<?php 
									} else {?>
									<div class="sender-recent-msg o-alum" style="background-image: url('image/default/user_default.png');">
									<?php
										}?>
									<?php
									if ($online == 1) {?>
									<div class="green-wrp o-alum-icon">
										<div class="green-icon" style="display: block;margin:0px;">											
										</div>									
									</div>
									<?php
										}
									?>
								</div>
								<div class="recent-msg-wrap">
									<span class="recent-msg-head" style="font-weight: normal;"><?php echo $rows['userName'];?></span>
								</div>
							</div>
						</div>
					</a>

					<?php 
						}
					?>
				</div>
			</div>		
		</div>
	<?php 
	}else{
		header("Location: index.php");
		exit();
	}
	?>
	</div>
	</div>
</main>
</body>
</html>
<?php 
// include 'footer.php';
?>
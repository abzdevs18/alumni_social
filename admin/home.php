<?php
include('header.php');
// require_once 'header.php';
include '../inc/functions/function.php';
?>
<!--

In this part add the header that includes the links to all the Assets

-->
<div>
		<section class="dashboard" >
			<div class="feature-things">
				<div class="things">
					<div class="comments">
						<i class="fas fa-comments"></i>
					</div>
					<div class="things-text">
						<span>Comments</span>
						<p><?php commentsNumber($conn); ?></p>
					</div>
				</div>
			</div>
			<div class="feature-things">
				<div class="things">
					<div class="comments">
						<i class="fas fa-chart-area" style="color: #ffb463;"></i>
					</div>
					<div class="things-text">
						<span>Reactions</span>
						<p><?php reactionsFromBeginning($conn); ?></p>
					</div>
				</div>
			</div>
			<div class="feature-things">
				<div class="things">
					<div class="comments">
						<i class="fas fa-envelope" style="color: #ab8ce4;"></i>
					</div>
					<div class="things-text">
						<span>Messages</span>
						<p><?php messagesReceive($conn); ?></p>
					</div>
				</div>
			</div>
			<div class="feature-things">
				<div class="things">
					<div class="comments">
						<i class="fas fa-users" style="color: #fb9678;"></i>
					</div>
					<div class="things-text">
						<span>Registered</span>
						<p><?php registered($conn); ?></p>
					</div>
				</div>
			</div>
		</section>
		<section class="activity-table">
			<div class="table-division">
				<h3 class="division-title">Activity</h3>
				<p class="division-description">What's people doing right now</p>
				<?php
				$c = mysqli_query($conn,"SELECT * FROM comments ORDER BY comment_timestamp DESC LIMIT 5");
				while($rw = mysqli_fetch_assoc($c)){
					$msg_sender = $rw['user_id'];
					$img = "SELECT * FROM user_user_photo WHERE user_id = '$msg_sender' AND profile_photo = 1";
					$q_img = mysqli_query($conn,$img);
					$r = mysqli_fetch_assoc($q_img);

				?>
				<div class="division-users">
					<div class="user-profile">
						<?php
							if($r){?>
								<img src="<?php echo "../inc/uploaded/".$r['img_path']; ?>">
						<?php 	}else{ ?>
								<img src="<?php echo '../image/default/user_default.png' ?>">
						<?php	}
						?>
					</div>
					<div class="user-activity">
					<?php 

					$n = mysqli_query($conn,"SELECT * FROM users WHERE id = '$msg_sender'");
					$rt = mysqli_fetch_assoc($n);

					?>
						<p><b><?php echo $rt['userName']; ?></b> comment on your post</p>
						<span><i class="far fa-clock"></i><?php echo $rw['comment_content']; ?></span>
					</div>
					<div class="duration-activity">
						<span><?php echo $rw['comment_date']; ?></span>
					</div>
				</div>
				<?php
					}
					?>
			</div>
			<div class="table-division">
				<h3 class="division-title">Reactions</h3>
				<p class="division-description">Alumni reactions to post</p>	
				<div id="myChart" style="height: 250px;">
					
				</div>		
				<!-- <div id="myfirstchart" style="height: 250px;"></div>			 -->
			</div>


			<div class="table-division">
				<h3 class="division-title">Employment Statistics</h3>
				<p class="division-description">Graph of registered Alumni</p>	
				<div id="user-growth" style="height: 250px;"></div>			
			</div>

			
		</section>
		<section class="messages-uploaded-photo-wrapper">
			<div class="photo-wrapper">
				<h3 class="division-title uploaded-photos">Uploaded photos</h3>
				<div class="feature-item-slide">

					<?php

					$ph = mysqli_query($conn, "SELECT * FROM image_upload ORDER BY img_id DESC LIMIT 4");
					while($p = mysqli_fetch_assoc($ph)){
					?>
					<div class="slide-wrapper">
						<!-- <img src="<?php echo "uploads/photo/" . $p['img_path'];?>"> -->
						<div style="background-image: url('<?php echo "uploads/photo/" . $p['img_path'];?>');background-position: center;background-repeat: no-repeat;background-size: cover;width: 100%;min-height: 100%;">
							
						</div>
					</div>
					<?php
					}
				?>
				</div>	
			</div>
			<div class="messages-wrapper">
				<div>
					<h3 class="messages-wrapper-title">Message request</h3>
					<p class="division-description">Message from users.</p>					
				</div>

					<?php						
						$currentUser =  0;
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
							<a href="message.php?user=<?php echo $m_id; ?>" style="text-decoration: navajowhite;color: #333;">
							<div class="division-users message-profile">
								<div class="user-profile">
									<?php
									$img = "SELECT * FROM user_user_photo WHERE user_id = '$msg_sender' AND profile_photo = 1";
									$q_img = mysqli_query($conn,$img);
									$r = mysqli_fetch_assoc($q_img);
									if($r){?>
										<img src="<?php echo "../inc/uploaded/".$r['img_path']; ?>">	
										<?php 
									} else {?>
										<img src="../image/default/user_default.png">
									<?php
										}?>
									<!-- <img src="../image/prof.jpg"> -->
								</div>
								<div class="user-activity">
									<p><b><?php echo $row['userName']; ?></b> send you a message</p>
									<span>
									<?php echo $rw['msg_content']; ?> 
									</span>
								</div>
								<div class="duration-activity">
									<!-- <span>2 hours ago</span> -->
								</div>
							</div>

							</a>
					<?php
						}else{
							echo mysqli_error($conn);
						}
					}	
					?>
			</div>			
		</section>
		<section class="table-users" style="min-height: 310px;width: auto;">
			<h3 class="table-users-title">Alumnus</h3>
			<div class="table-user-navigation">
				<div class="table-nav-items">
					<button class="add-user" style="width: 100px;cursor:progress;"><!-- <i class="fas fa-plus"></i> -->Search User</button>
					<input type="text" name="search-user" placeholder="Search" class="search-icon" id="alum_u">
				</div>
			</div>
			<div class="table-user-list">
				<table>
						<tr class="table-head-reg" style="position: sticky;top: 0;z-index: 999;border-top: 2px solid #333;border-bottom: 2px solid #333;opacity: 1 !important;background-color: #333;color: #fff;">
							<th>Name</th>
							<th>Lastname</th>
							<th>Email</th>
							<th style="width: 25%;text-align: left;">Account Status</th>
						</tr>
						<tbody class="re">
						<?php
							$w = mysqli_query($conn, "SELECT `id`,`userName`, `userLastName`, `account_status` FROM users WHERE id != 0");
							while ($alumni = mysqli_fetch_assoc($w)) {
								$id = $alumni['id'];
								$check = mysqli_query($conn,"SELECT * FROM about WHERE f_K = '$id'");
								$row = mysqli_fetch_assoc($check)
								?>
								<tr id="<?php echo $alumni['id']; ?>">
									<td><?php echo  $alumni['userName'];?></td>
									<td><?php echo $alumni['userLastName']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td style="text-align: center;">
										<button id="verified" value="<?php echo $alumni['id']; ?>">Verified</button> | 
										<button id="suspended" value="<?php echo $alumni['id']; ?>">Suspend</button>

										<?php 
											$vision = '';
											if ($alumni['account_status'] == 1) {
												$vision = 'hidden';
											}else{
												$vision = 'visible';
											}
										?>
										<p style="visibility:<?php echo $vision; ?>;display: inline;font-size: 10px;padding: 10px;font-style: italic;color: red;">
										This account is suspended</p>
									</td>
								</tr>
						<?php	}
						?>
							
						</tbody>
				</table>
<!-- 				<div class="pagination">
					<div class="showing">
						<p>Showing <span>1</span> to <span>20</span> of <span>20</span> entries</p>
					</div>
					<div class="pagination-label">
						<ul class="pagination-number">
						  <li><a href="#"><i class="fas fa-angle-left"></i></a></li>
						  <li><a href="#">1</a></li>
						  <li><a href="#">2</a></li>
						  <li><a href="#">3</a></li>
						  <li><a href="#">4</a></li>
						  <li><a href="#">5</a></li>
						  <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
						</ul>
					</div>
				</div> -->
			</div>
		</section>
</div>
<!--

Add the footer of the system in this area

-->
<?php
include('footer.php');
?>

<?php
include('header.php');
?>
<!--

In this part add the header that includes the links to all the Assets

-->
		<section class="message-wrapper animsition" data-animsition-in-class="fade-in-left" data-animsition-in-duration="400" data-animsition-out-class="fade-out-left" data-animsition-out-duration="500">
			<div class="message-header">
				<div class="section-wrapper">
					<div class="message-header-wrapper">
						<div class="m-title">
							<span>Message</span>
							<span class="msg-email" style="cursor: pointer;">Compose Email</span>
						</div>
						<div class="icon-message-user new-message" style="display: none;">
							<i class="far fa-edit"></i>
						</div>					
					</div>
					<label class="search-field-wrapper">
						<i class="fas fa-search"></i>
						<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
					</label>					
				</div>
				<div class="re" style="background-color: #3c424d;margin-top: 20px;margin-bottom: 10px;">
						
					</div>
				<?php
				$id = $_REQUEST['user'];
				$queryUser = "SELECT * FROM users WHERE EXISTS(SELECT msg_sender FROM tbl_msg WHERE msg_sender = users.id ) AND id != 0 OR id = '$id'";
				$query = mysqli_query($conn,$queryUser);
				while ($rows = mysqli_fetch_assoc($query)) {
					$id_for_mg = $rows['id'];?>
				<a href="message.php?user=<?php echo $rows['id']; ?>">
				<!-- Below line of code very crucial in determining which user is click -->
					<?php $u_click_id = $_REQUEST['user'];?>
					<!-- inline php script make a background change if requested user  is the same with the ID -->
				<div class="list-user-msg-send">
					<div class="user-list <?php if ($u_click_id == $rows['id']) {
						echo 'userActive';
					}?>">
						<?php
							$img = "SELECT * FROM user_user_photo WHERE user_id = $id_for_mg ORDER BY img_up_time DESC LIMIT 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<div class="user-icon" style="background:url('<?php echo "../inc/uploaded/".$row['img_path'];?>');background-position: center;background-size: cover;background-repeat: no-repeat;<?php
								if ($rows['online'] == 1 ) {
									echo "border:3px solid #2c83b9;"; 
									//this will create a circular green border in users icon
								}else {
// 									if the user is offline white color
									echo "border:3px solid #fff;";
// 									if mo log out see what will happen
								}
							?>">
							<?php 
								} else {?>
							<div class="user-icon" style="background:url('../image/default/user_default.png');background-position: center;background-size: cover;background-repeat: no-repeat;<?php
								if ($rows['online'] == 1 ) {
								echo "border:3px solid #2c83b9;"; //this will create a circular green border in users icon
								}else {
// 									if the user is offline white color
									echo "border:2px solid #fff;";
// 									if mo log out see what will happen
								}
							?>">
							<?php
								}
							
							?><!-- 
						<div class="user-icon"> -->
							
							</div>
						<div class="use-msg-info">
							<!-- Latest Message -->

							<?php 
							$L_msg = mysqli_query($conn, "SELECT msg_content,msg_time FROM tbl_msg WHERE msg_sender = $id_for_mg ORDER BY msg_time DESC LIMIT 1");
							$message = mysqli_fetch_assoc($L_msg);
							?>
							<h3><?php echo $rows['userName']; ?></h3><span class="send-date"><?php echo substr($message['msg_time'], 10,-3); ?></span>
							<p><?php echo $message['msg_content']; ?></p>
							<!-- <p><b>You</b> Hello this is short message.</p> -->
						</div>
					</div>
				</div>
				</a>
				<?php
				 }
				?>

			
			</div>

<?php

	$wtr = $_REQUEST['user'];
	$wrt_q = mysqli_query($conn, "SELECT * FROM users WHERE id = '$wtr'");

	while($wrt_r = mysqli_fetch_assoc($wrt_q)){
		$rt = $wrt_r['online'];
	
?>

	 				<div class="message-content send-msg">
						<div class="send-to-user-top">
							<div class="reciever-name event-one">
								<h2><?php echo $wrt_r['userName']; ?></h2>
							</div>
							<div class="reciever-status event-one" style="display:<?php if ( $rt == '0') {echo "none !important;";}else{echo "flex !important;";}?>">
								<div class="green-icon"></div> <p style="margin-left: 20px;position: absolute;">Active now</p>
							</div>
						</div>
							<?php
							include 'chats.php';

							?>
						<div class="input-message">
							<form method="POSt" action="inc/send_admin.php">
							<label>
								<input type="text" name="message" id="mc" placeholder="Message me ">
								<input type="hidden" name="receiver" id="rq" value="<?php echo $_REQUEST['user']; ?>">
								<input type="hidden" name="sender" value="0"> 
								<!-- <span name="send" id="send" type="submit">Send</span> -->
								<input type="submit" id="send" name="send" value="Send">
							</label>
								
							</form>
						</div>
					</div> 
<!-- For sending EMails to all the Alumni -->
					<div class="message-content email-wrap" style="display: none;">
						<div class="send-to-user-top">
							<div class="reciever-name event-one">
								<h2>Send Email to All Alumni</h2>
							</div>
						</div>
							<?php
							include 'email-actions.php';
							?>
						<div class="input-message">
							<form method="POST" action="inc/send_email.php">
							<label style="display: flex;flex-direction: column;">
								<input type="hidden" name="dateSend" value="<?php echo date("D, M d, g:i A"); ?>">
								
								<div style="border-bottom: 1px solid #999;">
									<label style="color: #666;font-size: 14px;">Subject:</label>
									<input type="text" name="subject" id="mc" placeholder="Subject" style="width: 800px;padding-left: 0px;font-size: 14px;">
									<!-- <span name="send" id="send" type="submit">Send</span> -->
								</div>
								<div style="margin-top: 10px;margin-bottom: 15px;">
									<!-- <label style="color: #666;">Message:</label> -->
									<input type="text" name="message" id="mc" placeholder="Message me " style="width: 800px;padding-left: 0px;font-size: 14px;">
									<!-- <span name="send" id="send" type="submit">Send</span> -->
								</div>
								<input type="submit" id="send" name="email" value="Send" style="width: 100px;">
							</label>
								
							</form>
						</div>
					</div>

					<!-- End Sending Email -->
				</section>
		<?php
			}
			?>
<!--

Add the footer of the system in this area

-->
<?php
	include('footer.php');
?>
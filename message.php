<?php
 include 'header.php';
 error_reporting(0);
 if ($_SESSION['usrName']) {
	include 'inc/conn_db.php';
	$id = $_SESSION['usrID'];
	$user = $_SESSION['usrName'];
 	$u_click_id = '';
 ?>
<main>
	<div class="home_container">
		<!-- m is for message -->
		<div class="m_container">	
			<div class="m_r_s">
				<div class="top-chat">
					<div class="title-chat">
						<div class="chat-t">							
							<span>Alumni Messages</span>
						</div>
						<div class="msg-to-admin" style="cursor: pointer;display: none;">							
							<i class="far fa-edit"></i>
						</div>
					</div>

					<!-- Searching the user/recipient -->

					<div class="user_c_form">
						<i class="fas fa-search" id="search_icon"></i>
						<input type="text" name="searchUser" placeholder="search your recipient.. " id="recipient">
					</div>  
					<!-- End recepient -->
				</div>
				<div class="c_box_panel" id="dres">
					<div class="re">
						
					</div>

					<div id="u-res-msg">
						<a href="message.php?user=lid">
						<div class="p_c_img_wrapper admin-msg <?php if ($u_click_id == 'lid') {
						echo 'userActive';
					}?>" style="display: none;">
							<div class="p_c_img">
								<img src="image/default/user_default.png" style="border: 2px solid #fff;">
							</div>
							<div class="p_c_name">
								<span class="u_name"><?php echo  $_REQUEST['user']; ?></span><br>
								<!-- <span class="l_name">Anonymous</span> -->
								<p class="c_brief_description">in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>						
						</div>
						</a>
				<?php
				$queryUser = "SELECT * FROM users WHERE EXISTS(SELECT msg_sender FROM tbl_msg WHERE msg_sender = users.id ) AND userName != '$user' OR id != '$id'";
				$query = mysqli_query($conn,$queryUser);
				$id = $_REQUEST['user'];
				while ($rows = mysqli_fetch_assoc($query)) {
					$id_for_mg = $rows['id'];?>
				<a href="message.php?user=<?php echo $rows['id']; ?>">

					<!-- Below line of code very crucial in determining which user is click -->
					<?php $u_click_id = $_REQUEST['user'];?>
					<!-- inline php script make a background change if requested user  is the same with the ID -->
					<div class="p_c_img_wrapper <?php if ($u_click_id == $rows['id']) {
						echo 'userActive';
					}?>">

					<!-- for user selected in chat box -->

						<div class="p_c_img">
							<!-- The user ICON in message BOX -->
							<!-- in this part style the icon to detemine if the user is online or not -->
						<?php
							$img = "SELECT * FROM user_user_photo WHERE user_id = $id_for_mg ORDER BY img_up_time DESC LIMIT 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>" style="<?php
								if ($rows['online'] == 1 ) {
								echo "border:3px solid #2c83b9;"; //this will create a circular green border in users icon
								}else {
// 									if the user is offline white color
									echo "border:3px solid #fff;";
// 									if mo log out see what will happen
								}
							?>">
							<?php 
								} else {?>
							
							<img src="image/default/user_default.png" style="<?php
								if ($rows['online'] == 1 ) {
								echo "border:2px solid #2c83b9;"; //this will create a circular green border in users icon
								}else {
// 									if the user is offline white color
									echo "border:2px solid #fff;";
// 									if mo log out see what will happen
								}
							?>">
							<?php
								}
							
							?>
						</div>

						<!-- Latest Message -->

						<?php 
						$L_msg = mysqli_query($conn, "SELECT msg_content FROM tbl_msg WHERE msg_sender = $id_for_mg ORDER BY msg_time DESC LIMIT 1");
						$message = mysqli_fetch_assoc($L_msg);
						?>
						<div class="p_c_name">
							<span class="u_name"><?php echo $rows['userName']; ?></span><br>
							<!-- <span class="l_name">Philippines</span> -->
							<p class="c_brief_description"><?php echo $message['msg_content']; ?></p>
						</div>
					</div>
				</a>
				<?php
				 }
				?>
					</div>
				</div>
			</div>
			<div class="m_panel">
				<div style="width: 100%;position: relative;min-height: 100vh;">
		<div style=" width: 100%;padding: 15px;background-color: #f3f3f3;position: sticky;top: 55px;border-bottom: 1px solid #222;" class="change-when-admin">	
				<?php

				if($_REQUEST['user'] == 'lid'){?>
						<span style="color: #2f76a4;"><?php echo $_REQUEST['user']; ?></span>
				<?php
				}else{
					$queryUser = "SELECT * FROM users WHERE id = '$u_click_id'";
					$query = mysqli_query($conn,$queryUser);
					$rows = mysqli_fetch_assoc($query)?>
						<span style="color: #2f76a4;"><?php echo $rows['userName']; ?></span>
				<?php 
					}
					?>
					</div>
					<!-- Search a user to send the message to -->
			<!-- 		<div style=" width: 100%;padding: 15px;position: sticky;top: 55px;border-bottom: 1px solid #222;">
						<label>
							To:
							<input type="text" name="" style="color: #777;">					
						</label>
					</div> -->
					<div style="margin-top: 50px;">
				<?php

					include 'chatFrame.php';

				 ?>
				 	</div>
				<form id="messageBox" method="POST" action="inc/send_receive.php" style="width: 70%;height: 30px;margin-left:-13px;position: fixed;bottom: 0;">
					<input type="text" name="message" placeholder="send a message...<?php echo $_REQUEST['user']; ?>" >
					<input type="hidden" name="receiver" value="<?php echo $_REQUEST['user']; ?>">
					<input type="hidden" name="sender" value="<?php echo $_SESSION['usrID']; ?>">
					<input type="submit" name="send" value="send">
				</form> 

				</div>
			</div>
		</div>
	</div>
</main>
<?php
	}else {
		header("Location: login.php");
		exit();
	}
?>
<script>
	$(document).ready(function(){
		$('#usir').focus(function(){
			$(this).toggleClass("backGround");
		});
		$('.msg-to-admin').click(function(){
			$('.admin-msg').toggle();
			$('.change-when-admin').toggle().text("Welcome").replace("Welcome","Send Message to Admin");
		});
	});
</script>

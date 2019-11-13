				<?php
				$queryUser = "SELECT * FROM users WHERE userName != '$user'";
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
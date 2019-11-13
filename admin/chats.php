<?php
include '../inc/conn_db.php';
$d = $_SESSION['id'];
$revId = $_REQUEST['user']; 
$currentUser = 0;
$query = "SELECT * FROM tbl_msg WHERE (msg_sender = $currentUser AND msg_receiver = $revId) OR (msg_sender = $revId AND msg_receiver = $currentUser) ORDER BY msg_time ASC";

$resQuery = mysqli_query($conn, $query);
$result = mysqli_num_rows($resQuery);
if ($result > 0) {
	while ($rows = mysqli_fetch_assoc($resQuery)) {?>
		<div class="conversation" style="height: auto;">
		<?php
		if($rows['msg_sender'] == $currentUser){?>			
			<div class="sent">
				<div class="sent-wrapper">	
					<span><?php echo substr($rows['msg_time'], 10,-3); ?></span>				
					<div class="content-sent">
						<p><?php echo $rows['msg_content']; ?></p>
					</div>
				</div>
			</div><!-- Sent Close -->
		<?php 
			} else {
				?>
				<div class="recieve">
					<div class="recieve-wrap">
					<?php
					$uN = mysqli_query($conn, "SELECT * FROM users WHERE id = $revId");
					$nM = mysqli_fetch_assoc($uN);
					$img = "SELECT * FROM user_user_photo WHERE user_id = $revId ORDER BY img_up_time DESC LIMIT 1";
						$q_img = mysqli_query($conn,$img);
						while ($row = mysqli_fetch_assoc($q_img)) {
							if (mysqli_num_rows($q_img) > 0) {?>
								<div class="recieve-image" style="background:url('<?php echo "../inc/uploaded/".$row['img_path']; ?>');background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
							<?php 
							} else {
								?>
								<div class="recieve-image" style="background:url('image/default/user_default.png');background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
							<?php 
							}
							}
							?>							
						<div class="recieve-info">
							<span><?php echo $nM['userName']; ?> <?php echo substr($rows['msg_time'], 10,-3); ?></span>
							<div class="content">
								<p><?php echo $rows['msg_content']; ?></p>
							</div>
						</div><!-- revieve-info CLose -->
					</div> <!-- Recieve wrapper close -->
				</div><!-- Receive Close -->

			<?php
				}
				?>
		</div> <!-- /*End of conversation*/ -->
	<?php
	}
}

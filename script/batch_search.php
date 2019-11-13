<?php
	if (isset($_POST['year'])) {
		session_start();
		include '../inc/conn_db.php';
		$n = $_POST['year'];
		$currentUser = $_SESSION['usrID']; //So that the current user will not be included in list
		// $friends = mysqli_query($conn,"SELECT * FROM users WHERE id != '$currentUser'");
		$friends = mysqli_query($conn,"SELECT * FROM users WHERE yearGraduate = '$n' AND id != '$currentUser'");
		while ($rows = mysqli_fetch_assoc($friends)) {
			$id = $rows['id'];?>
			<div class="f_prof">
				<div class="f_prof_img">
					<?php
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
				<div class="f_prof_name" style="display: flex;flex-direction: column;color: #222; padding: 35px 20px;">
					<span style="display: block;position: absolute;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><?php echo $rows['userName']; ?></span>
				</div>
				<div style="padding: 35px 20px;right: 0;">
					<!-- <button style="width: 100px;height: 25px;">Friends</button> -->
					<a href="message.php?user=<?php echo $id; ?>"><button style="width: 130px;height: 25px;position: relative;margin-right: -10px;right: -110px;">Message</button></a>
				</div>
			</div>
		 <?php
		}
	}







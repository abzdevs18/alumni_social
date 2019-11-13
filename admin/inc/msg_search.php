<?php	
	if (isset($_POST['name'])) {
		session_start();
		include '../../inc/conn_db.php';
		$cur = 0;
				$queryUser = "SELECT id,userName FROM users WHERE id != '$cur'";
				$query = mysqli_query($conn,$queryUser);
				// $id = $_REQUEST['user'];
				$recv = array();
				while ($rows = mysqli_fetch_assoc($query)) {
					$recv[] = $rows;
				}


		$nameI = mysqli_real_escape_string($conn, $_POST['name']);
		$user = ucwords(strtolower($nameI));
		if (!empty($user)) {
			foreach ($recv as $suggestName) {
				$im = implode(",", $suggestName);
				if (strpos($im, $user) !== false) {?>
					<div id="res_wrapper" style="height: 70px;width: 390px;">
						<?php 
						$id = $im[0];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<div class="w_left" style="background-image: url('<?php echo "../inc/uploaded/".$row['img_path']; ?>');height: 70px;">	
							<?php 
								} else {?>
									<div class="w_left" style="background-image: url('../image/default/user_default.png');height: 70px;">
							<?php
								}

						?>
						</div>
						<div class="p_p-d" style="height: 60px;">
							<a href="#" style="text-decoration:none;margin-top: 4px;"><?php echo substr($im, 2); ?></a>
							<!-- <a href="#"><?php echo $im[2]; ?></a> -->
							<a href="message.php?user=<?php echo $id; ?>" class="button" style="margin-top: 7px;">SEND MESSAGE</a>
						</div>
					</div>
				<?php
				}
			}
		}
	}

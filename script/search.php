<?php	
	if (isset($_POST['suggestionName'])) {
		session_start();
		error_reporting(0);
		$s_id = $_SESSION['usrID'];
		include '../inc/conn_db.php';
		// search user db and store the result to array
		$query = "SELECT id,userName FROM users WHERE id != '$s_id'";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		// $js = json_encode($name);
		while ($row = mysqli_fetch_assoc($query_result)) {
			$name[] = $row;
		/*	$id = $row['id'];
			$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
			$q_img = mysqli_query($conn,$img);
			$row = mysqli_fetch_assoc($q_img);
			$name['photo'] = $row['img_path'];*/
		}

		$nameI = mysqli_real_escape_string($conn, $_POST['suggestionName']);
		$nameinput = ucwords(strtolower($nameI));
		// $query = "SELECT id,userName FROM users WHERE userName = '%$nameinput%'";
		// $query_result = mysqli_query($conn, $query);
		// Check the the array of users if the search value is equal to one of the users in the array
		if (!empty($nameinput)) {
			foreach ($name as $suggestName) {
				$im = implode(",", $suggestName);
				if (strpos($im, $nameinput) !== false) {
					$id = $im[0];
					$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
					$q_img = mysqli_query($conn,$img);
					$row = mysqli_fetch_assoc($q_img); ?>
					
					<div id="res_wrapper" data-animal-type="Fish">
						<?php 
							if($row){?>
							<input type="hidden" id="uID" value="<?php echo $id; ?>">
							<div class="w_left" onclick="showUp(<?php echo $id; ?>)" style="background-image: url('<?php echo "inc/uploaded/".$row['img_path']; ?>');cursor: pointer;">	
							<?php 
								} else {?>
									<div class="w_left" onclick="showUp(<?php echo $id; ?>)" style="background-image: url('image/default/user_default.png');cursor: pointer;">
							<?php
								}
						?>
						</div>
						<div class="p_p-d">
							<a href="#" id="n_res"><?php echo substr($im, 2); ?></a>
							<!-- <a href="#"><?php echo $im[2]; ?></a> -->
							<a href="message.php?user=<?php echo $id; ?>" class="button">SEND MESSAGE</a>
						</div>
						<input type="hidden" name="id_search_result" value="<?php echo $id;?>" id="val_id">
					</div>
					
			<?php	}
			}
		}
	}
?>
<?php	
		include '../inc/conn_db.php';

						$msg = "SELECT DISTINCT * FROM tbl_msg ORDER BY msg_time DESC LIMIT 5";		
						$q = mysqli_query($conn, $msg);
						while ($rw = mysqli_fetch_assoc($q)) {
							$d = $rw['msg_receiver'];
							$dw = "SELECT users.id, users.userName AS 'fd', user_user_photo.user_id, user_user_photo.img_path FROM users INNER JOIN user_user_photo ON users.id = user_user_photo.user_id WHERE user_user_photo.user_id = '$d'";
							$dw_q = mysqli_query($conn,$dw);
							$row = mysqli_fetch_assoc($dw_q);
							$r = array();
							// if ($row = mysqli_fetch_assoc($dw_q)) {
								$r[] = $row;
								echo $row['fd'] . "<br />";
							// }
						}
						echo json_encode($r);

/*		$query = "SELECT users.id, users.userName, user_user_photo.user_id, user_user_photo.img_path FROM users INNER JOIN user_user_photo ON users.id = user_user_photo.user_id";
		// $query = "SELECT users.id,users.userName,users_users_photo.user_id,user_user_photo.img_path FROM users LEFT JOIN user_user_photo ON users.id = users_users_photo.user_id";
		$query_result = mysqli_query($conn, $query);
		$r = array();
		while ($row = mysqli_fetch_assoc($query_result)) {
			# code...
			$r[]=$row;
		}
		echo json_encode($r);*/



<?php
	if (isset($_POST['login'])) {
		include '../../inc/conn_db.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$userPass = mysqli_real_escape_string($conn, $_POST['password']);
		$check = mysqli_query($conn,"SELECT * FROM admin_email WHERE email = '$email'");
		$result = mysqli_num_rows($check);
		if ($result < 1) {
			//User doesn't match to any names in the satabasse;
			header("Location: ../index.php?user=doesn't_Match");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($check)) {
				$em_fk = $row['f_k'];
				$qw = mysqli_query($conn,"SELECT * FROM admin_user WHERE id = '$em_fk'");
				if ($wrt = mysqli_fetch_assoc($qw)) {
					$hashed = password_verify($userPass,$wrt['password']);
					if ($hashed == false) {
				 		header("Location: ../index.php?password=Wrong Pass");
					 	exit();
					}else{
						$userID = $wrt['id'];
						$online = "UPDATE admin_user SET status = 1 WHERE id = '$em_fk'";
						$online_query = mysqli_query($conn,$online);
						// mysqli_store_result($conn,$online);
						if ($online_query) {
							session_start();
							$_SESSION['user'] = $wrt['name'];
							$_SESSION['id'] = $wrt['id'];
							header("Location: ../home.php");
							exit();
						}else{
							echo "string";
						}	
					}
				}
			}
		}
	}
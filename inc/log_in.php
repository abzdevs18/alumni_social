<?php
	session_start();
	if (isset($_POST['submit'])) {
		include 'conn_db.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$userPass = mysqli_real_escape_string($conn, $_POST['password']);
		$check = mysqli_query($conn,"SELECT * FROM about WHERE email = '$email'");
		$result = mysqli_num_rows($check);
		if ($result < 1) {
			//User doesn't match to any names in the satabasse;
			header("Location: ../login.php?user=doesn't_Match");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($check)) {
				$id = $row['f_k'];
				$ab = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
				$res = mysqli_fetch_assoc($ab);
				if ($res['account_status'] != 0) {
					$hashed = password_verify($userPass,$res['password']);
					if ($hashed == false) {
						header("Location: ../login.php?password=Failed");
						exit();
					}else {
						// in login the are the same same process
						$user = $res['userName'];
										// update the value in online column
						$online = mysqli_query($conn, "UPDATE users SET online = 1 WHERE userName = '$user'");
										// if the above is successful
						if ($online) {
							$_SESSION['usrName'] = $res['userName'];
							$_SESSION['usrLastName'] = $res['userLastName'];
							$_SESSION['usrID'] = $res['id'];
							$_SESSION['grad'] = $res['yearGraduate'];
							header("Location: ../timeline.php?page=timeline");
							exit();
							// save
						}

					}
				} else {
				  header("Location: ../index.php?status=sus");
				  exit();
				}
			}
		}

	}
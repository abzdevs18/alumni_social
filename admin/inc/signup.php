<?php
include '../../inc/conn_db.php';

	$name = mysqli_real_escape_string($conn,$_POST['Name']);
	$lastname = mysqli_real_escape_string($conn,$_POST['Lastname']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	$target = "../uploads/photo/profiles/".basename($_FILES['photo']['name']);
	$image = $_FILES['photo']['name'];
	$response_array = array();

	if (!empty($userName) || !empty($userLastname) || !empty($userEmail) || !empty($password)) {
			if (preg_match("/^[a-zA-Z ]*$/", $name) && preg_match("/^[a-zA-Z ]*$/", $lastname)) {
			/*	if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/', $password)) {
					//make sure password is alphaNumeric
					header("Location: ../index.php?password=not_alphaNum");
					// header('Content-type: application/json');
					// $response_array['fields'] = 'empty';
					// echo json_encode($response_array);
					exit();
				}else{*/
					//encrypt password
					$passEncrypt = password_hash($password, PASSWORD_DEFAULT);
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: ../index.php?error=email");
						exit();
					// header('Content-type: application/json');
					// $response_array['email'] = 'invalid';
					// echo json_encode($response_array);
					}else{
						$emailCheck = "SELECT `email` FROM admin_email WHERE email = '$email'";

						$result = mysqli_query($conn, $emailCheck);
						$resultcheck = mysqli_num_rows($result);

						if ($resultcheck > 0) {
							header("Location: ../index.php?user=exist");
							// header('Content-type: application/json');
							// $response_array['users'] = 'exist';
							// echo json_encode($response_array);
							exit();
						}else{
						if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {

							$q = "INSERT INTO `admin_user`(`name`, `lastname`, `gender`, `password`) VALUES ('$name','$lastname','$gender','$passEncrypt')";
							$query = mysqli_query($conn,$q);
							if ($query) {
								$admin_id = mysqli_insert_id($conn);
								// Multiple Statement in one Line
								$stmnt = "INSERT INTO `admin_profile_photo`(`f_k`, `prof_status`, `image_path`) VALUES ('$admin_id', 1 , '$image')";
								if (mysqli_query($conn,$stmnt)) {
									$img_stmt = "INSERT INTO `admin_email`(`f_k`, `email`) VALUES ('$admin_id','$email')";
									if (mysqli_query($conn,$img_stmt)) {
										$q = "SELECT * FROM `admin_user` WHERE name = '$name'";
										$qq = mysqli_query($conn,$q);
										if ($qq) {
											if ($row = mysqli_fetch_assoc($qq)) {
												$userID = $row['id'];
												$online = "UPDATE admin_user SET status = 1 WHERE id = '$userID'";
												$online_query = mysqli_query($conn,$online);
												mysqli_store_result($conn,$online);
												if ($online_query) {
													session_start();
													$_SESSION['user'] = $row['name'];
													$_SESSION['id'] = $row['id'];
													header("Location: ../home.php");
													exit();
												}
											}
										}
									}
								}
							}
						}
					}
				}
			// }
		}
	}
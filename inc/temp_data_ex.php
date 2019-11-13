<?php
					if ($userPassword !== $confirmPassword) {
						header("Location: ../index.php?password=PasswordDontmatch");
						exit();
					}else{
						//encrypt password
						$passEncrypt = password_hash($userPassword, PASSWORD_DEFAULT);

						if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
								header("Location: ../index.php?error=email");
								exit();
						}else{
							$emailCheck = "SELECT `email` FROM about WHERE email = '$userEmail'";

							$result = mysqli_query($conn, $emailCheck);
							$resultcheck = mysqli_num_rows($result);

							if ($resultcheck > 0) {
								header("Location: ../index.php?user=exist");
								exit();
							}else{
								// $sql = "INSERT INTO `users`(`yearGraduate`, `Employed`, `Unemployed`, `course`, `userName`, `userLastName`, `password`, `userGender`, `birth_details`, `online`, `account_status`) VALUES ('$year_graduate','$em','$um','$course','$userName','$userLastname','$passEncrypt','$userGender','$userBirthday',1,1);";
								$sql = "INSERT INTO `users`(`yearGraduate`, `course`, `userName`, `userLastName`, `password`, `userGender`, `birth_details`, `online`, `account_status`) VALUES ('$year_graduate','$course','$userName','$userLastname','$passEncrypt','$userGender','$userBirthday',1,1);";
								$query = mysqli_query($conn,$sql);
								if ($query) {
									$f_ = mysqli_insert_id($conn);
									$contact = mysqli_query($conn, "INSERT INTO about(`f_k`, `email`, `address`, `phone`) VALUES ( '$f_','$userEmail','$address','$contact_num')");
									if ($contact) {
										$display = mysqli_query($conn,"SELECT `id`,`userName`,`userLastName` FROM users WHERE  userName = '$userName'");
										$row = mysqli_fetch_assoc($display);
										if ($display) {

											// first get the userName of the user

											$user = $row['userName'];
											// update the value in online column
											$online = mysqli_query($conn, "UPDATE users SET online = 1 WHERE userName = '$user'");
											// if the above is successful
											if ($online) {
												//create session
												$_SESSION['usrName'] = $row['userName'];
												$_SESSION['usrLastName'] = $row['userLastName'];
												$_SESSION['usrID'] = $row['id'];
												$_SESSION['grad'] = $row['yearGraduate'];
												header("Location: ../timeline.php?page=timeline");
												exit();
											}
										}else{
												echo "hj".mysqli_error($conn);
											}			//LETS try it	
									}else{
									echo "hggj".mysqli_error($conn);
								}
								}else{
									echo mysqli_error($conn);
								}
							}
						}
					}
<?php 
	include 'conn_db.php';
	session_start();
	
	if (isset($_POST['submit'])) {
		
		$year_graduate = mysqli_real_escape_string($conn,$_POST['yearGrad']);
		// $emStatus = mysqli_real_escape_string($conn,$_POST['emStatus']);
		$course = mysqli_real_escape_string($conn,$_POST['course']);
		$userN = mysqli_real_escape_string($conn,$_POST['name']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		$contact_num = mysqli_real_escape_string($conn,$_POST['contact_num']);
		// make the input text into lower case and convert each first letter of word uppercase
		$userName = ucwords(strtolower($userN));
		$userL = mysqli_real_escape_string($conn,$_POST['lastname']);
		$userLastname = ucwords(strtolower($userL));
		
		$userEmail = mysqli_real_escape_string($conn,$_POST['email']);
		$userPassword = mysqli_real_escape_string($conn,$_POST['password']);
		$confirmPassword = mysqli_real_escape_string($conn,$_POST['confirm-password']);

		$userGender = mysqli_real_escape_string($conn,$_POST['gender']);

		$b_day = $_POST['birth_month'] .$_POST['birth_day'] .$_POST['birth_year'];
		$userBirthday = mysqli_real_escape_string($conn,$b_day);


		if (!empty($userName) || !empty($userLastname) || !empty($userEmail) || !empty($userPassword)) {
			if (preg_match("/^[a-zA-Z ]*$/", $userName) && preg_match("/^[a-zA-Z ]*$/", $userLastname)) {
				if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/', $userPassword)) {
					// (?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20}
					//make sure password is alphaNumeric
					header("Location: ../index.php?password=not_alphaNum");
					exit();

				}else{
					$full_name = $userN." ".$userL;
					$n = ucwords(strtolower($full_name));
					$course = $course;
					$tmp = mysqli_query($conn, "SELECT * FROM tmp_data WHERE name = '$n'");
					$numRes = mysqli_num_rows($tmp);
					if ($numRes > 0) {
						//if user name is invalid
						$c = mysqli_fetch_assoc($tmp);
						if ($c['course'] == $course) {
							include 'temp_data_ex.php';
						} else {
							header("Location: ../index.php?You_Are_not_in_the_record");
							exit();
						}
					}else{
						header("Location: ../index.php?You_Are_not_in_the_record");
						exit();
					}
				}
			}else{
				//if user name is invalid
				header("Location: ../index.php?name=onlyLettersAllowed");
				exit();
			}
		}else{
			//make sure fill out everything
			header("Location: ../index.php?user=mistSomething");
			exit();
		}

	}
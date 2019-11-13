<?php
	session_start();
	include 'conn_db.php';
	$id = $_SESSION['usrID'];

	if (isset($_POST['address'])) {
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);

		$queryAbout = mysqli_query($conn, "INSERT INTO `about`(`f_k`, `address`, `phone`, `email`) VALUES('$id','$address','$phone','$email')");
		if ($queryAbout) {
			echo "success";
		}else {
			echo mysqli_error($conn);
		}
	}
	if (isset($_POST['intro'])) {
		$intro = $_POST['intro'];
		$up = mysqli_query($conn,"UPDATE `about` SET intro = '$intro' WHERE f_k = '$id'");
		if ($up) {
			echo "success";
		}else {
			echo mysqli_error($conn);
		}
	}
	if (isset($_POST['xp'])) {
		$experience = $_POST['xp'];
		$up = mysqli_query($conn,"UPDATE `about` SET experience = '$experience' WHERE f_k = '$id'");
		if ($up) {
			echo "success";
		}else {
			echo mysqli_error($conn);
		}
	}

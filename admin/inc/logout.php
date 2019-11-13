<?php
	include '../../inc/conn_db.php';
	session_start();
	// here in logout just change the 0 into 1
	$userID =$_SESSION['id'];
	// 0 means the user is not online
	$offline = mysqli_query($conn, "UPDATE admin_user SET status = 0 WHERE id = '$userID'");
	// if the above is successful
	if ($offline) {
		session_unset();
		session_destroy();
		header("Location: ../index.php");
		exit();
	}
// let's hope mo run sya hahah
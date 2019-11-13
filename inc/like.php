<?php
	include 'conn_db.php';
	include 'functions/function.php';
	session_start();

	$p_id = $_POST['id'];
	$u_id = $_SESSION['usrID'];
	$date_rec = Date('F');
	$query = mysqli_query($conn, "SELECT * FROM reactions WHERE user_id = '$u_id' AND post_id = '$p_id'");
	// $r = mysqli_fetch_assoc($query);
	$row = mysqli_num_rows($query);
	if ($row < 1) {
		$like = 1;
		$r = "INSERT INTO `reactions`(`post_id`, `user_id`, `post_like`,`month`) VALUES ('$p_id','$u_id','$like','$date_rec')";
		$p_query = mysqli_query($conn,$r);
		likes($conn,$p_id);
	}else{
		$r = "DELETE FROM `reactions` WHERE post_id = '$p_id' AND user_id = '$u_id'";
		$p_query = mysqli_query($conn,$r);
		likes($conn,$p_id);
	}

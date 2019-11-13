<?php
	include '../../inc/conn_db.php';
	session_start();

 if (isset($_POST['send'])) {
 	$user = $_POST['sender'];
 	$msg = mysqli_real_escape_string($conn,$_POST['message']);
 	$rcvr = $_POST['receiver'];
		
	// $send_timestamp = $_SERVER['REQUEST_TIME'];

	if ($rcvr == 'lid') {
	$query = "INSERT INTO tbl_msg (`msg_receiver`, `msg_sender`, `msg_content`) VALUES ( 0, '$user','$msg')";
		
	}
	$query = "INSERT INTO tbl_msg (`msg_receiver`, `msg_sender`, `msg_content`) VALUES ('$rcvr', '$user','$msg')";

	$query_statement = mysqli_query($conn,$query);
	if ($query_statement) {
		// after submit form redirect to the same person ID
		header("Location: ../message.php?user=" . $rcvr); 
		exit();
	}else{
		echo mysqli_error($conn);
	}

 }
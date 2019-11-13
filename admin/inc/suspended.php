<?php

include '../../inc/conn_db.php';

if (isset($_POST['id']) || isset($_REQUEST['id'])) {

	$id = $_POST['id'];
	$id = $_REQUEST['id'];

	$sus = mysqli_query($conn, "UPDATE `users` SET `account_status`= 0 WHERE id = '$id'");
	if ($sus) {
		header("Location: ../list_of_alumni.php");
		exit();
	}
}



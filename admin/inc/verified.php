<?php

include '../../inc/conn_db.php';

$id = $_POST['id'];

$sus = mysqli_query($conn, "UPDATE `users` SET `account_status`= 1 WHERE id = '$id'");
if ($sus) {
	echo "string";
}


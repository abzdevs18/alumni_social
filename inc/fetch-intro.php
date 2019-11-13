<?php
	session_start();
	include 'conn_db.php';
	$id = $_SESSION['usrID'];

	$m = mysqli_query($conn, "SELECT id, intro, experience FROM about WHERE f_k = '$id'");
	$r = mysqli_fetch_assoc($m);

	echo $r['intro'];


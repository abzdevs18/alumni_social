<?php

include 'conn_db.php';
session_start();
$id = $_SESSION['usrID'];

$target = "uploaded/featured_img/".basename($_FILES['feat']['name']);
$image = $_FILES['feat']['name'];
if (move_uploaded_file($_FILES["feat"]["tmp_name"], $target)) {
	$insert_img = "INSERT INTO `featured_img`(`img_fk`, `img_path`) VALUES ('$id', '$image')";
	$sql = mysqli_query($conn,$insert_img);
	if ($sql) {
		header("Location: ../about.php?page=about");
		exit();
	}
}
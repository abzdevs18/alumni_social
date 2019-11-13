<?php
include '../../inc/conn_db.php';
session_start();
$id = $_SESSION['id'];
$post_date = Date('F j, Y');
// $post_timestamp = $_SERVER['REQUEST_TIME'];
$content = $_POST['content'];
// $img = $_POST['image'];

$type = $_POST['file_type'];
if ($type == 'image') {
	$target = "../uploads/photo/".basename($_FILES['admin_photo']['name']);
	$image = $_FILES['admin_photo']['name'];
	if (move_uploaded_file($_FILES["admin_photo"]["tmp_name"], $target)) {
		$insert = "INSERT INTO `admin_post`(`f_k`, `post_content`, `post_Date`) VALUES ('$id', '$content','$post_date')";
		$in = mysqli_query($conn,$insert);
		if ($in) {
			$i_q = mysqli_query($conn, "INSERT INTO `image_upload`(`img_fk`, `img_path`) VALUES (LAST_INSERT_ID(),'$image')");
			if ($i_q) {
				header("Location: ../home.php");
				exit();				
			}
		}else{
			header("Location: ../home.php");
			exit();			
		}
	}
}else if($type == 'video'){
	$target = "../uploads/video/".basename($_FILES['admin_video']['name']);
	$video = $_FILES['admin_video']['name'];
	if (move_uploaded_file($_FILES["admin_video"]["tmp_name"], $target)) {
		$insert = "INSERT INTO `admin_post`(`f_k`, `post_content`, `post_Date`) VALUES ('$id','$content','$post_date')";
		$in = mysqli_query($conn,$insert);
		if ($in) {
			$i_q = mysqli_query($conn, "INSERT INTO `video_upload`(`video_fk`, `video_path`) VALUES (LAST_INSERT_ID(),'$video')");
			if ($i_q) {
				header("Location: ../home.php");
				exit();				
			}
		}else{
			header("Location: ../home.php");
			exit();			
		}
	}	
}
	



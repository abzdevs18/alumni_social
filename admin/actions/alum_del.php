<?php
include '../../inc/conn_db.php';
$pid = $_REQUEST['id'];

$del = mysqli_query($conn, "DELETE FROM image_upload WHERE img_fk = '$pid'");
if ($del) {
	$pdel = mysqli_query($conn, "DELETE FROM admin_post WHERE post_id ='$pid' AND f_k = '$id'");
	if ($pdel) {
		header("Location: ../post.php");
		exit();
	}
}
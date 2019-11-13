<?php
include '../../inc/conn_db.php';
$pid = $_REQUEST['id'];

$del = mysqli_query($conn, "DELETE FROM comments WHERE post_id = '$pid'");
if ($del) {
	header("Location: ../comments.php");
	exit();
}
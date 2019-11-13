<?php
	session_start();
	include 'conn_db.php';
	$p_k = $_SESSION['usrID'];
if (isset($_POST['editID'])) {
	$id = $_POST['editID'];
	$a = array();
	$b = array();

	$ed = mysqli_query($conn,"SELECT * FROM education WHERE id = '$id' AND f_k = '$p_k'");
	$row = mysqli_fetch_assoc($ed);
	$a['d'] = $row;
	$a['f'] = explode('-', $row['batch']);
	echo json_encode($a);

	
}
?>
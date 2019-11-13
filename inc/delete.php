<?php
	session_start();
	include 'conn_db.php';
	if (isset($_POST['edID'])) {
		$edID = $_POST['edID'];
		$sID = $_SESSION['usrID'];
		$del = mysqli_query($conn,"DELETE FROM education WHERE id = '$edID' AND f_k = '$sID'");
		if ($del) {
			echo "Deletion Successful";
		}else{
			echo "Failure operation";
		}
	}
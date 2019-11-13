<?php
include '../inc/conn_db.php';
	session_start();
		$s_id = $_SESSION['usrID'];

		 $q = mysqli_query($conn, "UPDATE users SET Employed = 0,Unemployed = 1 WHERE id = '$s_id'");
		if ($q) {
			$rem = mysqli_query($conn, "DELETE FROM `add_emp` WHERE f_k = '$s_id'");
			if ($rem) {
				echo "success";
			}
		}
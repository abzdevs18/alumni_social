<?php
// 	$con = new mysqli("localhost","id8505683_softdevsdeps","jN5mjkMhaWM^zHaPQJCf","id8505683_softdevs");
// 	$_SERVER['REQUEST_METHOD'] = "POST";
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	$email = $_POST['email'];
	$pass = $_POST['password'];
// 	$email = "abz.devs@gmail.com";
// 	$pass = "AbuevZ091095?";

	include 'db.php';

	$q = "SELECT * FROM `users` WHERE email = '$email'";
	$res = mysqli_query($data,$q);

	$result = array();
	$result['login'] = array();

	// $result = mysqli_num_rows($res);
	if (mysqli_num_rows($res) === 1) {
		$rows = mysqli_fetch_assoc($res);
		if($rows['password'] == $pass) {
			$index['firstname'] = $rows['Firstname'];
			$index['email'] = $rows['Email'];

			array_push($result['login'], $index);
			$result['success'] = "1";
			$result['Message'] = "success";
			header('Content-Type: application/json');
			echo json_encode($result);

			mysqli_close($data);
		}else{
			$result['success'] = "0";
			$result['Message'] = "Error";
			header('Content-Type: application/json');
			echo json_encode($result);

			mysqli_close($data);
		}
	}
}
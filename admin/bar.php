<?php
	include '../inc/conn_db.php';

	$d ="SELECT COUNT(Employment_Status) AS employeed, SUM(Employment_Status), yearGraduate FROM users WHERE Employment_Status = 1 GROUP BY yearGraduate";
	$query = mysqli_query($conn,$d);
	$gre=array();
	while ($r = mysqli_fetch_assoc($query)) {	
		$yr = $r['yearGraduate'];
		$sub= "SELECT COUNT(Employment_Status) FROM users  WHERE yearGraduate = '$yr' GROUP BY yearGraduate";
		$subq = mysqli_query($conn,$sub);
		$ses = mysqli_fetch_assoc($subq);


		// Getting data from DB and storing it as JSON
		$gre[] = $r;
		$gre['pop'] = $ses;

	}

	// echo mysqli_error($conn);
	$js = json_encode($gre);
	echo $js;
<?php

	include '../inc/conn_db.php';
/*	$bar = mysqli_query($conn, "SELECT yearGraduate FROM users GROUP BY yearGraduate");
	$data = '';*/
/*	
	while($numl = mysqli_fetch_assoc($bar)){
		$yr = $numl['yearGraduate'];
		$em = mysqli_query($conn, "SELECT Employed FROM users WHERE Employed = 1 AND yearGraduate = '$yr'");
		$num_em = mysqli_num_rows($em);

		$u_em = mysqli_query($conn, "SELECT Unemployed FROM users WHERE Unemployed = 1 AND yearGraduate = '$yr'");
		$num_um = mysqli_num_rows($u_em);
		$data .= "{y: '". $numl['yearGraduate']."', Employed: ". $numl['em'] .", Unemployed: ".$numl['uem']."}";
		$data .= "{y: '". $numl['yearGraduate']."', Employed: ". $num_em .", Unemployed: ".$num_um."},";

	}*/

	// $jsn = explode('`', $data);
	// $rt = json_encode($jsn);
/*	$rt = trim($data,'"');
	echo substr($rt, 0,-20);*/
  $l = mysqli_query($conn,"SELECT post_like, month FROM reactions GROUP BY month");
  $like = '';

  while($re = mysqli_fetch_assoc($l)){
  	$mn = $re['month'];
  	$m = mysqli_query($conn,"SELECT SUM(post_like) AS likes, month FROM reactions WHERE month = '$mn'");
  	$ml = mysqli_fetch_assoc($m);
  	$like .= "{ month: '". $ml['month']."', Likes: ". $ml['likes']." },";
    // $kl = $re['num'];
  }
  // echo $r . "<br />";
  $lik = trim($like,'"');
  echo $lik;
  
  $bar = mysqli_query($conn, "SELECT yearGraduate FROM users GROUP BY yearGraduate");
  $data = '';
  
  while($numl = mysqli_fetch_assoc($bar)){
    $yr = $numl['yearGraduate'];
    $em = mysqli_query($conn, "SELECT Employed FROM users WHERE Employed = 1 AND yearGraduate = '$yr'");
    $num_em = mysqli_num_rows($em);

    $u_em = mysqli_query($conn, "SELECT Unemployed FROM users WHERE Unemployed = 1 AND yearGraduate = '$yr'");
    $num_um = mysqli_num_rows($u_em);
    // $data .= "{y: '". $numl['yearGraduate']."', Employed: ". $numl['em'] .", Unemployed: ".$numl['uem']."}";
    $data .= "{ y: '". $numl['yearGraduate']."', Employed: ". $num_em .", Unemployed: ".$num_um." },";
  }

  $ty = trim($data,'"');
  // echo $ty;
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div style="width: 30px;">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    
  </div>
</body>
</html>
  <script src="Assets/script/morris/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $(window).scroll(function(){
        if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
          console.log("this is TOp");
        }
      });
    });
  </script>
	
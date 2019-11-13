<?php
	include '../../inc/conn_db.php';
	session_start();

	// $imageSrc = $_POST['img'];
	$usr_id = $_SESSION['id'];

	$target = "../uploads/photo/profiles/".basename($_FILES['adminP']['name']);
	$image = $_FILES['adminP']['name'];

	$post_timestamp = $_SERVER['REQUEST_TIME'];
if (move_uploaded_file($_FILES["adminP"]["tmp_name"], $target)) {

		$i_m = "SELECT * FROM `admin_profile_photo` WHERE f_k = '$usr_id' AND prof_status = '1'";
		$i_m_query = mysqli_query($conn, $i_m);
		$result = mysqli_num_rows($i_m_query);
		if ($result < 1) {
			$queryImage = "INSERT INTO `admin_profile_photo`(`f_k`, `prof_status`, `image_path`) VALUES ('$usr_id', 1,'$image')";
			$queryUpdate = mysqli_query($conn,$queryImage);
			if ($queryUpdate) {
				header("Location: ../home.php");
				exit();
			}else {
				echo mysqli_error($conn);
			}
		}else {
			if ($rows = mysqli_fetch_assoc($i_m_query)) {
				$img_path = $rows['image_path'];
				// Don't remove the photo from the DB. just update the value of profile_photo into 0
				$u_p = "UPDATE admin_profile_photo SET prof_status = 0 WHERE image_path = '$img_path'";
				$u_p_query = mysqli_query($conn, $u_p);
				if ($u_p_query) {
					// Serve us the update command for the profile_photo
					$queryImage = "INSERT INTO `admin_profile_photo`(`f_k`, `prof_status`, `image_path`) VALUES ('$usr_id', 1,'$image')";
					$queryUpdate = mysqli_query($conn,$queryImage);
					if ($queryUpdate) {
						header("Location: ../home.php");
						exit();
					}else {
						echo mysqli_error($conn);
					}
				}else {
					echo "$image_path <br> $image <br>".mysqli_error($conn);
				}
			}
		}
/*		if ($i_m_query) {
			$red = mysqli_fetch_assoc($i_m_query);
			$r = $red['f_k'];
			if ($usr_id == $r ) {
				echo "true";
			}else{
				echo $usr_id ;
				echo "<br />";
				echo $r . "from res";
				echo "False";
			}
		}*/
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
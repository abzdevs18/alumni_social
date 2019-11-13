<?php
	include 'conn_db.php';
	include 'functions/function.php';
	session_start();
	if(isset($_POST['jobTitle'])){
		$s_id = $_SESSION['usrID'];
		$jobTitle = $_POST['jobTitle'];
		$company = $_POST['company'];
		$job_relation = $_POST['job_relation'];
		$location = $_POST['location'];
		$batch = $_POST['batch'];
		$h = '';
		 $q = mysqli_query($conn, "INSERT INTO `add_emp`(`f_k`, `jobTitle`, `job_related_field`, `company`, `location`, `batch`) VALUES ('$s_id','$jobTitle','$job_relation','$company','$location','$batch')");
		if ($q) {
		 	mysqli_query($conn, "UPDATE users SET Employed = 1,Unemployed = 0 WHERE id = '$s_id'");
			$s_ed = mysqli_query($conn,"SELECT * FROM add_emp WHERE f_k = '$s_id' AND jobTitle != '$h'");
			while($r_ed = mysqli_fetch_assoc($s_ed)){?>

		<div style="width: calc( 100% - 80px );margin:10px auto;height: 100px;background-color: #333;border-radius:5px;padding:5px;" >
			<div class="wraper-ed">
				<div class="w-ed" style="background:url('image/building.svg');background-repeat: no-repeat;background-position: center;background-size: contain;">
					
				</div>
				<div style="color: #333;margin-top: 15px;">
					<h3><?php echo $r_ed['jobTitle'];?></h3>
					<p><?php echo $r_ed['company'];?></p>
					<small><?php echo $r_ed['batch'];?></small>
				</div>
			</div>
		</div>


<?php
			}
			
		}else{
			echo mysqli_error($conn);
		}
	}
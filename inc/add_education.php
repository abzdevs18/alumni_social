<?php
	include 'conn_db.php';
	include 'functions/function.php';
	session_start();
	if(isset($_POST['school'])){
		$s_id = $_SESSION['usrID'];
		$sch = $_POST['school'];
		$deg = $_POST['degree'];
		$batch = $_POST['batch'];
		$h = '';
		 $q = mysqli_query($conn, "INSERT INTO `education`(`f_k`, `school_name`, `degree`, `batch`) VALUES ('$s_id','$sch','$deg','$batch')");
		if ($q) {

			$s_ed = mysqli_query($conn,"SELECT * FROM education WHERE f_k = '$s_id' AND school_name != '$h'");
			while($r_ed = mysqli_fetch_assoc($s_ed)){?>

						<div style="width: calc( ( 100% / 2 ) - 4px );margin:10px 0px 0px;background-color: #333;border-radius:5px;display: inline-block;" >
							<div class="wraper-ed" style="border-radius: 3px;border:1px solid #444;padding: 5px 0px;">
								<div class="w-ed" style="background:url('image/university.svg');background-repeat: no-repeat;background-position: center;background-size: contain;width: 60px;">					
								</div>
								<div style="color: #333;">
									<h3 style="color: #555;font-size: 15px;"><?php echo $r_ed['school_name'];?></h3>
									<p style="font-size: 13px;"><?php echo $r_ed['degree'];?></p>
									<small style="font-size: 13px;"><?php echo $r_ed['batch'];?></small>
								</div>
							</div>
						</div>


<?php
			}
			
		}else{
			echo mysqli_error($conn);
		}
	}
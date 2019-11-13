<div class="overview">
	<header style="z-index: 0;">
		<h3 style="float: left;">Education</h3>
		<button class="popclick u_upload" id="overviewSchool" style="float: right;margin-top: -4px;"><i class="fas fa-plus"></i> School</button>
	</header>
	<section id="container-of-newschool" style="width: calc( 100% - 80px);margin: 0 auto;">
<?php
		session_start();
		$s_id = $_SESSION['usrID'];
			$s_ed = mysqli_query($conn,"SELECT * FROM education WHERE f_k = '$s_id' AND school_name != ''");
			while($r_ed = mysqli_fetch_assoc($s_ed)){?>
						<div style="width: calc( ( 100% / 2 ) - 4px );margin:10px 0px 0px;background-color: #333;border-radius:5px;display: inline-block;position: relative;" >
							<div class="wraper-ed" style="border-radius: 3px;border:1px solid #444;padding: 5px 0px;position: relative;">
								<!-- Script located in footer file --><!--  onclick="drp(<?php echo $r_ed['id']; ?>)" -->
								<!-- <i class="fas fa-pencil-alt edUpdate" style="color: #333;font-size: 13px;position: absolute;right: 5px;cursor: pointer;"></i> -->
								
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
/*	}
}*/

	?>

	</section>
</div>

<!-- Modal Use is in Header.php -->
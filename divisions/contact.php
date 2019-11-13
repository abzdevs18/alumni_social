<?php
include 'inc/conn_db.php';
	session_start();
	$s_id = $_SESSION['usrID'];

	$about_q = mysqli_query($conn,"SELECT * FROM about WHERE f_k = '$s_id'");
	$about = mysqli_fetch_assoc($about_q);
?>
<div class="overview" style="margin-top: 60px;">
	<header style="z-index: 0;">
		<h3 style="float: left;">Contact Details</h3>
		<button class="popclick u_upload adInfor" style="margin-left: 520px;margin-top: -7px;"><i class="fas fa-plus"></i> Add items</button>
	</header>
	<section>
		<div style="width: calc( 100% - 80px );margin:10px auto;height: 100px;" >
			<div class="wraper-ed">
			<div id="container-of-newschool" style="width: calc( 100% - 80px);"	>
				<div style="width: calc( ( 100% / 2 ) - 4px );margin:10px 0px 0px;background-color: #333;border-radius:5px;display: inline-block;" >
					<div class="wraper-ed" style="border-radius: 3px;padding: 5px 0px;">
						<div style="color: #333;">
							<small style="font-size: 13px;">
								Address: <?php echo $about['address'];?></small><br />
							<small style="font-size: 13px;">
								Phone: <?php echo $about['phone'];?></small><br />
							<small style="font-size: 13px;">
								Email: <?php echo $about['email'];?></small><br />
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal Use is in Header.php -->
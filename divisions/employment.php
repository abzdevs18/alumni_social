<?php
include 'inc/conn_db.php';
	session_start();
	$s_id = $_SESSION['usrID'];
	$sch = $_POST['jobTitle'];
	$deg = $_POST['company'];
	$act = $_POST['location'];
	$batch = $_POST['batch'];

	$radio = mysqli_query($conn,"SELECT Employed FROM users WHERE id = '$s_id'");
	$stat = mysqli_fetch_assoc($radio);

	/*JOb*/

	$job = mysqli_query($conn,"SELECT * FROM add_emp WHERE f_k = '$s_id'");
	$title = mysqli_fetch_assoc($job);	
?>

<div class="overview" style="margin-top: 60px;">
	<header style="z-index: 0;">
		<h3 style="float: left;">Employment</h3>
	</header>
	<section>
		<div style="width: calc( 100% - 80px );margin:10px auto;max-height: 100px;" >
			<div class="wraper-ed" style="color: #666;display: flex;flex-direction: column;">
				<div>
					<p>Are you employed?</p>
				</div>
				<div style="display: flex;flex-direction: column;">
					<div style="padding: 3px 0px;">
						<input type="radio" name="emStatus" id="employed" style="margin:5px;" <?php if ($stat['Employed'] == '1') { echo "checked"; }?> >Yes 
					</div>
					<div style="padding: 3px 0px;">
						<input type="radio" name="emStatus" id="unemployed" style="margin:5px;" <?php if ($stat['Employed'] == '0') { echo "checked"; }?>>No 
					</div>
				</div>
			</div>
			<div class="hj">
			<?php if ($stat['Employed'] == '1') {?>
			<div id="container-of-newschool" style="width: calc( 100% - 80px);"	>
				<div style="width: calc( ( 100% / 2 ) - 4px );margin:10px 0px 0px;background-color: #333;border-radius:5px;display: inline-block;" >
					<div class="wraper-ed" style="border-radius: 3px;border:1px solid #444;padding: 5px 0px;">
						<div class="w-ed" style="background:url('image/building.svg');background-repeat: no-repeat;background-position: center;background-size: contain;width: 60px;">					
						</div>
						<div style="color: #333;">
							<h2 style="font-size: 16px;">Work's at: </h2>
							<small style="color: #555;font-size: 15px;font-weight: bolder;"><?php echo $title['company'];?></small>
							<p style="font-size: 13px;"><?php echo $title['jobTitle'];?></p>
							<small style="font-size: 13px;"><?php echo $title['location'];?></small>
							<small style="font-size: 13px;"><?php echo $title['batch'];?></small>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

	</section>
</div>

<!-- FUnction Use are in Header.php -->
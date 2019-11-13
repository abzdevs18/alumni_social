<?php
	include 'home.php';
	include 'inc/conn_db.php';
	if ($_SESSION['usrName']) {
	$year = $_SESSION['grad'];
	$currentUser = $_SESSION['usrID']; //So that the current user will not be included in list
	$friends = mysqli_query($conn,"SELECT * FROM users WHERE id != '$currentUser' AND yearGraduate = '$year'");?>

	<div class="friends_container" style="margin-top: 20px;">
		<div class="f_header_wrap">

			<span><i class="fas fa-user-friends" style="padding-right: 10px;"></i>Alumni</span>
			<div class="filtering-alumni-year">
				<span>Filter: </span>
				<select class="alumni-year" id="batch">
					<option value="2030">2030</option>
					<option value="2029">2029</option>
					<option value="2028">2028</option>
					<option value="2027">2027</option>
					<option value="2026">2026</option>
					<option value="2025">2025</option>
					<option value="2024">2024</option>
					<option value="2023">2023</option>
					<option value="2022">2022</option>
					<option value="2021">2021</option>
					<option value="2020">2020</option>
					<option value="2019" selected>2019</option>
				</select>
			</div>
		</div>
		<div style="margin-bottom: 65px;" id="disp">
		<?php 
		while ($rows = mysqli_fetch_assoc($friends)) {
			$id = $rows['id'];?>
			<div class="f_prof">
				<div class="f_prof_img">
					<?php
						$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
						$q_img = mysqli_query($conn,$img);
						$row = mysqli_fetch_assoc($q_img);
						if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>">
						<?php 
							} else {?>
							<img src="image/default/user_default.png">
						<?php
							}
					?>
				</div>
				<div class="f_prof_name" style="display: flex;flex-direction: column;color: #222; padding: 35px 20px;">
					<span style="display: block;position: absolute;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><?php echo $rows['userName']; ?></span>
				</div>
				<div style="padding: 35px 20px;right: 0;">
					<!-- <button style="width: 100px;height: 25px;">Friends</button> -->
					<a href="message.php?user=<?php echo $id; ?>"><button style="width: 130px;height: 25px;position: relative;margin-right: -10px;right: -110px;">Message</button></a>
				</div>
			</div>
		 <?php
		}
		?>
		</div>
	</div>	
	<?php
		}else {
			header("Location: index.php");
			exit();
		}
	?>

</main>
<?php 
include 'footer.php';
?>
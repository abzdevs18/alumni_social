<?php
 include 'home.php';
 if ($_SESSION['usrName']) {
 ?>
	<div class="friends_container">
		<div class="f_header_wrap">
			<span><i class="far fa-images" style="padding-right: 10px;"></i>Admin Photos</span>
		</div>
		<div>
			<div class="i_prof_save" style="width: 100%;position: absolute;margin-bottom: 30px;">
				<div style="background: linear-gradient(transparent 0%, black 100%);">
				</div>
				<?php
	 				include 'inc/conn_db.php';
					// $id = $_SESSION['usrID'];
					$img = "SELECT * FROM admin_post,image_upload WHERE post_id = img_fk ORDER BY timestamp DESC";
					$img_query = mysqli_query($conn,$img);
					while($row = mysqli_fetch_assoc($img_query)){?>
						<div class="w-p" style="background:url('<?php echo 'admin/uploads/photo/'. $row['img_path'];?>');background-position: center;background-size: cover;float: right;">
							<div id="photo-details">
								<span style="font-size: 15px;"><?php echo $row['img_path'];?></span>
							</div>
							
						</div>

					<?php
					}
				?>
			</div>
		</div>
	</div>
</main>
<?php
	}else {
		header("Location: index.php");
		exit();
	}
?>
<?php 

include 'footer.php';
	?>

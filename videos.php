<?php
 include 'home.php';
 ?>
	<div class="friends_container">
		<div class="f_header_wrap">
			<span><i class="far fa-file-video" style="padding-right: 10px;"></i>Videos</span>
		</div>
		<div style="margin-bottom: 15px;">
			<div class="i_prof_save" style="margin-top: 10px;margin-bottom: 30px;position: absolute;">
				<?php
					$v = mysqli_query($conn,"SELECT * FROM `video_upload`");
					while ($ro = mysqli_fetch_assoc($v)) {
						$f_k = $ro['video_fk'];
						?>
				<div class="v_list" style="padding: 3px;border: 1px solid #999;width: calc((100% / 4) - 7px);overflow: hidden;bottom: 10px !important;margin-bottom: 30px;position: relative;float: right;margin: 3px;">
					<!-- <i class="far fa-times-circle" id="v_del" title="delete video"></i> -->
					
						<div style="">
							<video width="100%" height="100%" controls>
								<source src="<?php echo "admin/uploads/video/".$ro['video_path'];?>" type="video/mp4">
							</video>
						</div>
					<div style="color: #222;text-align: center;display: flex;flex-direction: column;padding: 10px 0;">
						<?php
							$d=mysqli_query($conn,"SELECT `post_content`,`post_Date` FROM `admin_post` WHERE post_id = '$f_k'");
							$dq = mysqli_fetch_assoc($d);
						?>
						<b><?php echo $dq['post_content']; ?></b>
						<span style="font-size: 13px;font-style: italic;"><?php echo $dq['post_Date']; ?></span>
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
include 'footer.php';
?>
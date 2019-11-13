<div class="post_wrap" style="/*position: sticky;*/top: 65px;z-index: 2;margin-top: -15px;">
	<div class="p_container">
		<form method="POST" action="inc/post.php" id="post_submit">
			<div class="p_profile_wrapper">
				<div style="display: flex;">
					
				<div class="p_profile">
					<div class="p_prof_icon">
							<!-- Photo in header navigation profile Image -->
								<?php
								$id = $_SESSION['usrID'];
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
							<!-- End of the photo -->
					</div>
					<div class="p_prof_loc">
						<span style="font-size: 16px;"><?php echo $_SESSION['usrName'];?></span><br>
						<span><i style="font-size: 13px;">Philippines</i></span>
					</div>
				</div>
				<div class="audience_wrapper">
					<select class="select_audience" style="background: #f3f3f3 !important;" name="audience" id="audience">
						<option value="0">Private</option>
						<option value="1">Public</option>
					</select>
				</div>
				</div>
				<div class="p_details">
					<!-- <p id="postContent" contenteditable="true" placeholder="Let us know your emotion <?php echo $_SESSION['usrName'];?>"></p> -->
					<input type="text" name="p_details" placeholder="Let us know your emotion <?php echo $_SESSION['usrName'];?>" maxlength="50">
				<input type="hidden" name="post_timeStamp">
				</div>
				<hr style="width: 98%;margin: 0 auto;">
				<div class="submitPost">
					<div class="s_btn_post">
						<input type="submit" name="submit" value="Post">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
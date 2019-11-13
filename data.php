<?php
	include 'inc/conn_db.php';
	session_start();

if (isset($_POST['limit'])) {
	$limit = $_POST['limit'];
	$offset = $_POST['offset'];

	$usr_id = $_SESSION['usrID'];
	$p_list = mysqli_query($conn,"SELECT * FROM admin_post ORDER BY timestamp DESC LIMIT {$limit} OFFSET {$offset}");
	while ($rows = mysqli_fetch_assoc($p_list)) {
			$post_id = $rows['post_id'];
			$f_k = $rows['f_k'];

			$w = "SELECT COUNT(`post_like`) AS liked, `user_id` FROM reactions WHERE post_id = '$post_id'";
			$number = mysqli_query($conn, $w);
			$k=mysqli_fetch_assoc($number);
			?>
				<div class="post_wrap">
					<div class="p_owner" style="display: flex;flex-direction: row;">
						<div class="prof_image">
						 	<?php
							// $id = $_SESSION['id'];
							$img = "SELECT * FROM `admin_profile_photo` WHERE f_k = '$f_k' AND prof_status = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
								<img src="<?php echo "admin/uploads/photo/profiles/".$row['image_path']; ?>" name="profile_img" id="profileImageContainer" alt="Profile Image">
							<?php 
							} else {?>
								<img src="../image/default/user_default.png" name="profile_img" id="profileImageContainer" alt="Profile Image">
							<?php
							}
							?> 
							<!-- <img src="image/default/user_default.png"> -->
						</div>
						<div style="display: flex;flex-direction: column;color: #222;margin: 20px 0;">
							<!-- show user in here. -->
							<!-- <?php showUser($conn,$usr_id); ?> -->
							 <span id="p_author_prof" style="font-size: 13px;font-weight: bold;">Admin</span>
							<!-- End of showing users -->
							<span style="font-size: 12px;font-style: italic;"><?php echo $rows['post_Date']; ?></span>
						</div>
						<div style="float: right;position: absolute;display: inline;right: 0;margin: 10px;">
							<span style="font-size: 20px; color: #222;font-weight: bold;"><b>&#8230;</b></span>
						</div>
					</div>
					<!-- 
					This is the part of the timeline where we 
					display the content and some logics-->
					<div class="p_content" style="font-size: 13px;">
						<?php
							if ($rows['post_content'] != '') {?>
								<p style="padding: 10px 0;color: #444;font-size: 14px;font-weight: 500;"><?php echo $rows['post_content'];?></p>
						<?php	
							}						
							$v = mysqli_query($conn,"SELECT * FROM `video_upload` WHERE video_fk = '$post_id'");
							$res = mysqli_num_rows($v);
							if ($res) {
								$vid = mysqli_fetch_assoc($v);?>
								<div class="post_img">
									<video width="100%" controls>
										<source src="<?php echo "admin/uploads/video/".$vid['video_path'];?>" id="v-upload" type="video/mp4">
		   										Your browser does not support HTML5 video.
									</video>
								</div>
						<?php
							}else{
								$p = mysqli_query($conn,"SELECT * FROM `image_upload` WHERE img_fk = '$post_id'");
								$pic = mysqli_fetch_assoc($p);
								$rows = mysqli_num_rows($p);
								if ($rows) {?>
									<div class="post_img">
										<img src="<?php echo "admin/uploads/photo/".$pic['img_path']; ?>">
									</div>
						<?php	}
							}
						?>
					<div style="padding-top: 2px;padding-bottom: 5px;">
						<span style="font-size: 10px !important;"><span id="nl"><?php echo $k['liked']; ?></span> <em>Likes</em></span>
					</div>
					</div>
					<hr style="width: 90%;margin:0 auto;border: none;border-top: 1px solid #222;">
					<div class="p_reactions">
						<div style="padding: 10px;margin-left: 5%;width: 100%;">
							<div style="width: 80%;">
								<!-- click event to like post -->
								<!-- <input type="text" value="<?php echo $post_id; ?>" id="likethepost"> -->
								<!-- Reaction to the POST, script start from here -->
									<i class="far fa-heart" id="r_icons" title="Likes" style="margin:7px 0px;
									<?php 
										$jh = $k['user_id'];  
										if ( $jh == $usr_id ) {
											echo "color:darkred";
										}
									?>" onclick="reaction(<?php echo $post_id; ?>)"></i> 
									<!--  onclick="reaction(<?php echo $post_id; ?>)" -->
									<span style="color: #555;position: absolute;margin:9px 5px;">Like</span>
								<!-- </a> -->
							</div>
						</div>
						<div class="r_c_s" title="Comments" onclick="showComment(<?php echo $post_id; ?>)">
							<i class="far fa-comments" id="r_c_s"></i>
							<span>Comment</span>
						</div>
					</div>
					<hr style="width: 90%;margin:0 auto;border: none;border-top: 1px solid #222;">
					<div class="wrap_comment" id="<?php echo $post_id;?>" style="display: block;">
						<!-- use the previous query ($p_list) to save load time -->

						<?php show_comments($conn,$post_id) ?>

						<!-- Deafault Comment field -->

					</div>
					<form class="f_r_comment" method="POST" action="inc/comment.php">
						<div class="h_prof_icon_img" style="margin: 5px 0px;">

							<?php
							include 'inc/conn_db.php';
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
						</div>
						<div class="r_comment_">
							<input type="text" name="comment" placeholder="Comment on this post...<?php echo $post_id; ?>" style="border-radius: 30px !important;padding: 5px 12px;margin-top: 5px;">
							<input type="hidden" name="postID" value="<?php echo $post_id;?>">
							<input type="hidden" name="parent_comment_id" value="0">
						</div>
						<input type="submit" name="submit" style="display: none;">
					</form>
				</div>
		<?php
	}
}
/*
*
* The show_comments() will only show the root comment
*	Use in line 91
*/

function show_comments($conn,$post_id){

	$comment_list = mysqli_query($conn,"SELECT * FROM comments WHERE post_id = $post_id AND parent_comment_id = 0 ORDER BY comment_timestamp DESC");

	while ($rows = mysqli_fetch_assoc($comment_list)) {
		$comment_id = $rows['comment_id'];	
		$usr_id = $rows['user_id'];
		$id = $_SESSION['usrID'];
		$parent_comment = $rows['parent_comment_id'];?>

 		<div class="previous_r_comment" style="padding-bottom: 0px;">
			<div class="h_prof_icon_img" style="margin: 0px 4px 5px 0px">

							<?php
							// include 'inc/conn_db.php';
							// $id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$usr_id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/". $row['img_path']; ?>">
							<?php 
								} else {?>
							<img src="image/default/user_default.png">
							<?php
								}
							
							?>
			</div>
			<div class="previous_r_comment_details" style="width: 100%;padding: 5px 0px;">
				<div class="comment_style_prof_com">
					<?php
					$img = "SELECT userName FROM users WHERE id = '$usr_id'";
					$q_img = mysqli_query($conn,$img);
					$rw = mysqli_fetch_assoc($q_img);?>
					<b style="padding-right: 5px;"><?php echo $rw['userName'];?></b>
					<p style="font-size: 15px;"><?php echo $rows['comment_content']; ?></p>
				</div>
				<!-- <hr style="margin-top: 5px;"> -->
<!-- 				<div style="width: 100%;display: flex;flex-direction: row;padding: 5px 0px;padding: 5px 0px 0px;" class="c_r_reactions">
					<span title="parent_comment_id"><?php echo $rows['parent_comment_id'];?></span>
					<span class="l_d" title="comment_id"><?php echo $comment_id;?></span>
					<span style="margin-left: 10px;" id="comment_span" onclick="showComment(<?php echo $comment_id;?>);">Reply</span>
					 <span style="margin-left: 10px;display: none;" id="del">Delete</span> 
				</div> -->
			</div>	
		</div>
		<!-- Put here the form for Replying the comment. -->
		<div id="<?php echo $comment_id;?>" style="display: none;">
		<?php reply_comments($conn,$comment_id,$id)?> 
			
		<form class="f_r_comment" method="POST" action="inc/comment.php">
			<div class="h_prof_icon_img" style="margin: 5px 0px 5px 40px;">

							<?php
							include 'inc/conn_db.php';
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
			<div class="r_comment_">
				<input type="text" name="comment" placeholder="Reply on this comment...<?php echo $comment_id;?>" style="border-radius: 30px !important;padding: 5px 12px;margin-top: 5px;">
				<input type="hidden" name="postID" value="<?php echo $post_id;?>">
				<input type="hidden" name="parent_comment_id" value="<?php echo $comment_id;?>">
			</div>
			<input type="submit" name="submit" style="display: none;">
		</form>
		</div>

<?php 	
	}
}?>

<?php
/*
*
* The reply_comments() will only show the reply of the root comments. Add the function to show_comments() to show both comment and reply
* use in line 180
*/
function reply_comments($conn,$comment_id, $paddingLeft=0){
	
	$comment_list = mysqli_query($conn,"SELECT * FROM comments WHERE parent_comment_id = $comment_id ORDER BY comment_timestamp DESC");

	while ($rows = mysqli_fetch_assoc($comment_list)) {
		$reply_parent_comment = $rows['parent_comment_id'];
		$comment_id = $rows['comment_id'];
		$usr_id = $rows['user_id'];
	if ($reply_parent_comment == 0) {
		$paddingLeft = 0;
	}else {
		$paddingLeft = 35;
	}
		?>

	  	<div class="previous_r_comment" style="padding-left: <?php echo $paddingLeft.'px;';?>" >
			<div class="h_prof_icon_img" style="margin: 0px 4px 0px 0px;border-left: 2px solid red;padding-left: 5px;">
				<!-- <img src="image/prof.jpg"> -->
				<?php
				include 'inc/conn_db.php';
				// $id = $_SESSION['usrID'];
				$img = "SELECT * FROM user_user_photo WHERE user_id = '$usr_id' AND profile_photo = 1";
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
			<div class="previous_r_comment_details" style="width: 100%;padding: 5px 0px;">
				<div class="comment_style_prof_com">
					<?php
					$img = "SELECT userName FROM users WHERE id = '$usr_id'";
					$q_img = mysqli_query($conn,$img);
					$rw = mysqli_fetch_assoc($q_img);?>
					<b style="padding-right: 5px;"><?php echo $rw['userName'];?></b>
					<p style="font-size: 15px;"><?php echo $rows['comment_content']; ?></p>
				</div>
				<div style="width: 100%;display: flex;flex-direction: row;padding: 5px 0px;" class="c_r_reactions">
					<span><?php echo $comment_id;?></span>
					<!-- <span style="margin-left: 10px;" id="comment_span" onclick="showReply(<?php echo $reply_parent_comment;?>);">Reply</span> -->
				</div>
			</div>	
		</div>
<?php
	}
}
?>
<?php 
// We create this function to query the users table to show the name of the user who post in the website
// Use in line 42
 function showUser($conn,$usr_id){
 	$name = mysqli_query($conn,"SELECT name FROM admin_user WHERE id = $usr_id");
 	$row = mysqli_fetch_assoc($name);?>
	<span id="p_author_prof" style="font-size: 13px;font-weight: bold;"><?php echo $row['name'];?></span>
 <?php
}

?>
<!-- 
show or hide the comments of certain post.
The parameters will serve to which form should show -->
<script>
	function showReply(comID){
		var reply_form = document.getElementById(comID);

		if(reply_form.style.display == 'none'){
			reply_form.style.display = 'flex';
		}else {
			reply_form.style.display = 'none';
		}
	}
	// Use in onClick event in line 76
	function showComment(postID){
		var reply_form = document.getElementById(postID);

		if(reply_form.style.display == 'none'){
			reply_form.style.display = 'block';
		}else {
			reply_form.style.display = 'none';
		}
		console.log(reply_form);
	}
</script>
<script src="script/reactions.js"></script>
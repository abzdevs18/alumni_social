<?php
	if ($_SESSION['usrName']) {
		// include 'data.php';
	/*}*/ /*End of POST*/
}else {
	header("Location: index.php");
	exit();
}
?>

<?php
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
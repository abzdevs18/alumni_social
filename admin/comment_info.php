<?php
include '../inc/conn_db.php';
if ( isset($_POST['id']) ) {
	$id = $_POST['id'];

	$c =  mysqli_query($conn, "SELECT * FROM comments WHERE post_id = '$id'");
	$fc = mysqli_fetch_assoc($c);
	$fc_id = $fc['post_id'];
	$im = mysqli_query($conn, "SELECT * FROM image_upload WHERE img_fk = '$fc_id'");
	$im_fetch = mysqli_fetch_assoc($im);
?>

					<div class="pro-wrp">
						<div style="height: 200px;background-image:linear-gradient(to top, rgba(51,51,51,0.3), rgba(51,51,51,0)),url('<?php echo "uploads/photo/" . $im_fetch['img_path']; ?>');background-size: cover;background-repeat: no-repeat;">
							
						</div>
						<div>
							<p style="padding: 14px;text-align: justify;color: #555;"><?php echo $fc['comment_content']; ?></p>
						</div>
						<div>
							<input type="hidden" id="jkl" value="<?php echo $id; ?>">
							<a href="actions/com_del.php?id=<?php echo $id; ?>"><button class="reMvPrev" style="margin: 11px;width: 130px;">Remove Comment</button></a>
						</div>
					</div>
<?php

	}

	?>
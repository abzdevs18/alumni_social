<?php
include('header.php');
// require_once 'header.php';
// include '../inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Your Post</span>
			</div>
			<div>
				<div class="table-alums cont">
					<?php 
						$q = mysqli_query($conn, "SELECT * FROM admin_post ORDER BY timestamp DESC");
						while($row = mysqli_fetch_assoc($q)){
							$fk = $row['post_id'];

					?>
					<div class="p-admin">
						<?php
							$p_q = mysqli_query($conn, "SELECT `img_fk`, `img_path` FROM image_upload WHERE img_fk = '$fk' ");
							$r = mysqli_fetch_assoc($p_q);
						?>
						<div style="height: 200px;background-image:linear-gradient(to top, rgba(51,51,51,0.3), rgba(51,51,51,0)),url('<?php echo "uploads/photo/" . $r['img_path']; ?>');" id="post-img">
							
						</div>
						<div class="con-">
							<small style="font-size: 11px;font-style: italic;color: #999;"><?php echo $row['post_Date']; ?></small>
							<p><?php echo $row['post_content']; ?></p>
						</div>
						<div id="btn-content-up">
							<a href="inc/delpost.php?id=<?php echo $fk; ?>"><button style="background-color: #872222;">Remove</button></a>
							<!-- <button onclick="showProf(<?php echo $fk; ?>)">Edit</button> -->
						</div>
					</div>
					<?php

					}

					?>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
include('footer.php');
?>
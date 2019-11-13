<?php
	include 'home.php';
	?>
	<div class="friends_container" style="margin-top: 20px;margin-bottom: 75px;">
		<div class="f_header_wrap">
			<span><i class="fas fa-user-alt" style="padding-right: 10px;"></i>About Me</span>
		</div>
		<div class="wrapper-details">
			<div class="about-sidebar">
				<div style="background-color: #f3f3f3;position: sticky;top: -10px;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Profile Intro</span>
					</div>	
					<hr> 
					<div class="h_b_f_m">
						<span class="b_f_m">About Me</span>
						<span class="edit-about"><i class="fas fa-pencil-alt editIcon" style="cursor: pointer;"></i></span>
						<?php
							$m = mysqli_query($conn, "SELECT id, intro, experience FROM about WHERE f_k = '$id'");
							$r = mysqli_fetch_assoc($m);
							if ($r['intro']) {?>
								<p contenteditable class="about-content-hover" style="padding: 10px 0 0px;color: #545454;" id="aboutme"><?php echo $r['intro']?></p>
							<?php
							}else {?>
							<p contenteditable class="about-content-hover" style="padding: 10px 0 0px;color: #545454;" id="aboutme">Say something about yourself...</p>

						<?php
							}

						?>
						
						<!-- FUnction use is in the footer.php -->
						<button style="margin-top: 20px;padding: 2px 15px;border: 1px solid #999;border-radius: 15px;background-color: #16c1c2;color: #fff;font-weight: bold;display: none;" id="btn-about-up">Save</button>
					</div>
			<!-- 		<div class="h_b_f_m">
						<span class="b_f_m">Favorite Instructors</span>
						<span class="edit-about"><i class="fas fa-pencil-alt"></i></span>
						<p style="padding: 10px 0 0px;color: #545454;">Who were your fave college instructors back then?</p>
					</div> -->
					<div class="h_b_f_m">
						<span class="b_f_m">Most memorable college experience</span>
						<span class="edit-about"><i class="fas fa-pencil-alt"></i></span>
						<?php
							$m = mysqli_query($conn, "SELECT id, intro, experience FROM about WHERE f_k = '$id'");
							$r = mysqli_fetch_assoc($m);
							if ($r['experience']) {?>
								<p contenteditable style="padding: 10px 0 0px;color: #545454;" id="xperience"><?php echo $r['experience']?></p>
							<?php
							}else {?>
							<p contenteditable class="about-content-hover" style="padding: 10px 0 0px;color: #545454;" id="aboutme">Say something about your Experience...</p>

						<?php
							}

						?>
						<button style="margin-top: 20px;padding: 2px 15px;border: 1px solid #999;border-radius: 15px;background-color: #16c1c2;color: #fff;font-weight: bold;display: none;" id="btn-about-up-2">Save</button>
					</div>
				</div>
				<div>
					<div class="list-items" style="font-weight: bold;font-size: 15px;background-color: #666;border-bottom: 2px solid #333;">
						<p style="color: #f3f3f3;">Overview</p>
					</div>
					<div class="list-items i">
						<p>Education</p>
					</div>
					<div class="list-items i">
						<p>Contact Details</p>
					</div>
					<div class="list-items i">
						<p>Employment Address</p>
					</div>
				</div>
			</div>

			<div class="about-content" style="margin-bottom: 50px;">
				<?php include 'divisions/feature.php'; ?>
				<?php include 'divisions/education.php'; ?>
				<?php include 'divisions/contact.php'; ?>
				<?php include 'divisions/employment.php'; ?>
			</div>

		</div>
	</div>

	<div style="display:none;">
        <div id="ninja-slider">
            <div class="slider-inner" style="margin-top: 70px !important;">
                <ul>
					<?php
					include 'inc/conn_db.php';
					$id = $_SESSION['usrID'];
					$q=mysqli_query($conn,"SELECT * FROM `featured_img` WHERE img_fk = '$id' ORDER BY date_up DESC LIMIT 9");
					$x=0;
					while ($img_r = mysqli_fetch_assoc($q)) {?>
                    <li>
                        <a class="ns-img" href="<?php echo "inc/uploaded/featured_img/".$img_r['img_path']; ?>"></a>
                    </li>
					<?php
						$x++;
						}
						?>
                </ul>
                <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
            </div>
        </div>
    </div>
</main>


				

<?php
	include 'footer.php';
	?>
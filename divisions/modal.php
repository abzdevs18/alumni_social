<?php
	include '../inc/conn_db.php';
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$q_id = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
		$q_d = mysqli_fetch_assoc($q_id);

		$about_q = mysqli_query($conn,"SELECT * FROM about WHERE f_k = '$id'");
		$more = mysqli_fetch_assoc($about_q);

		$job_q = mysqli_query($conn,"SELECT * FROM add_emp WHERE f_k = '$id'");
		$j_more = mysqli_fetch_assoc($job_q);

		?>


			<div class="h-p-wrap">
				<div class="h-left-wrap">					
					<?php
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
								<div class="center-wrap" style="background-image: url('<?php echo "inc/uploaded/".$row['img_path']; ?>');">
							<?php 
								} else {?>
								<div class="center-wrap" style="background-image: url('image/default/user_default.png');">
							<?php
								}
							
							?>
					</div>
				</div>
				<div class="h-right-wrap">
					<div class="d-h">
						<div class="j_w">
							<h2><?php echo $q_d['userName']; ?></h2><br>
							<em><b>Email:</b> <?php echo $more['email']; ?><br>  <b>Year Graduate:</b><?php echo $q_d['yearGraduate']; ?></em>							
						</div>						
						<h4>
							THINGS ABOUT <em><?php echo $q_d['userName']; ?></em>
						</h4>
						<?php
							$s_ed = mysqli_query($conn,"SELECT * FROM education WHERE f_k = '$id'");
							if($r_ed = mysqli_fetch_assoc($s_ed)){?>
								<h4>
									Name of School: <em><?php echo $r_ed['school_name']; ?></em>
								</h4>
								<h4>
									Degree: <em><?php echo $r_ed['degree']; ?></em>
								</h4>
								<h4>
									Batch: <em><?php echo $r_ed['batch']; ?></em>
								</h4>

								<?php if ($q_d['Employed'] == '1') {?>
									<h4>
										Work's at: <em><?php echo $j_more['company']; ?></em>
									</h4>
									<h4>
										Since: <em><?php echo $j_more['batch']; ?></em>
									</h4>
							<?php 
									}
								}
								?>
					</div>
				</div>
			</div>
			<div class="p-featured-images">
				<h4>
					FEATURED IMAGES <small>of <?php echo $q_d['userName']; ?></small>
				</h4>
				<div class="data-content">
					<div class="i_prof_save">
						<div style="background: linear-gradient(transparent 0%, black 100%);">
						</div>
						<div class="gallery">
							<?php
									$q=mysqli_query($conn,"SELECT * FROM `featured_img` WHERE img_fk = '$id' ORDER BY date_up DESC LIMIT 9");
									$x=0;
									while ($img_r = mysqli_fetch_assoc($q)) {?>
										<img src="inc/uploaded/featured_img/<?php echo $img_r['img_path'];?>" onclick="lightbox(<?php echo $x; ?>)">
								<?php
										$x++;
									}
									?>
						</div>
					</div>
				</div>
			</div>		
		    <div style="display:none;">
		          <div id="ninja-slider">
		              <div class="slider-inner">
		                  <ul>
		            <?php
		            $id_im = $_POST['id'];
		            $q=mysqli_query($conn,"SELECT * FROM `featured_img` WHERE img_fk = '$id_im' ORDER BY date_up DESC LIMIT 9");
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
	<?php
	}
	?>
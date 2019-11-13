				<div class="a-content" style="padding-top: 0px;">
					<div class="a-content-container"><div class="f_header_wrap">
						<div class="upload">
							<button class="popclick u_upload"><i class="fas fa-plus"></i> Add items</button>
							<!-- <form action="#"> -->
							<input type="file" name="featured_photo" class="popclick u_upload" accept="image/*" value="Add items" style="width: 93px;position: absolute;top: 87px;height: 27px;opacity: 0.0;">								
							<!-- </form> -->
						</div><!-- 
						<button>Add Item</button>
						<span><i class="far fa-file-video" style="padding-right: 10px;"></i>Videos</span> -->
					</div>
						<div class="data-content">
							<div class="i_prof_save">
								<div style="background: linear-gradient(transparent 0%, black 100%);">
								</div>
								<div class="gallery">
									<?php
									include 'inc/conn_db.php';
									$id = $_SESSION['usrID'];
									$q=mysqli_query($conn,"SELECT * FROM `featured_img` WHERE img_fk = '$id' ORDER BY date_up DESC LIMIT 12");
									$x=0;
									while ($img_r = mysqli_fetch_assoc($q)) {?>
										<img src="<?php echo "inc/uploaded/featured_img/".$img_r['img_path']; ?>" onclick="lightbox(<?php echo $x; ?>)">
								<?php
										$x++;
									}

									?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End of Add Feature Photos -->
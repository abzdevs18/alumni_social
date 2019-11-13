<?php
// include('header.php');
require_once 'header.php';
include '../inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Comments</span>
			</div>
			<div class="table-alums">
				<div class="thead">
					<table>
						<thead>
							<tr id="t-up">
								<th>Commentor</th>
								<th>Content</th>
								<th>Date Commented</th>
								<th>Course</th>
								<th>Status</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$com = mysqli_query($conn, "SELECT * FROM comments ORDER BY comment_timestamp DESC");
							while ($com_res = mysqli_fetch_assoc($com)) {
								$f_k = $com_res['user_id'];
								$u = mysqli_query($conn,"SELECT * FROm users WHERE id = '$f_k'");
								$n = mysqli_fetch_assoc($u);

							?>
							<tr id="b-l">
								<td><a href="list_of_alumni.php"><?php echo $n['userName']; ?></a></td>
								<td><?php echo $com_res['comment_content']; ?></td>
								<td><?php echo $com_res['comment_date']; ?></td>
								<td><?php echo $n['course']; ?></td>
								<td><?php 
								if ($n['online'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Online</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Offline</button>";
								}?></td>
								<td><button onclick="showCom(<?php echo  $com_res['post_id'];?>)">Show Post</button></td>
							</tr>
							<?php
						}
						?>
							
						</tbody>
					</table>
				</div>
				<div class="showProf">
					<div class="hid">
						<!-- data profile here -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
include('footer.php');
?>
<?php
// include('header.php');
require_once 'header.php';
include '../inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Alumni</span>
			</div>
				
			<div class="table-alums">
				<div class="thead">
					<table>
						<div style="width: 100%;line-height: 4;vertical-align: middle;padding-left: 10px;">
							<div style="display: inline-block;">	
								<!-- <button style="padding: 2px;">Add Alumni</button> -->
								<label class="search-field-wrapper" style="border: 1px solid #16c1c2;position: relative;padding: 4px 8px;">
									<i class="fas fa-search"></i>
									<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
								</label>
							</div>
							<div style="display: inline-block;float: right;margin-right: 44px;position: relative;">
								<div style="display: flex;flex-direction: column;margin: 0 auto;padding-top: 5px;">
									<div style="display: flex;flex-direction: row;width: calc( 100% - 50px );color: #333;">
										<label style="width: 100px;">Filter by: </label>
										<select style="height: 30px;border: 1px solid;border: 1px solid #999;border-radius: 3px;width: 200px;margin-top: 18px;" id="emStat">
										  <option value="1" selected>Employed</option>
										  <option value="0">Unemployed</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<thead>
							<tr id="t-up">
								<th>Name</th>
								<th>Lastname</th>
								<th>Email</th>
								<th>Course</th>
								<th>Job Related to Field</th>
								<th>Status</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody class="na">
						<?php
							$w = mysqli_query($conn, "SELECT * FROM users WHERE id != 0 AND Employed = 1 ");
							while ($alumni = mysqli_fetch_assoc($w)) {
								$id = $alumni['id'];
								$check = mysqli_query($conn,"SELECT * FROM about WHERE f_k = '$id'");
								$row = mysqli_fetch_assoc($check);
								/*EMployment query*/
								$emp = mysqli_query($conn,"SELECT * FROM add_emp WHERE f_k = '$id'");
								$em = mysqli_fetch_assoc($emp);
								?>
							<tr id="b-l">
								<td><?php echo  $alumni['userName'];?></td>
								<td><?php echo  $alumni['userLastName'];?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo  $alumni['course'];?></td>
								<td><?php 
								if ($em['job_related_field'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Yes</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>No</button>";
								}?></td>
								<td><?php 
								if ($alumni['online'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Online</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Offline</button>";
								}?></td>
								<td><button onclick="showProf(<?php echo $id;?>)">Show Profile</button></td>
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
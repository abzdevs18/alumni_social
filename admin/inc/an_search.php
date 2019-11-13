<?php
	
	if (isset($_POST['name'])) {
		include '../../inc/conn_db.php';
		// search user db and store the result to array
		$n = $_POST['name'];
		$nameinput = ucwords(strtolower($n));
		$query = "SELECT * FROM users WHERE userName LIKE '%$nameinput%' AND id != 0";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		// $js = json_encode($name);
		while($alumni = mysqli_fetch_assoc($query_result)) {
								$id = $alumni['id'];
								$check = mysqli_query($conn,"SELECT * FROM about WHERE f_k = '$id'");
								$row = mysqli_fetch_assoc($check);
			?>
		<tr id="b-l">
								<td><?php echo  $alumni['userName'];?></td>
								<td><?php echo  $alumni['userLastName'];?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo  $alumni['course'];?></td>
								<td><?php 
								if ($alumni['online'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Online</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Offline</button>";
								}?></td>
								<td><button onclick="showProf(<?php echo  $alumni['id'];?>)">Show Profile</button></td>
							</tr>	
		<?php
			}		
	}


	if (isset($_POST['stat'])) {
		include '../../inc/conn_db.php';
		// search user db and store the result to array
		$n = $_POST['stat'];
		$nameinput = ucwords(strtolower($n));
		$query = "SELECT * FROM users WHERE Employed = '$n' AND id != 0";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		// $js = json_encode($name);
		while($alumni = mysqli_fetch_assoc($query_result)) {
								$id = $alumni['id'];
								$check = mysqli_query($conn,"SELECT * FROM about WHERE f_k = '$id'");
								$row = mysqli_fetch_assoc($check);?>
		<tr id="b-l">
								<td><?php echo  $alumni['userName'];?></td>
								<td><?php echo  $alumni['userLastName'];?></td>
								<td><?php echo  $row['email'];?></td>
								<td><?php echo  $alumni['course'];?></td>
								<td><?php 
								if ($alumni['online'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Online</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Offline</button>";
								}?></td>
								<td><button onclick="showProf(<?php echo  $alumni['id'];?>)">Show Profile</button></td>
							</tr>	
		<?php
			}		
	}
?>
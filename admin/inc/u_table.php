<?php
	
	if (isset($_POST['name'])) {
		include '../../inc/conn_db.php';
		// search user db and store the result to array
		$n = $_POST['name'];
		$nameinput = ucwords(strtolower($n));
		$query = "SELECT `id`,`userName`,`userLastName`,`email`,`account_status` FROM users WHERE userName LIKE '%$nameinput%' AND id != 0";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		// $js = json_encode($name);
		while($alumni = mysqli_fetch_assoc($query_result)) {?>
		<tr id="<?php echo $alumni['id']; ?>">
			<td><?php echo  $alumni['userName'];?></td>
			<td><?php echo $alumni['userLastName']; ?></td>
			<td><?php echo $alumni['email']; ?></td>
			<td style="max-width: 400px;">
				<button id="verified" value="<?php echo $alumni['id']; ?>">Verified</button> | 
				<button id="suspended" value="<?php echo $alumni['id']; ?>">Suspend</button>
				<?php 
					$vision = '';
					if ($alumni['account_status'] == 1) {
						$vision = 'hidden';
					}else{
						$vision = 'visible';
					}
				?>
				<p style="visibility:<?php echo $vision; ?>;display: inline;font-size: 10px;padding: 10px;font-style: italic;color: red;">
				This account is suspended</p>
			</td>
		</tr>
		<?php
			}		
	}
?>
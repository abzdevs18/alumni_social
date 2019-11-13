<?php
include '../inc/conn_db.php';

$query = "SELECT * FROM emails ORDER BY date_send ASC";

$resQuery = mysqli_query($conn, $query);
$result = mysqli_num_rows($resQuery);
if ($result > 0) {
	echo '<div style="margin-bottom:70px;">';
	while ($rows = mysqli_fetch_assoc($resQuery)) {?>
			<div class="conversation" style="height: auto;">		
				<div class="sent">
					<div class="sent-wrapper">	
						<!-- <span><?php echo substr($rows['msg_time'], 10,-3); ?></span>				 -->
						<span style="font-size: 12px;"><?php echo $rows['date_send']; ?></span>				
						<div class="content-sent">
							<h3 style="font-size: 13px;padding: 3px 10px initial;color: #444;font-weight: 600;"><?php echo $rows['subject']; ?></h3>
							<p style="font-size: 13px;"><?php echo $rows['content']; ?></p>
						</div>
					</div>
				</div><!-- Sent Close -->
			</div> <!-- /*End of conversation*/ -->
	<?php
	}
	echo "</div>";
}


<?php
include("config.php");

if(isset($_POST['id'])){
	$statement = $pdo->prepare("SELECT * FROM tbl_message_received WHERE sent_by=?");
	$statement->execute(array($_POST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row) {

		echo '<thead>
				<tr>
					<th class="text-center">SN</th>
					<th class="text-center">Date & Time</th>
					<th class="text-center">Message</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
				foreach ($result as $row) {
					$i++;
				?>
				<tr>
					<td class="text-center"><?php echo $i; ?></td>
					<td class="text-center"><?php echo $date=$row["message_sent_date"]." ".$row["sent_time"]; ?></td>
					<td class="text-center"><?php echo $row["message"]; ?></td>
					<td class="text-center">
						<button v-on:click="reply_message_modal(m.message_id)"
							id="msg_reply"
							class="btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15"
							type="button">Show</button>
					</td>
				</tr>
				<?php
				}
				?>
				
			</tbody>';

	}
}

?>
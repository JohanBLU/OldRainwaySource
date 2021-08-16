<?php
	include '../global.php';
	if($logged) {
?>
<div class="lander">
	<h1>Inbox</h1>
	<table style="width:100%;height:30px;border:1px solid #ccc;border-bottom:0px;background-color:#F0F0F0;">
		<tr>
			<td style="width:33%;">
				Title
			</td>
			<td style="width:33%;">
				Sent By
			</td>
			<td style="width:33%;">
				Date
			</td>
		</tr>
	</table>
	<?php               $uID = $usr['id'];
						$result = $mysqli->query("SELECT * FROM `messages` WHERE `toid`='$uID' ORDER BY date DESC");
						while($row = $result->fetch_array()){

						$senderRAW = $row['fromid'];
						$senderQ = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$senderRAW'");
						$sender = $senderQ->fetch_array();


					echo "
						<table style='width:100%;height:30px;border:1px solid #bbb;'>
							<tr>
								<td style='width:33%;'>
									<a href='View.php?id=" . $row['id'] . "'>" . $row['subject'] . " </a>
								</td>
								<td style='width:33%;'>
									<a href='/User/?id=" . $sender['id'] . "'>" . $sender['Username'] . " </a> 
								</td>
								<td style='width:33%;'>
									" . $row['date'] . "
								</td style='width:33%;'>
							</tr>
						</table> ";
						}
	?>
</div>
<?php
	}
	include '../footer.php';
	?>
<?php
	include '../global.php';
	if($logged) {
?>
<div class="lander">
	<h1>Invite Keys</h1>
	<p>If you want to create invite key go <a href="/Settings/?tab=invkey">here</a></p>
	<table style="width:100%;height:30px;border:1px solid #ccc;border-bottom:0px;background-color:#F0F0F0;">
		<tr>
			<td style="width:33%;">
				Key
			</td>
			<td style="width:33%;">
				Used
			</td>
			<td style="width:33%;">
				Date
			</td>
		</tr>
	</table>
	<?php
						$result = $mysqli->query("SELECT * FROM `invitekey` WHERE `creatorid`='$usr[id]' ORDER BY created DESC");
						while($row = $result->fetch_array()){

						if($row['used'] == "1") {
						$used = "Yes";
						}else{
						$used = "No";
						}


					echo "
						<table style='width:100%;height:30px;border:1px solid #bbb;'>
							<tr>
								<td style='width:33%;'>
									" . $row['invitekey'] . "
								</td>
								<td style='width:33%;'>
									" . $used . "
								</td>
								<td style='width:33%;'>
									" . $row['created'] . "
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
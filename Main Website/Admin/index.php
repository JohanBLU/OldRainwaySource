<?php 

include "../global.php"; 

if(!$logged){
	die();
}elseif($logged && $usr['administrator'] == '0'){
	die();
}

if(!$_GET){
	header('Location: /Admin/?enablefeatures=view');
}

$Maintenance = $mysqli->real_escape_string(strip_tags($_POST["maintenance"]));
$shout2 = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['shoutit'])));
	$uID = $usr['id'];
		if($_POST["shout"]){ 
			$mysqli->query("UPDATE `shout` SET `shout`='$shout2'");
				$mysqli->query("UPDATE `shout` SET `shouter`='$uID'");
					die("<META http-equiv=refresh content=1;URL=/Admin/>");
				}

$fid = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['fid'])));
$hid = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['hid'])));
$ubid = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['ubid'])));	
$bid = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['bid'])));		
$bfor = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['bfor'])));
$breason = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['breason'])));
	
	if($_POST["ban"]){
			$mysqli->query("UPDATE `accounts` SET `banned`='1' WHERE `id`='$bid'");
				$mysqli->query("UPDATE `accounts` SET `bannedFor`='$bfor' WHERE `id`='$bid'");
					$mysqli->query("UPDATE `accounts` SET `bannedReason`='$breason' WHERE `id`='$bid'");
						die("<META http-equiv=refresh content=1;URL=/Admin/>");
						}
			
		if($_POST["unban"]){
			$userbannedcheck = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$ubid'");
			$userbanned = $userbannedcheck->fetch_array();
			$uban = $userbanned['banned'];

			if($uban == "0"){
				die("<div style='padding:5px;color:red;margin:5px;'>That user isn't banned!</div><META http-equiv=refresh content=1;URL=/Admin/>");
			}
				$mysqli->query("UPDATE `accounts` SET `banned`='0' WHERE `id`='$ubid'");
					$mysqli->query("UPDATE `accounts` SET `bannedFor`='Reset' WHERE `id`='$bid'");
						$mysqli->query("UPDATE `accounts` SET `bannedReason`='Reset' WHERE `id`='$bid'");
							die("<META http-equiv=refresh content=1;URL=/Admin/>");
							}
								if($_POST["Hire"]){
									$mysqli->query("UPDATE `accounts` SET `Admin`='true' WHERE `id`='$hid'");		
										die("<META http-equiv=refresh content=1;URL=/Admin/>");
										}
											if($_POST["Fire"]){
												$mysqli->query("UPDATE `accounts` SET `Admin`=''
												WHERE `id`='$fid'");
												die("<META http-equiv=refresh content=1;URL=/Admin/>");
												}
								
									

?>
	<body>
		<div class="lander">
			<?php if($usr['administrator'] == '1') { ?>
				<?php if($logged) { ?>
					<h1>Welcome to the Administration</h1>
					<table>
						<tr>
							<td style="vertical-align: text-top; padding: 14px;">
								<div class="verticaloptionpanel">
									<span class="verticaltitle">Administration Menu</span>
									<a class="verticaloption" href="?enablefeatures=view">Enable Features</a>
									<span class="verticalbreak"></span>
									<span class="verticalsmalltitle">User Related</span>
									<a class="verticaloption" href="?usermanagement=view">User Management</a>
									<a class="verticaloption" href="?usermanagement=view#staff_management">Staff Management</a>																
									<span class="verticalbreak"></span>
									<span class="verticalsmalltitle">Other Stuff</span>
									<a class="verticaloption last" href="?shout=view">Shout</a>
							</td>
							<td style="vertical-align: text-top;">
								<?php
									if($_GET['enablefeatures'] == 'view'){
								?>
								<h2>Enable Features:</h2>
								<form method="post" action="">
									Maintenance <input type="checkbox" name="maintenance" value="true"><br /><br>
									<input type="submit" name="Update" value="Update" class="btn">
								</form>
								<?php
									}elseif($_GET['usermanagement'] == 'view'){
								?>
								<h2>User Management</h2>
									<form method="post" action="">
										<table style="width: 100%;" border="0">
											<tr>
												<td><i>ID:</i></td>
												<td><input type="text" class="input-box" name="bid"></td>
											</tr>
											<tr>
												<td><i>Ban For:</i></td>
												<td><input type="text" class="input-box" name="bfor"></td>
											</tr>
											<tr>
												<td><i>Ban Reason:</i></td>
												<td><input type="text" class="input-box" name="breason"></td>
											</tr>
											<tr>
												<td><input type="submit" class="btn" name="ban"></td>
											</tr>
										</table>
									</form>
									<h3>Banned Users:</b></h3>
									<?php
										if(2 == 2){
											$result = $mysqli->query("SELECT * FROM `accounts` WHERE `banned`='1' ORDER BY `id`");
											while($row = $result->fetch_array()){
							
												echo "<a style='display: block; padding: 6px; padding-left: 10px;' href='/User/?id=" . $row['id'] . "'>". $row['username'] . "</a>";
											  }
										}
									?>
									<form method="post" action="">
										<table style="width: 100%;" border="0">
											<tr>
												<td><i>Unban:</i></td>
												<td><input type="text" class="input-box" name="ubid" placeholder="User ID"></td>
												<td><input type="submit" class="btn" value="Unban" name="unban"></td>
											</tr>
										</table>
									</form>
									<hr>
									<h2 id="staff_management">Staff Management</h2>
									<form method="post" action="">
										<table style="width: 100%;" border="0">
											<tr>
												<td><i>Hire:</i></td>
												<td><input type="text" class="input-box" name="hid" placeholder="User ID"></td>
												<td><input type="submit" class="btn" value="Hire" name="Hire"></td>
											</tr>
										</table>
									</form>
									<?php if($usr['id'] == "2"||$usr['id'] == "5"){ ?>
										<form method="post" action="">
											<table style="width: 100%;" border="0">
												<tr>
													<td><i>Fire:</i></td>
													<td><input type="text" class="input-box" name="fid" placeholder="User ID"></td>
													<td><input type="submit" class="btn" value="Fire" name="Fire"></td>
												</tr>
											</table>
										</form>
										<? } else { echo "
											<form method='post' action=''>
												<table border='0'>
													<tr>
														<td><b><font color='#ccc'>Fire User ID:</font></b></td>
														<td><input type='text' class='input-box' name='fid' placeholder='User ID' disabled></td>
														<td><input type='submit' class='btn' value='Fire' name='Fire' disabled></td>
													</tr>
												</table>
											</form>
											<font color='red'>False credentials. You cannot fire administrators.</font>";
										 }
										 }elseif($_GET['shout'] == 'view'){
										 ?>
										<h2>Shout</h2>
											<form method="post" action="">
												<textarea name="shoutit" rows="3" cols="50" class="input-text"><?php echo $shoutmsg; ?></textarea></textarea><br>
												<input type="submit" name="shout" value="Update" class="btn">
											</form>
										<?
												} 
											}
										 }
										?>
										<?php
											if(!$logged||$logged) {
												if($usr['Admin'] == "false") { 
													header("location:http://www.infernowebmedia.com/"); 
													exit();
												}
											}
										?>
									</tr>
								</td>
							</table>
						</div>
					</div>

		<?php include "../footer.php"; ?>
	</body>
</html>
	
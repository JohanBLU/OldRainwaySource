<?php include "../global.php"; 
$uID = $usr['id'];
$uLors = $usr['Lors'];
$add = $mysqli->real_escape_string(strip_tags(stripslashes($_POST["add"])));
$rid = $mysqli->real_escape_string(strip_tags(stripslashes($_POST["rid"])));
$preset = $mysqli->real_escape_string(strip_tags(stripslashes($_POST["preset"])));

	if($_POST["change"]){
		$mysqli->query("UPDATE `accounts` SET `Lors`='$add' WHERE `id`='$uID'");
			die("<META http-equiv=refresh content=1;URL=/Test/>");
		}
			if($_POST["Reset"]){
				$mysqli->query("UPDATE `accounts` SET `Lors`='25' WHERE `id`='$rid'");
					die("<META http-equiv=refresh content=1;URL=/Test/>");
					}
						if($_POST["EReset"]){
							if($_POST['preset'] == "reset_econ_2") {
								$mysqli->query("UPDATE `accounts` SET `Lors`='25'");
									die("<META http-equiv=refresh content=1;URL=/Test/>");
									}
								}
	?>
<?php if($usr['Admin'] == "true"){ ?>
			<div class="lander">
				<h2>Rainway Management System</h2>
					<form method="post" action="">
					<table border="0">
					<tr>
						<td>Edit <b>my</b> Lors:</td>
						<td><input type="text" class="input-box" name="add" placeholder="Enter Lors"></td>
						<td><input type="submit" name="change" value="Change" class="btn"></td>
					</tr>
					<tr>
						<td>Reset User's Lors:</td>
						<td><input type="text" class="input-box" name="rid" placeholder="User's ID"></td>
						<td><input type="submit" value="Reset" name="Reset" class="btn"></td>
					</tr>
					<tr>
						<td>Reset Economy:</td>
						<td><input type="text" placeholder="Enter Password" name="preset" class="input-box"></td>
						<td><input type="submit" value="Reset" name="EReset" class="btn"></td>
					</tr>
				</div> 
			
			</div>
			<? } ?>
	</body>
</html>
	
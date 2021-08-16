<?php
include "../global.php";
?>
<div class="lander">
	<?php
	if($logged){
		$creatorid = $usr['id'];
		$checkgames = $mysqli->query("SELECT * FROM `games` WHERE `creatorid`='$creatorid'");
        if($checkgames->num_rows > 0){
            die("You already created a game.");
        }

		if($_POST){
			if($_POST["name"] && $_POST["ip"] && $_POST["port"] && $_POST["description"]){
						$name = $mysqli->real_escape_string(strip_tags($_POST["name"]));
 	 					$ip = $mysqli->real_escape_string(strip_tags($_POST["ip"]));
 	 					$port = $mysqli->real_escape_string(strip_tags($_POST["port"]));
 	 					$description = $mysqli->real_escape_string(strip_tags($_POST["description"]));
 	 					$creatorid = $usr['id'];
 	 					$creatorname = $usr['Username'];
 	 					$creatorip = $_SERVER['REMOTE_ADDR'];
 	 					
 	 					if($name == "" || $ip == "" || $port == "" || $description == ""){
 	 						die("You cannot leave any fields blank.");
 	 					}
 	 					elseif(strlen($name) < 2){
                        die("<div class='alert'>That game name is too short.</div>");
                        }
                        elseif(strlen($name) > 30){
                        die("<div class='alert'>That game name is too long.</div>");
                        }
                        elseif(strlen($description) < 3){
                        die("<div class='alert'>Your description is too short.</div>");
                        }
                        elseif(strlen($description) > 150){
                        die("<div class='alert'>Your description is too long.</div>");
                        }
                        elseif(strlen($port) < 5){
                        die("<div class='alert'>Your port is too short.</div>");
                        }
                        elseif(strlen($port) > 15){
                        die("<div class='alert'>Your port is too long.</div>");
                        }
                        elseif(strlen($ip) < 5){
                        die("<div class='alert'>Your ip is too short.</div>");
                        }
                        elseif(strlen($ip) > 100){
                        die("<div class='alert'>Your ip is too long.</div>");
                        }else{
 	 						$mysqli->query("INSERT INTO `games` (`name`, `icon`, `port`, `description`, `creatorid`, `creatorname`, `ip`, `creatorip`) VALUES ('$name', '0', '$port', '$description', '$creatorid', '$creatorname', '$ip', '$creatorip')");
 	 						die("You're game has been created!<META http-equiv=refresh content=1;URL=/Games/?tab=featured>");
 	 					}
			}
		}
		
		
		?>
		<h1><b>Games</b></h1>
		<p>You can create only one game, please don't do shit games or you will be banned. You should enter your port and ip or vpn ip to host. Contact Dev for you game icon, you will able to upload icon soon.</p>
		<form method="post" action="">
								<table border="0">
									<tr>
										<td><b>Name:</b></td>

										<td>
										<textarea name="name" rows="3" cols="25" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Ip:</b></td>

										<td>
										<textarea name="ip" rows="3" cols="50" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Port:</b></td>

										<td>
										<textarea name="port" rows="3" cols="50" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Description:</b></td>

										<td>
										<textarea name="description" rows="3" cols="50" class="input-text"></textarea></td>
									</tr>
									<tr>
										<td><input type="submit" value="Create Game!" name="wot" class="btn"></td>
									</tr>
								</table>
							</form>
	
	
		<?php
		
	
		
		
	}
	
	
	?>
	
	</div>

		<?php include "../footer.php"; ?>
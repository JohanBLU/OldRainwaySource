<?php
include "../global.php";
?>
<div class="lander">
	<?php
	if($logged){
		$creatorid = $usr['id'];
		$gid = $_GET['id'];
		$checkgames = $mysqli->query("SELECT * FROM `games` WHERE `id`='$gid'");
		$checkg = $checkgames->fetch_array();
        if($creatorid !== $checkg['creatorid']){
            die("This is not your game.");
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
                        elseif(strlen($description) > 200){
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
                        elseif(strlen($ip) > 60){
                        die("<div class='alert'>Your ip is too long.</div>");
                        }else{
                            $mysqli->query("UPDATE `games` SET `name` = '$name' WHERE `id`='$gid'");
                            $mysqli->query("UPDATE `games` SET `port` = '$port' WHERE `id`='$gid'");
                            $mysqli->query("UPDATE `games` SET `description` = '$description' WHERE `id`='$gid'");
                            $mysqli->query("UPDATE `games` SET `ip` = '$ip' WHERE `id`='$gid'");
                            die("You're game has been updated!<META http-equiv=refresh content=1;URL=/Games/?tab=featured>");
 	 					}
			}
		}
		
		
		?>
		<h1><b>Games</b></h1>
		<p>Please, don't break any rules.</p>
		<form method="post" action="">
								<table border="0">
									<tr>
										<td><b>Name:</b></td>

										<td>
										<textarea required name="name" rows="3" cols="25" placeholder="<?=$checkg['name']?>" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Ip:</b></td>

										<td>
										<textarea required name="ip" rows="3" cols="50" placeholder="<?=$checkg['ip']?>" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Port:</b></td>

										<td>
										<textarea required name="port" rows="3" cols="50" placeholder="<?=$checkg['port']?>" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Description:</b></td>

										<td>
										<textarea required name="description" rows="3" cols="50" placeholder="<?=$checkg['description']?>" class="input-text"></textarea></td>
									</tr>
									<tr>
										<td><input type="submit" value="Update Game!" name="wot" class="btn"></td>
									</tr>
								</table>
							</form>
	
	
		<?php
		
	
		
		
	}
	
	
	?>
	
	</div>

		<?php include "../footer.php"; ?>
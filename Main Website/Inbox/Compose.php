<?php
include "../global.php";
?>
<div class="lander">
	<?php
	if($logged){
		$getSendTo = $_GET['id'];
		if($getSendTo == $usr['id']) {
		    die("You can't message yourself.");
		}
		$SendToQUERY = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$getSendTo'");
		$sendto = $SendToQUERY->fetch_array();
		$sent = $sendto['id'];
		
		if(!$getSendTo){
			die("You have not specified a ID.");
		}
		
		if(!$sendto){
			die("That user is not found.");
		}
		
		
		if($_POST){
			if($_POST["subject"] && $_POST["message"]){
						$subject = $mysqli->real_escape_string(strip_tags($_POST["subject"]));
 	 					$message = $mysqli->real_escape_string(strip_tags($_POST["message"]));
 	 					
 	 					if($subject == "" || $message == ""){
 	 						die("You cannot leave any fields blank.");
 	 					}
 	 					elseif(strlen($subject) < 2){
                        die("<div class='alert'>That title is too short.</div>");
                        }
                        elseif(strlen($subject) > 30){
                        die("<div class='alert'>That title is too long.</div>");
                        }
                        elseif(strlen($message) < 3){
                        die("<div class='alert'>Your content is too short.</div>");
                        }
                        elseif(strlen($message) > 5000){
                        die("<div class='alert'>Your content is too long.</div>");
                        }else{
 	 						$mysqli->query("INSERT INTO `messages` (`fromid`, `toid`, `subject`, `body`) VALUES ('$uID', '$sent', '$subject', '$message')");
 	 						die("Sent!");
 	 					}
			}
		}
		
		
		?>
		<h1>You are composing a message to <b><?php echo $sendto['Username']; ?></b></h1>
		<form method="post" action="">
								<table border="0">
									<tr>
										<td><b>Subject:</b></td>

										<td>
										<textarea name="subject" rows="3" cols="25" class="input-text"></textarea></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><b>Message:</b></td>

										<td>
										<textarea name="message" rows="3" cols="50" class="input-text"></textarea></td>
									</tr>
									<tr>
										<td><input type="submit" value="Update" name="wot" class="btn"></td>
									</tr>
								</table>
							</form>
	
	
		<?php
		
	
		
		
	}
	
	
	?>
	
	</div>

		<?php include "../footer.php"; ?>
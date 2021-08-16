<?php
include "../global.php";
$mID = $msg['id'];
	if($logged){
		if($_POST["mdelete"]){
			$mysqli->query("DELETE FROM `messages` WHERE `id` = '$mID'");
				die("<META http-equiv-refresh content=1;URL=/Inbox/");
				}
			}
?>
<div class="lander">
	<?php
	if($logged){
		$getMSG = $_GET['id'];
		$msgQUERY = $mysqli->query("SELECT * FROM `messages` WHERE `id` ='$getMSG'");
		$msg = $msgQUERY->fetch_array();
		
		if(!$getMSG){
			die("You have not specified an ID.");
		}
		
		if(!$msg){
			die("That message is not found.");
		}
		
		$rawSender = $msg['fromid'];
		$rawReciever = $msg['toid'];
		$mID = $msg['id'];
		
		$senderQUERY = $mysqli->query("SELECT * FROM `accounts` where `id`='$rawSender'");
		$sender = $senderQUERY->fetch_array();
		$reciever = $mysqli->query("SELECT * FROM `accounts` where `id`='$rawReciever'");
		
		$subject = $msg['subject'];
		$message = $msg['body'];
		
		if($rawReciever == $usr['id']){
		$mysqli->query("UPDATE `messages` SET `read`='1' WHERE `id`='$mID'");
		?>
	
		<span style="float:left;"><b>From:</b> <?php echo $sender['Username']; ?></span>
		<font size="4"><b><?php echo $subject; ?></b></font>
		<hr width="96.4%" color="#CCC" /> 
<textarea rows="10" cols="50" class="input-text" style="font-size:15px;overflow-x: hidden;" readonly>
<?php echo $message ?>						
										
										
										</textarea>
		<hr width="96.4%" color="#CCC" />
		<form method="post" action="Reply.php?id=<?php echo $mID; ?>">
			<input type="submit" class="btn" name="mreply" value="Reply">
		</form>
		<form method"post" action="">
			<input type="submit" class="btn" name="mdelete" value="Delete">
			<input type="submit" class="btn" name="mreport" value="Report">
		</form>
		<?php
		
		}else{
		?>
		Sorry, that message wasn't sent to you.
		<?php	
		}
		
		
	}
	
	
	?>
	
	<?php include "../footer.php"; ?>
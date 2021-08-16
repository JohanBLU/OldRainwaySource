<?php include "../global.php";
$_GET['tab'];

if(!$_GET) {
	header('Location: /Settings/?tab=info');
}

$uid = $usr['id'];
$uDesc = $usr['description'];

$description = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['description']))); 
$nemail = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['nemail']))); 
$emailDis = $mysqli->real_escape_string(strip_tags(stripslashes($_POST['emailDis'])));
    
    if($_GET['tab'] == 'desc'){
	if($_POST["desc"]){ 
	        if(strlen($description) < 2){
                die("<div style='margin:10px;padding:4px;color:red;'><center>Your description is too short.</center></div>");
            }elseif(strlen($description) > 1000){
                die("<div style='margin:10px;padding:4px;color:red;'><center>Your description is too long.</center></div>");
            }elseif(preg_match("/∞([%$#*]+)/", $description)) {
	            die("<div style='margin:10px;padding:4px;color:red;'><center>Dont put symbols at the description.</center></div>");
            }elseif(preg_match("jayer", $description)) {
                die("<div style='margin:10px;padding:4px;color:red;'><center>Dont put symbols at the description.</center></div>");
            }
			$mysqli->query("UPDATE `accounts` SET `description`='$description' WHERE `id`='$uid'");
			die("<center>Your description has been changed.</center><META http-equiv=refresh content=1;URL=/Settings/>");
	}
    }
			if($_GET['tab'] == 'email'){
			if($_POST["nemail"]){
			    if(!filter_var($nemail, FILTER_VALIDATE_EMAIL)) {
			        die("<div style='margin:10px;padding:4px;color:red;'><center>Invalid E-Mail.</center></div>");
			    }else{
				    $mysqli->query("UPDATE `accounts` SET `email`='$nemail' WHERE `id`='$uid'");
					die("<center>Your email has been changed.</center><META http-equiv=refresh content=1;URL=/Settings/>");
			    }
			}
			}
			if($_GET['tab'] == 'password'){
			if($_POST["new1password"] && $_POST["new2password"] && $_POST["oldpassword"]){
			    $new1password = $mysqli->real_escape_string(md5(strip_tags(stripslashes($_POST['new1password']))));
			    $new2password = $mysqli->real_escape_string(md5(strip_tags(stripslashes($_POST['new2password']))));
			    $oldpassword = $mysqli->real_escape_string(md5(strip_tags(stripslashes($_POST['oldpassword']))));
			    $oldpass = $usr['Password'];
			    if($oldpass != $oldpassword){
			        die("<div style='margin:10px;padding:4px;color:red;'><center>Old password is incorrect, sorry.</center></div>");
			    }
			    if($new1password != $new2password){
			        die("<div style='margin:10px;padding:4px;color:red;'><center>New passwords do not match.</center></div>");
			    }
			    
				$mysqli->query("UPDATE `accounts` SET `Password`='$new1password' WHERE `id`='$uid'");
				die("<center>Your password has been changed.</center><META http-equiv=refresh content=1;URL=/signin.php>");
			}
			}
						

?>
	<body>
		<div class="lander">
			<?php if($logged) { ?>
				<h1>Settings</h1>
					<table>
						<tr>
							<td style="vertical-align:text-top:padding:14px;">
								<div class="verticaloptionpanel">
									<div class="verticaltitle">Settings Menu</div>
									<a class="verticaloption" href="?tab=info">My Info</a>
									<a class="verticaloption" href="?tab=email">Update Email</a>
									<a class="verticaloption" href="?tab=password">Update Password</a>
									<a class="verticaloption" href="?tab=desc">Update Description</a>
									<a class="verticaloption last" href="?tab=invkey">Invite Key</a>
								</div>
							</td>
								<td style="vertical-align:text-top;padding:14px;">
									<?php if($_GET['tab'] == 'info') { ?>
									<h3>Account Info</h3>
										Current Email: <i><?php echo $usr['Email'] ?></i><br />
										Current Username: <i><?php echo $usr['Username'] ?></i><br />
									<? } ?>
									
									<?php if($_GET['tab'] == 'email'){ ?>
									<h3>Email Settings</h3>
									<form method="post" action="">
										<table border="0">
											<tr>
												<td>
												<b>Update Email:</b><br /></td>
												<td><input type="text" name="nemail" class="input-box"></td>
											</tr>
											<tr>
												<td><input type="submit" value="Update" name="email" class="btn"></td>
											</tr>
										</table>
									</form>
									<? } ?>
									<?php 
function get_invitekey($valid_chars, $length)
{
    $random_string = "";

    $num_valid_chars = strlen($valid_chars);

    for ($i = 0; $i < $length; $i++)
    {
        $random_pick = mt_rand(1, $num_valid_chars);

        $random_char = $valid_chars[$random_pick-1];

        $random_string .= $random_char;
    }

    return $random_string;
}

$original_invitekey = '87f438fy873f87n48n483h7fb347y';
$invitekey = get_invitekey($original_invitekey, 29);
if($_GET['tab'] == 'invkey') {
            $checkinv = $mysqli->query("SELECT * FROM `invitekey` WHERE `creatorid`=".$usr["id"]."");
            if($checkinv->num_rows < 5){
            $creatorip = $_SERVER['REMOTE_ADDR'];
			if($_POST["ikey"]){
				$mysqli->query("INSERT INTO `invitekey` (`invitekey`, `used`, `creatorid`, `creatorname`, `creatorip`) VALUES ('$invitekey', '0', '$usr[id]', '$usr[Username]', '$creatorip')");
				die("<META http-equiv=refresh content=1;URL=/Settings/>");
			} 
            }else{
                if($usr['Username'] == "Flarf" || $usr['powerGlobalMod'] == "1" || $usr['Username'] == "Codex" || $usr['Username'] == "Flofy") { 
                $creatorip = $_SERVER['REMOTE_ADDR'];
			    if($_POST["ikey"]){
				$mysqli->query("INSERT INTO `invitekey` (`invitekey`, `used`, `creatorid`, `creatorname`, `creatorip`) VALUES ('$invitekey', '0', '$usr[id]', '$usr[Username]', '$creatorip')");
				die("<META http-equiv=refresh content=1;URL=/Settings/>");
			    } 
                }else{
                    die("<div style='margin:10px;padding:4px;color:red;'><center>You can't create more than 5 invite keys!</center></div>");
                }
            }
			?>
									<h3>Invite Key</h3>
									<p>Please, do not invite random people, if you invite someone who breaks the rules you will also get banned! You cannot create more than 5 invite keys!</p>
									<form method="post" action="">
										<table border="0">
											<tr>
												<td><input type="submit" value="Create a Invite Key!" name="ikey" class="btn"></td>
											</tr>
										</table>
										<p>If you already created a invite key, you can see it <a href="/InviteKey/">here</a>!</p>
									</form>
									<? } ?>
									
									<?php if($_GET['tab'] == 'password') { ?>
									<h3>Password Settings</h3>
									<form method="post" action="">
										<table border="0">
										    <tr>
												<td><b>Enter Old Password:</b></td>
												<td><input type="password" name="oldpassword" class="input-box"></td>
											</tr>
											<tr>
												<td><b>Enter New Password:</b></td>
												<td><input type="password" name="new1password" class="input-box"></td>
											</tr>	
											<tr>
												<td><b>Re-Enter New Password:</b></td>
												<td><input type="password" name="new2password" class="input-box"></td>
											</tr>
											<tr>
												<td><input type="submit" value="Update" name="pass" class="btn"></td>
											</tr>
										</table>
									</form>
									<? } ?>
									
									<?php if($_GET['tab'] == 'desc') { ?>
									<h3>Account Description</h3>
									<form method="post" action="">
									<table border="0">
										<tr>
											<td><b>Description:</b></td>
											<td>
												<textarea name="description" rows="3" cols="40" class="input-text"><?php echo $uDesc; ?></textarea></td>
										</tr>
										<tr>
											<td><input type="submit" value="Update" name="desc" class="btn"></td>
										</tr>
									</table>
									</form>
									<? } ?>
									
							</tr>
						</table>
					</table>	
				<? } ?>
			</div>
		</body>
	</div>
		<?php include "../footer.php"; ?>
</html>
	
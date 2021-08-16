<?php include "global.php"; 

if(!$logged){
	if($_POST){
	  if($_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["invitekey"]){
		$username = $mysqli->real_escape_string(strip_tags($_POST["username"]));
 	 	$password = $mysqli->real_escape_string(md5(strip_tags($_POST["password"])));
 	 	$email = $mysqli->real_escape_string(strip_tags($_POST["email"]));
 	 	$key = $mysqli->real_escape_string(strip_tags($_POST["invitekey"]));
 	 	$ip = $_SERVER['REMOTE_ADDR'];
	
		if($username && $password && $email && $key){
				$checkquery = $mysqli->query("SELECT * FROM `accounts` WHERE `username`='$username'");
				$check = $checkquery->fetch_array();
				
				$checkquery2 = $mysqli->query("SELECT * FROM `accounts` WHERE `email`='$email'");
				$check2 = $checkquery2->fetch_array();

                     
                    $checkIpQ = $mysqli->query("SELECT * FROM `accounts` WHERE `ip`='$ip'");
                    $checkIp = $checkIpQ->fetch_array();
                    
                    $checkExists = $mysqli->query("SELECT * FROM `invitekey` WHERE `invitekey`='$key' AND used='0'");
                    $exists = $checkExists->fetch_array();

					if($check != 0){
						die("<div style='margin:10px;padding:4px;color:red;'>That username has been taken.</div>");
					}elseif($checkIp > 2){
                        die("<div style='margin:10px;padding:4px;color:red;'>You can't create more than one account!</div>");
                    }elseif($exists == 0) {
                        die("<div style='margin:10px;padding:4px;color:red;'>Invalid Invite Key.</div>");
                    }elseif($check2 != 0){
						die("<div style='margin:10px;padding:4px;color:red;'>That email is already in use. Please login.");
					}else{
							$mysqli->query("INSERT INTO `accounts` (`username`, `password`, `email`, `ip`) VALUES ('$username', '$password', '$email', '$ip')");
							$mysqli->query("UPDATE `invitekey` SET `used` = `used` + 1 WHERE invitekey = '$key'");
							$mysqli->query("UPDATE `invitekey` SET `usedby` = '$username' WHERE invitekey = '$key'");
							$mysqli->query("UPDATE `invitekey` SET `userip` = '$ip' WHERE invitekey = '$key'");
	
						 	setcookie("username", hash("sha512", $username), time() + 24 * 60 * 60, "/");
      							setcookie("password", $password, time() + 24 * 60 * 60, "/");	
	
						 	die("<div style='margin:10px;padding:4px;'>Your account has been created.</div><META http-equiv=refresh content=1;URL=/signin.php>");
       						}
       					}	
				}	 
			}	
		}
	
?>
	<body>
		<?php if(!$logged) { 
			echo '<div class="lander">
				<span style="font-size:25px;">Sign Up</span> / <small><a href="signin.php">Sign In</a></small><br />
					In order to access the website, you have to sign up or sign in.
					<br /><br>
						<form method="post" action="">
							<table border="0">
								<tr>
									<td><b>Username:</b></td>
									<td><input type="text" name="username" class="input-box"></td>
								</tr>
								<tr>
									<td><b>Password:</b></td>
									<td><input type="password" name="password" class="input-box"></td>
								</tr>
								<tr>
									<td><b>Invite Key:</b></td>
									<td><input type="text" name="invitekey" class="input-box"></td>
								</tr>
								<tr>
									<td><b>Email:</b></td>
									<td><input type="email" name="email" class="input-box" style="margin-bottom:15px;"></td>
								</tr>
								<tr>
									<td style="border-right:1.5px solid #EAEAEA;width:50%;text-align:center"><input type="Submit" ></td>
									
								</tr>
							</table>
						</form>
			</div>
			
			';
			}
			?>
			<?php if($logged) { ?>
			<div class="lander">
					<h1>Welcome <?php echo $usr['Username']; ?>!</h1>
						
								<a href="/Forum/">Chat on the forum</a><br />
								<a href="/Catalog/">Shop on the catalog</a><br />
								<a href="/ClientDownload/">Play some Rainway</a><br /><br>	
								What will you do?<br><br>
								<iframe allowtransparency scrolling="no" frameborder="no" src="/core/character.php?id=<?=$usr['id']?>" width="200" height="225"></iframe>
				</div>
			<? } ?>
		
			<?php include "footer.php"; ?>
	</body>
</html>
<?php include "global.php";

if(!$logged){
	if($_POST){
 	 if($_POST["username"] && $_POST["password"]){
	  
		$username = $mysqli->real_escape_string(strip_tags($_POST["username"]));
 	 	$password = $mysqli->real_escape_string(md5(strip_tags($_POST["password"])));
	
		if($username && $password){
				$checkquery = $mysqli->query("SELECT * FROM `accounts` WHERE `username`='$username'");
				$check = $checkquery->fetch_array();
				
				$checkquery2 = $mysqli->query("SELECT * FROM `accounts` WHERE `password`='$password'");
				$check2 = $checkquery2->fetch_array();
				
					if(!$check){
						die("<div style='margin:10px;padding:4px;color:red;'>That username doesn't exist.");
					}elseif(!$check2){
						die("<div style='margin:10px;padding:4px;color:red;'>Incorrect password, sorry.");
						
					}else{
	
						 	setcookie("username", hash("sha512", $username), time() + 24 * 60 * 60, "/");
      							setcookie("password", $password, time() + 24 * 60 * 60, "/");
	
						 	die("<div style='margin:10px;padding:4px;color:#333333;'>Logged in! <META http-equiv=refresh content=1;URL=/index.php></div>");
       					}
				}	 
			}	
		}
	}else{ 
	die("<span style=color:red;>You're already logged in.</span>");
}?>
	<body>
		<?php if(!$logged){ ?>
			<div class="lander">
				<h1>Sign In</h1>
					In order to <b>access the main features,</b> you must sign in.
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
									<td style="width:50%;text-align:center"><input type="submit" ></td>
								</tr>
							</table>
						</form>
			</div>
			<? } ?>
			
			<?php include "footer.php"; ?>
	</body>
	
	
</html>
	
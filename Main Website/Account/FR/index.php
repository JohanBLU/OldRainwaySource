<?php include "../../global.php"; 

if(!$logged){
	if($_POST){
	  if($_POST["username"] && $_POST["password"] && $_POST["email"]){
	  
		$username = $mysqli->real_escape_string(strip_tags($_POST["username"]));
 	 	$password = $mysqli->real_escape_string(md5(strip_tags($_POST["password"])));
 	 	$email = $mysqli->real_escape_string(strip_tags($_POST["email"]));
	
		if($username && $password && $email){
				$checkquery = $mysqli->query("SELECT * FROM `accounts` WHERE `username`='$username'");
				$check = $checkquery->fetch_array();
				
				$checkquery2 = $mysqli->query("SELECT * FROM `accounts` WHERE `email`='$email'");
				$check2 = $checkquery2->fetch_array();
			
					if($check != 0){
						die("<div style='margin:10px;padding:4px;color:red;'>That username has been taken.");
					}elseif($check2 != 0){
						die("<div style='margin:10px;padding:4px;color:red;'>That email is already in use. Please login.");
						
					}else{
							$mysqli->query("INSERT INTO `accounts` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')");
	
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
		header('location:index.php');
	}
	?>
		<?php if($logged) { ?>
			<div class="lander">
				<h1>Friend Requests</h1>
					View all friend requests here.
			</div>
			<? } ?>
		
			
	</body>
</html>
	
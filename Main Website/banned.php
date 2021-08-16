<?php
ob_start();
	$mysqli = new mysqli("server306.web-hosting.com","rainmfma_rainway","H[-&6tapRsY0","rainmfma_database");
		global $mysqli;	
	
	$shoutquery = $mysqli->query("SELECT * FROM `shout`");
		$shout = $shoutquery->fetch_array();
			$shoutmsg = $shout['shout'];
				$shouterid = $shout['shouter'];
					$shouterquery = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$shouterid'");
       						 $shouter = $shouterquery->fetch_array();
 
		function thetime()
			{
				$thetime = getdate();
				print_r($thetime);
			}

  				$logged = false;
  					 if($_COOKIE['username'] && $_COOKIE['password']){
     			 			 $username = strip_tags($_COOKIE['username']);
        		 				 $password = strip_tags($_COOKIE['password']);
        							$usrquery = $mysqli->query("SELECT * FROM `accounts` WHERE `password`='$password'");
        							$usr = $usrquery->fetch_array();
        								if($usr != 0){
             								 $logged = true;
             									}
    									}
    										$uID = $usr['id'];
    										$timey = time();
    											$mysqli->query("UPDATE `accounts` SET `status`='$timey' WHERE `id`='$uID'");
    											if(time() - $usr['status'] > 5) {
    												$mysqli->query("UPDATE `accounts` SET `isstatus`='true' WHERE `id`='$uID'");
    											}else{	
    											$mysqli->query("UPDATE `accounts` SET `isstatus`='false' WHERE `id`='$uID'");
    											}
    											
    											
				if(!$usr['banned'] == "1"){
					header('Location: index.php');
				}else{
							

?>
<html>
	<head>
		<title>Rainway</title>
		<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		<!-- <script src="/snowstorm.js"></script> -->
		<link rel="stylesheet" type="text/css" href="/major.css">
	</head>
	<body>
	    	<br><br><br>
    		<div class="lander">
    			<h1> You are banned. </h1> <br />
    			
			<center><table style="border:0px solid black;" width="50%" bordercolor="000" width="100%" cellpadding="3" cellspacing="3">
				<tr>
					<td><b>For:</b></td>
					<td><?php echo $usr['bannedReason']; ?> <br /></td>
				</tr>
				<tr>
					<td><b>Reason:</b></td>
					<td><?php echo $usr['bannedFor']; ?> <br /></td>
				</tr>
			</table></center>
    			
    			
    			<a href="/logout.php" style="color:red;">Logout</a>
    			</div>
<?php
}
?>	
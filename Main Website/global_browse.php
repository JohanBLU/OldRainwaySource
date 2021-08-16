<?php
if($usr['Admin'] == "false"){
	header('location:/maintenance.html');
}

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
    										$timer = $timey -  $usr['status'];
    										$mysqli->query("UPDATE `accounts` SET `status`='$timey' WHERE `id`='$uID'");
    										if($timer < 20) {
    											$mysqli->query("UPDATE `accounts` SET `isstatus`='true' WHERE `id`='$uID'");
    										}
    										else{	
    											$mysqli->query("UPDATE `accounts` SET `isstatus`='false' WHERE `id`='$uID'");
    										}
    											
    											
    											
    	$numpmcheck = $mysqli->query("SELECT * FROM `messages` WHERE `toid`='$uID'");
	    $numpm = $numpmcheck->num_rows;
	    
	    $invnumpmcheck = $mysqli->query("SELECT * FROM `invitekey` WHERE `creatorid`='$uID'");
	    $invkeycount = $invnumpmcheck->num_rows;
    										
    											
    											

							

?>

<html>
    <script src="https://kit.fontawesome.com/245de4e6af.js" crossorigin="anonymous"></script>
<style>
    @import url(http://fonts.googleapis.com/css?family=Open+Sans:300);

	body {
    font-family: 'Open Sans', sans-serif;
    }
</style>
</html>
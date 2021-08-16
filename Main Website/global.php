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
    										
// Daily Currency
$now = time();
$gettc = $usr['gettc'];
$Bucks = $usr['Bucks'];
if ($now > $gettc) {
$newgettc = $now + 86400;
$BucksToAdd = 25; // Bucks to add every day - Codex
$mysqli->query("UPDATE `accounts` SET `Bucks` = '$Bucks' + '$BucksToAdd' WHERE `id`='$uID'");
$mysqli->query("UPDATE `accounts` SET `gettc` = '$newgettc' WHERE `id`='$uID'");
}
?>
<html>
	<head>
	<title>Rainway</title>
		<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		<!-- <script src="/snowstorm.js"></script> -->
        <script src="https://kit.fontawesome.com/245de4e6af.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/major.css">
		<link rel="stylesheet" type="text/css" href="/major2.css">
		<link rel="stylesheet" type="text/css" href="/major3.js">
		<script>$('button').click(function() {
    $(this).prop('disabled',true);
});</script>
<head>
	<?php
    						if($usr['banned'] == "1"){
    							header('Location: /banned.php');
    						}

    	?>
	<?php if($logged) { ?>
<div class="account-bar">
			
			<span style="position:absolute;left:15%;">
				<b>Hello,</b> <?php echo $usr['Username']; ?>!
				<a href="/Settings/">Settings</a>
				<a href="/User/">My Profile</a>
				<a href="/Account/FR/">Friend Requests</a>
				<a href="/InviteKey/">Invite Keys (<?=$invkeycount?>)</a>
				<a href="/Inbox/">Inbox (<?=$numpm?>)</a>
				<a><b><?=$usr['Bucks']?> <i class='far fa-money-bill-alt'></i></b><a> </font>
				<a href="/logout.php">Logout</a>
			</span>
			<? } ?>
			</span>
		</div>
<div class="nav">
			</span>
<img src = "/img//favicon.ico" alt = "Rainway Logo" style = "position:absolute;left:7%;width:54px;height:54px" >
					<?php if($logged) { ?>
					<span style="margin-left:300px;">
<a href="https://rainway.xyz">Home</a>
						<a href="/Games/?tab=featured">Games</a>
						<a href="/Forum/">Forum</a>
						<a href="/Browse/">Browse</a>
						<a href="/Catalog/">Catalog</a>
						<a href="/Avatar/?tab=avatar">Avatar</a>
						<a href="/Blog/">Blog</a>
						<a href="/Rules/">Rules</a>
						<a href="/ClientDownload/">Client</a>
																								<?php if($usr['Flarf'] == "true" || $usr['powerForumMod'] == "1" || $usr['powerImageMod'] == "1" || $usr['powerGlobalMod'] == "1" ) { ?>
								<a href="/Admin/" style="font-weight: bold;">Admin</a>
							<? } ?>
					<? } ?>
			</div>	
	
				<div class="shout">
				<a></a>Now you can edit your games!</a>
				</div>
			
		
</html>
		
</html>
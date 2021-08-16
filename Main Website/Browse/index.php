<?php include "../global.php"; 
$userscheck = $mysqli->query("SELECT * FROM `accounts`");
	$users = $userscheck->num_rows;
	
$onlinecheck = $mysqli->query("SELECT * FROM `accounts` WHERE `isstatus` = 'true'");
	$online = $onlinecheck->num_rows;
	
$staffcheck = $mysqli->query("SELECT * FROM `accounts` WHERE `Admnistrator` = '1'");
	$staff = $staffcheck->num_rows;
		
if($logged) { 
?> 
<html>
    <body>
          <div class="lander">
            <h1>Browse</h1>
			<p></p>Browse all current users. There are currently <b><?php echo $users; ?></b> users. | <a href='online.php'>Online Users (<?php echo $online; ?>)</a> | <a 	 href='offstaff.php'>All Staff Members (<?php echo $staff; ?>)</a> <br><br> </p>
            <iframe class="frame" src="/Browse/browse_characters.php" 
            scrolling="yes"
            class="frame"
            sandbox="allow-top-navigation allow-scripts allow-forms">
          </iframe>
	      </div>
    </body>
    <? } ?>
    <style>
    .frame{
        width: 100%;
        height: 50%;
        border: none;
    }
    </style>
</html>
<?php include "../footer.php"; ?>
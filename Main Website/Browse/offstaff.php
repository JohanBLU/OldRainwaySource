<?php include "../global.php"; 
		
	if($logged) {
		echo "<div class='lander'>
				<h1>Browse Staff</h1>
				Browse all staff. | <a href='online.php'>Online Users</a> | <a href='staff.php'Online Staff Members</a> <br><br>";
                        $result = $mysqli->query("SELECT * FROM `accounts` WHERE `administrator`='1' ORDER BY id");
						while($row = $result->fetch_array()){
				
			echo "
				<a href='/User/?id=" . $row['id'] . "'>". $row['Username'] . "</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
		}	
	?>
	
<style>
td {
border-width: 1px;
border-style: solid;
border-color: #000000;
background-color: #ffffff;
vertical-align: top;
text-align: center;
}
</style>
</div>
	<?php include "footer.php"; ?>
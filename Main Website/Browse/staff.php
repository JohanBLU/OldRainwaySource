<?php include "../global.php"; 
		
	if($logged) {
		echo "<div class='lander'>
				<h1>Browse Online Staff</h1>
				Browse all current staff online. | <a href='index.php'>All Users</a> | <a href='staff.php'>Staff Members</a><br><br>";
					$con=mysqli_connect("localhost","loriasne_user","chez1","loriasne_main");
						$result = mysqli_query($con,"SELECT * FROM accounts WHERE Admin = 'true' AND isstatus = 'true' ORDER BY id");
							while($row = mysqli_fetch_array($result))
				
			echo "
				<a href='/User/?id=" . $row['id'] . "'>". $row['username'] . "</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
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

		<?php include "../footer.php"; ?>
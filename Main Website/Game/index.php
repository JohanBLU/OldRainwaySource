<?php include "../global.php";
	$uID = $usr['id'];

$getid = $_GET['id'];
	$gamequery = $mysqli->query("SELECT * FROM `games` WHERE `id`='$getid'");
		$game = $gamequery->fetch_array();
			if($logged) {
				$uid = $usr['id'];
				$geticon = $game['icon'];
                    if(!isset($_GET['tab'])) {
                        $tab = "main";
                    }else{
                        $tab = $_GET['tab'];
                    }
            if(!$game){
				die("<div class='lander'><center>That game does not exist.</center></div>");
			}
?>
	<div class="lander">
		<h1>Games</h1>
				<table>
					<tr>
						<td style="vertical-align:text-top;padding:14px;">
							<div class="verticaloptionpanel">
							<span class="verticaltitle">Game Menu</span>
								<a class="verticaloption" href="?id=<?=$getid?>">Main</a>
								<a class="verticaloption" href="/IDE/join.php?id=<?=$getid?>">Play</a>
								<a class="verticaloption" href="?id=<?=$getid?>&tab=report">Report</a>
								<?php if($usr['id'] == $game['creatorid']){ ?>
								<a class="verticaloption last" href="/Game/Edit.php?id=<?=$getid?>">Edit</a>
								<? } ?>
						
							</div>
						</td>
							<td style="vertical-align: text-top;">
							<?php if($tab == 'main') { ?>
								<span style="float:right:width:90%;margin-right:200px;">
									<h2><?=$game['name']?></h2>
										<?=$game['description']?><br><br>by <a href="/User/?id=<?=$game['creatorid']?>"><?=$game['creatorname']?></a><br>
										<img src="/img/games/<?=$geticon?>b.png">
								</span><br><br>
										  <div style="display: inline; width: 10px; ">
            <input type="image" class="ImageButton" src="/img/games/buttons/Play.PNG" alt="Visit Online" onclick="location='/IDE/join.php?id=<?=$getid?>'">
          </div>
								<br /><br>
									<h3>Comments</h3>
										<form method="post" action="">
											<table border="0">
												<tr>
													<td><textarea class="input-texta" name="comment" rows="4" cols="40" placeholder="Type your comment here."></textarea></td>
												</tr>
											</table>
										</form>
									<? } ?>
									
									<?php if($tab == 'report') { ?>
										<h2>Report</h2>
											Report this item.
											<form method="post" action="">
												<table border="0">
													<tr>
														<td><textarea class="input-texta" name="comment" rows="4" cols="40" placeholder="Type your report here."></textarea></td>
													</tr>
													<tr>
														<td><input type="submit" class="btn" name="report" value="Report"></td>
													</tr>
												</table>
											</form>
									<? } ?>
									
									<?php if ($tab == 'sellers') { ?>
										<h2>Private Sellers</h2>
											View all private sellers.
									<? } ?>
							</td>
					</tr>
				</table>
			
	</div>
<? } ?>
</html>
	<?php include "../footer.php"; ?>
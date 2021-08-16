<?
	include "../global.php";
?>

		
		
	
<?php if($logged) { ?>
<style>
.games2 {
    background-color: #f2f2f2;
    border: 1px solid #e3e3e3;
    color: #adadad;
}</style>
	<div class="lander">
		<h1>Rainway Games Page</h1>
			Create games <a href="/Games/Compose.php">here</a>! Remember that games are self-hosted by people!
				<table>
					<tr>
						<td style="vertical-align:text-top;padding:14px;">
							<div class="verticaloptionpanel">
							<span class="verticaltitle">Filters</span>
								<a class="verticaloption" href="?tab=featured">Featured</a>
								<a class="verticaloption" href="?tab=mostplayed">Most Played</a>
								<a class="verticaloption" href="?tab=mostfavorited">Most Favorited</a>
							</div>
						</td>
							<td style="vertical-align: text-top;">
								<?php if($_GET['tab'] == 'featured') { ?>
									<h3>Featured Games</h3>
								<? } ?>
								
								<?php if($_GET['tab'] == 'mostplayed') { ?>
									<h3>Most Played Games</h3>
								<? } ?>
								
								
								<?php if($_GET['tab'] == 'mostfavorited') { ?>
									<h3>Most Favorited Games</h3>
								<? } ?>
										<?php
			$result = $mysqli->query("SELECT * FROM `games` ORDER BY id");
			while($row = $result->fetch_array()){
		    ?>
										<table style="width: 100%;">
			<tr>
				<td class="forumheader">
					<table style="width: 100%;">
						<tr>
		        <div class="GameThumbnail">
			        <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_ciGame" title="<?=$row['name']?>" href="/Game/?id=<?=$row['id']?>" style="display:inline-block;cursor:pointer;"><img src="/img/games/<?=$row['icon']?>s.png" border="0" alt="<?=$row['name']?>"></a>
		        </div>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="forumboard">
					<table style="width: 100%;">
						<tr>
<div class="GameDetails">
			        <div class="GameName"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_hlGameName" href="/Game/?id=<?=$row['id']?>"><?=$row['name']?></a></div>
			        <div class="GameLastUpdate"><span class="Label">Updated:</span> <span class="Detail">Now</span></div>
			        <div class="GameCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_hlGameCreator" href="/User/?id=<?=$row['creatorid']?>"><?=$row['creatorname']?></a></span></div>
		        </div>
						</tr>
					</table>
				</td>	
			</tr>
		</table>
		<?
		}
		?>

							</td>
					</tr>
				</table>
			
	</div>
<? } ?>
</html>
	
	</div>

<?php include "../footer.php"; ?>
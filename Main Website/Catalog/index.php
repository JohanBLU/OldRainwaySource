<?php include "../global.php";
$_GET['tab']; 
$_GET['type'];

if(!$_GET){
	header('Location: /Catalog/?tab=hats');
}
?>
<?php if($logged) { ?>
	<div class="lander">
		<h1>Catalog</h1>
			View and purchase items here.
				<table>
					<tr>
						<td style="vertical-align:text-top;padding:14px;">
							<div class="verticaloptionpanel">
							<span class="verticaltitle">Catalog Menu</span>
								<a class="verticaloption" href="?tab=hats">Hats</a>
								<a class="verticaloption" href="?tab=shirts">Shirts</a>
								<a class="verticaloption" href="?tab=t-shirts">T-Shirts</a>
								<a class="verticaloption" href="?tab=pants">Pants</a>
							<span class="verticalbreak"></span>
							<span class="verticalsmalltitle">Types</span>
								<a class="verticaloption" href="?type=limited">Limiteds</a>
							</div>
						</td>
							<td style="vertical-align: text-top;">
								<?php if($_GET['tab'] == 'hats') { ?>
									<h3>Hats</h3>
								<? } ?>
								
								<?php if($_GET['tab'] == 'shirts') { ?>
									<h3>Shirts</h3>
								<? } ?>
								
								<?php if($_GET['tab'] == 't-shirts') { ?>
									<h3>T-Shirts</h3>
								<? } ?>
								
								
								<?php if($_GET['tab'] == 'pants') { ?>
									<h3>Pants</h3>
								<? } ?>
								
								
								<?php if($_GET['type'] == 'limited') { ?>
									<h3>Limited</h3>
								<? } ?>								<?php if($_GET['tab'] == 'hats') { 

			$result = $mysqli->query("SELECT * FROM `catalog` WHERE `type`='hat' ORDER BY id");
			while($row = $result->fetch_array()){
		    ?>
										<table style="width: 100%;">
			<tr>
				<td class="forumheader">
					<table style="width: 100%;">
						<tr>
		        <div class="GameThumbnail">
			        <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_ciGame" title="<?=$row['name']?>" href="/Catalog/ViewItem.php?id=<?=$row['id']?>" style="display:inline-block;cursor:pointer;"><img src="/thumbnails/assets/<?=$row['id']?>" width="123" border="0" alt="<?=$row['name']?>"></a>
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
			        <div class="GameName"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_hlGameName" href="/Catalog/ViewItem.php?id=<?=$row['id']?>"><?=$row['name']?></a></div>
			        <div class="GameLastUpdate"><span class="Label">Updated:</span> <span class="Detail">Now</span></div>
			        <div class="GameCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_hlGameCreator" href="/User/?id=<?=$row['creatorid']?>"><?=$row['creatorname']?></a></span></div>
			        <div class="AssetFavorites"><span class="Label">Number Sold:</span> <span class="Detail"><?=$row['sold']?>     </span></div>
			        <div class="AssetFavorites"><span class="Detail"><?=$row['cost']?> <i class="far fa-money-bill-alt" aria-hidden="true"></i>    </span></div>
		        </div>
						</tr>
					</table>
				</td>	
			</tr>
		</table>
		<?
		} }
		?>
		
		
		<?php if($_GET['tab'] == 'shirts') { 

			$result = $mysqli->query("SELECT * FROM `catalog` WHERE `type`='shirt' ORDER BY id");
			while($row = $result->fetch_array()){
		    ?>
										<table style="width: 100%;">
			<tr>
				<td class="forumheader">
					<table style="width: 100%;">
						<tr>
		        <div class="GameThumbnail">
			        <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_ciGame" title="<?=$row['name']?>" href="/Catalog/ViewItem.php?id=<?=$row['id']?>" style="display:inline-block;cursor:pointer;"><img src="/thumbnails/assets/<?=$row['id']?>" width="123" border="0" alt="<?=$row['name']?>"></a>
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
			        <div class="GameName"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_hlGameName" href="/Catalog/ViewItem.php?id=<?=$row['id']?>"><?=$row['name']?></a></div>
			        <div class="GameLastUpdate"><span class="Label">Updated:</span> <span class="Detail">Now</span></div>
			        <div class="GameCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl12_hlGameCreator" href="/User/?id=<?=$row['creatorid']?>"><?=$row['creatorname']?></a></span></div>
			        <div class="AssetFavorites"><span class="Label">Number Sold:</span> <span class="Detail"><?=$row['sold']?>     </span></div>
		        </div>
						</tr>
					</table>
				</td>	
			</tr>
		</table>
		<?
		} }
		?>
								

							</td>
					</tr>
				</table>
			
	</div>
<? } ?>
</html>
	<?php include "../footer.php"; ?>
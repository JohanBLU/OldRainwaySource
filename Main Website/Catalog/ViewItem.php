<?php include "../global.php";
$tab = $_GET['tab']; 
$uID = $usr['id'];

                    if(!isset($_GET['tab'])) {
                        $tab = "main";
                    }else{
                        $tab = $_GET['tab'];
                    }

$getid = $_GET['id'];
$itemcheck = $mysqli->query("SELECT * FROM `catalog` WHERE `id`='$getid'");
$item = $itemcheck->fetch_array();
			if($logged) {
				$uid = $usr['id'];
				$geticon = $item['id'];
            if(!$item){
				die("<div class='lander'><center>That item does not exist.</center></div>");
			}
?>
<?php if($logged) { ?>
	<div class="lander">
		<h1>Catalog</h1>
				<table>
					<tr>
						<td style="vertical-align:text-top;padding:14px;">
							<div class="verticaloptionpanel">
							<span class="verticaltitle">Item Menu</span>
							    <a class="verticaloption" href="?id=<?=$getid?>&tab=main">Main</a>
								<a class="verticaloption" href="?id=<?=$getid?>&tab=purchase">Purchase</a>
								<a class="verticaloption" href="?id=<?=$getid?>&tab=report">Report</a>
								<a class="verticaloption last" href="?tab=sellers">Private Sellers</a>
								<?php if($usr['Admin'] == "true"){ ?>
								<span class="verticalbreak"></span>
								<span class="verticalsmalltitle">Moderation Related</span>
								<a class="verticaloption">Delete</a>
								<a class="verticaloption">Edit</a>
								<a class="verticaloption last">Scrub Description</a>
								<? } ?>
						
							</div>
						</td>
							<td style="vertical-align: text-top;">
							<?php if($tab == 'main') { ?>
								<span style="float:right:width:90%;margin-right:200px;">
									<h2><?=$item['name']?></h2>by  <a href="/User/?id=<?=$item['creatorid']?>"><?=$item['creatorname']?></a><br><br>
										<?=$item['description']?>
								</span><br>
								<img src="/thumbnails/assets/<?=$item['id']?>" width="234">
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
									
									<?php if($tab == 'purchase') { 
$Bucks = $usr['Bucks'];
$cost = $item['cost'];
$type = $item['type'];
$checkbuy = $mysqli->query("SELECT * FROM `owneditems` WHERE `ownerid`=".$usr["id"]." AND `itemid`='$getid'");
if($checkbuy->num_rows < 1){
if($_POST["buy"]){
if($Bucks >= $cost) {
$mysqli->query("INSERT INTO `owneditems` (`itemid`, `ownerid`, `type`) VALUES ('$getid',  '$usr[id]', '$type')");
$mysqli->query("UPDATE `accounts` SET `Bucks`='$Bucks' - '$cost' WHERE `id`='$uID'");
$mysqli->query("UPDATE `catalog` SET `sold`=`sold` + 1 WHERE `id`='$getid'");
die("<META http-equiv=refresh content=1;URL=/>");
} 
}
}
?>
										<h2>Purchase</h2>
										<?php
										if($checkbuy->num_rows < 1){
										?>
											Are you sure you want to purchase <b><?=$item['name']?></b> for <b><?=$item['cost']?>?</b><br><br>
										<form method="post" action="">
										<input type="submit" value="Yes" name="buy" class="btn"></form><?php
										if($Bucks < $cost) { 
										    echo"<a>You are poor and you are not affording this item, xd!</a>";
										} ?>
										<?php }else{ ?>
										<a>You have already bought this item!</a>
										<?	} } ?>
									
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
<? } } ?>
</html>
	<?php include "../footer.php"; ?>
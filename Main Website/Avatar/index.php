<?php include "../global.php";
$tab = $_GET['tab'];
$uid = $usr['id'];
if(!$_GET){
	header('Location: /Avatar/?tab=avatar');
}
if($logged) { ?>
	<div class="lander">
		<h1>Character Customizer</h1>
				<table>
					<tr>
						<td style="vertical-align:text-top;padding:14px;">
							<div class="verticaloptionpanel">
							<span class="verticaltitle">Item Menu</span>
								<a class="verticaloption" href="?tab=avatar">Avatar</a>
								<a class="verticaloption" href="?tab=hats">Hats</a>
								<a class="verticaloption" href="?tab=shirts">Shirts</a>
								<a class="verticaloption" href="?tab=t-shirts">T-Shirts</a>
								<a class="verticaloption" href="?tab=pants">Pants</a>
								<a class="verticaloption last" href="?tab=wearing">Currently Wearing</a>
						
							</div>
						</td>
							<td style="vertical-align: text-top;">
							    <?php if($tab == 't-shirts') { 
							    echo"<a>Nothing.</a>";
							    } ?>
							    <?php if($tab == 'pants') { 
							    echo"<a>Nothing.</a>";
							    } ?>
							<?php if($tab == 'avatar') { ?>
								<span style="float:right:width:90%;margin-right:200px;">
									<h2>Avatar</h2><br><br>
<iframe allowtransparency scrolling="no" frameborder="no" src="/core/character.php?id=<?=$usr['id']?>" width="200" height="225"></iframe>						
								</span>
								<br /><br>
									<h4>Something wrong with your avatar? <a href="/Avatar/?tab=avatar">Click here to re-draw it!</a></h4>
									<? } ?>
									
									<?php if($tab == 'hats') { ?>
										<h2>Hats</h2>
<?php  
$iwquery = $mysqli->query("SELECT * FROM `owneditems` WHERE `ownerid`='$uid' AND `type`='hat'");
if($iwquery->num_rows == "0"){
echo"<a>Nothing</a>";
}
?>
										<style>.Asset {
    float: left;
    margin: 5px 7px 5px 0px;
    text-align: left;
    vertical-align: top;
    width: 112px;
}</style>
										<?php
			$uid = $usr['id'];
			$result = $mysqli->query("SELECT * FROM `owneditems` WHERE `ownerid`='$uid' AND `type`='hat'");
			while($row = $result->fetch_array()){
			   $getid = $row["itemid"];
			   	$userquery = $mysqli->query("SELECT * FROM `catalog` WHERE `id`='$getid'");
		$user = $userquery->fetch_array();
		$type = $user['type'];
		if($_POST["wear$getid"]){
if($row) {
if($result->num_rows > 0){
$hat = $usr['hat'];
$hatid = $getid;
if($hat < 1){
if($type == "hat") {
$mysqli->query("UPDATE `accounts` SET `hat`='$hatid' WHERE `id`='$uid'");
die("<META http-equiv=refresh content=1;URL=/Avatar/?tab=hats>");
}
}
}
}
}
		    ?>
<script>$('button').click(function() {
    $(this).prop('disabled',true);
});</script>
<div class="Asset">
<div class="AssetDetails">
    <form method="post" action="">
    <input type="submit" class="btn" name="wear<?=$getid?>" value="Wear">
    </form>
    <img src="/thumbnails/inventory/<?=$row['itemid']?>" width="123">
<div class="AssetName">
<a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl0_ctl00_AssetNameHyperLink" title="click to view" class="notranslate" href="/Catalog/ViewItem.php?id=<?=$user['id']?>"><?=$user['name']?></a>
</div>
<div class="AssetType">
<span class="Label">by <a href="/User/?id=<?=$user['creatorid']?>"><?=$user['creatorname']?></a></span><br>
<span class="Label">Type:</span> <span class="Detail">
<?=$type?>
</span>
</div>
</div>
</div>
									<? } } ?>
<?php if($tab == 'shirts') { ?>
										<h2>Shirts</h2>
<?php  
$iwquery = $mysqli->query("SELECT * FROM `owneditems` WHERE `ownerid`='$uid' AND `type`='shirt'");
if($iwquery->num_rows == "0"){
echo"<a>Nothing</a>";
}
?>
										<style>.Asset {
    float: left;
    margin: 5px 7px 5px 0px;
    text-align: left;
    vertical-align: top;
    width: 112px;
}</style>
										<?php
			$uid = $usr['id'];
			$result = $mysqli->query("SELECT * FROM `owneditems` WHERE `ownerid`='$uid' AND `type`='shirt'");
			while($row = $result->fetch_array()){
			   $getid = $row["itemid"];
			   	$userquery = $mysqli->query("SELECT * FROM `catalog` WHERE `id`='$getid'");
		$user = $userquery->fetch_array();
		$type = $user['type'];
		if($_POST["wear$getid"]){
if($row) {
if($result->num_rows > 0){
$shirt = $usr['shirt'];
$shirtid = $getid;
if($shirt < 1){
if($type == "shirt") {
$mysqli->query("UPDATE `accounts` SET `shirt`='$shirtid' WHERE `id`='$uid'");
die("<META http-equiv=refresh content=1;URL=/Avatar/?tab=shirts>");
}
}
}
}
}
		    ?>
<script>$('button').click(function() {
    $(this).prop('disabled',true);
});</script>
<div class="Asset">
<div class="AssetDetails">
    <form method="post" action="">
    <input type="submit" class="btn" name="wear<?=$getid?>" value="Wear">
    </form>
    <img src="/thumbnails/inventory/<?=$row['itemid']?>" width="123">
<div class="AssetName">
<a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl0_ctl00_AssetNameHyperLink" title="click to view" class="notranslate" href="/Catalog/ViewItem.php?id=<?=$user['id']?>"><?=$user['name']?></a>
</div>
<div class="AssetType">
<span class="Label">by <a href="/User/?id=<?=$user['creatorid']?>"><?=$user['creatorname']?></a></span><br>
<span class="Label">Type:</span> <span class="Detail">
<?=$type?>
</span>
</div>
</div>
</div>
									<? } } ?>
									
									<?php if ($tab == 'wearing') { ?>
										<h2>Currently Wearing</h2>
										<?php  
$userhat = $usr['hat'];
if($userhat > 0) {
$fixid = $usr['hat'];
}else{
$fixid = "1";   
}
$usershirt = $usr['shirt'];
if($usershirt > 0) {
$fixshirt = $usr['shirt'];
}else{
$fixshirt = "1";   
}

$invquery = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$uid' AND `hat`='$fixid'");
$weartest = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$uid' AND `shirt`='$fixid'");
if($invquery->num_rows == "0" && $fixshirt->num_rows == "0"){
echo"<a>Nothing</a>";
}
										?>
																				<style>.Asset {
    float: left;
    margin: 5px 7px 5px 0px;
    text-align: left;
    vertical-align: top;
    width: 112px;
}</style>
										<?php
			$uid = $usr['id'];
			$result = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$uid' AND `hat`='$fixid'");
			while($row = $result->fetch_array()){
			   $getid = $row["hat"];
$userquery = $mysqli->query("SELECT * FROM `catalog` WHERE `id`='$getid'");
$user = $userquery->fetch_array();
$usridl = $user['id'];
$typen = $user['type'];;
if($_POST["remove$usridl$typen"]){
if($row) {
if($result->num_rows > 0){
$BigHead = $usr['hat'];
$hatid = $row['itemid'];
$shirt = $usr['shirt'];
if($BigHead > 0){
if($typen == "hat") {
$mysqli->query("UPDATE `accounts` SET `hat`='0' WHERE `id`='$uid'");
die("<META http-equiv=refresh content=1;URL=/Avatar/?tab=wearing>");
}
}
if($shirt > 0){
if($typen == "shirt") {
$mysqli->query("UPDATE `accounts` SET `shirt`='0' WHERE `id`='$uid'");
die("<META http-equiv=refresh content=1;URL=/Avatar/?tab=wearing>");
}
}
}
}
}
		    ?>
<script>$('button').click(function() {
    $(this).prop('disabled',true);
});</script>
<div class="Asset">
<div class="AssetDetails">
    <form method="post" action="">
    <input type="submit" class="btn" name="remove<?=$user['id']?><?=$typen?>" value="Remove">
    </form>
    <img src="/thumbnails/inventory/<?=$user['id']?>" width="123">
<div class="AssetName">
<a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl0_ctl00_AssetNameHyperLink" title="click to view" class="notranslate" href="/Catalog/ViewItem.php?id=<?=$user['id']?>"><?=$user['name']?></a>
</div>
<div class="AssetType">
<span class="Label">by <a href="/User/?id=<?=$user['creatorid']?>"><?=$user['creatorname']?></a></span><br>
<span class="Label">Type:</span> <span class="Detail">
<?=$typen?>
</span>
</div>
</div>
</div>
									<? }  ?>
<?php
			$uid = $usr['id'];
			$result = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$uid' AND `shirt`='$fixshirt'");
			while($row = $result->fetch_array()){
			   $getid = $row["shirt"];
$userquery = $mysqli->query("SELECT * FROM `catalog` WHERE `id`='$getid'");
$user = $userquery->fetch_array();
$usridl = $user['id'];
$typen = $user['type'];;
if($_POST["remove$usridl$typen"]){
if($row) {
if($result->num_rows > 0){
$BigHead = $usr['hat'];
$hatid = $row['itemid'];
$shirt = $usr['shirt'];
if($BigHead > 0){
if($typen == "hat") {
$mysqli->query("UPDATE `accounts` SET `hat`='0' WHERE `id`='$uid'");
die("<META http-equiv=refresh content=1;URL=/Avatar/?tab=wearing>");
}
}
if($shirt > 0){
if($typen == "shirt") {
$mysqli->query("UPDATE `accounts` SET `shirt`='0' WHERE `id`='$uid'");
die("<META http-equiv=refresh content=1;URL=/Avatar/?tab=wearing>");
}
}
}
}
}
		    ?>
<script>$('button').click(function() {
    $(this).prop('disabled',true);
});</script>
<div class="Asset">
<div class="AssetDetails">
    <form method="post" action="">
    <input type="submit" class="btn" name="remove<?=$user['id']?><?=$typen?>" value="Remove">
    </form>
    <img src="/thumbnails/inventory/<?=$user['id']?>" width="123">
<div class="AssetName">
<a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsListView_ctrl0_ctl00_AssetNameHyperLink" title="click to view" class="notranslate" href="/Catalog/ViewItem.php?id=<?=$user['id']?>"><?=$user['name']?></a>
</div>
<div class="AssetType">
<span class="Label">by <a href="/User/?id=<?=$user['creatorid']?>"><?=$user['creatorname']?></a></span><br>
<span class="Label">Type:</span> <span class="Detail">
<?=$typen?>
</span>
</div>
</div>
</div>
									<? } } ?>

							</td>
					</tr>
				</table>
			
	</div>
<? } ?>
</html>
	<?php include "../footer.php"; ?>
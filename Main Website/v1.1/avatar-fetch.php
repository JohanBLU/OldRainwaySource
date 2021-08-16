<?php
$getid = $_GET['id'];

	$mysqli = new mysqli("server306.web-hosting.com","rainmfma_rainway","H[-&6tapRsY0","rainmfma_database");
		global $mysqli;	

$charactercheck = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$getid'");
$avatar = $charactercheck->fetch_array();
// EEEEEEEEEE - Codex
if($avatar['hat'] == "1"){
    echo"http://www.rn1host.ml/Assets/hats/Bighead.rbxm;";
}
<?php
// PLEASE NEVER EDIT THAT SCRIPT, FIRST ASK ME - Codex
include "../global.php";
$getid = $_GET['id'];
$userquery = $mysqli->query("SELECT * FROM `games` WHERE `id`='$getid'");
$user = $userquery->fetch_array();
if($logged) {
$ip = $user['ip']; // Frarf ip
//$ip = "127.0.0.1"; // Localhost
$port = $user['port'];
$hat = $usr['hat'];
$hatid = $usr['hat'];
$shirtid = $usr['shirt'];
$tshirtid = "0";//$usr['tshirt'];
$pantsid = "0";//$usr['pants'];
$faceid = "0";//$usr['face'];
$urrid = "0";
$stringbuild = $ip."|".$port."|".$usr['Username']."|".$urrid."|".$hatid."|".$shirtid."|".$pantsid."|".$tshirtid."|".$faceid;
$uri = "Rainway://".$stringbuild;
header("Location: $uri");
}
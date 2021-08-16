<?php
include 'global.php';
	setcookie("password", $password, time() - 24 * 60 * 60, "/");
?>

<META http-equiv="refresh" content="1;URL=index.php">

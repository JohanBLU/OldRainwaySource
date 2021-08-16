<?php
$size = $_GET['size'];
if(!isset($_GET['tab'])) {
$size = "195";
}else{
$size = $_GET['size'];
}    
$size = $_GET['size'];
$getid = $_GET['id'];

	$mysqli = new mysqli("server306.web-hosting.com","rainmfma_rainway","H[-&6tapRsY0","rainmfma_database");
		global $mysqli;	

$charactercheck = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$getid'");
$avatar = $charactercheck->fetch_array();
?>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<?
            if(!$avatar){
				die("<div style='position:absolute; width:200; height:200; z-index:5;'><img width='$size'  src='/thumbnails/fix/1'></div><img src='/img/error/error'>");
			}
// EEEEEEEEEE - Codex
// Time to use LazyLoad on the images losers - Flofy
?>
<?php
if($avatar['hat'] == "1"){
    ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/1'></div>
<? } ?>
<? if($avatar['hat'] == "2"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/2'></div>
<? } ?>
<? if($avatar['hat'] == "3"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/3'></div>
<? } ?>
<? if($avatar['hat'] == "4"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/4'></div>
<? } ?>
<? if($avatar['hat'] == "5"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/5'></div>
<? } ?>
<? if($avatar['hat'] == "6"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/6'></div>
<? } ?>
<? if($avatar['hat'] == "7"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/7'></div>
<? } ?>
<? if($avatar['shirt'] == "8"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/8'></div>
<? } ?>
<? if($avatar['shirt'] == "9"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/9'></div>
<? } ?>
<? if($avatar['hat'] == "10"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/10'></div>
<? } ?>
<? if($avatar['hat'] == "11"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/11'></div>
<? } ?>
<? if($avatar['hat'] == "12"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/12'></div>
    <? } ?>
    <? if($avatar['hat'] == "13"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/13'></div>
        <? } ?>
    <? if($avatar['hat'] == "14"){ ?>
    <div style='position:absolute; width:200; height:200; z-index:5;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/fix/1'></div>
    <div style='position:absolute; width:200; height:200; z-index:4;'><img class="lazyload" width='<?=$size?>'  data-src='/thumbnails/avatar/14'></div>
<? } ?>
<div style='width:200; height:200; z-index:0;'><img class="lazyload" width='<?=$size?>' data-src='/img/character.png'></div>
<script>
lazyload();
</script>
<?php 
include "../global_browse.php"; 
$result = $mysqli->query("SELECT * FROM `accounts` WHERE `banned`='0' ORDER BY id");
while($row = $result->fetch_array()){
?>
<ul>
<span style="float:left;margin-right:1px;"><iframe allowtransparency scrolling="no" frameborder="no" src="/core/character.php?id=<?=$row['id']?>" width="200" height="200"></iframe></span>	
<span style="float:left;text-align:left;width:300px;min-height:200px;max-height:400px;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<a target="_top" href='/User/?id=<?php echo $row["id"] ?>' > <?php echo $row["Username"]; ?></a>
</ul>
<? } ?>
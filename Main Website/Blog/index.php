<?php
	include "../global.php";
?>

<div class="lander">
	<h1>Website Blog</h1>
	
	<?php 
		if($usr['Admin'] == true){
	?>
		<a href="/Blog/Create.php" class="btn">Create</a> 
		<a href="/Blog/Admin.php" class="btn">Your Blog Posts</a> |
	<?php
		}
	?>
		<a href="/Blog/Archive.php" class="btn">Archive</a>
		<a href="/Blog/?view=list" class="btn">List View</a>
		<a href="/Blog/?view=overall" class="btn">Overall View</a>

		<br /><br />

	<table style="width: 100%;">
		<tr>
			<td style="padding: 12px; border-right: 2px solid #E0E0E0;">
				<img src="http://placehold.it/110x150" style="margin-bottom: 5px;"><br>
				Blogpost by Flarf
			</td>
			<td style="padding: 12px;">
				<h3>Post title</h3>
				Testing lol. <br><br>
				Obama.
			</td>
		</tr>
	</table>
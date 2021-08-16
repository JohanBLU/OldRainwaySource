<?php include "global.php"; 
	/* $emails = $result = mysqli_query($con,"SELECT `email` FROM accounts"); 
?>
<?php
	$to = "$emails";
		$subject = "Rainway - Donations";
			$message = "We rely on user donations to stay afloat. Today, you can go to http://www.rainway.xyz/donate.php and
			send your own donation in. This helps keep our servers running and allows us to present you with the best
			experience possible. Donate today and experience Rainway in a new way - with lightning fast server speeds
			afforded by your generous donations. Donators will recieve two special items.";
				$from = "support@rainway.xyz";
					$headers = "From:" . $from;
						mail($to,$subject,$message,$headers);
							echo "Mail Sent.";
*/
?>
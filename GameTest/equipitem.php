<?php
session_start();
include_once("connect.php");

$wepid = $_REQUEST["wepid"];

		$dotaz_item = "SELECT * FROM game_items WHERE id=$wepid limit 1";
		$result_item = mysqli_query($conn, $dotaz_item);
		
			if (mysqli_num_rows($result_item) > 0) {
			while ($row_item = mysqli_fetch_assoc($result_item)) {
				
				$id = $row_item["userid"];
				$slot = $row_item["slot"];
				$username = $row_item["username"];
				$itemname = $row_item["itemname"];
				$equiped = $row_item["equiped"];
				
					if($equiped == 1){
					echo $itemname." už máš na sobě.";
					}
					
					if($equiped == 0){
							//check jestli na sobě už něco nemáš
								if($slot == "weapon/melee" || $slot == "weapon/ranged"){
									// jeste 1 zjisti jestli je z databaze equipnuta nejak zbran, jestli je tak nic, pokud neni tak oblec
									$dotaz_itemeq = "SELECT * FROM game_items WHERE slot='$slot' AND equiped=1 AND userid='$id' limit 1";
								} 
								else 
								{
									$dotaz_itemeq = "SELECT * FROM game_items WHERE slot='$slot' AND equiped=1 AND userid='$id' limit 1";
								}
							
							
							$result_itemeq = mysqli_query($conn, $dotaz_itemeq);
		
							$rowcount=mysqli_num_rows($result_itemeq);
							echo $rowcount;
							if ($rowcount > 0) {
								echo "už na sobě něco máš!";
								}
							if($rowcount == 0) {
								$dotaz_update = "UPDATE game_items SET equiped=1 WHERE id='$wepid' limit 1";
								$result_update = mysqli_query($conn, $dotaz_update);
								}
								
				}
			}
		}
		header("Location:profilitems.php?id=$id");

?>
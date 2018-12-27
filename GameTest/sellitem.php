<?php
session_start();
include_once("connect.php");

$id = $_SESSION["id"];
$itemid = $_REQUEST["itemid"];

$lokace = $_REQUEST["lokace"];
$zona   = $_REQUEST["zona"];

//selectnu item z databaze

$dotaz_items = "SELECT * FROM game_items WHERE userid='$id' AND id='$itemid'";
$result_items = mysqli_query($conn, $dotaz_items);
		
		if (mysqli_num_rows($result_items) > 0) {
		while ($row_items = mysqli_fetch_assoc($result_items)) {
			
			$dotaz_client = "SELECT * FROM game_client WHERE id='$id'";
			$result_client = mysqli_query($conn, $dotaz_client);
		
			if (mysqli_num_rows($result_client) > 0) {
			while ($row_client = mysqli_fetch_assoc($result_client)) {
				
			$currency = $row_client["currency"];
						
			$itemid = $row_items["id"];
			$gold = $row_items["gold"];
			
			$rozdil = $currency + $gold;
			
			echo $rozdil;
			
			//znicim item a dam goldy uzivateli
			
			$update = "UPDATE game_client SET currency='$rozdil' WHERE id='$id'";
			$vysledek_update = mysqli_query($conn, $update);
			
			$delete = "DELETE FROM game_items WHERE id='$itemid'";
			$vysledek_delete = mysqli_query($conn, $delete);
			
			
			}	
		}
	}
}

header("Location:shop.php?lokace=$lokace&zona=$zona&trading");

?>
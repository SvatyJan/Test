<?php
session_start();
include_once("connect.php");

$wepid = $_REQUEST["wepid"];

		$dotaz_item = "UPDATE game_items SET equiped=0 WHERE id='$wepid'";
		$result_item = mysqli_query($conn, $dotaz_item);
		
		$dotaz_id = "SELECT * FROM game_items WHERE id='$wepid' limit 1";
		$result_id = mysqli_query($conn, $dotaz_id);
		
			while ($row_id = mysqli_fetch_assoc($result_id)) {
				$id = $row_id["userid"];
				
				echo $id;
			}
		
		header("Location:profilitems.php?id=$id");

			

?>
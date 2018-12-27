<?php
session_start();
include_once("connect.php");

$tveid = $_SESSION["id"];
$id = $_REQUEST["id"]; // id typka co te pozval

//echo $tveid.$id;

				$dotaz = "SELECT * FROM game_friends WHERE userid1='$id' AND userid2='$tveid' AND friends='0' LIMIT 1";
				$result = mysqli_query($conn, $dotaz);
		
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					
					$update = "UPDATE game_friends SET friends = 1 WHERE userid1='$id' AND userid2='$tveid' AND friends='0'";
					$vysledek = mysqli_query($conn, $update);
		
					}
				} else {
				echo "Zadna pozvanka neexistuje.";
				}
				
header("Location:profilfriends.php?id=$tveid");


?>
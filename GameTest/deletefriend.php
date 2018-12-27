<?php
session_start();
include_once("connect.php");

$tveid = $_SESSION["id"];
$id = $_REQUEST["id"]; // id typka co te pozval

echo $id;

				$dotaz = "DELETE FROM game_friends WHERE userid1='$id' AND userid2='$tveid' AND friends='1' OR userid2='$id' AND userid1='$tveid' AND friends='1' LIMIT 1;";
				$result = mysqli_query($conn, $dotaz);
				
header("Location:profilfriends.php?id=$tveid");


?>
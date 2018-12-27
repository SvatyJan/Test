<?php
session_start();
include_once("connect.php");

$tveid = $_SESSION["id"];
$id = $_REQUEST["id"]; // id typka co te pozval

				$dotaz = "DELETE FROM game_friends WHERE userid1='$id' AND userid2='$tveid' AND friends='0' LIMIT 1;";
				$result = mysqli_query($conn, $dotaz);
				
header("Location:profilfriends.php?id=$tveid");


?>
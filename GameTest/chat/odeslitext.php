<?php

session_start();
include_once("../connect.php");

$idhrace 	= $_SESSION["id"];
$username 	= $_SESSION["login"];
$text 		= $_POST["text"];

$text = htmlspecialchars($text);
$text = trim($text);





$dotaz_client = "SELECT * FROM game_client WHERE username='$username' LIMIT 1";
$result_client = mysqli_query($conn,$dotaz_client);

if (mysqli_num_rows($result_client) > 0) {
while ($row_client = mysqli_fetch_assoc($result_client)) {
	
	$race = $row_client["race"];
	$race = strtolower($race);
	//echo $race;
		
	}
}

//echo $username." says: ".$text;

$udelej = "INSERT INTO game_chat (username,idhrace,race,text) VALUES ('$username','$idhrace','$race','$text')";
$result_udelej = mysqli_query($conn,$udelej);

header("Location: ../index.php");


?>
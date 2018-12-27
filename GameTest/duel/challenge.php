<?php
session_start();
include_once("../connect.php");


$id1 = $_REQUEST["id1"]; //tveid;
$id2 = $_REQUEST["id2"]; //nepratelskeid;

$dotazprvni = "SELECT * FROM game_client WHERE id='$id1'";
$resultprvni = mysqli_query($conn, $dotazprvni);
		
		if (mysqli_num_rows($resultprvni) > 0) {
			while ($rowprvni = mysqli_fetch_assoc($resultprvni)) {
				
				$id1 = $rowprvni["id"];
				$username1 = $rowprvni["username"];
			}
		}
		
$dotazdruhy = "SELECT * FROM game_client WHERE id='$id2'";
$resultdruhy = mysqli_query($conn, $dotazdruhy);
		
		if (mysqli_num_rows($resultdruhy) > 0) {
			while ($rowdruhy = mysqli_fetch_assoc($resultdruhy)) {
				
				$id2 = $rowdruhy["id"];
				$username2 = $rowdruhy["username"];
								
			}
		}
		
$zeptejse = "SELECT * FROM game_challenge WHERE challengerid1='$id1' OR challengerid2='$id1'";
$resultzeptejse = mysqli_query($conn,$zeptejse);
if (mysqli_num_rows($resultzeptejse) > 0) {
	
	header("Location: ../profil.php?id=$id2&challenged");
	echo "Already challenged";	
}
else {
	
$vlozit 	= "INSERT INTO game_challenge (challenger1,challengerid1,challenger2,challengerid2) VALUES ('$username1','$id1','$username2','$id2')";
$vloz 	= mysqli_query($conn,$vlozit);
header("Location: ../profil.php?id=$id2");
}


?>
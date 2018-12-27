<?php
session_start();
include_once("connect.php");

//sem půjde ještě ochrana

$username = $_REQUEST["username"];

//selectnu všechno z party kde jsem

	$vysledek = mysqli_query($conn,"SELECT * FROM game_party WHERE leader='$username' OR leader='$username' OR second='$username' OR third='$username' OR forth='$username' OR fifth='$username'");
	if (mysqli_num_rows($vysledek) > 0) {
		while ($row = mysqli_fetch_assoc($vysledek)) {
			
			$leader 	= $row["leader"];
			$second 	= $row["second"];
			$third 	= $row["third"];
			$forth	= $row["forth"];
			$fifth 	= $row["fifth"];
			
			$partyid = $row["id"];
			
			if($_SESSION["login"] == $leader || $username == $_SESSION["login"])
			{
			
			//echo $partyid;
			
			//removnu typka z party
			
			if($username == $leader)	{$dotaz = "DELETE FROM game_party WHERE leader='$username' LIMIT 1";}
			if($username == $second)	{$dotaz = "UPDATE game_party set second='' WHERE id='$partyid'";}
			if($username == $third)		{$dotaz = "UPDATE game_party set third='' WHERE id='$partyid'";}
			if($username == $forth)		{$dotaz = "UPDATE game_party set forth='' WHERE id='$partyid'";}
			if($username == $fifth)		{$dotaz = "UPDATE game_party set fifth='' WHERE id='$partyid'";}
			
			$result = mysqli_query($conn, $dotaz);
			
			}
		}
	}
header("Location:index.php");
?>
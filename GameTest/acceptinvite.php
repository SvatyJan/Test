<?php
session_start();
include_once("connect.php");

$tvejmeno = $_SESSION["login"];
$tveid = $_SESSION["id"];

$kdopozval = $_REQUEST["kdopozval"];

//podivam se jestli je pozvanka
//pokud je pozvanka tak pridam do party a smazu pozvanku

$pozvanka = "SELECT * FROM game_invites WHERE username1='$kdopozval' AND username2='$tvejmeno' LIMIT 1";
$resultpozvanka = mysqli_query($conn,$pozvanka);

if (mysqli_num_rows($resultpozvanka) > 0) {
		
	$partyselect = "SELECT * FROM game_party WHERE leader='$kdopozval' OR second='$kdopozval' OR third='$kdopozval' OR forth='$kdopozval' OR fifth='$kdopozval' LIMIT 1";
	$resultpartyselect = mysqli_query($conn,$partyselect);
	
	if (mysqli_num_rows($resultpartyselect) > 0) {
	while ($row = mysqli_fetch_assoc($resultpartyselect)) {
	$idparty = $row["id"];
	$leader 	= $row["leader"];
	$second 	= $row["second"];
	$third 	= $row["third"];
	$forth 	= $row["forth"];
	$fifth 	= $row["fifth"];
					
	$misto = "";
					
	if($leader == ""){$misto = "leader";}
	elseif($second == ""){$misto = "second";}
	elseif($third == ""){$misto = "third";}
	elseif($forth == ""){$misto = "forth";}
	elseif($fifth == ""){$misto = "fifth";}
	else{echo "party is full";}
	
	$jsivparte = "SELECT * FROM game_party WHERE leader='$tvejmeno' OR second='$tvejmeno' OR third='$tvejmeno' OR forth='$tvejmeno' OR fifth='$tvejmeno' LIMIT 1";
	$resultjsivparte = mysqli_query($conn,$jsivparte);
	if (mysqli_num_rows($resultjsivparte) > 0) {
		echo "Uz jsi v parte!";
		$smazu = "DELETE FROM game_invites WHERE username1='$kdopozval' AND username2='$tvejmeno'";
		$resultsmazu = mysqli_query($conn, $smazu);
	}
	else
	{
	$pridam = "UPDATE game_party SET $misto='$tvejmeno' WHERE id='$idparty'";
	$resultpridam = mysqli_query($conn, $pridam);
	
	$smazu = "DELETE FROM game_invites WHERE username1='$kdopozval' AND username2='$tvejmeno'";
	$resultsmazu = mysqli_query($conn, $smazu);
	}	
	
		}
	}
}

header("Location:profilmailbox.php?id='$tveid'");
?>
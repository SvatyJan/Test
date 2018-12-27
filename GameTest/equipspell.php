<?php
session_start();
include_once("connect.php");

$id = $_SESSION["id"];

$position 	= $_REQUEST["position"];
$spellname 	= $_REQUEST["spellname"];
$icon 		= $_REQUEST["icon"];

echo $position."<br>".$spellname."<br>".$icon."<br>".$id."<br><br>";

			$dotaz_spellbar = "SELECT * FROM game_spellbar WHERE userid='$id' LIMIT 1";
			$result_spellbar = mysqli_query($conn, $dotaz_spellbar);
		
			if (mysqli_num_rows($result_spellbar) > 0) {
			while ($row_spellbar = mysqli_fetch_assoc($result_spellbar)) {
			
			$username	= $row_spellbar["username"];
			$passive 	= $row_spellbar["passive"];
			$first 		= $row_spellbar["first"];
			$second 		= $row_spellbar["second"];
			$third 		= $row_spellbar["third"];
			$ultimate 	= $row_spellbar["ultimate"];
			
			$icon1			= $row_spellbar["icon1"];
			$icon2			= $row_spellbar["icon2"];
			$icon3			= $row_spellbar["icon3"];
			$icon4			= $row_spellbar["icon4"];
			$icon5			= $row_spellbar["icon5"];
			
			echo $first."lol";
			
				//passivka
				if($position == "passive" && $passive == ""){
				$update_passive = "UPDATE game_spellbar SET passive = '$spellname' , icon1 = '$icon' WHERE userid='$id'";
				$result_update_passive = mysqli_query($conn, $update_passive);
				echo "updatuju passivku";
				}
				
				//razeni
				if($position == "any" && $first == "" && $second != $spellname && $third != $spellname){
				$update_first = "UPDATE game_spellbar SET first='$spellname' , icon2 = '$icon' WHERE userid='$id'";
				$result_update_first = mysqli_query($conn, $update_first);
				echo "updatuju prvni";
				} elseif($position == "any" && $second == "" && $first != $spellname && $third != $spellname) {
				$update_second = "UPDATE game_spellbar SET second = '$spellname' , icon3 = '$icon' WHERE userid='$id'";
				$result_update_second = mysqli_query($conn, $update_second);
				echo "updatuju druhe";
				} elseif($position == "any" && $third == "" && $first != $spellname && $second != $spellname) {
				$update_third = "UPDATE game_spellbar SET third = '$spellname' , icon4 = '$icon' WHERE userid='$id'";
				$result_update_third = mysqli_query($conn, $update_third);
				echo "updatuju treti";
				} else {
					echo "Všechno je plné.";
				}
								
				//pokud je ultimatka
				if($position == "ultimate" && $ultimate == ""){
				$update_ultimate = "UPDATE game_spellbar SET ultimate = '$spellname' , icon5 = '$icon' WHERE userid='$id'";
				$result_update_ultimate = mysqli_query($conn, $update_ultimate);
				echo "updatuju ultimatku";
				}
			
			}
		}
		header("Location:profillibrary.php?id=$id");
?>
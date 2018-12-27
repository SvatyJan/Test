<?php
session_start();
include_once("connect.php");

$id = $_SESSION["id"];

$dotaz = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
$result = mysqli_query($conn, $dotaz);
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				
				$dotaz_stats = "SELECT * FROM game_stats WHERE userid='$id' LIMIT 1";
				$resultstats = mysqli_query($conn, $dotaz_stats);
		
				if (mysqli_num_rows($resultstats) > 0) {
					while ($row_stats = mysqli_fetch_assoc($resultstats)) {
				
				$xp = $row["xp"];
				$level = $row["level"];
				
				$lvlup = $level+1;
				
				$hp = $row_stats["hp"];
				$armor = $row_stats["armor"];
				$magicresist = $row_stats["magicresist"];
				$basedmg = $row_stats["basedmg"];
				$str = $row_stats["str"];
				$agi = $row_stats["agi"];
				$intel = $row_stats["intel"];		
				
				$hpup = $hp + 5;
				$armorup = $armor + 1;	
				$magicresistup = $magicresist + 1;
				$basedmgup = $basedmg+5;
				$strup = $str + 1;
				$agiup = $agi + 1;
				$intelup = $intel + 1;
				
				
				
				if($xp >= ($level * 100)){
				//smaze xp a zvetsi lvl
				$update = "UPDATE game_client SET xp=0, level='$lvlup' WHERE userid='$id'";
				$update_result = mysqli_query($conn, $update);
				
				
				
				$updatestats = "UPDATE game_stats SET hp='$hpup', armor='$armorup', magicresist='$magicresistup', basedmg='$basedmgup', str='$strup', agi='$agiup', intel='$intelup' WHERE userid='$id'";
				$updatestats_result = mysqli_query($conn, $updatestats);
				
				}
				
				
					}
				}
			}
		}
		
header("Location:profil.php?id=$id");

?>
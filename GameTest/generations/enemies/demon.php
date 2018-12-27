<?php

$id 			= "4";
$enemyname 	= "Demon";

//$level depends on player's lvl

$hp 			= 160;
$armor		= 14;
$mr			= 12;
$basedmg		= 72;

$str			= 10;
$agi			= 13;
$intel		= 12;

$icon			= "img/enemies/demon.png";


$passive			= "Demonology";
$atbtype1		= "passive";
$effect1 		= "Demon will gain 5 health for every attack he does";
$ultimate1		= "0";
$icon1			= "img/spells/warlock-eye.png";

$first			= "Shadow Grasp";
$atbtype2		= "Agility";
$effect2 		= "Demon deals 60 + (60% agility, 40% inteligence) dmg to the target (is doublestrike)";
$ultimate2		= "0";
$icon2			= "img/spells/shadow-grasp.png";

$second			= "Enhanced Claw";
$atbtype3		= "Inteligence";
$effect3 		= "Demon buffs himself with enhanced claws gaining him + 10 (30% inteligence) dmg and doublestrike";
$ultimate3		= "0";
$icon3			= "img/spells/moon-claws.png";

$third			= "Flamin Claw";
$atbtype4		= "Inteligence";
$effect4 		= "Demon hits enemy with Flaming Claw dealing 50 + (60% inteligence)";
$ultimate4		= "0";
$icon4			= "img/spells/flaming-claw.png";

$ultimate		= "Bat Wing";
$atbtype5		= "Inteligence";
$effect5 		= "Demon will regenerate himself with bat wings healing him for 30 + (30% agility)";
$ultimate5		= "1";
$icon5			= "img/spells/bat-wing.png";


		$dotaz_enemies = "SELECT * FROM game_enemies WHERE name='$enemyname' LIMIT 1";
		$result_enemies = mysqli_query($conn, $dotaz_enemies);
		
			if (mysqli_num_rows($result_enemies) == 0) {
				
				$insert_enemies = "INSERT INTO game_enemies (name,hp,armor,magicresist,basedmg,str,agi,intel,passive,first,second,third,ultimate,icon) 
				VALUES ('$enemyname','$hp','$armor','$mr','$basedmg','$str','$agi','$intel','$passive','$first','$second','$third','$ultimate','$icon')";
				$result_insertenemies = mysqli_query($conn, $insert_enemies);
				
				
				$insert_enemyspells = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$passive','$atbtype1','$effect1','$ultimate1','$icon1')";
				$result_enemyspells = mysqli_query($conn, $insert_enemyspells);
				
				$insert_enemyspells2 = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$first','$atbtype2','$effect2','$ultimate2','$icon2')";
				$result_enemyspells2 = mysqli_query($conn, $insert_enemyspells2);
				
				$insert_enemyspells3 = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$second','$atbtype3','$effect3','$ultimate3','$icon3')";
				$result_enemyspells3 = mysqli_query($conn, $insert_enemyspells3);
				
				$insert_enemyspells4 = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$third','$atbtype4','$effect4','$ultimate4','$icon4')";
				$result_enemyspells4 = mysqli_query($conn, $insert_enemyspells4);
				
				$insert_enemyspells5 = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$ultimate','$atbtype5','$effect5','$ultimate5','$icon5')";
				$result_enemyspells5 = mysqli_query($conn, $insert_enemyspells5);
				
			} else {
			//echo "$enemyname is already in database";echo "<br>";
			}
		
		$dotaz_Espellbar = "SELECT * FROM game_enemyspellbar WHERE name='$enemyname' LIMIT 1";
		$result_Espellbar = mysqli_query($conn, $dotaz_Espellbar);
		if (mysqli_num_rows($result_Espellbar) == 0) {
			
			$enemyspellbar = "INSERT INTO game_enemyspellbar (name,passive,first,second,third,ultimate,icon1,icon2,icon3,icon4,icon5) VALUES
			 ('$enemyname','$passive', '$first' , '$second' , '$third', '$ultimate' , '$icon1','$icon2','$icon3','$icon2','$icon5')";
			 
			$result_enemyspellbar = mysqli_query($conn,$enemyspellbar);
			
		} else {
			//echo "$enemyname spells are already in database";echo "<br>";
		}

?>
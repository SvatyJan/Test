<?php

//slime
$id 			= "1";
$enemyname 		= "Slime";

//$level depends on player's lvl

$hp 			= 200;
$armor		= 10;
$mr			= 10;
$basedmg		= 60;

$str			= 10;
$agi			= 10;
$intel		= 10;

$icon			= "img/enemies/slime.png";


$passive			= "Slime Durability";
$atbtypep		= "passive";
$effectp 		= "Slime will grant + 15 Armor and 15 Magic Resist";
$ultimatep		= "0";
$iconp			= "img/enemies/slime.png";

//1st 2nd 3rd
$first			= "Punch";
$atbtype1		= "Strength";
$effect1 		= "Slime will grant + 15 Armor and 15 Magic Resist";
$ultimate1		= "0";
$icon1			= "img/spells/punch.png";

$ultimate		= "Grow up";
$atbtype2		= "Strength";
$effect2			= "Slime will grow up + 50health.";
$ultimate2		= "1";
$icon2			= "img/spells/foam.png";


		$dotaz_enemies = "SELECT * FROM game_enemies WHERE name='$enemyname' LIMIT 1";
		$result_enemies = mysqli_query($conn, $dotaz_enemies);
		
			if (mysqli_num_rows($result_enemies) == 0) {
				
				$insert_enemies = "INSERT INTO game_enemies (name,hp,armor,magicresist,basedmg,str,agi,intel,passive,first,second,third,ultimate,icon) 
				VALUES ('$enemyname','$hp','$armor','$mr','$basedmg','$str','$agi','$intel','$passive','$first','$first','$first','$ultimate','$icon')";
				$result_insertenemies = mysqli_query($conn, $insert_enemies);
				
				
				$insert_enemyspells = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$passive','$atbtypep','$effectp','$ultimatep','$iconp')";
				$result_enemyspells = mysqli_query($conn, $insert_enemyspells);
				
				$insert_enemyspells2 = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$first','$atbtype1','$effect1','$ultimate1','$icon1')";
				$result_enemyspells2 = mysqli_query($conn, $insert_enemyspells2);
				
				$insert_enemyspells3 = "INSERT INTO game_enemylibrary (spellname,atbtype,effect,ultimate,icon) 
				VALUES ('$ultimate','$atbtype2','$effect2','$ultimate2','$icon2')";
				$result_enemyspells3 = mysqli_query($conn, $insert_enemyspells3);
				
		} else {
			//echo "$enemyname is already in database";echo "<br>";
			}
		
		$dotaz_Espellbar = "SELECT * FROM game_enemyspellbar WHERE name='$enemyname' LIMIT 1";
		$result_Espellbar = mysqli_query($conn, $dotaz_Espellbar);
		if (mysqli_num_rows($result_Espellbar) == 0) {
			
			$enemyspellbar = "INSERT INTO game_enemyspellbar (name,passive,first,second,third,ultimate,icon1,icon2,icon3,icon4,icon5) VALUES
			 ('$enemyname','$passive', '$first' , '$first' , '$first', '$ultimate' , '$iconp','$icon1','$icon1','$icon1','$icon2')";
			 
			$result_enemyspellbar = mysqli_query($conn,$enemyspellbar);
			
		} else {
			//echo "$enemyname spells are already in database";echo "<br>";
		}

?>
<?php

$id 			= "2";
$enemyname 	= "Harpy";

//$level depends on player's lvl

$hp 			= 180;
$armor		= 6;
$mr			= 6;
$basedmg		= 75;

$str			= 10;
$agi			= 12;
$intel		= 10;

$icon			= "img/enemies/harpy.png";


$passive			= "Harpys Agility";
$atbtype1		= "passive";
$effect1 		= "Harpy will gain 5 agility";
$ultimate1		= "0";
$icon1			= "img/spells/freedom-dove.png";

$first			= "Swipe";
$atbtype2		= "Agility";
$effect2 		= "Harpy will hit with her claws dealing 40 + (80% agility)";
$ultimate2		= "0";
$icon2			= "img/spells/bird-limb.png";

$second			= "Sharp";
$atbtype3		= "Agility";
$effect3 		= "Harpy will sharp her feathers granting her + 10 damage";
$ultimate3		= "0";
$icon3			= "img/spells/feather.png";

$ultimate		= "Wing Slash";
$atbtype5		= "Agility";
$effect5 		= "Harpy will slash with her wings dealing 100 damage to her target and ";
$ultimate5		= "1";
$icon5			= "img/spells/feathered-wing.png";


		$dotaz_enemies = "SELECT * FROM game_enemies WHERE name='$enemyname' LIMIT 1";
		$result_enemies = mysqli_query($conn, $dotaz_enemies);
		
			if (mysqli_num_rows($result_enemies) == 0) {
				
				$insert_enemies = "INSERT INTO game_enemies (name,hp,armor,magicresist,basedmg,str,agi,intel,passive,first,second,third,ultimate,icon) 
				VALUES ('$enemyname','$hp','$armor','$mr','$basedmg','$str','$agi','$intel','$passive','$first','$second','$first','$ultimate','$icon')";
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
			 ('$enemyname','$passive', '$first' , '$second' , '$first', '$ultimate' , '$icon1','$icon2','$icon3','$icon2','$icon5')";
			 
			$result_enemyspellbar = mysqli_query($conn,$enemyspellbar);
			
		} else {
			//echo "$enemyname spells are already in database";echo "<br>";
		}

?>
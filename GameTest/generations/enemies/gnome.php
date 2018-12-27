<?php

$id 			= "3";
$enemyname 	= "Gnome";

//$level depends on player's lvl

$hp 			= 140;
$armor		= 18;
$mr			= 20;
$basedmg		= 55;

$str			= 10;
$agi			= 10;
$intel		= 12;

$icon			= "img/enemies/gnome.png";


$passive			= "Thorn Aura";
$atbtype1		= "passive";
$effect1 		= "Gnome will return 5% of attacker's damage as magic damage";
$ultimate1		= "0";
$icon1			= "img/spells/thornaura.png";

$first			= "Water bolt";
$atbtype2		= "Inteligence";
$effect2 		= "Gnome will deal 70 + (80% inteligence)";
$ultimate2		= "0";
$icon2			= "img/spells/water-bolt.png";

$second			= "Energy Beam";
$atbtype3		= "Inteligence";
$effect3 		= "Gnome will Deal 60 + (100% inteligence) to target and 20 + (100% inteligence) to others around him";
$ultimate3		= "0";
$icon3			= "img/spells/energy-beam.png";

$third			= "Wrath";
$atbtype4		= "Inteligence";
$effect4 		= "Gnome will burst enemy with 50 + (50% inteligence) and heals himself for 50 + (50% inteligence)";
$ultimate4		= "0";
$icon4			= "img/spells/feather.png";

$ultimate		= "Cherish";
$atbtype5		= "Inteligence";
$effect5 		= "Gnome will heal the lowest party member with 100 + (20% inteligence)";
$ultimate5		= "1";
$icon5			= "img/spells/cherish.png";


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
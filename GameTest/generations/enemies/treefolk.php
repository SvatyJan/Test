<?php

$id 			= "3";
$enemyname 	= "Treefolk";

//$level depends on player's lvl

$hp 			= 220;
$armor		= 25;
$mr			= 25;
$basedmg		= 40;

$str			= 20;
$agi			= 5;
$intel		= 18;

$icon			= "img/enemies/treefolk.png";


$passive			= "Thorn Aura";
$atbtype1		= "passive";
$effect1 		= "Treefolk will return 5% of attacker's damage as magic damage";
$ultimate1		= "0";
$icon1			= "img/spells/thornaura.png";

$first			= "Ent Bite";
$atbtype2		= "Strength";
$effect2 		= "Treefolk will bite an enemy for 50 + (100% strength)";
$ultimate2		= "0";
$icon2			= "img/spells/ent-mouth.png";

$second			= "Nourish";
$atbtype3		= "Inteligence";
$effect3 		= "Treefolk buffs himself or ally with 10 magic resist and 10 armor and heals for 30 + (60% inteligence)";
$ultimate3		= "0";
$icon3			= "img/spells/leaf-swirl.png";

$third			= "Stomp";
$atbtype4		= "Strength";
$effect4 		= "Treefolk stomps an enemy with 80 + (80% strength) and others around him with 20 + (20% strength)";
$ultimate4		= "0";
$icon4			= "img/spells/stomp.png";

$ultimate		= "Cherish";
$atbtype5		= "Inteligence";
$effect5 		= "Treefolk will heal the lowest party member with 100 + (20% inteligence)";
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
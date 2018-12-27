<?php
include("../connect.php");

$spellname	= "Strike"; 																//	jmeno kouzla
$atbtype 	= "Strength"; 																// do jake atributy (passive,prvni,druhe,treti,ultimate)
$effect 		= "Strike an enemy with 70 base dmg + (50% strength)"; 			// co to kouzlo delas
$icon 		= "strike.png";																// ikona
$Strike = array($spellname,$atbtype,$effect,$icon);

$dotaz1 = "INSERT INTO game_library (userid, spellname,atbtype,effect,ultimate,icon) VALUES ('1','$spellname','$atbtype','$effect','0','$icon');";
$result1 = mysqli_query($conn, $dotaz1);

$spellname	= "Slash";
$atbtype 	= "Agility";
$effect 		= "Slash an enemy with 55 base dmg + (80% agility)";
$icon 		= "slash.png";
$Slash = array($spellname,$atbtype,$effect,$icon);

$dotaz2 = "INSERT INTO game_library (userid, spellname,atbtype,effect,ultimate,icon) VALUES ('1','$spellname','$atbtype','$effect','0','$icon');";
$result2 = mysqli_query($conn, $dotaz2);

$spellname	= "Overload";
$atbtype 	= "Intelect";
$effect 		= "Throw unstable bolt on enemy 50 base dmg + (100% intelect)";
$icon 		= "overload.png";
$Overload = array($spellname,$atbtype,$effect,$icon);

$dotaz3 = "INSERT INTO game_library (userid, spellname,atbtype,effect,ultimate,icon) VALUES ('1','$spellname','$atbtype','$effect','0','$icon');";
$result3 = mysqli_query($conn, $dotaz3);

$spellname	= "Overload";
$atbtype 	= "Intelect";
$effect 		= "Throw unstable bolt on enemy 10 base dmg + (100% intelect)";
$icon 		= "overload.png";
$Overload = array($spellname,$atbtype,$effect,$icon);

$dotaz4 = "INSERT INTO game_library (userid, spellname,atbtype,effect,ultimate,icon) VALUES ('1','$spellname','$atbtype','$effect','0','$icon');";
$result4 = mysqli_query($conn, $dotaz4);

$spellname	= "Wave Crush";
$atbtype 	= "Intelect";
$effect 		= "Crushes target enemy for 120 base dmg + (60% intelect)";
$icon 		= "wave-crush.png";
$Overload = array($spellname,$atbtype,$effect,$icon);

//test
$dotaz5 = "INSERT INTO game_library (userid, spellname,atbtype,effect,ultimate,icon) VALUES ('1','$spellname','$atbtype','$effect','1','$icon');";
$result5 = mysqli_query($conn, $dotaz5);

?>
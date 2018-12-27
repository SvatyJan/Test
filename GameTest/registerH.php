<?php 
	$email 			= htmlspecialchars($_POST["email"]);
	$username 		= htmlspecialchars($_POST["username"]);
	$password 		= htmlspecialchars($_POST["password"]);
	$password2 		= htmlspecialchars($_POST["password2"]);
	$race				= htmlspecialchars($_POST["race"]);

	include_once "connect.php";

	$email 			= mysqli_real_escape_string($conn, $email);
	$username 		= mysqli_real_escape_string($conn, $username);
	$password 		= mysqli_real_escape_string($conn, $password);
	$password2 		= mysqli_real_escape_string($conn, $password2);
	$race 			= mysqli_real_escape_string($conn, $race);
	
	$username 		= trim($username);
	
	
	

	$icon 		= "default.png";
	$level 		= 1;

	$dotaz 	= "SELECT * FROM game_users WHERE username = '$username'";
	$result	= mysqli_query($conn, $dotaz);
	
	if (mysqli_num_rows($result) > 0)
	{
		$rowcount = mysqli_num_rows($result);
		header("location:register.php?zabrane");
	}
	else
	{
		$vlozeni = "INSERT INTO `game_users` (username, password, email, icon ) 
					VALUES ('$username', '$password', '$email', '$icon')";

		if (!mysqli_query($conn, $vlozeni))
		{
			echo "Chyba: ".mysqli_error();
		}
		
		$userid = "";
		
		$chciuserid = "SELECT * FROM game_users WHERE username = '$username'";
		$hodmiuserid	= mysqli_query($conn, $chciuserid);
		if(mysqli_num_rows($hodmiuserid) > 0){
			while($row = mysqli_fetch_assoc($hodmiuserid)){
				$userid = $row["id"];
				}			
			}
		
		$currency = 0;
		$irlcurrency = 0;
		$xp = 0;
		$onjourney = 0;
		$honor = 0;
		$hodnost = 0;
		$color = "black";
		$level = 1;

		$vlozeni2 = "INSERT INTO `game_client` (userid,username, currency, irlcurrency, xp, level, race,location,zone,onjourney) 
					VALUES ('$userid','$username', '$currency','$irlcurrency', '$xp', '$level','$race','modralokace','5', '$onjourney')";

		if (!mysqli_query($conn, $vlozeni2))
		{
			echo "Chyba: ".mysqli_error();
		}
		
		$spellname = "";
		$effect = "";
		$icon = "";
		$atbtype = "passive";
		
		if($race == "Merfolk"){$spellname="Goldfinder";}
		if($race == "Silvanian"){$spellname="Tribe Mastery";}
		if($race == "Aviumal"){$spellname="Wings";}		
		
		if($race == "Merfolk"){$effect="5% more Gold";}
		if($race == "Silvanian"){$effect="7% more Resources";}
		if($race == "Aviumal"){$effect="10% faster travelling";}
		
		if($race == "Merfolk"){$icon="Goldfinder.png";}
		if($race == "Silvanian"){$icon="tribe-mastery.png";}
		if($race == "Aviumal"){$icon="Wings.png";}	
		
		$vlozeni3 = "INSERT INTO `game_library` (userid,username, spellname, atbtype, effect, icon) 
					VALUES ('$userid','$username', '$spellname', '$atbtype', '$effect', '$icon')";

		if (!mysqli_query($conn, $vlozeni3))
		{
			echo "Chyba: ".mysqli_error();
		}
		
		$vlozeni4 = "INSERT INTO `game_spellbar` (userid,username, passive, icon1) 
					VALUES ('$userid','$username', '$spellname', '$icon')";
//<VLOZENI ZAKLADNICH KOUZEL>					
$spellname	= "Strike"; 																//	jmeno kouzla
$atbtype 	= "Strength"; 																// do jake atributy (passive,prvni,druhe,treti,ultimate)
$effect 		= "Strike an enemy with 50 base dmg + (50% strength)"; 			// co to kouzlo delas
$icon 		= "strike.png";																// ikona
$Strike = array($spellname,$atbtype,$effect,$icon);

$dotaz1 = "INSERT INTO game_library (userid,username,spellname,atbtype,effect,ultimate,icon) VALUES ('$userid','$username','$spellname','$atbtype','$effect','0','$icon');";
$result1 = mysqli_query($conn, $dotaz1);

$spellname	= "Slash";
$atbtype 	= "Agility";
$effect 		= "Slash an enemy with 20 base dmg + (80% agility)";
$icon 		= "slash.png";
$Slash = array($spellname,$atbtype,$effect,$icon);

$dotaz2 = "INSERT INTO game_library (userid,username,spellname,atbtype,effect,ultimate,icon) VALUES ('$userid','$username','$spellname','$atbtype','$effect','0','$icon');";
$result2 = mysqli_query($conn, $dotaz2);

$spellname	= "Overload";
$atbtype 	= "Intelect";
$effect 		= "Throw unstable bolt on enemy 10 base dmg + (100% intelect)";
$icon 		= "overload.png";
$Overload = array($spellname,$atbtype,$effect,$icon);

$dotaz3 = "INSERT INTO game_library (userid,username,spellname,atbtype,effect,ultimate,icon) VALUES ('$userid','$username','$spellname','$atbtype','$effect','0','$icon');";
$result3 = mysqli_query($conn, $dotaz3);
//</VLOZENI ZAKLADNICH KOUZEL>		

		if (!mysqli_query($conn, $vlozeni4))
		{
			echo "Chyba: ".mysqli_error();
		}
		
		$hp = 300;
		$armor = 10;
		$magicresist = 10;
		$basedmg = 60;
		$str = 5;
		$agi = 5;
		$intel = 5;

		$vlozeni5 = "INSERT INTO `game_stats` (userid, username, hp, armor, magicresist, basedmg, str, agi, intel) 
					VALUES ('$userid','$username', '$hp', '$armor', '$magicresist', '$basedmg', '$str', '$agi', '$intel')";

		if (mysqli_query($conn, $vlozeni5))
		{
			header("Location: index.php?uspech");
		}
		else
		{
			echo "Chyba: ".mysqli_error();
		}
	}
?>
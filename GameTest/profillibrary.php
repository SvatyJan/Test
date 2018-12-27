<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
$id = $_REQUEST["id"];

if($id != $_SESSION["id"]){
header("Location:index.php");
}

?>

<div class="main">
<?php
include_once("inc/profilmenu.php");
?>
<?php
$wepurl = "";

$dotaz = "SELECT * FROM game_users WHERE id='$id' LIMIT 1";
		$result = mysqli_query($conn, $dotaz);
		
			if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					
					$dotaz_client = "SELECT * FROM game_client WHERE id='$id' LIMIT 1";
					$result_client = mysqli_query($conn, $dotaz_client);
		
						if (mysqli_num_rows($result_client) > 0) {
						while ($row_client = mysqli_fetch_assoc($result_client)) {		
						
						$race = $row_client["race"];
						$race = strtolower($race);	
				
				$username = $row["username"];
				$icon = $row["icon"];
				
				if($icon == "default.png"){
					$src = "img/icons/".$icon;
					} else {
					$src = "img/".$race."/".$icon;	
					}			
				
				echo "<img class='hlavnifotka' style='border:5px solid white;' src='$src'>";
				echo "<br>";
				echo "<strong>$username</strong>";
				echo "<br>";
				echo "<br>";
				
					$dotaz_items = "SELECT * FROM game_items WHERE username='$username'";
					$result_items = mysqli_query($conn, $dotaz_items);
		
						if (mysqli_num_rows($result_items) > 0) {
						while ($row_items = mysqli_fetch_assoc($result_items)) {
							
						$slot = $row_items["slot"];
						$equiped = $row_items["equiped"];
						$wepicon = $row_items["icon"];
						
						if($slot == "weapon/ranged" && $equiped == 1 || $slot == "weapon/melee" && $equiped == 1) {
						$wepurl = "img/items/".$slot."/".$wepicon;
							}
						
						
						
					}
				}	
			}
		}
	}
} /*else {
header("Location:index.php");	
	}*/

		$dotaz_spellbar = "SELECT * FROM game_spellbar WHERE userid='$id' LIMIT 1";
		$result_spellbar = mysqli_query($conn, $dotaz_spellbar);
		
			if (mysqli_num_rows($result_spellbar) > 0) {
			while ($row_spellbar = mysqli_fetch_assoc($result_spellbar)) {
				$id 			= $row_spellbar["userid"];
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
				
				$url1 = "img/spells/".$icon1;
				$url2 = "img/spells/".$icon2;
				$url3 = "img/spells/".$icon3;
				$url4 = "img/spells/".$icon4;
				$url5 = "img/spells/".$icon5;
				
			}
		}
		
$passiveurl = "img/spells/cross-mark.png";
		
if($wepurl == ""){$wepurl = "img/spells/punch.png";}
echo "<div class='spellpositions' style=''>";
if($passive == ""){echo "<div class='spellctverecek' style='background-image:url($passiveurl)'></div>";}
else {echo "<a href='unequipspell.php?position=1'><div class='spellctverecek' style='background-image:url($url1)'></div></a>";}
if($first == ""){echo "<div class='spellctverecek' style='background-image:url($wepurl)'></div>";}
else {echo "<a href='unequipspell.php?position=2'><div class='spellctverecek' style='background-image:url($url2)'></div></a>";}
if($second == ""){echo "<div class='spellctverecek' style='background-image:url($wepurl)'></div>";}
else {echo "<a href='unequipspell.php?position=3'><div class='spellctverecek' style='background-image:url($url3)'></div></a>";}
if($third == ""){echo "<div class='spellctverecek' style='background-image:url($wepurl)'></div>";}
else {echo "<a href='unequipspell.php?position=4'><div class='spellctverecek' style='background-image:url($url4)'></div></a>";}
if($ultimate == ""){echo "<div class='spellctverecek' style='background-image:url($wepurl)'></div>";}
else {echo "<a href='unequipspell.php?position=5'><div class='spellctverecek' style='background-image:url($url5)'></div></a>";}
echo "</div>";
echo "<br>";
echo "<br>";

echo "<a href='profillibrary.php?id=$id&collection=general'><button>General</button></a>";
echo "<a href='profillibrary.php?id=$id&collection=warrior-standard'><button>Warrior Standard</button></a>";
echo "<a href='profillibrary.php?id=$id&collection=warden-standard'><button>Warden Standard</button></a>";
echo "<a href='profillibrary.php?id=$id&collection=wizzard-standard'><button>Wizzard Standard</button></a>";

@$collection = $_REQUEST["collection"];

if(isset($collection)){
@include("generations/kolekce/$collection.php");
}



?>
<br>
<br>
<br>
</div>
<?php
include_once("inc/pata.php");
?>
</div>
</body>
</html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
$id = $_REQUEST["id"];
?>

<div class="main">
<?php
include_once("inc/profilmenu.php");
?>

<?php
$dotaz = "SELECT * FROM game_users WHERE id=$id LIMIT 1";
		$result = mysqli_query($conn, $dotaz);
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					
					$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
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

			}
		}
	}
}
?>
<hr>
<p style="font-size: 38px;">Codex</p>

<?php
// JMENO, PlayerIcon, HP, ARMOR, MR , DMG, STR, AGI, INTEL | WEAPON(ranged/melee) | passive , first ,second ,third, ultimate , icon1 , icon2 , icon3 , icon4 , icon5
//   0  , 	1			2,    3	 , 4  , 5  , 6  ,  7 ,  8    | 			9				 |    10    ,   11   ,  12    , 13  ,   14	  ,  15   , 16   , 17    ,18   ,  19


include_once("generations/enemies/enemies.php");

echo "<table class='codex'>";

$radkovani = 0;

for($i = 0; $i < count($enemies);$i++ ) {
if($radkovani == 0){echo "<tr>";}

echo "<td>";
echo "<div class='codex-text-nadpis'><strong>".$enemies[$i][0]."</strong></div><br>";
echo "<div class='codex-text'>".$enemies[$i][20]."</div>";
echo "<div class='codex-enemy' style='background-image:url(img/enemies/".$enemies[$i][1].")'> </div>";
echo "<div class='codex-enemy-spellbar'>";
echo "<div class='codex-enemy-spell' style='background-image:url(img/spells/".$enemies[$i][15].")'> </div>";
echo "<div class='codex-enemy-spell' style='background-image:url(img/spells/".$enemies[$i][16].")'> </div>";
echo "<div class='codex-enemy-spell' style='background-image:url(img/spells/".$enemies[$i][17].")'> </div>";
echo "<div class='codex-enemy-spell' style='background-image:url(img/spells/".$enemies[$i][18].")'> </div>";
echo "<div class='codex-enemy-spell' style='background-image:url(img/spells/".$enemies[$i][19].")'> </div>";
echo "</div>";
echo "</td>";

$radkovani++;
if($radkovani == 2){echo "</tr>";$radkovani = 0;}
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
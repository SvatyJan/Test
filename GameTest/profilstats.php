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
				$username = $row["username"];
				$icon = $row["icon"];
				
				$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
				$result_client = mysqli_query($conn, $dotaz_client);
		
				if (mysqli_num_rows($result_client) > 0) {
				while ($row_client = mysqli_fetch_assoc($result_client)) {		
						
				$currency = $row_client["currency"];
				$race = $row_client["race"];		
				
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
				
		$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
		$result_client = mysqli_query($conn, $dotaz_client);
		
		if (mysqli_num_rows($result_client) > 0) {
			while ($row_client = mysqli_fetch_assoc($result_client)) {
				
		$dotaz_stats = "SELECT * FROM game_stats WHERE id=$id LIMIT 1";
		$result_stats = mysqli_query($conn, $dotaz_stats);
		
		if (mysqli_num_rows($result_stats) > 0) {
			while ($row_stats = mysqli_fetch_assoc($result_stats)) {
				
							$currency	= $row_client["currency"];
							$irlcurr		= $row_client["irlcurrency"];
							$xp			= $row_client["xp"];
							$level		= $row_client["level"];
							$race			= $row_client["race"];
							$onjourney	= $row_client["onjourney"];
							$honor		= $row_client["honor"];
							
							$username	= $row_stats["username"];
							$hp			= $row_stats["hp"];
							$armor		= $row_stats["armor"];
							$magicresist= $row_stats["magicresist"];
							$basedmg		= $row_stats["basedmg"];
							$str			= $row_stats["str"];
							$agi			= $row_stats["agi"];
							$intel		= $row_stats["intel"];
							
							echo "<br><hr><br>";							
							echo "<center><table style='width:50%;'>";	
							
							echo "<tr>";
							echo "<th>Race</th>";
							echo "<td>$race</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Level</th>";
							echo "<td>$level</td>";
							echo "</tr>";		
													
							echo "<tr>";
							echo "<th>Experience</th>";
							echo "<td>".$xp."/".($level * 100)."</td>";
							if($id == $_SESSION["id"] && $xp >= ($level * 100)){
							echo "<td><a href='levelup.php'><strong>Level up</strong></a></td>";}
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Honor</th>";
							echo "<td>$honor</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th><hr></th>";
							echo "<td><hr></td>";
							if($_SESSION["id"] == $row["id"]){
							echo "<td><hr></td>";
							}
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Health</th>";
							echo "<td>$hp</td>";
							if($_SESSION["id"] == $row["id"]){
							echo "<form method='POST' action='profilstats.php?id=$id'>";
							echo "<td><input class='statup' name='hpup' type='submit' value='+'></td>";
							echo "</form>";	
							}
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Armor</th>";
							echo "<td>$armor</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Magic Resist</th>";
							echo "<td>$magicresist</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Damage</th>";
							echo "<td>$basedmg</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Strength</th>";
							echo "<td>$str</td>";
							if($_SESSION["id"] == $row["id"]){
							echo "<form method='POST' action='profilstats.php?id=$id'>";
							echo "<td><input class='statup' name='strup' type='submit' value='+'></td>";
							echo "</form>";							
							}
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Agility</th>";
							echo "<td>$agi</td>";
							if($_SESSION["id"] == $row["id"]){
							echo "<form method='POST' action='profilstats.php?id=$id'>";
							echo "<td><input class='statup' name='agiup' type='submit' value='+'></td>";
							echo "</form>";	
							}
							echo "</tr>";
							
							echo "<tr>";
							echo "<th>Intelect</th>";
							echo "<td>$intel</td>";
							if($_SESSION["id"] == $row["id"]){
							echo "<form method='POST' action='profilstats.php?id=$id'>";
							echo "<td><input class='statup' name='intelup' type='submit' value='+'></td>";
							echo "</form>";	
							}
							echo "</tr>";
							
							echo "</table></center>";		
							
								if(isset($_POST["hpup"])){
								$basehp = 300;
								$hpperlvl = 5;
								
								$actualnibasehp = ($basehp + ($hpperlvl * ($level - 1)));
								$cost = (($hp - $actualnibasehp) / 5) * 5;
								
								$hpplus = $hp + $hpperlvl;

								echo "cost ".$cost."<br>";
								
										if($cost <= $currency){
											$hpup = "UPDATE game_stats SET hp='$hpplus' WHERE username='$username' LIMIT 1";
											$result_hpup = mysqli_query($conn, $hpup);
											
											$moneyminus = $currency - $cost;
											
											$moneydown = "UPDATE game_client SET currency='$moneyminus' WHERE username='$username' LIMIT 1";
											$result_moneydown = mysqli_query($conn, $moneydown);
											}
										elseif($cost > $currency) {
											echo "Not enough gold";
											}
								//echo ((350 - 300) / 5);
								
								// = kolikrat uz jsem to vymaxoval,protoze se scaluje o 5								
								//stoji 5 goldu za lvl
								
								
								}
								
								if(isset($_POST["strup"])){
								$basestr = 5;
								$strperlvl = 1;
								
								$actualnibasestr = ($basestr + ($strperlvl * ($level - 1)));
								$cost = (($str - $actualnibasestr)) * 10;
								$strplus = $str + $strperlvl;
								echo "cost ".$cost."<br>";
											if($cost <= $currency){
											$strup = "UPDATE game_stats SET str='$strplus' WHERE username='$username' LIMIT 1";
											$result_strup = mysqli_query($conn, $strup);
											
											$moneyminus = $currency - $cost;
											
											$moneydown = "UPDATE game_client SET currency='$moneyminus' WHERE username='$username' LIMIT 1";
											$result_moneydown = mysqli_query($conn, $moneydown);
											}
										elseif($cost > $currency) {
											echo "Not enough gold";
											}
											
								}
								
								if(isset($_POST["agiup"])){
								$baseagi = 5;
								$agiperlvl = 1;
								
								$actualnibaseagi = ($baseagi + ($agiperlvl * ($level - 1)));
								$cost = (($agi - $actualnibaseagi)) * 10;
								$agiplus = $agi + $agiperlvl;
								echo "cost ".$cost."<br>";
											if($cost <= $currency){
											$agiup = "UPDATE game_stats SET agi='$agiplus' WHERE username='$username' LIMIT 1";
											$result_agiup = mysqli_query($conn, $agiup);
											
											$moneyminus = $currency - $cost;
											
											$moneydown = "UPDATE game_client SET currency='$moneyminus' WHERE username='$username' LIMIT 1";
											$result_moneydown = mysqli_query($conn, $moneydown);
											}
										elseif($cost > $currency) {
											echo "Not enough gold";
											}
								}
								
								if(isset($_POST["intelup"])){
								$baseintel = 5;
								$intelperlvl = 1;
								
								$actualnibaseintel = ($baseintel + ($intelperlvl * ($level - 1)));
								$cost = (($intel - $actualnibaseintel)) * 10;
								$intelplus = $intel + $intelperlvl;
								echo "cost ".$cost."<br>";
											if($cost <= $currency){
											$intelup = "UPDATE game_stats SET intel='$intelplus' WHERE username='$username' LIMIT 1";
											$result_intelup = mysqli_query($conn, $intelup);
											
											$moneyminus = $currency - $cost;
											
											$moneydown = "UPDATE game_client SET currency='$moneyminus' WHERE username='$username' LIMIT 1";
											$result_moneydown = mysqli_query($conn, $moneydown);
											}
										elseif($cost > $currency) {
											echo "Not enough gold";
											}
								}		
							
									}
								}
							}
						}
					}
				}				
			}
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
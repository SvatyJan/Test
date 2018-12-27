<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
$id = $_SESSION["id"];
?>

<div class="main">
<!-- load game_users a game_client hrace(id) -->
<?php
		$wepurl = "";

		$dotaz = "SELECT * FROM game_users WHERE id=$id LIMIT 1";
		$result = mysqli_query($conn, $dotaz);
		
			if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					
					$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
					$result_client = mysqli_query($conn, $dotaz_client);
					
						if (mysqli_num_rows($result_client) > 0) {
						while ($row_client = mysqli_fetch_assoc($result_client)) {		
						
						$race = $row_client["race"];		
				
				$username = $row["username"];
				$icon = $row["icon"];
				
					if($icon == "default.png"){
					$src = "img/icons/".$icon;
					} else {
					$src = "img/".$race."/".$icon;	
					}
					
				//ty
				echo "<div class='levo' style='display:block;'>";
				
				
				
					$dotaz_stats = "SELECT * FROM game_stats WHERE userid=$id LIMIT 1";
					$result_stats = mysqli_query($conn, $dotaz_stats);
					
						if (mysqli_num_rows($result_stats) > 0) {
						while ($row_stats = mysqli_fetch_assoc($result_stats)) {
							
							$hp = $row_stats["hp"];
							$armor = $row_stats["armor"];
							$mr = $row_stats["magicresist"];
							$basedmg = $row_stats["basedmg"];
							$str = $row_stats["str"];
							$agi = $row_stats["agi"];
							$intel = $row_stats["intel"];
?>
<!-- load game_spellbar hrace(id) -->
<?php
				
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
				
				
				$dotaz_items = "SELECT * FROM game_items WHERE userid=$id AND equiped=1";
					$result_items = mysqli_query($conn, $dotaz_items);
					
						if (mysqli_num_rows($result_items) > 0) {
						while ($row_items = mysqli_fetch_assoc($result_items)) {
							$armor = $armor + $row_items["armor"];
							$mr = $mr +  $row_items["magicresist"];
							$basedmg = $basedmg + $row_items["damage"];
							$str = $str + $row_items["str"];
							$agi = $agi + $row_items["agi"];
							$intel = $intel + $row_items["intel"];
							
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
?>
<!-- Load game_enemies a jeho všechny staty a spelly -->
<?php		
					$dotaz_enemy = "SELECT * FROM game_enemies LIMIT 1";
					$result_enemy = mysqli_query($conn, $dotaz_enemy);
					
						if (mysqli_num_rows($result_enemy) > 0) {
						while ($row_enemy = mysqli_fetch_assoc($result_enemy)) {
							
							$ename = $row_enemy["name"];
							$enemyicon = $row_enemy["icon"];
							$Ehp = $row_enemy["hp"];
							$Earmor = $row_enemy["armor"];
							$EMR = $row_enemy["magicresist"];
							$Ebasedmg = $row_enemy["basedmg"];
							$Estr = $row_enemy["str"];
							$Eagi = $row_enemy["agi"];
							$Eintel = $row_enemy["intel"];
							
							$Epassive = $row_enemy["passive"];
							$Efirst	= $row_enemy["first"];
							$Esecond	= $row_enemy["second"];
							$Ethird	= $row_enemy["third"];
							$Eultimate	= $row_enemy["ultimate"];
							
					$load_enemypassive = "SELECT * FROM game_enemylibrary WHERE spellname='Slime Durability'";
					$result_enemypassive = mysqli_query($conn, $load_enemypassive);
					
						if (mysqli_num_rows($result_enemypassive) > 0) {
						while ($row_enemypassive = mysqli_fetch_assoc($result_enemypassive)) {
								
								$Epassivespellname = $row_enemypassive["spellname"];
								$Epassiveatbtype = $row_enemypassive["atbtype"];								
								$Epassiveeffect = $row_enemypassive["effect"];
								$Epassiveultimate = $row_enemypassive["ultimate"];
								$Epassiveicon = $row_enemypassive["icon"];
								
							
								}
							}
							
					$load_enemyspells = "SELECT * FROM game_enemylibrary WHERE spellname='Punch'";
					$result_enemyspells = mysqli_query($conn, $load_enemyspells);
					
						if (mysqli_num_rows($result_enemyspells) > 0) {
						while ($row_enemyspells = mysqli_fetch_assoc($result_enemyspells)) {
							
								$Espellname = $row_enemyspells["spellname"];
								$Espellatbtype = $row_enemyspells["atbtype"];								
								$Espelleffect = $row_enemyspells["effect"];
								$Espellultimate = $row_enemyspells["ultimate"];
								$Espellicon = $row_enemyspells["icon"];
							
								}
							}
							
					$load_enemyulti = "SELECT * FROM game_enemylibrary WHERE spellname='Grow up'";
					$result_enemyulti = mysqli_query($conn, $load_enemyulti);
					
						if (mysqli_num_rows($result_enemyulti) > 0) {
						while ($row_enemyulti = mysqli_fetch_assoc($result_enemyulti)) {
							
								$Eultiname = $row_enemyulti["spellname"];
								$Eultiatbtype = $row_enemyulti["atbtype"];								
								$Eultieffect = $row_enemyulti["effect"];
								$Eultiultimate = $row_enemyulti["ultimate"];
								$Eultiicon = $row_enemyulti["icon"];
							
										
										}
									}
								}
							}
						}
					}
?>
<!-- vypis kouzel -->
<?php
				
				$passiveurl = "img/Spells/cross-mark.png";
				//player
				if($wepurl == ""){$wepurl = "img/spells/punch.png";}
				echo "<img style='width:384px;height:384px;' src='$src'>";
				echo "<br>";
				
				echo "<div class='huntspellpositions' style=''>";
				if($icon1 == ""){echo "<div class='huntspellctverecek' style='background-image:url($passiveurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($url1)'></div>";}
				if($icon2 == ""){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($url2)'></div>";}
				if($icon3 == ""){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($url3)'></div>";}
				if($icon4 == ""){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($url4)'></div>";}
				if($icon5 == ""){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($url5)'></div>";}
				echo "</div>";
				echo "</div>";
				
				
				
				//enemy
				echo "<div class='pravo'>";
				echo "<img style='width:384px;height:384px;' src='$enemyicon'>";
				echo "<div class='huntspellpositions' style=''>";
				echo "<div class='huntspellctverecek' style='background-image:url($Epassiveicon)'></div>";
				echo "<div class='huntspellctverecek' style='background-image:url($Espellicon)'></div>";
				echo "<div class='huntspellctverecek' style='background-image:url($Espellicon)'></div>";
				echo "<div class='huntspellctverecek' style='background-image:url($Espellicon)'></div>";
				echo "<div class='huntspellctverecek' style='background-image:url($Eultiicon)'></div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";

?>
<!-- herni vypis -->
<?php
				
							$fight = 1;
							$round = 1;
							$rotacekouzel1 = 0;
							$rotacekouzel2 = 0;
							$kouzlo1 = "";
							$kouzlo2 = "";
							
							
				
				$number = 1;
				$hrac1 = $username;
				$hp1 = $hp;
				$armor1 = $armor;
				$mr1 = $mr;
				$dmg1 = $basedmg;
				$str1	= $str;
				$agi1	= $agi;
				$intel1	= $intel;
				
				$passive1 	= $passive;
				$first1 		= $first;
				$second1		= $second;
				$third1 		= $third;
				$ultimate1 	= $ultimate;
				
				
							$number = 2;
							$hrac2 = $ename;
							$hp2 = $Ehp;
							$armor2 = $Earmor;
							$mr2 = $EMR;
							$dmg2 = $Ebasedmg;
							$str2 = $Estr;
							$agi2 = $Eagi;
							$intel2 = $Eintel;						
							
							$passive2 	= $Epassive;
							$first2		= $Efirst;
							$second2		= $Esecond;
							$third2		= $Ethird;
							$ultimate2	= $Eultimate;
							
							
				
				echo "<div class='mid'>";
				while($fight == 1) {
				echo "<div style='margin:0 auto;background-color:white;color:black;width:10%;height:5%;padding:14px;border-radius: 50px 20px;'><strong>Round : $rotacekouzel1</strong></div>";
				if($rotacekouzel1 == 0){$kouzlo1 = $first1;}
				if($rotacekouzel1 == 1){$kouzlo1 = $second1;}
				if($rotacekouzel1 == 2){$kouzlo1 = $third1;}
				if($rotacekouzel1 == 3){$kouzlo1 = $ultimate1;}
				
				if($rotacekouzel2 == 0){$kouzlo2 = $Efirst;}
				if($rotacekouzel2 == 1){$kouzlo2 = $Esecond;}
				if($rotacekouzel2 == 2){$kouzlo2 = $Ethird;}
				if($rotacekouzel2 == 3){$kouzlo2 = $Eultimate;}
					
				?>
				<!-- herní while cyklus-->
				<?php
				echo "<div class='combat'>";
				// kazdy hrac za kazdy kolo zahraje 1 spell
				if($hp1 > 0)
				{
					if($kouzlo1 == ""){$hp2 = $hp2 - ($basedmg);
				echo "$hrac1 has damaged ".($basedmg)." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
					
				if($kouzlo1 == "Slash"){$hp2 = $hp2 - (20 + (($agi1/100)*80));
				echo "$hrac1 has damaged ".(55 + (($agi1/100)*80))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				if($kouzlo1 == "Overload"){$hp2 = $hp2 - (10 + ($intel1));
				echo "$hrac1 has damaged ".(50 + ($intel1))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}	
							
				if($kouzlo1 == "Strike"){$hp2 = $hp2 - (50 + (($str1/100) * 50));
				echo "$hrac1 has damaged ".(70 + (($str1/100) * 50))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				if($kouzlo1 == "Wave Crush"){$hp2 = $hp2 - (120 + (($intel1/100) * 60));
				echo "$hrac1 has damaged ".(120 + (($intel1/100) * 60))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				if($kouzlo1 == "Heroic Finish"){
				$hp2 = $hp2 - (($dmg1 / 50) + 100 + (($str1/100) * 60));
				echo "$hrac1 has damaged ".($dmg1 / 50) + 100 + (($str1/100) * 60)." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				}

				if($hp2 > 0)
				{
				if($kouzlo2 == "Punch"){$hp1 = $hp1 - $dmg2;
				echo "$hrac2 has damaged ".$dmg2." $hrac1";
				echo "<br>";
				echo "$hrac1 has $hp1 health.";
				echo "<br>";}
				
				if($kouzlo2 == "Grow up"){$hp2 = $hp2 + (50);
				echo "$hrac2 has incrised his health by ".(50);
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				}
				echo "<br>";
				echo "</div>";
				
				?>
				<!-- všeobecné podmínky -->
				<?php
					
					
					if($rotacekouzel1 == 4){$rotacekouzel1 = 0;}
					if($rotacekouzel2 == 4){$rotacekouzel2 = 0;}					
					
					//hrac 1 vyhrava
					if($hp2 <= 0){$fight = 0; echo "<br><div class='combat' >$hrac1 Won!";echo "<br>";
					if($_SESSION["login"] == $hrac1){echo "<a href='generations/huntloot.php' style='color:red;'>Claim Loot!</a></div>";}}
					
					 //hrac 2 vyhrava
					if($hp1 <= 0){$fight = 0; echo "<br><div class='combat'>$hrac2 Won!";echo "<br>";
					if($_SESSION["login"] == $hrac2){echo "<a href='generations/huntloot.php' style='color:red;'>Claim Loot!</a></div>";}}
									
					if($round >= 50){$fight = 0;}
					$round++;
					$rotacekouzel1++;
					$rotacekouzel2++;
				}
				echo "</div>";
				
				
				
				
				
				
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
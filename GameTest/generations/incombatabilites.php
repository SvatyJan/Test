<?php

				/* <PLAYER SPELLS> */

				if($kouzlo1 == ""){$hp2 = $hp2 - ($basedmg);
				echo "$hrac1 has damaged ".($basedmg)." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
					
				if($kouzlo1 == "Slash"){$hp2 = $hp2 - (20 + (($agi1/100)*80));
				echo "$hrac1 has damaged ".(20 + (($agi1/100)*80))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				if($kouzlo1 == "Overload"){$hp2 = $hp2 - (10 + ($intel1));
				echo "$hrac1 has damaged ".(10 + ($intel1))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}	
							
				if($kouzlo1 == "Strike"){$hp2 = $hp2 - (50 + (($str1/100) * 50));
				echo "$hrac1 has damaged ".(50 + (($str1/100) * 50))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				if($kouzlo1 == "Wave Crush"){$hp2 = $hp2 - (120 + (($intel1/100) * 60));
				echo "$hrac1 has damaged ".(120 + (($intel1/100) * 60))." $hrac2";
				echo "<br>";
				echo "$hrac2 has $hp2 health.";
				echo "<br>";}
				
				
				
				/* <NPC SPELLS> */
				
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
				
				
?>
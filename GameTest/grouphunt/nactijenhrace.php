<?php

// JMENO, PlayerIcon, HP, ARMOR, MR , DMG, STR, AGI, INTEL | WEAPON(ranged/melee) | passive , first ,second ,third, ultimate , icon1 , icon2 , icon3 , icon4 , icon5
//   0  , 	1			2,    3	 , 4  , 5  , 6  ,  7 ,  8    | 			9				 |    10    ,   11   ,  12    , 13  ,   14	  ,  15   , 16   , 17    ,18   ,  19

// L1 STATS

				$dotaz1 = "SELECT * FROM game_stats WHERE username='$username' LIMIT 1";
				$result1 = mysqli_query($conn, $dotaz1);
				
				if (mysqli_num_rows($result1) > 0) {
					while ($row = mysqli_fetch_assoc($result1)) {						
											
						$name = $row["username"];
						$hp = $row["hp"];
						$armor = $row["armor"];
						$MR = $row["magicresist"];
						$dmg = $row["basedmg"];
						$str = $row["str"];
						$agi = $row["agi"];
						$intel = $row["intel"];
						
						// L1 ITEMS
						$dotaz2 = "SELECT * FROM game_items WHERE username='$username' AND equiped=1";
						$result2 = mysqli_query($conn, $dotaz2);
				
						if (mysqli_num_rows($result2) > 0) {
							while ($row2 = mysqli_fetch_assoc($result2)) {
						
								$itemname = $row2["itemname"];
								$itemslot = $row2["slot"];
								$itemarmor = $row2["armor"];
								$itemMR = $row2["magicresist"];
								$itemdmg = $row2["damage"];
								$itemstr = $row2["str"];
								$itemagi = $row2["agi"];
								$itemintel = $row2["intel"];
								
								$armor = $armor + $itemarmor;
								$MR = $MR + $itemMR;
								$dmg = $dmg + $itemdmg;
								$str = $str + $itemstr;
								$agi = $agi + $itemagi;
								$intel = $intel + $itemintel;
								
								
						
								if($itemslot == "weapon/melee")	{$weapon = "melee";}
								if($itemslot == "weapon/ranged")	{$weapon = "ranged";}
						
						
							}
						}
						// <L1 ITEMS>					
						
						// <L1 ICON>
						$dotazicon = "SELECT * FROM game_users WHERE username='$name' LIMIT 1";
						$resulticon = mysqli_query($conn,$dotazicon);
						
						if (mysqli_num_rows($resulticon) > 0) {
							while ($rowicon = mysqli_fetch_assoc($resulticon)) {
								
								$dotazclient = "SELECT * FROM game_client WHERE username='$name' LIMIT 1";
								$resultclient = mysqli_query($conn,$dotazclient);
								
								if (mysqli_num_rows($resultclient) > 0) {
									while ($rowclient = mysqli_fetch_assoc($resultclient)) {
									
									$playerrace = $rowclient["race"];
									$playerrace = strtolower($playerrace);
									$playericon = $rowicon["icon"];
									$playerlevel = $rowclient["level"];
									
									$playericon = $playerrace."/".$playericon;
									
									}
								}
								
								
								
								array_push($loadL1, $name, $playericon, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
								
							}
						}
						// <L1 ICON>
						
						array_push($loadL1, @$weapon);					
						//echo "<br>";
						
						
						
					}
				}
				// <L1 STATS>
				

				// L1 SPELLS
				$dotaz3 = "SELECT * FROM game_spellbar WHERE username='$username' LIMIT 1";
				$result3 = mysqli_query($conn, $dotaz3);
				
				if (mysqli_num_rows($result3) > 0) {
					while ($row3 = mysqli_fetch_assoc($result3)) {
						
						$passiveSpell = $row3["passive"];
						$firstSpell = $row3["first"];
						$secondSpell = $row3["second"];
						$thirdSpell = $row3["third"];
						$ultimateSpell = $row3["ultimate"];
						
						$icon1 = $row3["icon1"];
						$icon2 = $row3["icon2"];
						$icon3 = $row3["icon3"];
						$icon4 = $row3["icon4"];
						$icon5 = $row3["icon5"];
						
						array_push($loadL1, $passiveSpell, $firstSpell , $secondSpell, $thirdSpell, $ultimateSpell, $icon1 , $icon2, $icon3, $icon4, $icon5, $playerlevel);
						
						
					}
				}		
				// <L1 SPELLS>
				
				//print_r($loadL1);
				//echo "<br>";
				
?>
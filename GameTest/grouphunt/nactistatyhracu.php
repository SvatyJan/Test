<?php

				// JMENO, PlayerIcon, HP, ARMOR, MR , DMG, STR, AGI, INTEL | WEAPON(ranged/melee) | passive , first ,second ,third, ultimate , icon1 , icon2 , icon3 , icon4 , icon5
				//   0  , 	1			2,    3	 , 4  , 5  , 6  ,  7 ,  8    | 			9				 |    10    ,   11   ,  12    , 13  ,   14	  ,  15   , 16   , 17    ,18   ,  19
				
				$PL = 1;


				if($PL == 1){$hracL = $leader; $array = $loadL1;}
				if($PL == 2){$hracL = $second; $array = $loadL2;}
				if($PL == 3){$hracL = $third;  $array = $loadL3;}
				if($PL == 4){$hracL = $forth;  $array = $loadL4;}
				if($PL == 5){$hracL = $fifth;  $array = $loadL5;}
				
				//echo $hracL;
				//echo $PL;
				
				// L1 STATS
				$dotaz1 = "SELECT * FROM game_stats WHERE username='$leader' LIMIT 1";
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
						$dotaz2 = "SELECT * FROM game_items WHERE username='$leader' AND equiped=1";
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
						$dotazicon = "SELECT * FROM game_users WHERE username='$leader' LIMIT 1";
						$resulticon = mysqli_query($conn,$dotazicon);
						
						if (mysqli_num_rows($resulticon) > 0) {
							while ($rowicon = mysqli_fetch_assoc($resulticon)) {
								
								$dotazclient = "SELECT * FROM game_client WHERE username='$leader' LIMIT 1";
								$resultclient = mysqli_query($conn,$dotazclient);
								
								if (mysqli_num_rows($resultclient) > 0) {
									while ($rowclient = mysqli_fetch_assoc($resultclient)) {
									
									$playerrace = $rowclient["race"];
									$playerrace = strtolower($playerrace);
									$playericon = $rowicon["icon"];
									$playerlevel1 = $rowclient["level"];
									
									$playericon = $playerrace."/".$playericon;
									
									}
								}
								
								
								
								array_push($loadL1, $name, $playericon, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
								
							}
						}
						// <L1 ICON>
						
						array_push($loadL1, $weapon);					
						//echo "<br>";
						
						
						
					}
				}
				// <L1 STATS>
				

				// L1 SPELLS
				$dotaz3 = "SELECT * FROM game_spellbar WHERE username='$leader' LIMIT 1";
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
						
						array_push($loadL1, $passiveSpell, $firstSpell , $secondSpell, $thirdSpell, $ultimateSpell, $icon1 , $icon2, $icon3, $icon4, $icon5, $playerlevel1);
						
						
					}
				}		
				// <L1 SPELLS>
				
				//print_r($loadL1);
				//echo "<br>";
				
				$PL++;
?>
<?php
// L2 STATS
				$dotaz1 = "SELECT * FROM game_stats WHERE username='$second' LIMIT 1";
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
						
						// L2 ITEMS
						$dotaz2 = "SELECT * FROM game_items WHERE username='$second' AND equiped=1";
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
						// <L2 ITEMS>
						
						// <L2 ICON>
						$dotazicon = "SELECT * FROM game_users WHERE username='$second' LIMIT 1";
						$resulticon = mysqli_query($conn,$dotazicon);
						
						if (mysqli_num_rows($resulticon) > 0) {
							while ($rowicon = mysqli_fetch_assoc($resulticon)) {
								
								$dotazclient = "SELECT * FROM game_client WHERE username='$second' LIMIT 1";
								$resultclient = mysqli_query($conn,$dotazclient);
								
								if (mysqli_num_rows($resultclient) > 0) {
									while ($rowclient = mysqli_fetch_assoc($resultclient)) {
									
									$playerrace = $rowclient["race"];
									$playerrace = strtolower($playerrace);
									$playericon = $rowicon["icon"];
									$playerlevel2 = $rowclient["level"];
									
									$playericon = $playerrace."/".$playericon;
									
									}
								}
								
								
								
								array_push($loadL2, $name, $playericon, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
								
							}
						}
						// <L2 ICON>
						
						array_push($loadL2, $weapon);					
						//echo "<br>";
						
						
						
					}
				}
				// <L2 STATS>
				

				// L2 SPELLS
				$dotaz3 = "SELECT * FROM game_spellbar WHERE username='$second' LIMIT 1";
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
						
						array_push($loadL2, $passiveSpell, $firstSpell , $secondSpell, $thirdSpell, $ultimateSpell, $icon1 , $icon2, $icon3, $icon4, $icon5, $playerlevel2);
						
						
					}
				}		
				// <L2 SPELLS>
				
				//print_r($loadL2);
				//echo "<br>";
				
				$PL++;
?>
<?php
// L3 STATS
				$dotaz1 = "SELECT * FROM game_stats WHERE username='$third' LIMIT 1";
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
						
						// L3 ITEMS
						$dotaz2 = "SELECT * FROM game_items WHERE username='$third' AND equiped=1";
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
						// <L3 ITEMS>
						
						// <L3 ICON>
						$dotazicon = "SELECT * FROM game_users WHERE username='$third' LIMIT 1";
						$resulticon = mysqli_query($conn,$dotazicon);
						
						if (mysqli_num_rows($resulticon) > 0) {
							while ($rowicon = mysqli_fetch_assoc($resulticon)) {
								
								$dotazclient = "SELECT * FROM game_client WHERE username='$third' LIMIT 1";
								$resultclient = mysqli_query($conn,$dotazclient);
								
								if (mysqli_num_rows($resultclient) > 0) {
									while ($rowclient = mysqli_fetch_assoc($resultclient)) {
									
									$playerrace = $rowclient["race"];
									$playerrace = strtolower($playerrace);
									$playericon = $rowicon["icon"];
									$playerlevel3 = $rowclient["level"];
									
									$playericon = $playerrace."/".$playericon;
									
									}
								}
								
								
								
								array_push($loadL3, $name, $playericon, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
								
							}
						}
						// <L3 ICON>
						array_push($loadL3, $weapon);					
						//echo "<br>";
						
						
						
					}
				}
				// <L3 STATS>
				

				// L3 SPELLS
				$dotaz3 = "SELECT * FROM game_spellbar WHERE username='$third' LIMIT 1";
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
						
						array_push($loadL3, $passiveSpell, $firstSpell , $secondSpell, $thirdSpell, $ultimateSpell, $icon1 , $icon2, $icon3, $icon4, $icon5, $playerlevel3);
						
						
					}
				}		
				// <L3 SPELLS>
				
				//print_r($loadL3);
				//echo "<br>";
				
				$PL++;
?>
<?php
// L4 STATS
				$dotaz1 = "SELECT * FROM game_stats WHERE username='$forth' LIMIT 1";
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
						
						// L4 ITEMS
						$dotaz2 = "SELECT * FROM game_items WHERE username='$forth' AND equiped=1";
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
						// <L4 ITEMS>
						
						// <L4 ICON>
						$dotazicon = "SELECT * FROM game_users WHERE username='$forth' LIMIT 1";
						$resulticon = mysqli_query($conn,$dotazicon);
						
						if (mysqli_num_rows($resulticon) > 0) {
							while ($rowicon = mysqli_fetch_assoc($resulticon)) {
								
								$dotazclient = "SELECT * FROM game_client WHERE username='$forth' LIMIT 1";
								$resultclient = mysqli_query($conn,$dotazclient);
								
								if (mysqli_num_rows($resultclient) > 0) {
									while ($rowclient = mysqli_fetch_assoc($resultclient)) {
									
									$playerrace = $rowclient["race"];
									$playerrace = strtolower($playerrace);
									$playericon = $rowicon["icon"];
									$playerlevel4 = $rowclient["level"];
									
									$playericon = $playerrace."/".$playericon;
									
									}
								}
								
								
								
								array_push($loadL4, $name, $playericon, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
								
							}
						}
						// <L4 ICON>
						
						//array_push($loadL4, $name, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
						array_push($loadL4, $weapon);					
						//echo "<br>";
						
						
						
					}
				}
				// <L4 STATS>
				

				// L4 SPELLS
				$dotaz3 = "SELECT * FROM game_spellbar WHERE username='$forth' LIMIT 1";
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
						
						array_push($loadL4, $passiveSpell, $firstSpell , $secondSpell, $thirdSpell, $ultimateSpell, $icon1 , $icon2, $icon3, $icon4, $icon5, $playerlevel4);
						
						
					}
				}		
				// <L4 SPELLS>
				
				//print_r($loadL4);
				//echo "<br>";
				
				$PL++;
?>
<?php
// L5 STATS
				$dotaz1 = "SELECT * FROM game_stats WHERE username='$fifth' LIMIT 1";
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
						
						// L5 ITEMS
						$dotaz2 = "SELECT * FROM game_items WHERE username='$fifth' AND equiped=1";
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
						// <L5 ITEMS>
						
						// <L5 ICON>
						$dotazicon = "SELECT * FROM game_users WHERE username='$fifth' LIMIT 1";
						$resulticon = mysqli_query($conn,$dotazicon);
						
						if (mysqli_num_rows($resulticon) > 0) {
							while ($rowicon = mysqli_fetch_assoc($resulticon)) {
								
								$dotazclient = "SELECT * FROM game_client WHERE username='$fifth' LIMIT 1";
								$resultclient = mysqli_query($conn,$dotazclient);
								
								if (mysqli_num_rows($resultclient) > 0) {
									while ($rowclient = mysqli_fetch_assoc($resultclient)) {
									
									$playerrace = $rowclient["race"];
									$playerrace = strtolower($playerrace);
									$playericon = $rowicon["icon"];
									$playerlevel5 = $rowclient["level"];
									
									$playericon = $playerrace."/".$playericon;
									
									}
								}
								
								
								
								array_push($loadL5, $name, $playericon, $hp, $armor, $MR, $dmg, $str, $agi, $intel);
								
							}
						}
						// <L5 ICON>
						
						array_push($loadL5, $weapon);					
						//echo "<br>";
						
						
						
					}
				}
				// <L5 STATS>
				

				// L5 SPELLS
				$dotaz3 = "SELECT * FROM game_spellbar WHERE username='$fifth' LIMIT 1";
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
						
						array_push($loadL5, $passiveSpell, $firstSpell , $secondSpell, $thirdSpell, $ultimateSpell, $icon1 , $icon2, $icon3, $icon4, $icon5, $playerlevel5);
						
						
					}
				}		
				// <L5 SPELLS>
				
				//print_r($loadL5);
				//echo "<br>";
				
				$PL++;
?>
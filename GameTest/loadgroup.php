<?php

//LEFT side

//NACTU celou partu
// pocitam kvuli botum

$wepurl = "";

$parta = "SELECT * FROM game_party WHERE id='$firstgroup' LIMIT 1";
$loadparta = mysqli_query($conn,$parta);

	if(mysqli_num_rows($loadparta) > 0){
	while($row_parta = mysqli_fetch_assoc($loadparta)) {
		
		// RP a číslo = Right Player (number)
		$RP1 = $row_parta["leader"];
		$RP2 = $row_parta["second"];
		$RP3 = $row_parta["third"];
		$RP4 = $row_parta["forth"];
		$RP5 = $row_parta["fifth"];
		
		if($RP1 != ""){array_push($group1, $RP1);$firstgroupcount++;}
		if($RP2 != ""){array_push($group1, $RP2);$firstgroupcount++;}
		if($RP3 != ""){array_push($group1, $RP3);$firstgroupcount++;}
		if($RP4 != ""){array_push($group1, $RP4);$firstgroupcount++;}
		if($RP5 != ""){array_push($group1, $RP5);$firstgroupcount++;}
		
		}	
	}
	
	//print_r($group1);
	
	for($i = 0; $i < count($group1) ;$i++)
	{
		$player = $group1[$i];
		//echo $player;
		echo "<br>";
		
		$client = "SELECT * FROM game_client WHERE username='$player' LIMIT 1";
		$loadclient = mysqli_query($conn,$client);
		
		if(mysqli_num_rows($loadclient) > 0){
		while($row_client = mysqli_fetch_assoc($loadclient)) {
			
		$race = $row_client["race"];
		
		$users = "SELECT * FROM game_users WHERE username='$player' LIMIT 1";
		$loadusers = mysqli_query($conn,$users);
		
		$src = "";
		
		if(mysqli_num_rows($loadusers) > 0){
		while($row_users = mysqli_fetch_assoc($loadusers)) {
			
			$username = $row_users["username"];
			$icon = $row_users["icon"];
			
			if($icon == "default.png"){
			$src = "img/icons/".$icon;
			} else {
			$src = "img/".$race."/".$icon;	
			}

					}
				}
			}
		}
		
		
		$stats = "SELECT * FROM game_stats WHERE username='$player' LIMIT 1";
		$loadstaty = mysqli_query($conn,$stats);
		
		$staty[$i] = array();
		
		if(mysqli_num_rows($loadstaty) > 0){
		while($row_staty = mysqli_fetch_assoc($loadstaty)) {
			
			$name = $row_staty["username"];
			$hp = $row_staty["hp"];
			$armor = $row_staty["armor"];
			$magicresist = $row_staty["magicresist"];
			$basedmg = $row_staty["basedmg"];
			$str = $row_staty["str"];
			$agi = $row_staty["agi"];
			$intel = $row_staty["intel"];
			
			}
		}
		
		$items = "SELECT * FROM game_items WHERE username='$player' AND equiped=1";
		$loaditems = mysqli_query($conn,$items);

		if(mysqli_num_rows($loaditems) > 0){
		while($row_items = mysqli_fetch_assoc($loaditems)) {
			
			$itemarmor = $row_items["armor"];
			$itemmagicresist = $row_items["magicresist"];
			$itemdamage = $row_items["damage"];
			$itemdmgtype = $row_items["dmgtype"];
			$itemstr = $row_items["str"];
			$itemagi = $row_items["agi"];
			$itemintel = $row_items["damage"];
			
			@$armor += $itemarmor;
			@$magicresist += $itemmagicresist;
			@$basedmg += $itemdamage;
			@$str += $itemstr;
			@$agi += $itemagi;
			@$intel += $itemintel;
			
			$slot = $row_items["slot"];
			$equiped = $row_items["equiped"];
			$wepicon = $row_items["icon"];

			if($slot == "weapon/ranged" && $equiped == 1 || $slot == "weapon/melee" && $equiped == 1) {
			$wepurl = "img/items/".$slot."/".$wepicon;
			}
			
			}
		}
			array_push($staty[$i],$name,$hp,$armor,$magicresist,$basedmg,$str,$agi,$intel);

		
		$spells = "SELECT * FROM game_spellbar WHERE username='$player' LIMIT 1";
		$loadspells = mysqli_query($conn,$spells);
		
		$spelly[$i] = array();
		
		if(mysqli_num_rows($loadspells) > 0){
		while($row_spells = mysqli_fetch_assoc($loadspells)) {
			
			$passive = $row_spells["passive"];
			$first = $row_spells["first"];
			$second = $row_spells["second"];
			$third = $row_spells["third"];
			$ultimate = $row_spells["ultimate"];
			
			$icon1 = "img/spells/".$row_spells["icon1"];
			$icon2 = "img/spells/".$row_spells["icon2"];
			$icon3 = "img/spells/".$row_spells["icon3"];
			$icon4 = "img/spells/".$row_spells["icon4"];
			$icon5 = "img/spells/".$row_spells["icon5"];
			
			array_push($spelly[$i],$passive,$first,$second,$third,$ultimate,$icon1,$icon2,$icon3,$icon4,$icon5);
			
			}
		}
		
				$passiveurl = "img/Spells/cross-mark.png";
				//player
				if($wepurl == ""){$wepurl = "img/spells/punch.png";}
				echo "<div class='huntlevo'>";
				echo "<img style='width:384px;height:384px;' src='$src'>";
				echo "<br>";
				
				echo "<div class='huntspellpositions' style=''>";
				if($icon1 == "" || $icon1 == "img/spells/"){echo "<div class='huntspellctverecek' style='background-image:url($passiveurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($icon1)'></div>";}
				if($icon2 == "" || $icon2 == "img/spells/"){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($icon2)'></div>";}
				if($icon3 == "" || $icon3 == "img/spells/"){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($icon3)'></div>";}
				if($icon4 == "" || $icon4 == "img/spells/"){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($icon4)'></div>";}
				if($icon5 == "" || $icon5 == "img/spells/"){echo "<div class='huntspellctverecek' style='background-image:url($wepurl)'></div>";}
				else{echo "<div class='huntspellctverecek' style='background-image:url($icon5)'></div>";}
				echo "</div>";
				echo "</div>";
				echo "</div>";
		
		/*echo "<br>";
		print_r($staty[$i]);
		echo "<br>";
		print_r($spelly[$i]);
		echo "<br>";*/
	}
// KONCI LOAD PRVNI PARTY
echo "<br>";

?>
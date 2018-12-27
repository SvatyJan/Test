<?php

//NACTU druhou partu NEBO boty.. bude jich tolik kolik bude hracu v parte
if($secondgroup=="")
{
	//load bots	
   //echo $firstgroupcount;
	for($x = 1; $x <= $firstgroupcount;$x++) {
		
	$rand = rand(1,5);
	
	$npc = "SELECT * FROM game_enemies WHERE id='$rand' LIMIT 1";
	$loadnpc = mysqli_query($conn,$npc);
	if(mysqli_num_rows($loadnpc) > 0){
	while($row_npc = mysqli_fetch_assoc($loadnpc)) {
		
	$botstaty[$x] = array();
	
	$name = $row_npc["name"];
	@$hp = $row_npc["hp"];
	@$armor = $row_npc["armor"];
	@$magicresist = $row_npc["magicresist"];
	@$basedmg = $row_npc["basedmg"];
	@$str = $row_npc["str"];
	@$agi = $row_npc["agi"];
	@$intel = $row_npc["intel"];
	@$icon = $row_npc["icon"];
		
	$passive = $row_npc["passive"];
	$first = $row_npc["first"];
	$second = $row_npc["second"];
	$third = $row_npc["third"];
	$ultimate = $row_npc["ultimate"];
	
	
	array_push($botstaty[$x],$name,$hp,$armor,$magicresist,$basedmg,$str,$agi,$intel);
	
	//$koliknpcvdb = mysqli_num_rows($loadnpc);	
	//$randnpc = rand(1,$koliknpcvdb);
	//echo $randnpc;
	
	$botspelly[$x] = array();
	
	//potrebuju nacist passivku, normalni kouzlo a ultimatku
	$npcspells = "SELECT * FROM game_enemyspellbar WHERE name='$name' LIMIT 1";
	$loadnpcspells = mysqli_query($conn,$npcspells);
	if(mysqli_num_rows($loadnpcspells) > 0){
	while($row_npcspell = mysqli_fetch_assoc($loadnpcspells)) {
		
			$passive = $row_npcspell["passive"];
			$first = $row_npcspell["first"];
			$second = $row_npcspell["second"];
			$third = $row_npcspell["third"];
			$ultimate = $row_npcspell["ultimate"];
			
			$icon1 = $row_npcspell["icon1"];
			$icon2 = $row_npcspell["icon2"];
			$icon3 = $row_npcspell["icon3"];
			$icon4 = $row_npcspell["icon4"];
			$icon5 = $row_npcspell["icon5"];
			
			array_push($botspelly[$x],$passive,$first,$second,$third,$ultimate,$icon1,$icon2,$icon3,$icon4,$icon5,$icon);	
		
					}
				}	
			}
		}
		/*print_r($botstaty[$x]);
		echo "<br>";
		print_r($botspelly[$x]);
		echo "<br>";*/
				
				$passiveurl = "img/Spells/cross-mark.png";
				//player
				if($wepurl == ""){$wepurl = "img/spells/punch.png";}
				echo "<div class='huntpravo'>";
				echo "<img style='width:384px;height:384px;' src='$icon'>";
				echo "<br>";
				
				echo "<div class='huntspellpositions' style=''>";
				if($icon1 == "" || $icon1 == "img/spells/"){echo "<div class='huntspellctverecek' style='background-image:url($icon1)'></div>";}
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
	}
	
}
else
{
	
//RIGHT side

//NACTU celou partu
$parta = "SELECT * FROM game_party WHERE id='$secondgroup' LIMIT 1";
$loadparta = mysqli_query($conn,$parta);

	if(mysqli_num_rows($loadparta) > 0){
	while($row_parta = mysqli_fetch_assoc($loadparta)) {
		
		// RP a číslo = Right Player (number)
		$LP1 = $row_parta["leader"];
		$LP2 = $row_parta["second"];
		$LP3 = $row_parta["third"];
		$LP4 = $row_parta["forth"];
		$LP5 = $row_parta["fifth"];
		
		if($LP1 != ""){array_push($group2, $LP1);}
		if($LP2 != ""){array_push($group2, $LP2);}
		if($LP3 != ""){array_push($group2, $LP3);}
		if($LP4 != ""){array_push($group2, $LP4);}
		if($LP5 != ""){array_push($group2, $LP5);}

		//echo $partycount1;
		
		}	
	}
	
	//print_r($group1);
	
	for($y = 0; $y < count($group2) ;$y++)
	{
		$player = $group2[$y];
		//echo $player;
		echo "<br>";
		
		
		
		$stats = "SELECT * FROM game_stats WHERE username='$player' LIMIT 1";
		$loadstaty = mysqli_query($conn,$stats);
		
		$src2 = "";
		
		$staty[$y] = array();
		
		if(mysqli_num_rows($loadstaty) > 0){
		while($row_staty = mysqli_fetch_assoc($loadstaty)) {
			
			$username = $row_users["username"];
			$icon = $row_users["icon"];
			
			if($icon == "default.png"){
			$src2 = "img/icons/".$icon;
			} else {
			$src2 = "img/".$race."/".$icon;	
			}
			
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
		while($row_spells = mysqli_fetch_assoc($loaditems)) {
			
			$itemarmor = $row_spells["armor"];
			$itemmagicresist = $row_spells["magicresist"];
			$itemdamage = $row_spells["damage"];
			$itemdmgtype = $row_spells["dmgtype"];
			$itemstr = $row_spells["str"];
			$itemagi = $row_spells["agi"];
			$itemintel = $row_spells["damage"];
			
			$armor += $itemarmor[$y];
			$magicresist += $itemmagicresist[$y];
			$basedmg += $itemdamage[$y];
			$str += $itemstr[$y];
			$agi += $itemagi[$y];
			$intel += $itemintel[$y];
			
			}
		}
		array_push($staty[$y],$hp,$armor,$magicresist,$basedmg,$str,$agi,$intel);

		
		$spells = "SELECT * FROM game_spellbar WHERE username='$player' LIMIT 1";
		$loadspells = mysqli_query($conn,$spells);
		
		$spelly[$y] = array();
		
		if(mysqli_num_rows($loadspells) > 0){
		while($row_spells = mysqli_fetch_assoc($loadspells)) {
			
			$passive = $row_spells["passive"];
			$first = $row_spells["first"];
			$second = $row_spells["second"];
			$third = $row_spells["third"];
			$ultimate = $row_spells["ultimate"];
			
			$icon1 = $row_spells["icon1"];
			$icon2 = $row_spells["icon2"];
			$icon3 = $row_spells["icon3"];
			$icon4 = $row_spells["icon4"];
			$icon5 = $row_spells["icon5"];
			
			array_push($spelly[$y],$passive,$first,$second,$thir,$ultimate,$icon1,$icon2,$icon3,$icon4,$icon5);
			
			}
		}
		
				$passiveurl = "img/Spells/cross-mark.png";
				//player
				if($wepurl == ""){$wepurl = "img/spells/punch.png";}
				echo "<div class='huntpravo'>";
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
		
		/*print_r($staty[$y]);
		echo "<br>";
		print_r($spelly[$y]);
		echo "<br>";*/
	}
// KONCI LOAD PRVNI PARTY
echo "<br>";
	
	
}

?>
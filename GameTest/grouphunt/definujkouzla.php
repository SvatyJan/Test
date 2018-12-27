<?php


/*KDO pouziva
$players[$kdohrajeL][0];

CO pouziva
$kouzloL;

NA KOHO pouziva
$targetR;
*/

if(@$players[$kdohrajeL][2] <= 0){
} else {

// <KOUZLA HRACU>
if($kouzloL == ""){
echo "<strong>".@$players[$kdohrajeL][0]."</strong> attacks <strong>".@$targetR."</strong> and deals ".(@$players[$kdohrajeL][5])." damage.";
@$bots[$kdohrajeR][2] = ((@$bots[$kdohrajeR][2]) - ((@$players[$kdohrajeL][5])));
echo "<br><br>";
}

// STRENGTH
elseif($kouzloL == "Combat Shout"){
//TEN pouziva TO na NEJ
echo "<strong>".@$players[$kdohrajeL][0]."</strong> Buffs his team using <font color='#FFFF00;'>Combat Shout</font> with + <strong>".(5+@$players[$kdohrajeL][20])." Strength</strong>.";
@$players[0][6] = @$players[0][6] + (5+@$players[$kdohrajeL][20]);
@$players[1][6] = @$players[1][6] + (5+@$players[$kdohrajeL][20]);
@$players[2][6] = @$players[2][6] + (5+@$players[$kdohrajeL][20]);
@$players[3][6] = @$players[3][6] + (5+@$players[$kdohrajeL][20]);
@$players[4][6] = @$players[4][6] + (5+@$players[$kdohrajeL][20]);
echo "<br><br>";
}
	
elseif($kouzloL == "Destructive Strike"){	
echo "<strong>".@$players[$kdohrajeL][0]."</strong> Strikes <strong>".@$targetR."</strong> with <strong>Destructive Strike</strong> for ".(80 + (@$players[$kdohrajeL][6]))." Damage.";
@$bots[$kdohrajeR][2] = ((@$bots[$kdohrajeR][2]) - (80 + (@$players[$kdohrajeL][20])));
echo "<br><br>";
}


elseif($kouzloL == "Cleave"){

echo "<strong>".@$players[$kdohrajeL][0]."</strong> Cleaves <strong>".@$bots[$kdohrajeR][0]."</strong> and <strong>".@$bots[($kdohrajeR+1)][0]."</strong> for ".
(30 + ((@$players[$kdohrajeL][20]))/2).".";

@$bots[$kdohrajeR][2] = round(((@$bots[$kdohrajeR][2]) - ((30 + ((@$players[$kdohrajeL][20]))/2))));
@$bots[$kdohrajeR+1][2] = round(((@$bots[$kdohraje+1][2]) - ((30 + ((@$players[$kdohrajeL][20]))/2))));
echo "<br><br>";
}

elseif($kouzloL == "Heroic Finish"){
echo "<strong>".@$players[$kdohrajeL][0]." <font color='#AA0000;'>SMASHES</font> ".$targetR."</strong> for ".(((@$players[$kdohrajeL][5])/2) + 100 + round((((@$players[$kdohrajeL][6])/100) * 60)));
@$bots[$kdohrajeR][2] = ((@$bots[$kdohrajeR][2]) - (((@$players[$kdohrajeL][5])/2) + 100 + round((((@$players[$kdohrajeL][6])/100) * 60))));

echo "<br><br>";
}

elseif($kouzloL == "Leap"){
echo "<strong>".@$players[$kdohrajeL][0]."</strong> Leaps into <strong>".@$bots[$kdohrajeR][0]."</strong> and <strong>".@$bots[$kdohrajeR+1][0]."</strong> dealing ".((30) + round((((@$players[$kdohrajeL][6])/100) * 75)))." damage.";
@$bots[$kdohrajeR][2] = ((@$bots[$kdohrajeR][2]) - (((30) + round((((@$players[$kdohrajeL][6])/100) * 75)))));
@$bots[$kdohrajeR+1][2] = ((@$bots[$kdohrajeR+1][2]) - (((30) + round((((@$players[$kdohrajeL][6])/100) * 75)))));
echo "<br><br>";
}

elseif($kouzloL == "Bloodthirst"){
echo "<strong>".@$players[$kdohrajeL][0]."</strong> hits an enemy for ".((80) + round((@$players[$kdohrajeL][6]/100) * 25))." damage and <font color='#00FF00;'>Heals</font> himself for ".((40) + round((@$players[$kdohrajeL][6]/100) * 30))." Health.";
@$bots[$kdohrajeR][2] = (@$bots[$kdohrajeR][2]) - ((80) + round((@$players[$kdohrajeL][6]/100) * 25));
@$players[$kdohrajeL][2] = (@$players[$kdohrajeL][2]) + (((40) + round((@$players[$kdohrajeL][6]/100) * 30)));
echo "<br><br>";
}


// AGILITY
elseif($kouzloL == "Shiv"){
echo "<strong>".@$players[$kdohrajeL][0]."</strong> Shives and enemy for ".((30) + round(@$players[$kdohrajeL][7]))." Damage.";
@$bots[$kdohrajeR][2] = (@$bots[$kdohrajeR][2]) - ((30) + round(@$players[$kdohrajeL][7]));
echo "<br><br>";
}


// INTELLIGENCE
elseif($kouzloL == "Overload"){
echo "<strong>".@$players[$kdohrajeL][0]."</strong> Bursts an enemy for ".((10) + round(@$players[$kdohrajeL][8]))." Damage.";
@$bots[$kdohrajeR][2] = (@$bots[$kdohrajeR][2]) - ((10) + round(@$players[$kdohrajeL][8]));
echo "<br><br>";	
}

elseif($kouzloL == "Smite"){
echo "<strong>".@$players[$kdohrajeL][0]."</strong> <font color='#FFFF00;'>SMITES</font> an enemy for ".((60) + round(@$players[$kdohrajeL][8]))." Damage.";
@$bots[$kdohrajeR][2] = (@$bots[$kdohrajeR][2]) - ((60) + round(@$players[$kdohrajeL][8]));
echo "<br><br>";
}


}
// </KOUZLA HRACU>

// <KOUZLA NPC>
if(@$bots[$kdohrajeR][2] <= 0){
} else {

if($kouzloR == "Punch"){
echo "<strong>".@$bots[$kdohrajeR][0]."</strong> Punches ".$targetL." for ".((50) + ((@$players[$kdohrajeL][20])*10));
@$players[$kdohrajeR][2] = ((@$players[$kdohrajeR][2]) -  ((0) + ((@$players[$kdohrajeL][20])*10)));
echo "<br><br>";
}

elseif($kouzloR == "Grow up"){
echo "<strong>".@$bots[$kdohrajeR][0]."</strong> <font color='#00AA00;'>Heals</font> himself for ".(50)." Health.";
@$bots[$kdohrajeR][2] = (@$bots[$kdohrajeR][2] + 50);
echo "<br><br>";
}

elseif($kouzloR == "Shadow Grasp") {
echo "<strong>".@$bots[$kdohrajeR][0]."</strong> grasps <strong>".$targetL."</strong> and deals ".((40) + ((round(@$players[$kdohrajeL][7])/100)*60) + ((round(@$players[$kdohrajeL][8])/100)*40)).
" <font color='#AA0000;'>Twice!</font> ".((40) + ((round(@$players[$kdohrajeL][7])/100)*60) + ((round(@$players[$kdohrajeL][8])/100)*40))*2;
@$players[$kdohrajeR][2] = (@$players[$kdohrajeR][2]) - (((40) + ((round(@$players[$kdohrajeL][7])/100)*60) + ((round(@$players[$kdohrajeL][8])/100)*40))*2);
echo "<br><br>";
}


elseif($kouzloR == "Enhanced Claw"){
echo "<strong>".@$bots[$kdohrajeR][0]."</strong> buffs himself with enhanced claws granting him ".((10) + ((round(@$players[$kdohrajeL][8])/100)*30))." damage.";
@$bots[$kdohrajeR][5] = ((@$bots[$kdohrajeR][5]) + ((10) + ((round(@$players[$kdohrajeL][8])/100)*30)));
echo "<br><br>";
}

elseif($kouzloR == "Flaming Claw"){
echo "<strong>".@$bots[$kdohrajeR][0]."</strong> hits <strong>".$targetL."</strong> for ".((50) + ((round(@$players[$kdohrajeL][8])/100)*60));
@$players[$kdohrajeR][2] = (@$players[$kdohrajeR][2]) - ((50) + ((round(@$players[$kdohrajeL][8])/100)*60));
echo "<br><br>";
}

elseif($kouzloR == "Bat Wing"){
echo "<strong>".@$bots[$kdohrajeR][0]."</strong> <font color='#00FF00;'>Heals</font> himself for ".((30) + (round(@$players[$kdohrajeL][7])/100)*30);
@$bots[$kdohrajeR][2] = @$bots[$kdohrajeR][2] + ((30) + (round(@$players[$kdohrajeL][7])/100)*30);
echo "<br><br>";
}

}
// </KOUZLA NPC>

	
	

?>
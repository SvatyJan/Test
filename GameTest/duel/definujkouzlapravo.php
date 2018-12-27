<?php


/*KDO pouziva
$loadR1[0];

CO pouziva
$kouzloR;

NA KOHO pouziva
$targetR;
*/

if(@$loadR1[2] <= 0){
} else {

// <KOUZLA HRACU>
if($kouzloR == ""){
echo "<strong>".@$loadR1[0]."</strong> attacks <strong>".@$targetR."</strong> and deals ".(@$loadR1[5])." damage.";
@$loadL1[2] = ((@$loadL1[2]) - ((@$loadR1[5])));
echo "<br><br>";
}

// STRENGTH
elseif($kouzloR == "Combat Shout"){
//TEN pouziva TO na NEJ
echo "<strong>".@$loadR1[0]."</strong> Buffs his team using <font color='#FFFF00;'>Combat Shout</font> with + <strong>".(5+@$loadR1[20])." Strength</strong>.";
@$players[0][6] = @$players[0][6] + (5+@$loadR1[20]);
@$players[1][6] = @$players[1][6] + (5+@$loadR1[20]);
@$players[2][6] = @$players[2][6] + (5+@$loadR1[20]);
@$players[3][6] = @$players[3][6] + (5+@$loadR1[20]);
@$players[4][6] = @$players[4][6] + (5+@$loadR1[20]);
echo "<br><br>";
}
	
elseif($kouzloR == "Destructive Strike"){	
echo "<strong>".@$loadR1[0]."</strong> Strikes <strong>".@$targetR."</strong> with <strong>Destructive Strike</strong> for ".(80 + (@$loadR1[6]))." Damage.";
@$loadL1[2] = ((@$loadL1[2]) - (80 + (@$loadR1[20])));
echo "<br><br>";
}


elseif($kouzloR == "Cleave"){

echo "<strong>".@$loadR1[0]."</strong> Cleaves <strong>".@$loadL1[0]."</strong> and <strong>".@$loadL1[0]."</strong> for ".
(30 + ((@$loadR1[20]))/2).".";

@$loadL1[2] = round(((@$loadL1[2]) - ((30 + ((@$loadR1[20]))/2))));
echo "<br><br>";
}

elseif($kouzloR == "Heroic Finish"){
echo "<strong>".@$loadR1[0]." <font color='#AA0000;'>SMASHES</font> ".$targetR."</strong> for ".(((@$loadR1[5])/2) + 100 + round((((@$loadR1[6])/100) * 60)));
@$loadL1[2] = ((@$loadL1[2]) - (((@$loadR1[5])/2) + 100 + round((((@$loadR1[6])/100) * 60))));

echo "<br><br>";
}

elseif($kouzloR == "Leap"){
echo "<strong>".@$loadR1[0]."</strong> Leaps into <strong>".@$loadL1[0]."</strong> and <strong>".@$loadL1[0]."</strong> dealing ".((30) + round((((@$loadR1[6])/100) * 75)))." damage.";
@$loadL1[2] = ((@$loadL1[2]) - (((30) + round((((@$loadR1[6])/100) * 75)))));
echo "<br><br>";
}

elseif($kouzloR == "Bloodthirst"){
echo "<strong>".@$loadR1[0]."</strong> hits an enemy for ".((80) + round((@$loadR1[6]/100) * 25))." damage and <font color='#00FF00;'>Heals</font> himself for ".((40) + round((@$loadR1[6]/100) * 30))." Health.";
@$loadL1[2] = (@$loadL1[2]) - ((80) + round((@$loadR1[6]/100) * 25));
@$loadR1[2] = (@$loadR1[2]) + (((40) + round((@$loadR1[6]/100) * 30)));
echo "<br><br>";
}


// AGILITY
elseif($kouzloR == "Shiv"){
echo "<strong>".@$loadR1[0]."</strong> Shives and enemy for ".((30) + round(@$loadR1[7]))." Damage.";
@$loadL1[2] = (@$loadL1[2]) - ((30) + round(@$loadR1[7]));
echo "<br><br>";
}


// INTELLIGENCE
elseif($kouzloR == "Overload"){
echo "<strong>".@$loadR1[0]."</strong> Bursts an enemy for ".((10) + round(@$loadR1[8]))." Damage.";
@$loadL1[2] = (@$loadL1[2]) - ((10) + round(@$loadR1[8]));
echo "<br><br>";	
}

elseif($kouzloR == "Smite"){
echo "<strong>".@$loadR1[0]."</strong> <font color='#FFFF00;'>SMITES</font> an enemy for ".((60) + round(@$loadR1[8]))." Damage.";
@$loadL1[2] = (@$loadL1[2]) - ((60) + round(@$loadR1[8]));
echo "<br><br>";
}


}

	
	

?>
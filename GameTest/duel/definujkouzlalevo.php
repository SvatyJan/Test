<?php


/*KDO pouziva
$loadL1[0];

CO pouziva
$kouzloL;

NA KOHO pouziva
$targetR;
*/

if(@$loadL1[2] <= 0){
} else {

// <KOUZLA HRACU>
if($kouzloL == ""){
echo "<strong>".@$loadL1[0]."</strong> attacks <strong>".@$targetR."</strong> and deals ".(@$loadL1[5])." damage.";
@$loadR1[2] = ((@$loadR1[2]) - ((@$loadL1[5])));
echo "<br><br>";
}

// STRENGTH
elseif($kouzloL == "Combat Shout"){
//TEN pouziva TO na NEJ
echo "<strong>".@$loadL1[0]."</strong> Buffs his team using <font color='#FFFF00;'>Combat Shout</font> with + <strong>".(5+@$loadL1[20])." Strength</strong>.";
@$players[0][6] = @$players[0][6] + (5+@$loadL1[20]);
@$players[1][6] = @$players[1][6] + (5+@$loadL1[20]);
@$players[2][6] = @$players[2][6] + (5+@$loadL1[20]);
@$players[3][6] = @$players[3][6] + (5+@$loadL1[20]);
@$players[4][6] = @$players[4][6] + (5+@$loadL1[20]);
echo "<br><br>";
}
	
elseif($kouzloL == "Destructive Strike"){	
echo "<strong>".@$loadL1[0]."</strong> Strikes <strong>".@$targetR."</strong> with <strong>Destructive Strike</strong> for ".(80 + (@$loadL1[6]))." Damage.";
@$loadR1[2] = ((@$loadR1[2]) - (80 + (@$loadL1[20])));
echo "<br><br>";
}


elseif($kouzloL == "Cleave"){

echo "<strong>".@$loadL1[0]."</strong> Cleaves <strong>".@$loadR1[0]."</strong> and <strong>".@$loadR1[0]."</strong> for ".
(30 + ((@$loadL1[20]))/2).".";

@$loadR1[2] = round(((@$loadR1[2]) - ((30 + ((@$loadL1[20]))/2))));
echo "<br><br>";
}

elseif($kouzloL == "Heroic Finish"){
echo "<strong>".@$loadL1[0]." <font color='#AA0000;'>SMASHES</font> ".$targetR."</strong> for ".(((@$loadL1[5])/2) + 100 + round((((@$loadL1[6])/100) * 60)));
@$loadR1[2] = ((@$loadR1[2]) - (((@$loadL1[5])/2) + 100 + round((((@$loadL1[6])/100) * 60))));

echo "<br><br>";
}

elseif($kouzloL == "Leap"){
echo "<strong>".@$loadL1[0]."</strong> Leaps into <strong>".@$loadR1[0]."</strong> and <strong>".@$bots[$kdohrajeR+1][0]."</strong> dealing ".((30) + round((((@$loadL1[6])/100) * 75)))." damage.";
@$loadR1[2] = ((@$loadR1[2]) - (((30) + round((((@$loadL1[6])/100) * 75)))));
echo "<br><br>";
}

elseif($kouzloL == "Bloodthirst"){
echo "<strong>".@$loadL1[0]."</strong> hits an enemy for ".((80) + round((@$loadL1[6]/100) * 25))." damage and <font color='#00FF00;'>Heals</font> himself for ".((40) + round((@$loadL1[6]/100) * 30))." Health.";
@$loadR1[2] = (@$loadR1[2]) - ((80) + round((@$loadL1[6]/100) * 25));
@$loadL1[2] = (@$loadL1[2]) + (((40) + round((@$loadL1[6]/100) * 30)));
echo "<br><br>";
}


// AGILITY
elseif($kouzloL == "Shiv"){
echo "<strong>".@$loadL1[0]."</strong> Shives and enemy for ".((30) + round(@$loadL1[7]))." Damage.";
@$loadR1[2] = (@$loadR1[2]) - ((30) + round(@$loadL1[7]));
echo "<br><br>";
}


// INTELLIGENCE
elseif($kouzloL == "Overload"){
echo "<strong>".@$loadL1[0]."</strong> Bursts an enemy for ".((10) + round(@$loadL1[8]))." Damage.";
@$loadR1[2] = (@$loadR1[2]) - ((10) + round(@$loadL1[8]));
echo "<br><br>";	
}

elseif($kouzloL == "Smite"){
echo "<strong>".@$loadL1[0]."</strong> <font color='#FFFF00;'>SMITES</font> an enemy for ".((60) + round(@$loadL1[8]))." Damage.";
@$loadR1[2] = (@$loadR1[2]) - ((60) + round(@$loadL1[8]));
echo "<br><br>";
}


}

	
	

?>
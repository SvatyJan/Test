<?php
echo "<br>";

// JMENO, PlayerIcon, HP, ARMOR, MR , DMG, STR, AGI, INTEL | WEAPON(ranged/melee) | passive , first ,second ,third, ultimate , icon1 , icon2 , icon3 , icon4 , icon5
//   0  , 	1			2,    3	 , 4  , 5  , 6  ,  7 ,  8    | 			9				 |    10    ,   11   ,  12    , 13  ,   14	  ,  15   , 16   , 17    ,18   ,  19

include_once("generations/enemies/enemies.php");


$loadR1 = array();
$loadR2 = array();
$loadR3 = array();
$loadR4 = array();
$loadR5 = array();

for($i = 1;$i <= $pocethracu;$i++) {
$NC = rand(0,count($enemies)-1);
if($i == 1){
	array_push($loadR1, $enemies[$NC][0],$enemies[$NC][1],$enemies[$NC][2],$enemies[$NC][3],$enemies[$NC][4],$enemies[$NC][5],$enemies[$NC][6],$enemies[$NC][7],$enemies[$NC][8],$enemies[$NC][9],$enemies[$NC][10],
	$enemies[$NC][11],$enemies[$NC][12],$enemies[$NC][13],$enemies[$NC][14],$enemies[$NC][15],$enemies[$NC][16],$enemies[$NC][17],$enemies[$NC][18],$enemies[$NC][19]);	
}
$NC = rand(0,count($enemies)-1);
if($i == 2){	
	array_push($loadR2, $enemies[$NC][0],$enemies[$NC][1],$enemies[$NC][2],$enemies[$NC][3],$enemies[$NC][4],$enemies[$NC][5],$enemies[$NC][6],$enemies[$NC][7],$enemies[$NC][8],$enemies[$NC][9],$enemies[$NC][10],
	$enemies[$NC][11],$enemies[$NC][12],$enemies[$NC][13],$enemies[$NC][14],$enemies[$NC][15],$enemies[$NC][16],$enemies[$NC][17],$enemies[$NC][18],$enemies[$NC][19]);
}
$NC = rand(0,count($enemies)-1);
if($i == 3){	
	array_push($loadR3, $enemies[$NC][0],$enemies[$NC][1],$enemies[$NC][2],$enemies[$NC][3],$enemies[$NC][4],$enemies[$NC][5],$enemies[$NC][6],$enemies[$NC][7],$enemies[$NC][8],$enemies[$NC][9],$enemies[$NC][10],
	$enemies[$NC][11],$enemies[$NC][12],$enemies[$NC][13],$enemies[$NC][14],$enemies[$NC][15],$enemies[$NC][16],$enemies[$NC][17],$enemies[$NC][18],$enemies[$NC][19]);
}
$NC = rand(0,count($enemies)-1);
if($i == 4){	
	array_push($loadR4, $enemies[$NC][0],$enemies[$NC][1],$enemies[$NC][2],$enemies[$NC][3],$enemies[$NC][4],$enemies[$NC][5],$enemies[$NC][6],$enemies[$NC][7],$enemies[$NC][8],$enemies[$NC][9],$enemies[$NC][10],
	$enemies[$NC][11],$enemies[$NC][12],$enemies[$NC][13],$enemies[$NC][14],$enemies[$NC][15],$enemies[$NC][16],$enemies[$NC][17],$enemies[$NC][18],$enemies[$NC][19]);
}
$NC = rand(0,count($enemies)-1);
if($i == 5){	
	array_push($loadR5, $enemies[$NC][0],$enemies[$NC][1],$enemies[$NC][2],$enemies[$NC][3],$enemies[$NC][4],$enemies[$NC][5],$enemies[$NC][6],$enemies[$NC][7],$enemies[$NC][8],$enemies[$NC][9],$enemies[$NC][10],
	$enemies[$NC][11],$enemies[$NC][12],$enemies[$NC][13],$enemies[$NC][14],$enemies[$NC][15],$enemies[$NC][16],$enemies[$NC][17],$enemies[$NC][18],$enemies[$NC][19]);
}


	
}

/*print_r($loadR1);
print_r($loadR2);
print_r($loadR3);
print_r($loadR4);
print_r($loadR5);*/

?>
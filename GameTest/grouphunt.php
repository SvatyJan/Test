
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
?>

<div class="main">
<?php

//ZJISTIT KOLIK JE POSTAV
// POKUD JE CLOVEK SAM, TAK SE PROTI NEMU NACTE JEN 1 BOT,
// POKUD JE V PARTE, TAK SE NACTE BOTU TOLIK, KOLIK JE HRACU V PARTE

$pocethracu = 0;


$loadL1 = array();
$loadL2 = array();
$loadL3 = array();
$loadL4 = array();
$loadL5 = array();

$username = $_SESSION["login"];

$dotaz = "SELECT * FROM game_party WHERE leader='$username' OR second='$username' OR third='$username' OR forth='$username' OR fifth='$username' LIMIT 1";
$result = mysqli_query($conn, $dotaz);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				
				$leader = $row["leader"];
				$second = $row["second"];
				$third = $row["third"];
				$forth = $row["forth"];
				$fifth = $row["fifth"];
				
				//echo $leader.$second.$third.$forth.$fifth;
				
				if($leader != ""){$pocethracu++;}
				if($second != ""){$pocethracu++;}
				if($third != ""){$pocethracu++;}
				if($forth != ""){$pocethracu++;}
				if($fifth != ""){$pocethracu++;}
				
				//echo $pocethracu;
				
				// NACTI DO LEVA CELOU PARTU				
				// FOR CYKLUS?? L1 = ITERACNI PROMENA ; username = HRAC
				
				// JMENO, HP, ARMOR, MR , DMG, STR, AGI, INTEL | WEAPON(ranged/melee) | passive , first ,second ,third, ultimate , icon1 , icon2 , icon3 , icon4 , icon5
				//   0  , 1,    2	 , 3  , 4  , 5  ,  6 ,  7    | 			8				 |    9    ,   10   ,  11    , 12  ,   13	  ,  14   , 15    , 16    , 17    ,  18
				
				//LoadL1 - LoadL5      -> jsou pole hracu
				
				include_once("grouphunt/nactistatyhracu.php");
				//echo "Pocet hracu: ".$pocethracu;
				
			}
		}
		else
		{
			$pocethracu = 1;
			// NACTI DO LEVA JEN USERNAME
			
			include_once("grouphunt/nactijenhrace.php");
			//echo "Pocet hracu: ".$pocethracu;
		}
		
		

// PODLE POCTU POSTAV NACIST LIDI/BOTY >> DOLEVA , DOPRAVA

include_once("grouphunt/nactipravo.php");

// NACIST STATY VSECH LIDI/BOTU
// NACIST ITEMY VSECH LIDI/BOTU

// <NACITANI>
/*echo "<strong>LEFT PLAYERS</strong>";
echo "<br>";
for($y = 1;$y <= $pocethracu;$y++){
if($y == 1){print_r($loadL1);echo "<br><br>";}
if($y == 2){print_r($loadL2);echo "<br><br>";}
if($y == 3){print_r($loadL3);echo "<br><br>";}
if($y == 4){print_r($loadL4);echo "<br><br>";}
if($y == 5){print_r($loadL5);echo "<br><br>";}
}

echo "<strong>RIGHT PLAYERS</strong>";
echo "<br>";
for($y = 1;$y <= $pocethracu;$y++){
if($y == 1){print_r($loadR1);echo "<br><br>";}
if($y == 2){print_r($loadR2);echo "<br><br>";}
if($y == 3){print_r($loadR3);echo "<br><br>";}
if($y == 4){print_r($loadR4);echo "<br><br>";}
if($y == 5){print_r($loadR5);echo "<br><br>";}
}*/
// </NACITANI>

// <INTERFACE>
//DODELAT ICONY SPELU A CYKLIT

$players = array($loadL1,$loadL2,$loadL3,$loadL4,$loadL5);
$bots		= array($loadR1,$loadR2,$loadR3,$loadR4,$loadR5);

//print_r($players[3]);
//echo $players[1][15];

$hraclevo = 0;
$hracpravo = 0;


echo "<div class='grouphunt-deska'>";

echo "<div class='grouphunt-levo'>";
for($x = 0;$x < $pocethracu;$x++) {
$nemamzbranurl = "punch.png";
if(@$players[$hraclevo][15] == ""){@$players[$hraclevo][15] = $nemamzbranurl;}
if(@$players[$hraclevo][16] == ""){@$players[$hraclevo][16] = $nemamzbranurl;}
if(@$players[$hraclevo][17] == ""){@$players[$hraclevo][17] = $nemamzbranurl;}
if(@$players[$hraclevo][18] == ""){@$players[$hraclevo][18] = $nemamzbranurl;}
if(@$players[$hraclevo][19] == ""){@$players[$hraclevo][19] = $nemamzbranurl;}
	
echo "<div class='grouphunthrac' >";
echo "<div class='grouphunticona' style='background-image:url(img/".$players[$hraclevo][1].")'>";
echo "</div>";
echo "<div class='grouphuntpassive' style='background-image:url(img/spells/".$players[$hraclevo][15].")'>";
echo "</div>";
echo "<div class='grouphuntultimate' style='background-image:url(img/spells/".$players[$hraclevo][19].")'>";
echo "</div>";
echo "<div class='grouphuntfirst' style='background-image:url(img/spells/".$players[$hraclevo][16].")'>";
echo "</div>";
echo "<div class='grouphuntsecond' style='background-image:url(img/spells/".$players[$hraclevo][17].")'>";
echo "</div>";
echo "<div class='grouphuntthird' style='background-image:url(img/spells/".$players[$hraclevo][18].")'>";
echo "</div>";
echo "</div>";

$hraclevo++;
}
echo "</div>";
echo "<div class='grouphunt-pravo'>";
for($x = 0;$x < $pocethracu;$x++) {
	
echo "<div class='grouphunthrac' >";
echo "<div class='grouphunticona' style='background-image:url(img/enemies/".$bots[$hracpravo][1].")'>";
echo "</div>";
echo "<div class='grouphuntpassive' style='background-image:url(img/spells/".$bots[$hracpravo][15].")'>";
echo "</div>";
echo "<div class='grouphuntultimate' style='background-image:url(img/spells/".$bots[$hracpravo][19].")'>";
echo "</div>";
echo "<div class='grouphuntfirst' style='background-image:url(img/spells/".$bots[$hracpravo][16].")'>";
echo "</div>";
echo "<div class='grouphuntsecond' style='background-image:url(img/spells/".$bots[$hracpravo][17].")'>";
echo "</div>";
echo "<div class='grouphuntthird' style='background-image:url(img/spells/".$bots[$hracpravo][18].")'>";
echo "</div>";
echo "</div>";

$hracpravo++;
}
echo "</div>";

echo "<div class='grouphunt-stred'>";
//echo "This is the stat board!<br><br>";
echo "<br><br>";


// </INTERFACE>

//VYPOCET SOUBOJE
// JMENO, HP, ARMOR, MR , DMG, STR, AGI, INTEL | WEAPON(ranged/melee) | passive , first ,second ,third, ultimate , icon1 , icon2 , icon3 , icon4 , icon5 , level
//   0  , 1,    2	 , 3  , 4  , 5  ,  6 ,  7    | 			8				 |    9    ,   10   ,  11    , 12  ,   13	  ,  14   , 15    , 16    , 17    ,  18	,  19

$fight = 0;
//DEFINOVAT POZICE
$kdohrajeL = 0;
$kdohrajeR = 0;

//DEFINOVAT TARGETY
$targetpoziceL = 0;
$targetpoziceR = 0;
$targetL = $players[$targetpoziceL][0];
$targetR = $bots[$targetpoziceR][0];

//DEFINOVAT KOUZLA
$spellpoziceL 	= 1;
$spellpoziceR 	= 1;

$kouzloL	 = "";
$kouzloP  = "";

while($fight < 50){

//bouchne jan, pak slimak1, pak 123, pak slimak2

if($kdohrajeL <= $pocethracu){
	
if($spellpoziceL == 1)	  {$kouzloL = $players[$kdohrajeL][11];}
elseif($spellpoziceL == 2){$kouzloL = $players[$kdohrajeL][12];}
elseif($spellpoziceL == 3){$kouzloL = $players[$kdohrajeL][13];}
elseif($spellpoziceL == 4){$kouzloL = $players[$kdohrajeL][14];}

if($spellpoziceR == 1)	  {$kouzloR = $bots[$targetpoziceL][11];}
elseif($spellpoziceR == 2){$kouzloR = $bots[$targetpoziceL][12];}
elseif($spellpoziceR == 3){$kouzloR = $bots[$targetpoziceL][13];}
elseif($spellpoziceR == 4){$kouzloR = $bots[$targetpoziceL][14];}

include("grouphunt/definujkouzla.php");

$kdohrajeL++;
$kdohrajeR++;

if($spellpoziceL >= 4){$spellpoziceL=0;}
if($spellpoziceR >= 4){$spellpoziceR=0;}



if(@$players[$targetpoziceL][2] <= 0){echo "<font color='#00FFFF;'><strong>".@$players[$targetpoziceL][0]."</strong></font> <font color='#FF2020;'>Died</font><br>";$targetpoziceL++;}
if(@$bots[$targetpoziceR][2] <= 0){echo "<font color='#00FFFF;'><strong>".@$bots[$targetpoziceR][0]."</strong></font> <font color='#FF2020;'>Died</font><br>";$targetpoziceR++;}
@$targetL = $players[$targetpoziceL][0];
@$targetR = $bots[$targetpoziceR][0];


}
if($kdohrajeL >= $pocethracu) {$kdohrajeL = 0;$spellpoziceL++;}
if($kdohrajeR >= $pocethracu) {$kdohrajeR = 0;$spellpoziceR++;}





//if($spellpoziceL == 1){		/*prvni kouzlo*/	$kouzloL = $players[$targetpoziceL][11];	$spellpoziceL++;}
//elseif($spellpoziceL == 2){/*druhe kouzlo*/	$kouzloL = $players[$targetpoziceL][12];	$spellpoziceL++;}
//elseif($spellpoziceL == 3){/*treti kouzlo*/	$kouzloL = $players[$targetpoziceL][13];	$spellpoziceL++;}
//elseif($spellpoziceL >= 4){/*ulti kouzlo*/	$kouzloL = $players[$targetpoziceL][14];	$spellpoziceL=1;}


//if($spellpoziceR == 1){	/*prvni kouzlo*/	$kouzloR = $bots[$targetpoziceL][11];	$spellpoziceR++;}
//elseif($spellpoziceR == 2){/*druhe kouzlo*/	$kouzloR = $bots[$targetpoziceL][12];	$spellpoziceR++;}
//elseif($spellpoziceR == 3){/*treti kouzlo*/	$kouzloR = $bots[$targetpoziceL][13];	$spellpoziceR++;}
//elseif($spellpoziceR >= 4){/*ulti kouzlo*/	$kouzloR = $bots[$targetpoziceL][14];	$spellpoziceR=1;}

//include("grouphunt/definujkouzla.php");


/*if(@$players[$targetpoziceL][2] <= 0){$targetpoziceL++; echo "<font color='#00FFFF;'><strong>".@$players[$targetpoziceL][0]."</strong></font> <font color='#FF2020;'>Died</font>.";}
if(@$bots[$targetpoziceR][2] <= 0){$targetpoziceR++; echo "<font color='#00FFFF;'><strong>".@$bots[$targetpoziceR][0]."</strong></font> <font color='#FF2020;'>Died</font>.";}
@$targetL = $players[$targetpoziceL][0];
@$targetR = $bots[$targetpoziceR][0];*/

//VYHERNI PODMINKY
if((@$players[0][2]) + (@$players[1][2]) + (@$players[2][2]) + (@$players[3][2]) + (@$players[4][2]) <= 0){
echo "<font color='#00FFFF;'><strong>".@$players[$targetpoziceL][0]."</strong></font> <font color='#FF2020;'>Died</font><br>";
echo "Left side lost.";echo "<br><br>"; $fight = 99;}


if((@$bots[0][2]) + (@$bots[1][2]) + (@$bots[2][2]) + (@$bots[3][2]) + (@$bots[4][2]) <= 0){
//echo "<font color='#00FFFF;'><strong>".@$bots[$targetpoziceR][0]."</strong></font> <font color='#FF2020;'>Died</font><br>";
echo "Right side lost.";echo "<br><br>"; $fight = 99;echo "<strong><a href='generations/huntloot.php' style='color:red;'>Claim Loot!</a></div></strong><br><br>";}
if($fight == 50){echo "Its a draw.";echo "<br><br>";}

$fight++;
}

echo "</div>";
echo "</div>";











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
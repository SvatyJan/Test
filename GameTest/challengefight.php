
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

$loadL1 = array();
$loadR1 = array();

$id1 = $_REQUEST["id1"];
$id2 = $_REQUEST["id2"];

$dotaz 	= "SELECT * FROM game_challenge WHERE challengerid1='$id1' AND challengerid2='$id2' LIMIT 1";
$vysledek = mysqli_query($conn,$dotaz);

if (mysqli_num_rows($vysledek) > 0) {
while ($row_challenge = mysqli_fetch_assoc($vysledek)) {

$player1 = $row_challenge["challenger1"];
$player2 = $row_challenge["challenger2"];

		}
}
$pocethracu = 1;

include_once("duel/nactilevo.php");
include_once("duel/nactipravo.php");

$hraclevo = 0;
$hracpravo = 0;


echo "<div class='grouphunt-deska'>";

echo "<div class='grouphunt-levo'>";
for($x = 0;$x < $pocethracu;$x++) {
$nemamzbranurl = "punch.png";
if(@$loadL1[15] == ""){@$loadL1[15] = $nemamzbranurl;}
if(@$loadL1[16] == ""){@$loadL1[16] = $nemamzbranurl;}
if(@$loadL1[17] == ""){@$loadL1[17] = $nemamzbranurl;}
if(@$loadL1[18] == ""){@$loadL1[18] = $nemamzbranurl;}
if(@$loadL1[19] == ""){@$loadL1[19] = $nemamzbranurl;}

if(@$loadL2[15] == ""){@$loadL2[15] = $nemamzbranurl;}
if(@$loadL2[16] == ""){@$loadL2[16] = $nemamzbranurl;}
if(@$loadL2[17] == ""){@$loadL2[17] = $nemamzbranurl;}
if(@$loadL2[18] == ""){@$loadL2[18] = $nemamzbranurl;}
if(@$loadL2[19] == ""){@$loadL2[19] = $nemamzbranurl;}
	
echo "<div class='grouphunthrac' >";
echo "<div class='grouphunticona' style='background-image:url(img/".$loadL1[1].")'>";
echo "</div>";
echo "<div class='grouphuntpassive' style='background-image:url(img/spells/".$loadL1[15].")'>";
echo "</div>";
echo "<div class='grouphuntultimate' style='background-image:url(img/spells/".$loadL1[19].")'>";
echo "</div>";
echo "<div class='grouphuntfirst' style='background-image:url(img/spells/".$loadL1[16].")'>";
echo "</div>";
echo "<div class='grouphuntsecond' style='background-image:url(img/spells/".$loadL1[17].")'>";
echo "</div>";
echo "<div class='grouphuntthird' style='background-image:url(img/spells/".$loadL1[18].")'>";
echo "</div>";
echo "</div>";

$hraclevo++;
}
echo "</div>";
echo "<div class='grouphunt-pravo'>";
for($x = 0;$x < $pocethracu;$x++) {
	
echo "<div class='grouphunthrac' >";
echo "<div class='grouphunticona' style='background-image:url(img/".$loadR1[1].")'>";
echo "</div>";
echo "<div class='grouphuntpassive' style='background-image:url(img/spells/".$loadR1[15].")'>";
echo "</div>";
echo "<div class='grouphuntultimate' style='background-image:url(img/spells/".$loadR1[19].")'>";
echo "</div>";
echo "<div class='grouphuntfirst' style='background-image:url(img/spells/".$loadR1[16].")'>";
echo "</div>";
echo "<div class='grouphuntsecond' style='background-image:url(img/spells/".$loadR1[17].")'>";
echo "</div>";
echo "<div class='grouphuntthird' style='background-image:url(img/spells/".$loadR1[18].")'>";
echo "</div>";
echo "</div>";

$hracpravo++;
}
echo "</div>";

echo "<div class='grouphunt-stred'>";
//echo "This is the stat board!<br><br>";
echo "<br><br>";

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
$targetL = $loadL1[0];
$targetR = $loadR1[0];

//DEFINOVAT KOUZLA
$spellpoziceL 	= 1;
$spellpoziceR 	= 1;

$kouzloL	 = "";
$kouzloP  = "";

while($fight < 50){

//bouchne jan, pak slimak1, pak 123, pak slimak2

if($kdohrajeL <= $pocethracu){
	
if($spellpoziceL == 1)	  {$kouzloL = $loadL1[11];}
elseif($spellpoziceL == 2){$kouzloL = $loadL1[12];}
elseif($spellpoziceL == 3){$kouzloL = $loadL1[13];}
elseif($spellpoziceL == 4){$kouzloL = $loadL1[14];}

if($spellpoziceR == 1)	  {$kouzloR = $loadR1[11];}
elseif($spellpoziceR == 2){$kouzloR = $loadR1[12];}
elseif($spellpoziceR == 3){$kouzloR = $loadR1[13];}
elseif($spellpoziceR == 4){$kouzloR = $loadR1[14];}

include("duel/definujkouzlalevo.php");
include("duel/definujkouzlapravo.php");

$kdohrajeL++;
$kdohrajeR++;

if($spellpoziceL >= 4){$spellpoziceL=0;}
if($spellpoziceR >= 4){$spellpoziceR=0;}



if(@$loadL1[2] <= 0){echo "<font color='#00FFFF;'><strong>".@$loadL1[0]."</strong></font> <font color='#FF2020;'>Died</font><br>";$targetpoziceL++;}
if(@$loadR1[2] <= 0){echo "<font color='#00FFFF;'><strong>".@$loadR1[0]."</strong></font> <font color='#FF2020;'>Died</font><br>";$targetpoziceR++;}
@$targetL = $loadL1[0];
@$targetR = $loadR1[0];


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
if((@$loadL1[2]) <= 0){
//echo "<font color='#00FFFF;'><strong>".@$loadL1[0]."</strong></font> <font color='#FF2020;'>Died</font><br>";
echo "Left side lost.";echo "<br><br>"; $fight = 99;}


if((@$loadR1[2]) <= 0){
//echo "<font color='#00FFFF;'><strong>".@$bots[$targetpoziceR][0]."</strong></font> <font color='#FF2020;'>Died</font><br>";
echo "Right side lost.";echo "<br><br>"; $fight = 99;
//echo "<strong><a href='generations/huntloot.php' style='color:red;'>Claim Loot!</a></div></strong><br><br>";}
}
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
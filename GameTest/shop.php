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

$id = $_SESSION["id"];
$level = $_SESSION["level"];
$lokace = $_REQUEST["lokace"];
$zona = $_REQUEST["zona"];

echo "<div class='shop'>";

echo "<div class='shopmenu'>";

echo "<a href='index.php?$lokace&zona=$zona'>Back</a>";

echo "</div>";
echo "<br>";

//ikonky postav
		$dotaz = "SELECT * FROM game_users WHERE id=$id LIMIT 1";
		$result = mysqli_query($conn, $dotaz);
		
			if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					
					$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
					$result_client = mysqli_query($conn, $dotaz_client);
		
						if (mysqli_num_rows($result_client) > 0) {
						while ($row_client = mysqli_fetch_assoc($result_client)) {
						
						$race = $row_client["race"];		
						$race = strtolower($race);
				
				$username = $row["username"];
				$icon = $row["icon"];
				
				if($icon == "default.png"){
					$src = "img/icons/".$icon;
					} else {
					$src = "img/".$race."/".$icon;	
					}			
					
					$obchodnik="img/characters/monk-face.png";
				
				
				echo "<div class='shopimg'>";
				//ty
				echo "<img class='hlavnifotka' style='margin-right:50%;' src='$src'>";
				
				//obchodnik
				echo "<img class='hlavnifotka' src='$obchodnik'>";
				echo "</div>";
				echo "<br>";
				
				
					}		
				}
			}
		}
		
//v levo nactu inv hrace
$dotaz_items = "SELECT * FROM game_items WHERE userid=$id LIMIT 27";
		$result_items = mysqli_query($conn, $dotaz_items);
		
		if(mysqli_num_rows($result_items) < 27){
			$rowcount = mysqli_num_rows($result_items);
			$zbytek = 26 - $rowcount;
			echo $rowcount."/27";
			
				for($i = 0 ;$i <= $zbytek;$i++) {
				echo '<div style="background-color:#CCCCCC;" ></div>';
				}
			
			}
echo "<div class='shopitemsborder'>";
echo '<div class="shopleftinv">';
//select 27 věcí z databáze itemu
		
			if (mysqli_num_rows($result_items) > 0) {
			while ($row_items = mysqli_fetch_assoc($result_items)) {
				
				$wepid = $row_items["id"];
				$userid = $row_items["userid"];
				$username = $row_items["username"];
				$itemname = $row_items["itemname"];
				$slot = $row_items["slot"];
				$armor = $row_items["armor"];
				$magicresist = $row_items["magicresist"];
				$damage = $row_items["damage"];
				$dmgtype = $row_items["dmgtype"];
				$str = $row_items["str"];
				$agi = $row_items["agi"];
				$intel = $row_items["intel"];
				$icon = $row_items["icon"];
				
				//do slotu se u zbrani musi psat weapon/melee a weapon/ranged
				$url = "img/items/"."$slot"."/"."$icon";
				$staty = "";						
				
				if($armor > 0){$staty = ($staty." +"."$armor"." Armor<br>");}
				if($magicresist > 0){$staty = ($staty." +"."$magicresist"." MR<br>");}
				if($damage > 0){$staty = ($staty." +"."$damage"." Dmg<br>");}
				if($str > 0){$staty = ($staty." +"."$str"." Str<br>");}
				if($agi > 0){$staty = ($staty." +"."$agi"." Agi<br>");}
				if($intel > 0){$staty = ($staty." +"."$intel"." Intel<br>");}				
				
				/*echo "<a><div class='textOverItem' style='background-image:url($url)' data-text='$itemname $staty'>";
				echo "<a href=''><div style='z-index:-1;color:#FF0000;'>Sell</div></a>";
				echo "</div></a>";*/
				
				echo "<a href='sellitem.php?itemid=$wepid&lokace=modralokace&zona=5&trading'>
				<div class='container' style='background-image:url($url)'>";
				echo "<p style='text-align:center;font-size:28px;color:#FF0000;'><strong>Sell</strong></p>";
  				echo "<div class='overlay'><strong>$itemname</strong></div>";
  				echo "<div class='dolnioverlay'>
  				<div class='itemtext'>
  				$staty
  				</div>
  				</div>";  
				echo "</div></a>";

			}
		}
		//v pravo inv obchodu (6polozek)

echo "</div>";




echo "<div class='shoprightinv'>"; //udelej 9 policek , background-image je obrazek itemu
for($y = 0; $y < 9; $y++) {
//item slot
$rnditemslot = rand(1,4);
if($rnditemslot == 1){$itemslot = "boots";$dir = "img/items/boots";}
if($rnditemslot == 2){$itemslot = "head";$dir = "img/items/head";}
if($rnditemslot == 3){$itemslot = "chest";$dir = "img/items/chest";}
//zbran (melee nebo ranged)
if($rnditemslot == 4){
	$itemslot = "weapon";
	$rangeormelee = rand(1,2);
	if($rangeormelee == 1){$weprange = "melee";$dir = "img/items/weapon/melee"; $itemslot = $itemslot."/".$weprange;}
	if($rangeormelee == 2){$weprange = "ranged";$dir = "img/items/weapon/ranged";$itemslot = $itemslot."/".$weprange;}
	}

//kvalita veci
$quality = rand(1,2);

$cost = rand(20*$level,50*$level);

if($quality > 1){$cost += 50;}

if($quality == 1){
if($rnditemslot == 4){$rndstat1 = rand(1,6);}
else{$rndstat1 = rand(1,5);}}

if($quality == 2){
if($rnditemslot == 4){$rndstat1 = rand(1,6);@$rndstat2 = rand(1,6);}
else{$rndstat1 = rand(1,5);@$rndstat2 = rand(1,5);}}

$bonus = "";

if($rndstat1 == 1){$bonus = $rndstat1 = "+ Armor ".rand($level,$level*2)."<br>";}
if($rndstat1 == 2){$bonus = $rndstat1 = "+ MR ".rand($level,$level*2)."<br>";}
if($rndstat1 == 3){$bonus = $rndstat1 = "+ Str ".rand($level,$level*2)."<br>";}
if($rndstat1 == 4){$bonus = $rndstat1 = "+ Agi ".rand($level,$level*2)."<br>";}
if($rndstat1 == 5){$bonus = $rndstat1 = "+ Intel ".rand($level,$level*2)."<br>";}
if($rndstat1 == 6){$bonus = $rndstat1 = "+ Dmg".rand($level*2,$level*5)."<br>";}

if(@$rndstat2 == 1){$bonus = $rndstat1 = $rndstat1."+ Armor ".rand($level,$level*2)."<br>";}
if(@$rndstat2 == 2){$bonus = $rndstat1 = $rndstat1."+ MR ".rand($level,$level*2)."<br>";}
if(@$rndstat2 == 3){$bonus = $rndstat1 = $rndstat1."+ Str ".rand($level,$level*2)."<br>";}
if(@$rndstat2 == 4){$bonus = $rndstat1 = $rndstat1."+ Agi ".rand($level,$level*2)."<br>";}
if(@$rndstat2 == 5){$bonus = $rndstat1 = $rndstat1."+ Intel ".rand($level,$level*2)."<br>";}
if(@$rndstat2 == 6){$bonus = $rndstat1 = $rndstat1."+ Dmg ".rand($level*2,$level*5)."<br>";}

//obrazek a itemname

$adresar = scandir($dir);
//print_r($adresar);
$rndicon = rand(2,count($adresar)-2);

$icon = $adresar[$rndicon];
$itemname = explode(".", $icon);

$url = $dir."/".$icon;
	
//echo "<div style='display:inline-block;width:128px;height:128px;background-color:grey;background-image:url($url)'></div>";
/*echo "<a><div class='textOverItem' style='background-image:url($url)' data-text='$itemname[0] $rndstat1'>";
echo "<a href=''><div style='z-index:-1;color:#00FF00;'>Buy</div></a>";
echo "</div></a>";*/

echo "<a href='buyitem.php?itemname=$itemname[0]&stats=$bonus&cost=$cost&slot=$itemslot&icon=$icon&lokace=modralokace&zona=5&trading'><div class='container' style='background-image:url($url)'>";
echo "<p style='text-align:center;font-size:28px;color:#00FF00;'><strong>Buy</strong></p>";
echo "<div class='overlay'><strong>$itemname[0]</strong></div>";
echo "<div class='dolnioverlay'>
<div class='itemtext'>
$rndstat1
<br>
Cost $cost
<br>
</div>
</div>";  
echo "</div></a>";
				

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
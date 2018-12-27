<?php
session_start();
include_once("connect.php");

$id = $_SESSION["id"];
$username = $_SESSION["login"];

$itemname = $_REQUEST["itemname"];
$stats = $_REQUEST["stats"];
$cost = $_REQUEST["cost"];
$slot = $_REQUEST["slot"];
$icon = $_REQUEST["icon"];

$lokace = $_REQUEST["lokace"];
$zona   = $_REQUEST["zona"];

$stats = trim($stats,"<br>");
$stats = trim($stats," ");
//echo $stats;
echo "<br>";

$expstats = explode(" ",$stats);

$pocetstatu = 0;

/*echo "kam to patri ".$expstats[0];
echo "<br>";
echo "hodnota ".$expstats[1];
echo "<br>";*/

$hodnota1 = $expstats[1];
$hodnota2 = $expstats[4];

if($expstats[0] == "Armor"){$kam1="armor";}
if($expstats[0] == "MR"){$kam1="magicresist";}
if($expstats[0] == "Dmg"){$kam1="damage";}
if($expstats[0] == "Str"){$kam1="str";}
if($expstats[0] == "Agi"){$kam1="agi";}
if($expstats[0] == "Intel"){$kam1="intel";}

if($expstats[3] == "Armor"){$kam2="armor";}
if($expstats[3] == "MR"){$kam2="magicresist";}
if($expstats[3] == "Dmg"){$kam2="damage";}
if($expstats[3] == "Str"){$kam2="str";}
if($expstats[3] == "Agi"){$kam2="agi";}
if($expstats[3] == "Intel"){$kam2="intel";}


if(@$expstats[3] != "" && @$expstats[4] != "")
{
/*echo "kam to patri ".@$expstats[3];
echo "<br>";
echo "hodnota ".@$expstats[4];
echo "<br>";*/

$pocetstatu = 2;

}
else 
{
$pocetstatu = 1;
}

//echo $pocetstatu;

$gold = round(($cost / 2),0);
$currency = "";

					$dotaz_client = "SELECT * FROM game_client WHERE id='$id' LIMIT 1";
					$result_client = mysqli_query($conn, $dotaz_client);
		
						if (mysqli_num_rows($result_client) > 0) {
						while ($row_client = mysqli_fetch_assoc($result_client)) {
							
							$currency = $row_client["currency"];
							
						}
					}
$rozdil = $currency-$cost;

//echo "stoji to ".$gold;


	//zjistim jestli ma hrac misto v inventari
	$dotaz = "SELECT * FROM game_items WHERE id='$id'";
	$vysledek = mysqli_query($conn, $dotaz);
	
	if (mysqli_num_rows($vysledek) >= 27) {
	echo "Hrac ma plny inventar!";
	}
		/*echo $pocetstatu;
		echo $kam1."<br>".$hodnota1;
		echo $kam2."<br>".$hodnota2;*/
		
		if($kam1 == $kam2){
		$hodnota1 = $hodnota1+$hodnota2;
		$pocetstatu = 1;
		}
		
		if($cost > $currency)
		{
			
			echo "Nemas dostatek penez.";
			
		}
		else
		{
			
			//dam item hracovi
		if($pocetstatu == 1)
		{
		$vlozeni = $vlozeni = "INSERT INTO game_items (userid, username, itemname, gold, slot,icon ,$kam1)
		VALUES ('$id', '$username', '$itemname', '$gold', '$slot','$icon','$hodnota1')";
		}
		
		if($pocetstatu == 2)
		{
		$vlozeni = $vlozeni = "INSERT INTO game_items (userid, username, itemname, gold, slot,icon ,$kam1,$kam2)
		VALUES ('$id', '$username', '$itemname', '$gold', '$slot','$icon','$hodnota1','$hodnota2')";
		}
		$pridani = mysqli_query($conn, $vlozeni);
		
		
		//odeberu penize hracovi
		$dotaz = "UPDATE game_client SET currency='$rozdil' WHERE ID='$id'";
		$vysledek = mysqli_query($conn, $dotaz);
			
		}
		
		
		
header("Location:shop.php?lokace=$lokace&zona=$zona&trading");
?>
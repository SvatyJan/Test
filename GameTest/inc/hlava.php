<div class="hlava">
<?php
session_start();
include_once("connect.php");
include_once("generations/enemylist.php");


@$jmeno = $_SESSION["login"];

if(isset($jmeno)){
	include_once("chat/chat.php");
	//parta v levo
	$dotaz_party = "SELECT * FROM game_party WHERE leader='$jmeno' OR second='$jmeno' OR third='$jmeno' OR forth='$jmeno' OR fifth='$jmeno' LIMIT 1";

	$result_party = mysqli_query($conn, $dotaz_party);
	
	
	
	
	if (mysqli_num_rows($result_party) > 0) {
		echo "<div class='groupborder'>";

	while ($row_party = mysqli_fetch_assoc($result_party)) {
		
		$leader		= $row_party["leader"];
		$second		= $row_party["second"];
		$third		= $row_party["third"];
		$forth		= $row_party["forth"];
		$fifth		= $row_party["fifth"];
		
		$dotaz_users = "SELECT * FROM game_users WHERE username='$leader' LIMIT 1";

		$result_users = mysqli_query($conn, $dotaz_users);
		if (mysqli_num_rows($result_users) > 0) {

		while ($row_users = mysqli_fetch_assoc($result_users)) {
			
		$dotaz_rasa = "SELECT * FROM game_client WHERE username='$leader' LIMIT 1";

		$result_rasa = mysqli_query($conn, $dotaz_rasa);
		if (mysqli_num_rows($result_rasa) > 0) {

		while ($row_rasa = mysqli_fetch_assoc($result_rasa)) {
			$race = $row_rasa["race"];
			$race = strtolower($race);	
			$icon = $row_users["icon"];
			
			$url = "img/".$race."/".$icon;
			
			if($_SESSION["login"] == $leader) {echo "<a href='removefromparty.php?username=$leader'>";}			
			echo "<div class='groupbox' style='background-image:url($url)'>";
			echo "<div class='groupoverlay'>";
			echo "<strong>".$leader."</strong>";
			echo "</div>";
			echo "</div>";
			if($_SESSION["login"] == $leader) {echo "</a>";}
			
					}
				}
			}
		}
		
		$dotaz_users = "SELECT * FROM game_users WHERE username='$second' LIMIT 1";

		$result_users = mysqli_query($conn, $dotaz_users);
		if (mysqli_num_rows($result_users) > 0) {

		while ($row_users = mysqli_fetch_assoc($result_users)) {
			
		$dotaz_rasa = "SELECT * FROM game_client WHERE username='$second' LIMIT 1";

		$result_rasa = mysqli_query($conn, $dotaz_rasa);
		if (mysqli_num_rows($result_rasa) > 0) {

		while ($row_rasa = mysqli_fetch_assoc($result_rasa)) {
			$race = $row_rasa["race"];
			$race = strtolower($race);	
			$icon = $row_users["icon"];
			
			$url = "img/".$race."/".$icon;
			
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $second) {echo "<a href='removefromparty.php?username=$second'>";}	
			echo "<div class='groupbox' style='background-image:url($url)'>";
			echo "<div class='groupoverlay'>";
			echo "<strong>".$second."</strong>";
			echo "</div>";
			echo "</div>";
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $second) {echo "</a>";}
					}
				}
			}
		}
		
		$dotaz_users = "SELECT * FROM game_users WHERE username='$third' LIMIT 1";

		$result_users = mysqli_query($conn, $dotaz_users);
		if (mysqli_num_rows($result_users) > 0) {

		while ($row_users = mysqli_fetch_assoc($result_users)) {
			
		$dotaz_rasa = "SELECT * FROM game_client WHERE username='$third' LIMIT 1";

		$result_rasa = mysqli_query($conn, $dotaz_rasa);
		if (mysqli_num_rows($result_rasa) > 0) {

		while ($row_rasa = mysqli_fetch_assoc($result_rasa)) {
			$race = $row_rasa["race"];
			$race = strtolower($race);
			$icon = $row_users["icon"];
			
			$url = "img/".$race."/".$icon;
			
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $third) {echo "<a href='removefromparty.php?username=$third'>";}			
			echo "<div class='groupbox' style='background-image:url($url)'>";
			echo "<div class='groupoverlay'>";
			echo "<strong>".$third."</strong>";
			echo "</div>";
			echo "</div>";
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $third) {echo "</a>";}
			
					}
				}
			}
		}
		
		$dotaz_users = "SELECT * FROM game_users WHERE username='$forth' LIMIT 1";

		$result_users = mysqli_query($conn, $dotaz_users);
		if (mysqli_num_rows($result_users) > 0) {

		while ($row_users = mysqli_fetch_assoc($result_users)) {
			
		$dotaz_rasa = "SELECT * FROM game_client WHERE username='$forth' LIMIT 1";

		$result_rasa = mysqli_query($conn, $dotaz_rasa);
		if (mysqli_num_rows($result_rasa) > 0) {

		while ($row_rasa = mysqli_fetch_assoc($result_rasa)) {
			$race = $row_rasa["race"];
			$race = strtolower($race);
			$icon = $row_users["icon"];
			
			$url = "img/".$race."/".$icon;
			
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $forth) {echo "<a href='removefromparty.php?username=$forth'>";}			
			echo "<div class='groupbox' style='background-image:url($url)'>";
			echo "<div class='groupoverlay'>";
			echo "<strong>".$forth."</strong>";
			echo "</div>";
			echo "</div>";
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $forth) {echo "</a>";}
			
					}
				}
			}
		}
		
		$dotaz_users = "SELECT * FROM game_users WHERE username='$fifth' LIMIT 1";

		$result_users = mysqli_query($conn, $dotaz_users);
		if (mysqli_num_rows($result_users) > 0) {

		while ($row_users = mysqli_fetch_assoc($result_users)) {
			
		$dotaz_rasa = "SELECT * FROM game_client WHERE username='$fifth' LIMIT 1";

		$result_rasa = mysqli_query($conn, $dotaz_rasa);
		if (mysqli_num_rows($result_rasa) > 0) {

		while ($row_rasa = mysqli_fetch_assoc($result_rasa)) {
			$race = $row_rasa["race"];
			$race = strtolower($race);
			$icon = $row_users["icon"];
			
			$url = "img/".$race."/".$icon;
			
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $fifth) {echo "<a href='removefromparty.php?username=$fifth'>";}			
			echo "<div class='groupbox' style='background-image:url($url)'>";
			echo "<div class='groupoverlay'>";
			echo "<strong>".$fifth."</strong>";
			echo "</div>";
			echo "</div>";
			if($_SESSION["login"] == $leader || $_SESSION["login"] == $fifth) {echo "</a>";}
			
					}
				}
			}
		}
		
		
		}
		echo "</div>";
	}
	
	
	
	
	
	
	
		
	
	
	
	//penize v pravo
	$dotaz_client = "SELECT * FROM game_client WHERE username='$jmeno' LIMIT 1";

	$result_client = mysqli_query($conn, $dotaz_client);
		
	if (mysqli_num_rows($result_client) > 0) {

	while ($row_client = mysqli_fetch_assoc($result_client)) {
		
		$currency = $row_client["currency"];
		$irlcurr	 = $row_client["irlcurrency"];
		
		echo "<div class='currency'>";
		echo "<div style='font-size:38px;right:2%;'><img src='img/gold.png' style='width:30px;height:30px;'>"."$currency</div>";
		echo "<div style='font-size:38px;right:2%;top:50px;'><img src='img/diamonds.png' style='width:30px;height:30px;'>"."$irlcurr</div>";
		echo "</div>";
		
			}
		}
	}
	
	//MAILBOX
	
	if(isset($_SESSION["login"])){
	$tveid=$_SESSION["id"];
	$tvejmeno = $_SESSION["login"];
	$invselect = "SELECT * FROM game_invites WHERE userid2='$tveid' OR username2='$tvejmeno'";
	$invresult = mysqli_query($conn,$invselect);
	
	$invrows = mysqli_num_rows($invresult);
	
	$friendinvselect = "SELECT * FROM game_friends WHERE userid2='$tveid' AND friends='0' OR username2='$tvejmeno' AND friends='0'";
	$friendinvresult = mysqli_query($conn,$friendinvselect);
	
	$dotaz_levelup = "SELECT * FROM game_client WHERE id='$tveid' LIMIT 1";

		$result_levelup = mysqli_query($conn, $dotaz_levelup);		
		if (mysqli_num_rows($result_levelup) > 0) {

			while ($row_levelup = mysqli_fetch_assoc($result_levelup)) {
				
				$xp = $row_levelup["xp"];
				$level = $row_levelup["level"];
				
				if($xp >= ($level*100)){$invrows++;}
				
			}
		}
	
	$invrows += mysqli_num_rows($friendinvresult);
	
	$dotaz_challenge = "SELECT * FROM game_challenge WHERE challenger2='$jmeno' AND pending=0";

	$result_challenge = mysqli_query($conn, $dotaz_challenge);
	
	if(mysqli_num_rows(@$result_challenge) > 0){
	$invrows = ($invrows) + (mysqli_num_rows(@$result_challenge));
	}
	
	
	
	
		
	echo "<div class='mailbox' style='background-image:url(img/alert.png)'>";
	echo "<a href='profilmailbox.php?id=$tveid'><div class='mailboxoverlay' ><strong>$invrows</strong></div></a>"; // tady selectnu vsechno ze zprav a invitu
	echo "</div>";	
	}
	
	
	$dotaz_config = "SELECT * FROM game_config";

	$result_config = mysqli_query($conn, $dotaz_config);
		
	if (mysqli_num_rows($result_config) > 0) {

	while ($row_config = mysqli_fetch_assoc($result_config)) {
		
		$gamename = $row_config["gamename"];
		
		echo "<h1>$gamename</h1>";
	}
}?>
<?php
$dotaz_timer = "SELECT * FROM game_timer WHERE username='$jmeno' LIMIT 1";

	$result_timer = mysqli_query($conn, $dotaz_timer);
		
	if (mysqli_num_rows($result_timer) > 0) {

	while ($row_timer = mysqli_fetch_assoc($result_timer)) {
		
		$minuty = date("i");
		$sekundy = date("s");
		
		$userid = $row_timer["userid"];
		$username = $row_timer["username"];
		$start = $row_timer["start"];
		$expire = $row_timer["expire"];
		$cancel = $row_timer["cancel"];
		$reason = $row_timer["reason"];
		
		$realtime = explode(":",date("i:s"));
		$zacatek = explode(":",$start);
		$konec = explode(":",$expire);
		
		echo "<div class='timer'>";
		echo "Realtime : ".$realtime[0].":".$realtime[1];
		echo "<br>";
		echo "Start : ".$zacatek[0].":".$zacatek[1];
		echo "<br>";
		echo "Expire : ".$expire;
		echo "</div>";
		
		$tedcasvsekundach = ($realtime[0] * 60) + $realtime[1];
		$koneccasvsekundach = ($konec[0] * 60) + $konec[1];
		/*echo $tedcasvsekundach;
		echo "-";		
		echo $koneccasvsekundach;
		echo "<br>";
		echo $tedcasvsekundach-$koneccasvsekundach;
		echo "<br>";*/
		
		if($tedcasvsekundach >= $koneccasvsekundach ){
			$smaz_timer = "DELETE FROM game_timer WHERE username='$username'";

			$result_smaz = mysqli_query($conn, $smaz_timer);
			//naprogramuj odmenu;
			echo "ok";
			}
	}
}




/*echo $_SESSION["login"].	$_SESSION["id"].$_SESSION["level"].	$_SESSION["onjourney"];*/
?>
<a href="index.php" >
<div class="menu">
Home
</div>
</a>

<?php
if(!isset($_SESSION["login"])){
?>
<a href="register.php" >
<div class="menu">
Create Character
</div>
</a> 
<?php
}

if(isset($_SESSION["login"])){
$id = $_SESSION["id"];
echo "<a href='profil.php?id=$id'>";
echo "<div class='menu'>";
echo $_SESSION["login"];
echo "</div>";
echo "</a>";

?>
<a href="social.php">
<div class="menu">
Social
</div>
</a>
<?php
}
?>

<a href="help.php" >
<div class="menu">
Help
</div>
</a>

<?php
if(isset($_SESSION["login"])){
?>
<a href="logout.php" >
<div class="menu">
Logout
</div>
</a>
<?php
}
?>



<br>
<br>
</div>
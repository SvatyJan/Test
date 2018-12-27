<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
$id = $_REQUEST["id"];
?>

<div class="main">
<?php
include_once("inc/profilmenu.php");
?>
<?php

if($id != $_SESSION["id"]){
	header("Location:index.php");
}

		$dotaz = "SELECT * FROM game_users WHERE id=$id LIMIT 1";
		$result = mysqli_query($conn, $dotaz);
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$username = $row["username"];
				$icon = $row["icon"];
				
				$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
				$result_client = mysqli_query($conn, $dotaz_client);
		
				if (mysqli_num_rows($result_client) > 0) {
				while ($row_client = mysqli_fetch_assoc($result_client)) {
				$race = $row_client["race"];		
				$race = strtolower($race);
						
				if($icon == "default.png"){
					$src = "img/icons/".$icon;
					} else {
					$src = "img/".$race."/".$icon;	
					}			
				
				echo "<img class='hlavnifotka' style='border:5px solid white;' src='$src'>";
				echo "<br>";
				echo "<strong>$username</strong>";
				echo "<br>";
				echo "<br>";
				
					}
				}
			}
		}
		
		//pozvánky
		$dotaz_inv = "SELECT * FROM game_invites WHERE userid2=$id";
		$result_inv = mysqli_query($conn, $dotaz_inv);
		
		if (mysqli_num_rows($result_inv) > 0) {
			while ($row_inv = mysqli_fetch_assoc($result_inv)) {
				
				$username1 = $row_inv["username1"];
				
				echo "<strong>".$username1."</strong>"." Has invited you to a Party!"." <a style='color:#00AA00;' href='acceptinvite.php?kdopozval=$username1'>Accept</a>
				<a style='color:#FF0000;' href='declineinvite.php'>Decline</a>";
				
			}
		}
		
		$dotaz = "SELECT * FROM game_friends";
				$result = mysqli_query($conn, $dotaz);
		
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					
								$friends = $row["friends"];
								$id1		= $row["userid1"];
								$id2		= $row["userid2"];
								$user1	= $row["username1"];
								$user2	= $row["username2"];
									
									
								//čekání na potvrzení
									if($id1 == $id && $friends == 0){
									
									echo "<br>";
									echo "You are waiting for  <strong>$user2</strong> to accept friendship.";
									echo "<br>";
									
									}
									
									
									//potvrzuješ
									if($id2 == $id && $friends == 0) {
										
									echo "<br>";
									echo $user1." Has invited you to a friend."; // potvrdit - odmitnout
									echo "<a href='acceptfriend.php?id=$id1'>Accept</a>"; echo " nebo ";
									echo "<a href='declinefriend.php?id=$id1'>Decline</a>";
									echo "<br>";
										
									}


				
							}
						}
						
		$dotaz_levelup = "SELECT * FROM game_client WHERE id='$id' LIMIT 1";
		$result_levelup = mysqli_query($conn, $dotaz_levelup);
		
		if (mysqli_num_rows($result_levelup) > 0) {
			while ($row_levelup = mysqli_fetch_assoc($result_levelup)) {
				
				$xp = $row_levelup["xp"];
				$level = $row_levelup["level"];
				
				if($xp >= ($level*100)){echo "You can level up! ";echo "<a href='profil.php?id=$id'>$jmeno</a>";}	
				
			}
		}
		
		$dotaz_challenge = "SELECT * FROM game_challenge WHERE challengerid2='$id' AND pending=0";
		$result_challenge = mysqli_query($conn, $dotaz_challenge);
		
		if (mysqli_num_rows($result_challenge) > 0) {
			while ($row_challenge = mysqli_fetch_assoc($result_challenge)) {
				
				$challengeid = $row_challenge["id"];
				$challenger1 = $row_challenge["challenger1"];
				$challenger2 = $row_challenge["challenger2"];
				$challid1 = $row_challenge["challengerid1"];
				$challid2 = $row_challenge["challengerid2"];
				
				echo "<br>";
				echo "<strong>$challenger1</strong> has challenged <strong>You</strong>!";
				echo "<a style='color:#00FF00;' href='duel/acceptchallenge.php?id1=$challid1&id2=$challid2'>   Accept!</a>";
				echo "<a style='color:#FF0000;' href='duel/declinechallenge.php?id=$challengeid'>   Decline!</a>";
				echo "<br>";
				
				
			}
		}
		
		

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
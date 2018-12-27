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

		//echo $id;		

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
				
				echo "<img class='hlavnifotka' style='border:5px solid white;' src='$src'>";
				echo "<br>";
				echo "<strong>$username</strong>";
				echo "<br>";
				echo "<br>";
				
				$targetname = @$_REQUEST["targetname"];
				if(isset($_REQUEST["alreadysent"])){
				echo "<strong>You already invited ".$targetname."</strong>";
				echo "<br>";
				}
				if(isset($_REQUEST["inparty"])){
				echo "<strong>".$targetname."Is already in party!</strong>";	
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
									echo "čekáš až $user2 přijme přátelství.";
									echo "<br>";
									
									}
									
									
									//potvrzuješ
									if($id2 == $id && $friends == 0) {
										
									/*echo "<br>";
									echo $user1." tě pozval k přátelství."; // potvrdit - odmitnout
									echo "<a href='acceptfriend.php?id=$id1'>přijmout</a>"; echo " nebo ";
									echo "<a href='declinefriend.php?id=$id1'>odmitnout</a>";
									echo "<br>";*/
										
									}

									//už jste přátelé
									if($id1 == $id && $friends == 1){
										/*echo "Jsi přítel s "."<a href='profil.php?id=$id2' >$user2</a><a href='deletefriend.php?id=$id2' style='margin-left:80px;'>X</a>";
										echo "<br>";*/
										
										$dotaz_users = "SELECT * FROM game_users WHERE username='$user2' limit 1";
										$result_users = mysqli_query($conn, $dotaz_users);
		
										if (mysqli_num_rows($result_users) > 0) {
										while ($row_users = mysqli_fetch_assoc($result_users)) {
											
											$dotaz_client = "SELECT * FROM game_client WHERE username='$user2' limit 1";
											$result_client = mysqli_query($conn, $dotaz_client);
											
											if (mysqli_num_rows($result_client) > 0) {
											while ($row_client = mysqli_fetch_assoc($result_client)) {
											
											$icon = $row_users["icon"];
											$race = $row_client["race"];
											$race = strtolower($race);
											
											$url = "img/".$race."/".$icon;
											
											echo "<div class='friendborder'>";
											echo "<a href='deletefriend.php?id=$id2' style='float:right;color:#FF0000;'>X</a>";
											echo "<a href='invite.php?id=$id2' style='float:left;color:#009020;'><strong>Invite</strong></a>";
											echo "<img style='width:64px;height:64px;' src='$url'>";
											echo "<a href='profil.php?id=$id2'><strong>$user2</strong></a>";
											echo "</div>";
											
													}
												}
											}
										}
										
										
									}
									
									if($id2 == $id && $friends == 1){
										/*echo "Jsi přítel s "."<a href='profil.php?id=$id1' >$user1</a><a href='deletefriend.php?id=$id1' style='margin-left:80px;'>X</a>";
										echo "<br>";*/
										
										$dotaz_users = "SELECT * FROM game_users WHERE username='$user1' limit 1";
										$result_users = mysqli_query($conn, $dotaz_users);
		
										if (mysqli_num_rows($result_users) > 0) {
										while ($row_users = mysqli_fetch_assoc($result_users)) {
											
											$dotaz_client = "SELECT * FROM game_client WHERE username='$user1' limit 1";
											$result_client = mysqli_query($conn, $dotaz_client);
											
											if (mysqli_num_rows($result_client) > 0) {
											while ($row_client = mysqli_fetch_assoc($result_client)) {
											
											$icon = $row_users["icon"];
											$race = $row_client["race"];
											$race = strtolower($race);
											
											$url = "img/".$race."/".$icon;
											
											echo "<div class='friendborder'>";
											echo "<a href='deletefriend.php?id=$id1' style='float:right;color:#FF0000;'>X</a>";
											echo "<a href='invite.php?id=$id1' style='float:left;color:#009020;'><strong>Invite</strong></a>";
											echo "<img style='width:64px;height:64px;' src='$url'>";
											echo "<a href='profil.php?id=$id1'><strong>$user1</strong></a>";
											echo "</div>";
											
													}
												}
											}
										}
									}
				
							}
						}
					}		
				}
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
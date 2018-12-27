<?php
session_start();
include_once("connect.php");

$id1 = $_SESSION["id"];
$username1 = $_SESSION["login"];

$id2 = $_REQUEST["id"];



		$dotaz = "SELECT * FROM game_users WHERE id=$id2 LIMIT 1";
		$result = mysqli_query($conn, $dotaz);
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				
				$username2 = $row["username"];
				
				
				/*echo $id1.$username1;
				echo "<br>";
				echo $id2.$username2;*/
				
				$pending = 0;
				
				//zkontroluj
				$dotaz_friends = "SELECT * FROM game_friends WHERE username1 = '$username1' AND username2 = '$username2' OR username2 = '$username1' AND username1 = '$username2'";
				$result_friends = mysqli_query($conn, $dotaz_friends);
				
				if(mysqli_num_rows($result_friends) >= 1){
					echo "uz tam jsi";
					} else {
						$dotaz_insert = "INSERT INTO game_friends (userid1, userid2, username1, username2,friends) VALUES ('$id1','$id2','$username1','$username2','$pending')";
						$result_insert = mysqli_query($conn, $dotaz_insert);
					}

			}
		}

header("Location:profil.php?id=$id2");


?>
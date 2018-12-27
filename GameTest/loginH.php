<?php
	include_once ("connect.php");
	$username 	= htmlspecialchars($_POST["username"]);
	$password 	= htmlspecialchars($_POST["password"]);
	
	$username = trim($username);
						
				$dotaz = mysqli_query($conn,"SELECT * FROM game_users WHERE username = '$username' AND password = '$password' LIMIT 1");
				$row 			= mysqli_fetch_assoc($dotaz);
				
				$dotaz_client = mysqli_query($conn,"SELECT * FROM game_client WHERE username = '$username' LIMIT 1");
				$row_client 			= mysqli_fetch_assoc($dotaz_client);
				
				
				echo mysqli_num_rows($dotaz);
						
				if(mysqli_num_rows($dotaz) > 0){
					session_start();
					$_SESSION["login"] 				= $row["username"];
					$_SESSION["id"] 					= $row["id"];
					$_SESSION["level"]				= $row_client["level"];
					$_SESSION["onjourney"]			= $row_client["onjourney"];
					$_SESSION["race"]					= $row_client["race"];
					$_SESSION["icon"]					= $row_users["icon"];
					
					
					//echo $username;
					header("Location: index.php");
				}
				else {
				header("Location: index.php?neuspech");
				}
?>
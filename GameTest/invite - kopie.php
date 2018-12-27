<?php
session_start();
include_once("connect.php");

//když žádná parta neni tak vytvořim
//pozvu pozvánku pro kamaráda

//kamarád přijme pozvánku a je dosazen na nejvyšší volné místo z 5
$tveid = $_SESSION["id"];
$tvejmeno = $_SESSION["login"];

$targetid = $_REQUEST["id"];

$username = "";


				//zjisti jestli hrac uz neni v parte
					$dotaz_target = "SELECT * FROM game_users WHERE id='$targetid' LIMIT 1";
					$result_target = mysqli_query($conn, $dotaz_target);
					
					if (mysqli_num_rows($result_target) > 0) {
					while ($row_target = mysqli_fetch_assoc($result_target)) {
						
						$username = $row_target["username"];
						
					}
				}
				
				$dotaz_jevparte = "SELECT * FROM game_party WHERE leader='$username' OR second='$username' OR third='$username' OR fifth='$username' LIMIT 1";
				$result_jevparte = mysqli_query($conn, $dotaz_jevparte);
				
				if(mysqli_num_rows($result_jevparte) > 0)
				{
					echo "Target is in party already.";
				}
				else
				{
				
				


				$dotaz = "SELECT * FROM game_party WHERE leader='$tvejmeno' OR second='$tvejmeno' OR third='$tvejmeno' OR fifth='$tvejmeno' LIMIT 1";
				$result = mysqli_query($conn, $dotaz);
				
				if(mysqli_num_rows($result) == 0){
					//echo "nemam partu";

				 	$dotaz_vytvorit = "INSERT INTO game_party (leader) VALUES
				 	 ('$tvejmeno')";
					$result_vytvorit = mysqli_query($conn, $dotaz_vytvorit);
					
					header("Location:invite.php?id=$targetid");
				}
		
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					
					//echo "mam partu";
					
					$idparty = $row["id"];
					$leader 	= $row["leader"];
					$second 	= $row["second"];
					$third 	= $row["third"];
					$forth 	= $row["forth"];
					$fifth 	= $row["fifth"];
					
					$misto = "";
					
					if($leader == ""){$misto = "leader";}
					elseif($second == ""){$misto = "second";}
					elseif($third == ""){$misto = "third";}
					elseif($forth == ""){$misto = "forth";}
					elseif($fifth == ""){$misto = "fifth";}
					else{echo "party is full";}
					
					//pridam typka do party
					$pridat = "UPDATE game_party SET $misto='$username' WHERE id='$idparty'";
					$resultpridat = mysqli_query($conn, $pridat);
					

						}
					}
				}
				header("Location:profilfriends.php?id=$tveid");


?>
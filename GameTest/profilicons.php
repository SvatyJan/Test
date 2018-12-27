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
				
				if($_SESSION["id"] == $row["id"]){
					
						
					$pocitadlo = 0;
								
					if($_SESSION["race"] == "Merfolk"){
					$adresar = scandir("img/merfolk");
					}
					if($_SESSION["race"] == "Silvanian"){
					$adresar = scandir("img/silvanian");
					}
					if($_SESSION["race"] == "Aviumal"){
					$adresar = scandir("img/aviumal");
					}
				
				//$adresar = scandir("img/icons");
				foreach($adresar as $fotka){
					
					$fotkasrc = "img/".$race."/".$fotka;
						
						if($fotka <> ".." && $fotka <> "."){
							if($pocitadlo >= 4){
								//echo "<img class='ikonka' src='img/icons/$fotka'>";
								echo "<a href='zmeniconu.php?fotka=$fotka'><img class='fotky' src='$fotkasrc'></a>";
								echo "<br>";
								$pocitadlo = 0;
								} else {
								//echo "<img class='ikonka' src='img/icons/$fotka'>";
								echo "<a href='zmeniconu.php?fotka=$fotka'><img class='fotky' src='$fotkasrc'></a>";
								$pocitadlo++;
								
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
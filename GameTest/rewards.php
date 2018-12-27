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

echo "<br>";

$dotaz_client = "SELECT * FROM game_client WHERE id=$id LIMIT 1";
$result_client = mysqli_query($conn, $dotaz_client);
					
				if (mysqli_num_rows($result_client) > 0) {
				while ($row_client = mysqli_fetch_assoc($result_client)) {
					
					$userid = $row_client["userid"];
					$level = $row_client["level"];
					$currency = $row_client["currency"];
					$xp = $row_client["xp"];
					
					//echo $currency.$xp;
					
					$rollcurr = rand(20*$level,65*$level);
					$rollxp = rand(5*$level,15*$level);
					
					
					echo $rollcurr."<br>".$rollxp;
					echo "<br>";
					
					if($level >= 30){$currencyplus = $currency + $rollcurr + $rollxp;}
					else {$currencyplus = $currency + $rollcurr;}
					
					$xpplus = $xp + $rollxp;
					
					echo $currencyplus."<br>".$xpplus;
					
					$dotaz = "UPDATE game_client SET currency = '$currencyplus', xp = '$xpplus' WHERE userid='$id'";
					$result = mysqli_query($conn, $dotaz);
						
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
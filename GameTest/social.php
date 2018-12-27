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
<br>
<p>Type name or id of the player to find the player</p>
<form method="POST" action="social.php">
<input type="text" name="hledat">
<input type="submit" name="hledani" value="Hledat">
</form>

<?php
		@$hledej = $_POST["hledat"];
		if(isset($hledej) && $hledej != ""){
		//$hledej = $_POST["hledat"];
		$dotaz = "SELECT * FROM game_client WHERE username='$hledej' OR id='$hledej' LIMIT 5";
		}
		else 
		{
		$dotaz = "SELECT * FROM game_client";
		}
	
		
echo "<table style='width:100%'>";	
//nadpisy
echo "<tr>
    <th>ID</th>
    <th>Icon</th>
    <th>Username</th> 
    <th>Level</th>
    <th>Race</th>
    <th>Honor</th>
 	 </tr>";
		
		$result = mysqli_query($conn, $dotaz);
				
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {					
					
				$id = $row["id"];
				$username = $row["username"];
				$level = $row["level"];
				$race = $row["race"];
				$honor = $row["honor"];
				
				$dotaz_users = "SELECT * FROM game_users WHERE username='$username'";
				$result_users = mysqli_query($conn, $dotaz_users);
				
				if (mysqli_num_rows(@$result_users) > 0) {
				while ($row_users = mysqli_fetch_assoc(@$result_users)) {
				
				$icon = $row_users["icon"];
				
				$cesta = "img/".$race."/".$icon;
				$cesta = strtolower($cesta);
				
				echo "<br>";

//ID
echo "<tr>";

echo "<td>".$id."</td>";

//Icon
echo "<td>"."<a href='profil.php?id=$id'><img class='social' src='$cesta'>"."</a></td>";
  
  //Username
echo "<td><a href='profil.php?id=$id'> ".$username."</a></td>";
  
  //level
echo "<td>".$level."</td>";
  
  //race
echo "<td>".$race."</td>";
  
  //honor
echo "<td>".$honor."</td>";
echo "</tr>";

					}
				}
			}
		}
				
echo "</table>";
?>

</div>
<?php
include_once("inc/pata.php");
?>
</div>
</body>
</html>
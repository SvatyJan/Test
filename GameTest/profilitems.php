<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
$id = $_REQUEST["id"];

if($id != $_SESSION["id"]){
header("Location:index.php");
}
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
				
					}		
				}
			}
		}

?>
<br>
<div class="equipment">

<?php
		$dotaz_itemseq = "SELECT * FROM game_items WHERE userid=$id AND equiped=1";
		$result_itemseq = mysqli_query($conn, $dotaz_itemseq);
		
			if (mysqli_num_rows($result_itemseq) > 0) {
			while ($row_itemseq = mysqli_fetch_assoc($result_itemseq)) {
				
				$slot = $row_itemseq["slot"];
				$icon = $row_itemseq["icon"];
				$wepid = $row_itemseq["id"];
				
				$url = "img/items/".$slot."/".$icon;
				//echo $url;
				
					if($slot == "weapon/ranged" || $slot == "weapon/melee"){
					echo "<a href='unequip.php?wepid=$wepid'>
					<div class='itemweapon' style='background-image:url($url)'></div>
					</a>";}
					if($slot == "head"){						
					echo "<a href='unequip.php?wepid=$wepid'>
					<div class='itemhead' style='background-image:url($url)'></div>
					</a>";}
					
					if($slot == "chest"){
					echo "<a href='unequip.php?wepid=$wepid'>
					<div class='itemchest' style='background-image:url($url)'></div>
					</a>";}
					if($slot == "boots"){		
					echo "<a href='unequip.php?wepid=$wepid'>
					<div class='itemboots' style='background-image:url($url)'></div>
					</a>";}
				

				
			}
		}		
?>

</div>

<?php

		$dotaz_items = "SELECT * FROM game_items WHERE userid=$id LIMIT 27";
		$result_items = mysqli_query($conn, $dotaz_items);
		
		if(mysqli_num_rows($result_items) < 27){
			$rowcount = mysqli_num_rows($result_items);
			$zbytek = 26 - $rowcount;
			echo $rowcount."/27";
			
				for($i = 0 ;$i <= $zbytek;$i++) {
				echo '<div style="background-color:#CCCCCC;" ></div>';
				}
			
			}
?>
<div class="inventory">
<?php //select 27 věcí z databáze itemu
		
			if (mysqli_num_rows($result_items) > 0) {
			while ($row_items = mysqli_fetch_assoc($result_items)) {
				
				$wepid = $row_items["id"];
				$userid = $row_items["userid"];
				$username = $row_items["username"];
				$itemname = $row_items["itemname"];
				$slot = $row_items["slot"];
				$armor = $row_items["armor"];
				$magicresist = $row_items["magicresist"];
				$damage = $row_items["damage"];
				$dmgtype = $row_items["dmgtype"];
				$str = $row_items["str"];
				$agi = $row_items["agi"];
				$intel = $row_items["intel"];
				$icon = $row_items["icon"];
				
				//do slotu se u zbrani musi psat weapon/melee a weapon/ranged
				$url = "img/items/"."$slot"."/"."$icon";
				$staty = "";						
				
				if($armor > 0){$staty = ($staty." +"."$armor"." Armor<br>");}
				if($magicresist > 0){$staty = ($staty." +"."$magicresist"." MR<br>");}
				if($damage > 0){$staty = ($staty." +"."$damage"." Dmg<br>");}
				if($str > 0){$staty = ($staty." +"."$str"." Str<br>");}
				if($agi > 0){$staty = ($staty." +"."$agi"." Agi<br>");}
				if($intel > 0){$staty = ($staty." +"."$intel"." Intel<br>");}			
				
				/*echo "<a href='equipitem.php?wepid=$wepid'><div class='textOverItem' style='background-image:url($url)' data-text='$itemname $staty'>";
				echo "</div></a>";*/
				/*echo "<a href='equipitem.php?wepid=$wepid'><div class='textOverItem' style='background-image:url($url)' data-text='$itemname $staty'>";
				echo "</div></a>";*/
				
				echo "<a href='equipitem.php?wepid=$wepid'><div class='container' style='background-image:url($url)'>";
  				echo "<div class='overlay'><strong>$itemname</strong></div>";
  				echo "<div class='dolnioverlay'>
  				<div class='itemtext'>
  				$staty
  				</div>
  				</div>";  
				echo "</div></a>";
				
				//echo $staty;
				
				//echo $url;

			}
		}
		
		
?>


</div>



</div>



<?php /*<div class="equipment">
<div class="itemweapon"> weapon</div>
<div class="itemhead"> head</div>
<div class="itemchest"> chest</div>
<div class="itemboots"> boots</div>
</div>*/ ?>


<?php
include_once("inc/pata.php");
?>
</div>
</body>
</html>
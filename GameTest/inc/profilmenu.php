<br>
<div class="profilhlava">
<?php
$dotaz_id = "SELECT * FROM game_users WHERE id='$id' LIMIT 1";
$result_id = mysqli_query($conn, $dotaz_id);
		
		if (mysqli_num_rows($result_id) == 0) {
		echo "This profile doesnt exist.";
		} else {


$jmeno = $_SESSION["login"];
echo "<a href='profil.php?id=$id' >
<div class='profilmenu'>";
if($_SESSION["id"] == $_REQUEST["id"]) {
	echo $jmeno;
	} else {
	echo "Profile";		
	} 
echo "</div></a>";
if($_SESSION["id"] == $_REQUEST["id"]) {
echo "<a href='profilicons.php?id=$id' >
<div class='profilmenu'>
Icons
</div>
</a>";
echo "<a href='profilfriends.php?id=$id' >
<div class='profilmenu'>
Friends
</div>
</a>";
echo "<a href='profillibrary.php?id=$id' >
<div class='profilmenu'>
Library
</div>
</a>";
echo "<a href='profilitems.php?id=$id' >
<div class='profilmenu'>
Items
</div>
</a>";
echo "<a href='codex.php?id=$id' >
<div class='profilmenu'>
Codex
</div>
</a>";
echo "<a href='profilmailbox.php?id=$id' >
<div class='profilmenu'>
Mailbox
</div>
</a>";
}


$id1 = $_SESSION["id"];
$id2 = $_REQUEST["id"];

$dotaz_friends = "SELECT * FROM game_friends WHERE userid1 = '$id1' AND userid2 = '$id2' OR userid1 = '$id2' AND userid2 = '$id1'";
$result_friends = mysqli_query($conn, $dotaz_friends);

if(mysqli_num_rows($result_friends) >= 1)
{
echo "<div style='right:50px; position:fixed;'> Already Added</div>";
}
else
{
if($_REQUEST["id"] != $_SESSION["id"]){
echo "<a href='addfriend.php?id=$id' >
<div style='position:fixed;right:50px;' class='profilmenu'>
Add to friend
</div>
</a>";
}
}
if($_SESSION["id"] != $_REQUEST["id"]){
echo "<br><br>";
echo "<a href='duel/challenge.php?id1=$id1&id2=$id2' >
<div style='position:fixed;right:50px;' class='profilmenu'>
Challenge!
</div>
</a>";
if(isset($_REQUEST["challenged"])){
echo "You challenged this guy already.";
}

}
}
?>
</div>
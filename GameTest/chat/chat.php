<?php

$dotaz_chat = "SELECT * FROM game_chat";
$result_chat = mysqli_query($conn,$dotaz_chat);


	


echo "<div class='chat'>";
echo "<div class='chat-posty'>";

if (mysqli_num_rows($result_chat) > 0) {
while ($row_chat = mysqli_fetch_assoc($result_chat)) {
	
	$idchatu	 = $row_chat["id"];
	$idhrace	 = $row_chat["idhrace"];
	$username = $row_chat["username"];
	$race = $row_chat["race"];
	$text = $row_chat["text"];
	
	$dotaz_users = "SELECT * FROM game_users WHERE username='$username' LIMIT 1";
	$result_users = mysqli_query($conn,$dotaz_users);
	
	if (mysqli_num_rows($result_users) > 0) {
	while ($row_users = mysqli_fetch_assoc($result_users)) {
		
		$icon = $row_users["icon"];
	
		}
	}
	
	$chatimgulr = "img/".$race."/".$icon;
echo "<div class='chat-textvpostu'>";
echo "<div class='chat-icon' style='background-image:url($chatimgulr)'>";
echo "</div>";

echo "<div style=''><strong><a href='profil.php?id=$idhrace'>$username</a></strong> Says: </div>";
if($_SESSION["login"] == $username)
{
echo "<div ><a class='chat-delete' href='chat/smaztext.php?id=$idchatu'>X</a></div>";
}
echo "<div style='width:80%;padding-left:85px;line-break: auto;'>$text</div>";

echo "</div>";
	}
}

echo "</div>";



echo "<div class='chat-text'>";
echo "<form method='POST' action='chat/odeslitext.php'>";
echo "<input class='chat-type-here' type='text' name='text' placeholder='Type here' maxlength='70'>";
echo "<input class='chat-submit' type='submit'>";
echo "</form>";
echo "</div>";
echo "</div>";

?>
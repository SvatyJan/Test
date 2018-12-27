<?php
session_start();
include("connect.php");

$icon = $_REQUEST["fotka"];
$id = $_SESSION["id"];

			$dotaz = "UPDATE game_users SET icon = '$icon' WHERE id=$id";
			$result = mysqli_query($conn, $dotaz);

header("Location:profil.php?id=$id");



?>
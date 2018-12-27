<?php

session_start();
include_once("../connect.php");

$challengeid = $_REQUEST["id"];
$id = $_SESSION["id"];

$dotaz = "DELETE FROM game_challenge WHERE id='$challengeid' LIMIT 1";
$result = mysqli_query($conn, $dotaz);

header("Location: ../profilmailbox.php?id=$id");


?>
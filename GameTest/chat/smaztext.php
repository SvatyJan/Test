<?php

session_start();
include_once("../connect.php");

$id = $_REQUEST["id"];

echo $id;

$delete_chat = "DELETE FROM game_chat WHERE id='$id'";
$result_deletechat = mysqli_query($conn,$delete_chat);

header("Location: ../index.php");

?>
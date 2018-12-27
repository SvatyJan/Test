<?php
session_start();
include_once("connect.php");

$id = $_SESSION["id"];
$position = $_REQUEST["position"];

$nic = '';

/*if($position == 1){ $pozice = "passive";}
if($position == 2){ $pozice = "first";}
if($position == 3){ $pozice = "second";}
if($position == 4){ $pozice = "third";}
if($position == 5){ $pozice = "ultimate";}

if($position == 1){ $icon = "icon1";}
if($position == 2){ $icon = "icon2";}
if($position == 3){ $icon = "icon3";}
if($position == 4){ $icon = "icon4";}
if($position == 5){ $icon = "icon5";}*/


if($position == 1){ $odeber = "UPDATE game_spellbar SET passive=null, icon1=null WHERE userid=$id";}
if($position == 2){ $odeber = "UPDATE game_spellbar SET first=null, icon2=null WHERE userid='$id'";}
if($position == 3){ $odeber = "UPDATE game_spellbar SET second=null, icon3=null WHERE userid='$id'";}
if($position == 4){ $odeber = "UPDATE game_spellbar SET third=null, icon4=null WHERE userid='$id'";}
if($position == 5){ $odeber = "UPDATE game_spellbar SET ultimate=null, icon5=null WHERE userid='$id'";}


$result_odeber = mysqli_query($conn, $odeber);

header("Location:profillibrary.php?id=$id");


?>
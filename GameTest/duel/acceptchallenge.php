<?php

// ZAPNE CASOVAC > ten te hodi do duelu

// AZ V DUELU TO SMAZE ZAZNAM


$id1	= $_REQUEST["id1"];
$id2	= $_REQUEST["id2"];

header("Location:../challengefight.php?id1=$id1&id2=$id2");



?>
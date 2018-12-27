<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="obal">
<?php
include_once("inc/hlava.php");
if(isset($_SESSION["login"])){
	
	} else {


?>

<div class="main">
<?php
if(isset($_REQUEST["zabrane"])){
	echo "<strong>Jméno je již zabrané</strong>";
	}

	
	if(isset($_REQUEST["spatne"])){
	echo "<strong>Zadal jste něco špatně</strong>";
	}

if(!isset($_SESSION["login"])){
?>

<form action="registerH.php" method="POST">
<table style="width:50%">
  <tr>
    <th>Register</th>
  </tr>
   <tr>
   <td>Email</td>
   <td>Username</td>
   <td>Password</td>
   <td>Password Again</td>
   <td>Race</td>
   </tr>
  <tr>
    <td><input type="email" 		name="email" placeholder="email" required></td>
    <td><input type="text" 		name="username" placeholder="username" required></td>
    <td><input type="password" 	name="password" placeholder="password" required></td>
    <td><input type="password"   name="password2" placeholder="password again" required></td>
    <td style="text-align:left;">
   	<input type="radio" name="race" value="Merfolk" checked> Merfolk<br>
  		<input type="radio" name="race" value="Silvanian"> Silvanian<br>
  		<input type="radio" name="race" value="Aviumal"> Aviumal
 	 </td>
    <td><input type="submit" 	name="submit" value="Login"></td>
  </tr>
</table>
 </form>
<?php
}
?>

</div>


<?php
}
include_once("inc/pata.php");
?>
</div>
</body>
</html>
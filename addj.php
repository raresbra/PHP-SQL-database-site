<!DOCTYPE html>
<?php

include("conectarephp.php");


?>
<html lang = "eng">
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="addj.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title> Activitate stiintifica </title>
</head>
<body>
	<div class="header">
	<header>
		<div class="container">
		<div class="texth1">
			<h1>Laborator medical</h1>
			 </div>
			<div class="nav" >
				<ul>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="index.php">Home </a></li>
					<!-- <li style = " font-size:25px ; padding-bottom:7px "> <a href="login.php">Log in </a></li> -->
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addj.php">  Adauga buletin </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addp.php">  Adauga pacient </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="delete.php">  Analize </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "> <a href="delete lab.php"> Laboranti</a></li>
					
				</ul>
			</div>
		</div>
		</div>
	</div>

	<div class="login">
		<div class="container">
			<h1> Adaugati buletin!</h1>

<form method="POST" action="addj.php">
    <input type="text" name="idpacient" placeholder="ID Pacient"><br>
    <input type="text" name="unitate" placeholder="Unitate"><br>
    <input type="text" name="laborant" placeholder="Laborant"><br>
    <input type="submit" name="Adauga" value="Adauga"><br>
</form>
		</div>
	</div>
</header>
</body>
</html>

<?php
    if(isset($_POST['Adauga'])){
        
        $pacient = $_POST['idpacient'];
        $unitate = $_POST['unitate'];
        $lab = $_POST['laborant'];
        
		

        $insert_produs = "INSERT INTO buletin(`idpacient`, `unitate`, `laborant`) VALUES ('$pacient','$unitate','$lab')";
        $insert_pro = mysqli_query($conectare, $insert_produs);
        
    }
?>

<div class="fundal">
</div>

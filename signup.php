<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['ID'])){
		header("Location:index.php");
	}
	include("conectarephp.php");


?>
<body>
<html lang = "eng">
	
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="signup.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title> Activitate stiintifica </title>
</head>

	<div class="header">
		
			<div class="texth1">
			<h1>Laborator medical</h1>
			
			<div class="nav" >
				<ul>
					<li style = " font-size:25px ; padding-bottom:7px "><a href="index.php"> Home </a></li>
		<?php
		if((!isset($_SESSION['cnp']))){
				echo'	<li style = " font-size:25px ; padding-bottom:7px "><a href="signup.php"> Sign-up </a></li>';}
				?>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="login.php">Log in </a></li>
		<?php
		if((isset($_SESSION['cnp']))){
				echo'	<li style = " font-size:25px ; padding-bottom:7px "><a href="addj.php">  Adauga buletin </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "><a href="addp.php">  Adauga pacient </a></li>';}
					?>
				</ul>
			</div>
			</div>
		</div>
	</div>

	<div class="login">
		<div class="container">
		<div class="container">
			<h1> Bun venit!</h1>
			<form method="POST" action="signup.php">
			<form>
			<input type="text" name="nume" placeholder="Nume"><br>
			<input type="text" name="prenume" placeholder="Prenume"><br>
			<input type="number" name="cnp" placeholder="CNP"><br>
			<input type="password" name="parola" placeholder="Parola"><br>
			<input type="text" name="sex" placeholder="F/M"><br>
			<input type="text" name="nrtelefon" placeholder="07xxxxxxxx"><br>
			<input type="submit" name="Conecteaza" value="Log In"><br>
		</div>
		</div>
</body>
</html>

<?php
	if(isset($_POST['Conecteaza'])){
		
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$cnp = $_POST['cnp'];
		$sex = $_POST['sex'];
		$nrtelefon = $_POST['nrtelefon'];
		
		$insert_produs = "insert into pacient(nume,prenume, cnp, sex, nrtelefon) values ('$nume','$prenume','$cnp','$sex','$nrtelefon')";
		$insert_pro = mysqli_query($conectare, $insert_produs);
	}
		
?>
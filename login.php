<!DOCTYPE html>
<?php
session_start();
include("conectarephp.php");


?>
<html lang = "eng">
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="login.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title> Activitate stiintifica </title>
</head>
<body>
	
	<div class="header">
		<header>
		<div class="texth1">
			<h1>Laborator medical</h1>
			<div class="nav" >
				<ul>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="index.php"> Home </a></li>
		<?php
		if((!isset($_SESSION['cnp']))){
				echo'	<li style = " font-size:22px ; padding-bottom:7px "><a href="signup.php"> Sign-up </a></li>';}?>
					<li style = " font-size:22px ; padding-bottom:7px "> <a href="login.php">Log in </a></li>
		<?php
		
		if((isset($_SESSION['cnp']))){
			echo'   <li style = " font-size:22px ; padding-bottom:7px "><a href="addj.php">  Adauga buletin </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addp.php">  Adauga pacient </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="delete.php">  Analize </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "> <a href="delete lab.php"> Laboranti</a></li>
					
			';}?>
				</ul>
			</div>
			</div>
		</div>
	</div>
	
	<div class="login">
		<div class="container">
		<h1> Bun venit!</h1>
		<h2>Aceasta este pagina de Login.</h2>
		<br><br>
		</br></br>
		<div class="container">
			<h1> Bun venit!</h1>
			<form method="POST" action="login.php">
			<form>
			<input type="text" name="nume" placeholder="Nume"><br>
			<input type="password" name="cnp" placeholder="CNP"><br>
			<input type="submit" name="Conecteaza" value="Log In"><br>
		</div>
		</div>

</body>
</html>

<?php
	if(isset($_POST['nume']) && !empty($_POST['nume']) && isset($_POST['cnp']) && !empty($_POST['cnp'])){
		
		$nume = $_POST['nume'];
		$id = $_POST['cnp'];
		
		$insert_produs = "SELECT * FROM pacient WHERE nume ='$nume'";
		$result = mysqli_query($conectare, $insert_produs);

		$row = $result->fetch_assoc();
		$parola = $row['cnp'];

		//$verif = password_verify($id, $parola);

		if($id != $parola){
			echo"Parola nu se potriveste";
		} else{
			$sql= "SELECT * FROM pacient WHERE nume ='$nume' AND cnp = $parola";
			$result = mysqli_query($conectare, $sql);

			if(!$row = $result->fetch_assoc()){
				echo"Parola sau Numele nu se potrivesc";
			}else{
				$_SESSION['cnp'] = $row['cnp'];
				$_SESSION['nume'] = $row['nume'];
				$_SESSION['Prenume'] = $row['Prenume'];
			}
			header("Location:index.php");
		}
	}
		
?>
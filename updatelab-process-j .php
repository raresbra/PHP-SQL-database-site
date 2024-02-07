<!DOCTYPE html>
<?php

include("conectarephp.php");
if(count($_POST)>0) {
	mysqli_query($conectare,"UPDATE laborant set `idlaborant`='" . $_POST['id'] . "', nume='" . $_POST['Titlu'] . "', prenume='" . $_POST['An'] . "' WHERE idlaborant='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";


}
	$result = mysqli_query($conectare,"SELECT * FROM laborant WHERE idlaborant ='" . $_GET['id'] . "'");
	$row= mysqli_fetch_array($result);
?>
<html>
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="update-process-j.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title> Activitate stiintifica </title>
</head>
<body>
<div class="header">
		<div class="container">
		<div class="texth1">
		<h1>Laborator medical</h1>
			 </div>
			<div class="nav" >
				<ul>
					<li style = " font-size:25px " > <a href="index.php">Home </a></li>
					<li style = " font-size:25px " > <a href="login.php">Log in </a></li>
					<<li style = " font-size:22px ; padding-bottom:7px "><a href="addj.php">  Adauga buletin </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addp.php">  Adauga pacient </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="delete.php">  Analize </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "> <a href="delete lab.php"> Laboranti</a></li>
					
				</ul>
			</div>
		</div>
	</div>



<div class="login">
	<div class="container">
		<form method="post" action="">
		<form>
		<h1>Id Laborant: </h1>
		<input type="hidden" name="id" class="txtField" value="<?php echo $row['idlaborant']; ?>">
		<input type="text" name="id"  value="<?php echo $row['idlaborant']; ?>">
		<br>
		<h1>Nume: </h1>
		<input type="text" name="Titlu" class="txtField" value="<?php echo $row['nume']; ?>">
		<br>
		<h1>Prenume :</h1>
		<input type="text" name="An" class="txtField" value="<?php echo $row['prenume']; ?>">
		<br>
		
		<input type="submit" name="submit" value="Submit" class="button">
		<div><?php if(isset($message)) { echo $message; } ?>
		</div>

</div>
</div>

</body>
</html>

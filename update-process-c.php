<!DOCTYPE html>
<?php

include("conectarephp.php");
if(count($_POST)>0) {
mysqli_query($conectare,"UPDATE conferinte set IDc='" . $_POST['id'] . "', Titlu='" . $_POST['Titlu'] . "', An='" . $_POST['An'] . "', Locatie='" . $_POST['Locatie'] . "' ,Punctaj='" . $_POST['Punctaj'] . "' WHERE IDc='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conectare,"SELECT * FROM conferinte WHERE IDc ='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="style.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title> Activitate stiintifica </title>
</head>
<body>
<div class="header">
		<div class="container">
			<div class="logo"> 
				<img src="logo.png">
			 </div>
			<div class="nav" >
				<ul>
					<li style = " font-size:25px " > <a href="index.php">Home </a></li>
					<li style = " font-size:25px " > <a href="login.php">Log in </a></li>
					<li style = " font-size:25px " > <a href="addj.php"> Adauga jurnal </a></li>
					<li style = " font-size:25px " > <a href="addp.php"> Adauga prezentare </a></li>
					<li style = " font-size:25px " > <a href="delete.php"> Biblioteca </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="calc.php"> Calculator </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="2020.php"> 2020 </a></li>
				</ul>
			</div>
		</div>
	</div>



<div class="login">
	<div class="container">
		<form method="post" action="">
		<form>
		<h1>Id Conferinta: </h1>
		<input type="hidden" name="id" class="txtField" value="<?php echo $row['IDc']; ?>">
		<input type="text" name="id"  value="<?php echo $row['IDc']; ?>">
		<br>
		<h1>Titlu: </h1>
		<input type="text" name="Titlu" class="txtField" value="<?php echo $row['Titlu']; ?>">
		<br>
		<h1>An :</h1>
		<input type="text" name="An" class="txtField" value="<?php echo $row['An']; ?>">
		<br>
		<h1>Editura:</h1>
		<input type="text" name="Locatie" class="txtField" value="<?php echo $row['Locatie']; ?>">
		<br>
		<h1>Punctaj:</h1>
		<input type="text" name="Punctaj" class="txtField" value="<?php echo $row['Punctaj']; ?>">
		<br>
		<input type="submit" name="submit" value="Submit" class="button">
		<div><?php if(isset($message)) { echo $message; } ?>
		</div>

</div>
</div>

</body>
</html>

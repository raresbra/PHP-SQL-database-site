<!DOCTYPE html>
<?php

include("conectarephp.php");


?>
<html lang = "eng'>
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="addp.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title> Activitate stiintifica </title>
</head>
<body>
	<div class="header">
	<div class="container">
		<div class="texth1">
			<h1>Laborator medical</h1>
			 </div>
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
			<h1> Adaugati pacient!</h1>
			<form method="POST" action="addp.php">
    <input type="text" name="nume" placeholder="Nume"><br>
    <input type="text" name="prenume" placeholder="Prenume"><br>
    <input type="number" name="cnp" placeholder="CNP"><br>
    <input type="number" name="nrtelefon" placeholder="Nr telefon"><br>
    <input type="text" name="sex" placeholder="Sex"><br>
    <input type="submit" name="Adauga" value="Adauga"><br>
</form>
		</div>
	</div>

</body>
</html>



<?php
    if(isset($_POST['Adauga'])){
        
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $cnp = $_POST['cnp'];
        $telefon = $_POST['nrtelefon'];
        $sex = $_POST['sex'];
        
        // Check if CNP already exists
        $check_cnp_query = "SELECT * FROM pacient WHERE cnp = '$cnp'";
        $check_cnp_result = mysqli_query($conectare, $check_cnp_query);
        
        if(mysqli_num_rows($check_cnp_result) > 0){
            // CNP already exists, show an error message
            echo "<div style='text-align: center; width: 100%; position: absolute; top: 48.5%; color:white; font-size:15px; transform: translateY(-50%);'>CNP already exists.</div>";
        } else {
            // CNP does not exist, insert the data
            $insert_produs = "INSERT INTO pacient(nume, prenume, cnp, nrtelefon, sex) VALUES ('$nume','$prenume','$cnp','$telefon','$sex')";
            $insert_pro = mysqli_query($conectare, $insert_produs);
            exit();
        }
    }
?>

<div class="fundal">
</div>
<!DOCTYPE html>
<?php
session_start();
include("conectarephp.php");


?>
<html lang = "eng'>
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="2020.css">	
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
					<li style = " font-size:25px ; padding-bottom:7px "><a href="index.php"> Home </a></li>
		<?php
		if((!isset($_SESSION['ID']))){
				echo'	<li style = " font-size:25px ; padding-bottom:7px "><a href="signup.php"> Sign-up </a></li>';}?>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="login.php">Log in </a></li>
		<?php
		if((isset($_SESSION['ID']))){
				echo'	<li  style = " font-size:25px ; padding-bottom:7px "><a href="addj.php">  Adauga jurnal </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "><a href="addp.php">  Adauga conferinta </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="delete.php"> Biblioteca </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="calc.php"> Calculator </a></li>
					<li style = " font-size:25px ; padding-bottom:7px "> <a href="2020.php"> 2020 </a></li>';}?>
				</ul>
			</div>
		</div>
	</div>

	<div class="login">
		<div class="container">
			<h1> Interogheaza intamplari din 2020 !</h1>
			<form method="POST" action="2020_INTEROGARI.php">
			<form>
			
<br>
			<input type="submit" name="Conecteaza" value="Hai sa aflam !"><br>
		</div>
	<div/>

</body>
</html>

<?php
	if(isset($in) && $in = "DA"){
		// JOIN CU FILTRARE WHERE
		$insert_produs = "SELECT c.Nume FROM cercetatori c JOIN articole a ON c.ID=a.IDcercetator where a.Citari=0 group by C.ID";
		$result = mysqli_query($conectare, $insert_produs);

		$row = $result->fetch_assoc();
		$parola = $row['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Cercetatorii care nu au fost citati niciodata : '.$parola;


		//functie agregat 1 AVG
		//media de punctaj a conferintelor
		$insert = "SELECT AVG(Punctaj) AS Nume FROM conferinte";
		$result1 = mysqli_query($conectare, $insert);

		$row1 = $result1->fetch_assoc();
		$parola1 = $row1['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Media de punctaj a conferintelor : '.$parola1;

		//functie agregat 2 si 3 MAX MIN
		//punctaj maxim si punctaj minim la articole
		$insert2 = "SELECT MAX(Punctaj) AS Max, MIN(Punctaj) AS Min  FROM jurnale";
		$result2 = mysqli_query($conectare, $insert2);

		$row2 = $result2->fetch_assoc();
		$parola21 = $row2['Max'];
		$parola22 = $row2['Min'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Punctaj maxim obtinut la un jurnal : '.$parola21;
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Punctaj minim obtinut la un jurnal : '.$parola22;


		//functie agregat 4 SUM 
		//cate citari de articole s-au realizat anul acesta
		$insert3 = "SELECT SUM(Citari) AS Nume FROM articole";
		$result3 = mysqli_query($conectare, $insert3);

		$row3 = $result3->fetch_assoc();
		$parola3 = $row3['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Totalul numarului de citari de articole realizat in acest an : '.$parola3;

		
		//functie agregat 5 COUNT
		//cate articole au fost citate
		$insert4 = "SELECT Count(Citari) AS Nume FROM articole WHERE Citari>0";
		$result4 = mysqli_query($conectare, $insert4);

		$row4 = $result4->fetch_assoc();
		$parola4 = $row4['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Cate articole au fost citate in acest an : '.$parola4;

		//functie agregat 6 COUNT cu filtrare 
		$insert5 = "SELECT Count(Punctaj) AS Nume FROM conferinte where locatie ='tokyo' ";
		$result5 = mysqli_query($conectare, $insert5);

		$row5 = $result5->fetch_assoc();
		$parola5 = $row5['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Cate conferinte au avut loc in Tokyo pana acum : '.$parola5;
	}
		
?>

<div class="fundal">
</div>

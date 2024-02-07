<!DOCTYPE html>
<?php
session_start();
include("conectarephp.php");


?>
<html lang = "eng'>
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
			<h1> Intamplari din 2020 !</h1>
			<div style="width : 375px;
	height: 200px" class="logo"> 
				<img src="F.jpg">
			 </div>
		</div>
	<div/>

</body>
</html>

<?php
	//if(isset($in) && $in = "DA"){
		// 1.JOIN CU FILTRARE 
		//cercetatori fara articole citate
		$insert_produs = "SELECT c.Nume FROM cercetatori c JOIN articole a ON c.ID=a.IDcercetator where a.Citari=0 group by C.ID";
		$result = mysqli_query($conectare, $insert_produs);

		$row = $result->fetch_assoc();
		$parola = $row['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Cercetatorii care nu au fost citati niciodata : '.$parola;

		// 2.JOIN CU FILTRARE
		//Numele cercetatorilor de sex feminin care au intocmit articole
		$insert_produs1 = "SELECT c.Prenume as Pre FROM cercetatori c left JOIN articole a ON c.ID=a.IDcercetator where c.Prenume='Daniela' ";
		$res = mysqli_query($conectare, $insert_produs1);

		$rows = $res->fetch_assoc();
		$par = $rows['Pre'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px">Numele cercetatorilor de sex feminin care au intocmit articole : '.$par;

		// 3.JOIN CU filtrare 
		//
		$insert_produs99 = "SELECT c.Nume as Nume FROM cercetatori c JOIN articole a ON c.ID=a.IDcercetator where a.Citari=(SELECT MAX(Citari) AS Max FROM articole)";
		$result99 = mysqli_query($conectare, $insert_produs99);

		$row99 = $result99->fetch_assoc();
		$parola99 = $row99['Nume'];
		echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Cercetatorul cel mai citat : '.$parola99;
		// 4.JOIN CU filtrare 
		$insert_produs100 = "SELECT c.Titlu as N FROM conferinte c JOIN articole a ON c.IDc=a.IDc where c.An=2020";
		$result100 = mysqli_query($conectare, $insert_produs100);

		$row100 = $result100->fetch_assoc();
		$parola100 = $row100['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Conferinte care au fost folosite in articole si au fost sustinute in 2020 :'.$parola100;

		// 5.JOIN CU filtrare 
		$insert_produs101 = "SELECT c.Titlu as N FROM conferinte c JOIN articole a ON c.IDc=a.IDc where c.Locatie = 'paris'";
		$result101 = mysqli_query($conectare, $insert_produs101);

		$row101 = $result101->fetch_assoc();
		$parola101 = $row101['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Conferinte care au fost folosite in articole si au fost sustinute in Paris :'.$parola101;

		// 6.JOIN CU filtrare 
		$insert_produs102 = "SELECT c.Titlu as N FROM conferinte c JOIN articole a ON c.IDc=a.IDc where c.Punctaj = ( SELECT MIN(c.Punctaj) FROM conferinte c JOIN articole a ON c.IDc=a.IDc)";
		$result102 = mysqli_query($conectare, $insert_produs102);

		$row102 = $result102->fetch_assoc();
		$parola102 = $row102['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Conferinta cu cele mai putine puncte care a fost folosita intr-un articol :'.$parola102;

		// 7.JOIN CU filtrare 
		$insert_produs103 = "SELECT c.Titlu as N FROM conferinte c JOIN articole a ON c.IDc=a.IDc where c.Punctaj = ( SELECT MAX(c.Punctaj) FROM conferinte c JOIN articole a ON c.IDc=a.IDc)";
		$result103 = mysqli_query($conectare, $insert_produs103);

		$row103 = $result103->fetch_assoc();
		$parola103 = $row103['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Conferinta cu cele mai multe puncte care a fost folosita intr-un articol :'.$parola103;

		// 8.JOIN CU filtrare 
		$insert_produs104 = "SELECT j.Titlu as N FROM jurnale j JOIN articole a ON j.IDj=a.IDj where j.An=2020";
		$result104 = mysqli_query($conectare, $insert_produs104);

		$row104 = $result104->fetch_assoc();
		$parola104 = $row104['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Jurnale care au fost folosite in articole si au fost scrise in 2020 :'.$parola104;

		// 9.JOIN CU filtrare 
		$insert_produs105 = "SELECT j.Titlu as N FROM jurnale j JOIN articole a ON j.IDj=a.IDj where j.Editura = 'Univers'";
		$result105 = mysqli_query($conectare, $insert_produs105);

		$row105 = $result105->fetch_assoc();
		$parola105 = $row105['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Jurnale care au fost folosite in articole si au fost produse de editura Univers :'.$parola105;

		// 10.JOIN CU filtrare 
		$insert_produs106 = "SELECT j.Titlu as N FROM jurnale j JOIN articole a ON j.IDj=a.IDj where j.Punctaj = ( SELECT MIN(j.Punctaj) FROM jurnale j JOIN articole a ON j.IDj=a.IDj)";
		$result106 = mysqli_query($conectare, $insert_produs106);

		$row106 = $result106->fetch_assoc();
		$parola106 = $row106['N'];
echo '<p style ="text-align: center; font-family:Lato; Font-size:25px;padding-top:50px; padding-bottom:25px;">Jurnalul cu cele mai putine puncte care a fost folosit intr-un articol :'.$parola106;

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
	//}
		
?>

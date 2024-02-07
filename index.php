<!DOCTYPE html>
<html lang = "eng">
<?php
session_start();
include("conectarephp.php");


?>
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
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
					<li style = " font-size:25px ; padding-bottom:7px"><a href="index.php"> Home </a></li>
					
		<?php
		if((!isset($_SESSION['cnp']))){
				echo'	<li style = " font-size:25px ; padding-bottom:7px; color:white "><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign-up </a></li>';}?>
					<li style = " font-size:25px ; padding-bottom:7px; color:white "><a href="login.php"> Log in </a></li>
		<?php
		if((isset($_SESSION['cnp']))){
			echo'   <li style = " font-size:22px ; padding-bottom:7px "><a href="addj.php">  Adauga buletin </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addp.php">  Adauga pacient </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="delete.php">  Analize </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "> <a href="delete lab.php"> Laboranti</a></li>
					
			';}?>
  								  <form method="post">
    								  <input style ="width : 300px;"type="text" placeholder="Search.." name="search">
    								  <button type="submit" name="submit"><i class="fa fa-search"></i></button>
   								  </form>
 							
						 
     					
			     </ul>
		</div>
			</div>
		</div>
	</div>
	</nav>
	</header>
	<?php
		if((isset($_SESSION['cnp']))){
			echo '<p style ="text-align:center; font-family:Lato;  Font-size:25px;padding-top:0px; padding-bottom:5px;">Bine ai revenit, '.strtoupper($_SESSION['nume']);  
			echo '
			<form action="logout.php" style="text-align:center;">
    <input type="submit" value="Log Out" style="font-size: 30px; padding: 3px 7px;">
</form>

			';
		}else{
	echo'<p style ="text-align: center; font-family:Lato; color:white; Font-size:25px;padding:15px;">Aceasta este pagina de home.';
	}
	?>
	<div class="fundal">
</div>
</body>
</html>

<?php
$con = new PDO("mysql:host=localhost;dbname=baza_de_date_laborator_medical",'root','');

if(isset($_POST["submit"])){
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `analize` WHERE denumire = ? OR valoarenormala = ? OR pret = ? OR idcategorie = ?");
	$sth->bindParam(1, $str);
	$sth->bindParam(2, $str);
	$sth->bindParam(3, $str);
	$sth->bindParam(4, $str);
	$stha = $con->prepare("SELECT * FROM `laborant` WHERE nume = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	$stha ->setFetchMode(PDO:: FETCH_OBJ);
	$stha -> execute();
	echo '<p style ="text-align: left; font-family:Lato; Font-size:25px; padding:15px;">Analize:';
	while($row = $sth->fetch())
	{
		?>
		<table>
			<tr>
				<th><h1 style="font-size:20px">Denumire             </h1></th>
				<th><h1 style="font-size:20px">Valoare Normala       </h1></th>
				<th><h1 style="font-size:20px">Preț       </h1></th>
				<th><h1 style="font-size:20px">Id Categorie       </h1></th>
			</tr>
			<tr>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->denumire; ?></h1></td>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->valoarenormala;?></h1></td>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->pret;?></h1></td>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->idcategorie;?></h1></td>
			</tr>

		</table>
<br>
<?php 
}
		
		



?>


<?php 
echo '<p style ="text-align: left; font-family:Lato; Font-size:25px; padding:15px;">';
	while($row = $stha->fetch())
	{
		?>
		<table>
			<tr>
				<th><h1 style="font-size:20px">      Id Laboranti         </h1></th>
				<th><h1 style="font-size:20px">   Nume</h1></th>
				<th><h1 style="font-size:20px"> Prenume</h1></th>
			</tr>
			<tr>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->idlaborant; ?></h1></td>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->nume;?></h1></td>
				<td style="margin-top:10px; margin-bottom:15px" ><h1 style="font-size:15px" ><?php echo $row->prenume;?></h1></td>
			</tr>

		</table>
		<br>
	<?php 
	}


	}

	?>


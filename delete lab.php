<!DOCTYPE html>

<?php
include("conectarephp.php");
$result = mysqli_query($conectare,"SELECT * FROM laborant");

?>



<html lang = "eng'>
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="delete lab.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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
					
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addj.php">  Adauga buletin </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="addp.php">  Adauga pacient </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "><a href="delete.php">  Analize </a></li>
					<li style = " font-size:22px ; padding-bottom:7px "> <a href="delete lab.php"> Laboranti</a></li>
					
					
				</ul>
			</div>
	</div>
		</div>
	</div>

<h1 style="text-align:left" > Laboranti : </h1><br>

<div class="ta">
	<div class="container">
		<table>
			<tr>
				<th><h1 style= "font-size:20px">      ID Laboranti      </h1></th>
				<th><h1 style= "font-size:20px"> Nume       </h1></th>
				<th><h1 style= "font-size:20px"> Prenume   </h1></th>
				
			</tr>
	<?php
		$i=0;
		$j=0;
		while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
		<td style="margin-top:15px; margin-bottom:20px" ><h1 style="font-size:20px" ><?php echo $row["idlaborant"]; ?></h1></td>
		<td style="margin-top:15px;"><h1 style="font-size:15px"><?php echo $row["nume"]; ?></h1></td>
		<td style="margin-top:15px;"><h1 style="font-size:15px"><?php echo $row["prenume"]; ?></h1></td>
		<td style="padding-top:15px; padding-bottom:20px"><h1 style="font-size:15px"><a href="deletelab-process-j.php?id=<?php echo $row["idlaborant"]; ?>">Delete</a></h1><h1 style="font-size:15px"><a href="updatelab-process-j .php?id=<?php echo $row["idlaborant"]; ?>">Update</a></h1></td>
		<?php
			if($j%2==0)
				$classnamej="even";
			else
				$classnamej="odd";
		?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">

	</tr>
	<?php
		$i++;
		}
	
	?>
		</table>
	</div>
</div>
<br><br><br><br><br>


</body>
</html>
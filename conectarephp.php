<?php

$conectare =  mysqli_connect('localhost','root','','baza_de_date_laborator_medical');

if(!$conectare){
	die('Conectarea la baza nu a reusit');
}

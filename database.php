<?php 

//Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=sudrail','root','');


//retourne les exceptions
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
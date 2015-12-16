<?php
	try{
		$bdd = new PDO("mysql:host=localhost;dbname=openworld;charset=utf8", "root", "openworld", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die("ERREUR : ".$e->getMessage());
	}
?>
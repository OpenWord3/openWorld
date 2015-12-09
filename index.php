<?php
	require_once'configuration.php';

	if(!isset($_GET["index"])){
		include('./vue/vue_accueil.php');
	} else {
		switch($_GET["index"]){
			case "vue_inscription":
				include("./controleur/controleur_accueil.php");
				break;
			case "vue_connexion":
				include("./controleur/controleur_connexion.php");
				break;
		}

	}
?>

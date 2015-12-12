<?php
	require_once'configuration.php';

	if(!isset($_GET["index"])){
		include('./vue/vue_accueil.php');
	} else {

		switch($_GET["index"]){
			case "vue_accueil":
				include("./controleur/controleur_accueil.php");
				break;

			case "vue_connexion":
				include("./controleur/controleur_connexion.php");
				break;
			case "vue_inscription":
				include("./controleur/controleur_inscription.php");
				break;
			case "vue_conditions":
				include("./controleur/controleur_conditions.php");
				break;
			case "vue_gestion_blog":
				include("./controleur/controleur_gestion_blog.php");
				break;
			case "vue_gestion_mail":
				include("./controleur/controleur_gestion_mail.php");
				break;
			case "vue_gestion_profil":
				include("./controleur/controleur_gestion_profil.php");
				break;
			case "vue_gestion_relais":
				include("./controleur/controleur_gestion_relais.php");
				break;
			case "vue_gestion_timeline":
				include("./controleur/controleur_gestion_timeline.php");
				break;
			case "vue_parametres":
				include("./controleur/controleur_parametres.php");
				break;
		}

	}
?>

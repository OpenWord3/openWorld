<?php

	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_abonnement.php");
	include("./modele/modele_fonction.php");
	
	$id_suivi = $_SESSION['id'];
	$pseudo_suiveur = $_POST['pseudo'];
	
	$id_suiveur = id($pseudo_suiveur);
	
	ajout_abonne($id_suivi,$id_suiveur);
	$res_rech = $_POST['res_rech'];
	include("./controleur/controleur_rech_blog_name.php");
	//include("./vue/vue_rech_blog_name.php");


?>
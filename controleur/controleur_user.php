<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$res_rech = $_POST['res_rech'];
	$tous_utilisateurs = rech_utilisateurs($res_rech);

	while($donnees = $tous_utilisateurs){
		$pseudo[] = $donnees['pseudo'];
		$id[] = $donnees['id_utilisateur'];
	}
	
	include("./vue/vue_rech_user.php");
?>
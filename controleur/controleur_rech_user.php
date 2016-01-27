<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$res_rech = $_POST['res_rech'];
	$rech_utilisateurs = rech_utilisateurs($res_rech);
print_r($rech_utilisateurs);
	while($donnees = $rech_utilisateurs->fetch()){
		$pseudo[] = $donnees['pseudo'];
		$id[] = $donnees['id_utilisateur'];
	}
	print_r($pseudo);
	//include("./vue/vue_rech_user.php");
?>
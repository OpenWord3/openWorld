<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$affiche_relais_demande = affiche_relais_demande();
	$archive = archive();
	$nb_demande_mail = nb_demande();
    $nb_ancienne_star = nb_ancienne_star();
	$nb_demande = notifications();
	$liste_demande_star = liste_demande_star();
	foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
	}
	
	$res_rech = $_POST['res_rech'];
	$rech_utilisateurs = rech_utilisateurs($res_rech);
	while($donnees = $rech_utilisateurs->fetch()){
		$pseudo[] = $donnees['pseudo'];
		$id[] = $donnees['id_utilisateur'];
	}
	include("./vue/vue_rech_user.php");
?>
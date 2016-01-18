<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$liste_star = liste_star();
	foreach($liste_star as $cle => $result){
		//$liste_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
		$liste_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
	}
	include("./vue/vue_accueil.php");
	include("./modele/modele_accueil.php");
?>
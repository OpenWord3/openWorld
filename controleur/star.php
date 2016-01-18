<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$pseudo = $_SESSION["pseudo"];
	$id = $_SESSION["id"];

	$nb_star = nb_star();
	//echo $nb_star;

	if($nb_star < 24){
		star($pseudo);
		date_star($pseudo);

		$results = liste_relais($id);

		foreach($results as $cle => $result){
			$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
			$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
		}
		include("./vue/vue_gestion_blog.php");
	} else {
		devenir_star($pseudo);

		$results = liste_relais($id);

		foreach($results as $cle => $result){
			$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
			$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
		}
		include("./vue/vue_gestion_blog.php");
	}
?>
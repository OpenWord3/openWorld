<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");
	include("/var/www/wordpress/wp-load.php");

	$liste_star = liste_star();
	foreach($liste_star as $cle => $result){
		//$liste_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
		$liste_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		$liste_star[$cle]["fqdn_blog"] = nl2br(htmlspecialchars($result["fqdn_blog"])); 
	}
	for($i=0; $i < count($liste_star); $i++){
		$pseudo = $liste_star[$i]['pseudo'];
		$img_star = img_star($pseudo);
		$blog_name = blog_name($pseudo);
		
		foreach($blog_name as $result){
				$blog[$pseudo] = $result->option_value;
		}
		if(empty($img_star)){
			$img[$pseudo] = "./bootstrap/images/6.jpg"; 
		}
		else {
			foreach($img_star as $res){
				$img[$pseudo] = $res->guid;
			}
			foreach($blog_name as $res){
				$blog[$pseudo] = $res->option_value;
			}
		}
	}
	
	include("./vue/vue_accueil.php");
	//include("./modele/modele_accueil.php");
?>
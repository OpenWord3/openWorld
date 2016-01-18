<?php
	require_once'configuration.php';

	if(!isset($_GET["index"])){
		include("./modele/modele_connexion_bdd.php");
		include("./modele/modele_fonction.php");
		include("/var/www/wordpress/wp-load.php");

		$liste_star = liste_star();
		foreach($liste_star as $cle => $result){
			//$liste_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$liste_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		for($i=0; $i < count($liste_star); $i++){
			$pseudo = $liste_star[$i]['pseudo'];
			$img_star = img_star($pseudo);
			
			if(empty($img_star)){
			$img[$pseudo] = "./bootstrap/images/6.jpg"; 
			}
			else {
				foreach($img_star as $res){
					$img[$pseudo] = $res->guid;
				}
			}
		}
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
			case "vue_gestion_abonnement":
				include("./controleur/controleur_gestion_abonnement.php");
				break;
			case "vue_parametres":
				include("./controleur/controleur_parametres.php");
				break;
			case "vue_admin":
				include("./controleur/controleur_admin.php");
				break;			
			case "recherche_blog":
				include("./controleur/controleur_rech.php");
				break;			
			case "recherche_blog_name":
				include("./controleur/controleur_rech_blog_name.php");
				break;			
			case "abonner":
				include("./controleur/controleur_abonnement.php");
				break;
			case "devenir_star":
				include("./controleur/star.php");
				break;
		}

	}
?>

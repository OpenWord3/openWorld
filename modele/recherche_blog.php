<?php

	include("/var/www/wordpress/wp-load.php"); 
	include("/var/www/openworld.itinet.fr/modele/modele_fonction.php");
	include("/var/www/openworld.itinet.fr/modele/modele_connexion_bdd.php");
	
	/*$tous_utilisateur[0] = "steephen";
	$tous_utilisateur[1] = "adolf";
	$tous_utilisateur[2] = "hassane";*/
	
	$tous_utilisateurs = tous_utilisateurs();
	while($donnees = $tous_utilisateurs->fetch()){
		$tous_utilisateur[] = $donnees['pseudo'];
	}

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
		foreach($tous_utilisateur as $res){
        // Requête SQL
        //$requete = "SELECT * FROM utilisateur WHERE nom LIKE '". $q ."%' or prenom LIKE '". $q ."%'";
		
		$newdb = new wpdb( 'root' , '' , "$res" , 'localhost'); 
		$resultat = $newdb->get_results("SELECT * FROM wp_posts WHERE post_type LIKE 'post' AND post_status LIKE 'publish' AND post_title LIKE '". $q ."%'");
        // Exécution de la requête SQL
       // $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
			foreach($resultat as $res){
				// On ajoute les données dans un tableau
				$rech[] = $res->post_title;

				}

 
        // On renvoie le données au format JSON pour le plugin
		}
						foreach($rech as $res){
					$suggestions['suggestions'][] = $res;
				}
	        echo json_encode($suggestions);
	}
?>
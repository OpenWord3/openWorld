<?php

	include("C:\Users\wamp\www\wp-load.php");
	include("C:\Users\wamp\www\OpenWorld\openWorld\modele\modele_fonction.php");
	include("C:\Users\wamp\www\OpenWorld\openWorld\modele\modele_connexion_bdd.php");
	
	/*$test[0] = "steephen";
	$test[1] = "adolf";
	$test[2] = "hassane";*/
	
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
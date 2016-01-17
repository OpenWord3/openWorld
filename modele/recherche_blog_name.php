<?php
 //   include("modele_connexion_bdd.php");
	include("C:\Users\wamp\www\wp-load.php");
	
	$test[0] = "steephen";
	$test[1] = "adolf";
	$test[2] = "hassane";

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
		foreach($test as $res){
        // Requête SQL
        //$requete = "SELECT * FROM utilisateur WHERE nom LIKE '". $q ."%' or prenom LIKE '". $q ."%'";
		
		$newdb = new wpdb( 'root' , '' , "$res" , 'localhost'); 
		$resultat = $newdb->get_results("SELECT * FROM wp_options WHERE option_name LIKE 'blogname' AND option_value LIKE '". $q ."%'");
        // Exécution de la requête SQL
       // $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
			foreach($resultat as $res){
				// On ajoute les données dans un tableau
				$rech[] = $res->option_value;

				}

 
        // On renvoie le données au format JSON pour le plugin
		}
						foreach($rech as $res){
					$suggestions['suggestions'][] = $res;
				}
	        echo json_encode($suggestions);
	}
?>
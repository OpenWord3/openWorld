<?php
include("C:\Users\wamp\www\wp-load.php");
    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
 
        // Connexion à la base de données
    /*    try {
            $bdd = new PDO('mysql:host=localhost;dbname=openworld', 'root', '');
        } catch(Exception $e) {
            exit('Impossible de se connecter à la base de données.');
        }*/
// global $wpdb;
 	$newdb = new wpdb( 'root' , '' , 'adolf' , 'localhost');

        // Requête SQL
     //   $requete = "SELECT * FROM utilisateur WHERE nom LIKE '". $q ."%' or prenom LIKE '". $q ."%'";
 	//$requete = "SELECT * FROM wp_posts WHERE post_title LIKE '". $q ."%'";

        // Exécution de la requête SQL
        $resultat = $newdb->get_results("SELECT * FROM wp_posts WHERE post_title LIKE '". $q ."%' AND post_type LIKE 'post'") or die(print_r($newdb->errorInfo()));
      //  $resultat = $newdb->get_results($requete) or die(print_r($newdb->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
       /* while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // On ajoute les données dans un tableau
            //$suggestions['suggestions'][] = $donnees['nom']." ".$donnees['prenom'];
            $suggestions['suggestions'][] = $donnees['nom'];

			}*/
		foreach ($resultat as $result) {
		 $test = $result->post_title;
		 $suggestions['suggestions'][] = $test;
		}
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }
?>
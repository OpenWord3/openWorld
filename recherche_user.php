<?php
   // include("C:\Users\wamp\www\OpenWorld\openWorld\modele\modele_connexion_bdd.php");

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
	try{
		$bdd = new PDO("mysql:host=localhost;dbname=openworld;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){
		die("ERREUR : ".$e->getMessage());
	}
        // Requête SQL
        $requete = "SELECT * FROM utilisateur WHERE pseudo LIKE '". $q ."%'";
 
        // Exécution de la requête SQL
        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
        while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $donnees['pseudo'];

			}
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }
?>
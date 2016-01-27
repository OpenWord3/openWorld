<?php
	include("/var/www/openworld.itinet.fr/modele/modele_connexion_bdd.php");

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
        // Connexion à la base de données

        // Requête SQL
        $requete = "SELECT * FROM utilisateur WHERE pseudo LIKE '". $q ."%' AND status_utilisateur = 0";
 
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
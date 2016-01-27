<?php
	//include("./modele/modele_connexion_bdd.php");
	//include("./modele/modele_fonction.php");

	if(isset($_GET['query'])){
		//Mot tape par l'utilisateur
		$q = htmlentities($_GET['query']);
		//global $bdd;

		try{
			$bdd = new PDO("mysql:host=localhost;dbname=openworld;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die("ERREUR : ".$e->getMessage());
		}

		// Requete SQL
		$requete = "SELECT pseudo FROM utilisateur WHERE pseudo LIKE '". $q ."%' LIMTI 0, 10";

		//Execution de la requete SQL
		$resultat = $bdd->query($requete) or die (print_r($bdd->errorInfo()));

		//On parcourt les resultats  de la requete SQL
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {

			//On ajoute les donnees dans un tableau
			$suggestions['suggestions'][] = $donnees['pseudo'];
		}

		//On renvoie les donnees au format JSON pour le plugin
		echo json_encode($suggestions);

	}

	/*if(isset($_GET['q'])){
		$q = htmlentities($_GET['q']);

		// Requete SQL
		$requete = "SELECT pseudo FROM utilisateur WHERE pseudo LIKE '".$q."%' LIMTI 0, 10";

		//Execution de la requete SQL
		$resultat = $bdd->query($requete) or die (print_r($bdd->errorInfo()));
		
		//On parcourt les resultats  de la requete SQL
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {

			//On ajoute les donnees dans un tableau
			echo $donnees['pseudo']."\n";
		}	
	}*/
?>
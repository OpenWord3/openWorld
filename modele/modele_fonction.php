<?php
	//Fonction qui verifie si un compte existe
	function compte($pseudo){
		global $bdd;

		$req = $bdd->prepare("SELECT pseudo FROM utilisateur WHERE pseudo = :pseudo");
		$req->execute(array("pseudo"=>$pseudo));

		$exist = $req->rowCount();
		$req->closeCursor();

		return $exist;
	}

	//Fonction qui retourne le mot de passe
	function mdp($pseudo){
		global $bdd;

		$req = $bdd->prepare("SELECT mdp FROM utilisateur WHERE pseudo = :pseudo");
		$req->execute(array("pseudo"=>$pseudo));

		while($results = $req->fetch()){
			$result = $results["mdp"];
		}

		return $result;
	}

	//Fonction qui recupere le status de l'utilisateur
	function status_user($pseudo){
		global $bdd;

		$req = $bdd->prepare("SELECT status_utilisateur FROM utilisateur WHERE pseudo = :pseudo");
		$req->execute(array("pseudo"=>$pseudo));

		while($results = $req->fetch()){
			$result = $results["status_utilisateur"];
		}

		return $result;
	}

	//Function qui inscrit un vsiteur
	function inscription($pseudo,$mdp,$nom,$prenom,$mail){
		global $bdd;

		$req = $bdd->prepare("INSERT INTO `utilisateur` (`pseudo`,`mdp`,`mail`,`nom`,`prenom`,`status_utilisateur`) values (:pseudo,:mdp,:mail,:nom,:prenom,FALSE);");
		$req->execute(array(
							'pseudo'=>$pseudo,
							'mdp'=>$mdp,
							'mail'=>$mail,
							'nom'=>$nom,
							'prenom'=>$prenom));
		$req->closeCursor();
	}
?>
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

	//Fonction qui retourne le status de l'utilisateur
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

	//Fonction qui verifie si un compte mail existe ou pas
	function mail_open($id){
		global $bdd;

		$req = $bdd->prepare("SELECT mail_open FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["mail_open"];
		}

		return $result;
	}

	//Fonction qui retourne l'id de l'utilisateur
	function id($pseudo){
		global $bdd;

		$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE pseudo = :pseudo");
		$req->execute(array("pseudo"=>$pseudo));

		while($results = $req->fetch()){
			$result = $results["id_utilisateur"];
		}

		return $result;
	}

	//Fonction qui retourne le status d'un compte mail
	function status_mail($id){
		global $bdd;

		$req = $bdd->prepare("SELECT status_mail FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["status_mail"];
		}

		return $result;
	}

	//Fonction qui ajoute un compte mail
	function add_mail($id,$adresse_mail){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `mail_open` = '$adresse_mail' WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `status_mail` = '1' WHERE `id_utilisateur` = $id");
		
		$req->closeCursor();
	}

	//Fonction qui active un compte mail
	function active_mail($id){
		global $bdd;

		$req = $bdd->prepare("UPDATE `utilisateur` SET `status_mail` = TRUE WHERE id_utilisateur = :id");
		$req->execute(array('id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui desactive un compte mail
	function desactive_mail($id){
		global $bdd;

		$req = $bdd->prepare("UPDATE `utilisateur` SET `status_mail` = FALSE WHERE id_utilisateur = :id");
		$req->execute(array('id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui supprime une adresse mail
	function del_mail($id){
		global $bdd;

		$req = $bdd->prepare("UPDATE `utilisateur` SET `mail_open` = NULL WHERE id_utilisateur = :id");
		$req->execute(array('id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui verifie le blog
	function blog($id){
		global $bdd;

		$req = $bdd->prepare("SELECT blog FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["blog"];
		}

		return $result;
	}

	//Fonction qui ajoute un blog
	function add_blog($id,$blog,$status){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `blog` = '$blog' WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `status_blog` = '$status' WHERE `id_utilisateur` = $id");
		
		$req->closeCursor();
	}

	//Fonction qui retourne le status d'un blog
	function status_blog($id){
		global $bdd;

		$req = $bdd->prepare("SELECT status_blog FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["status_blog"];
		}

		return $result;
	}

	//Fonction qui change le status d'un blog
	function active_blog($id,$status){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `status_blog` = '$status' WHERE `id_utilisateur` = $id");
		
		$req->closeCursor();
	}

	//Fonction qui ferme un blog
	function del_blog($id,$status){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `blog` = NULL WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `status_blog` = '$status' WHERE `id_utilisateur` = $id");
		
		$req->closeCursor();
	}
?>
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

	//Fonction qui verifie si un compte mail existe
	function check_mail($email){
		global $bdd;

		$req = $bdd->prepare("SELECT mail FROM utilisateur WHERE mail = :email");
		$req->execute(array("email"=>$email));

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
	function inscription($pseudo,$mdp,$mail){
		global $bdd;

		$req = $bdd->prepare("INSERT INTO `utilisateur` (`pseudo`,`mdp`,`mail`,`status_utilisateur`) values (:pseudo,:mdp,:mail,FALSE);");
		$req->execute(array(
							'pseudo'=>$pseudo,
							'mdp'=>$mdp,
							'mail'=>$mail));
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

		$req = $bdd->prepare("UPDATE `utilisateur` SET `status_mail` = '1' WHERE id_utilisateur = :id");
		$req->execute(array('id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui desactive un compte mail
	function desactive_mail($id){
		global $bdd;

		$req = $bdd->prepare("UPDATE `utilisateur` SET `status_mail` = '0' WHERE id_utilisateur = :id");
		$req->execute(array('id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui desactive un compte mail par admin
	function desactive_mail_admin($id){
		global $bdd;

		$req = $bdd->prepare("UPDATE `utilisateur` SET `status_mail` = '2' WHERE id_utilisateur = :id");
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

		$req = $bdd->prepare("SELECT fqdn_blog FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["fqdn_blog"];
		}

		return $result;
	}

	//Fonction qui ajoute un blog
	function add_blog($id,$blog,$status){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `fqdn_blog` = '$blog' WHERE `id_utilisateur` = $id");
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

		$req = $bdd->query("UPDATE `utilisateur` SET `fqdn_blog` = NULL WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `status_blog` = '$status' WHERE `id_utilisateur` = $id");
		
		$req->closeCursor();
	}

	//Fonction qui retourne un nom de domain
	function domain($domain){
		global $bdd;

		$req = $bdd->prepare("SELECT nom_domain FROM relais_mail WHERE nom_domain = :domain");
		$req->execute(array("domain"=>$domain));

		$exist = $req->rowCount();
		$req->closeCursor();

		return $exist;
	}

	//Fonction qui retourne l'ip
	function ip($ip){
		global $bdd;

		$req = $bdd->prepare("SELECT ip FROM relais_mail WHERE ip = :ip");
		$req->execute(array("ip"=>$ip));

		$exist = $req->rowCount();
		$req->closeCursor();

		return $exist;
	}

	//Fonction qui ajoute un nom de domaine et un adresse ip
	function add_relais($domain,$ip,$id){
		global $bdd;

		$req = $bdd->prepare("INSERT INTO `relais_mail` (`nom_domain`,`ip`,`utilisateur_id_utilisateur`) values (:domain,:ip,:id);");
		$req->execute(array(
							'domain'=>$domain,
							'ip'=>$ip,
							'id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui supprime un nom de domaine
	function del_relais($domain){
		global $bdd;

		$req = $bdd->prepare("DELETE FROM `relais_mail` WHERE `nom_domain` = :domain");
		$req->execute(array('domain'=>$domain));
		$req->closeCursor();
	}

	function del_relais2($id){
		global $bdd;

		$req = $bdd->prepare("DELETE FROM `relais_mail` WHERE `utilisateur_id_utilisateur` = :id");
		$req->execute(array('id'=>$id));
		$req->closeCursor();
	}

	//Fonction qui recupere le domaine d'un utilisateur
	function domain_user($id){
		global $bdd;

		$req = $bdd->prepare("SELECT `nom_domain` FROM `relais_mail` WHERE `utilisateur_id_utilisateur` = :id");
		$req->execute(array('id'=>$id));

		$result = $req->fetchAll();

		$req->closeCursor();
		return $result;
	}

	//Fonction qui deconnecte l'utilisateur
	function logout($pseudo){
		global $bdd;

		$req = $bdd->prepare("DELETE FROM `utilisateur` WHERE `pseudo` = :pseudo");
		$req->execute(array('pseudo'=>$pseudo));
		$req->closeCursor();
	}

	//Fonction qui modifie les informations de l'utilisateur
	function edit_profil($id,$nom,$prenom,$email,$mdp){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `nom` = '$nom' WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `prenom` = '$prenom' WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `mail` = '$email' WHERE `id_utilisateur` = $id");
		$req = $bdd->query("UPDATE `utilisateur` SET `mdp` = '$mdp' WHERE `id_utilisateur` = $id");
		
		$req->closeCursor();
	}

	//Fonction qui liste les utilisateurs
	function liste_utilisateur(){
		global $bdd;

		$req = $bdd->prepare("SELECT id_utilisateur, pseudo FROM utilisateur WHERE status_utilisateur = ?");
		$req->execute(array(0));
		$result = $req->fetchAll();
		
		$req->closeCursor();
		return $result;
	}

	//Fonction qui retourne le mot de passe oublié
	function motdepasse($email){
		global $bdd;

		$req = $bdd->prepare("SELECT mdp FROM utilisateur WHERE mail = :email");
		$req->execute(array("email"=>$email));

		while($results = $req->fetch()){
			$result = $results["mdp"];
		}

		return $result;
	}

	//Fonction qui liste les nom de domaine d'un utilisateur
	function liste_relais($id){
		global $bdd;

		$req = $bdd->prepare("SELECT nom_domain, ip FROM relais_mail WHERE utilisateur_id_utilisateur = :id");
		$req->execute(array("id"=>$id));
		$result = $req->fetchAll();

		$req->closeCursor();
		return $result;
	}

	//Fonction qui retourne le status d'un relais
	function status_relais($nom_domain){
		global $bdd;

		$req = $bdd->prepare("SELECT status_relais FROM relais_mail WHERE nom_domain = :domain");
		$req->execute(array("domain"=>$nom_domain));

		while($results = $req->fetch()){
			$result = $results["status_relais"];
		}

		return $result;
	}

	//Fonction qui change le status d'un relais
	function change_relais($nom,$status){
		global $bdd;

		$req = $bdd->query("UPDATE `relais_mail` SET `status_relais` = '$status' WHERE `nom_domain` = '$nom'");
		
		$req->closeCursor();
	}

	
	//FONCTION POUR LA NOTIFICATION
	function notifications () {
		global $bdd;
		
		$req = $bdd->query("SELECT COUNT(id_relais) AS nb_demande FROM relais_mail WHERE status = 0");
		
		$donnees = $req->fetch();
		$nb_demande = $donnees['nb_demande'];
		
		return $nb_demande;
	}	
	
	//FONCTION POUR AFFICHER LES DEMANDES DE RELAIS
	function affiche_relais_demande () {
		global $bdd;
		
		$req = $bdd->query("SELECT * FROM relais_mail JOIN utilisateur ON relais_mail.utilisateur_id_utilisateur = utilisateur.id_utilisateur WHERE status = 0");
		return $req;
		
		$req->closeCursor();
	}

?>
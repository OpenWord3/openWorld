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
		
		$req = $bdd->query("SELECT COUNT(id_relais) AS nb_demande FROM relais_mail WHERE status_relais = 0");
		
		$donnees = $req->fetch();
		$nb_demande = $donnees['nb_demande'];
		
		return $nb_demande;
	}	
	
	//FONCTION POUR AFFICHER LES DEMANDES DE RELAIS
	function affiche_relais_demande () {
		global $bdd;
		
		$req = $bdd->query("SELECT * FROM relais_mail JOIN utilisateur ON relais_mail.utilisateur_id_utilisateur = utilisateur.id_utilisateur WHERE status_relais = 0");
		return $req;
		
		$req->closeCursor();
	}
	
	//FONCTION QUI SELECTIONE TOUS LES UTILISATEURS 
	
	function tous_util($id_pseudo){
		global $bdd;
		
		$req = $bdd->query("SELECT * FROM utilisateur WHERE id_utilisateur != $id_pseudo AND status_utilisateur = 0");
		
		return $req;
		
		//$req->closeCursor;
	}	
	
	function tous_utilisateurs(){
		global $bdd;
		
		$req = $bdd->query("SELECT * FROM utilisateur WHERE status_utilisateur = 0");
		
		return $req;
		
		//$req->closeCursor;
	}


	//Fonction qui compte le nombre de star
	function nb_star(){
		global $bdd;

		$req = $bdd->query("SELECT COUNT(id_utilisateur) AS nb_star FROM utilisateur WHERE star = TRUE");
		
		$result = $req->fetch();
		
		$req->closeCursor();
		return $result['nb_star'];
	}

	//Fonction qui le rend star
	function star($pseudo){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `star` = TRUE WHERE `pseudo` = '$pseudo'");
		
		$req->closeCursor();
	}

	//Fonction qui liste les stars
	function liste_star(){
		global $bdd;

		$req = $bdd->prepare("SELECT id_utilisateur,pseudo,fqdn_blog FROM utilisateur WHERE star = TRUE;");
		$req->execute(array(0));
		$result = $req->fetchAll();
		
		$req->closeCursor();
		return $result;
	}

	//Fonction ne plus etre star
	function no_star($pseudo){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `star` = FALSE WHERE `pseudo` = '$pseudo'");
		
		$req->closeCursor();
	}

	//Fonction qui calcule la duree d'un blog qui est star
	function duree_star(){
		global $bdd;

		$req = $bdd->query("SELECT TIMEDIFF(MINUTE(CURRENT_TIMESTAMP),MINUTE(date_star)) FROM utilisateur WHERE star = TRUE");

		$result = $req->$fetchAll();

		$req->closeCursor();
		return $result;
	}

	//Fonction qui gere les demandes devenir star
	function devenir_star($pseudo){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `devenir_star` = TRUE WHERE `pseudo` = '$pseudo'");
		
		$req->closeCursor();
	}

	//Fonction qui annnule la demande de devenir staer
	function no_devenir_star($pseudo){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `devenir_star` = FALSE WHERE `pseudo` = '$pseudo'");
		
		$req->closeCursor();
	}

	//Fonction qui donne le nom de ceux qui veulent devenir star
	function nb_demande(){
		global $bdd;

		$req = $bdd->query("SELECT COUNT(id_utilisateur) AS nb_demande FROM utilisateur WHERE devenir_star = TRUE");
		
		$result = $req->fetch();
		
		$req->closeCursor();
		return $result['nb_demande'];
	}

	//Fonction qui donne la date lorsque l'utilisateur devient star
	function date_star($pseudo){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `date_star` = CURRENT_TIMESTAMP WHERE `pseudo` = '$pseudo'");
		
		$req->closeCursor();
	}

	//Fonction qui donne la date lorsque l'utilisateur devient star
	function date_no_star($pseudo){
		global $bdd;

		$req = $bdd->query("UPDATE `utilisateur` SET `date_star` = NULL WHERE `pseudo` = '$pseudo'");
		
		$req->closeCursor();
	}

	//Fonction qui liste les stars qui ont une duree superieure a 10 mins
	function ancien_star(){
		global $bdd;

		$req = $bdd->prepare("SELECT pseudo FROM utilisateur WHERE star = TRUE AND TIME_TO_SEC(TIMEDIFF((CURRENT_TIMESTAMP),(DATE_STAR)))/60 > 10;");
		$req->execute(array(0));
		$result = $req->fetchAll();
		
		$req->closeCursor();
		return $result;
	}

	//Fonction qui verifie si utilisateur est star
	function verif_star($id){
		global $bdd;

		$req = $bdd->prepare("SELECT star FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["star"];
		}

		return $result;
	}

	//Fonction qui verifie si utilisateur demande star
	function verif_demande_star($id){
		global $bdd;

		$req = $bdd->prepare("SELECT devenir_star FROM utilisateur WHERE id_utilisateur = :id");
		$req->execute(array("id"=>$id));

		while($results = $req->fetch()){
			$result = $results["devenir_star"];
		}

		return $result;
	}

	//Fonction qui liste les utilisateurs qui demandent d'etre une star
	function liste_demande_star(){
		global $bdd;

		$req = $bdd->prepare("SELECT id_utilisateur,pseudo FROM utilisateur WHERE devenir_star = TRUE");
		$req->execute(array(0));
		$result = $req->fetchAll();
		
		$req->closeCursor();
		return $result;
	}

	//Fonction qui liste les anciennes stars
	function liste_ancienne_star(){
		global $bdd;

		$req = $bdd->prepare("SELECT id_utilisateur,pseudo FROM utilisateur WHERE star = TRUE AND TIME_TO_SEC(TIMEDIFF((CURRENT_TIMESTAMP),(DATE_STAR)))/60 > 10");
		$req->execute(array(0));
		$result = $req->fetchAll();
		
		$req->closeCursor();
		return $result;
	}

	//Fonction qui donne le nombre des anciennes stars
	function nb_ancienne_star(){
		global $bdd;

		$req = $bdd->query("SELECT COUNT(pseudo) AS nb_ancienne_star FROM utilisateur WHERE star = TRUE AND TIME_TO_SEC(TIMEDIFF((CURRENT_TIMESTAMP),(DATE_STAR)))/60 > 10");
		$result = $req->fetch();
		
		$req->closeCursor();
		return $result['nb_ancienne_star'];
	}

	// Fonction pour hasher mot de passe
	function hash_mdp($mdp){

		// choisir 256 bits de caractere au hasard
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));

		// on recupere le sel ensuite on prepare le hash
		$hash = hash("sha256",$mdp.$salt);

		$hasher = $salt.$hash;

		// on retourne le hash
		return $hasher;
	}

	// Fonction qui verifie le mot de passe de l'utilisateur
	function check_mdp($mdp, $bddhash){
		// on recupere le sel du hash qui se trouve dans la base de donnees
		$salt = substr($bddhash,0,64);

		// on recupere le SHA256 hash
		$valid_hash = substr($bddhash,64,64);

		// hash le mot de passe
		$check_hash = hash("sha256",$mdp.$salt);

		// test
		$check = false;
		if($check_hash === $valid_hash){
			$check = true;
		}

		return $check;
	}
	
	function img_star($pseudo){
		$newdb = new wpdb( 'root' , 'africainetfier' , "$pseudo" , 'localhost'); 
		
		$results = $newdb->get_results("SELECT * FROM wp_posts WHERE post_mime_type LIKE 'image%' ORDER BY post_modified DESC LIMIT 1");
		
		return $results;
	}
	function blog_name($res){
		$newdb = new wpdb( 'root' , 'africainetfier' , "$res" , 'localhost'); 
		$results = $newdb->get_results("SELECT * FROM wp_options WHERE option_name LIKE 'blogname'");
		
		return $results;
	}
?>
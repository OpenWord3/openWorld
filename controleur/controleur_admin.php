<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");
	
	$affiche_relais_demande = affiche_relais_demande();
	$archive = archive();
	$nb_demande_mail = nb_demande();
    $nb_ancienne_star = nb_ancienne_star();
	$nb_demande = notifications();
	if(isset($_POST["activer_blog"])){
		$pseudo = $_POST["pseudo"];
		$id = id($pseudo);
		$alerte = "Le blog de cet utilisateur vient d'être activé.";
		$status = "1";
		active_blog($id,$status);
		exec('sudo /var/script/activation_vhost.sh '.$pseudo);
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");

	} else if(isset($_POST["desactiver_blog"])) {
		$pseudo = $_POST["pseudo"];
		$id = id($pseudo);
		
		$alerte = "Le blog de cet utilisateur vient d'être désactivé.";
		$status = "2";
		active_blog($id,$status);
		exec('sudo /var/script/unactivation_vhost.sh '.$pseudo);
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");
				
		
	} else if(isset($_POST["supprimer_blog"])){
		$pseudo = $_POST["pseudo"];
		$id = id($pseudo);

		$status = "0";
		$alerte = "Le blog de cet utilisateur vient d'être définitivement fermé.";
		exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		del_blog($id,$status);
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");

	} else if(isset($_POST["activer_mail"])){
		$pseudo = $_POST["pseudo"];
		
		$id = id($pseudo);
		
		$alerte = "Le compte mail de cet utilisateur vient d'être activé.";
		exec('sudo /var/script/activation_mail_account.sh '.$pseudo);					
		active_mail($id);
		$mail_name = "desactiver_mail";
		$mail_value = "Désactiver";

		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		
		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");

	} else if(isset($_POST["desactiver_mail"])){
		$pseudo = $_POST["pseudo"];
		
		$id = id($pseudo);					
		
		$alerte = "Le compte mail de cet utilisateur vient d'être désactivé.";
		$mail_name = "activer_mail";
		$mail_value = "Activer";
		exec('sudo /var/script/desactivation_mail_account.sh '.$pseudo);						
		desactive_mail_admin($id);
		
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		
		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");

	} else if(isset($_POST["supprimer_mail"])){
		$pseudo = $_POST["pseudo"];
		$id = id($pseudo);

		$pseudo = $_SESSION["pseudo"];
		$alerte = "Le compte mail de cet utilisateur vient d'être définitivement fermé.";
		exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		del_mail($id);
		desactive_mail($id);

		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}

		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");

	} else if(isset($_POST["bannir"])){
		$pseudo = $_POST["pseudo"];
		$id = id($pseudo);

		exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		$domain = domain_user($id);		

		foreach($domain as $nom){			
			
			exec('sudo /var/script/del-relais.sh '.$nom["nom_domain"]);
		}		
		
		del_relais2($id);
		logout($pseudo);

		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}

		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");
	}else if(isset($_POST["valider_relais"])){

		$domain = $_POST["nom_domain"];
		$ip = $_POST["ip"];
		$id_domain = id_domaine($ip);

		$status = '1';
		change_relais($id_domain,$status);
		exec('sudo /var/script/add-relais.sh '.$domain.' '.$ip);

		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}

		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		$alerte = "Le nom de domaine a bien été ajouté";
		include("./vue/vue_admin.php");

	} else if(isset($_POST["refuser_relais"])){
		
	}else if(isset($_POST["remplacer"])){
		$pseudoold = $_POST["pseudoold"];
		$idold = id($pseudoold);

		$pseudonew = $_POST["pseudonew"];
		$idnew = id($pseudonew);

		no_star($pseudoold);
		date_no_star($pseudoold);

		star($pseudonew);
		no_devenir_star($pseudonew);
		date_star($pseudonew);

		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}

		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}	
		include("./vue/vue_admin.php");
	} else {
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}

		//On recupere la liste des demandeurs de devenir star
		$liste_demande_star = liste_demande_star();
		foreach($liste_demande_star as $cle => $result1){
			$liste_demande_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result1["id_utilisateur"]));
			$liste_demande_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result1["pseudo"]));
		}

		//On recupere la liste des anciennes stars
		$liste_ancienne_star = liste_ancienne_star();
		foreach($liste_ancienne_star as $cle => $result2){
			$liste_ancienne_star[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result2["id_utilisateur"]));
			$liste_ancienne_star[$cle]["pseudo"] = nl2br(htmlspecialchars($result2["pseudo"]));
		}
		include("./vue/vue_admin.php");
	}
	
?>
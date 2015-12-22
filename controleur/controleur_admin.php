<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

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
		include("./vue/vue_admin.php");

	} else if(isset($_POST["activer_mail"])){
		$pseudo = $_POST["pseudo"];
		echo $pseudo;
		$id = id($pseudo);
		$pseudo = $_SESSION["pseudo"];
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
		include("./vue/vue_admin.php");

	} else if(isset($_POST["desactiver_mail"])){
		$pseudo = $_POST["pseudo"];
		echo $pseudo;
		$id = id($pseudo);					
		$pseudo = $_SESSION["pseudo"];
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
				include("./vue/vue_admin.php");

	} else {
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();
		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}		
		include("./vue/vue_admin.php");
	}
	
?>
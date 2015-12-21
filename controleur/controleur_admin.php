<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["activer_blog"])){
		$pseudo = $_POST["pseudo"];
		$verif_pseudo = compte($pseudo);

		if($verif_pseudo != 0){
			$id = id($pseudo);
			$verif_blog = blog($id);
			if($verif_blog == ""){
				$alerte = "Cet utilisateur n'a pas de blog actuellement.";
				include("./vue/vue_admin.php");
			} else {
				$verif_status_blog = status_blog($id);
				if($verif_status_blog == "1"){
					$alerte = "Le blog de cet utilisateur est déjà activé.";
					include("./vue/vue_admin.php");
				} else {
					$alerte = "Le blog de cet utilisateur vient d'être activé.";
					$status = "1";
					active_blog($id,$status);
					exec('sudo /var/script/activation_vhost.sh '.$pseudo);
					include("./vue/vue_admin.php");
				}
			}
		} else {
			$alerte = "Cet utilisateur n'existe pas dans notre base de donné.";
			include("./vue/vue_admin.php");
		}

	} else if(isset($_POST["desactiver_blog"])) {
		$pseudo = $_POST["pseudo"];
		$verif_pseudo = compte($pseudo);

		if($verif_pseudo != 0){
			$id = id($pseudo);
			$verif_blog = blog($id);
			if($verif_blog == ""){
				$alerte = "Cet utilisateur n'a pas de blog actuellement.";
				include("./vue/vue_admin.php");
			} else {
				$verif_status_blog = status_blog($id);
				if($verif_status_blog == "0"){
					$alerte = "Le blog de cet utilisateur est déjà désactivé.";
					include("./vue/vue_admin.php");
				} else {
					$alerte = "Le blog de cet utilisateur vient d'être désactivé.";
					$status = "0";
					active_blog($id,$status);
					exec('sudo /var/script/unactivation_vhost.sh '.$pseudo);
					include("./vue/vue_admin.php");
				}
			}
		}else {
			$alerte = "Cet utilisateur n'existe pas dans notre base de donné.";
			include("./vue/vue_admin.php");
		}
		
	} else if(isset($_POST["supprimer_blog"])){
		$pseudo = $_POST["pseudo"];

		$verif_pseudo = compte($pseudo);
		if($verif_pseudo != 0){
			$id = id($pseudo);
			$verif_blog = blog($id);
			if($verif_blog == ""){
				$alerte = "Cet utilisateur n'a pas de blog actuellement.";
				include("./vue/vue_admin.php");
			} else {
				$status = "0";
				$alerte = "Le blog de cet utilisateur vient d'être définitivement fermé.";
				exec('sudo /var/script/remove_vhost.sh '.$pseudo);
				del_blog($id,$status);
				include("./vue/vue_admin.php");
			}
		} else {
			$alerte = "Cet utilisateur n'existe pas dans notre base de donné.";
			include("./vue/vue_admin.php");
		}

	} else if(isset($_POST["activer_mail"])){
		$pseudo = $_POST["pseudo"];

		$verif_pseudo = compte($pseudo);
		if($verif_pseudo != 0){
			$id = id($pseudo);
			$verif_mail = mail_open($id);
			if($verif_mail == ""){
				$alerte = "Cet utilisateur n'utilise pas notre service mail actuellement.";
				include("./vue/vue_admin.php");
			} else {
				$verif_status_mail = status_mail($id);
				if($verif_status_mail == "1"){
					$alerte = "Le compte mail de cet utilisateur est déjà activé.";
					include("./vue/vue_admin.php");
				} else {
					$pseudo = $_SESSION["pseudo"];
					$alerte = "Le compte mail de cet utilisateur vient d'être activé.";
					exec('sudo /var/script/activation_mail_account.sh '.$pseudo);					
					active_mail($id);
					include("./vue/vue_admin.php");
				}
			}
		} else {
			$alerte = "Cet utilisateur n'existe pas dans notre base de donné.";
			include("./vue/vue_admin.php");
		} 

	} else if(isset($_POST["desactiver_mail"])){
		$pseudo = $_POST["pseudo"];

		$verif_pseudo = compte($pseudo);
		if($verif_pseudo != 0){
			$id = id($pseudo);
			$verif_mail = mail_open($id);
			if($verif_mail == ""){					
				$alerte = "Cet utilisateur n'utilise pas notre service mail actuellement.";
				include("./vue/vue_admin.php");
			} else {
				$verif_status_mail = status_mail($id);
				if($verif_status_mail == "1"){					
					$pseudo = $_SESSION["pseudo"];
					$alerte = "Le compte mail de cet utilisateur vient d'être désactivé.";
					exec('sudo /var/script/desactivation_mail_account.sh '.$pseudo);						
					desactive_mail($id);
					include("./vue/vue_admin.php");
				} else {
					$alerte = "Le compte mail de cet utilisateur est déjà désactivé.";
					include("./vue/vue_admin.php");
				}
			}
		} else {
			$alerte = "Cet utilisateur n'existe pas dans notre base de donné.";
			include("./vue/vue_admin.php");
		}

	} else if(isset($_POST["supprimer_mail"])){
		$pseudo = $_POST["pseudo"];

		$verif_pseudo = compte($pseudo);
		if($verif_pseudo != 0){
			$id = id($pseudo);
			$verif_mail = mail_open($id);
			if($verif_mail != ""){
				$pseudo = $_SESSION["pseudo"];
				$alerte = "Le compte mail de cet utilisateur vient d'être définitivement fermé.";
				exec('sudo /var/script/del_mail_account.sh '.$pseudo);
				del_mail($id);
				desactive_mail($id);
				include("./vue/vue_admin.php");
			} else {
				$alerte = "Cet utilisateur n'utilise pas notre service mail actuellement.";
				include("./vue/vue_admin.php");
			}
		} else {
			$alerte = "Cet utilisateur n'existe pas dans notre base de donné.";
			include("./vue/vue_admin.php");
		}

	} else {
		// On recupere la liste des utilisateurs	
		$results = liste_utilisateur();

		foreach($results as $cle => $result){
			$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
			$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
		}
		var_dump($results);
		include("./vue/vue_admin.php");
	}
	
?>
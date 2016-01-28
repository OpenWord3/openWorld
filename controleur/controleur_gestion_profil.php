<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");
	include("./modele/modele_timeline.php");
	include("./modele/modele_abonnement.php");
	include("/var/www/wordpress/wp-load.php");

	$pseudo = $_SESSION["pseudo"];
	$id = id($pseudo);
	//$id_suivi = $_SESSION['id_suivi'];
	//echo $id_suivi." Suivi";
	//echo $id." Suiveur";
	//$pseudo_suiveur = $pseudo;
	//$id_suiveur = id($pseudo_suiveur);

	if(isset($_GET["desinscrire"])){
		exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		$domain = domain_user($id);
		
		//suppr_abonne($id_suivi,$id);
		del_relais2($id);
		logout($pseudo);
		session_destroy();

		foreach($domain as $nom){			
			
			exec('sudo /var/script/del-relais.sh '.$nom["nom_domain"]);
		}			
		
		header("location:index.php");
	} else if (isset($_POST["modifier"])){
		$nom = htmlspecialchars($_POST["nom"]);
		$prenom = htmlspecialchars($_POST["prenom"]);
		$email = $_POST["email"];
		$mdp = htmlspecialchars($_POST["mdp"]);

		if(filter_var($mot, FILTER_VALIDATE_EMAIL)) {

			$verif_mail = check_mail($email);
			if($verif_mail != 0){
				$alerte = "Ce compte mail existe déjà. Donc vos modifications n'ont pas été prises en compte.";
				include("./vue/vue_gestion_profil.php");
			} else{

				$_SESSION["mdp"] = $mdp;
				$verif_mail = mail_open($id);
				$mdp1 = hash_mdp($mdp);
				if($verif_mail !== ""){
					exec('sudo /var/script/change_passwd.sh '.$pseudo.' '.$mdp);
					edit_profil($id,$nom,$prenom,$email,$mdp1);
					$alerte = "Vos modifications ont bien été prises en compte.";
					include("./vue/vue_gestion_profil.php");

				} else {
					edit_profil($id,$nom,$prenom,$email,$mdp1);
					$alerte = "Vos modifications ont bien été prises en compte.";
					include("./vue/vue_gestion_profil.php");
				}
			}
		} else {
			$alerte = "L'adresse mail que vous avez entré n'est pas valide. Donc vos modifications n'ont pas été prises en compte.";
			include("./vue/vue_gestion_profil.php");
		} 
	}else {
		include("./vue/vue_gestion_profil.php");	
	}
	
?>
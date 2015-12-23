<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$pseudo = $_SESSION["pseudo"];
	$id = id($pseudo);

	if(isset($_GET["desinscrire"])){
		exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		$domain = domain_user($id);
		

		foreach($domain as $nom){			
			
			exec('sudo /var/script/del-relais.sh '.$nom["nom_domain"];);
		}		
		
		del_relais2($id);
		logout($pseudo);
		
		header("location:index.php");
	} else if (isset($_POST["modifier"])){
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];

		$verif_mail = check_mail($email);
		if($verif_mail != 0){
			$alerte = "Ce compte mail existe déjà. Donc vos modifications n'ont pas été prises en compte.";
			include("./vue/vue_gestion_profil.php");
		} else{

			$_SESSION["mdp"] = $mdp;
			$verif_mail = mail_open($id);

			if($verif_mail !== ""){
				exec('sudo /var/script/change_passwd.sh '.$pseudo.' '.$mdp);
				edit_profil($id,$nom,$prenom,$email,$mdp);
				$alerte = "Vos modifications ont bien été prises en compte.";
				include("./vue/vue_gestion_profil.php");

			} else {
				edit_profil($id,$nom,$prenom,$email,$mdp);
				$alerte = "Vos modifications ont bien été prises en compte.";
				include("./vue/vue_gestion_profil.php");
			}
		} 
	}else {
		include("./vue/vue_gestion_profil.php");	
	}
	
?>
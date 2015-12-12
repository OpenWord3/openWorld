<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["valider"])){
		$pseudo = $_POST["pseudo"];
		$mdp = $_POST["mdp"];

		$existe = compte($pseudo);
		if($existe != 0){
			$check_mdp = mdp($pseudo);
			if($check_mdp == $mdp){
				$status = status_user($pseudo);
				if($status == "0"){
					$_SESSION["pseudo"] = $pseudo;
					include("./dashboard");
				} else {
					$_SESSION["pseudo"] = $pseudo;
					include("./vue/vue_admin.php");
				}
			} else {
				$alerte = "Vérifiez que vous avez entré le bon pseudo ou mot de passe.";
				include("./vue/vue_connexion.php");
			}
		} else {
			$alerte = "Vérifiez que vous avez entré le bon pseudo ou mot de passe.";
			include("./vue/vue_connexion.php");
		}
	}else{		
		include("./vue/vue_connexion.php");
	}
	
?>
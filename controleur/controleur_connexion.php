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
					$id = id($pseudo);
					$_SESSION["id"] = $id;
					$_SESSION["mdp"] = $mdp;
					include("./vue/vue_gestion_blog.php");
				} else {
					$_SESSION["pseudo"] = $pseudo;
					$results = liste_utilisateur();
					//echo $results;
					foreach($results as $cle => $result){
						$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
						$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
					}
					
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
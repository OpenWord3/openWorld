<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["valider"])){
		$pseudo = htmlspecialchars($_POST["pseudo"]);
		$mdp = htmlspecialchars($_POST["mdp"]);

		$mail = $_POST["mail"];

		if(preg_match("`^[a-z]+[[:alnum:]]+$`",$pseudo)){
			if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {	
				$verif_pseudo = compte($pseudo);
				$check_mail = check_mail($mail);
				if($verif_pseudo != 0){
					$alerte = "Ce compte exite déjà";
					include("./vue/vue_inscription.php");
				} else {
					if($check_mail != 0){
						$alerte = "Cette adresse mail exite déjà";
						include("./vue/vue_inscription.php");
					} else {
						$mdp1 = hash_mdp($mdp); 
						inscription($pseudo,$mdp1,$mail);
						$_SESSION["pseudo"] = $pseudo;

						$_SESSION["mdp"] = $mdp;
						$id = id($pseudo);
						$_SESSION["id"] = $id;

						$results = liste_relais($id);

						foreach($results as $cle => $result){
							$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
							$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
						}

						include("./vue/vue_gestion_blog.php");
					}
				}
			} else {
				$alerte = "L'adresse mail que vous avez entré n'est pas valide !!!";
				include("./vue/vue_inscription.php");
			}
		} else {
			$alerte = "Veuillez éviter les caractères spéciaux !!!";
			include("./vue/vue_inscription.php");
		}					
	} else {
		include("./vue/vue_inscription.php");
	}	
	
?>
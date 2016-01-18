<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["valider"])){
		$pseudo = htmlspecialchars($_POST["pseudo"]);
		$mdp = $_POST["mdp"];

		$mail = $_POST["mail"];

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
				$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
				$mdp1 = hash_mdp($mdp,$salt);  
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
		include("./vue/vue_inscription.php");
	}	
	
?>
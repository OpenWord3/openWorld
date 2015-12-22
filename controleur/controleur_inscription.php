<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["valider"])){
		$pseudo = $_POST["pseudo"];
		$mdp = $_POST["mdp"];
	//	$nom = $_POST["nom"];
	//	$prenom = $_POST["prenom"];
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
				inscription($pseudo,$mdp,$nom,$prenom,$mail);
				$_SESSION["pseudo"] = $pseudo;
			//	$_SESSION["prenom"] = $prenom;
				$_SESSION["mdp"] = $mdp;
				$id = id($pseudo);
				$_SESSION["id"] = $id;
				include("./vue/vue_gestion_blog.php");
			}
		}					
	} else {
		include("./vue/vue_inscription.php");
	}	
	
?>
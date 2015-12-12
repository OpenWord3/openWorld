<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["valider"])){
		$pseudo = $_POST["pseudo"];
		$mdp = $_POST["mdp"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$mail = $_POST["mail"];

		$verif_pseudo = compte($pseudo);
		if($verif_pseudo != 0){
			$alerte = "Ce compte exite déjà";
			include("./vue/vue_inscription.php");
		} else {
			inscription($pseudo,$mdp,$nom,$prenom,$mail);
			$_SESSION["pseudo"] = $pseudo;
			$_SESSION["prenom"] = $prenom;
			include("./vue/vue_gestion_blog.php");
		}		
	} else {
		include("./vue/vue_inscription.php");
	}	
	
?>
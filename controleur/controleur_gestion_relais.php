<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["ajouter"])){
		$domain = $_POST["domain"];
		$ip = $_POST["ip"];
		$pseudo = $_SESSION["pseudo"];
		$id = id($pseudo);

		$verif_domain = domain($domain);
		if($verif_domain == 0){
			$verif_ip = ip($ip);
			if($verif_ip == 0){
				add_relais($domain,$ip,$id);
				exec('sudo /var/script/add-relais.sh '.$domain.' '.$ip);
				$alerte = "Votre nom de domaine vient d’être ajouté parcontre patientez le temps que l’adimistrateur le valide.";
				include("./vue/vue_gestion_relais.php");
			} else {
				$alerte = "Cette adresse ip existe déjà dans notre service.";
				include("./vue/vue_gestion_relais.php");
			}
		} else {
			$alerte = "Ce nom de domaine existe déjà dans notre service.";
			include("./vue/vue_gestion_relais.php");
		}
	} else if(isset($_POST["supprimer"])) {
		$domain = $_POST["domain"];
		$verif_domain = domain($domain);
		if($verif_domain == 0){
			del_relais($domain);
			exec('sudo /var/script/del-relais.sh '.$domain);
			$alerte = "Le nom de domaine vient d’être supprimé de notre service.";
			include("./vue/vue_gestion_relais.php");
		} else {
			$alerte = "Ce nom de domain n'existe pas dans notre service.";
			include("./vue/vue_gestion_relais.php");
		}
	} else {
		include("./vue/vue_gestion_relais.php");
	}	
	
?>
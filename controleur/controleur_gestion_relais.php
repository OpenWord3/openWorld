<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$pseudo = $_SESSION["pseudo"];
	$id = id($pseudo);
	if(isset($_POST["ajouter"])){
		$domain = htmlspecialchars($_POST["domain"]);
		$ip = $_POST["ip"];
		$pseudo = $_SESSION["pseudo"];
		$id = id($pseudo);

		$verif_domain = domain($domain);
		if($verif_domain == 0){
			$verif_ip = ip($ip);
			if($verif_ip == 0){
				add_relais($domain,$ip,$id);

				//exec('sudo /var/script/add-relais.sh '.$domain.' '.$ip); 

				$alerte = "Votre nom de domaine vient d’être ajouté parcontre patientez le temps que l’adimistrateur le valide.";
				$results = liste_relais($id);
				foreach($results as $cle => $result){
					$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
					$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
				}
				include("./vue/vue_gestion_relais.php");
			} else {
				$alerte = "Cette adresse ip existe déjà dans notre service.";
				$results = liste_relais($id);
				foreach($results as $cle => $result){
					$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
					$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
				}
				include("./vue/vue_gestion_relais.php");
			}
		} else {
			$alerte = "Ce nom de domaine existe déjà dans notre service.";
			$results = liste_relais($id);
			foreach($results as $cle => $result){
				$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
				$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
			}
			include("./vue/vue_gestion_relais.php");
		}
	} else if(isset($_POST["supprimer"])) {

		$domain = $_POST["domain"];		
			del_relais($domain);
			exec('sudo /var/script/del-relais.sh '.$domain);
			$alerte = "Le nom de domaine vient d’être supprimé de notre service.";
			$results = liste_relais($id);
			foreach($results as $cle => $result){
				$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
				$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
			}
			include("./vue/vue_gestion_relais.php");
		
	} else if(isset($_POST["activer_relais"])){
		$domain = $_POST["domain"];
		$ip = $_POST["ip"];
		$id_domain = id_domaine($ip);
		exec('sudo /var/script/add-relais.sh '.$domain.' '.$ip);
		$alerte = "Votre nom de domaine vient d’être activé.";
		$results = liste_relais($id);
		$status = '1';
		change_relais($id_domain,$status);
		foreach($results as $cle => $result){
			$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
			$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
		}
		include("./vue/vue_gestion_relais.php");

	} else if(isset($_POST["desactiver_relais"])){
		$domain = $_POST["domain"];
		$ip = $_POST["ip"];
		$id_domain = id_domaine($ip);
		exec('sudo /var/script/del-relais.sh '.$domain);
		$alerte = "Le nom de domaine vient d’être supprimé de notre service.";
		$status = '0';
		change_relais($id_domain,$status);
		$results = liste_relais($id);
		foreach($results as $cle => $result){
			$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
			$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
		}
		include("./vue/vue_gestion_relais.php");
	} else {
		
		$results = liste_relais($id);
		foreach($results as $cle => $result){
			$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
			$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
		}
		include("./vue/vue_gestion_relais.php");
	}	
	
?>
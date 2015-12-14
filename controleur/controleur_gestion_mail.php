<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_GET["action"])){
		switch($_GET["action"]){
			case "activer_mail":
				$id = $_SESSION["id"];
				$verif_mail = mail_open($id);
				if($verif_mail == ""){
					$pseudo = $_SESSION["pseudo"];
					$mdp = $_SESSION["mdp"];
					$adresse_mail = $pseudo."@openworld.itinet.fr";
					//exec('sudo -u www-data -s /bin/bash'); exit;				
					exec('sudo /var/script/add_compte_mail.sh '.$pseudo.' '.$mdp); /*exit;*/
					add_mail($id,$adresse_mail);
					active_mail($id);
					$alerte = "Votre compte mail qui est ".$pseudo."@openworld.itinet.fr vient d'être activé. Vous pouvez vous connecté avec le même mot de passe";
					include("./vue/vue_gestion_mail.php");
				} else {
					$verif_status_mail = status_mail($id);
					if($verif_status_mail == "1"){
						$alerte = "Votre compte mail est déjà activé.";
						include("./vue/vue_gestion_mail.php");
					} else {
						$alerte = "Votre compte mail vient d'être activé.";
						//exec('sudo -u www-data -s /bin/bash'); exit;
						exec('sudo /var/script/activation_mail_account.sh '.$pseudo); exit;						
						active_mail($id);
						include("./vue/vue_gestion_mail.php");
					}
				}
				break;
			case "desactiver_mail":
				$id = $_SESSION["id"];
				$verif_status_mail = status_mail($id);
				if($verif_status_mail == "1"){					
					$pseudo = $_SESSION["pseudo"];
					$alerte = "Votre compte mail vient d'être désactivé.";
					//exec('sudo -u www-data -s /bin/bash'); exit;
					exec('sudo /var/script/desactivation_mail_account.sh '.$pseudo); exit;						
					desactive_mail($id);
					include("./vue/vue_gestion_mail.php");
				} else {
					$alerte = "Votre compte mail est déjà désactivé.";
					include("./vue/vue_gestion_mail.php");
				}
				break;
			case "supprimer_mail":
				$id = $_SESSION["id"];
				$verif_mail = mail_open($id);
				if($verif_mail != ""){
					$pseudo = $_SESSION["pseudo"];
					$alerte = "Votre compte mail vient d'être définitivement fermé.";
					//exec('sudo -u www-data -s /bin/bash'); exit;
					exec('sudo /var/script/del_mail_account.sh '.$pseudo); exit;
					del_mail($id);
					desactive_mail($id);
					include("./vue/vue_gestion_mail.php");
				} else {
					$alerte = "Vous n'avez aucun compte mail actuellement.";
					include("./vue/vue_gestion_mail.php");
				}
				break;
		}
	} else {
		include("./vue/vue_gestion_mail.php");
	}	
?>
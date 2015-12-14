<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_GET["action"])){
		$id = $_SESSION["id"];
		$pseudo = $_SESSION["pseudo"];
		$mdp = $_SESSION["mdp"];

		switch($_GET["action"]){
			case "acceder_blog":
				$verif_blog = blog($id);
				if($verif_blog == ""){
					$alerte = "Vous n'avez pas de blog actuellement.";
					include("./vue/vue_gestion_blog.php");
				} else {
					$verif_status_blog = status_blog($id);
					if($verif_status_blog == "1"){
						header("location:http://".$pseudo.".openworld.itinet.fr");
					} else {
						$alerte = "Votre blog n'est pas actif actuellement, vous devez d'abord l'activé.";
						include("./vue/vue_gestion_blog.php");
					}
					
				}
				break;
			case "activer_blog":
				$verif_blog = blog($id);
				if($verif_blog == ""){
					$blog = $pseudo.".openworld.itinet.fr";
					$status = "1";					
					//exec('sudo -u www-data -s /bin/bash '); exit;
					exec('sudo /var/script/add_vhost.sh '.$pseudo.' '.$mdp); exit;
					add_blog($id,$blog,$status);
					$alerte = "Votre blog vient d'être activé.";
					include("./vue/vue_gestion_blog.php");
				} else {
					$verif_status_blog = status_blog($id);
					if($verif_status_blog == "1"){
						$alerte = "Votre blog est déjà activé.";
						include("./vue/vue_gestion_blog.php");
					} else {
						$alerte = "Votre blog vient d'être activé.";
						$status = "1";
						active_blog($id,$status);
						//exec('sudo -u www-data -s /bin/bash'); exit;
						exec('sudo /var/script/activation_vhost.sh '.$pseudo); exit;
						include("./vue/vue_gestion_blog.php");
					}
				}
				break;
			case "desactiver_blog":
				$verif_blog = blog($id);
				if($verif_blog == ""){
					$alerte = "Vous n'avez pas de blog actuellement.";
					include("./vue/vue_gestion_blog.php");
				} else {
					$verif_status_blog = status_blog($id);
					if($verif_status_blog == "0"){
						$alerte = "Votre blog est déjà désactivé.";
						include("./vue/vue_gestion_blog.php");
					} else {
						$alerte = "Votre blog vient d'être désactivé.";
						$status = "0";
						active_blog($id,$status);
						//exec('sudo -u www-data -s /bin/bash'); exit;
						exec('sudo /var/script/unactivation_vhost.sh '.$pseudo); exit;
						include("./vue/vue_gestion_blog.php");
					}
				}
				break;
			case "supprimer_blog":
				$verif_blog = blog($id);
				if($verif_blog == ""){
					$alerte = "Vous n'avez pas de blog actuellement.";
					include("./vue/vue_gestion_blog.php");
				} else {
					$status = "0";
					$alerte = "Votre blog vient d'être définitivement fermé.";
					//exec('sudo -u www-data -s /bin/bash'); exit;
					exec('sudo /var/script/remove_vhost.sh '.$pseudo); exit;
					del_blog($id,$status);
					include("./vue/vue_gestion_blog.php");
				}
				break;
		}
	} else {
		include("./vue/vue_gestion_blog.php");
	}	
	
?>
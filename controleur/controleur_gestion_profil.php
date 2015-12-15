<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_GET["desinscrire"])){
		$pseudo = $_SESSION["pseudo"];
		$id = id($pseudo);

		exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		$domain = domain_user($id);
		foreach($domain as $nom)){			
			exec('sudo /var/script/del-relais.sh '.$nom);
		}		
		del_relais2($id);
		logout($pseudo);
		header("location:openworld.itinet.fr");
	} /*else if (){

	}*/else {
		include("./vue/vue_gestion_profil.php");	
	}
	
?>
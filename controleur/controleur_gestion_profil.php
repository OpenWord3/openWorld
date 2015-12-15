<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_GET["desinscrire"])){
		$pseudo = $_SESSION["pseudo"];
		$id = id($pseudo);

		exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		exec('sudo /var/script/del-relais.sh '.$domain);
		del_relais2($id);
		logout($pseudo);
	} /*else if (){

	}*/else {
		include("./vue/vue_gestion_profil.php");	
	}
	
?>
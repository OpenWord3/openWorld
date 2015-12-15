<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	$pseudo = $_SESSION["pseudo"];
	if(isset($_GET["desinscrire"])){
		
		echo $pseudo;


		$id = id($pseudo);
		//del_relais2($id);
		//logout($pseudo);

		//exec('sudo /var/script/remove_vhost.sh '.$pseudo);
		//exec('sudo /var/script/del_mail_account.sh '.$pseudo);
		$domain = domain_user($id);
		var_dump($domain);
		/*foreach($domain as $nom){			
			echo $nom;
			exec('sudo /var/script/del-relais.sh '.$nom);
		}*/		
		include("./vue/vue_test.php");
		//header("location:openworld.itinet.fr");
	} /*else if (){

	}*/else {
		
		echo $pseudo;
		include("./vue/vue_gestion_profil.php");	
	}
	
?>
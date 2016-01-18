<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_timeline.php");
	include("./modele/modele_abonnement.php");
	include("./modele/modele_fonction.php");
	include("/var/www/wordpress/wp-load.php");
	
	$id_suivi = $_SESSION['id'];
	$pseudo_suiveur = $_POST['pseudo'];
	
	$id_suiveur = id($pseudo_suiveur);
	
	if(isset($_POST['desabonner'])){
		suppr_abonne($id_suivi,$id_suiveur);
	}
	
	$id_pseudo = $_SESSION['id'];
	$voir_abonne = voir_abonne($id_pseudo);
	
	while($donnees = $voir_abonne->fetch()){
		$pseudo = $donnees['pseudo'];
		
		$abonne_blog_name = abonne_blog_name($pseudo);
		foreach($abonne_blog_name as $result){
			$blog_name[$pseudo] = $result->option_value;
		}
	}	
	
	$voir_abonne = voir_abonne($id_pseudo);

	include("./vue/vue_gestion_abonnement.php");
?>
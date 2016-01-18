<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_timeline.php");
	include("C:\Users\wamp\www\wp-load.php");
	
	$id_pseudo = $_SESSION['id'];
	
	$voir_abonne = voir_abonne($id_pseudo);
	$timeline_compteur = 0;
	while($donnees = $voir_abonne->fetch()){
		$pseudo = $donnees['pseudo'];
		
		$recupere_timeline = recupere_timeline($pseudo);
		
		if(!empty($recupere_timeline)){
			$timeline_compteur++;
			
			foreach($recupere_timeline as $result){
				$timeline[] = $result->guid;
			}
		}
	}
	
	include("./vue/vue_gestion_timeline.php");
?>
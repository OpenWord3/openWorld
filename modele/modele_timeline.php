<?php
	function voir_abonne($id_pseudo){
		global $bdd;
		$resultat = $bdd->query("SELECT pseudo FROM abonnement JOIN utilisateur ON abonnement.utilisateur_suiveur = utilisateur.id_utilisateur WHERE utilisateur_suivi = $id_pseudo ");
		
		return $resultat;
		
	}
	
	function recupere_timeline($pseudo){
		$newdb = new wpdb( 'root' , 'africainetfier' , "$pseudo" , 'localhost'); 
		$results = $newdb->get_results("SELECT * FROM wp_posts WHERE post_type LIKE 'post' AND post_status LIKE 'publish' ORDER BY post_modified_gmt DESC");
		
		return $results;
	}
?>
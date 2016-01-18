<?php

	function ajout_abonne($id_suivi,$id_suiveur){
		global $bdd;

		$req = $bdd->prepare("INSERT INTO `abonnement` (`utilisateur_suivi`,`utilisateur_suiveur`) values (:id_suivi,:id_suiveur);");
		$req->execute(array(
							'id_suivi'=>$id_suivi,
							'id_suiveur'=>$id_suiveur));
		$req->closeCursor();
	}
	function suppr_abonne($id_suivi,$id_suiveur){
		global $bdd;
		
		$req = $bdd->prepare("DELETE FROM abonnement WHERE utilisateur_suivi = :id_suivi AND utilisateur_suiveur = :id_suiveur");
		$req->execute(array(
							'id_suivi'=>$id_suivi,
							'id_suiveur'=>$id_suiveur
		));
		
		$req->closeCursor();
	}
	function abonne_blog_name($res){
		$newdb = new wpdb( 'root' , '' , "$res" , 'localhost'); 
		$results = $newdb->get_results("SELECT * FROM wp_options WHERE option_name LIKE 'blogname'");
		
		return $results;
	}
?>
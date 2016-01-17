<?php

	function ajout_abonne($id_suivi,$id_suiveur){
		global $bdd;

		$req = $bdd->prepare("INSERT INTO `abonnement` (`utilisateur_suivi`,`utilisateur_suiveur`) values (:id_suivi,:id_suiveur);");
		$req->execute(array(
							'id_suivi'=>$id_suivi,
							'id_suiveur'=>$id_suiveur));
		$req->closeCursor();
	}
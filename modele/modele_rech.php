<?php	
	function compteur_rech($hello){
		global $bdd;

		$req = $bdd->prepare('SELECT count(id_utilisateur) AS nbre_occurences FROM utilisateur WHERE nom like ? or prenom like ?');
		$req->execute(array($hello[0]."%",$hello[0]."%"));

		$donnees = $req->fetch();
		$nbre_occurences = $donnees['nbre_occurences'];

		return $nbre_occurences;
	}

	function rech_complet($hello){
		global $bdd;

		$req = $bdd->query("SELECT nom,prenom,fqdn,pseudo FROM utilisateur WHERE nom like '$hello[0]%' or prenom like '$hello[1]%'");
		return $req;
	}	
	function rech_moitie($hello){
		global $bdd;

		$req = $bdd->query("SELECT nom,prenom,fqdn,pseudo FROM utilisateur WHERE nom like '$hello[0]%' or prenom like '$hello[0]%'");
		return $req;
	}
?>
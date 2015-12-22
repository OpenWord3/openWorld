<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_rech.php");

$res_rech = $_POST['res_rech'];
$hello = explode(" ", $res_rech);
$nbre_occurences = compteur_rech($hello);
	if($nbre_occurences == 0) {
		$alert="Aucun résultat pour : ";
		include("./vue/page_recherche.php");
	}
	
	else {
		if (isset ($hello[1])){
			$recherche = rech_complet($hello);
	}
	else {
		$recherche = rech_moitie($hello);
	}
		include("./vue/page_recherche.php");
	}
	
?>
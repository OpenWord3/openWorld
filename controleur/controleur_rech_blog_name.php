<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_rech.php");
	include("C:\Users\wamp\www\wp-load.php");
	include("./modele/modele_timeline.php");
	include("./modele/modele_abonnement.php");
	include("./modele/modele_fonction.php");

$res_rech = $_POST['res_rech'];
$id_pseudo = $_SESSION['id'];
//$hello = explode(" ", $res_rech);
//$nbre_occurences = compteur_rech($hello);

	/*if($nbre_occurences == 0) {
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
	}*/
	if(isset($_POST['abonne'])){
		$pseudo_suiveur = $_POST['pseudo'];
	
		$id_suiveur = id($pseudo_suiveur);
	
		ajout_abonne($id_pseudo,$id_suiveur);
		$res_rech = $_POST['res_rech'];
	}
	$voir_abonne = voir_abonne($id_pseudo);
	$test[0] = "steephen";
	$test[1] = "hassane";
	$test[2] = "adolf";
	
	$rech_compteur = 0;
	foreach($test as $res){
		$recherche = recherche_blog_name($res,$res_rech);
		$resultats_siteurl = resultats_siteurl($res);

		while($donnees = $voir_abonne->fetch()){
			$abonne[] = $donnees['pseudo'];
		}	
		
		if(!empty($recherche)){
			$rech_compteur++;	
			$pseudo[] = $res;
			foreach($resultats_siteurl as $res){
				$siteurl[] = $res->option_value;
			}
			foreach($recherche as $res){
				//$rech[] = "Nom du blog : " . "<B>" . $res->option_value . "</B>" . " / "  . "<a href=" . $res->siteurl . ">" . "Accéder à ce blog" . "</a>  ";
				$rech[] = $res->option_value;
			}			
		}	
	}
	include("./vue/vue_rech_blog_name.php");

?>
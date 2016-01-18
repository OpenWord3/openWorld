<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_rech.php");
	include("C:\Users\wamp\www\wp-load.php");

$res_rech = $_POST['res_rech'];

	$test[0] = "steephen";
	$test[1] = "adolf";
	$test[2] = "hassane";
	
	$rech_compteur = 0;
	foreach($test as $res){
		$recherche = recherche($res,$res_rech);
		
		if(!empty($recherche)){
			$rech_compteur++;	
			foreach($recherche as $res){
				$rech[] = "Titre du poste : " . "<B>" . $res->post_title . "</B>" . " / "  . "<a href=" . $res->guid . ">" . "Accéder à ce poste" . "</a>  ";
			}			
		}	
	}
	include("./vue/page_recherche.php");

?>
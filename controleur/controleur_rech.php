<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_rech.php");
	include("./modele/modele_fonction.php");
	include("/var/www/wordpress/wp-load.php");

$res_rech = $_POST['res_rech'];


	/*$test[0] = "steephen";
	$test[1] = "adolf";
	$test[2] = "hassane";*/
	$tous_utilisateurs = tous_utilisateurs();
	while($donnees = $tous_utilisateurs->fetch()){
		$tous_utilisateur[] = $donnees['pseudo'];
	}	
	$rech_compteur = 0;
	foreach($tous_utilisateur as $res){
		$recherche = recherche($res,$res_rech);
		
		if(!empty($recherche)){
			$rech_compteur++;	
			foreach($recherche as $res){
				$rech[] = "<ol><h3><a href=" . $res->guid . " target=_blank>" . $res->post_title . "</a></h3><br  class='ligne'>" . $res->guid . "</ol>";
			}			
		}	
	}
	include("./vue/page_recherche.php");

?>
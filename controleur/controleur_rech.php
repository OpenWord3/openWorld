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
				$post_date = explode(" ",$res->post_date);
				$rech[] = "<ol><h3><a href=" . $res->guid . " target=_blank><i class='fa fa-compass'></i> " . $res->post_title . "</a></h3></n>" . $res->guid . "<i class='fa fa-caret-down'></i><br>" . strftime("%Y-%m-%d", strtotime($post_date)) . substr($res->post_content, 0, 5) . "</ol>";
			}			
		}	
	}
	include("./vue/page_recherche.php");

?>
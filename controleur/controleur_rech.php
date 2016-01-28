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
				$post_content = substr($res->post_content, 0, 400);
				$post_content = str_split($post_content, 200);
				$post_content[0] = str_replace(chr(34),"'",$post_content[0]);
				$post_content[1] = str_replace(chr(34),"'",$post_content[1]);
				$rech[] = "<ol><h4><a href=" . $res->guid . " target=_blank><i class='fa fa-compass'></i> " . $res->post_title . "</a></h4></n><h5 style='color:green;'>" . $res->guid . " <i class='fa fa-caret-down'></i></h5></n>" . $post_date[0] . "  <label>" . strip_tags($post_content[0]) . "</label><br><label>" . strip_tags($post_content[1]) . "..." . "</label></ol>";
			}			
		}	
	}
	include("./vue/page_recherche.php");

?>
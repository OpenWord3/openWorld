<?php	
	/*function compteur_rech($hello){
		global $bdd;

		$req = $bdd->prepare('SELECT count(id_utilisateur) AS nbre_occurences FROM utilisateur WHERE nom like ? or prenom like ?');
		$req->execute(array($hello[0]."%",$hello[0]."%"));

		$donnees = $req->fetch();
		$nbre_occurences = $donnees['nbre_occurences'];

		return $nbre_occurences;
	}*/

	function recherche($res,$res_rech){
		$newdb = new wpdb( 'root' , 'africainetfier' , "$res" , 'localhost'); 
		$results = $newdb->get_results("SELECT * FROM wp_posts WHERE post_type LIKE 'post' AND post_status LIKE 'publish' AND post_title LIKE '$res_rech%' AND post_name NOT LIKE 'bonjour-tout-le-monde'");
		
		return $results;
	}	
	function recherche_blog_name($res,$res_rech){
		$newdb = new wpdb( 'root' , 'africainetfier' , "$res" , 'localhost'); 
		$results = $newdb->get_results("SELECT * FROM wp_options WHERE option_name LIKE 'blogname' AND option_value LIKE '$res_rech%'");
		
		return $results;
	}		
	function resultats_siteurl($res){
		$newdb = new wpdb( 'root' , 'africainetfier' , "$res" , 'localhost'); 
		$results = $newdb->get_results("SELECT * FROM wp_options WHERE option_name LIKE 'siteurl'");
		
		return $results;
	}	

	/*function rech_moitie($hello){
		global $bdd;

		$req = $bdd->query("SELECT nom,prenom,fqdn_blog,pseudo FROM utilisateur WHERE nom like '$hello[0]%' or prenom like '$hello[0]%'");
		return $req;
	}*/
?>
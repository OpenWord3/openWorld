<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tableau de bord OPENWORLD">
    <meta name="author" content="Serge Louis Adolphe">

    <title>Tableau de bord OPENWORLD</title>

    <link href="./bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="./bootstrap/dist/css/timeline.css" rel="stylesheet">
    <link href="./bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<script>
function recupererFichier(fichier, div) {
    if(window.XMLHttpRequest) // FF
        xhr_object = new XMLHttpRequest();
    else if(window.ActiveXObject) // IE
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    else
        return(false);
    xhr_object.open("GET", fichier, false); // Ouverture du fichier
    xhr_object.send(null);
    div.innerHTML = xhr_object.responseText; // Mofication du div
}
</script>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo INDEX ?>">OPENWORLD</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo INDEX ?>?index=vue_gestion_profil"><i class="fa fa-user fa-fw"></i> Gérer son profil</a>
                        </li>
                        <li><a href="<?php echo INDEX ?>?index=vue_parametres"><i class="fa fa-gear fa-fw"></i> Paramètres</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo INDEX ?>"><i class="fa fa-sign-out fa-fw"></i> Se Deconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Recherche...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>

                        <li>
                            <a href="<?php echo INDEX ?>?index=vue_gestion_blog"><i class="fa fa-youtube-play fa-fw"></i> Gérer son blog</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-comments fa-fw"></i> Gérer son service mail<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo INDEX ?>?index=vue_gestion_relais">Gérer les relais</a>
                                </li>

                                <li>
                                    <a href="<?php echo INDEX ?>?index=vue_gestion_mail">Gérer son compte mail</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
						<?php
						include("C:\Users\wamp\www\wp-load.php");
						try{
							$bdd = new PDO("mysql:host=localhost;dbname=openworld;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						}catch(Exception $e){
							die("ERREUR : ".$e->getMessage());
						}	
						$resultat = $bdd->query("SELECT pseudo FROM utilisateur WHERE pseudo LIKE 'adolf' OR pseudo LIKE 'steephen'");
						/*while ($donnees = $resultat->fetch()) {
							$pseudo = $donnees['pseudo'];
							$newdb = new wpdb( 'root' , '' , "$pseudo" , 'localhost');
							$results = $newdb->get_results("SELECT * FROM wp_posts WHERE post_type LIKE 'post'");*/

						?>
                          <!--  <a href="#" onclick="recupererFichier('http://localhost/steephen/?p=4', test);recupererFichier('http://localhost/adolf/?p=4', test1)"><i  class="fa fa-table fa-fw"></i> Gérer sa timeline</a> -->
						<a href="#" onclick="<?php  while ($donnees = $resultat->fetch()) { $pseudo = $donnees['pseudo']; $newdb = new wpdb( 'root' , '' , "$pseudo" , 'localhost'); $results = $newdb->get_results("SELECT * FROM wp_posts WHERE post_type LIKE 'post' AND post_status LIKE 'publish' ORDER BY post_modified_gmt DESC");  $i=0; foreach ($results as $result) { $i++; $r = $result->guid; echo "recupererFichier('$r', test$i);" ;} }?>"><i  class="fa fa-table fa-fw"></i> Gérer sa timeline</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<div id="test1">
</div>
<div id="test2">
</div>
<div id="test3">
</div>
<div id="test4">
</div>
<div id="test5">
</div>
<div id="test6">
</div>
<div id="test7">
</div>
<div id="test8">
</div>
<div id="test9">
</div>
<div id="test10">
</div>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenue <?php echo $_SESSION["pseudo"];?></h1>
                </div>
            </div>
		</div>
            <ol>
                GESTION DE TIMELINE ICI<br>
				
 <?php include("C:\Users\wamp\www\wp-load.php");
 	/*$newdb = new wpdb( 'root' , '' , 'steephen' , 'localhost');
	$results = $newdb->get_results("SELECT * FROM wp_posts WHERE post_type LIKE 'post'");
	foreach ($results as $result) {
		echo $result->guid,"<br>";
	}*/
 ?>
            </ol>

    <!-- jQuery -->
    <script src="./bootstrap/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bootstrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="./bootstrap/bower_components/raphael/raphael-min.js"></script>
    <script src="./bootstrap/bower_components/morrisjs/morris.min.js"></script>
    <script src="./bootstrap/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./bootstrap/dist/js/sb-admin-2.js"></script>

</body>

</html>

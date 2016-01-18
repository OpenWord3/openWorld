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

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="./bootstrap/css/timeline.css" rel="stylesheet">
    <link href="./bootstrap/css/sb-admin-2.css" rel="stylesheet">
    <link href="./bootstrap/morrisjs/morris.css" rel="stylesheet">
    <link href="./bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstrap/metisMenu/dist/metisMenu.min.js"></script>
    <script src="./bootstrap/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#langages').autocomplete({
				serviceUrl: './modele/recherche_blog_name.php',

				dataType: 'json'
			});
		});
	</script>
</head>

<body>

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
                                <form action="<?php echo INDEX ?>?index=recherche_blog_name" method="post" >
									<input type="text" id="langages" name="res_rech" class="form-control" placeholder="Recherche...">
                                </form>
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
                            <a  class="nav" data-toggle="nav" href="#"><i class="fa fa-comments fa-fw"></i> Gérer son service mail<span class="fa arrow"></span></a>
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

                            <a  class="nav" data-toggle="nav" href="#"><i class="fa fa-table fa-fw"></i> Gérer sa timeline<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo INDEX ?>?index=vue_gestion_timeline">Consulter sa timeline</a>
                                </li>

                                <li>
                                    <a href="<?php echo INDEX ?>?index=vue_gestion_abonnement">Gérer ses abonnements</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <br>
                    <br>
                    
                    <ul>
                        <li>
                            <a href="http://mail.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-comments-o fa-1x"> Accéder à OpenMail</i></a>
                        </li>

                        <li>
                            <a href="http://phpmyadmin.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-sitemap fa-1x"> Accéder à PHPMyAdmin</i></a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="page-wrapper">
            
            <div class="container">

            <!-- Portfolio Item Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Résultats de votre recherche pour : <?php echo "<B>$res_rech</B;" ?>
                    </h1>
                </div>

            </div>
		</div>

<?php
if($rech_compteur == 0){
	echo "<H2>Aucun résultat</H2>";
}
else {
	for($i=0; $i < count($rech); $i++){
		$button = "<input class='btn btn-md btn-success' type='submit'  value='abonner' name='sumbit'>";
		for($x=0; $x < count($abonne); $x++){
			if($pseudo[$i] == $abonne[$x]){
				//$verif = true;
				$button = "<h5 style='color:green;'>Vous êtes déjà abonné à ce Blog</h5>";
				//exit;
			}
		}

	//	if($verif != "abonne"){
		echo "Nom du blog : <B>$rech[$i]</B> / <a href='$siteurl[$i]'> Accéder à ce blog</a>" ?> <form action="<?php echo INDEX ?>?index=recherche_blog_name" method='post' ><input type='hidden' name='pseudo' value="<?php echo $pseudo[$i] ?>"><input type='hidden' name='res_rech' value="<?php echo $res_rech ?>"><input type='hidden' name='abonne' value="abonne"><?php echo $button; ?></form><br>
		<?php
	//	}
		//echo $siteurl[$i];
	}
	/*foreach($rech as $resultats){
		echo $resultats ;
	}*/
}
 ?>
                </div>
				
                <hr>

                <!-- Footer -->
                <footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Copyright &copy; OPENWORLD 2016</p>
                        </div>
                    </div>
                    <!-- /.row -->
                </footer>

            </div>
        </div>

</body>

</html>

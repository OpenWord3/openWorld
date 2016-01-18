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
            <?php 
                $id = id($_SESSION["pseudo"]);
                $verif_blog = blog($id);
                $status_blog = status_blog($id);
                $verif_star = verif_star($id);
                $verif_demande = verif_demande_star($id); 
            ?>
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
                        <li>
                            <div class="<?php if($verif_blog == '' || $status_blog == '0' || $status_blog == '2' || $verif_star == '1' || $verif_demande == '1'){ echo 'disabled';}else{echo '';}?>">
                                <a href="<?php echo INDEX ?>?index=devenir_star"><i class="">Devenir star</i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#myModalAjout" data-toggle="modal" data-target="#myModalAjout">
                            <div class="panel-footer">
                                <span class="pull-left">Modifier ses informations de profil</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-remove fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#myModalSuppr" data-toggle="modal" data-target="#myModalSuppr">
                            <div class="panel-footer">
                                <span class="pull-left">Se désinscrire</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <ol>
                <?php if(isset($_POST["modifier"])){echo $alerte;} ?>
                La désincription est définitive. Vous perdrez toutes vos données et tous vos services.
            </ol>

            <!-- Modal -->
				<div class="modal fade" id="myModalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Modification de profil</h4>
				</div>
				<div class="modal-body">
                    
					<form action="<?php echo INDEX ?>?index=vue_gestion_profil" method="post">

						<input class="form-control" placeholder="Votre Nom" id="name" type="name" name="nom" <?php if(isset($_POST["modifier"])){echo "value='".$_POST["nom"]."'";} ?> required pattern="[a-zA-Z]+[A-Za-zéèç\0\s\-]{1,32}">
                        <input class="form-control" placeholder="Vos Prénoms" id="surname" type="surname" name="prenom" <?php if(isset($_POST["modifier"])){echo "value='".$_POST["prenom"]."'";} ?> required pattern="[a-zA-Z]+[A-Za-zéèç\0\s\-]{1,32}">
                        <input class="form-control" placeholder="Votre E-Mail" id="mail" type="mail" name="email" <?php if(isset($_POST["modifier"])){echo "value='".$_POST["email"]."'";} ?> required pattern="[a-z0-9._]+@[a-z]+.[a-z]{2,4}">
                        <input class="form-control" placeholder="Votre Mot de passe" id="password" type="password" name="mdp" required>

						<center><input type="submit" value="Modifier" class="panel panel-green" name="modifier"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalSuppr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Se desinscrire ?</h4>
				</div>
				<div class="modal-body">
				  <center>
					<!--<form>-->
						<a href="<?php echo INDEX ?>?index=vue_gestion_profil&desinscrire=oui"><button class="panel panel-green">OUI</button></a>
						<button class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true">NON</button>
					<!--</form>-->
				  </center>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div>
			<!-- /.modal -->

</body>

</html>

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
                <a class="navbar-brand" href="<?php echo INDEX ?>"><i><img src="./bootstrap/images/logo.png" height="30" width="40"></i>OPENWORLD</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="http://mail.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-comments-o fa-1x"> Accéder à OpenMail</i></a>
                </li>

                <li>
                    <a href="http://phpmyadmin.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-sitemap fa-1x"> Accéder à PHPMyAdmin</i></a>
                </li>
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
                    
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <section id="last">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <h2 class="margin-top-0 wow fadeIn">Envie de nous parler ?</h2>
                            <hr class="primary">
                            <p>Tu peux nous écrire ! Nous serons heureux de te repondre ... après notre partie de babyfoot</p>
                        </div>
                        <div class="col-lg-10 col-lg-offset-1 text-center">
                            <form method="POST" class="contact-form row" action="<?php echo INDEX ?>?index=vue_accueil">
                                <div class="col-md-4">
                                    <label></label>
                                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <input type="text" class="form-control" name="telephone" placeholder="Telephone">
                                </div>
                                <div class="col-md-12">
                                    <label></label>
                                    <textarea class="form-control" rows="9" name="message" placeholder="Ton message"></textarea>
                                </div>
                                <div class="col-md-4 col-md-offset-4">
                                    <label></label>
                                    <button type="submit" name="valider" class="btn btn-primary btn-block btn-lg">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

</body>

</html>

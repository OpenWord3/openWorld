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
                            <a href="<?php echo INDEX ?>?index=vue_gestion_timeline"><i class="fa fa-table fa-fw"></i> Gérer sa timeline</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenue <?php echo $_SESSION["pseudo"];?></h1>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="<?php if($verif_blog == '' || $status_blog == '0' || $status_blog == '2'){ echo 'panel panel-default';}else{echo 'panel panel-primary';}?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-external-link fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>

                        <!--<a href="http://<?php echo $_SESSION["pseudo"];?>.openworld.itinet.fr">-->
                        <?php 
                            $id = id($_SESSION["pseudo"]);
                            $verif_blog = blog($id);
                            $status_blog = status_blog($id); 
                        ?>
                        <?php if(isset($_GET["action"])){ if($_GET["action"] == "acceder_blog"){echo $alerte;}} ?>
                        <a href="<?php if($verif_blog == ''){ echo '#';}else{echo INDEX.'?index=vue_gestion_blog&action=acceder_blog';}?>" <?php if($verif_blog == '' || $status_blog == '0' || $status_blog == '2'){ echo '';}else{echo 'target="_blank"';}?>>


                            <div class="panel-footer">
                                <span class="pull-left">Accéder à son blog</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-unlock-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_GET["action"])){ if($_GET["action"] == "activer_blog"){echo $alerte;}} ?>
                        <a href="<?php echo INDEX ?>?index=vue_gestion_blog&action=activer_blog">
                            <div class="panel-footer">
                                <span class="pull-left">Activer son blog</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-unlock fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_GET["action"])){ if($_GET["action"] == "desactiver_blog"){echo $alerte;}} ?>
                        <a href="<?php if($verif_blog == ''){ echo '#';}else{echo INDEX.'?index=vue_gestion_blog&action=desactiver_blog';} ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Desactiver son blog</span>
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
                                    <i class="fa fa-trash fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_GET["action"])){ if($_GET["action"] == "supprimer_blog"){echo $alerte;}} ?>
                        <a href="<?php if($verif_blog == ''){ echo '#';}else{echo INDEX.'?index=vue_gestion_blog&action=supprimer_blog';} ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Supprimer son blog</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <ol>
                L'activation permet d'activer un blog désactivé au préalable.
            </ol>
            <ol>
                La désactivation permet de désactiver un blog. Attention vous ne pourrez plus y accéder jusqu'à ce qu'il soit réactivé.
            </ol>
            <ol>
                La suppression du blog est définitive
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
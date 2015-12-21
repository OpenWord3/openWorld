<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tableau de bord OPENWORLD">
    <meta name="author" content="Serge Louis Adolphe">

    <title>Tableau de bord Administrateur OPENWORLD</title>

    <link href="./bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="./bootstrap/dist/css/timeline.css" rel="stylesheet">
    <link href="./bootstrap/dist/css/sb-admin-3.css" rel="stylesheet">
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
                        <i class="fa fa-cogs fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo INDEX ?>"><i class="fa fa-sign-out fa-fw"></i> Se Deconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#myModalNotifications"  data-toggle="modal" data-target="#myModalNotifications">
                        <i class="fa fa-globe"></i>  <i>(Cpt)</i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#myModalMail"  data-toggle="modal" data-target="#myModalMail">
                        <i class="fa fa-envelope"></i>  <i>(Cpt)</i>
                    </a>
                </li>
            </ul>

            </div>
        </nav>

        <div id="page-wrapper-admin">
            <div class="row">
                <center>
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenue Administrateur <?php echo $_SESSION["pseudo"];?></h1>
                </div>
                </center>
            </div>

            <div class="row">

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
                        <a href="#myModalActivationBlog"  data-toggle="modal" data-target="#myModalActivationBlog">
                        <?php if(isset($_POST["activer_blog"])){echo $alerte;}?>
                            <div class="panel-footer">
                                <span class="pull-left">Activer un blog</span>
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
                        <a href="#myModalDesactivationBlog"  data-toggle="modal" data-target="#myModalDesactivationBlog">
                        <?php if(isset($_POST["desactiver_blog"])){echo $alerte;}?>
                            <div class="panel-footer">
                                <span class="pull-left">Désactiver un blog</span>
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
                        <a href="#myModalSuppressionBlog"  data-toggle="modal" data-target="#myModalSuppressionBlog">
                        <?php if(isset($_POST["supprimer_blog"])){echo $alerte;}?>
                            <div class="panel-footer">
                                <span class="pull-left">Supprimer un blog</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-power-off fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#myModalReboot"  data-toggle="modal" data-target="#myModalReboot">
                            <div class="panel-footer">
                                <span class="pull-left">Redemarrer le serveur</span>
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
                        <a href="#myModalActivationMail"  data-toggle="modal" data-target="#myModalActivationMail">
                        <?php if(isset($_POST["activer_mail"])){echo $alerte;}?>
                            <div class="panel-footer">
                                <span class="pull-left">Activer une adresse mail</span>
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
                        <a href="#myModalDesactivationMail"  data-toggle="modal" data-target="#myModalDesactivationMail">
                        <?php if(isset($_POST["desactiver_mail"])){echo $alerte;}?>
                            <div class="panel-footer">
                                <span class="pull-left">Désactiver une adresse mail</span>
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
                        <a href="#myModalSuppressionMail"  data-toggle="modal" data-target="#myModalSuppressionMail">
                        <?php if(isset($_POST["supprimer_mail"])){echo $alerte;}?>
                            <div class="panel-footer">
                                <span class="pull-left">Supprimer une adresse mail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-refresh fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#myModalRebootService"  data-toggle="modal" data-target="#myModalRebootService">
                            <div class="panel-footer">
                                <span class="pull-left">Redemarrer un service</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

			<!-- Modal -->
				<div class="modal fade" id="myModalActivationBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Activation de blog</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
						<input class="form-control" placeholder="Le nom du client" id="name" type="name" name="pseudo" required>
						<center><input type="submit" value="Activer" class="panel panel-green" name="activer_blog"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalDesactivationBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Désactivation de blog</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
						<input class="form-control" placeholder="Le nom du client" id="name" type="name" name="pseudo" required>
						<center><input type="submit" value="Désactiver" class="panel panel-green" name="desactiver_blog"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalSuppressionBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Suppression de blog</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
						<input class="form-control" placeholder="Le nom du client" id="name" type="name" name="pseudo" required>
						<center><input type="submit" value="Supprimer" class="panel panel-green" name="supprimer_blog"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalReboot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Redemarrer le serveur ?</h4>
				</div>
				<div class="modal-body">
					<form>
						<center><input type="submit" value="OUI" class="panel panel-green"><input type="button" value="NON" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalActivationMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Activation de Mail</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
						<input class="form-control" placeholder="Le nom du client" id="name" type="name" name="pseudo" required>
						<center><input type="submit" value="Activer" class="panel panel-green" name="activer_mail"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalDesactivationMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Désactivation de Mail</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
						<input class="form-control" placeholder="Le nom du client" id="name" type="name" name="pseudo" required>
						<center><input type="submit" value="Désactiver" class="panel panel-green" name="desactiver_mail"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalSuppressionMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Suppression de Mail</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
						<input class="form-control" placeholder="Le nom du client" id="name" type="name" name="pseudo" required>
						<center><input type="submit" value="Supprimer" class="panel panel-green" name="supprimer_mail"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalRebootService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Redemarrer un service ?</h4>
				</div>
				<div class="modal-body">
					<form>
						<input class="form-control" placeholder="Le nom du service" id="name" type="name" required>
						<center><input type="submit" value="Redemarrer" class="panel panel-green"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

                <div>
                    <?php 
                        
                        foreach($results as $result){
                            echo $result['id_utilisateur'];
                            echo $result['pseudo'];
                        }
                    ?>
                </div>

                <!-- ================================================================================================================================================================ -->
                <table class="table table-striped table-hover ">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>PSEUDO</th>
                        <th>SERVICE MAIL</th>
                        <th>SERVICE BLOG</th>
                        <th>FERMER MAIL</th>
                        <th>FERMER BLOG</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($results as $result){ ?>
                  <tr>
                    <td>1</td>
                    <td><?php echo $result['pseudo']; ?></td>
                    <td>
                        <?php
                            $status_mail = mail_open($result['id_utilisateur']);
                         ?>
                       <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" id="name" type="hidden" name="pseudo" value="<?php echo $result['pseudo']; ?>" required>
                            <input type="submit" value="
                            <?php if(isset($_POST['activer_mail'])){
                                echo 'Désactiver';
                            }else if(isset($_POST['desactiver_mail'])){
                                echo 'Activer';
                            }else if($status_mail != '2'){
                                echo 'Désactiver';
                            }else if($status_mail == '2'){
                                 echo 'Activer';
                            }else{echo 'Désactiver';} ?>" class="panel panel-green" 
                            name=" 
                            <?php if(isset($_POST['activer_mail'])){
                                echo 'desactiver_mail';
                            }else if(isset($_POST['desactiver_mail'])){
                                echo 'activer_mail';
                            }else if($status_mail != '2'){
                                echo 'desactiver_mail';
                            }else if($status_mail == '2'){
                                 echo 'activer_mail';
                            }else{
                                echo 'desactiver_mail';
                            } ?>" 
                            <?php 
                                $verif_mail = mail_open($result['id_utilisateur']);
                                if($verif_mail == ""){
                                    echo "disabled='disabled'";
                                } ?>>
                        </form>  
                    </td>
                    <td>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" id="name" type="hidden" name="pseudo" value="<?php echo $result['pseudo']; ?>" required>
                            <input type="submit" value="
                                <?php if(isset($_POST['activer_blog'])){
                                    echo 'Désactiver';
                                }else if(isset($_POST['desactiver_blog'])){
                                    echo 'Activer';
                                }else{echo 'Désactiver';} ?>" class="panel panel-green" 
                                name=" 
                                <?php if(isset($_POST['activer_blog'])){
                                    echo 'desactiver_blog';
                                }else if(isset($_POST['desactiver_blog'])){
                                    echo 'activer_blog';
                                }else{
                                    echo 'desactiver_blog';
                                } ?>" 
                                <?php 
                                    $verif_blog = blog($result['id_utilisateur']);
                                    if($verif_blog == ""){
                                        echo "disabled='disabled'";
                                } ?>
                            >
                        </form> 
                    </td>
                    <td>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" placeholder="Le nom du client" id="name" type="hidden" name="pseudo" required>
                            <input type="submit" value="Supprimer" class="panel panel-green" name="supprimer_mail"
                               <?php 
                                    $verif_mail = mail_open($result['id_utilisateur']);
                                    if($verif_mail == ""){
                                        echo "disabled='disabled'";
                                    } 
                                ?> 
                            >
                        </form> 
                    </td>
                    <td>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" placeholder="Le nom du client" id="name" type="hidden" name="pseudo" required>
                            <input type="submit" value="Supprimer" class="panel panel-green" name="supprimer_blog"
                                <?php 
                                    $verif_blog = blog($result['id_utilisateur']);
                                    if($verif_blog == ""){
                                        echo "disabled='disabled'";
                                    } 
                                ?>
                            >
                        </form> 
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>


                <!-- ================================================================================================================================================================ -->



				<div class="modal fade" id="myModalMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Mail</h4>
				</div>
				<div class="modal-body">
					Mail
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalNotifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Notifications</h4>
				</div>
				<div class="modal-body">
					Notifications
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			<!-- /.modal -->

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
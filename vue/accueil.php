<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>BIENVENUE SUR OPENWORLD</title>
    <meta name="description" content="Page d'accueil de OPENWORLD" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply"/>
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <link rel="stylesheet" href="<?PHP echo ANIMATE ?>" />
    <link rel="stylesheet" href="<?PHP echo IONICONS ?>" />
    <link rel="stylesheet" href="<?PHP echo STYLES ?>" />

    <script src="<?PHP echo SCRIPT ?>"></script>
    <script src="<?PHP echo BOOTSTRAPJS ?>"></script>
    <script src="<?PHP echo WOW ?>"></script>
    <script src="<?PHP echo JQUERY ?>"></script>
    <script src="<?PHP echo JQUERYEASING ?>"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#langages').autocomplete({
				serviceUrl: 'recherche_blog.php',
				dataType: 'json'
			});
		});
	</script>

	<script src="./bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="./bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="./bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#first"><i><img src="./bootstrap/images/logo.png" height="50" width="50"></i> OPENWORLD</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav navbar-right">
                	<li class="sidebar-search">
                        <div class="input-group custom-search-form">
	                        <form action="javascript:void(0);" method="post">
	                          <i class="fa fa-search"> Recherche</i><input type="text"  id="langages" name="res_rech" class="form-control" placeholder="..."/>

	                        </form>

                        </div>
                    </li>
                    <li>
                        <a class="page-scroll" title="L'équipe OPENWORLD" href="#footer">A Propos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
     <!-- Modal recherche_blog -->
    <div class="modal fade" id="myModal_recherche" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Résultats</h4>
    </div>
    <div class="modal-body">
        
        <form action="<?php echo INDEX ?>?index=vue_connexion" method="post">
            
        </form>
    </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- /.modal -->
    <header id="first">
        <div class="header-content">
            <div class="inner">
                <h1 class="cursive">Share your amazing blog !</h1>
                <h4>Une blogosphère attrayante pour partager vos émotions</h4>
                <hr>
                <a href="<?php echo INDEX ?>?index=vue_inscription" id="toggleVideo" data-toggle="collapse" class="btn btn-primary btn-xl">INSCRIPTION</a> &nbsp; <a href="<?php echo INDEX ?>?index=vue_connexion" class="btn btn-primary btn-xl page-scroll">CONNEXION</a>
            </div>
        </div>
        <video autoplay="" loop="" class="fillWidth fadeIn wow collapse in" data-wow-delay="0.5s" poster="<?PHP echo IMAGE."background_accueil.jpg" ?>" id="video-background">
            <source src="<?PHP echo IMAGE."background_accueil.mp4" ?>" type="video/mp4">Oups ! La vidéo ne s'affiche pas ? Changer de navigateur.
        </video>
    </header>
    <section id="two" class="no-padding">
        <div class="container-fluid">
            <center>
	            <table class="row no-gutter">
	            	<tr>
	            		<td><center><a href="#"><i class="fa fa-child fa-5x"></i></a><br><h3>OPEN BLOG</h3><p>Des blogs à la hauteur de votre personnalité<br>pour partagez vos émotions</p></center></td>
	            		<td><center><a href="http://mail.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-comments-o fa-5x"></i></a><br><h3>OPEN MAIL</h3><p>Une messagerie haute en couleurs<br>pour communiquer avec le monde</p></center></td>
	            		<td><center><a href="http://phpmyadmin.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-sitemap fa-5x"></i></a><br><h3>OPEN PHPMyADMIN</h3><p>Gérez votre Base de données<br>comme un pro</p></center></td>
	            	</tr>
	            	<tr>
	            		<td><center><a href="http://www.commentcamarche.net/download/start/telecharger-129-filezilla" onclick="window.open(this.href); return false;"><i class="fa fa-navicon fa-5x"></i></a><br><h3>OPEN SFTP</h3><p>Gérez votre blog avec la technologie SFTP<br>en utilisant filezilla</p></center></td>
	            		<td><center><a href="#"><i class="fa fa-history fa-5x"></i></a><br><h3>OPEN RELAIS</h3><p>Relayez vos domaines pour le traitement<br>antispam par OPEN SECURITY</p></center></td>
	            		<td><center><a href="#"><i class="fa fa-globe fa-5x"></i></a><br><h3>OPEN FQDN</h3><p>Une adresse unique pour vos différents services</p></center></td>
	            	</tr>
	            </table>
            </center>
        </div>
    </section>
    <section id="three" class="no-padding">
        <div class="container-fluid">
            <div class="row no-gutter">
            <?php 

            	foreach ($liste_star as $result) {
            ?>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/1.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                            	<?php echo $result["pseudo"]; ?>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	        <?php } ?>
	            <!--<div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/2.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/3.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/4.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/5.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/6.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/7.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/8.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/9.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/10.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/11.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-lg-4 col-sm-6">
	                <a href="#" class="gallery-box">
	                    <img src="./bootstrap/images/12.jpg" class="img-responsive" alt="Image 1">
	                    <div class="gallery-box-caption">
	                        <div class="gallery-box-content">
	                            <div>
	                                <i><img src="./bootstrap/images/loupe.png"></i>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </div>
            </div>
        </div>-->
    </section>
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
    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Informations</h4>
                    <ul class="list-unstyled">
                        <li><a href="http://www.boyaka.org/lequipe-projet-pfh-boyaka-etudiants-intech-info-en-france/" title="Sur BOYAKA" onclick="window.open(this.href); return false;">L'équipe OPENWORLD</a></li>
                        <li><a href="http://www.intechinfo.fr" title="INTECHINFO" onclick="window.open(this.href); return false;">L'école IN'TECH</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                </div>
                <div class="col-xs-6 col-sm-3 column">
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Nos facebook pour mieux nous connaitre</h4>
                    <ul class="list-inline">
                      <li><a href="https://www.facebook.com/a.mougnin" title="Louis-Adolphe" onclick="window.open(this.href); return false;"><i><img src="<?PHP echo IMAGE."1.png"; ?>" weight=200 height=100></i></a>&nbsp;</li>
                      <li><a href="https://www.facebook.com/shassaneibrahim" title="Hassane Ibrahim" onclick="window.open(this.href); return false;"><i><img src="<?PHP echo IMAGE."2.png"; ?>" weight=200 height=100></i></a>&nbsp;</li>
                      <li><a href="https://www.facebook.com/steephen.ilangovane" title="Steephenraaj" onclick="window.open(this.href); return false;"><i><img src="<?PHP echo IMAGE."3.png"; ?>" weight=200 height=100></i></a>&nbsp;</li>
                    </ul>
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small">OPENWORLD ©2015 Company</span>
        </div>
    </footer>
  </body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BIENVENUE SUR OPENWORLD</title>
    <meta name="description" content="Page d'accueil de OPENWORLD" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <link rel="stylesheet" href="<?PHP echo ANIMATE ?>" />
    <link rel="stylesheet" href="<?PHP echo IONICONS ?>" />
    <link rel="stylesheet" href="<?PHP echo STYLES ?>" />

    <script src="<?PHP echo SCRIPT ?>"></script>
    <script src="<?PHP echo BOOTSTRAPJS ?>"></script>
    <script src="<?PHP echo WOW ?>"></script>
    <script src="<?PHP echo JQUERY ?>"></script>
    <script src="<?PHP echo JQUERYEASING ?>"></script>
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
                    <li>
                        <a class="page-scroll" data-toggle="modal" title="L'équipe OPENWORLD" href="#footer">A Propos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <header id="first">
        <div class="header-content">
            <div class="inner">
                <h1 class="cursive">Share your amazing blog !</h1>
                <h4>Une blogosphère attrayante pour partager vos émotions</h4>
                <hr>
                <a href="#video-background" id="toggleVideo" data-toggle="collapse" class="btn btn-primary btn-xl">INSCRIPTION</a> &nbsp; <a href="#one" class="btn btn-primary btn-xl page-scroll">CONNEXION</a>
            </div>
        </div>
        <video autoplay="" loop="" class="fillWidth fadeIn wow collapse in" data-wow-delay="0.5s" poster="<?PHP echo IMAGE."background_accueil.jpg" ?>" id="video-background">
            <source src="<?PHP echo IMAGE."background_accueil.mp4" ?>" type="video/mp4">Oups ! La vidéo ne s'affiche pas ? Changer de navigateur.
        </video>
    </header>
    <section id="two" class="no-padding">
        <div class="container-fluid">
            <div class="row no-gutter">
            <?PHP
                $i = 10;
                echo'<center><H2>Déjà '.$i.' abonné(e)s</H2></center>';
                for ($j=0; $j<$i; $j++) {
                echo '<div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box">
                        <img src="./bootstrap/images/blog.jpg" class="img-responsive" alt="Image 1">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i><img src="./bootstrap/images/loupe.png"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
                }
            ?>
            </div>
        </div>
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
                    <form class="contact-form row">
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Nom">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Telephone">
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <textarea class="form-control" rows="9" placeholder="Ton message"></textarea>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="button" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg">Envoyer</button>
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
                        <li><a href="">L'équipe OPENWORLD</a></li>
                        <li><a href="http://www.intechinfo.fr">L'école IN'TECH</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                </div>
                <div class="col-xs-6 col-sm-3 column">
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Nos facebook pour mieux nous connaitre</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" href="https://www.facebook.com/a.mougnin" title="Louis-Adolphe"><i><img src="<?PHP echo IMAGE."1.png"; ?>" weight=200 height=100></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="https://www.facebook.com/shassaneibrahim" title="Louis-Adolphe"><i><img src="<?PHP echo IMAGE."2.png"; ?>" weight=200 height=100></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="https://www.facebook.com/steephen.ilangovane" title="Louis-Adolphe"><i><img src="<?PHP echo IMAGE."3.png"; ?>" weight=200 height=100></i></a>&nbsp;</li>
                    </ul>
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small">OPENWORLD ©2015 Company</span>
        </div>
    </footer>
  </body>
</html>
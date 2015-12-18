<HTML>
        <HEAD>
                <TITLE>BIENVENUE</TITLE>
        </HEAD>
        <BODY>
                <center>
                <H1>BIENVENUE SUR OPENWORLD</H1>
                <FORM>
                        <INPUT TYPE="BUTTON" VALUE="NOUVEAU ? S'INCRIRE"> <INPUT TYPE="BUTTON" VALUE="MEMBRE ? CONNEXION">
                </FORM>
                <b>
                <?php
                        header("Refresh:20");
                        $table=glob('/var/blog/*.openworld.itinet.fr', GLOB_ONLYDIR);
                        $cpt=count($table);

                        echo 'DEJA ' .$cpt. ' MEMBRE(S)';

                        echo '<br><table height="150" width="150"><tr>';
                        for ($i='0'; $i<$cpt; $i++) {
                                $j=substr($table[$i], 10, -20);
                                $icone=glob('/var/blog/'.$j.'.openworld.itinet.fr/wp-content/uploads/2015/11/cropped-*-192x192.*');
                                $ico=substr($icone[$i]);
                                echo '<td><a href="http://'.$j.'.openworld.itinet.fr"><img src="http://'.$ico.'" height=128 width=128></a>';
                        }
                        echo '</tr></table>';
                ?>
                </b>
                <br><img src="construction.jpg">
                <br><a href="http://mail.openworld.itinet.fr">Mail</a>
                <br><a href="http://phpmyadmin.openworld.itinet.fr">Phpmyadmin</a>
                </center>
        </BODY>
</HTML>

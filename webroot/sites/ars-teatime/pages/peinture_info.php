<?php
    session_start();
	include_ONCE('../php/includes/help_connexion.php');
    include("../php/divers/erreur.php");
    
    //LA Peinture
    
    $sql = "SELECT * FROM peinture WHERE id=?";
    $query_affichePeinture = $bdd->prepare($sql);
    $query_affichePeinture->execute(array($_GET['id']));
    $data = $query_affichePeinture->fetch();

    $oeuvre = $data['titre'];
    $auteur = $data['auteur'];
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
    <?php
        include_ONCE '../php/includes/head2.php';
    ?>
            <meta name="description" content="<?php echo $oeuvre; ?> de <?php echo $auteur; ?>" />
            <title>Frédéric LEJEUNE - <?php echo $oeuvre; ?> de <?php echo $auteur; ?></title>
    </head>

    <body>
    <?php
//////////NAV
        include_ONCE '../php/includes/nav2.php';
    ?>
            <!-- Start your project here-->
            <!----------------------------------------------------------------------------------------------------PEINTURES-->
            <div class="container" id="peinture_info">
                <?php
                    echo
                        '
                        <div class="row peinture_info">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 flex-center">
                        ';
////////////////////////MODIFIER + SUPPRIMER :
                if(isset($_SESSION['id']) && isset($_SESSION['user'])) // SI JE SUIS CONNECTE
                    echo'
                        <span href="#" class="suppArticle suppArticleID flex-center z-depth-1" id="'.$data['id'].'">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </span>
                        <a href="modifier.php?idOeuvre='.$data['id'].'" class="suppArticle modifiArticle flex-center z-depth-1">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a>
                    ';
                        echo'
                                <img class="img-responsive" src="http://vincentbattez.fr/sites/ars-teatime/img/peinture/frederic_lejeune/'.$data['img'].'" alt="Chania">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 infoOeuvre">
                                <div>
                                    <h3 class="auteur">'.$data['auteur'].'</h3>
                                    <a class="titre">'.$data['titre'].'</a>
                                    <p class="dimension">'.$data['hauteur'].' x '.$data['largeur'].' x '.$data['epaisseur'].' cm</p>
                                    <p class="type">'.$data['type'].'</p>
                                    <p class="prix"><b>'.$data['prix'].' €</b></p>
                                    <button id="btnReserver">Réserver</button>
                                </div>
                                <div class="proposOeuvre">
                                    <h3>à propos de l\'oeuvre</h3>
                                    <p>'.$data['propos'].'</p>
                                </div>
                            </div>
                        </div>

                        ';

                    $sql = "SELECT auteur FROM peinture WHERE id=?";
                    $q = $bdd->prepare($sql);
                    $q->execute(array($_GET['id']));
                    $data = $q->fetch();
                        echo'
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h2>Quelques Oeuvres de '.$data['auteur'].'</h2>
                                <hr/>
                            </div>
                        </div>
                        ';
                ?>
        </div>

        <div class="container-fluid">
                <div class="row">
                    <div id="peinture wrapper">
                        <div class="row">
                            <div id="columnsPlus">
                    <?php
                        $sql = "SELECT * FROM peinture WHERE auteur = '$data[auteur]' ORDER BY RAND() LIMIT 6";
                        $query_affichePeintureAuteur = $bdd->prepare($sql);
                        $query_affichePeintureAuteur->execute();

                        while ($data = $query_affichePeintureAuteur->fetch()){
                            echo'
                                <div class="pin">
                                    <a href="peinture_info.php?id='.$data['id'].'">
                                        <img src="http://vincentbattez.fr/sites/ars-teatime/img/peinture/frederic_lejeune/'.$data['img'].'">
                                    </a>
                                        <h3 class="auteur">'.$data['auteur'].'</h3>
                                        <a class="titre">'.$data['titre'].'</a>
                                        <p class="dimension">'.$data['hauteur'].' x '.$data['largeur'].' x '.$data['epaisseur'].' cm</p>
                                        <p class="type">'.$data['type'].'</p>
                                        <p class="prix">'.$data['prix'].' €</p>
                                </div>
                            ';
                        }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        echo
            '
            <div class="container-fluid" id="reserverAll">
                <div class="row" id="divReserver">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flex-center">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center z-depth-2" id="contentReserver">
                        <span id="exitReserver"></span>
                            <h3 class="m-t-1">Réservation</h3>
                            <form action="../php/divers/mailer.php" method="POST" role="form" enctype="multipart/form-data">
                                <div class="md-form">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name">Nom*</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="prenom" name="prenom" class="form-control">
                                    <label for="prenom">Prénom*</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="from" name="email" class="form-control">
                                    <label for="from">Email*</label>
                                </div>

                                <div class="md-form">
                                    <input type="tel" id="tel" name="tel" class="form-control">
                                    <label for="tel">Numéro de téléphone*</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="oeuvre" name="oeuvre" class="form-control" value="'.$oeuvre.' de '.$auteur.'" disabled>
                                    <label for="oeuvre" >Oeuvre</label>
                                </div>

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" class="md-textarea" placeholder="Précisions"></textarea>
                                    <label for="message">Message</label>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary btn-send" name="SubmitOeuvre">Envoyer</button>
                                    <input type="hidden" name="sujet" value="achat de l\'oeuvre '.$oeuvre.' de '.$auteur.'">
                                </div>
                            </form>
                        </div>
                       <div id="opacity"></div>
                    </div>
                </div>
            </div>
            ';
?>

            <!-- /END your project here-->
            <?php
//////////Footer
        include_ONCE '../php/includes/footer.php';
//////////Script
        include_ONCE '../php/includes/script2.php';
?>
    </body>

    </html>

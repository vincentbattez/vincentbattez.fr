<?php
    @ini_set('display_errors', 'on'); 
    session_start();
	include_ONCE('php/includes/help_connexion.php');
    include_ONCE("php/divers/erreur.php");
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        include_ONCE 'php/includes/head.php';
    ?>
    <meta name="description" content="Frédéric LEJEUNE - Pianiste classique amateur, Architecte  Enseignant en Art Appliqué." />
    <title>Frédéric LEJEUNE | Peintre et pianiste</title>
</head>
<body>
    <?php
//////////NAV
        include_ONCE 'php/includes/nav.php';
    ?>
    <!-- Start your project here-->

<!----------------------------------------------------------------------------------------------------HEADER-->
    <div class="container-fuil imageHeader imageHeader-propos z-depth-1">
        <div class="mask">
            <div class="container header">
                <div class="row header">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
                        <h1 class="display-1 white-text pull-bottom">Frédéric
                        <br/><strong> LEJEUNE </strong>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------------------------------A PROPOS-->
    <div class="container" id="a_propos">
        <div class="row">
            <h2><hr class="h2Separator"/>à propos<hr class="h2Separator"/></h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="view hm-yellow-strong">
                    <img class="img-responsive img-propos" src="img/accueil/a_propos/photo.jpg" alt="Photo de Frédéric Lejeune">
                    <div class="mask flex-center">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <h3>Frédéric LEJEUNE</h3>
                <ul class="list-group">
                    <li class="list-group-item"><i class="fa fa-location-arrow" aria-hidden="true"></i><p>Boulogne-sur-mer</p></li>
                    <li class="list-group-item">
                        <img src="img/accueil/a_propos/piano.svg" alt="SVG" class="fa icon-svg"/><p>Pianiste classique amateur (premier accessit de piano du CN de Boulogne).
                        <br/>Créateur du festival de Piano "Ars Terra " avec licence du Ministère de la Culture.</p>
                    </li>
                    <li class="list-group-item"><img src="img/accueil/a_propos/compass-tool-variant.svg" alt="SVG" class="fa icon-svg"> <p>Architecte D.P.L.G. de Ecole Nationale Supérieure des Beaux Arts de Paris.</p></li>
                    <li class="list-group-item"><img src="img/accueil/a_propos/brush.svg" alt="SVG" class="fa icon-svg"> <p>Enseignant en Art Appliqué.</p> </li>
                </ul>
            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------------------------------EVENEMENT-->
<div class="container-fluid z-depth-1 bg-white" id="evenement">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2><hr class="h2Separator"/>évenements<hr class="h2Separator"/></h2>
            </div>
                       <?php
                       ////////////////////////AJOUTER UN EVENEMENT :
                                       if(isset($_SESSION['id']) && isset($_SESSION['user'])){
                                        // SI JE SUIS CONNECTE
                                           echo'
                                           <div class="container">
                                           <div class="jumbotron hoverable articleDiv">
                                               <h2 aria-hidden="true" role="button" data-toggle="collapse" href="#write" aria-expanded="false" aria-controls="write"><i class="fa fa-pencil prefix write_article_icon"></i>Ajouter un evenement <i class="fa fa-caret-down" role="button"></i></h2>
                                               <form class="form-inline collapse" action="php/traitement/addEvenement.php" method="POST" enctype="multipart/form-data" role="form" id="write">
                                                   <hr>
                                                   <!--titre-->
                                                   <div class="row">
                                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                                       <div class="md-form">
                                                           <i class="fa fa-pencil prefix"></i>
                                                           <label for="titreId">Titre</label>
                                                           <input list="titred" type="text" name="titre" id="titreId" placeholder="Titre de votre évenement" />
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <!--date-->
                                                   <div class="row">
                                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                                       <div class="md-form">
                                                           <i class="fa fa-clock-o prefix"></i>
                                                           <label for="dateId">date</label>
                                                           <input list="dated" type="text" name="date" id="dateId" placeholder="Date de l\'évenement (Exemple : Le 15 octobre 2016)" />
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <!--texte-->
                                                   <div class="row">
                                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                                       <div class="md-form">
                                                           <i class="fa fa-pencil-square prefix"></i>
                                                           <label for="texteId">texte</label>
                                                           <textarea list="texted" type="text" name="texte" id="texteId" placeholder="Description de votre évenement" class="md-textarea" /></textarea>
                                                           </div>
                                                       </div>
                                                   </div>
                                                       <!--Submit-->
                                                       <div class="row">
                                                           <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                                                               <button type="submit" class="btn btn-primary btn-lg w100p m-t-3 p-t-2 p-b-2 waves-effect waves-light" role="button">Envoyer</button>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </form>
                                           </div>
                                           ';
                                       }
            ////////////////////////AFFICHE EVENEMENT
                        $sql = "SELECT * FROM evenement ORDER BY id DESC";
                        $query = $bdd->prepare($sql);
                        $query->execute();
                        while ($data = $query->fetch()){
            ////////////////////////MODIFIER + SUPPRIMER :
                            if(isset($_SESSION['id']) && isset($_SESSION['user'])) // SI JE SUIS CONNECTE
                                echo'
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="ev'.$data['id'].'">
                                    <span class="suppArticle suppEvenementID flex-center z-depth-1" id="'.$data['id'].'">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                    <span class="suppArticle modifiArticle flex-center z-depth-1" id="'.$data['id'].'">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </span>
                                ';
                                echo'
                                    <h3><span class="titre">'.$data['titre'].'</span> - <small> '.$data['date'].'</small></h3>
                                    <p>'.$data['texte'].'</p>
                                    <hr/>
                        </div>
                            ';
                        }
                        if (empty($data)) {
                            echo "<p>Il n'y a pas d'autre d'évenement</p>";
                        }
                        ?>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------REALISATIONS-->
    <div class="container-fluid z-depth-1 bg-white" id="realisations">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2><hr class="h2Separator"/>Réalisations<hr class="h2Separator"/></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 img-peinture">
                   <a href="pages/peinture.php">
                        <div class="view mask-yellow z-depth-1">
                            <img src="img/realisations/peinture.jpg" class="img-fluid" alt="Image d'une peinture">
                            <div class="mask flex-center">
                                <h2 class="display-3 white-text flex-center"><strong>Peinture</strong></h1>
                            </div>
                        </div>
                   </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-lg-offset-2 img-musique">
                   <a href="pages/musique.php">
                    <div class="view mask-yellow z-depth-1">
                        <img src="img/realisations/musique.jpg" class="img-fluid" alt="Image d'une peinture">
                        <div class="mask flex-center">
                            <h2 class="display-3 white-text"><strong>Musique</strong></h1>
                        </div>
                    </div>
                   </a>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------------------------------CONTACT-->
    <div class="container" id="contact">
        <div class="row">
            <h2><hr class="h2Separator"/>Contact<hr class="h2Separator"/></h2>
        </div>
        <form action="/php/divers/mailer.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="md-form">
                <input type="text" id="nom" class="form-control" name="name">
                <label for="nom">Nom</label>
            </div>

            <div class="md-form">
                <input type="text" id="mail" class="form-control" name="email">
                <label for="mail">Email</label>
            </div>

            <div class="md-form">
                <input type="text" id="sujet" class="form-control" name="sujet">
                <label for="sujet">Sujet</label>
            </div>

            <div class="md-form">
                <textarea type="text" id="message" class="md-textarea" name="message"></textarea>
                <label for="message">Message</label>
            </div>
            <div class="text-center">
                <input type="submit" class="btn-primary btn-send" name="submit" value="Envoyer"></input>
            </div>
        </form>
    </div>










    <!-- /Start your project here-->
    <?php
//////////Footer
        include_ONCE 'php/includes/footer.php';
//////////Script
        include_ONCE 'php/includes/script.php';
?>
</body>

</html>

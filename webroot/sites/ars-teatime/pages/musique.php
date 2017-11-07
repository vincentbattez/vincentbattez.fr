<?php
    session_start();
	include_ONCE('../php/includes/help_connexion.php');
    include("../php/divers/erreur.php");
        function datalist($name,$attributes=[],$select=array()) {
            $html = "";
            $o = "";
            foreach ($attributes as $k=>$v)
                $o = $o . "$k='$v'";
            $html .= "<datalist name=$name $o>";
            $html .= "<option value='' disabled selected>Choisissez votre option</option>";
            foreach($select as $key => $value){
                $html .= "<option value='$value'>";
            }
            $html .= "</datalist>";

            return $html;
        }
        //ALL AUTEUR
            $sql = "SELECT auteur FROM player GROUP BY auteur";
            $query_allSelectAuteur = $bdd->prepare($sql);
            $query_allSelectAuteur->execute();
            $allAuteurBdd = [];
            while($allSelectAuteur = $query_allSelectAuteur->fetch()){
                array_push($allAuteurBdd, $allSelectAuteur['auteur']);
            }

        //PAGINATION
            if(isset($_SESSION['sqlPage']))
                $sqlPage = $_SESSION['sqlPage'];
            else
                $sqlPage = "SELECT COUNT(id) as nbMusique FROM player";
            $query = $bdd->prepare($sqlPage);
            $query->execute();
            $data = $query->fetch();
            if (isset($_GET['page']))
                $cPage = $_GET['page'];
            else
                $cPage=1;
            $nbMusique = $data['nbMusique'];
            if(!isset($_SESSION['sql']))
                $perPage=10;
            else
                $perPage=$_SESSION['perPage'];
            $nbPage = ceil($nbMusique/$perPage);
            $previous = $_GET['page'] -1;
            $next = $_GET['page'] +1;
            //SI dans l'url le page != nombre entier
            if(!isset($_GET['page']) || !preg_match('/^[0-9]*$/', $_GET['page']) || $_GET['page']<=0)
                header("Location:musique.php?page=1");
            ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        include_ONCE '../php/includes/head2.php';
    ?>
    <meta name="description" content="Musique de Frédéric LEJEUNE - Vous pouvez retrouvez tous mes enregistrements de musique." />
    <title>Frédéric LEJEUNE - Musique</title>
</head>
<body>
    <?php
//////////NAV
    include_ONCE '../php/includes/nav2.php';
    include_ONCE("../php/divers/erreur.php");
    ?>
    <!--___________________________________________________________________________-HEADER-->
    <div class="container-fuil imageHeader imageHeader-musique z-depth-1">
        <div class="mask">
            <div class="container header">
                <div class="row header">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
                        <h1 class="display-1 white-text flex-center"><strong class="text-center">Musique</strong></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-fuil">
<!--titre-->
<!--_________________________________________________-Musique-->
        <section id="musique">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php
                    ////////////////////////AJOUTER UNE OEUVRE :
                                    if(isset($_SESSION['id']) && isset($_SESSION['user'])){
                                     // SI JE SUIS CONNECTE
                                        echo'
                                        <div class="container">
                                        <div class="jumbotron hoverable articleDiv">
                                            <h2 aria-hidden="true" role="button" data-toggle="collapse" href="#write" aria-expanded="false" aria-controls="write"><i class="fa fa-pencil prefix write_article_icon"></i>Ajouter une musique <i class="fa fa-caret-down" role="button"></i></h2>

                                            <form class="form-inline collapse" action="http://ars-teatime.com/php/traitement/addMusique.php" method="POST" enctype="multipart/form-data" role="form" id="write">
                                                <hr>
                                                <!--auteur-->
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="md-form">
                                                        <i class="fa fa-user prefix"></i>
                                                        <label for="auteurId">Auteur</label>
                                                        <input list="auteurd" type="text" name="auteur" id="auteurId" placeholder="Nouveau auteur OU selectionner un auteur déjà existant" />
                                        ';
                                                            echo datalist("auteur",array("id"=>"auteurd"),$allAuteurBdd);
                                        echo'
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--titre-->
                                                <div class="row m-t-2">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="md-form">
                                                        <i class="fa fa-music prefix"></i>
                                                            <input type="text" id="titre" name="titre">
                                                            <label for="titre" class="active">Titre de la musique</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="list-group-item list-group-item-warning">Faite bien attention à l\'extension du fichier musique  (seulement <strong>.mp3</strong> est autorisé).</p>
                                                <!--music mp3-->
                                                <div class="row m-t-2">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="md-form">
                                                        <i class="fa fa-music prefix"></i>
                                                            <input type="file" id="song_mp3" name="song_mp3">
                                                            <label for="img" class="active">music mp3</label>
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
                //////////pagination
                    include '../php/includes/pagination.php';
                        $query_affichePlayer = $bdd->query('SELECT * FROM player ORDER BY id DESC');
                        while ($data = $query_affichePlayer->fetch()){
                            echo
                            '
                            <article class="jumbotron hoverable" id="mu'.$data['id'].'">
                            ';
            ////////////////////////MODIFIER + SUPPRIMER :
                            if(isset($_SESSION['id']) && isset($_SESSION['user'])) // SI JE SUIS CONNECTE
                                echo'
                                    <span class="suppArticle suppMusiqueID flex-center z-depth-1" id="'.$data['id'].'">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                    <span class="suppArticle modifiArticle flex-center z-depth-1" id="'.$data['id'].'">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </span>
                                ';
                                echo'
                                <h4 class="text-center"><strong>'.$data['auteur'].'</strong> - <span>'.$data['titre'].'</span></h4>
                                <audio controls>
                                ';
                                if ($data['src_mp3'] != NULL && !empty($data['src_mp3']) && isset($data['src_mp3']))
                                    echo'<source src="musique/'.$data['src_mp3'].'" type="audio/mpeg">';
                                echo'
                                    Votre navigateur internet de supporte pas les éléments audios.
                                </audio>
                            </article>
                            ';
                        }
                     ?>
                    </div>
                </div>
            </section>
        </div>
    <?php
//////////pagination
    include '../php/includes/pagination.php';
//////////Footer
    include_ONCE '../php/includes/footer.php';
//////////Script
    include_ONCE '../php/includes/script2.php';
?>
</body>

</html>

<?php
    session_start();
    function select($name,$attributes=[],$select=array()) {
        $html = "";
        $o = "";
        foreach ($attributes as $k=>$v)
            $o = $o . "$k='$v'";
        $html .= "<select name=$name $o>";
        $html .= "<option value='ajout' selected disabled hidden>Catégories</option>";
        $html .= "<option value='null'></option>";
        foreach($select as $key => $value){
            $html .= "<option value='$value'>$value</option>";
        }
        $html .= "</select>";

        return $html;
    }
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

    if(isset($_GET['action']) && $_GET['action']=="reinitialiser"){// Il taut détruire la session
        unset($_SESSION['sql'],$_SESSION['sqlPage'], $_SESSION['perPage']);
        header("Location:peinture.php?page=1");
    }
	include_ONCE('../php/includes/help_connexion.php');
//ALL TYPE
    $sql = "SELECT type FROM peinture GROUP BY type";
    $query_allSelect = $bdd->prepare($sql);
    $query_allSelect->execute();
    $allTypeBdd = [];
    while($allSelect = $query_allSelect->fetch()){
        array_push($allTypeBdd, $allSelect['type']);
    }
//ALL AUTEUR
    $sql = "SELECT auteur FROM peinture GROUP BY auteur";
    $query_AllAuteur = $bdd->prepare($sql);
    $query_AllAuteur->execute();
    $allAuteurBdd = [];
    while($allAuteur = $query_AllAuteur->fetch()){
        array_push($allAuteurBdd, $allAuteur['auteur']);
    }
//PAGINATION
    if(isset($_SESSION['sqlPage']))
        $sqlPage = $_SESSION['sqlPage'];
    else
        $sqlPage = "SELECT COUNT(id) as nbPeinture FROM peinture";
    $query = $bdd->prepare($sqlPage);
    $query->execute();
    $data = $query->fetch();
    if (isset($_GET['page']))
        $cPage = $_GET['page'];
    else
        $cPage=1;
    $nbPeinture = $data['nbPeinture'];
    if(!isset($_SESSION['sql']))
        $perPage=12;
    else
        $perPage=$_SESSION['perPage'];
    $nbPage = ceil($nbPeinture/$perPage);
    $previous = $_GET['page'] -1;
    $next = $_GET['page'] +1;
//SI dans l'url le page != nombre entier
    if(!isset($_GET['page']) || !preg_match('/^[0-9]*$/', $_GET['page']) || $_GET['page']<=0)
        header("Location:peinture.php?page=1");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        include_ONCE '../php/includes/head2.php';
    ?>
    <meta name="description" content="Peinture de Frédéric LEJEUNE - Vous pouvez retrouver toutes mes peintures." />
    <title>Frédéric LEJEUNE - Peinture</title>
</head>
<body>
    <?php
//////////NAV
        include_ONCE '../php/includes/nav2.php';
        include_ONCE("../php/divers/erreur.php");
    ?>
    <!-- Start your project here-->

<!----------------------------------------------------------------------------------------------------HEADER-->
    <div class="container-fuil imageHeader imageHeader-peinture z-depth-1">
        <div class="mask">
            <div class="container header">
                <div class="row header">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
                        <h1 class="display-1 white-text flex-center"><strong> Peinture </strong></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------------------------------FILTRE-->
    <div class="container" id="filtre">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form class="form-inline" action="../php/traitement/filtre.php" method="POST" enctype="multipart/form-data" role="form">
                    <div class="form-group m-t-2">
                        <fieldset class="form-group">
                            <select class="form-control" name="ordonner" id="ordonner">
                                <option value="id DESC" selected>Ajoutée récemment</option>
                                <option value="titre">Alphabétique (A-Z)</option>
                                <option value="titre DESC">Alphabétique (Z-A)</option>
                                <option value="prix">Prix croissant</option>
                                <option value="prix DESC">Prix décroissant</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <select class="form-control" name="nombre" id="nombre">
                                <option value="12" selected>12</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                          <?php
                                echo select("type",array("class"=>"form-control","id"=>"type"),$allTypeBdd);
                            ?>
                        </fieldset>
                        <fieldset class="form-group">
                            <select class="form-control" name="prix" id="prix">
                                <option value="ajout" selected disabled hidden>Prix</option>
                                <option value="null"></option>
                                <option value=">100">+ de 100 €</option>
                                <option value="<100">- de 100 €</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <select class="form-control" name="format" id="format">
                                <option value="ajout" selected disabled hidden>Format</option>
                                <option value="null"></option>
                                <option value="petit">Petit (&lt; 50x50 cm)</option>
                                <option value="moyen">Moyen (&lt; 100x100 cm)</option>
                                <option value="grand">Grand (&gt; 100x100 cm)</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <select class="form-control" name="orientation">
                                <option value="ajout" selected disabled hidden>Orientation</option>
                                <option value="null"></option>
                                <option value="portrait">Portrait</option>
                                <option value="paysage">Paysage</option>
                                <option value="carre">Carré</option>
                            </select>
                        </fieldset>
                        <input hidden="hidden" name="perPage" value="<?php echo $perPage;?>"/>
                        <input hidden="hidden" name="cPage" value="<?php echo $cPage;?>"/>
                        <div id="divSubmit">
                            <button type="submit" class="btn btn-primary">FILTRER</button>
                            <a id="filtre_none" href="peinture.php?action=reinitialiser">RÉINITIALISER</a>
                        </div>
                </form>
                </div>
            </div>
        </div>
</div>
<!----------------------------------------------------------------------------------------------------PEINTURES-->
<?php
    include '../php/includes/pagination.php';
?>
<div class="container-fuil" id="peinture wrapper">
<?php

////////////////////////AJOUTER UNE OEUVRE :
                if(isset($_SESSION['id']) && isset($_SESSION['user'])){
                 // SI JE SUIS CONNECTE

                    echo'
                    <div class="container">
                    <div class="jumbotron hoverable articleDiv">
                        <h2 aria-hidden="true" role="button" data-toggle="collapse" href="#write" aria-expanded="false" aria-controls="write"><i class="fa fa-pencil prefix write_article_icon"></i>Ajouter une oeuvre <i class="fa fa-caret-down" role="button"></i></h2>

                        <form class="form-inline collapse" action="../php/traitement/envoyerOeuvre.php" method="POST" enctype="multipart/form-data" role="form" id="write">
                            <hr>
                            <!--image-->
                            <div class="row m-t-2">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="md-form">
                                    <i class="fa fa-image prefix"></i>
                                        <input type="file" id="img" name="img">
                                        <label for="img" class="active">Image</label>
                                    </div>
                                </div>
                            </div>
                            <!--auteur-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="md-form">
                                    <i class="fa fa-user prefix"></i>
                                    <label for="auteurId">auteur</label>
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
                                    <i class="fa fa-pencil prefix"></i>
                                        <input type="text" id="titre" name="titre">
                                        <label for="titre" class="active">Titre de l\'oeuvre</label>
                                    </div>
                                </div>
                            </div>
                            <!--hauteur-->
                            <div class="row m-t-2">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="md-form">
                                    <i class="fa fa-crop prefix"></i>
                                        <input type="number" id="hauteur" name="hauteur">
                                        <label for="hauteur" class="active">Hauteur</label>
                                    </div>
                                </div>
                            <!--largeur-->
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="md-form">
                                        <input type="number" id="largeur" name="largeur">
                                        <label for="largeur" class="active">Largeur</label>
                                    </div>
                                </div>
                            <!--epaisseur-->
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="md-form">
                                        <input type="number" id="epaisseur" name="epaisseur">
                                        <label for="epaisseur" class="active">Épaisseur</label>
                                    </div>
                                </div>
                            </div>
                            <!--prix-->
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
                                    <div class="md-form">
                                    <i class="fa fa-money prefix"></i>
                                        <input type="number" id="prix" name="prix">
                                        <label for="prix" class="active">Prix</label>
                                    </div>
                                </div>
                            </div>
                            <!--orientation-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="md-form">
                                    <i class="fa fa-file-text prefix"></i>
                                        <select class="form-control" name="orientation" id="orientation">
                                            <option value="NULL" selected disabled>Orientation</option>
                                            <option value="portrait">Portrait</option>
                                            <option value="paysage">Paysage</option>
                                            <option value="carre">Carré</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--type-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="md-form">
                                    <i class="fa fa-tag prefix"></i>
                                    <label for="typeid">Type</label>
                                    <input list="dz" type="text" name="type" id="typeid" placeholder="Nouveau type OU selectionner un type déjà existant" />
                    ';
                                        echo datalist("type",array("id"=>"dz"),$allTypeBdd);
                    echo'
                                    </div>
                                </div>
                            </div>
                            <!--propos-->
                            <div class="row m-t-2">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="md-form">
                                <i class="fa fa-pencil-square-o prefix"></i>
                                        <textarea type="text" class="md-textarea" id="propos" name="propos" placeholder="Description de l\'oeuvre, context, etc.."></textarea><div class="compteur"><span class="nbCaractere">0</span> / 255 catactères</div>
                                        <label for="propos" class="active">Votre message</label>
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
                    </div>
                    ';
                }
    ?>
    <div class="row">
	    <div id="columns">
           <?php
////////////////////////AFFICHE ARTICLES
            if(isset($_SESSION['sql']))
                $sql = $_SESSION['sql'];
            else
                $sql = "SELECT * FROM peinture ORDER BY id DESC LIMIT ".(($cPage-1)*$perPage).",$perPage";

            $query_affichePeinture = $bdd->prepare($sql);
            $query_affichePeinture->execute();
            while ($data = $query_affichePeinture->fetch()){
                echo
                '
                <div class="pin">
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
                    <a href="peinture_info.php?id='.$data['id'].'">
                        <img src="http://vincentbattez.fr/sites/ars-teatime/img/peinture/frederic_lejeune/'.$data['img'].'" alt="'.$data['auteur'].' - '.$data['titre'].'" title="'.$data['auteur'].' - '.$data['titre'].'">
                    </a>
                    <h3 class="auteur">'.$data['auteur'].'</h3>
                    <a class="titre" href="peinture_info.php?id='.$data['id'].'">'.$data['titre'].'</a>
                    <p class="dimension">'.$data['hauteur'].' x '.$data['largeur'].' x '.$data['epaisseur'].' cm</p>
                    <p class="type">'.$data['type'].'</p>
                    <p class="prix">'.$data['prix'].' €</p>
                </div>
                ';
            }$query_affichePeinture->closeCursor(); // Termine le traitement de la requête
            ?>
        </div>
    </div>
</div>


    <!-- /END your project here-->

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

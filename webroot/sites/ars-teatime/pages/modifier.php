<?php
include("../php/divers/Upload.php");


function datalist($name,$attributes=[],$select=[]) {
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

    session_start();
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

    $sql = "SELECT * FROM peinture WHERE id=?";
    $query_affichePeinture = $bdd->prepare($sql);
    $query_affichePeinture->execute(array($_GET['idOeuvre']));
    $data = $query_affichePeinture->fetch();

    $auteur = htmlspecialchars($data['auteur']);
    $titre = htmlspecialchars($data['titre']);
    $type = htmlspecialchars($data['type']);
    $orientation = htmlspecialchars($data['orientation']);
    $format = htmlspecialchars($data['format']);
    $img = htmlspecialchars($data['img']);
    $propos = htmlspecialchars($data['propos']);
    if (is_numeric($data['largeur']))
       $largeur = htmlspecialchars($data['largeur']);
    if (is_numeric($data['hauteur']))
       $hauteur = htmlspecialchars($data['hauteur']);
    if (is_numeric($data['epaisseur']))
       $epaisseur = htmlspecialchars($data['epaisseur']);
    if (is_numeric($data['prix']))
       $prix = htmlspecialchars($data['prix']);

//SI IL Y A DES  ERREUR DANS L'URL => back
    if(!isset($_GET['idOeuvre']) ||
       empty($_GET['idOeuvre']) ||
       !preg_match('/^[0-9]*$/', $_GET['idOeuvre']) ||
       $_GET['idOeuvre'] != $data['id'] ||
       !isset($_SESSION['id']) ||
       !isset($_SESSION['user']) ||
       $_SESSION['user'] != "wicarden37@gmail.com")
        {
            header("Location:/pages/peinture.php?page=1");
        }

    $i=0;
// j'ai cliquer sur modifier
     if(isset($_POST['btnModifier']) && !preg_match('/^[0-9]*$/', $_POST['btnModifier'])){
         $sqlUpdate = "UPDATE peinture SET ";

        if(isset($_POST['auteur']) && !empty($_POST['auteur'])){
            $auteurCH = htmlspecialchars($_POST['auteur']);
            $i++;
        }
        if(isset($_POST['titre']) && !empty($_POST['titre'])){
            $titreCH = htmlspecialchars($_POST['titre']);
            $i++;
        }
        if(isset($_POST['type']) && !empty($_POST['type'])){
           $typeCH = htmlspecialchars($_POST['type']);
            $i++;
        }
        if(isset($_POST['orientation']) && !empty($_POST['orientation'])){
           $orientationCH = htmlspecialchars($_POST['orientation']);
            $i++;
        }
        if(isset($_POST['format']) && !empty($_POST['format'])){
           $formatCH = htmlspecialchars($_POST['format']);
            $i++;
        }
        if(isset($_POST['propos']) && !empty($_POST['propos'])){
            $proposCH = htmlspecialchars($_POST['propos']);
            $i++;
         }
        if (is_numeric($_POST['largeur']) && isset($_POST['largeur']) && !empty($_POST['largeur'])){
           $largeurCH = htmlspecialchars($_POST['largeur']);
            $i++;
        }
        if (is_numeric($_POST['hauteur']) && isset($_POST['hauteur']) && !empty($_POST['hauteur'])){
           $hauteurCH = htmlspecialchars($_POST['hauteur']);
            $i++;
        }
        if (is_numeric($_POST['epaisseur']) && isset($_POST['epaisseur']) && !empty($_POST['epaisseur'])){
           $epaisseurCH = htmlspecialchars($_POST['epaisseur']);
            $i++;
        }
        if (is_numeric($_POST['prix']) && isset($_POST['prix']) && !empty($_POST['prix'])){
            $prixCH = htmlspecialchars($_POST['prix']);
            $i++;
    }



// UPLOAD UNE IMAGE SUR UN MUR
$config['upload_path'] = '../img/peinture/frederic_lejeune';
$config['allowed_types'] = 'png|jpg|gif';
$upload = new Upload($config);

if ($upload->do_upload('img')) {
    $img=$upload->file_name;
    $i++;
    $checkIMG = true;
} else {
    $checkIMG = $upload->error_msg;
}
switch ($checkIMG[0]) {
    case 'upload_invalid_filetype': $errer='Image invalide'; break;
    case 'upload_file_exceeds_limit': $errer='Image trop lourd'; break;
}

//Si les variables existes envoie les données dans la BDD :
if($checkIMG[0]!='upload_invalid_filetype' && $checkIMG[0]!='upload_file_exceeds_limit'){
    array_push($_POST, $img);
    $y=1;
    if($i==0)
        header("Location:modifier.php?idOeuvre=$_GET[idOeuvre]");
    foreach ($_POST as $key => $value){
        if($key=="0" && $value != $data['img'])//si c'est une image
            if ($y==1 && $y != $i)//FIRST IMG
                $sqlUpdate .= 'img = "'.$img.'", ';
            else
                $sqlUpdate .= 'img = "'.$img.'"';

        if ($value != null && $value != "null" && $value != "" && $key != "btnModifier"){
            if ($y==1 && $y != $i){ //Si c'est le premier tour qu'il y a eu des modifs
                $sqlUpdate .= ''.$key.' = "'.$value.'", ';
                $y++;
            }
            else{
                $sqlUpdate .= ''.$key.' = "'.$value.'"';
                if($y < $i){
                    $sqlUpdate .= ", ";
                }
                $y++;
            }
        }
    }
    $sqlUpdate .= " WHERE id = $_POST[btnModifier]";
// UPDATE
    $query = $bdd->prepare($sqlUpdate);
    $query->execute();
    if($img =! null){
        //SUPPRIME l'ancienne image
        unlink("../img/peinture/frederic_lejeune/$data[img]");
    }

    $_SESSION['success'] = "Modification effectué";
    header("Location:peinture_info.php?id=$_GET[idOeuvre]");
}else
    $_SESSION['erreur'] = $errer;




     }// fin if j'ai cliquer sur modifier
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <?php
        include_ONCE '../php/includes/head2.php';
    ?>
            <meta name="description" content="Peinture de Frédéric LEJEUNE - ." />
            <title>Frédéric LEJEUNE - Peinture</title>
    </head>

    <body>
        <?php
//////////NAV
        include_ONCE '../php/includes/nav2.php';
include_ONCE("../php/divers/erreur.php");
    ?>
            <!-- Start your project here-->
            <!----------------------------------------------------------------------------------------------------PEINTURES-->
            <div class="container" id="peinture_info">
                <?php
                        echo
                            '
                <div class="row peinture_info">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 flex-center">
                        <img class="img-responsive" src="../img/peinture/frederic_lejeune/'.$img.'" alt="Chania">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 infoOeuvre">
                        <div>
                            <h3 class="auteur">auteur : '.$auteur.'</h3>
                            <p class="titre">titre :'.$titre.'</p>
                            <p class="dimension">dimensions : '.$hauteur.' x '.$largeur.' x '.$epaisseur.' cm</p>
                            <p class="type">type : '.$type.'</p>
                            <p>prix :'.$prix.' €</p>
                            <p class="orientation">orientation : '.$orientation.'</p>
                            <p class="format">format : '.$format.'</p>
                        </div>
                        <div class="proposOeuvre">
                            <h3>à propos de l\'oeuvre</h3>
                            <p>'.$propos.'</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2><i class="fa fa-pencil prefix"></i>Modifier l\'oeuvre "'.$titre.'"</h2>
                        <hr/>
                    </div>
                </div>
                ';

                ?>
            </div>
            <div class="container">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <p class="list-group-item list-group-item-danger">Écrivez dans le formulaire seulement si vous voulez modifier quelque chose</p>
                    <br>
                    <form action="modifier.php?idOeuvre=<?php echo $_GET['idOeuvre']; ?>" id="formModifie" method="POST" role="form" enctype="multipart/form-data">
                            <!--MODIFIER AUTEUR -->
                            <fieldset class="form-group">
                                <div class="md-form">
                                    <i class="fa fa-user prefix"></i>
                                    <label for='auteurID'>Auteur <small>(Actuellement = "<?php echo "$auteur"; ?>")</small></label><br>
                                    <input list="auteurd" name="auteur" type="text" id='auteurID' placeholder="Nouveau auteur OU selectionner un auteur déjà existant"/>
                                  <?php
                                        echo datalist("auteur",array("id"=>"auteurd"),$allAuteurBdd);
                                    ?>
                                </div>
                            </fieldset>

                            <!--MODIFIER TITRE-->
                            <fieldset class="form-group">
                                <div class="md-form">
                                    <i class="fa fa-pencil prefix"></i>
                                    <input type="text" id="titre" class="form-control" name="titre" placeholder='(Actuellement = "<?php echo $titre; ?>")'>
                                    <label for="titre">Titre de l'oeuvre</label>
                                </div>
                            </fieldset>
                            <!--MODIFIER L'IMAGE-->
                            <fieldset class="form-group">
                                <div class="md-form">
                                    <label for="img">Modifier l'image de l'oeuvre</label> <br><br>
                                    <i class="fa fa-image prefix"></i>
                                    <input type="file" class="form-control-file" id="img" name="img">
                                </div>
                            </fieldset>
                            <!--MODIFIER HAUTEUR -->
                            <p class="list-group-item list-group-item-info">Les dimensions sont exprimées en <strong>CENTIMETRE !</strong> Vous devez écrire les nouvelles dimensions <strong>sans aucune lettre ni symbole</strong></p>
                            <br>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <fieldset class="form-group">
                                    <div class="md-form">
                                    <i class="fa fa-crop prefix"></i>
                                        <input type="number" id="hauteur" class="form-control" name="hauteur" placeholder='(Actuellement = "<?php echo $hauteur; ?>")'>
                                        <label for="hauteur">Hauteur</label>
                                    </div>
                                </fieldset>
                            </div>
                            <!--MODIFIER LARGEUR -->
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <fieldset class="form-group">
                                    <div class="md-form">
                                        <input type="number" id="largeur" class="form-control" name="largeur" placeholder='(Actuellement = "<?php echo $largeur; ?>")'>
                                        <label for="largeur">Largeur</label>
                                    </div>
                                </fieldset>
                            </div>
                            <!--MODIFIER EPAISSEUR -->
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <fieldset class="form-group">
                                    <div class="md-form">
                                        <input type="number" id="epaisseur" class="form-control" name="epaisseur" placeholder='(Actuellement = "<?php echo $epaisseur; ?>")'>
                                        <label for="epaisseur">Épaisseur</label>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p class="list-group-item list-group-item-info">Le prix doit être modifier écrit <strong>sans aucune lettre ni symbole</strong> (comme €, $...)</p>
                            <br>
                            <!--MODIFIER PRIX -->
                            <fieldset class="form-group">
                                <div class="md-form">
                                    <i class="fa fa-money prefix"></i>
                                    <input type="number" id="prix" class="form-control" name="prix" placeholder='(Actuellement = "<?php echo "$prix €"; ?>")'>
                                    <label for="prix">Prix</label>
                                </div>
                            </fieldset>
                            <!--MODIFIER ORIENTATION -->
                            <fieldset class="form-group">
                                <label for="orientation">Orientation <small>(Actuellement = "<?php echo "$orientation"; ?>")</small></label>
                                <div class="md-form">
                                    <i class="fa fa-file-text prefix"></i>
                                    <select class="mdb-select" id="orientation" name="orientation">
                                        <option value="" disabled selected>Choisissez votre option</option>
                                        <option value="paysage">Paysage</option>
                                        <option value="portrait">Portrait</option>
                                        <option value="carre">Carré</option>
                                    </select>
                                </div>
                            </fieldset>
                            <p class="list-group-item list-group-item-info"><strong>Petit</strong> = Inférieur à 50x50cm
                                <br/>
                                <strong>Moyen</strong> = Inférieur à 100x100cm
                                <br/>
                                <strong>Grand</strong> = Supérieur à 100x100cm
                                <br/>
                            </p>
                            <br>
                            <!--MODIFIER FORMAT -->
                            <fieldset class="form-group">
                                <label for="format">Format <small>(Actuellement = "<?php echo "$format"; ?>")</small></label>
                                <div class="md-form">
                                    <i class="fa fa-file-text prefix"></i>
                                    <select class="mdb-select" id="format" name="format">
                                        <option value="" disabled selected>Choisissez votre option</option>
                                        <option value="petit">Petit</option>
                                        <option value="moyen">Moyen</option>
                                        <option value="grand">Grand</option>
                                    </select>
                                </div>
                            </fieldset>
                            <!--MODIFIER TYPE -->
                            <fieldset class="form-group">
                                <div class="md-form">
                                    <i class="fa fa-tag prefix"></i>
                                    <label for='typeid'>Type <small>(Actuellement = "<?php echo "$type"; ?>")</small></label><br>
                                    <input list="type" name="type" type="text" id='typeid' placeholder="Nouveau type OU selectionner un type déjà existant" />
                                  <?php
                                        echo datalist("type",array("id"=>"type"),$allTypeBdd);
                                    ?>
                                </div>
                            </fieldset>
                            <!--MODIFIER DESCRIPTION -->
                            <fieldset class="form-group">
                                <i class="fa fa-pencil-square-o prefix"></i>
                                <label for="propos">Modifier la description de l'oeuvre</label>
                                <textarea class="form-control" id="propos" name="propos" placeholder="255 catactères maximum"><?php echo $propos ?></textarea><div class="compteur"><span class="nbCaractere">?</span> / 255 catactères</div>
                            </fieldset>
                            <button type="submit" value="<?php echo " $_GET[idOeuvre] "; ?>" class="btn btn-primary" name="btnModifier">Modifier</button>
                    </form>
                </div>
            </div>
            <!-- /END your project here-->
            <?php
//////////Footer
            include_ONCE '../php/includes/footer.php';
//////////Script
            include_ONCE '../php/includes/script2.php';
            ?>
    </body>

    </html>

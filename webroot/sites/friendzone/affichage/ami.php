<?php
session_start();
if(!isset($_SESSION['id']))
	header("Location:login.php");
include("../divers/connexion.php");
include("../divers/head.php");
include("../divers/balises.php");
include("entete.php");

?>

<?php
	$sql = "SELECT * FROM utilisateur WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION['id']));
    $data = $query->fetch();
    echo
        '
            <!--HEADER-->
            <div id="mur">
                <div class="container-fluid header">
                    <fieldset class="imgHeader"></fieldset>
                </div>
                <div class="container" id="contentMur">
                    <div class="row text-center">
                        <a href="mur.php?id='.$_SESSION['id'].'">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 navHeader hidden-xs">
                                <p>Fil d’actualité</p>
                            </div>
                        </a>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 divImgProfil">
                            <div class="view hm-black-strong">
                            ';
    if($data['photo'] == 'default.svg')
        echo '<img src="../img/mur/profil/default.svg" class="img-circle profil" alt="Photo de profil">';
    else
        echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-circle profil" alt="Photo de profil">';
    if($_SESSION['id'] == $_SESSION['id']) 
        echo //Si c'est moi => Change photo de profil
            '
                                <span href="#" id="opacityLinkProfil">
                                    <div class="mask flex-center img-circle flex-center" id="changeProfil">
                                        <i class="fa fa-image color-white" aria-hidden="true"></i>
                                    </div>
                                </span>                                
                                <div class="container-fluid divChangeProfil flex-center">
                                <div class="container-fluid divChangeProfil opacityProfil"></div>
                                    <div class="row chrow">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <!--Card-->                             
                                            <span class="suppArticle quitProfil flex-center">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </span>
                                            <div class="card">
                                                <!--Card image-->
                                                <div class="cardImage">
                                                    <img class="img-fluid profilActuel" src="../img/'.$data['login'].'/profil/'.$data['photo'].'" alt="Photo de profil actuel">
                                                </div>
                                                <!--/.Card image-->

                                                <!--Card content-->
                                                <div class="card-block">
                                                    <!--Title-->
                                                    <h4 class="card-title">Changer de photo de profil</h4>
                                                    <!--Text-->
                                                    <form action="../traitement/profil.php" method="POST" enctype="multipart/form-data" role="form">
                                                        <input type="file"  name="imgProfil">
                                                        <input type="submit" class="btn btn-primary">
                                                    </form>
                                                </div>
                                                <!--/.Card content-->
                                            </div>
                                            <!--/.Card-->
                                        </div>
                                    </div>
                                </div>

            ';
        echo
            '
                            </div>
                        </div>
                        <a href="ami.php">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 navHeader hidden-xs">
                                <p>Friendzone'; if($_SESSION['notifAmi'] > 0) echo' <span class="notifAmi">'.$_SESSION['notifAmi'].'</span>';
                                echo'
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="row text-center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1>'.$data['prenom'].' '.$data['nom'].'</h1>
                            <hr>
                        </div>
                    </div>
<!--AFFICHE LES AMIS ETC...-->
              ';

//AFFICHE MES AMIS 
                    ?>
<div class="card-group">
    <div class="card">
        <img class="img-fluid" src="../img/ami/Ma_Friendzone.jpg" alt="Ma Friendzone">
        <div class="card-block">
            <h4 class="card-title">Ma Friendzone</h4>
<?php 
$sql = "SELECT utilisateur.* FROM utilisateur INNER JOIN lien ON idUtilisateur1=utilisateur.id AND etat='ami' AND idUTilisateur2=? UNION SELECT utilisateur.* FROM utilisateur INNER JOIN lien ON idUtilisateur2=utilisateur.id AND etat='ami' AND idUTilisateur1=?";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id'],
                      $_SESSION['id']));
while($data = $query->fetch()) {
    echo '
            <a class="divAmi" href="mur.php?id='.$data['id'].'">
        ';
    if($data['photo'] == 'default.svg')
        echo '<img src="../img/mur/profil/default.svg" class="img-circle amiProfil" alt="Photo de profil">';
    else
        echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-circle amiProfil" alt="Photo de profil de votre frienzone">';
        echo'
                <small href="#">'.$data['prenom'].' '.$data['nom'].'</small>
            </a>
         ';
}
?>
        </div>
    </div>
<!--DEMANDE D'AMIS-->
    <div class="card">
        <img class="img-fluid" src="../img/ami/Je-friendzone.jpg" alt="Je l'ai Friendzoné">
        <div class="card-block">
            <h4 class="card-title">Vous les avez Friendzoné</h4>
<?php 
$sql = "SELECT utilisateur.* FROM utilisateur JOIN lien ON utilisateur.id=idUtilisateur2 AND etat='attente' AND idUtilisateur1=?";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id']));
while($data = $query->fetch()) {
    echo '
            <a class="divAmi" href="mur.php?id='.$data['id'].'">
        ';
    if($data['photo'] == 'default.svg')
        echo '<img src="../img/mur/profil/default.svg" class="img-circle amiProfil" alt="Photo de profil">';
    else
        echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-circle amiProfil" alt="Photo de profil de votre frienzone">';
        echo'
                <small href="#">'.$data['prenom'].' '.$data['nom'].'</small>
            </a>
         ';
}
?>
        </div>
    </div>
<!--ON ME DEMANDE EN AMI-->
    <div class="card">
        <img class="img-fluid" src="../img/ami/Il-ma-friendzone.jpg" alt="ils m'ont Friendzoné">
        <div class="card-block">
            <h4 class="card-title">Ils vous ont friendzoné</h4>
<?php 
$sql = "SELECT utilisateur.* FROM utilisateur WHERE id IN(SELECT idUtilisateur1 FROM lien WHERE idUtilisateur2=? AND etat='attente')";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id']));
while($data = $query->fetch()) {
    echo '
            <a class="divAmi" href="mur.php?id='.$data['id'].'">
        ';
    if($data['photo'] == 'default.svg')
        echo '<img src="../img/mur/profil/default.svg" class="img-circle amiProfil" alt="Photo de profil">';
    else
        echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-circle amiProfil" alt="Photo de profil de votre frienzone">';
        echo'
                <small href="#">'.$data['prenom'].' '.$data['nom'].'</small>
            </a>
         ';
}
?>
        </div>
    </div>
</div>

                </div>
            </div>

<?php
// On termine par le pied de page

include("pied.php");

?>
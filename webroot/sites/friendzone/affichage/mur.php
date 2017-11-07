<?php
session_start();
include("../divers/connexion.php");
include("../divers/balises.php");
include("../divers/time.php");
include("../traitement/like.php");
// On n'est pas connecté, il faut retourner à la pgae de login
if(!isset($_SESSION['id'])) {
	header("Location:login.php");
}
include("entete.php");
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	// On n a pas donné le numéro de l'id de la personne dont on veut afficher le mur.
	// On affiche un message et on meurt
	echo "Bizarre !!!!";
    die(1);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="description" content="Facebook - Mur" />
    <title>FriendZone - Mur</title>
    <?php include_ONCE '../divers/head.php'; ?> <!--HEAD META....-->
</head>
<body>
<?php
// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi 
$ok = false;
if($_GET['id']==$_SESSION['id']) {
	$ok = true; // C notre mur, pas de soucis
} else {
	// Verifions si on est amis avec cette personne
	$sql = "SELECT * FROM lien WHERE etat='ami' 
		AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['id'], $_SESSION['id'], $_SESSION['id'], $_GET['id']));
    while($data = $query->fetch()) {
        $ok = true; // JE SUIS AMI
    }
	// les deux ids à tester sont : $_GET['id'] et $_SESSION['id']		
	// A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que l'on est pas ami avec cette personne

}
?>


<?php
	$sql = "SELECT * FROM utilisateur WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION['id']));
    $dataMoi = $query->fetch();
    
	$sql = "SELECT * FROM utilisateur WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['id']));
    $dataCurrent = $query->fetch();
	$sql = "SELECT * FROM utilisateur WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['id']));
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
                            <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3 navHeader hidden-xs">
                                <p>Fil d’actualité</p>
                            </div>
                        </a>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 divImgProfil">
                            <div class="view hm-black-strong">
                            ';
    if($data['photo'] == 'default.svg')
        echo '<img src="../img/mur/profil/default.svg" class="img-circle profil" alt="Photo de profil">';
    else
        echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-circle profil" alt="Photo de profil">';
    
	$sqlAmi = "SELECT * FROM lien WHERE ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
    $queryAmi = $pdo->prepare($sqlAmi);
    $queryAmi->execute(array($_GET['id'], $_SESSION['id'], $_SESSION['id'], $_GET['id']));
    $dataAmi = $queryAmi->fetch();
    if($dataAmi['idUtilisateur1'] == $data['id'] && $dataAmi['etat']=="attente")
        echo  //S'il vous a demandé en ami => Accepte son invitation
            '
                                <a href="../traitement/valideramitie.php?etat=ami&amp;id='.$data['id'].'" id="opacityLinkProfil">
                                    <div class="mask flex-center img-circle valid">
                                        <i class="fa fa-user-plus color-white" aria-hidden="true"></i>
                                    </div>
                                </a>
            ';
    if(empty($dataAmi) && $_SESSION['id'] != $_GET['id'])
        echo  //Si c'est un inconnu (aucun lien) => Demande une invitation ami
            '
                                <a href="../traitement/demanderamitie.php?id='.$data['id'].'" id="opacityLinkProfil">
                                    <div class="mask flex-center img-circle">
                                        <i class="fa fa-user-plus color-white" aria-hidden="true"></i>
                                    </div>
                                </a>
            ';
    if($_SESSION['id'] == $_GET['id']) {
        echo //Si c'est moi => Change photo de profil
            '
                                <span href="#" id="opacityLinkProfil">
                                    <div class="mask flex-center img-circle" id="changeProfil">
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
                ';
    
                                if($dataMoi['photo'] == 'default.svg')
                                    echo '<img src="../img/mur/profil/default.svg" class="img-fluid profilActuel" alt="photo de profil">';
                                else
                                    echo '<img src="../img/'.$dataMoi['login'].'/profil/'.$dataMoi['photo'].'" class="img-fluid profilActuel" alt="Photo de profil">';

    
    echo'
                                                </div>
                                                <!--/.Card image-->

                                                <!--Card content-->
                                                <div class="card-block">
                                                    <!--Title-->
                                                    <h4 class="card-title">Changer de photo de profil</h4>
                                                    <!--Text-->
                                                    <form action="../traitement/profil.php" method="POST" enctype="multipart/form-data" role="form">
                                                        <input type="file"  name="imgProfil">
                                                        <input type="submit" class="btn btn-primary inputChange">
                                                    </form>
                                                </div>
                                                <!--/.Card content-->
                                            </div>
                                            <!--/.Card-->
                                        </div>
                                    </div>
                                </div>
            ';
    }
    if(isset($dataAmi['etat']) && $dataAmi['etat'] == 'ami' && !empty($dataAmi['etat']) && $data['id'] != $_SESSION['id']) 
        echo //Si c'est déjà un ami => Supprime
            '
                                <a href="../traitement/valideramitie.php?etat=banni&amp;id='.$data['id'].'" id="opacityLinkProfil">
                                    <div class="mask flex-center img-circle supp">
                                        <i class="fa fa-user-times color-white" aria-hidden="true"></i>
                                    </div>
                                </a>
            ';
        echo
            '
                            </div>
                        </div>
                        <a href="ami.php">
                            <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 col-xs-offset-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 navHeader hidden-xs">
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
                ';
if($ok==false) {
	echo "Vous n'êtes pas encore ami, vous ne pouvez voir son mur !!";
	die(1);
}
    
    echo
        '
<!--ECRIRE UN MESSAGE SUR UN MUR-->
                                <div class="container" id="Exprimez">
                                    <div class="row divExprimez">
                                        <a href="mur.php?id='.$_SESSION['id'].'">
        ';
                                if($dataMoi['photo'] == 'default.svg')
                                    echo '<img src="../img/mur/profil/default.svg" class="img-circle imgPubli hidden-xs profil" alt="photo de profil">';
                                else
                                    echo '<img src="../img/'.$dataMoi['login'].'/profil/'.$dataMoi['photo'].'" class="img-circle profil imgPubli hidden-xs" alt="Photo de profil">';

                                echo'
                                        </a>
                                        <form class="form-inline" action="../traitement/ecrire.php" method="POST" enctype="multipart/form-data" role="form">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 divMessage">
                                                    <!--CONTENT-->
                                                    <div>
                                                        <label for="content" id="labelMessage">Message</label>
                                                        <textarea id="content" name="content" placeholder="Exprimez-vous !"></textarea>
                                                    </div>
                                                    <!--SUBMIT-->
                                                    <button type="submit" class="btn btn-primary" value="'.$data['id'].'" name="idAmi" id="publier">Publier</button>
                                                </div>
                                            </div>
                                            <!--IMG-->
                                            <div class="row divPublier">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <input type="file" name="img" class="pull-xs-right inputFile">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <hr>
            ';
                        //AFFICHE LE MUR 
                        $sql = 'SELECT ecrit.id as idEcrit, contenu, dateEcrit, image, idAuteur, idAmi, utilisateur.id, login, nom, prenom, pwd, remember,photo FROM ecrit JOIN utilisateur ON idAuteur=utilisateur.id WHERE idAmi=? ORDER BY dateEcrit DESC';
                        $query = $pdo->prepare($sql);
                        $query->execute(array($_GET['id']));
                        while($data = $query->fetch()) {
                            //LIKES
                            $sql = 'SELECT ecrit_like.id as idLike, idAuteurLike, COUNT(ecrit.id) as nbLike FROM ecrit_like JOIN ecrit ON ecrit.id=idEcrit WHERE ecrit.id=? LIMIT 1';
                            $queryLike = $pdo->prepare($sql);
                            $queryLike->execute(array($data['idEcrit'],));
                            $dataLike = $queryLike->fetch();
                            
                            $sql = 'SELECT ecrit_like.id as idLike, idAuteurLike, COUNT(ecrit.id) as nbLike FROM ecrit_like JOIN ecrit ON ecrit.id=idEcrit WHERE ecrit.id=? AND idAuteurLike=? LIMIT 1';
                            $queryMyLike = $pdo->prepare($sql);
                            $queryMyLike->execute(array($data['idEcrit'],$_SESSION['id']));
                            $dataMyLike = $queryMyLike->fetch();

                            echo 
                                '
                                <!--PUBLICATIONS-->
                                <div class="container" id="Exprimez">
                                    <div class="row divExprimez divPublication">
                                '; 
                                    if ($dataMyLike['idAuteurLike'] == $_SESSION['id'])
                                        echo'
                                        <a href="?action=suppLike&amp;idEcrit='.$dataLike['idLike'].'" class="like">
                                            <small>'.$dataLike['nbLike'].'</small>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                        ';
                                    else
                                        echo'
                                        <a href="?action=like&amp;idEcrit='.$data['idEcrit'].'" class="like">
                                            <small>'.$dataLike['nbLike'].'</small>
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                        ';
                                        
                            if($data['id']==$_SESSION['id'])//Si c'est ma publication : je peux supprimer
                            echo'
                                        <a href="../traitement/effacer.php?idMessage='.$data['idEcrit'].'&idAmi='.$_GET['id'].'" class="suppArticle flex-center">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                ';
                                    echo'<a href="mur.php?id='.$data['id'].'">';
                                   
                            if($data['photo'] == 'default.svg')
                                echo '<img src="../img/mur/profil/default.svg" class="img-circle profil imgPublication hidden-xs" alt="photo de profil"/>';
                            else
                                echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-circle profil imgPublication hidden-xs" alt="Photo de profil"/>';
                                echo'
                                        </a>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 divMessage">
                                                <p><a href="mur.php?id='.$data['id'].'">'.$data['prenom'].' '.$data['nom'].'</a> <small>'.AgoTimeFormat::makeAgo(strtotime($data['dateEcrit'])).'</small></p>
                                                <p>'.$data['contenu'].'</p>
                                    ';
                            if(isset($data['image']) && !empty($data['image']) && $data['image']!="")
                                echo '<img class="img-responsive imgContenu m-x-auto d-block" src="../img/'.$dataCurrent['login'].'/mur/'.$data['image'].'" alt="image posté par '.$data['login'].'"/>';
                                echo'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                    ?>
                </div>
            </div>

<?php
// On termine par le pied de page

include("pied.php");

?>
<?php
include("../traitement/deconnexion.php");
include("../divers/erreur.php");

    $sql = 'SELECT COUNT(id) as nbDemandeAmi FROM lien WHERE idUtilisateur2=? AND etat = "attente"';
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION['id']));
    $dataNotif = $query->fetch();
    
    $_SESSION['notifAmi'] = $dataNotif['nbDemandeAmi'];
// AFFICHAGE D'ERREUR S'IL EXISTE EN SESSION
//HEADER (NAV)
if(isset($_SESSION['id'])){
    echo'
        <nav class="navbar navbar-dark bg-primary">
            <!-- Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
                <i class="fa fa-bars"></i>
            </button>
            <div class="container">
                <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                    <div class="row pull-xs-left">
                        <img src="../img/logo.svg" alt="logo du friendzone" id="logo">
                    </div>
                    <div class="row pull-xs-right">
                        <ul class="nav nav-inline">
                            <li class="nav-item vertical-middle">
                                <form class="form form-inline" action="rechercher.php" method="GET" enctype="multipart/form-data" role="form">
                                    <div class="form-group md-form">
                                        <input type="text" id="rechercher" class="form-control" name="recherche" placeholder="Rechercher un ami">
                                    </div>
                                </form> 
                            <li class="nav-item">
                                <a class="nav-link" href="mur.php?id='.$_SESSION['id'].'">Accueil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['login'].'</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Mon compte</a>
                                    <a class="dropdown-item" href="ami.php">Friendzone'; if($_SESSION['notifAmi'] > 0) echo'<span class="notifAmi">'.$_SESSION['notifAmi'].'</span>'; echo'</a>
                                    <a class="dropdown-item" href="#">Paramètre</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../traitement/deconnexion.php?action=deconnexion">Déconnexion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    ';
}
?>
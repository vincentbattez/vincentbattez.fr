<?php
include('includes/help_connexion.php');
include('includes/help_verif.php');
session_save_path('sessions');
ini_set('session.gc_probability', 1);
session_start();
date_default_timezone_set('Europe/Paris');

$message = (string) htmlspecialchars($_POST['message']);
$today = date("Y-m-d H:i:s");
$idArticle = (int) $_POST['sendCom'];

if ($message !== ""){
    //prepare
    $req = $bdd->prepare('INSERT INTO commentaire(idutilisateurs, message, date, idArticle) VALUES(:idutilisateurs, :message, :date, :idArticle)');



    //AJOUTE LE COMMENTAIRE (le nb)
    $query_nbCom = $bdd->query('SELECT COUNT(id) AS NbCom FROM commentaire WHERE idArticle='.$idArticle.';');
    $donnees_nbCom = $query_nbCom->fetch();
        $nbCom = (int) $donnees_nbCom['NbCom'];
        $nbCom += (int) 1;
        $bdd->exec("UPDATE articles SET commentaires='$nbCom' WHERE id='$idArticle'");
    $query_nbCom->closeCursor();


    //CHERCHE L'UTILISATEUR QUI A POSER LE COM
        $query = $bdd->query('SELECT id FROM utilisateurs WHERE sid="'.$_SESSION['sid'].'";');
        while ($data = $query->fetch()){
            $idutilisateurs = (int) ($data['id']);
        }
        $query->closeCursor(); // Termine le traitement de la requête



    //execute
    $req->execute(array(
        'idutilisateurs' => $idutilisateurs,
        'message' => $message,
        'date' => $today,
        'idArticle' => $idArticle
    ));
header('Location:../index.php');
    
}else{
    header('Location:../index.php');
}
?>
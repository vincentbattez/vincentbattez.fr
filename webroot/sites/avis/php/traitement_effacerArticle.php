<?php
include('includes/help_connexion.php');
include('includes/help_verif.php');

//ID DE L'ARTICLE
$idArticleCurrent = (int) $_POST['remove'];

//PREPARE
    $DELETE_com = $bdd->prepare('DELETE FROM commentaire WHERE idArticle='.$idArticleCurrent.'');
    $DELETE_like = $bdd->prepare('DELETE FROM articles_aime WHERE idArticle='.$idArticleCurrent.'');
    $DELETE_article = $bdd->prepare('DELETE FROM articles WHERE id='.$idArticleCurrent.'');
    $DELETE_positif = $bdd->prepare('DELETE FROM positif WHERE idArticle='.$idArticleCurrent.'');
    $DELETE_negatif = $bdd->prepare('DELETE FROM negatif WHERE idArticle='.$idArticleCurrent.'');
////EXECUTE
    $DELETE_com -> execute();
    $DELETE_like -> execute();
    $DELETE_article -> execute();
    $DELETE_positif -> execute();
    $DELETE_negatif -> execute();

header('Location:../index.php');
?>


<?php
include('includes/help_connexion.php');
include('includes/help_verif.php');

//RETIRE UNE LIGNE DE COMMENTAIRE DANS LA BDD
    $idAime = (int) $_POST['remove'];

    $sql = "DELETE FROM articles_aime WHERE id = :idAime";

    $stmt = $bdd->prepare($sql);

    $stmt->bindParam(':idAime', $idAime, PDO::PARAM_INT);   

    $stmt->execute();


////RETIRE UN LIKE DANS LA BDD (le nb)
    $idArticleCurrent = (int) $_POST['idArticleCurrent'];

    $query_nbAime = $bdd->query('SELECT aime FROM articles WHERE id='.$idArticleCurrent.';');
    $donnees_nbAime = $query_nbAime->fetch();
    $query_nbAime->closeCursor();

    $nbAime = (int) $donnees_nbAime['aime'];
    $nbAime -= 1;
    $bdd->exec("UPDATE articles SET aime='$nbAime' WHERE id='$idArticleCurrent';");

header('Location:../index.php');    
?>


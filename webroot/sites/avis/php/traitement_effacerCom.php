<?php
include('includes/help_connexion.php');
include('includes/help_verif.php');


//RETIRE UNE LIGNE DE COMMENTAIRE DANS LA BDD
    $idCommentaire = (int) $_POST['remove'];

    $sql = "DELETE FROM commentaire WHERE id = :idCommentaire";

    $stmt = $bdd->prepare($sql);

    $stmt->bindParam(':idCommentaire', $idCommentaire, PDO::PARAM_INT);   

    $stmt->execute();


////RETIRE UN COMMENTAIRE DANS LA BDD (le nb)
    $idArticleCurrent = (int) $_POST['idArticleCurrent'];

    $query_nbCom = $bdd->query('SELECT COUNT(id) AS NbCom FROM commentaire WHERE idArticle='.$idArticleCurrent.';');
    $donnees_nbCom = $query_nbCom->fetch();
    $query_nbCom->closeCursor();

    $nbCom = (int) $donnees_nbCom['NbCom'];

    $bdd->exec("UPDATE articles SET commentaires='$nbCom' WHERE id='$idArticleCurrent'");
header('Location:../index.php');
    
?>


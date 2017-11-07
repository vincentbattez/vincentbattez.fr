<?php

// AJOUTE LIKE
if(isset($_GET['action']) && $_GET['action']=="like" && preg_match('/^[0-9]*$/', $_GET['idEcrit'])) { 
    $sql = 'INSERT INTO ecrit_like VALUES(NULL,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION['id'], $_GET['idEcrit']));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

//SUPPRIME LIKE
if(isset($_GET['action']) && $_GET['action']=="suppLike" && preg_match('/^[0-9]*$/', $_GET['idEcrit'])) { 
    $sql = 'DELETE FROM ecrit_like where id=?';
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['idEcrit']));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

?>

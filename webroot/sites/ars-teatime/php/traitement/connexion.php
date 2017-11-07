<?php
session_start();
include("../includes/help_connexion.php");

// Le formulaire a été soumis
if(isset($_POST['user']) && isset($_POST['pwd']) && !empty($_POST['user']) && !empty($_POST['pwd'])) {
    $sql = 'SELECT * FROM user WHERE user= ? AND pwd=md5(?)';
    $query = $bdd->prepare($sql);
    $query->execute(array($_POST['user'], $_POST['pwd']));
    $data = $query->fetch();
    if($data['id'] != NULL && $data['user'] != NULL){
        $_SESSION['id'] = $data['id'];
        $_SESSION['user'] = $data['user'];
        header("Location:/pages/peinture.php?page=1");
    }else{
        header("Location:/adminfl.php");
        $_SESSION['erreur'] = 'le user ou le mot de passe est incorrect';
    }
}else{
    header("Location:/adminfl.php");
    $_SESSION['erreur'] = 'le user ou le mot de passe est incorrect';
}
?>

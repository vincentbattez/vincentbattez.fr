<?php
session_start();
include("../divers/connexion.php");
include("../divers/balises.php");
include("../divers/Upload.php");
// On n'est pas connecté, il faut retourner à la pgae de login
if(!isset($_SESSION['id'])) {
	header("Location:login.php");
}
$errer="";
$img=NULL;


$sql = 'SELECT login FROM utilisateur WHERE id = ? LIMIT 1';
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id']));
$data = $query->fetch();

// UPLOAD UNE IMAGE DE PROFIL
$config['upload_path'] = '../img/'.$data['login'].'/profil';
$config['allowed_types'] = 'png|jpg|gif';


$upload = new Upload($config);

if ($upload->do_upload('imgProfil')) {
    $img=$upload->file_name;
} else {
    print_r($upload->error_msg);
}
//Si L'upload a réussi : UPDATE
if($img =! NULL && $img=!"" && !empty($img)){ 
    $sql = 'UPDATE utilisateur SET photo = ? WHERE id=?';
    $query = $pdo->prepare($sql);
    $query->execute(array($upload->file_name,$_SESSION['id']));
    $_SESSION["success"] = 'Votre photo de profil à bien été mis à jour';
    header("Location:../affichage/mur.php?id=$_SESSION[id]");
}else{
    header("Location:../affichage/mur.php?id=$_SESSION[id]");
    $_SESSION["erreur"] = 'photo non valide';
}


// Ecrire un message


?>
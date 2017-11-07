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


// Si on a écrit dans le formulaire mot de passe et et mot de passe = mot de passe confirmation créer la variable $pwd
if(isset($_POST['content'])){
    if(!empty($_POST['content'])){   
        $content = htmlentities($_POST['content']);
    }else{$errer="Vous devez remplir tous les champs";}
}else{$errer="Vous devez remplir tous les champs";}
if(isset($_POST['idAmi'])){
    $idAmi = htmlentities($_POST['idAmi']);
    
    $sql = 'SELECT * FROM ecrit JOIN utilisateur ON utilisateur.id = idAmi WHERE idAmi = ?';
    $query = $pdo->prepare($sql);
    $query->execute(array($idAmi));
    $data = $query->fetch();

}

// UPLOAD UNE IMAGE SUR UN MUR
$config['upload_path'] = '../img/'.$data['login'].'/mur';
$config['allowed_types'] = 'png|jpg|gif';
$upload = new Upload($config);

if ($upload->do_upload('img')) {
    $img=$upload->file_name;
    $checkIMG = true;
} else {
    // print_r($upload->error_msg);
    $checkIMG = $upload->error_msg;
}
//var_dump($checkIMG[0]);
//var_dump($img);

switch ($checkIMG[0]) {
    case 'upload_invalid_filetype': $errer='fichier invalide'; break;
    case 'upload_file_exceeds_limit': $errer='fichier trop lourd'; break;
}

//Si les variables existes envoie les données dans la BDD :
if(isset($content) && $checkIMG[0]!='upload_invalid_filetype' && $checkIMG[0]!='upload_file_exceeds_limit'){ 
    $sql = 'INSERT INTO ecrit VALUES(NULL,?,?,?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute(array($content,date("Y-m-d H:i:s"),$img,$_SESSION['id'],$idAmi));
    $_SESSION["success"] = 'Vous avez publiez sur le mur de '.$data['prenom'].' '.$data['nom'].'';
    header("Location:../affichage/mur.php?id=$idAmi");
}else{
    $_SESSION["erreur"] = $errer;
    header("Location:../affichage/mur.php?id=$idAmi");
}


?>
<?php
include('includes/help_connexion.php');
include('includes/help_verif.php');
session_save_path('sessions');
ini_set('session.gc_probability', 1);
session_start();
date_default_timezone_set('Europe/Paris');

$titre = (string) htmlspecialchars($_POST['titre_article']);
$description = (string) htmlspecialchars($_POST['resume_article']);
$message = (string) htmlspecialchars($_POST['content_article']);
$satisfaction = (string) $_POST['satisfaction_article'];
$today = date("Y-m-d H:i:s");
$IDuser = (string) $_SESSION['idutilisateurs'];
$positif = $_POST['review_goods'];
$negatif = $_POST['review_bad'];

//var_dump($titre);
//var_dump($description);
//var_dump($message);
//var_dump($satisfaction);
//var_dump($today);
//var_dump($IDuser);
//var_dump($positif);
    

if ($titre !== "" && $description !== "" && $message !== ""){
    
    //prepare to articles
    $req = $bdd->prepare('INSERT INTO articles(titre, idutilisateurs, date, resume, content, aime, commentaires, satisfaction) VALUES(:titre, :idutilisateurs, :date, :resume, :content, :aime, :commentaires, :satisfaction)');

    //execute to articles
    $req->execute(array(
        'titre' => $titre,
        'idutilisateurs' => $IDuser,
        'date' => $today,
        'resume' => $description,
        'content' => $message,
        'aime' => 0,
        'commentaires' => 0,
        'satisfaction' => $satisfaction
    ));
    
$query_idArticle = $bdd->query('SELECT id FROM articles WHERE id = (SELECT MAX(id) FROM articles)'); 


while ($data = $query_idArticle->fetch()){
    //prepare to positif
    $req = $bdd->prepare('INSERT INTO positif(idarticle, avispositif) VALUES(:idarticle, :avispositif)');
    foreach($positif as $key => $value) {
        if($positif[$key] != ""){
    //execute to positif
            $req->execute(array(
                'idarticle' => $data['id'],
                'avispositif' => $value,
            ));
        }
    }
    //prepare to negatif
    $req = $bdd->prepare('INSERT INTO negatif(idarticle, avisnegatif) VALUES(:idarticle, :avisnegatif)');
    foreach($negatif as $key => $value) {
        if($negatif[$key] != ""){
    //execute to negatif
            $req->execute(array(
                'idarticle' => $data['id'],
                'avisnegatif' => $value,
            ));
        }
    }
}
    
    
    header('Location:../merci.html');
    
}else{
//    header('Location:../index.php');
}
?>
<?php
session_start();
$adresse = "wicarden37@gmail.com";
$site = "http://ars-teatime.com/";

if(isset($_POST['submit'])){
    
    $name = stripslashes($_REQUEST["name"]);
    $from = stripslashes($_REQUEST["email"]);
    $subject = stripslashes($_REQUEST["sujet"]);
    $message = stripslashes($_REQUEST["message"]);
    
    $TO = $adresse;
    
    $head = "From: ".$from."\n";
    $head .= "X-Sender: <".$adresse.">\n";
    $head .= "X-Mailer: PHP\n";
    $head .= "Return-Path: <".$adresse.">\n";
    $head .= "Content-Type: text/plain; charset=iso-8859-1\n";
    
    
    
    $informations = "
    Nom: ".$name." \r\n
    Email: ".$from." \r\n
    Sujet: ".$subject." \r\n
    Message: ".$_POST['message']." \r\n
    ";
    
    
    if(isset($name) && isset($from) && isset($subject) && isset($message) && isset($_POST['submit']) &&
       !empty($name) && !empty($from) && !empty($subject) && !empty($message)
       ){
    	mail($TO, $sujet ,$informations, $head);
        header("Location:merci.html");
    }else {
        $_SESSION["erreur"] = 'Formulaire de contact est incorrect';
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}

if(isset($_POST['SubmitOeuvre'])){
    
    $name = stripslashes($_REQUEST["name"]);
    $prenom = stripslashes($_REQUEST["prenom"]);
    $from = stripslashes($_REQUEST["email"]);
    $tel = stripslashes($_REQUEST["tel"]);
    $message = stripslashes($_REQUEST["message"]);
    $subject = stripslashes($_REQUEST["sujet"]);
    
    $TO = $adresse;
    
    $head = "From: ".$from."\n";
    $head .= "X-Sender: <".$adresse.">\n";
    $head .= "X-Mailer: PHP\n";
    $head .= "Return-Path: <".$adresse.">\n";
    $head .= "Content-Type: text/plain; charset=iso-8859-1\n";
    
    
    
    $informations = "
    Nom: ".$name." 
    Prénom: ".$prenom." \r\n
    Numéro de téléphone: ".$tel." \r\n
    Email: ".$from." \r\n
    \r\n
    Sujet: ".$subject." \r\n
    Message: ".$_POST['message']." \r\n
    ";
    
    if(isset($name) && isset($prenom) && isset($tel) && isset($from) && isset($subject) && isset($message) && isset($_POST['SubmitOeuvre']) &&
      isset($name) && !empty($prenom) && !empty($tel) && !empty($from) && !empty($subject) && !empty($message)
    ){
    	mail($TO, $sujet ,$informations, $head);
        header("Location:merci.html");
    }
    else 
    {
        $_SESSION["erreur"] = 'Formulaire de réservation incorrect';
        echo"<pre>";
        var_dump($_POST);
        echo"</pre>";
        // header("Location:".$_SERVER['HTTP_REFERER']);
    }
}


?>

<?php

//Rentrer MAIL
$adresse = "vins450@hotmail.fr";
$adresse2 = "jacquet.maxime.59@gmail.com";

$TO = $adresse;
$TO2 = $adresse2;

$site = "www.lawey.fr/site/gecko";

$head = "From: ".$_POST['email']."\n";
$head .= "X-Sender: <".$adresse.">\n";
$head .= "X-Mailer: PHP\n";
$head .= "Return-Path: <".$adresse.">\n";
$head .= "Content-Type: text/plain; charset=iso-8859-1\n";


$sujet = "Formulaire de Question";

$informations = "

    Nom: ".$_POST['nom']." \r\n
    Email: ".$_POST['email']." \r\n
    Message: ".$_POST['message']." \r\n

";


mail($TO, $sujet ,$informations, $head);
mail($TO2, $sujet ,$informations, $head);


Header("Location: http://".$site."/index.php" );

?>
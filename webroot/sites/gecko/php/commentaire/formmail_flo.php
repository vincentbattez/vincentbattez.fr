<?php

//Rentrer MAIL
$adresse = "jacquet.maxime.59@gmail.com";
$adresse2 = "vins450@hotmail.fr";

$adresse3 = "florine.robitaille@orange.fr";

$TO = $adresse;
$TO2 = $adresse2;
$TO3 = $adresse3;


$site = "www.lawey.fr";


//CONTENANT DE L'EMAIL
$head = "From: ".$_POST['email']."\n";
$head .= "X-Sender: <".$adresse.">\n";
$head .= "X-Mailer: PHP\n";
$head .= "Return-Path: <".$adresse.">\n";
$head .= "Content-Type: text/plain; charset=iso-8859-1\n";


$sujet = "Correction Florine";

$informations = "

    Correction de viseur sur ton article: ".$_POST['message']." \r\n

";

/*
//MAIL ENVOYÉ A L'AUTEUR 
$adresseDES = $_POST['email'];
$TODES = $adresseDES;
$sujetVosdemande = "Votre e-mail a ete envoye, et il contient : ";
mail($TODES, $sujetVosdemande ,$informations, $head);
*/ 


//MAIL ENVOYÉ AU CRÉATEUR 
mail($TO, $sujet ,$informations, $head);
mail($TO2, $sujet ,$informations, $head);
mail($TO3, $sujet ,$informations, $head);


//PAGE DE RETOUR
Header("Location: http://".$site."/site/gecko/index.php" );

?>
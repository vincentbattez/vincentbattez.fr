<?php

//TUTO YOUTUBE

$adresse = "vincent.battez.@hotmail.fr";
$site = "www.vincentbattez.fr";

$TO = $adresse;

$head = "From: ".$_POST['email']."\n";
$head .= "X-Sender: <".$adresse.">\n";
$head .= "X-Mailer: PHP\n";
$head .= "Return-Path: <".$adresse.">\n";
$head .= "Content-Type: text/plain; charset=iso-8859-1\n";

$sujet = "Formulaire de commande";


$informations = "
Nom: ".$_POST['nom']." \r\n
Email: ".$_POST['email']." \r\n
Message: ".$_POST['message']." \r\n

";



mail($TO, $sujet ,$informations, $head);


Header("Location: http://".$site."/html/mail.html" );



?>
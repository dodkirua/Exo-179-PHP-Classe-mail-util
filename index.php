<?php
require "./classes/Mail.php";

$subject = "test mail par objet";
$message = "Voici le mail par objet";
$to = ["",""];
$from = [""];
$mail = new Mail($subject, $message, $to, $from);

if ($mail -> send()){
    echo "<p>Mail envoyé</p>";
}
else {
    echo "<p>Problème à l'envoie</p>";
}
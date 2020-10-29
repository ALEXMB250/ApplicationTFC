<?php

require "models.php";

if(isset($_POST["nom"]) && isset($_POST["email"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $personne = new Personne($nom, $email);
    $personne->insert();
} 

?>
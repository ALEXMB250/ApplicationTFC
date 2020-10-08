<?php

require "models.php";

if(isset($_POST)) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $personne = new Personne($nom, $email);
    $personne->insert();
    echo "ok";
}

?>
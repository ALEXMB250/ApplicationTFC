<?php
include ("../models/ConnexionBD.php");
require "../models/EnseignantModel.php";

if(isset($_POST)) {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $enseignant = new Enseignant($email, $mdp);
    $enseignant->insert();
    echo "ok";
    // Redirection du visiteur vers la page du minichat
    header('Location: ../pages/inviterApprenant.html');
}
else{
    echo "<h3>Remplissez tous les champs</h3>";
    echo "<a href='../pages/inscriptionProfesseur.php'>Retour</a>";
}



?>
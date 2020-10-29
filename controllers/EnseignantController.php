<?php

require "../models/EnseignantModel.php";


if ($_POST['action'] == "enregistrer" && isset($_POST['email']) && isset($_POST['mdp'])) 
{
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $enseignant = new Enseignant($email, $mdp);
    $enseignant->insert();
    // Redirection
    header('Location: ../pages/accueilProfesseur.html');    
} 

else if ($_POST['action'] == "authentifier" && isset($_POST['email']) && isset($_POST['mdp']))
{
    $email = $_POST['email'];
    $mdp = $_POST["mdp"];
    $enseignant = new Enseignant($email, $mdp);
    $enseignant->valider($email, $mdp);
} else {
    echo "Vide";
}


?>
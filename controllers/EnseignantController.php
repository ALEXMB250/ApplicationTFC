<?php
session_start();

require "../models/EnseignantModel.php";

// enregistrer le professeur

if ($_POST['action'] == "enregistrer" && isset($_POST['email']) && isset($_POST['mdp'])) 
{
    $id = uniqid("EA_");
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $enseignant = new Enseignant($id, $email, $mdp);
    $enseignant->insert();
    $_SESSION['id_enseignant'] = $id;
    // Redirection
    header('Location: ../pages/accueilProfesseur.html');    
} 

// authentifier le professeur

else if ($_POST['action'] == "authentifier" && isset($_POST['email']) && isset($_POST['mdp']))
{
    $email = $_POST['email'];
    $mdp = $_POST["mdp"];
    $id = Enseignant::valider($email, $mdp);
    if($id != null) {
        $_SESSION["enseignant_id"] = $id;
        header('Location: ../pages/accueilProfesseur.html');
    }
    else{
        echo "Login ou mot de passe incorrecte </br>";
        echo "<a href='../pages/connecterProfesseur.php'>Page d'accueil</a>";
    }
} 


?>
<?php
session_start();

require "../models/TPModel.php";

// enregistrer le TP


$_POST['enseignant'] = 1;

if (isset($_POST['date_debut']) && isset($_POST['heure_debut']) &&
    isset($_POST['date_fin']) && isset($_POST['heure_fin']) &&
    isset($_POST['cours']) && isset($_POST['enseignant']) &&
    isset($_POST['duree']) ) {
    
    $date_debut = $_POST['date_debut'];
    $heure_debut = $_POST['heure_debut'];
    $date_fin = $_POST['date_fin'];
    $heure_fin = $_POST['heure_fin'];
    $cours = $_POST['cours'];
    $enseignant = $_POST['enseignant'];
    $duree = $_POST['duree'];

    $enseignant_id = $_SESSION["enseignant_id"];

    $tp = new TP($date_debut, $heure_debut, $date_fin, $heure_fin, $duree, $cours, $enseignant_id);
    $tp->insert();
    
}

// authentifier le professeur

else if (isset($_POST['email']) && isset($_POST['mdp']))
{
    $email = $_POST['email'];
    $mdp = $_POST["mdp"];
    $enseignant = new Enseignant($email, $mdp);
    $enseignant->valider($email, $mdp);
} else {
    echo "Vide";
}


?>
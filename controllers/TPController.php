<?php
session_start();

require "../models/TPModel.php";

// enregistrer le TP

if (isset($_POST['date_debut']) && isset($_POST['heure_debut']) &&
    isset($_POST['date_fin']) && isset($_POST['heure_fin']) &&
    isset($_POST['cours'])  && isset($_POST['duree']) ) 
    {
        $id = uniqid("TP_");
        $date_debut = $_POST['date_debut'];
        $heure_debut = $_POST['heure_debut'];
        $date_fin = $_POST['date_fin'];
        $heure_fin = $_POST['heure_fin'];
        $cours = $_POST['cours'];
        $duree = $_POST['duree'];
        $enseignant_id = $_SESSION["enseignant_id"];

        $tp = new TP($id, $date_debut, $heure_debut, 
                     $date_fin, $heure_fin, $duree, 
                     $cours, $enseignant_id);
        $tp->insert();
        $_SESSION["tp_id"] = $id;
        // Redirection
        header('Location: ../pages/ComposerQuestionnaire.html');

    }

    else{
        echo'<h3 style="color:red">Une Erreur est survenu sur TPController.php</h3>';
    }


?>
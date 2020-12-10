<?php
    require "../models/ApprenantModel.php";
    session_start();


    // envoyer les donnees 

    if ($_POST['action'] == "ajouter" && isset($_POST['apprenant']['email']) && isset($_POST['apprenant']['mdp'])) 
    {
        $email = $_POST['apprenant']['email'];
        $mdp = $_POST['apprenant']['mdp'];
        $tp_id = $_SESSION['tp_id'];
        
// $apprenant = new Apprenant("gloire@gmail.com", "1234", null, "TP_15efda"); 
        
        $apprenant = new Apprenant($email, $mdp, null, $tp_id);
        $apprenant->insert();

    }

    else if ($_POST['action'] == "supprimer" && isset($_POST['question'])) 
    {
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $enseignant = new Enseignant($email, $mdp);
        $enseignant->insert();
        // Redirection
        header('Location: ../pages/accueilProfesseur.html');    
    }

    else 
    {
        echo "<p style=\"color:red;\">Problème au niveau de la question... QuestionController.php </p>";  
    }
?>
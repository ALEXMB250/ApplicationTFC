<?php
    require "../models/QuestionModel.php";

    // $id = $_POST["question"]["id"];
    // $enonce = $_POST["question"]["question"];
    // $assertion = $_POST["question"]["assertion"]["0"];
    // $action = $_POST["action"];
    // $reponse = $_POST["question"]["reponse"];

    // envoyer les donnees 

    if ($_POST['action'] == "ajouter" && isset($_POST['question']['question']) && isset($_POST['question']['reponse'])) 
    {
        $id = $_POST["question"]["id"];
        $enonce = $_POST["question"]["question"];
        $assertion_count = count($_POST["question"]["assertion"]);

        $tp_id = 1;
        

        if ($assertion_count == 1) 
        {
            $type = "question/reponse";
            $quest = new Question($id, $type, $enonce, $tp_id);
            $quest->insert();
            
        } 
        else if ($assertion_count > 1)
        {
            $type = "assertion";
            echo "assertion";
        } 
        else
        {
           echo "rien";
        }

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
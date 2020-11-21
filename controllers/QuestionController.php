<?php
    require "../models/QuestionModel.php";
    require "../models/AssertionModel.php";
    require "../models/ReponseModel.php";
    session_start();

    // envoyer les donnees 

    if ($_POST['action'] == "ajouter" && isset($_POST['question']['question']) && isset($_POST['question']['reponse'])) 
    {
        $id = $_POST["question"]["id"];
        $enonce = $_POST["question"]["question"];
        $reponse = $_POST["question"]["reponse"];
        $assertion_count = count($_POST["question"]["assertion"]);

        $tp_id = $_SESSION['tp_id'];
        

        if ($assertion_count == 1) 
        {
            $type = "Question/reponse";
            $quest = new Question($id, $type, $enonce, $tp_id);
            $assertion = new Assertion($enonce, $id);
            $rep = new Reponse($reponse, $id);

            $quest->insert();
            $assertion->insert();
            $rep->insert();
        } 
        else if ($assertion_count > 1)
        {
            $type = "Assertion";
            $assertions = $_POST["question"]["assertion"];
            $quest = new Question($id, $type, $enonce, $tp_id);
            $rep = new Reponse($reponse, $id);

            $quest->insert();
            $rep->insert();
            foreach($assertions as $enonce){
                $assertion = new Assertion($enonce, $id);
                $assertion->insert();
            }
            

        } 
        else
        {
           echo "<h3 style=\"color:red;\">Erreur a la page QuestionContoller.php</h3>";
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
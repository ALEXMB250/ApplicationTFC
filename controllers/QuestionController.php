<?php
    require "../models/QuestionModel.php";
    require "../models/AssertionModel.php";
    session_start();

    // envoyer les donnees 

    if ($_POST['action'] == "ajouter" && isset($_POST['question']['question']) && isset($_POST['question']['reponse'])) 
    {
        $id = $_POST["question"]["id"];
        $enonce = $_POST["question"]["question"];
        $assertion_count = count($_POST["question"]["assertion"]);

        $tp_id = $_SESSION['tp_id'];
        

        if ($assertion_count == 1) 
        {
            $type = "Question/reponse";
            echo $type ." ---> " .$enonce. " ---> " .$id;

            $quest = new Question($id, $type, $enonce, $tp_id);
            $quest->insert();

            $assertion = new Assertion($enonce, $id);
            $assertion->insert();
        } 
        else if ($assertion_count > 1)
        {
            $type = "Assertion";
            $assertions = $_POST["question"]["assertion"];

            // $quest = new Question($id, $type, $enonce, $tp_id);
            // $quest->insert();

            foreach($assertions as $element){
                echo $element. "<br>";
            }
            
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
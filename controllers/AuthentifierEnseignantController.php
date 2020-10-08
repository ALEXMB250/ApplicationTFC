<?php

require "../models/EnseignantModel.php";

if(isset($_POST)) {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $enseignant = new Enseignant($email, $mdp);
    $enseignant->valider($email, $mdp);
    // if($response == true){
    //     // echo 'true '+ $response;
    //     header('Location: ../pages/inviterApprenant.html');
    // }else{
    //     // echo 'false'+ $response;
    //     header('Location: ../pages/connecterProfesseur.php');
    // }
    
}



?>
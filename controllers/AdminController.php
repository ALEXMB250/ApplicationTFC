<?php

require "../models/AdminModel.php";

// authentifier le professeur

if (isset($_POST['login']) && isset($_POST['mdp']))
{
    $login = $_POST['login'];
    $mdp = $_POST["mdp"];
    $id = Admin::valider($login, $mdp);

    if($id != null) {
        echo "<h1>Mot de passe correct</h1>";
        // header('Location: ../pages/accueilProfesseur.html');
    }
    else{
        echo "Login ou mot de passe incorrecte </br>";
        echo "<a href='../pages/connecterProfesseur.php'>Page d'accueil</a>";
    }
} 


?>
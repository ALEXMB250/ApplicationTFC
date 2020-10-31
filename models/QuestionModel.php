<?php

require "ConnexionBD.php";


class Question {
    private $id;
    private $type;
    private $enonce;

    public function __construct($email, $mdp) {
        $this->email = $email;
        $this->mdp = $mdp;
    }

    

    public function insert() {
        $connexion = Connexion::getConnexion();
        $requete = sprintf("INSERT INTO enseignant(email, mdp) VALUES('%s', '%s')", $this->email, $this->mdp);
        $result = $connexion-> prepare($requete);
        $result->execute();
    }

    public function valider($email, $mdp) {
        $connexion = Connexion::getConnexion();
        $reponse = $connexion->query('SELECT email, mdp FROM enseignant');
        while($donnees = $reponse->fetch()){
            if($_POST['email'] == $donnees['email'] AND $_POST['mdp'] == $donnees['mdp']){
                $utisateur = $donnees['email'];
                $mdp = $donnees['mdp'];
            }
        }
        if(isset($utisateur) AND isset($mdp)){
            header('Location: ../pages/accueilProfesseur.html');
        }
        else{
            echo "Login ou mot de passe incorrecte </br>";
            echo "<a href='../pages/connecterProfesseur.php'>Page d'accueil</a>";
        }
        $reponse->closeCursor();
    }

    


}


?>
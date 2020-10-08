<?php

class Enseignant {
    private $id;
    private $email;
    private $mdp;

    public function __construct($email, $mdp) {
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function insert() {
        $connexion = new PDO('mysql:host=localhost;dbname=applicationtfc', "root", "");
        $requete = sprintf("INSERT INTO enseignant(email, mdp) VALUES('%s', '%s')", $this->email, $this->mdp);
        $result = $connexion-> prepare($requete);
        $result->execute();
    }

    public function valider($email, $mdp) {
        $connexion = new PDO('mysql:host=localhost;dbname=applicationtfc', "root", "");
        $reponse = $connexion->query('SELECT email, mdp FROM enseignant');
        while($donnees = $reponse->fetch()){
            if($_POST['email'] == $donnees['email'] AND $_POST['mdp'] == $donnees['mdp']){
                $utisateur = $donnees['email'];
                $mdp = $donnees['mdp'];
            }
        }

        //utilisateur est enregistre 
        if(isset($utisateur) AND isset($mdp)){
            header('Location: ../pages/inviterApprenant.html');
        }
        //utilisateur non enregistre
        else{
            echo "Login ou mot de passe incorrecte </br>";
            echo "<a href='../pages/connecterProfesseur.html'>Page d'accueil</a>";
        }
        $reponse->closeCursor();
    }


}


?>
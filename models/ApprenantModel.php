<?php

class Apprenant {
    private $id_prof;
    private $email;
    private $mdp;

    public function __construct($email, $mdp, $id_prof) {
        $this->email = $email;
        $this->mdp = $mdp;
        $this->id_prof = $id_prof;
    }

    public function insert() {
        $connexion = new PDO('mysql:host=localhost;dbname=applicationtfc', "root", "");
        $requete = sprintf("INSERT INTO apprenant(email, mdp, id ) VALUES('%s', '%s')", $this->email, $this->mdp);
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
        if(isset($utisateur) AND isset($mdp)){
            header('Location: ../pages/inviterApprenant.html');
        }
        else{
            echo "Login ou mot de passe incorrecte </br>";
            echo "<a href='../pages/connecterProfesseur.html'>Page d'accueil</a>";
        }
        $reponse->closeCursor();
    }


}


?>
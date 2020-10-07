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

}


?>
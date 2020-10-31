<?php

require "ConnexionBD.php";


class Enseignant {
    private $id;
    private $email;
    private $mdp;

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
        $query = sprintf("SELECT id FROM enseignant WHERE email='%s' AND mdp = '%s'", $email, $mdp);
        $reponse = $connexion->query($query);

        $id = null;

        if($data = ($reponse->fetch(PDO::FETCH_ASSOC))) {
            $id = $data["id"];
        }
        $reponse->closeCursor();
        return $id;
    }

    public static function getEnseignantByid($enseignant_id)
    {
        $connexion = Connexion::getConnexion();
        $reponse = $connexion->prepare('SELECT * FROM enseignant WHERE id= ?');
        $reponse->execute(array($enseignant_id));
        $data = $reponse -> fetch(PDO::FETCH_ASSOC);
        $reponse->closeCursor();
        return $data;
    }

}

$ens = new Enseignant("g@g.co", "123");
$ens->getEnseignantByid(8);


?>
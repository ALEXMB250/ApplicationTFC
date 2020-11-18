<?php

require "ConnexionBD.php";


class Enseignant {
    private $id;
    private $email;
    private $mdp;

    public function __construct($id, $email, $mdp) {
        $this->id = $id;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function insert() {

        $data = array(
            $this->id,
            $this->email,
            $this->mdp
        );

        $connexion = Connexion::getConnexion();
        $requete = "INSERT INTO enseignant(id, email, mdp) VALUES(?,?,?)";
        $result = $connexion-> prepare($requete);
        $result-> execute($data);
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


?>
<?php

require "ConnexionBD.php";


class Question {
    private $id;
    private $type;
    private $enonce;
    private $tp_id;

    public function __construct($id, $type, $enonce, $tp_id) {
        $this->id = $id;
        $this->type = $type;
        $this->enonce = $enonce;
        $this->tp_id = $tp_id;
    }

    

    public function insert() {

        $data = array(
            $this->id,
            $this->type,
            $this->enonce,
            $this->tp_id
        );

        $connexion = Connexion::getConnexion();
        $requete = "INSERT INTO question(`id`, `type`, `enonce`, `tp_id`)
                    VALUES(?,?,?,?)";
        $result = $connexion->prepare($requete);
        $result->execute($data);
    }

    public function supprimer($id) {
        $connexion = Connexion::getConnexion();
        $requete = $connexion->prepare("DELETE FROM `question` WHERE id=?");
        $result->execute(array($id));
    }

}


?>
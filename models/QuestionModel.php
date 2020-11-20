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

        $con = Connexion::getConnexion();
        $requete = "INSERT INTO question(`id`, `type`, `enonce`, `tp_id`)
                    VALUES(?,?,?,?)";
        $result = $con->prepare($requete);
        $result->execute($data);
    }

    public function supprimer($id) {
        $con = Connexion::getConnexion();
        $requete = $con->prepare("DELETE FROM `question` WHERE id=?");
        $result->execute(array($id));
    }

}

// $question = new Question("Question/reponse", "Quelle est la date de creation du Web ?", "TP_5fb5a2059e97");
// $question->insert();

?>
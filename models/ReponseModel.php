<?php

// require "ConnexionBD.php";



class Reponse {
    private $id;
    private $reponse;
    private $question_id;

    public function __construct($reponse, $question_id) {
        $this->id = uniqid("Q_");
        $this->reponse = $reponse;
        $this->question_id = $question_id;
    }

    public function insert() {

        $data = array(
            $this->id,
            $this->reponse,
            $this->question_id
        );

        $con = Connexion::getConnexion();
        $result = $con-> prepare("INSERT INTO reponse(id, reponse, question_id) VALUES (?,?,?)");
        $result->execute($data);
        
    }

}
    $rep = new reponse("1930", "1605818095741");
    $rep->insert();
    


?>
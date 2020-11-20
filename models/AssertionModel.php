<?php

// require "ConnexionBD.php";


class Assertion {
    private $id;
    private $assertion;
    private $question_id;

    public function __construct($assertion, $question_id) {
        $this->id = uniqid("AS_");
        $this->assertion = $assertion;
        $this->question_id = $question_id;
    }

    public function insert() {

        $data = array(
            $this->id,
            $this->assertion,
            $this->question_id
        );

        $con = Connexion::getConnexion();
        $result = $con-> prepare("INSERT INTO assertion(id, assertion, question_id) VALUES (?,?,?)");
        $result->execute($data);
        
    }

}
    // $assert = new Assertion("1930", "Q_5fb6d1442c89f");
    // $assert->insert();
    


?>
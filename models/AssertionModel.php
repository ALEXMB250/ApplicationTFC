<?php

require "ConnexionBD.php";


class Assertion {
    private $assertion;
    private $question_id;

    public function __construct($assertion, $question_id) {
        $this->assertion = $assertion;
        $this->question_id = $question_id;
    }

    

    public function insert() {
        $connexion = Connexion::getConnexion();
        // INSERT INTO `assertion` (`id`, `assertion`, `question_id`) VALUES (NULL, 'felix', '1');
        $result = $connexion-> prepare("INSERT INTO assertion(assertion, question_id) VALUES (?,?)");
        $result->execute(array($this->assertion, $this->question_id));
    }

}
    $assert = new Assertion("felix", 5);
    $assert->insert();
    


?>
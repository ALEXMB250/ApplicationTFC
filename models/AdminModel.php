<?php

require "ConnexionBD.php";


class Admin {
    private $id;
    private $login;
    private $mdp;

    public function __construct($id, $login, $mdp) {
        $this->id = $id;
        $this->login = $login;
        $this->mdp = $mdp;
    }

    public static function valider($login, $mdp) {
        $connexion = Connexion::getConnexion();
        $query = sprintf("SELECT id FROM admin WHERE `login`='%s' AND mdp = '%s'", $login, $mdp);
        $reponse = $connexion->query($query);

        $id = null;

        if($data = ($reponse->fetch(PDO::FETCH_ASSOC))) {
            $id = $data["id"];
        }
        $reponse->closeCursor();
        return $id;
    }
}


?>
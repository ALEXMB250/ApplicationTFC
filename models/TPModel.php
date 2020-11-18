<?php

require "ConnexionBD.php";


class TP {
    private $date_debut;
    private $heure_debut;
    private $date_fin;
    private $heure_fin;
    private $duree;
    private $cours;
    private $enseignant_id;

    public function __construct($date_debut, $heure_debut, $date_fin, $heure_fin, $duree, $cours, $enseignant_id) {
        $this->date_debut = $date_debut ." ". $heure_debut;
        $this->date_fin = $date_fin ." ". $heure_fin;
        $this->duree = $duree;
        $this->cours = $cours;
        $this->enseignant_id = $enseignant_id;
    }

    public function insert() {
        $connexion = Connexion::getConnexion();
        $data = array(
            $this->date_debut, 
            $this->date_fin, 
            $this->duree, 
            $this->cours, 
            $this->enseignant_id
        );

        $requete = "INSERT INTO tp(date_debut, date_fin, duree, cours, enseignant_id)
                    VALUES(?, ?, ?, ?, ?)";
        $result = $connexion-> prepare($requete);
        $result->execute($data);
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
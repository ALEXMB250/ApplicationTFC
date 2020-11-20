<?php

require "ConnexionBD.php";


class TP {
    private $id;
    private $date_debut;
    private $heure_debut;
    private $date_fin;
    private $heure_fin;
    private $duree;
    private $cours;
    private $enseignant_id;

    public function __construct($id, $date_debut, $heure_debut, $date_fin, $heure_fin, $duree, $cours, $enseignant_id) {
        $this->id = $id;
        $this->date_debut = $date_debut ." ". $heure_debut;
        $this->date_fin = $date_fin ." ". $heure_fin;
        $this->duree = $duree;
        $this->cours = $cours;
        $this->enseignant_id = $enseignant_id;
    }

    public function insert() {
        $connexion = Connexion::getConnexion();
        $data = array(
            $this->id,
            $this->date_debut, 
            $this->date_fin, 
            $this->duree, 
            $this->cours, 
            $this->enseignant_id
        );

        $requete = "INSERT INTO tp(id, date_debut, date_fin,
                    duree, cours, enseignant_id)
                    VALUES(?, ?, ?, ?, ?, ?)";
        $result = $connexion-> prepare($requete);
        $result->execute($data);
    }

}


?>
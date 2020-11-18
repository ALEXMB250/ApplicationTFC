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

        // echo "INSERT INTO tp(id, date_debut, date_fin,
        //                 duree, cours, enseignant_id) 
        //                 VALUES(" .$data[0]. "," .$data[1] 
        //                       ."," .$data[2]. "," .$data[3]
        //                       ."," .$data[4]. "," .$data[5]
        //                       .")";

        // INSERT INTO `tp` (`id`, `date_debut`, `date_fin`,
        //  `duree`, `cours`, `enseignant_id`) 
        // VALUES ('TP_15efda', '2020-11-18 15:07:30', '2020-11-18 16:07:30', 
        // '20', 'java', 'EA_5fb5913d0408');

        // $requete = "INSERT INTO enseignant(id, email, mdp) VALUES(?,?,?)";
        // $result = $connexion-> prepare($requete);
        // $result-> execute($data);

        $requete = "INSERT INTO tp(id, date_debut, date_fin,
                    duree, cours, enseignant_id)
                    VALUES(?, ?, ?, ?, ?, ?)";
        $result = $connexion-> prepare($requete);
        $result->execute($data);
    }

}


?>
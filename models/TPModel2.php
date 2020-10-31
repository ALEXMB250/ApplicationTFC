<?php

class TP {
    private $date_debut;
    private $date_fin;
    private $duree;
    private $cours;
    private $enseignant;

    public function __construct($date_debut, $date_fin, $duree, $cours, $enseignant){
        echo "Voici le constructeur";
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->duree = $duree;
        $this->cours = $cours;
        $this->enseignant = $enseignant;
    }

    public function afficher(){
        echo "Le tp est configure du ". $this->date_debut 
        . " jusqu'au ". $this->date_fin 
        . " de ". $this->duree ." minute dans le cours de ". $this->cours 
        . " donné par " . $this->enseignant;
    }

    public function insert(){
        $connexion = new PDO("mysql:host=localhost;dbname=ApplicationTFC", "root", "");

        $req = $connexion->prepare(
            "INSERT INTO tp (date_debut, date_fin, duree, cours, enseignant_id) VALUES (?,?,?,?,?);"
        );

        $data = array(
            $this->date_debut,
            $this->date_fin, 
            $this->duree,
            $this->cours, 
            $this->enseignant
        );

        
    // INSERT INTO `tp` (`date_debut`, `date_fin`, `duree`, `cours`, `enseignant_id`) 
    // VALUES ('2020-10-29 17:02:54', '2020-10-29 23:02:54', '15', 'jee', '12');

        $req->execute($data);

        
    }

}

$tp1 = new TP("2020-10-29 17:02:54", "2020-10-29 23:02:54", 30, "JEE", 1);
echo "<br>";
$tp1->afficher();
$tp1->insert();

?>
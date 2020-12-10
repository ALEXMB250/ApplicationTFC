<?php

require "ConnexionBD.php";


class Enseignant {
    private $id;
    private $email;
    private $mdp;

    public function __construct($id, $email, $mdp) {
        $this->id = $id;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function insert() {

        $data = array(
            $this->id,
            $this->email,
            md5($this->mdp)
        );

        $connexion = Connexion::getConnexion();
        $requete = "INSERT INTO enseignant(id, email, mdp) VALUES(?,?,?)";
        $result = $connexion-> prepare($requete);
        $result-> execute($data);
    }

    public static function valider($email, $mdp) {
        $connexion = Connexion::getConnexion();
        $query = sprintf("SELECT id FROM enseignant WHERE email='%s' AND mdp = '%s'", $email, md5($mdp));
        $reponse = $connexion->query($query);

        $id = null;

        if($data = ($reponse->fetch(PDO::FETCH_ASSOC))) {
            $id = $data["id"];
        }
        $reponse->closeCursor();
        return $id;
    }

    public static function getEnseignantByid($enseignant_id)
    {
        $connexion = Connexion::getConnexion();
        $query = sprintf("SELECT 
        enseignant.email as email, tablename.ID_TP as id_tp, tablename.Nombre_apprenant as nombre_apprenant 
        FROM 
        (SELECT 
            tp.id as ID_TP, count(apprenant.id) as Nombre_Apprenant, tp.enseignant_id as ID_Enseignant 
            FROM tp inner join apprenant on tp.id = apprenant.tp_id GROUP BY tp.id) as tablename 
            INNER JOIN enseignant on tablename.ID_Enseignant = enseignant.id WHERE enseignant.id = '%s'", $enseignant_id);

        $reponse = $connexion->prepare($query);
        $reponse -> execute();

        $datas = $reponse->fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>".var_dump($datas)."</pre>";

    }

}
    $id = 'EA_5fb5913d0408';
    $data = Enseignant::getEnseignantByid($id);
?>
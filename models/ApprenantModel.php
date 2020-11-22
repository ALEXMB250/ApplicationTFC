<?php

require "ConnexionBD.php";

class Apprenant {
    private $id;
    private $email;
    private $mdp;
    private $point;
    private $tp_id;

    public function __construct($email, $mdp, $point, $tp_id) {
        $this->id = uniqid("AP_");
        $this->email = $email;
        $this->mdp = $mdp;
        $this->point = $point;
        $this->tp_id = $tp_id;
    }

    public function insert() {
        $con = Connexion::getConnexion();
        $data = array(
            $this->id,
            $this->email,
            $this->mdp,
            $this->point,
            $this->tp_id
        );

        $requete = "INSERT INTO apprenant(id, email, mdp, `point`, tp_id) VALUES(?,?,?,?,?)";
        $resultat = $con->prepare($requete);
        $resultat->execute($data);        
    }

    public function valider($email, $mdp) {
        // $connexion = new PDO('mysql:host=localhost;dbname=applicationtfc', "root", "");
        $reponse = $connexion->query('SELECT email, mdp FROM enseignant');
        while($donnees = $reponse->fetch()){
            if($_POST['email'] == $donnees['email'] AND $_POST['mdp'] == $donnees['mdp']){
                $utisateur = $donnees['email'];
                $mdp = $donnees['mdp'];
            }
        }
        if(isset($utisateur) AND isset($mdp)){
            header('Location: ../pages/inviterApprenant.html');
        }
        else{
            echo "Login ou mot de passe incorrecte </br>";
            echo "<a href='../pages/connecterProfesseur.html'>Page d'accueil</a>";
        }
        $reponse->closeCursor();
    }


}

// $apprenant = new Apprenant("gloire@gmail.com", "1234", null, "TP_15efda"); 
// $apprenant->insert();
// ("1234","gloire@gmail.com","1234",null,"TP_15efda");

?>
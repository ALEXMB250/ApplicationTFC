<?php

    //

    define("DBNAME","mysql:host=localhost;dbname=ApplicationTFC");
    define("SERVEURNAME", "root");
    define("MOTDEPASSE", "");

    class Connexion {

        public static function getConnexion(){
            return new PDO(DBNAME, SERVEURNAME, MOTDEPASSE);
        }

    }


?>
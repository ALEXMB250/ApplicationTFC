<?php

    class Connexion {

        // CONSTANTES

        const DNSNAME = "mysql:host=localhost;dbname=ApplicationTFC";
        const SERVEURNAME = "root";
        const MOTDEPASSE = "";

        // METHODE DE CONNEXION A LA BASE DE DONNEES

        public static function getConnexion(){
            return new PDO(self::DNSNAME, self::SERVEURNAME, self::MOTDEPASSE);
        }

    }


?>
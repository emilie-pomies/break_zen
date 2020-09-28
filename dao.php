<?php

// 
require_once '../controller/model.php';


class DAO

{
    //On se connecte une seule fois à la BDD pour toute l’application 
    //une seule connexion autorisée
    private static $_connect = null;

    // Fonction de connexion
    public static function getConnection()
    {
        //s’il n’y a pas de connexion en cours, je peux me connecter
        if(self::$_connect==null)
        {
            //j'affecte une nouvelle valeur en instanciant ma variable 
            //avec le nom et le pwd
            // + un tableau d’erreur php 
            self::$_connect = new PDO(DB_CONNEXION, DB_USERNAME, DB_PASSWORD, array(PDO:: ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
        }
        //Si tout est ok je me connecte
        return self::$_connect;
    }

    //Fonction pour fermer la session  
    public function __destruct()
    {
        //Pour fermer la session, j’affecte une valeur null à ma variable. 
        // on fait une "remise à 0".   
        self::$_connect=null;
    }   
}


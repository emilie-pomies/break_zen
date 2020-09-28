<?php


class DAO
{
    private static $_connect = null;//connection à la bdd , une seule fois pour toute l'appli

    public static function getConnection()
    {
        if(self::$_connect==null)
        {
            self::$_connect = new PDO(DB_CONNEXION, DB_USERNAME, DB_PASSWORD, array(PDO:: ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
        }
        return self::$_connect;
    }

    public function __destruct()
    {
        self::$_connect=null;//ferme la session
    }   
}
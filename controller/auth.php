<?php

require_once "../dao.php";


class Auth
{
    static function isLogged()
    {// on verifie si l'utilisateur est loger
        if(isset($_SESSION['Auth'])//on verifie que le tableau de $_SESSION contient Auth
         && isset($_SESSION['Auth']['login'])//on verifie que le tableau  Auth contient le login
          && isset($_SESSION['Auth']['pass']))//on verifie que le tableau  Auth contient le mot depasse
        {
             extract($_SESSION['Auth']);//on extrait les données du tableau Auth

             //Connexion à la bdd
             $lBdd = DAO::getConnection();
             $lBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $lBdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
             $lRes = $lBdd->query("SELECT id FROM users WHERE login='$login' AND password='$pass'" );
             $etat = $lRes->rowCount();
         
        
             if($etat>0)
             {
                return true;// la personne est bien loger
            }
            else
            {
                return false;// la personne n'est bien loger correctement
            }
        }
    }
}


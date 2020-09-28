<?php

require_once "dao.php";

// définition de constantes pour la connexion à la base de données 
DEFINE("SERVEUR", "localhost");
DEFINE("PORT", "3308");
DEFINE("DATABASE", "user_students");
DEFINE("DB_USERNAME", "User_students");
DEFINE("DB_PASSWORD", "user1907!");
DEFINE("DB_CONNEXION", "mysql:host=".SERVEUR.":".PORT.";dbname=".DATABASE);

class Eleve
{
    public $Nom;
    public $Prenom;
    public $Photo;
    public $Description;
    public $MotDePasse;

}




// Récupère tout les utilisateurs répondant au filtre $pFilter
function getAllUsers($pFilter)
{
    try 
    {
    // Rempli un tableau avec les résultats positifs, et retourne ce tableau 
    $lTrombi = [];
        
    $lBdd = DAO::getConnection();
    $lRes = $lBdd->query("SELECT * from personne WHERE Nom LIKE '%$pFilter%' OR  Prenom LIKE '%$pFilter%' ");
    $lRes->setFetchMode(PDO::FETCH_CLASS, 'Eleve');
    $lTrombi=array();
    while($lObject=$lRes->fetchObject())
    {
        $lTrombi[]=$lObject;
    }
        
      

        // requête à la BDD avec le filtre sur le nom et prénom
        // foreach($lBdd->query("SELECT * from personne WHERE Nom LIKE '%$pFilter%' OR  Prenom LIKE '%$pFilter%' ") as $row) 
        // {
        //     // on rempli le tableau
        //     array_push($lTrombi, $row);
        // }
        // //déconnexion
        // $lBdd = null;
    } 
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }

    // le tableau (complet, semi-rempli ou vide)
    return  $lTrombi;
}

// Vérification de la validité des informations
function insertIntoDB($pName, $pFirstname, $pPhoto, $pDescription, $pPwd)
{
    try 
    {
        //$lBdd = new PDO(DB_CONNEXION, DB_USERNAME, DB_PASSWORD);
        $lBdd = DAO::getConnection();
        // Hachage du mot de passe
        $lPassHash = password_hash($pPwd, PASSWORD_DEFAULT);

        // Insertion en passant des paramètres
        $lRequete = $lBdd->prepare('INSERT INTO personne(Nom, Prenom, Photo, MotDePasse, Description) 
                                  VALUES(:name, :firstname, :photo, :pass, :description)');
        $lRequete->execute(array(
            'name' => $pName,
            'firstname' => $pFirstname,
            'photo' => $pPhoto,
            'pass' => $lPassHash,
            'description' => $pDescription));
        $lBdd = NULL;
    } 
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }

    return true;
}

// Retourne le mot de passe ou FAUX si pas trouvé
function getPassword($pLogin)
{
    try 
    {
        //Connexion à la bdd
        //$lBdd = new PDO(DB_CONNEXION, DB_USERNAME, DB_PASSWORD);
        $lBdd = DAO::getConnection();
        // Récupération du login et du mot de passe associé
        $lRequete = $lBdd->prepare('SELECT Nom, MotDePasse, Prenom FROM personne WHERE Prenom = :login'); 
        $lRequete->execute(array('login' => $pLogin));

        $lRes = $lRequete->fetch();
        $lBdd = NULL;
        return $lRes;
    } 
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }

    return false;
}


<?php

require_once "../dao.php";
require_once "../controller/model.php";
require_once "../view/view.php";
require_once "../controller/auth.php";

// définition de constantes pour la connexion à la base de données 
DEFINE("SERVEUR", "localhost");//adresse du serveur
DEFINE("PORT", "3308");// son port
DEFINE("DATABASE", "blog_breakzen");//le nom de la base de données
DEFINE("DB_USERNAME", "User_blog");//le nom de l'utilisateur
DEFINE("DB_PASSWORD", "01052020Blog!:");// son mot de passe
//on concatene les données dans une requete de connexion
DEFINE("DB_CONNEXION", "mysql:host=".SERVEUR.":".PORT.";dbname=".DATABASE);

class Article
{
    //je determine mes attribut ou propriété
    
    /**
     * @var [STRING]  $IntroId id de l'article
     */
    public $IntroId;

    /**
     * @var [string ] $IntroTitle titre de l'introduction
     */
    public $IntroTitle;

    /**
     * @var [string ] $IntroSubtitle sous-titre de l'introduction
     */
    public $IntroSubtitle;

    /**
     * @var [string ] $Author Auteur de l'article
     */
    public $Author;

    /**
     * @var [string ] $Author Date de l'article
     */
    public $Date;

    /**
     * @var [string ] $IntroPhoto Photo de l'introduction
     */
    public $IntroPhoto;

    /**
     * @var [string ] $Title Titre de l'article
     */
    public $Title;

    /**
     * @var [string ] $Content Contenu de l'article
     */
    public $Content;

    /**
     * @var [string ] $ArticlePhoto Photo de l'article
     */
    public $ArticlePhoto;
}

class Users
{
    //je determine mes attribut ou propriété
    
    /**
     * @var [STRING]  $Id id de l'utilisateur
     */
    public $Id;

    /**
     * @var [string ] $Login le login de l'utilisateur
     */
    public $Login;

    /**
     * @var [string ] $Password le mot de passe de l'utilisateur
     */
    public $Password;
}

//fonction qui recupère toutes les introductions des articles
function getAllIntroArticles()
{
    //Try: le bloc try contient le code qui peut potentiellement lever une exception. 
    //Tout le code du bloc try est exécuté jusqu'à ce qu'une exception soit potentiellement levée.
    
    try 
    {
    // Rempli un tableau avec les résultats, et retourne ce tableau 
    $lIntroArticles = [];

    //connexion à la base de données   
    $lBdd = DAO::getConnection();

    //requete pour selectionner le titre de l'intro, le sous titre, l'auteur, la photo de l'intro et l'id
    $lRes = $lBdd->query("SELECT IntroTitle, IntroSubtitle, Author, Date, IntroPhoto, IntroId from article_complet LIMIT 0,5 ");
    
    // on definie le mode de recuperation avec la methode FETCHMODE
    $lRes->setFetchMode(PDO::FETCH_CLASS, 'Article');

    //on stocke les données ddans un tableau
    $lIntroArticles=array();

    //on recupere chaque données ligne par ligne et on le retourne en tant qu'objet
    while($lObject=$lRes->fetchObject())
    {
        $lIntroArticles[]=$lObject;
    }
        
    }  

    //Catch: ce bloc de code sera appelé uniquement si une exception se produit dans le bloc de code try. 
    //Le code dans votre instruction catch doit gérer l'exception qui a été levée.
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }

    // le tableau (complet, semi-rempli ou vide)
    return  $lIntroArticles; 
} 


//fonction qui recupère l'introduction d'un seul article
function getOneIntroArticles($recupIntro)
{
    try 
    {
    // Rempli un tableau avec les résultats , et retourne ce tableau 
            
    $lBdd = DAO::getConnection();
    $lRes = $lBdd->prepare("SELECT IntroTitle, IntroSubtitle, Author, Date, IntroPhoto, IntroId from article_complet WHERE introId=? ");
    $lRes->execute(array($recupIntro));
    $lRes->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $lObject=array();
    $lObject=$lRes->fetchObject();
    return $lObject;
    }  
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }

    // le tableau (complet, semi-rempli ou vide)
    
} 


////fonction qui recupère le titre, le contenu et la photo d'un seul article
function getOneArticle($recupArticle)
{
    try
    {
    // Rempli un tableau avec les résultats positifs, et retourne ce tableau 
        
    $lBdd = DAO::getConnection();
    $lBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $lBdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $lRes = $lBdd->query("SELECT IntroId , Title, Content, ArticlePhoto from article_complet WHERE  introId=$recupArticle ");
    $lRes->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $lObject=$lRes->fetchObject();
    return $lObject;
    }  
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }

    // le tableau (complet, semi-rempli ou vide)
  
} 

// //fonction qui recupère l'id, le titre est la date des articles  
function getListArticle()
{
    try 
    {
    // Rempli un tableau avec les résultats positifs, et retourne ce tableau 
    $lListArticles = [];
        
    $lBdd = DAO::getConnection();
    $lRes = $lBdd->query("SELECT IntroId, IntroTitle, Date from article_complet ");
    $lRes->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $lListArticles=array();
    while($lObject=$lRes->fetchObject())
    {
        $lListArticles[]=$lObject;
    }
        
    }  
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }

    // le tableau (complet, semi-rempli ou vide)
    return  $lListArticles; 
} 


// fonction qui permet de supprimer un article
function deleteArticle(){
    try 
    {
            $lBdd = DAO::getConnection();
            $lBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $lBdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            
}
catch (PDOException $e) 
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    return false;
}

$lRequete = $lBdd->prepare  ('DELETE FROM article_complet WHERE introId=?');
$lRequete->execute([$_GET['id']]);
    echo'ARTICLE SUPPRIMER';  
}

function getPassword()
{
    try 
    {
        if(isset($_POST)// on verifie que le login et le mot de passe sont bien envoyés
        && !empty($_POST['login']) // on verifie que le login n'est pas vide
        && !empty($_POST['pass'])// on verifie que le mot de passe n'est pas vide
    ){
        extract($_POST);//on extrait les données du tableau, on les aura en variables
        $pass = sha1($pass);//j'encrypte mon mot de passe 
        //je me connecte à ma base de données 
        //Connexion à la bdd
        $lBdd = DAO::getConnection();
        $lBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lBdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $lRes = $lBdd->query("SELECT id FROM users WHERE login='$login' AND password='$pass'" );
        $etat = $lRes->rowCount();
        print_r($etat);  
        // $result = $lRes->fetch();  
        // print_r($result);  
    
        if($etat>0){
        $_SESSION['Auth'] = array(//je stocke les données dans un tableau nommé Auth
            'login'=> $login,
            'pass'=> $pass
        );
        header('Location:creatArticles.php');
        }
        else{
            echo "Mauvais identifiants";
        }
    }
    
    } 
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }

    return false;
}

// function additionArticle(){

//     try 
//     {
//         $lBdd = DAO::getConnection();
//         $lBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $lBdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//         echo 'bien connecté';
                
//     }
//     catch (PDOException $e) 
//     {
//         print "Erreur !: " . $e->getMessage() . "<br/>";
//         return false;
//     }
//     echo 'justilise la fonction ajout darticle';

//     if((isset($_POST)))
//     {
//         extract($_POST);
//         if( !empty($titleIntro) &&
//             !empty($subtitleIntro) &&
//             !empty($author) &&
//             !empty($date) &&
//             !empty($photoIntro) &&
//             !empty($titleArticle) &&
//             !empty($editor) &&
//             !empty($photoArticle))
//         {
//             $addition=$lBdd->prepare('INSERT INTO article_complet ( IntroTitle,IntroSubtitle,
//                                                                 Author,
//                                                                 Date,
//                                                                 IntroPhoto,
//                                                                 Title,
//                                                                 Content,
//                                                                 ArticlePhoto)
//                                                             VALUES (:,?,?,?,?,?,?,?)');
//             $addition->execute([
//                     'IntroTitle'=>$titleIntro,
//                     'IntroSubtitle'=>$subtitleIntro,
//                     'Author'=>$author,
//                     'Date'=>$date,
//                     'IntroPhoto'=>$photoIntro,
//                     'Title'=>$titleArticle,
//                     'Content'=>$editor,
//                     'ArticlePhoto'=>$photoArticle,
//                     'introId'=>$_GET['id']
//             ]);
//             echo'article ajouté';

//         }
        
//     }
// }





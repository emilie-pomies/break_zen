<?php

require_once "../dao.php";


session_start();// pour stocker temporairement des elements 
// on verifie que le login et le mot de passe sont bien envoyés

displayHTMLHead();//affiche le html du head
displayNavBar();//affiche la navbar
displayHTMLHeader();//affiche le header de l'accueil 


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
    //echo  "je regarde si la personne qui cherche a se connecter est dans la bdd = ";
    //print_r($etat);  
   
    if($etat>0){
    $_SESSION['Auth'] = array(//je stocke les données dans un tableau nommé Auth
         'login'=> $login,
     'pass'=> $pass
    );
    print_r($_SESSION);
  
    header('Location:creatArticles.php');
    }
     else{
         echo "Mauvais identifiants, veuillez réessayer";
    }
    
}

loginHtml();
displayHTMLFooter();


?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method='post'>
        Login : <input type="text" name='login'/></br>
        Mot de Passe : <input type="password" name='pass'/></br>
        <input type="submit" name='Me connecter'/>
        <a href='logout.php'>Se Déconnecter</a>
    </form>
</body>
</html> -->
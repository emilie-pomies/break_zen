<?php
// Démarer la session PHP afin de véhiculer des données entre page
// qui s'autodétruiront
session_start();


# import des données et fonctions d'affichage
require_once "../view/view.php";
require_once "../controller/model.php";


// choix de l'affichage
displayHTMLHead();//affiche le html du head
displayNavBar();//affiche la navbar
displayHTMLHeader();//affiche le header de l'accueil

// affichage les intros des articles ou erreur si pas trouvé
$lFoundEntries = getAllIntroArticles();// on met toutes les intros dans une varibale, il va chercher toutes les intros 
if($lFoundEntries)
{
    displayArticles($lFoundEntries);//si c'est vrai, il affiche toutes les intros trouvées (de 1 à 5) avec la presentation correspondante
}
else
{
    displayMessage("Pas d'article enregistré.");//sinon il affiche s'il n'a pas trouvé d'intro
}

//affiche le footer 
displayHTMLFooter();

    
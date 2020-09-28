<?php

# import des données et fonctions d'affichage
require_once "../view/view.php";
require_once "../controller/model.php";
require_once "../dao.php";




// choix de l'affichage
displayHTMLHead();//affiche le html du head
displayNavBar();//affiche la navbar


//on recupere l'intro via son id 
$lFoundEntries = getOneIntroArticles($_GET['id']);// on stocke la bonne intro dans une variable
if($lFoundEntries)
{
    // s'il y a bien une intro on affiche le header correspondant
    displayHTMLHeaderArticle($lFoundEntries);
}
else
{
    // sinon on affiche un message d'erreur
    displayMessage("Pas d'intro enregistré.");
}

//on recupere l article correspondant à l id
$lEntries = getOneArticle($_GET['id']);// on stocke le bon article dans une variable
if($lEntries)
{
    //sil y a bien un article on l'affiche
    displayOneArticle($lEntries);
}
else
{
    //sinon on affiche un message d'erreur
    displayMessage("Pas d'article enregistré.");
}



//affiche le footer 
displayHTMLFooter();



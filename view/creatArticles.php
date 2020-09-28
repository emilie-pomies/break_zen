<?php

session_start();

# import des données et fonctions d'affichage
require_once "../controller/model.php";
require_once "../view/view.php";
require_once "../utils.php";
require_once "../dao.php";
require_once "../controller/auth.php";

// choix de l'affichage
displayHTMLHead();//affiche le html du head
displayNavBar();//affiche la navbar
newarticle();

// $lAdditiondEntries = additionArticle();// on met toutes les intros dans une varibale, il va chercher toutes les intros 
// if($lAdditiondEntries)
// {
//     newarticle($lAdditiondEntries);//si c'est vrai, il affiche toutes les intros trouvées (de 1 à 5) avec la presentation correspondante
// }
// else
// {
//     displayMessage("Pas d'article ajouté.");//sinon il affiche s'il n'a pas trouvé d'intro
// }


$lFoundEntries = getListArticle();// on met toutes les intros dans une varibale, il va chercher toutes les intros 
if($lFoundEntries)
{
    listArticles($lFoundEntries);//si c'est vrai, il affiche toutes les intros trouvées (de 1 à 5) avec la presentation correspondante
}
else
{
    displayMessage("Pas d'article enregistré.");//sinon il affiche s'il n'a pas trouvé d'intro
}


displayHTMLFooter();



?>
 




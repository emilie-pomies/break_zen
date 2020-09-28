<?php

session_start();

# import des données et fonctions d'affichage
require_once "../controller/model.php";
require_once "../view/view.php";
require_once "../utils.php";




// choix de l'affichage
displayHTMLHead();//affiche le html du head
displayNavBar();//affiche la navbar
displayHTMLHeader();//affiche le header de l'accueil
loginHtml();//affiche le formulaire de connexion



// Si il y a déjà un session et qu'on se retouve sur cette page, c'est que soit:
// 1: erreur d'identification
// 2: enregistrement ok, il faut maintenant s'identifier
// if(isset($_SESSION['connexion']))
// {
//     switch($_SESSION['connexion'])
//     {
//         case "registrationOK":displayMessage("Enregistrement effectué ! Veuillez vous connecter."); break;
//         case "registrationKO":displayMessage("Erreur à l'enregistrement, veuillez recommencer."); break;
//         case "badIdentifier": displayMessage("Identifiants inconnus, veuillez recommencer."); break;
//         default: break;
//     }
// }


//affiche le footer 
displayHTMLFooter();


$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !


// Finalement, on détruit la session.
session_destroy();


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
displayHTMLHeaderProjects();


displayHTMLProjects();

displayHTMLWebSites();
displayHTMLFooter();



?>
 

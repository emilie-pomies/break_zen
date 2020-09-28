<?php

session_start();

# import des données et fonctions d'affichage
require_once "../controller/model.php";
require_once "../view/view.php";
require_once "../utils.php";
require_once "../dao.php";

deleteArticle();
    
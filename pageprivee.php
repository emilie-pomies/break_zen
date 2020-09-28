<?php

session_start();

require_once "../controller/auth.php";

if (Auth::isLogged()){// si la personne est bien enregistré

}
else{//sinon on la redirige vers login.php
    header('Location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    page Privée
    <a href='logout.php'>Se Déconnecter</a>
</body>
</html>

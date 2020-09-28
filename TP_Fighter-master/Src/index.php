<?php

require_once "Controler/Utils.php";

// objectif: routing 
$lPage = "lobby";

if( exists($_REQUEST, "page") )
{
    $lPage = $_REQUEST["page"];
}

switch($lPage)
{
    case "fight": require "Controler/CombatControler.php"; break;
    case "lobby": 
    default: require "Controler/Lobby.php";
}

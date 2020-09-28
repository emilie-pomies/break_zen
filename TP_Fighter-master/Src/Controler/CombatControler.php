<?php

require_once "Model/Fighter.php";
require_once "Model/DAO.php";
require_once "Model/Combat.php";

require_once "Controler/Utils.php";
require_once "View/CombatView.php";

$lKeyPlayer1 = "Player1";
$lKeyPlayer2 = "Player2";

if( !exists($_REQUEST, $lKeyPlayer1) ||
    !exists($_REQUEST, $lKeyPlayer2) )
{
    require_once "index.php"; //error, go back to beggining     
}
else
{

$DAO = DAO::get();

$lFighter1 = $DAO->getFighter($_REQUEST[$lKeyPlayer1]);
$lFighter2 = $DAO->getFighter($_REQUEST[$lKeyPlayer2]);

$lCombat = new Combat();
$lCombat->fight($lFighter1, $lFighter2);
$lActions = $lCombat->getFightActions();

//var_dump($lActions);
$lCombatView = new CombatView();
$lCombatView->display($lActions);

}
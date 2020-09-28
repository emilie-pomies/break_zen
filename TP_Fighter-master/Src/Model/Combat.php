<?php

require_once "Model/Fighter.php";
require_once "Model/Actions/Action.php";
require_once "Model/Actions/ActionWins.php";

class Combat
{

    private $mActions = [];

    public function fight($pFighter1, $pFighter2)
    {
        $lTurn1 = $pFighter1;
        $lTurn2 = $pFighter2;
        
        while($pFighter1->getLife() > 0 && $pFighter2->getLife() > 0)
        {
            $this->mActions[] = $lTurn1->fight($lTurn2);

            //permute variables to change turn
            if ($lTurn1 === $pFighter1) 
            {
                $lTurn1 = $pFighter2;
                $lTurn2 = $pFighter1;
            }
            else
            {
                $lTurn1 = $pFighter1;
                $lTurn2 = $pFighter2;
            }
                    
        }

        $lWinner = ($pFighter1->getLife() > 0)? $pFighter1:$pFighter2;
        $this->mActions[] = new ActionWins($lWinner, $lWinner->getLife());
    }

    public function getFightActions(): array
    {
        return $this->mActions;
    }
}
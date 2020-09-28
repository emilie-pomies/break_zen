<?php

require_once "Fighter.php";
require_once "Model/Actions/ActionAttack.php";
require_once "Model/Actions/ActionMiss.php";

/**
 * 
 */
class Brute extends Fighter 
{

    /**
     * @param $pName
     */
    public function __construct(string $pName)
    {
        parent::__construct($pName);
    }

    /**
     * @param $pFighter
     */
    public function fight($pFighter):array
    {
        return parent::fight($pFighter);
    }

    public function init()
    {
        parent::init();
        $this->setForce(40);
        $this->setHitPrecision(33);
    }

}








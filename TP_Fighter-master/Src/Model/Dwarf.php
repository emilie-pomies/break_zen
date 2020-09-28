<?php

require_once "Fighter.php";
require_once "Model/Actions/ActionAttack.php";

/**
 * 
 */
class Dwarf extends Fighter {


    /**
     * @param $pName
     */
    public function __construct(string $pName)
    {
        parent::__construct($pName);
    }

    public function init()
    {
        parent::init();
        $this->setForce(10);
    }



}
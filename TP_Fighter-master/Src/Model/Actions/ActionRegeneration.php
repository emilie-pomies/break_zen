<?php

require_once "Model/Actions/Action.php";

/**
 * 
 */
class ActionRegeneration extends Action {


    /**
     * 
     */
    protected $life;

    /**
     *  constructor
     * @param $pFighter 
     * @param $pForce 
     * @param $pLife
     */
    public function __construct(Fighter $pFighter, int $pLife) {
        parent::__construct($pFighter);
        $this->setActionName("Regeneration");
        $this->life = $pLife;
    }

    /**
     * @return
     */
    public function getLife():int {
        return $this->life;
    }
}
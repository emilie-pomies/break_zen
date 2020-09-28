<?php

require_once "Model/Actions/Action.php";

/**
 * 
 */
class ActionWins extends Action {

    /**
     * 
     */
    protected $life;

    /**
     *  constructor
     * @param $pFighter 
     * @param $pLife
     */
    public function __construct(Fighter $pFighter, int $pLife) {
        parent::__construct($pFighter);
        $this->setActionName("Wins");
        $this->life = $pLife;
    }

    /**
     * @return
     */
    public function getLife():int {
        return $this->life;
    }

}
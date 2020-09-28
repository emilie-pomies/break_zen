<?php

require_once "Model/Actions/Action.php";

/**
 * 
 */
class ActionHit extends Action {

    /**
     * 
     */
    protected $force;

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
    public function __construct(Fighter $pFighter, int $pForce, int $pLife) {
        parent::__construct($pFighter);
        $this->setActionName("Hit");
        $this->force = $pForce;
        $this->life = $pLife;
    }

    /**
     * @return
     */
    public function getLife():int {
        return $this->life;
    }

    /**
     * @return
     */
    public function getForce():int {
        return $this->force;
    }


}
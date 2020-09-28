<?php

require_once "Model/Actions/Action.php";

/**
 * 
 */
class ActionAttack extends Action {

    /**
     * 
     */
    protected $receiver;

    /**
     * 
     */
    protected $force;


    /**
     *  constructor
     * @param $Fighter 
     * @param $Fighter 
     * @param $int 
     * @param $int
     */
    public function __construct(Fighter $pActor, Fighter $pReceiver,int $pForce) {
        parent::__construct($pActor);
        $this->setActionName("Attack");
        $this->receiver = $pReceiver;
        $this->force = $pForce;
    }

    /**
     * @return
     */
    public function getReceiver() {
        
        return $this->receiver;
    }

    /**
     * @return
     */
    public function getForce() {
        return $this->force;
    }
}
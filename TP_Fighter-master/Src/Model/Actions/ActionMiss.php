<?php

require_once "Model/Actions/Action.php";

/**
 * 
 */
class ActionMiss extends Action {

    /**
     * Default constructor
     */
    public function __construct(Fighter $pFighter) 
    {
        parent::__construct($pFighter);
        $this->setActionName("Miss");
    }
}
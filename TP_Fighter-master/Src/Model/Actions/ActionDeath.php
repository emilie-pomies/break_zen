<?php

require_once "Model/Actions/Action.php";

/**
 * 
 */
class ActionDeath extends Action {

    /**
     * Default constructor
     */
    public function __construct(Fighter $pFighter) 
    {
        parent::__construct($pFighter);
        $this->setActionName("Death");
    }

}
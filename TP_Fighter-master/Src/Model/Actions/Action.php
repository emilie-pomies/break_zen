<?php


require_once "Model/Fighter.php";

/**
 * 
 */
class Action {

    /**
     * 
     */
    protected $actionName;

    /**
     * 
     */
    protected $actor;

    /**
     * @param $Fighter
     */
    protected function __construct(Fighter $pFighter) {
        $this->actor = $pFighter;
        $this->setActionName("none");
        
    }

    /**
     * @return
     */
    public function getActor():Fighter {
     
        return $this->actor;
    }

    /**
     * @return
     */
    public function getActionName():string {
        return $this->actionName;
    }

    /**
     * @param $string
     */
    protected function setActionName(string $pName): void {
        $this->actionName = $pName;
    }

}
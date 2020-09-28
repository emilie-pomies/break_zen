<?php

require_once "Fighter.php";
require_once "Model/Actions/ActionHit.php";
require_once "Model/Actions/ActionRegeneration.php";

/**
 * 
 */
class Mage extends Fighter {

    protected $regeneration;


    /**
     * @param $pName
     */
    public function __construct(string $pName)
    {
        parent::__construct($pName);
    }
    
    /**
     * @param $pForce 
     * @return
     */
    public function receiveHit($pForce): array 
    {
        $lActions = [];
        parent::setLife($this->getLife()-$pForce);
        
        $lNewLife = 0;
        $lActions[] = new ActionHit($this, $pForce, $this->getLife());
        if( $this->getLife() >0 )
        {
            $lNewLife = $pForce*$this->getRegeneration();
            parent::setLife($this->getLife() + $lNewLife);
            $lActions[] = new ActionRegeneration($this, $lNewLife);  
        }
        else
        {
            if($lNewLife == 0)
            {
                $lActions[] = new ActionDeath($this);
            }
        }
        
        return $lActions;
   }

    public function init()
    {
        parent::init();
        $this->setForce(15);
        $this->setRegeneration(0.2);
        $this->setHitPrecision(66);
    }

    protected function setRegeneration($pRegeneration)
    {
        $this->regeneration = $pRegeneration;
    }

    protected function getRegeneration()
    {
        return $this->regeneration;
    }


}
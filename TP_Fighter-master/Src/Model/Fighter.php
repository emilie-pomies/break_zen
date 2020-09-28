<?php

require_once "Model/Actions/Action.php";
require_once "Model/Actions/ActionHit.php";
require_once "Model/Actions/ActionDeath.php";

/**
 * 
 */
abstract class Fighter {

    /**
     * 
     */
    private $name;

    /**
     * 
     */
    private $photo;

    /**
     * 
     */
    private $life;

    /**
     * 
     */
    private $force;

    /**
     * 
     */
    private $hitPrecision;

    protected function __construct(string $pName)
    {
        $this->name = $pName;
        $this->init();
    }

    /**
     * @param $pFighter
     */
    public function fight($pFighter): array
    {
        $lActions = [];
        $lHit = random_int(0,100);
        if($lHit <= $this->getHitPrecision())
        {
            $lNewActions = $pFighter->receiveHit($this->getForce());
            $lActions = array_merge($lActions, $lNewActions);
            $lActions[] = new ActionAttack($this, $pFighter, $this->getForce());
        }
        else
        {
            $lActions[] = new ActionMiss($this);
        }
        
        return $lActions;
    }

    /**
     * @return
     */
    public function getName() {
        
        return $this->name;
    }

    /**
     * @param $value
     */
    public function setName($value) {
        $this->name = $value;
    }

    /**
     * @return
     */
    public function getGuild() {
        return $this->guild;
    }

    /**
     * @return la photo du fighter.
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * @param $value
     */
    public function setPhoto($value) {
        $this->photo = $value;
    }

    /**
     * @return
     */
    public function getLife() {
        return $this->life;
    }

    /**
     * @param $value
     */
    protected function setLife($pNewLife) 
    {
        $lNewLife = $pNewLife;
        
        if ($pNewLife < 0) 
            $lNewLife = 0;

        $this->life= $lNewLife;
    }

    /**
     * @return
     */
    public function getForce() {
        return $this->force;
    }

    /**
     * @param $value
     */
    protected function setForce($value) {
        $this->force = $value;
    }

    /**
     * @param $pForce 
     * @return
     */
    public function receiveHit($pForce): array 
    {
        $lNewLife = $this->getLife() - $pForce;
        $this->setLife($lNewLife);
        $lActions[] = new ActionHit($this, $pForce, $lNewLife);

        if($lNewLife <= 0)
        {
            $lActions[] = new ActionDeath($this, $pForce);
        }

        return $lActions;
    }

    protected function init()
    {
        $this->setLife(100);
        $this->setHitPrecision(100);
    }

    /**
     * @return
     */
    public function getHitPrecision() {
        return $this->hitPrecision;
    }

    /**
     * @param $value
     */
    protected function setHitPrecision($value) {
        $this->hitPrecision = $value;
    }

}
<?php

require_once "Model/Brute.php";
require_once "Model/Dwarf.php";
require_once "Model/Mage.php";

class DAO 
{
    private $mFighters = [];
    private static $mDAO = null;

    private function __construct()
    {
        // could be done in a database

        //Declare fighters
        $lBrutus = new Brute("Brutus");
        $lBrutus->setPhoto("images/brutus.gif");

        $lMerlin = new Mage("Merlin");
        $lMerlin->setPhoto("images/merlin.png");

        $lTyrion = new Dwarf("Tyrion");
        $lTyrion->setPhoto("images/dwarf.jpg");

        $lMerlin2 = new Mage("JeanDalf");
        $lMerlin2->setPhoto("Images/jeandalf.png");

        $lGimli = new Dwarf("Soleil du matin");
        $lGimli->setPhoto("Images/gimli.png");

        $this->mFighters[$lBrutus->getName()] = $lBrutus;
        $this->mFighters[$lMerlin->getName()] = $lMerlin;
        $this->mFighters[$lTyrion->getName()] = $lTyrion;
        $this->mFighters[$lMerlin2->getName()] = $lMerlin2;
        $this->mFighters[$lGimli->getName()] = $lGimli;
        
    }

    public static function get(): DAO // singleton pattern
    {
        if (DAO::$mDAO == null)
        {
            DAO::$mDAO = new DAO(); 
        }

        return DAO::$mDAO;
    }

    public function getFighter(string $pName)
    {
        if (array_key_exists($pName, $this->mFighters) )
        {
            return $this->mFighters[$pName];
        }

        return null;
    }
    

}
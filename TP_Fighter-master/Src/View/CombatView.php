<?php

require_once "Model/Actions/Action.php";
require_once "Model/Actions/ActionHit.php";
require_once "Model/Actions/ActionDeath.php";
require_once "Model/Actions/ActionRegeneration.php";
require_once "Model/Actions/ActionMiss.php";
require_once "Model/Actions/ActionAttack.php";
require_once "Model/Actions/ActionWins.php";

class CombatView
{
    public function display(array $pActions)
    {
        $this->displayHeader();
            
        echo "<div class=\"combat\">";
        foreach($pActions as $lRound)
        {
            if(is_array($lRound))
            {
                foreach($lRound as $lAction)
                {
                    $this->displayAction($lAction);
                }
            }
            else
            {
                $this->displayAction($lRound);
            }
        }
        echo "</div>";

        $this->displayFooter();
    }

    protected function displayAction(Action $pAction)
    {
        switch(get_class($pAction))
        {
            case ActionAttack::class: $this->displayAttack($pAction); break;
            case ActionWins::class: $this->displayWins($pAction); break;
            case ActionDeath::class: $this->displayDeath($pAction); break;
            case ActionHit::class: $this->displayHit($pAction); break;
            case ActionRegeneration::class: $this->displayRegeneration($pAction); break;
            case ActionMiss::class: echo $this->displayMiss($pAction); break;
            default: break;
        }
    }

    protected function displayAttack(ActionAttack $pAction)
    {
        ?>
            <div>;
                <p><img class="photo" src="<?=$pAction->getActor()->getPhoto()?>"> 
                <?= $pAction->getActor()->getName() ?> fracasse avec un force de <?= $pAction->getForce() ?>
                son adversaire <?= $pAction->getReceiver()->getName() ?>
                <img class="photo" src="<?=$pAction->getReceiver()->getPhoto()?>">
            </div> ;
        <?php
    }
    
    protected function displayWins(ActionWins $pAction)
    {
        ?>
            <div>;
                <H2> AND THE WINNER IS</H2>
                <BR>
                <p><img class="photo" src="<?=$pAction->getActor()->getPhoto()?>"> 
                <?= $pAction->getActor()->getName() ?>. Il lui reste la bagatelle de 
                <?= $pAction->getLife() ?> points de vie !
            </div> ;
        <?php
    }

    protected function displayDeath(ActionDeath $pAction)
    {
        ?>
            <div>;
                <H2> AND THE LOSER IS</H2>
                <BR>
                <p><img class="photo" src="<?=$pAction->getActor()->getPhoto()?>"> 
                <?= $pAction->getActor()->getName() ?>
            </div> ;
        <?php
    }

    protected function displayHit(ActionHit $pAction)
    {
        ?>
            <div>;
                <p><img class="photo" src="<?=$pAction->getActor()->getPhoto()?>"> 
                <?= $pAction->getActor()->getName() ?> reçoit un coup mortel de <?= $pAction->getForce() ?>
                qui le réduit à <?= $pAction->getLife() ?> points de vie.
            </div> ;
        <?php
    }

    protected function displayRegeneration(ActionRegeneration $pAction)
    {
        ?>
            <div>;
                <p><img class="photo" src="<?=$pAction->getActor()->getPhoto()?>"> 
                <?= $pAction->getActor()->getName() ?> par son pouvoir se régénère de <?= $pAction->getLife() ?>
             points de vie.
            </div> ;
        <?php
    }

    protected function displayMiss(ActionMiss $pAction)
    {
        ?>
            <div>;
                <p><img class="photo" src="<?=$pAction->getActor()->getPhoto()?>"> 
                <?= $pAction->getActor()->getName() ?> est un blaireau il rate son coup ... 
            </div> ;
        <?php
    }


    public function displayHeader()
    {
        ?>

        <HTML>
        <HEAD>
        <link rel="stylesheet" type="text/css" href="View/style.css">
        </HEAD>
        <TITLE>Résultat</TITLE>
        <BODY>
          <H1> Résultat </H1>
       
       <?php 
    }

    public function displayFooter()
    {
        ?>
        <center><a href="index.php"> NOUVEAU COMBAT </a></center>
        </BODY>
        </HTML>
        <?php
    }

}

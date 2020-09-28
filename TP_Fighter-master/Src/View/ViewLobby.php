<?php

require_once "Model/Fighter.php";

class ViewLobby
{
    private $mName;
    
    public function __construct(string $pName) 
    {
        $mName = $pName;
    }

    public function displayPlayerSelectionScreen(...$pFighters)
    {
?>
<HTML>
    <HEAD>
    <link rel="stylesheet" type="text/css" href="View/style.css">
    </HEAD>
    <TITLE><?= $this->mName ?></TITLE>
    <BODY>
      <H1> <?= $this->mName ?> </H1>
      <form action="index.php" method="GET">

       
    <?php
        
        $this->displayFighters($pFighters, "Player 1", 1);
        $this->displayFighters($pFighters, "Player 2", 2);
    ?>

        <input type="hidden" name="page" value="fight">
        <input type="submit" value="FIGHT">

      </form>
    </BODY>
</HTML>


<?php
    }

    public function displayFighter(Fighter $pFighter): void
    {
        ?>
        
        <img height="200" src="<?=$pFighter->getPhoto() ?> "><BR>
        <p><?=$pFighter->getName() ?></p>

        <?php
    }

    public function displayFighters(array $pFighters, string $pGroupName, $pGroupID)
    {
        ?>
        <H2><?= $pGroupName ?></H2><br> 
        <div class="guild">   
        <?php
        
        foreach($pFighters as $lFighter)
        {
            echo "<div>";
            $this->displayFighter($lFighter);
            echo "<input type=radio name=\"Player" . $pGroupID . "\" value=\"" . $lFighter->getName() ."\">";
            echo "</div>" . PHP_EOL;
        } 
        ?></div><br><?php
    }
}
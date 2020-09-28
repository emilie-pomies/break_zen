<?php

session_start();

# import des données et fonctions d'affichage
require_once "../controler/model.php";
require_once "../view/view.php";
require_once "../utils.php";
require_once "../dao.php";

displayHTMLHead();//affiche le html du head
displayNavBar();//affiche la navbar
displayHTMLHeader();//affiche le header de l'accueil


try 
{
    $lBdd = DAO::getConnection();
    $lBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $lBdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo 'bien connecté';
            
}
catch (PDOException $e) 
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    return false;
}
echo 'justilise la fonction modification';

if((isset($_POST)))
{
    extract($_POST);
    if( !empty($titleIntro) &&
        !empty($subtitleIntro) &&
        !empty($author) &&
        !empty($date) &&
        !empty($photoIntro) &&
        !empty($titleArticle) &&
        !empty($editor) &&
        !empty($photoArticle))
    {
        $upgrade=$lBdd->prepare('UPDATE article_complet SET IntroTitle=:IntroTitle,
                                                            IntroSubtitle=:IntroSubtitle,
                                                            Author=:Author,
                                                            Date=:Date,
                                                            IntroPhoto=:IntroPhoto,
                                                            Title=:Title,
                                                            Content=:Content,
                                                            ArticlePhoto=:ArticlePhoto
                                                        WHERE introId=:introId  ');
        $upgrade->execute([
                'IntroTitle'=>$titleIntro,
                'IntroSubtitle'=>$subtitleIntro,
                'Author'=>$author,
                'Date'=>$date,
                'IntroPhoto'=>$photoIntro,
                'Title'=>$titleArticle,
                'Content'=>$editor,
                'ArticlePhoto'=>$photoArticle,
                'introId'=>$_GET['id']
        ]);
        echo'article mis à jour';

    }
    
}

$lRequete = $lBdd->prepare  ('SELECT * FROM article_complet WHERE introId=?');
$lRequete->execute([$_GET['id']]);
    echo'recuperation bdd OK';  
    
    
while($data=$lRequete->fetch())
{
    ?>
    <p class="connect">Mise à jour de l'article</p>
    <form  method="post" action$="upgrade.php?id= <?php echo $_GET['id']; ?>">  
    
    
    <form  method="post">     
        <p align='center'><input type="text" name="titleIntro" value="<?php echo $data['IntroTitle'];?>"/></p>
        <p align='center'><input type="text" name="subtitleIntro" value="<?php echo $data['IntroSubtitle'];?>"/></p>
        <p align='center'><input type="text" name="author" value="<?php echo $data['Author'];?>"/></p>
        <p align='center'><input type="text" name="date" value="<?php echo $data['Date'];?>"/></p>
        <p align='center'><input type="text" name="photoIntro" value="<?php echo $data['IntroPhoto'];?>"/></p>
        <p align='center'><input type="text" name="titleArticle" value="<?php echo $data['Title'];?>"></p>
        <p align='center'><textarea rows="30" cols="60" name="editor" ><?php echo $data['Content'];?></textarea></p>
        <p align='center'><input type="text" name="photoArticle" value="<?php echo $data['ArticlePhoto'];?>"></p>
        <p align='center'><button type="submit">Mise à jour de l'article</button></p>
    </form>
    
        <?php
}


$lFoundEntries = getListArticle();// on met toutes les intros dans une varibale, il va chercher toutes les intros 
if($lFoundEntries)
{
    listArticles($lFoundEntries);//si c'est vrai, il affiche toutes les intros trouvées (de 1 à 5) avec la presentation correspondante
}
else
{
    displayMessage("Pas d'article enregistré.");//sinon il affiche s'il n'a pas trouvé d'intro
}



//affiche le footer 
displayHTMLFooter();
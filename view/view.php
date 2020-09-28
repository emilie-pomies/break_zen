<?php


// Affichage un header basique, avec paramètrage du titre 
function displayHTMLHead()
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Break Zen Blog</title>

        <!-- Importation du CSS de Bootstrap -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Polices de caractères personnalisées pour ce modèle -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Styles personnalisés pour ce modèle -->
        <link href="../css/clean-blog.min.css" rel="stylesheet">

    </head>
    <?php
}

function displayNavBar()
{ ?>
<body>

<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="../view/index.php" style="color:black;">Break Zen</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../view/index.php" style="color:black;">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/about.php" style="color:black;">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/contact.php" style="color:black;">Contact</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/projets.php" style="color:black;">Mes projets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/wordpress/" style="color:black;">Mon CV</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
<?php
}

function displayHTMLHeader()
{ ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/zen.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Break Zen Blog</h1>
            <span class="subheading">Un Blog pour se détendre</span>
            </div>
        </div>
        </div>
    </div>
    </header>
  <?php
}

function displayHTMLHeaderArticle($pHeaderArticle)
{ 
    //Page Header d'un article-->
    
    
    if(!empty($pHeaderArticle))
    {
        // affichage façon HTML
               
            $lIntroTitle = $pHeaderArticle ->IntroTitle;
            $lIntroSubtitle = $pHeaderArticle ->IntroSubtitle;
            $lAuthor = $pHeaderArticle ->Author;
            $lDate = $pHeaderArticle ->Date;
            $lIntroPhoto = $pHeaderArticle ->IntroPhoto;
           
            
            $lHTMLHeaderArticle = "<header class='masthead' style='background-image: url(../img/$lIntroPhoto);'>
                                
                                <div class='col-lg-8 col-md-10 mx-auto'>
                                <div class='site-heading'>\n";
            $lHTMLHeaderArticle .= "<div class='post-preview'>\n";
            $lHTMLHeaderArticle .= "<h2 class='post-title'>$lIntroTitle</h2>\n";
            $lHTMLHeaderArticle .= "<h4 class='post-subtitle'>$lIntroSubtitle</h4>\n";
            $lHTMLHeaderArticle .= "<p class='post-meta'>Ecrit par $lAuthor Le $lDate</p>\n";
    

        
        $lHTMLHeaderArticle .= "</div></header>";
        echo "$lHTMLHeaderArticle";
    }
}


// affiche un tableau d'articles   nom, prenom photo
function displayArticles($pIntroArticles)
{
  
    if(!empty($pIntroArticles))
    {
        // affichage façon HTML
        $lHTMLIntroArticles = "<BR><div class='container'><div class='row'><div class='col-lg-8 col-md-10 mx-auto'>\n";
        foreach($pIntroArticles as $lEntry)
        {
            $lIntroId = $lEntry->IntroId;
            $lIntroTitle = $lEntry->IntroTitle;
            $lIntroSubtitle = $lEntry->IntroSubtitle;
            $lAuthor = $lEntry->Author;
            $lDate = $lEntry->Date;
            
            $lHTMLIntroArticles .= "<div method='post' class='post-preview'>\n";
            $lHTMLIntroArticles .= "<a  href='../view/article.php?id=$lIntroId'>\n";
            $lHTMLIntroArticles .= "<h2 class='post-title'>$lIntroTitle</h2>\n";
            $lHTMLIntroArticles .= "<h4 class='post-subtitle'>$lIntroSubtitle</h4>\n";
            $lHTMLIntroArticles .= "<p class='post-meta'>Ecrit par $lAuthor Le $lDate</p>\n";
            $lHTMLIntroArticles .= "</a>\n";
            $lHTMLIntroArticles .= "<hr>\n";  
        }
        $lHTMLIntroArticles .= "</div></div></div>";
        echo "$lHTMLIntroArticles";
        
    }
}

function displayOneArticle($pArticle)
{
  
    if(!empty($pArticle))
    {
        // affichage façon HTML
        $lHTMLArticle = "<BR><div class='container'><div class='row'><div class='col-lg-8 col-md-10 mx-auto'>\n";
       
        
            $lTitle = $pArticle ->Title;
            $lContent = $pArticle ->Content;
            $lArticlePhoto = $pArticle ->ArticlePhoto;
        
            $lHTMLArticle .= "<div class='post-preview'>\n";
            $lHTMLArticle .= "<h2 class='post-title'>$lTitle</h2>\n";
            $lHTMLArticle .= "<p class='post-subtitle'>$lContent</p>\n";
            $lHTMLArticle .= "<a href='#'><img class='img-fluid' src='../img/$lArticlePhoto' alt='photo de l'article'></a>\n";
            $lHTMLArticle .= "<hr>\n";  
        
        $lHTMLArticle .= "</div></div></div>";
        echo "$lHTMLArticle";
    }
}

function listArticles($pList)
{

  if(!empty($pList))
    {
        // affichage en mode TABLE HTML
        
        $lHTMLList = "<BR><CENTER><TABLE class='table' BORDER=\"4\">\n";

        $lHTMLList .= "<TR>\n";
        $lHTMLList .= "<TD>\n";
        $lHTMLList .= "Titre de l'Intro\n";
        $lHTMLList .= "</TD><TD>\n";
        $lHTMLList .= "Date de création\n";
        $lHTMLList .= "</TD>\n";
        $lHTMLList .= "<TD>\n";
        $lHTMLList .= "Modification\n";
        $lHTMLList .= "</TD><TD>\n";
        $lHTMLList .= "Suppression\n";
        $lHTMLList .= "</TD>\n";
        $lHTMLList .= "</TR>\n";


        foreach($pList as $lEntry)
        {
            
            $lIntroId = $lEntry->IntroId;
            $lDate = $lEntry->Date;
            $lIntroTitle = $lEntry->IntroTitle;
            
            
            $lHTMLList .= "<TR>\n";
            $lHTMLList .= "<TD>\n";
            $lHTMLList .= "$lIntroTitle\n";
            $lHTMLList .= "</TD><TD>\n";
            $lHTMLList .= "$lDate \n";
            $lHTMLList .= "</TD>\n";
            $lHTMLList .= "<TD>\n";
            $lHTMLList .= "<a  href='../view/upgrade.php?id=$lIntroId'>\n";
            $lHTMLList .= "Modifier\n";
            $lHTMLList .= "</a>\n";
            $lHTMLList .= "</TD><TD>\n";
            $lHTMLList .= "<a  href='../view/delete.php?id=$lIntroId'>\n";
            $lHTMLList .= "Supprimer\n";
            $lHTMLList .= "</a>\n";
            $lHTMLList .= "</TD>\n";
            $lHTMLList .= "</TR>\n";
        }

        
    
        $lHTMLList .= "</TABLE></CENTER>";
        echo "$lHTMLList";
    }

}


// affichage du formulaire d'authentification
function loginHtml(){
  
  ?>

<form action="login.php" method='post' class='text-center col-md-12 flex-column d-flex justify-content-center'>
        Login : <input type="text" name='login'/></br>
        Mot de Passe : <input type="password" name='pass'/></br>
        <input type="submit" name='Me connecter'/>
        <a href='../view/logout.php'>Se Déconnecter</a>
    </form>
  

<?php
}

function newarticle()
{

  ?>
  <p class="connect">Bienvenue, vous êtes connecté</p>
  <p class="connect">Vous pouvez créer un nouvel article en remplissant le formulaire ci-dessous : </p>
   
  <a href='../view/logout.php'>Se Déconnecter</a>

  <form  method="post">     
    <p align='center'><input type="text" name="titleIntro" placeholder="Titre de l'intro "/></p>
    <p align='center'><input type="text" name="subtitleIntro" placeholder="Sous Titre de l'intro "/></p>
    <p align='center'><input type="text" name="author" placeholder="Auteur "/></p>
    <p align='center'><input type="text" name="date" placeholder="Date "/></p>
    <p align='center'><input type="text" name="photoIntro" placeholder="Photo de l'intro"/></p>
    <p align='center'><input type="text" name="titleArticle" placeholder="Titre de l'article"></p>
    <p align='center'><textarea rows="30" cols="60" name="editor" placeholder="Article"></textarea></p>
    <p align='center'><input type="text" name="photoArticle" placeholder="Photo de l'article"></p>
    <p align='center'><button type="submit">Publier</button></p>
  </form>
  
    <?php

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
echo 'justilise la fonction ajout darticle';

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
          $addition=$lBdd->prepare('INSERT INTO article_complet ( IntroTitle,IntroSubtitle,
                                                              Author,
                                                              Date,
                                                              IntroPhoto,
                                                              Title,
                                                              Content,
                                                              ArticlePhoto)
                                                          VALUES (?,?,?,?,?,?,?,?)');
          $addition->execute([
                  $titleIntro,
                  $subtitleIntro,
                  $author,
                  $date,
                  $photoIntro,
                  $titleArticle,
                  $editor,
                  $photoArticle,
          ]);
      }
  }
  echo "article ajouté";


}

function displayHTMLHeaderProjects(){

  ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/swing.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Mes projets</h1>
            </div>
        </div>
        </div>
    </div>
    </header>
  <?php
}


function displayHTMLProjects(){
 ?>
      
      <section style="background-color:#EC8FD0; border:solid 10px #55B5B4 " class="pt-5">
      <h2 class="text-center">Les projets que j'ai réalisé</h2>
        <div class="row justify-content-center">
          <div class="text-center m-4">
            <a href="../bouddha/index.html">
              <h3>No Stress</h3>
              <img class="jeu" src="../img/jeuBouddha.jpg" alt="bouddha">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="../calculatrice/index.html">
              <h3>Calculatrice</h3>
              <img class="jeu" src="../img/calculatrice.jpg" alt="calculatrice">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="../personnage/index.html">
              <h3>Personnage</h3>
              <img class="jeu" src="../img/jeuPlateforme.jpg" alt="jeu de plateforme">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="">
              <h3>Bouddha Volant</h3>
              <img class="jeu" src="../img/bouddhaVolant.jpg" alt="bouddha volant">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="../dontTouch/souris-clic.html">
              <h3>Don't Touch</h3>
              <img class="jeu" src="../img/touch.jpg" alt="jeu dont touch">
            </a>
          </div>
          <br/>
          <div class="text-center m-4">
            <a href="../clic/p5.html">
              <h3>Clic</h3>
              <img class="jeu" src="../img/clic.jpg" alt="jeu du clic">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="../tp_complet_php_POO_DAO/index.php">
              <h3>Classe</h3>
              <img class="jeu" src="../img/classe.jpg" alt="trombinoscope">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="../jeu_grattage/index.php">
              <h3>Jeu de Grattage</h3>
              <img class="jeu" src="../img/grattage.jpg" alt="jeu de grattage">
            </a>
          </div>
          </div>
      </section>
      


 <?php

}

function displayHTMLWebSites(){

  ?>
  
      <section style="background-color:#55B5B4; border:solid 10px #EC8FD0;" class="pt-5">
      <h2 class="ml1">
            <span class="text-wrapper">
                <span class="line line1"></span>
                <span class="letters">Les sites auquels j'ai participé</span>
                <span class="line line2"></span>
            </span>
        </h2>
        <div class="row justify-content-center">
          <div class="text-center m-4">
            <a href="http://xn--prototypenumro-mkb.fr/">
              <h3>EXPERFI</h3>
              <img class="site" src="../img/experfi.jpg" alt="site experfi">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="https://pizzeria-ilgusto.fr/">
              <h3>ilGusto</h3>
              <img class="site" src="../img/ilgusto.jpg" alt="site ilGusto">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="https://paris-shuttle-airlines.fr/">
              <h3>Paris Shuttle Airlines</h3>
              <img class="site" src="../img/parisShuttle.jpg" alt="site Paris Shuttle">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="http://influentmarketing.fr/">
              <h3>Photographe</h3>
              <img class="site" src="../img/photographe.jpg" alt="Prototype Site Photographe">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="https://lacanalpatisserie.live-website.com/">
              <h3>Piscine</h3>
              <img class="site" src="../img/piscine.jpg" alt="site de piscine">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="http://mon-taxi-lille.fr/">
              <h3>Taxi Lille</h3>
              <img class="site" src="../img/taxiLille.jpg" alt="site de Taxi Lille">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="http://houseoz.com/">
              <h3>House Oz</h3>
              <img class="site" src="../img/houseOz.jpg" alt="Site House Oz">
            </a>
          </div>
          <div class="text-center m-4">
            <a href=" https://opaline.live-website.com/">
              <h3>L'Opaline</h3>
              <img class="site" src="../img/opaline.jpg" alt="Site de lopaline">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="https://avifrance.live-website.com/">
              <h3>Avis France</h3>
              <img class="site" src="../img/avisFrance.jpg" alt="site avis france">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="https://orthodentistepages.live-website.com/">
              <h3>Orthodentiste</h3>
              <img class="site" src="../img/ortho.jpg" alt="site othodontie">
            </a>
          </div>
          <div class="text-center m-4">
            <a href="https://discofra.live-website.com/">
              <h3>Discofra</h3>
              <img class="site" src="../img/discofra.jpg" alt="site discofra">
            </a>
          </div>
          <div class="text-center m-4">
            <a href=" https://deltaelec.live-website.com/">
              <h3>DeltaElec</h3>
              <img class="site" src="../img/deltaElec.jpg" alt="site delta elec">
            </a>
          </div>
        </div>
        </section>

  <?php
}


// affichage du footer
function displayHTMLFooter()
{
    echo "<footer>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-8 col-md-10 mx-auto'>
          <ul class='list-inline text-center'>
            <li class='list-inline-item'>
              <a href='https://fr.linkedin.com/in/emilie-pomies-89a183183' target='_blank'>
                <span class='fa-stack fa-lg'>
                  <i class='fas fa-circle fa-stack-2x'></i>
                  <i class='fab fa-linkedin fa-stack-1x fa-inverse'></i>
                </span>
              </a>
            </li>
            <li class='list-inline-item'>
              <a href='https://github.com/emilie-pomies'target='_blank'>
                <span class='fa-stack fa-lg'>
                  <i class='fas fa-circle fa-stack-2x'></i>
                  <i class='fab fa-github fa-stack-1x fa-inverse'></i>
                </span>
              </a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' href='../view/login.php'>Connexion</a>
            </li>
          </ul>
          <p class='copyright text-muted'>Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Importation du JavaScript de Bootstrap -->
  <script src='../vendor/jquery/jquery.min.js'></script>
  <script src='../vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

  <!-- Scripts personnalisés pour ce modèle -->
  <script src='../js/clean-blog.min.js'></script>

  
</body>
</html>";
}


function displayMessage($pMessage)
{
    ?>
    <p align="center"><font size="3" color="red"> <?= $pMessage ?> </font></p>
    <?php
}
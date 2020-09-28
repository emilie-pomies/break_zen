<?php 

# import des données et fonctions d'affichage
require_once "../view/view.php";
require_once "../controller/model.php";


// choix de l'affichage
displayHTMLHead();
displayNavBar();

?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/zen.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>A propos de moi</h1>
            <span class="subheading">Voilà ce que je fais.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Je suis en train de devenir développeuse Web, pourquoi ce choix?? Parce qu'après 20 années dans le monde du travail j'ai enfin décidé de faire ce que j'aime.</p>
        <p>Je ne renie pas ces dernieres années, elles ont fait de moi la personne que je suis et m'ont amené à cette grande décision, faire ce que j'aime et non ce qu'on attend de moi!</p>
        <p>Travailler pour avoir un salaire qui servira à payer ma maison, de la nourriture et des vetements à mes enfants, Ok. Mais j'en avais marre que cela soit une contrainte et non un vrai choix, celui de faire ce que j'aime et non celui que la société me dicte.</p>
        <p>J'ai vécu beaucoup d'épreuves dans ma vie, j'ai perdu ma mère à l'age de 26 ans et depuis je vois chaque année des gens de ma famille, proche ou non, partir de maladie ou autre. Chaque perte une un remise en question. </p>
        <p>Comment gérer le mort et surtout comment apprendre à mieux vivre chaque instant qui s'offre à moi. Le zen et la spiritualité m'aide énormement à me ressourcer. Nous avons tous tendance à nous enfermer notre notre rythme "metro boulot dodo" mais est-ce vraiement cela la vie ?? </p>
        <p>Devons-nous etre contraint à cette vie d'obligation ? Ne pouvon nous pas profitez de chaque moment ? Pourquoi ne pas s'arréter 2 minutes dans le métro pour écouter ce jeune artiste qui joue du violon .... Quelques notes de bonheur avant le boulot, mais quelle joie !!</p>
        <p>Vous etes dans les bouchons, ok ! Mais levez les yeux, il est 7h et le ciel et tellement magnifique avec ces couleurs, rose, orange, bleu, une trainée d'avion se reflette , voila de quoi vous faire aimer la vie !!! 30 secondes d'un petit bonheur qui met du baume au coeur</p>
        <p>Pourquoi ce blog ? Pour vous faire partager les articles et publications qui m'aident à garder à ma zenitude, à supporter la pression de la société, et rester ouverte au monde!! </p>
      </div>
    </div>
  </div>

  <hr>
<?php
  displayHTMLFooter();
?>
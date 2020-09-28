<?php 

# import des données et fonctions d'affichage
require_once "../view/view.php";
require_once "../controller/model.php";


// choix de l'affichage
displayHTMLHead();
displayNavBar();

?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contactez-moi</h1>
            <span class="subheading">Vous avez des questions ? J'ai des réponses.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Vous souhaitez me contacter ? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai dans les plus brefs délais !</p>
        <!-- Formulaire de contact - Entrez votre adresse électronique à la ligne 19 du fichier mail/contact_me.php pour faire fonctionner ce formulaire.-->
        <!-- AVERTISSEMENT : Certains hébergeurs de sites web n'autorisent pas l'envoi de courriers électroniques par le biais de formulaires à des hébergeurs de messagerie courants comme Gmail ou Yahoo. Il est recommandé d'utiliser une adresse électronique de domaine privé ! -->
        <!-- Pour utiliser le formulaire de contact, votre site doit être hébergé sur un serveur web en direct avec PHP ! Le formulaire ne fonctionnera pas localement ! -->
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Nom</label>
              <input type="text" class="form-control" placeholder="lastName" id="name" required data-validation-required-message="Veuillez entrer votre nom.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Adresse Mail</label>
              <input type="email" class="form-control" placeholder="Adresse Email" id="email" required data-validation-required-message="Veuillez entrer votre adresse email.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Numéro de téléphone" id="phone" required data-validation-required-message="Veuillez entrer votre numero de telephone.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez saisir votre message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>

  <?php
  displayHTMLFooter();
?>
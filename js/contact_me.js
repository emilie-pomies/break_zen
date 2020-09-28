$(function() {

  $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // messages d'erreur ou événements supplémentaires
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prévenir les comportements de soumission par défaut
      // obtenir des valeurs du FORMULAIRE
      var name = $("input#name").val();
      var email = $("input#email").val();
      var phone = $("input#phone").val();
      var message = $("textarea#message").val();
      var firstName = name; // Pour un message de réussite ou d'échec
      // Vérifiez qu'il n'y a pas d'espace blanc dans le nom du message de succès/échec
      if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
      }
      $this = $("#sendMessageButton");
      $this.prop("disabled", true); // Désactiver le bouton d'envoi jusqu'à la fin de l'appel AJAX pour éviter les messages en double
      $.ajax({
        url: "././mail/contact_me.php",
        type: "POST",
        data: {
          name: name,
          phone: phone,
          email: email,
          message: message
        },
        cache: false,
        success: function() {
          // Message de réussite
          $('#success').html("<div class='alert alert-success'>");
          $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-success')
            .append("<strong>Your message has been sent. </strong>");
          $('#success > .alert-success')
            .append('</div>');
          //Effacer tous les champs
          $('#contactForm').trigger("reset");
        },
        error: function() {
          // Message d'erreur
          $('#success').html("<div class='alert alert-danger'>");
          $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!"));
          $('#success > .alert-danger').append('</div>');
          //Effacer tous les champs
          $('#contactForm').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Réactiver le bouton de soumission lorsque l'appel AJAX est terminé
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*Lorsque vous cliquez sur le bouton Cacher complètement les cases échec/succès */
$('#name').focus(function() {
  $('#success').html('');
});

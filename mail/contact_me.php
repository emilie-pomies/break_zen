<?php
// Vérifiez les champs vides
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Créer l'e-mail et envoyer le message
$to = 'yourname@yourdomain.com'; // Ajoutez votre adresse électronique entre les '' '' en remplaçant yourname@yourdomain.com - C'est l'adresse à laquelle le formulaire enverra un message.
$email_subject = "Formulaire de contact du site web :  $name";
$email_body = "Vous avez reçu un nouveau message à partir du formulaire de contact de votre site web.\n\n"."Voici les détails :\n\nNom: $name\n\nEmail: $email_address\n\nTelephone: $phone\n\nMessage:\n$message";
$headers = "De : noreply@yourdomain.com\n"; // Il s'agit de l'adresse électronique à partir de laquelle le message généré sera envoyé. Nous vous recommandons d'utiliser une adresse du type noreply@yourdomain.com.
$headers .= "Répondre à : $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>

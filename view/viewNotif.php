<div class = "container" id="container">
  <center>
<div class="notification is-danger">
  <button class="delete" id="delete"></button>
<?php
if (isset($_GET['login'])){
  if ($_GET['login'] == 'erreur'){
    ?>Le <strong>Login</strong> que vous venez de rentrer n'est pas bon.<?php
  }
  else if ($_GET['login'] == 'existant'){
    ?>Erreur <strong>login</strong> deja existant.<?php
  }
  else if ($_GET['login'] == 'maj'){
    ?>Votre <strong>Login</strong> a bien été mis à jour.<?php
  }
}
else if (isset($_GET['mail'])){
  if ($_GET['mail'] == 'validation'){
    ?>Veuillez verifier votre compte par <strong>mail</strong> <i class="fas fa-envelope"></i>.<?php
  }
  else if ($_GET['mail'] == 'existant'){
    ?>Erreur le <strong>mail</strong> que vous venez de rentrer existe deja, veuillez <strong>reessayer</strong>.<?php
  }
  else if ($_GET['mail'] == 'inexistant'){
    ?>Erreur le <strong>mail</strong> que vous venez de rentrer n'existe pas, veuillez <strong>reessayer</strong>.<?php
  }
  else if ($_GET['mail'] == 'erreur'){
    ?>Le <strong>mail</strong> de confirmation n'a pas pu etre envoyé, veuillez <strong>reessayer</strong> ou nous <strong>contacter</strong>.<?php
  }
  else if ($_GET['mail'] == 'ok'){
    ?>Veuillez verifier votre compte par <strong>mail</strong> <i class="fas fa-envelope"></i>.<?php
  }
  else if ($_GET['mail'] == 'account_verifie'){
    ?>Votre compte a bien était <strong>verifié</strong> <i class="fas fa-envelope"></i>.<?php
  }
  else if ($_GET['mail'] == 'account_ok'){
    ?>Votre compte est deja <strong>verifié</strong> <i class="fas fa-envelope"></i>.<?php
  }
  else if ($_GET['mail'] == 'account_probleme'){
    ?>Votre mail de validation ne marche pas veuillez contacter l'<strong>administrateur</strong> <i class="fas fa-envelope"></i>.<?php
  }
}
else if (isset($_GET['mdp'])){
  if ($_GET['mdp'] == 'erreur'){
  ?>Erreur <strong>mot de passe</strong> non conforme. [1 Majuscule, 1 chiffre et 6 caracteres au moins].<?php
  }
  else if ($_GET['mdp'] == 'erreur_303'){
  ?>Erreur les <strong>mots de passe</strong> ne corresponds pas. Veuillez reessayer.<?php
  }
  else if ($_GET['mdp'] == 'erreur_302'){
  ?>Erreur le <strong>mot de passe</strong> n'existe pas. Veuillez reessayer.<?php
  }
  else if ($_GET['mdp'] == 'ok'){
  ?>Votre <strong>mot de passe</strong> a bien été mis à jour.<?php
  }
  else if ($_GET['mdp'] == 'erreur_404'){
  ?>Votre <strong>mot de passe</strong> n'a pas pu etre change. Veuillez contacter l'administrateur.<?php
  }
}
else if (isset($_GET['connexion'])){
  if ($_GET['connexion'] == 'erreur'){
    ?>Erreur <strong>mot de passe</strong> non conforme. [1 Majuscule, 1 chiffre et 6 caracteres au moins].<?php
  }
}

?>

</div>
</center>
</div>
<script src="other/js/notification.js"></script>

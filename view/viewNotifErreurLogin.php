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
  else if ($_GET['mail'] == 'erreur'){
    ?>Le <strong>mail</strong> de confirmation n'a pas pu etre envoyé, veuillez <strong>reessayer</strong> ou nous <strong>contacter</strong>.<?php
  }
  else if ($_GET['mail'] == 'ok'){

  }
}
?>

</div>
</center>
</div>
<script src="other/js/notification.js"></script>

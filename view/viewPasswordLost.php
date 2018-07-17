<div class = "container" id="container">
  <center>
<div class="notification is-danger">
  <button class="delete" id="delete"></button>
  Un mail vous sera envoyé pour réinitialiser votre <strong>mot de passe</strong>.
</div>
</center>
</div>
<script src="other/js/notification.js"></script>


<div class = "container">
  <center>
  <form action="./controleur/password_lost.php" method="post">

    <div class="field" style="width:300px">
      <label class="label has-text-light">Email</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input is-danger" name="mail" type="email" placeholder="Email input" required>
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
      </div>
    </div>

  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger" name="submit" value="ok">Réinitialiser mon mot de passe <span class="icon"> <i class="fas fa-exclamation"> </span></i></button>
    </div>
  </div>
  </form>
</center>

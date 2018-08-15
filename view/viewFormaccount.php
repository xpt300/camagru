
<div class="columns is-vcentered is-centered" style="margin: auto">
    <div class="column has-text-centered">
  <form action="./controleur/modif_login.php" method="post">
  <div class="field" style="width:300px">
    <label class="label has-text-light">Pour modifier ton login <i class="fas fa-angle-double-down"></i></label>
    <div class="control has-icons-left has-icons-right">
      <input class="input is-danger" type="text" name="login" placeholder="<?php print($_SESSION['user'])?>" required>
      <span class="icon is-small is-left">
        <i class="fas fa-user"></i>
      </span>
      <span class="icon is-small is-right">
        <i class="fas fa-check"></i>
      </span>
    </div>
  </div>
  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger" name="submit" value="ok">Modifier</button>
    </div>
  </div>
    </form>
  </div>
<div class="column has-text-centered">
<form action="./controleur/modif_mail.php" method="post">
  <div class="field" style="width:300px">
    <label class="label has-text-light">Pour modifier ton Email <i class="fas fa-angle-double-down"></i></label>
    <div class="control has-icons-left has-icons-right">
      <input class="input is-danger" name="mail" type="email" placeholder="<?php print($_SESSION['mail'])?>" required>
      <span class="icon is-small is-left">
        <i class="fas fa-envelope"></i>
      </span>
    </div>
  </div>
  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger" name="submit" value="ok">Modifier</button>
    </div>
  </div>
</form>
</div>

<div class="column">
<form action="./change-password.php" method="post">
  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger" name="submit" value="ok">Changer ton mot de passe <span class="icon"> <i class="fas fa-exclamation"> </span></i></button>
    </div>
  </div>
  </form>
</div>
<div class="column">
<form action="./controleur/modif_notification.php" method="post">
  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger is-inverted is-outlined" name="submit" value="ok">Notification : <?php print($_SESSION['notification'])?><span class="icon"></button>
    </div>
  </div>
  </form>
</div>

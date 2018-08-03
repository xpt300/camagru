<div class = "container">
  <center>
  <form action="./controleur/modif_password.php" method="post">

  <div class="field" style="width:300px">
    <label class="label has-text-light">Nouveau password</label>
    <div class="control has-icons-left">
      <input class="input is-danger" type="password" name="mdp1" placeholder="Password" required>
      <span class="icon is-small is-left">
        <i class="fas fa-lock"></i>
      </span>
      <span class="icon is-small is-right">
        <i class="fas fa-check"></i>
      </span>
    </div>
  </div>

  <div class="field" style="width:300px">
    <label class="label has-text-light">Retaper votre nouveau password</label>
    <p class="control has-icons-left">
      <input class="input" type="password" placeholder="Verification Password" name="mdp2" required>
      <span class="icon is-small is-left">
        <i class="fas fa-lock"></i>
      </span>
    </p>
  </div>

  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger" name="submit" value="ok">Changer</button>
    </div>
    <div class="control">
      <button class="button is-text" type="reset">Cancel</button>
    </div>
  </div>
  </form>
  </center>

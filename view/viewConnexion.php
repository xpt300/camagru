<div class = "container">
  <center>
  <form action="./controleur/connexion_account.php" method="post">

  <div class="field" style="width:300px">
    <label class="label has-text-light">Username</label>
    <div class="control has-icons-left has-icons-right">
      <input class="input is-danger" type="text" name="login" placeholder="Text input" required>
      <span class="icon is-small is-left">
        <i class="fas fa-user"></i>
      </span>
      <span class="icon is-small is-right">
        <i class="fas fa-check"></i>
      </span>
    </div>
    <p class="help is-danger">This username is available</p>
  </div>

  <div class="field" style="width:300px">
    <label class="label has-text-light">Password</label>
    <p class="control has-icons-left">
      <input class="input" type="password" placeholder="Password" name="mdp" required>
      <span class="icon is-small is-left">
        <i class="fas fa-lock"></i>
      </span>
    </p>
  </div>

  <div class="field is-grouped is-grouped-centered" style="width:300px">
    <div class="control">
      <button class="button is-danger" name="submit" value="ok">Connexion</button>
    </div>
    <div class="control">
      <button class="button is-text" type="reset">Cancel</button>
    </div>
  </div>
  </form>
  </center>

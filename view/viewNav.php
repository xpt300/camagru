<nav class="navbar is-transparent">
<div class="navbar-brand">
  <a class="navbar-item" href="index.php">
  <span class="navbar-item title is-2 has-text-light">
    Camagru
  </span>
</a>
</div>

<div id="navbarExampleTransparentExample" class="navbar-menu">
  <div class="navbar-start">
    <a class="navbar-item">
    <?php
      if (isset($_SESSION['user']) && valid_user($_SESSION['user']) == 1){
        ?><label>Hello <?php print($_SESSION['user'])?></label><?php
      }
    ?>
    </a>
  </div>
</div>

  <div class="navbar-end">
    <div class="navbar-item">
      <div class="field is-grouped">
        <p class="control">
          <a class="button is-danger" href="index.php?action=login">
            <span class="icon">
              <i class="fab fa-angellist"></i>
            </span>
            <span>
              Join us!
            </span>
          </a>
        </p>
        <p class="control">
          <a class="button is-primary is-danger" href="index.php?action=connexion">
            <span class="icon">
              <i class="fas fa-lock"></i>
            </span>
            <span>Connexion !</span>
          </a>
        </p>
        <p class="control">
          <a class="button is-primary is-danger" href="index.php?action=photo">
            <span class="icon">
              <i class="fas fa-camera-retro"></i>
            </span>
            <span>Photo !</span>
          </a>
        </p>
      </div>
    </div>
  </div>
</nav>

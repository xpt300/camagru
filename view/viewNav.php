<nav class="navbar is-transparent">
<div class="navbar-brand">
  <a class="navbar-item" href="index.php">
  <span class="navbar-item title is-2 has-text-light">
    Camagru
  </span>
</a>
</div>


<?php


  if (isset($_SESSION['user'])){
    ?>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="button is-white is-rounded is-responsive ">
              <span class="icon">
                <i class="fab fa-angellist"></i>
              </span>
              <span class='is-black'>
                Bonjour <?php print($_SESSION['user'])?>!
              </span>
            </a>
          </p>
          <p class="control">
            <a class="button is-danger" href="index.php?action=compte">
              <span class="icon">
                <i class="fas fa-address-card"></i>
              </span>
              <span>
                Mon compte!
              </span>
            </a>
          </p>
          <p class="control">
            <a class="button is-primary is-danger" href="index.php?action=deconnexion">
              <span class="icon">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <span>Deconnexion!</span>
            </a>
          </p>
          <p class="control">
            <a class="button is-primary is-danger" href="index.php?action=photo">
              <span class="icon">
                <i class="fas fa-camera-retro"></i>
              </span>
              <span>Photo!</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  <?php
  }

  else {
      ?>
  <div class="navbar-end">
    <div class="navbar-item">
      <div class="field is-grouped">
        <p class="control">
          <a class="button is-danger" href="join-us.php">
            <span class="icon">
              <i class="fab fa-angellist"></i>
            </span>
            <span>
              Join us!
            </span>
          </a>
        </p>
        <p class="control">
          <a class="button is-primary is-danger" href="connexion.php">
            <span class="icon">
              <i class="fas fa-lock"></i>
            </span>
            <span>Connexion!</span>
          </a>
        </p>
        <p class="control">
          <a class="button is-primary is-danger" href="photo.php">
            <span class="icon">
              <i class="fas fa-camera-retro"></i>
            </span>
            <span>Photo!</span>
          </a>
        </p>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
</nav>

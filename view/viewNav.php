<nav class="navbar is-transparent">
<div class="navbar-brand">
  <span class="navbar-item title is-2 has-text-light">
    Camagru
  </span>
</div>

<div id="navbarExampleTransparentExample" class="navbar-menu">
  <div class="navbar-start">
    <a class="navbar-item" href="https://bulma.io/">
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
          <a class="bd-tw-button button is-danger" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
            <span class="icon">
              <i class="fab fa-angellist"></i>
            </span>
            <span>
              Join us!
            </span>
          </a>
        </p>
        <p class="control">
          <a class="button is-primary is-danger" href="https://github.com/jgthms/bulma/releases/download/0.7.1/bulma-0.7.1.zip">
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

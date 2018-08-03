<?php
  if (isset($_SESSION['user'])){
    ?>
<div class="container">
  <center>
  <article class="media">
    <div class="media">
      <video id="video"></video>
      <canvas id="canvas"></canvas>
    </div>
    <div class="media-content">
    </div>
    <div class="content">
      <a class="button is-danger" id='shoot'>
        <span class="icon">
          <i class="fas fa-camera-retro"></i>
        </span>
        <span>Prendre une photo!</span>
      </a>
    </div>
    <div class="content">
      <a class="button is-danger" id='shoot'>
        <span class="icon">
          <i class="fas fa-camera-retro"></i>
        </span>
        <span>Upload une photo!</span>
      </a>
    </div>
  </article>
</center>
<?php
}
else {
?>
  <div class = "container" id="container">
    <center>
  <div class="notification is-danger">
    <button class="delete" id="delete"></button>
    Veuillez vous <strong>connecter</strong> pour accéder à la partie photo.
  </div>
  </center>

  <script src="other/js/notification.js"></script>
<?php
}
?>

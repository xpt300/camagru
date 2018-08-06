<?php
  if (isset($_SESSION['user'])){
    ?>

  <center>
      <video id="video"></video>
      <canvas id="canvas"></canvas>
      <a class="button is-danger" id='startbutton'>
        <span class="icon">
          <i class="fas fa-camera-retro"></i>
        </span>
        <span>Prendre une photo!</span>
      </a>

      <a class="button is-danger" id='shoot'>
        <span class="icon">
          <i class="fas fa-camera-retro"></i>
        </span>
        <span>Upload une photo!</span>
      </a>
  <img src="http://placekitten.com/g/320/261" id="photo" alt="photo">
</center>
<script src="other/js/camera.js"></script>
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

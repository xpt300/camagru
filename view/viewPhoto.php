<?php
  if (!isset($_SESSION))
    session_start();

  if (isset($_SESSION['user'])){
    ?>

<div class="columns">
    <div class="column">
        <div class="box">
            <div class="media-content">
                <center>
                    <video id="video"></video>
                </center>
            </div>
            <center>
            <div class="content">

                <a class="button is-danger" id='startbutton'>
                    <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                    </span>
                    <span>Prendre une photo!</span>
                </a>

                <div class="field">
                    <div class="file is-primary">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Upload une photo!
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <!-- <a class="button is-danger" id=''>
                    <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                    </span>
                    <span>Upload une photo!</span>
                </a> -->

            </div>
            </center>
        </div>
    </div>
    <div class="column">
        <div class="box">
            <div class="media">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="container">
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

<?php
  if (!isset($_SESSION))
    session_start();

  if (isset($_SESSION['user'])){
    ?>
    <div class="columns">
        <div class="column is-two-thirds">
            <div class="box-shadow">
                <div class="media-content">
                    <div class="columns">
                        <div class="column">
                            <figure class="image is-96x96">
                              <img src="./other/StickPNG/5a39135643754d312f78e563.png">
                            </figure>
                        </div>
                        <div class="column">
                            <figure class="image is-96x96">
                              <img src="./other/StickPNG/5b6b204baa22c0115c0a56ee.png">
                            </figure>
                        </div>
                        <div class="column">
                            <figure class="image is-96x96">
                              <img src="./other/StickPNG/580b57fbd9996e24bc43be5c.png">
                            </figure>
                        </div>
                        <div class="column">
                            <figure class="image is-96x96">
                              <img src="./other/StickPNG/584be22724222481f5d0a3e1.png">
                            </figure>
                        </div>
                        <div class="column">
                            <figure class="image is-96x96">
                              <img src="other/StickPNG/5845e10e7733c3558233c0ea.png">
                            </figure>
                        </div>
                        <div class="column">
                            <figure class="image is-96x96">
                              <img src="other/StickPNG/5845e635fb0b0755fa99d7e9.png">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="box-shadow">
                <div class="box-shadow">
                  <article class="media">
                    <div class="media-left">
                      <div class="content">
                      </div>
                    </div>
                  </article>
                </div>
            </div>
        </div>
    </div>
<div class="columns">
    <div class="column is-two-thirds">
        <div class="box-shadow">
            <div class="media-content">
                <center>
                    <video id="video"></video>
                </center>
            </div>
            <div class="file is-info is-centered">
                <a class="button is-danger" id='startbutton'>
                    <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                    </span>
                    <span>Prendre une photo</span>
                </a>

                <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Upload une photo
                        </span>
                    </span>
                </label>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="box-shadow">
            <div class="box">
              <article class="media">
                <div class="media-left">
                  <div class="content">
                    <p>
                      Album photo <i class="fas fa-camera-retro"></i>
                    </p>
                  </div>
                </div>
              </article>
            </div>
        </div>
    </div>
</div>

<div class="modal">
    <div class="modal-background"></div>
    <center>
    <div class="modal-content">
        <canvas id="canvas"></canvas>
    </div>
        <a class="button is-success" id='save'>
            <span class="icon">
                <i class="fas fa-check"></i>
            </span>
            <span>Ok</span>
        </a>
        <a class="button is-danger" id='close'>
            <span class="icon">
                <i class="fas fa-times"></i>
            </span>
            <span>Non</span>
        </a>
    </center>
</div>

<div class="container">
<script src="other/js/camera.js"></script>
<script src="other/js/modal.js"></script>
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

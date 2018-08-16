<?php
  if (!isset($_SESSION))
    session_start();

  if (isset($_SESSION['user'])){
    ?>
    <section class="hero is-small">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
          </h1>
        </div>
      </div>
    </section>
    <div class="columns">
        <div class="column is-three-fifths">
            <div class="box-shadow">
                <div class="media-content" style="overflow-x: hidden;">
                    <div class="columns" style="overflow-y: hidden;">
                        <div class="column">
                            <center>
                            <figure class="image is-96x96">
                              <img class="img" name="filter1" src="./other/StickPNG/5a39135643754d312f78e563.png">
                            </figure>
                        </center>
                        </div>
                        <div class="column">
                            <center>
                            <figure class="image is-96x96">
                              <img class="img" name="filter2" src="./other/StickPNG/5b6b204baa22c0115c0a56ee.png">
                            </figure>
                            </center>
                        </div>
                        <div class="column">
                            <center>
                            <figure class="image is-96x96">
                              <img class="img" name="filter3" src="./other/StickPNG/580b57fbd9996e24bc43be5c.png">
                            </figure>
                            </center>
                        </div>
                        <div class="column">
                            <center>
                            <figure class="image is-96x96">
                              <img class="img" name="filter4" src="./other/StickPNG/584be22724222481f5d0a3e1.png">
                            </figure>
                            </center>
                        </div>
                        <div class="column">
                            <center>
                            <figure class="image is-96x96">
                              <img class="img" name="filter5" src="other/StickPNG/5845e10e7733c3558233c0ea.png">
                            </figure>
                            </center>
                        </div>
                        <div class="column">
                            <center>
                            <figure class="image is-96x96">
                              <img class="img" name="filter6" src="other/StickPNG/5845e635fb0b0755fa99d7e9.png">
                            </figure>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="columns is-vcentered">
    <div class="column is-three-fifths" id="center">
                <center>
                    <img class="img_move" id="filter1" style="position: absolute; z-index: 5; display: none; top: 45%; left: 20%" width="96px" height="96px" src="./other/StickPNG/5a39135643754d312f78e563.png">
                    <img class="img_move" id="filter2" style="position: absolute; z-index: 5; display: none; top: 45%; left: 20%" width="96px" height="96px" src="./other/StickPNG/5b6b204baa22c0115c0a56ee.png">
                    <img class="img_move" id="filter3" style="position: absolute; z-index: 5; display: none; top: 45%; left: 20%" width="96px" height="96px" src="./other/StickPNG/580b57fbd9996e24bc43be5c.png">
                    <img class="img_move" id="filter4" style="position: absolute; z-index: 5; display: none; top: 45%; left: 20%" width="96px" height="96px" src="./other/StickPNG/584be22724222481f5d0a3e1.png">
                    <img class="img_move" id="filter5" style="position: absolute; z-index: 5; display: none; top: 45%; left: 20%" width="96px" height="96px" src="other/StickPNG/5845e10e7733c3558233c0ea.png">
                    <img class="img_move" id="filter6" style="position: absolute; z-index: 5; display: none; top: 45%; left: 20%" width="96px" height="96px" src="other/StickPNG/5845e635fb0b0755fa99d7e9.png">
                    <video id="video" style="position: relative; z-index: 1"></video>
                </center>
            <div class="file is-info is-centered">
                <a class="button is-danger" id='startbutton'>
                    <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                    </span>
                    <span>Prendre une photo</span>
                </a>
                <form id="img_form" method="post" action="./controleur/import_img_save.php" enctype="multipart/form-data">
                    <label class="file-label">
                        <input id="file_import" class="file-input" type="file" name="resume">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Upload une photo
                            </span>
                    </span>
                </label>
            </form>
        </div>
    </div>
    <div class="column">
        <div class="box">
            <div class="content">
                <span>Album photo</span> <i class="fas fa-camera-retro"></i>
            </div>
        </div>
    <div class="box-shadow" style="max-height:810px;overflow-y:auto;overflow-x: hidden;">

            <?php
            require_once('./modele/model.php');
            require_once('./config/database.php');
            $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
            $reponse = $bdd->query('SELECT id FROM account WHERE login = "'.$_SESSION['user'].'"');
            $donnee = $reponse->fetch();
            $reponse = $bdd->query('SELECT path_img FROM img WHERE user_id = "'.$donnee['id'].'" ORDER BY id DESC');
            $a = 0;
            while ($donnee = $reponse->fetch()){
                if ($a == 0){
                    ?><div class="columns"><?php
                }
                $a = $a + 1;?>
                <div class="column">
                    <figure class="image is-5by4">

                        <img src="<?php echo $donnee['path_img']?>" style="border-radius: 5px;">
                        <button class="delete" name="delete_button" id="<?php echo $donnee['path_img']?>"></button>
                    </figure>
                </div>
                <?php
                if ($a == 2){
                    ?></div><?php
                    $a = 0;
                }
            }
            if($a == 1){
                ?></div><?php
            }
            ?>
        </div>
    </div>
</div>


<div class="modal" id="modal_save">
    <div class="modal-background" id="div_save"></div>
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
        <a class="button is-danger" id='close_save'>
            <span class="icon">
                <i class="fas fa-times"></i>
            </span>
            <span>Non</span>
        </a>
    </center>
</div>
<div class="modal" id="modal_type">
    <div class="modal-background" id="div_type"></div>
    <center>
    <div class = "container" id="container">
        <div class="notification is-danger">
            <button class="delete" id="delete_type"></button>
            Le fichier doit être au format <strong>*.jpeg, *.gif ou *.png</strong>.
        </div>
    </div>
    </center>
</div>
<div class="modal" id="modal_poids">
    <div class="modal-background" id="div_poids"></div>
    <center>
    <div class = "container" id="container">
        <div class="notification is-danger">
            <button class="delete" id="delete_poids"></button>
            L'image doit être inférieur à <strong>500 Ko</strong>.
        </div>
    </div>
    </center>
</div>
<div class="modal" id="modal_supp">
    <div class="modal-background" id="div_supp"></div>
    <center>
        <section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title" style="color: #fc3c63;">
        Voulez-vous supprimer la photo?
      </h1>
      <h2 class="subtitle" style="color: #fc3c63;">
        Action irreversible.
      </h2>
    </div>
  </div>
</section>
        <a class="button is-danger" id='supp'>
            <span class="icon">
                <i class="fas fa-check"></i>
            </span>
            <span>Supprimer</span>
        </a>
        <a class="button is-success" id='close_supp'>
            <span class="icon">
                <i class="fas fa-times"></i>
            </span>
            <span>Non</span>
        </a>
    </center>
</div>

<div class="container">
<script src="other/js/import_img.js"></script>
<script src="other/js/save_image.js"></script>
<script src="other/js/img_move.js"></script>
<script src="other/js/png_filter.js"></script>
<script src="other/js/delete_img.js"></script>
<script src="other/js/modal_supp.js"></script>
<script src="other/js/camera.js"></script>
<script src="other/js/modal.js"></script>
<?php
}
else {
?>
  <div class = "container" id="container">
    <center>
  <div class="notification is-danger">
    Veuillez vous <strong>connecter</strong> pour accéder à la partie photo.
  </div>
  </center>

  <script src="other/js/notification.js"></script>
<?php
}
?>

<div class = "colums">
    <div class="column">
        <div class="box-shadow" style="overflow-y: hidden;overflow-x: hidden;">
            <center>
        <?php
        require_once('./modele/model.php');
        require_once('./config/database.php');
        $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
        $reponse = $bdd->query('SELECT path_img FROM img ORDER BY id DESC');
        $a = 0;
        $var = "block";
        while ($donnee = $reponse->fetch()){
            $a++;
            if ($a == 6){
                $var = "none";
            }
            $func = new img;
            $img_id = $func->id_img($bdd, $donnee['path_img']);
            $img_id = strval($img_id[0]);
            $func = new comment;
            $content = $func->content_img($bdd, $donnee['path_img'], $img_id);
            $prenom = $func->prenom_comment($bdd, $img_id);
            $lenght = $func->nb_comment($bdd, $img_id);
            $comment = 0;
            $func = new like;
            $count_like = $func->count_like($bdd, $img_id);
            if (isset($_SESSION['user'])){
              $like_user = $func->valid_like($bdd, $img_id, $_SESSION['user']);
            }
            else {
              $like_user = 0;
            }
            ?>
            <div class="columns" style="display: <?php echo $var ?>;">
                <div class="column"></div>
                <div class="column is-one-third">
                    <figure class="image is-256x256">
                        <img src="<?php echo $donnee['path_img']?>" style="border-radius: 5px;">
                    </figure>
                    <div class="box">
                        <div class="media-content">
                            <div class="content">
                              <?php if (isset($_SESSION['user']) && $like_user == 1) { ?>
                                <i class="fas fa-heart" id="like_on_user<?php echo $a ?>" name="<?php echo $img_id.'-'.$_SESSION['user']?>" style="color: #ec4c63; display: block"></i>
                                <i class="far fa-heart" id="like_off_user<?php echo $a ?>" name="<?php echo $img_id.'-'.$_SESSION['user']?>" style="display: none"></i>
                            <?php  }
                              else if (isset($_SESSION['user'])){ ?>
                                <i class="far fa-heart" id="like_off_user<?php echo $a ?>" name="<?php echo $img_id.'-'.$_SESSION['user']?>" style="display: block"></i>
                                <i class="fas fa-heart" id="like_on_user<?php echo $a ?>"  name="<?php echo $img_id.'-'.$_SESSION['user']?>" style="color: #ec4c63; display: none"></i>

                            <?php  }
                            else { ?>
                                <i class="far fa-heart" id="like_off<?php echo $a ?>" name="<?php echo $img_id.'-'.$_SESSION['user']?>" style="display: block"></i>
                            <?php } ?>
                              <span>
                              <p>
                              <strong class="text" id="txt<?php echo $a ?>"><?php echo $count_like[0] ?> J'aime</strong>
                            </p>
                            </span>
                                <?php if (!$content[0]) { ?>
                                    <center>
                                    <span>
                                    <p style="color: #3676d9"><i class="fas fa-comment-slash"></i> Aucun commentaire</p>
                                </span>
                                </center>
                                <?php }
                                    else {
                                      $comment = 1;
                                  ?>
                                <span>
                                <p>
                                <strong><?php echo $prenom[0]?></strong>
                                <br>
                                <?php echo $content[0]?>
                              </p>
                            </span>
                      <?php
                      }
                      while ($comment < $lenght[0]) {
                    ?>
                    <span class="comment_cache<?php echo $a ?>" style="display: none;">
                    <p>
                    <strong> <?php echo $prenom[$comment] ?> </strong>
                    <br>
                    <?php echo $content[$comment] ?>
                  </p>
                </span>
              <?php
              $comment = $comment + 1;
                } ?>
                      </div>
                    </div>
                    <?php if ($lenght[0] > 1){
                        ?>
                      <center>
                          <div class="notification" id="<?php echo $a ?>" style="padding: initial;background-color: white;cursor: pointer;">
                              <span id="icon_off<?php echo $a ?>" style="display: block;">
                                  <i class="fas fa-angle-down"></i>
                                  <span id="text_off<?php echo $a ?>" style="text-decoration: underline;">Voir tous les commentaires</span>
                              </span>
                              <span id="icon_on<?php echo $a ?>" style="display: none;">
                                  <i class="fas fa-angle-up"></i>
                                  <span id="text_on<?php echo $a ?>" style="text-decoration: underline;">Cacher tous les commentaires</span>
                              </span>
                          </div>
                      </center>
                  <?php } ?>
                        <div class="control">
                            <textarea class="input" id="input<?php echo $a ?>" name="comment_button<?php echo $a ?>" placeholder="Commente"></textarea>
                        </div>
                        <div class="field is-grouped is-hidden" id="comment_button<?php echo $a ?>">
                            <div class="control">
                                <button class="button is-link submit" id="<?php echo $_SESSION['user'] ?>" name="<?php echo $donnee['path_img']?>">Submit</button>
                            </div>
                            <div class="control">
                                <button class="button is-text" id="cancel_button<?php echo $a ?>">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        <?php
        }
        ?>
    </center>
  </div>
</div>
<div class="modal" id="modal_comment">
    <div class="modal-background" id="div_comment"></div>
    <center>
    <div class = "container" id="container">
        <div class="notification is-danger">
            <button class="delete" id="delete_comment"></button>
            Veuillez vous <strong>connecter</strong> avant de pouvoir commenter.
        </div>
    </div>
    </center>
</div>
<div class="modal" id="modal_like">
    <div class="modal-background" id="div_like"></div>
    <center>
    <div class = "container" id="container">
        <div class="notification is-danger">
            <button class="delete" id="delete_like"></button>
            Veuillez vous <strong>connecter</strong> avant de pouvoir liker.
        </div>
    </div>
    </center>
</div>
<script src="other/js/comment.js"></script>
<script src="other/js/comment_plus.js"></script>
<script src="other/js/like_img.js"></script>
<script src="other/js/notification_comment.js"></script>
<script src="other/js/scroll.js"></script>

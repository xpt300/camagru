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
            $reponse_id = $bdd->query('SELECT id FROM img WHERE path_img = "'.$donnee["path_img"].'"');
            $img_id = $reponse_id->fetch();
            $reponse_img = $bdd->query('SELECT date_img FROM img WHERE id = "'.$img_id['id'].'"');
            $date_img = $reponse_img->fetch();
            $reponse_content = $bdd->query('SELECT content FROM comment WHERE img_id = "'.$img_id['id'].'"');
            $content = $reponse_content->fetch();
            $reponse_prenom = $bdd->query('SELECT prenom FROM account WHERE login = "'.$_SESSION['user'].'"');
            $prenom = $reponse_prenom->fetch();
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
                                <?php if (!$content['content']) { ?>
                                    <center>
                                    <span>
                                    <p style="color: #3676d9"><i class="fas fa-comment-slash"></i> Aucun commentaire</p>
                                </span>
                                </center>
                                    </div>
                                  </div>
                                <?php }
                                    else { ?>
                                <p>
                                <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                              </p>
                          </div>
                        </div>
                        <center>
                            <div class="notification" style="padding: initial;background-color: white;cursor: pointer;">
                                <span class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                                <span style="text-decoration: underline;">Voir tous les commentaires</span>
                            </div>
                        </center>
                    <?php } ?>
                        <div class="control">
                            <textarea class="input" id="input" name="comment_button<?php echo $a ?>" placeholder="Commente"></textarea>
                        </div>
                        <div class="field is-grouped is-hidden" id="comment_button<?php echo $a ?>">
                            <div class="control">
                                <button class="button is-link submit" id="<?php echo $_SESSION['user'] ?>" name="<?php echo $donnee['path_img']?>">Submit</button>
                            </div>
                            <div class="control">
                                <button class="button is-text" id="cancel_button<?php echo $a ?>">Cancel</button>
                            </div>
                        </div>
                        <div class="column">
                            <center>
                            <button class="button is-link is-outlined">
                                <span class="icon">
                                  <i class="far fa-thumbs-up"></i>
                                </span>
                                <span>Like</span>
                            </button>
                        </center>
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
</div>
<script src="other/js/comment.js"></script>

<?php
require('../modele/model.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $_POST["mdp"])) {
    header('Location: ../index.php?mdp=erreur');
    exit();
  }
  else
  {
    extract($_POST);
    $array["key_user"] = hash("whirlpool", $mdp);
    if (create_account($prenom, $login, $mail, $mdp, $array["key_user"]) == 1) {
      if (send_mail($array["key_user"], $mail, $prenom, $login) == 1) {
        header('Location: index.php?mail=validation');
        exit();
      }
      header('Location: index.php?mail=erreur');
      exit();
    }
    else {
      header('Location: index.php?login=existant');
      exit();
    }
  }
  header('Location: index.php');
}

?>

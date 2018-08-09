<?php

require_once('../modele/model.php');
require_once('../config/setup.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $_POST["mdp"])) {
    header('Location: ../index.php?mdp=erreur');
    exit();
  }
  else
  {
    $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
    extract($_POST);
    $user_var = new user;
    $login = htmlspecialchars($login);
    $password = htmlspecialchars($mdp);
    $mail = htmlspecialchars($mail);
    $length = 25;
    $key_user = bin2hex(random_bytes($length));
    if ($user_var->create_account($prenom, $login, $mail, $mdp, $key_user, $bdd) == 1) {
      if ($user_var->send_mail(1, $key_user, $mail, $prenom, $login) == 1) {
        header('Location: ../index.php?mail=validation');
        exit();
      }
      header('Location: ../join-us.php?mail=erreur');
      exit();
    }
    else if ($user_var->create_account($prenom, $login, $mail, $mdp, $key_user, $bdd) == -1){
      header('Location: ../join-us.php?mail=existant');
      exit();
    }
    else {
      header('Location: ../join-us.php?login=existant');
      exit();
    }
  }
  header('Location: ../join-us.php');
}
?>

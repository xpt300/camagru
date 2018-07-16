<?php

require_once('../modele/model.php');
require_once('../config/setup.php');

// Verificaiton de la base de donne
if (!isset($_SESSION["user"])){
  if (database_setup($DB_LOCAL, $DB_USER, $DB_PASSWORD) == 0){
    exit();
  }
  if (table($DB_DNS, $DB_USER, $DB_PASSWORD) == 0){
    exit();
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $_POST["mdp"])) {
    header('Location: ../index.php?mdp=erreur');
    exit();
  }
  else
  {
    try
    {
      $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch(PDOException $e)
    {
          echo 'Erreur : '.$e->getMessage();
          return(0);
    }
    extract($_POST);
    $user_var = new user;
    $login = htmlspecialchars($login);
    $password = htmlspecialchars($mdp);
    $array["key_user"] = hash("whirlpool", $password + $login);
    if ($user_var->create_account($prenom, $login, $mail, $mdp, $array["key_user"], $bdd) == 1) {
      if ($user_var->send_mail(1, $array["key_user"], $mail, $prenom, $login) == 1) {
        header('Location: ../index.php?mail=validation');
        exit();
      }
      header('Location: ../index.php?mail=erreur');
      exit();
    }
    else if ($user_var->create_account($prenom, $login, $mail, $mdp, $array["key_user"], $bdd) == -1){
      header('Location: ../index.php?mail=existant');
      exit();
    }
    else {
      header('Location: ../index.php?login=existant');
      exit();
    }
  }
  header('Location: ../index.php');
}

?>

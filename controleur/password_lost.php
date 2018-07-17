<?php

require_once('../modele/model.php');
require_once('../config/setup.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  try
  {
    $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }
  catch(PDOException $e)
  {
        echo 'Erreur : '.$e->getMessage();
        return(0);
  }
  $user_var = new user;
  extract($_POST);
  $reponse_login = $bdd->query('SELECT')
  if ($user_var->send_mail(2, $array["key_user"], $mail, $prenom, $login) == 1) {
    header('Location: ../index.php?login=existant');
    exit();
  }
}

?>

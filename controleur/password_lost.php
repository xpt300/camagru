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
        echo 'Erreur : '.$e->getMessaxge();
        return(0);
  }
  $user_var = new user;
  extract($_POST);
  $mail = htmlspecialchars($mail);
  if ($user_var->password_lost($mail, $bdd) == 1){
    header('Location: ../index.php?mail=ok');
    exit();
  }
  else {
    header('Location: ../index.php?mail=inexistant');
    exit();
  }
}

?>

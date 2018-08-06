<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

try
{
  $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(PDOException $e)
{
      echo 'Erreur : '.$e->getMessage();
      exit();
}

$var_user = new user;
if (isset($_GET['code'])){
  if ($var_user->verification_account($bdd, $_GET['code']) == 1){
    header('Location: ../index.php?mail=account_ok');
    exit();
  }
  else if ($var_user->verification_account($bdd, $_GET['code']) == 2){
    header('Location: ../index.php?mail=account_verifie');
    exit();
  }
}
header('Location: ../index.php?action=compte&notif=probleme_accout');
exit();

?>

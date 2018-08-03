<?php
session_start();
require_once('./modele/model.php');
require_once('./config/setup.php');

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
    header('Location: ../index.php?action=compte&notif=account_verifier');
    exit();
  }
  else if ($var_user->verification_account($bdd, $_GET['code']) == 2){
    header('Location: ../index.php?action=compte&notif=verifier');
    exit();
  }
}
header('Location: ../index.php?action=compte&notif=probleme_accout');
exit();

?>

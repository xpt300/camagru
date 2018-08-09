<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$var_user = new user;
if (isset($_GET['code'])){
  if ($var_user->verification_account($bdd, $_GET['code']) == 1){
    header('Location: ../index.php?mail=account_verifie');
    exit();
  }
  else if ($var_user->verification_account($bdd, $_GET['code']) == 2){
    header('Location: ../index.php?mail=account_ok');
    exit();
  }
}
header('Location: ../index.php?action=compte&notif=probleme_accout');
exit();

?>

<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);

$var_user = new user;
if ($var_user->modif_notification($bdd, $_SESSION['user']) == 1){
    $_SESSION['notification'] = 'No';
  header('Location: ../account-user.php');
  exit();
}
else {
    $_SESSION['notification'] = 'Yes';
    header('Location: ../account-user.php');
    exit();
}

?>

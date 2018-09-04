<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$mail = htmlspecialchars($_POST['mail']);
$var_user = new user;
if ($var_user->modif_mail($bdd, $mail) == 1){
    $_SESSION['mail'] = $mail;
  header('Location: ../index.php?mail=change');
  exit();
}
header('Location: ../index.php?mail=erreur');
exit();

?>

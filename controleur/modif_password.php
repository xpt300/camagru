<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');

$mdp1 = htmlspecialchars($_POST['mdp1']);
$mdp2 = htmlspecialchars($_POST['mdp2']);
if (isset($_SESSION['code'])){
  $key_user = $_SESSION['code'];
  unset($_SESSION['code']);
}
if ($mdp1 != $mdp2){
  header('Location: ../change-password.php?mdp=erreur_303');
  exit();
}
if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $mdp1)) {
  header('Location: ../change-password.php?mdp=erreur');
  exit();
}
$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$var_user = new user;
if (isset($key_user)){
  if ($var_user->modif_password($bdd, $key_user, $mdp1, 0) == 1){
    header('Location: ../index.php?mdp=ok');
    exit();
  }
}
else {
  if ($var_user->modif_password($bdd, $_SESSION['user'], $mdp1, 1) == 1){
    header('Location: ../index.php?mdp=ok');
    exit();
  }
}
header('Location: ../index.php?mdp=erreur_404');
exit();

?>

<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');

$mdp1 = htmlspecialchars($_POST['mdp1']);
$mdp2 = htmlspecialchars($_POST['mdp2']);
$key_user = $_SESSION['code'];
unset($_SESSION['code']);
if ($mdp1 != $mdp2){
  header('Location: ../change-password.php?mdp=erreur_303');
  exit();
}
if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $mdp1)) {
  header('Location: ../change-password.php?mdp=erreur');
  exit();
}
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
if ($var_user->modif_password($bdd, $key_user, $mdp1) == 1){
  header('Location: ../index.php?mdp=ok');
  exit();
}
header('Location: ../index.php?mdp=erreur_404');
exit();

?>

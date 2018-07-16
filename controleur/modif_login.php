<?php

require_once('../modele/model.php');
require_once('../config/setup.php');

try
{
  $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(PDOException $e)
{
      echo 'Erreur : '.$e->getMessage();
      exit();
}
$login = htmlspecialchars($_POST['login']);
$var_user = new user;
if ($var_user->modif_login($bdd, $login) == 1){
  header('Location: ../index.php?action=compte&notif=login_change');
  exit();
}
else if ($var_user->modif_login($bdd, $login) == 2){
  header('Location: ../index.php?action=compte&notif=login_existant');
  exit();
}
header('Location: ../index.php?action=compte&notif=erreur_login');
exit();

?>

<?php

require_once('../modele/model.php');
require_once('../config/setup.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
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

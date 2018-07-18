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
$mail = htmlspecialchars($_POST['mail']);
$var_user = new user;
if ($var_user->modif_mail($bdd, $mail) == 1){
  header('Location: ../index.php?action=compte&notif=mail_change');
  exit();
}
header('Location: ../index.php?action=compte&notif=erreur_mail');
exit();

?>

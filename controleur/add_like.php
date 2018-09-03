<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');

print_r($_POST);
exit ();
if (isset($_SESSION['user']) && $_SESSION['user'] != null){
  $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
  $var = new like;
  $var->add_like($bdd, $_POST['img_id'], $_SESSION['user']);
}
else {
  return (0);
}
?>

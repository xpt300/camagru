<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');

if (isset($_SESSION['user']) && $_SESSION['user'] != null){
  $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
  $var = new like;
  $var->remove_like($bdd, $_POST['name'], $_SESSION['user']);
  print('success');
}
else {
    print('false');
}
?>

<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');
if (isset($_SESSION['user']) && $_SESSION['user'] != null){
  $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
  $var = new comment;
  $var->add_comment($bdd, $_POST['comment'], $_POST['user'], $_POST['image']);
  $var = new user;
  $var_img = new img;
  $user = $var_img->user_img($bdd, $_POST['image']);
  $mail = $var->mail($bdd, $user);
  $prenom = $var->prenom($bdd, $user);
  $verif = $var->notification_user($bdd, $user);
  if ($verif == 'Y'){
      $var->send_mail(3, 0, $mail, $prenom, $user);
  }
  header('Location: ../index.php');
  exit();
}
else {
  header('Location: ../index.php?authentification=no');
  exit();
}
?>

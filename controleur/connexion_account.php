<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$var = new user;
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['mdp']);
$reponse_login = $bdd->query('SELECT login FROM account');
while ($donnees = $reponse_login->fetch()){
  if ($login == $donnees['login']){
    if ($var->valid_user($login, $bdd) == 0){
      header('Location: ../connexion.php?mail=validation');
      exit();
    }
    $reponse_password = $bdd->query('SELECT mdp FROM account WHERE login = "'.$login.'"');
    $donnees = $reponse_password->fetch();
    // print($donnees['mdp']);
    // print($password);
    // exit();
    $password = hash("whirlpool", $password);
    if ($donnees['mdp'] == $password){
      $_SESSION['user'] = $login;
      $reponse_notif = $bdd->query('SELECT notification FROM account WHERE login = "'.$login.'"');
      $donnees = $reponse_notif->fetch();
      if ($donnees['notification'] == 'Y'){
          $_SESSION['notification'] = 'On';
      }
      else {
          $_SESSION['notification'] = 'Off';
      }
      $reponse_mail = $bdd->query('SELECT mail FROM account WHERE login = "'.$login.'"');
      $donnees = $reponse_mail->fetch();
      $_SESSION['mail'] = $donnees['mail'];
      header('Location: ../index.php');
      exit();
    }
    header('Location: ../connexion.php?mdp=erreur_302');
    exit();
    }
  }
}
header('Location: ../connexion.php?login=erreur');
exit();


?>

<?php

require_once('../modele/model.php');
require_once('../config/setup.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try
    {
      $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch(PDOException $e)
    {
          echo 'Erreur : '.$e->getMessage();
          exit();
    }
    $var = new user;
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['mdp']);
    if ($var->valid_user($login, $bdd) == 0){
      header('Location: ../connexion.php?mail=validation');
      exit();
    }
    $reponse_login = $bdd->query('SELECT login FROM account WHERE login = "'.$login.'"');
    $donnees = $reponse_login->fetch();
    if ($login == $donnees['login']){
      $array["mdp"] = hash("whirlpool", $password);
      $reponse_password = $bdd->query('SELECT mdp FROM account WHERE mdp = "'.$array['mdp'].'"');
      $donnees = $reponse_password->fetch();
      if ($array['mdp'] == $donnees['mdp']){
        $_SESSION['user'] = $login;
        $reponse_mail = $bdd->query('SELECT mail FROM account WHERE login = "'.$login.'"');
        $donnees = $reponse_mail->fetch();
        $_SESSION['mail'] = $donnees['mail'];
        header('Location: ../index.php');
        exit();
      }
    }
    header('Location: ../index.php?action=connexion&connexion=erreur');
    exit();
}

?>

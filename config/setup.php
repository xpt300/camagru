<?php

require_once('database.php');

function database_setup($DB_LOCAL, $DB_USER, $DB_PASSWORD) {
  try
  {
    $bdd = new PDO($DB_LOCAL, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }
  catch(PDOException $e)
  {
        echo 'Erreur : '.$e->getMessage();
        return (0);
  }
  $sql = "CREATE DATABASE IF NOT EXISTS `camagru`";
      $bdd->exec($sql);
  return (1);
}

function table($DB_DNS, $DB_USER, $DB_PASSWORD) {
  try
  {
    $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }
  catch(PDOException $e)
  {
        echo 'Erreur : '.$e->getMessage();
        return (0);
  }
  $sql = "CREATE TABLE IF NOT EXISTS `account` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    login VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    valider INT,
    key_user VARCHAR(255) NOT NULL)";
    $bdd->exec($sql);
    return (1);
}

function database_co($DB_LOCAL, $DB_USER, $DB_PASSWORD) {
  try
  {
    $bdd = new PDO($DB_LOCAL, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }
  catch(PDOException $e)
  {
        echo 'Erreur : '.$e->getMessage();
        return(0);
  }
  return ($bdd);
}
?>

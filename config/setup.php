<?php

require('database.php');

try
{
  $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(PDOException $e)
{
      echo 'Erreur : '.$e->getMessage();
      exit;
}
if ($bdd->exec('CREATE DATABASE IF NOT EXISTS camagru')) {
    $bdd_create = "CREATE DATABASE camagru";
    $bdd->exec($bdd_create);
}

if ($bdd->exec('CREATE TABLE IF NOT EXISTS account')) {
    $bdd_create = "CREATE TABLE account ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, valider INT, key_user VARCHAR(255) NOT NULL)";
    $bdd->exec($bdd_create);
}

?>

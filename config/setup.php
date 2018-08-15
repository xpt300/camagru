<?php

require_once('database.php');


try
{
  $bdd = new PDO($DB_LOCAL, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(PDOException $e)
{
      echo 'Erreur : '.$e->getMessage();
      exit();
}
$sql = $bdd->prepare("CREATE DATABASE IF NOT EXISTS `camagru`");
    $sql->execute();



try
{
$bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(PDOException $e)
{
    echo 'Erreur : '.$e->getMessage();
    exit();
}
$sql = $bdd->prepare("CREATE TABLE IF NOT EXISTS `account` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    login VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    valider ENUM ('Y', 'N'),
    notification ENUM ('Y', 'N'),
    key_user VARCHAR(255) NOT NULL)");
$sql->execute();
$sql = $bdd->prepare("CREATE TABLE IF NOT EXISTS `img` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    path_img VARCHAR(255) NOT NULL,
    date_img DATE)");
$sql->execute();
$sql = $bdd->prepare("CREATE TABLE IF NOT EXISTS `like` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    img_id INT NOT NULL)");
$sql->execute();
$sql = $bdd->prepare("CREATE TABLE IF NOT EXISTS `comment` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    img_id INT NOT NULL,
    date_comment DATE NOT NULL)");
$sql->execute();

?>

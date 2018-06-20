<?php


function valid_user($user){
	$DB_DNS = 'mysql:host=localhost;dbname=camagru;charset=utf8';
	$DB_USER = 'root';
	$DB_PASSWORD = 'aymeric';
	try
    {
      $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch(PDOException $e)
    {
          echo 'Erreur : '.$e->getMessage();
          exit;
    }
    $reponse = $bdd->query('SELECT valider FROM account WHERE login = "'.$user.'"');
    $donnee = $reponse->fetch();
    if ($donnee['valider'] == 1)
    	return (1);
    return (0);
 }
 ?>

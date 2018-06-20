<?php
session_start();

require('./config/setup.php');

try
{
  $bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch(PDOException $e)
{
      echo 'Erreur : '.$e->getMessage();
      exit;
}

if (isset($_GET['code'])){
    $reponse = $bdd->query('SELECT key_user FROM account');
    while ($donnee = $reponse->fetch()){
      if ($donnee["key_user"] == $_GET["code"]){
        $bdd->exec('UPDATE account SET valider = 1 WHERE login = "'.$_GET['id'].'"');
        break;
      }
    }
}

class user{
  function create_account{
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    	if ($_POST["login"] === "" || $_POST["mdp"] === "" || $_POST["mail"] === ""){
    		echo "ERROR\n";
        return (0);
    	}
    	else if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $_POST["mdp"])) {
    	 echo "Mot de passe non conforme\n";
       return (0);
    	}
    	else if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
    		    echo 'Cet email est incorrect.';
            return (0);
    	}
    	else
    	{
    		extract($_POST);
    		$array["mdp"] = hash("whirlpool", $mdp);
    		$array["key_user"] = hash("whirlpool", $mdp);
    		// se connect a la base de donne
    		try
    		{
    			$bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    		}
    		catch(PDOException $e)
    		{
    	        echo 'Erreur : '.$e->getMessage();
    	        exit;
    		}
    		$reponse = $bdd->query('SELECT login FROM account');
    		while ($donnee = $reponse->fetch())
    		{
    			if ($donnee["login"] == $login){
    				exit("Login deja existant \n");
            return (0);
    			}
    		}
    		$_SESSION['user'] = $login;
    		// On ajoute une entrée dans la table account
    		$req = $bdd->prepare('INSERT INTO account(prenom, login, mail, mdp, key_user, valider) VALUES (:prenom, :login, :mail, :mdp, :key_user, :valider)');
    		$req->execute(array(
    			'prenom' => $prenom,
    			'login' => $login,
    			'mail' => $mail,
    			'mdp' => $array["mdp"],
    			'key_user' => $array["key_user"],
    			'valider' => 0
    		));
    		send_mail($array["key_user"], $mail, $prenom, $login);
    	}
      return (1);
    }
    return (0);
  }
  function send_mail($key_user, $mail, $prenom, $login){
  	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
  	{
  		$passage_ligne = "\r\n";
  	}
  	else
  	{
  		$passage_ligne = "\n";
  	}
    // Titre de l'email
    $sujet = 'Camagru';

    // Contenu du message de l'email
    $message = '<html>';
    $message .= '<head><title>New account CAMAGRU</title></head>';
    $message .= '<body><center><p>Bonjour <strong>'.$prenom.'</strong><br />Merci de valider votre email:<br /><a href="http://localhost:8080/camagru/index.php?code='.$key_user.'&id='.$login.'"><strong>VALIDATION</strong></a></p></center></body>';
    $message .= '</html>';
    $message = wordwrap($message, 70, "\r\n");

    // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
    $headers = 'MIME-Version: 1.0'.$passage_ligne;
    $headers .= 'Content-type: text/html; charset=iso-8859-1'.$passage_ligne;

    // Fonction principale qui envoi l'email
    mail($mail, $sujet, $message, $headers);
    return (1);
  }
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
}
?>
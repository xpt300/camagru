<?php
session_start();

require_once('./../config/setup.php');

if (isset($_GET['code'])){
    $reponse = $bdd->query('SELECT key_user FROM account');
    while ($donnee = $reponse->fetch()){
      if ($donnee["key_user"] == $_GET["code"]){
        $bdd->exec('UPDATE account SET valider = 1 WHERE login = "'.$_GET['id'].'"');
        break;
      }
    }
}
// class user avec toutes ses fonctions.
class user{
  function create_account($prenom, $login, $mail, $mdp, $key_user, $bdd){
		$array["mdp"] = hash("whirlpool", $mdp);
		$reponse = $bdd->query('SELECT login FROM account');
		while ($donnee = $reponse->fetch())
		{
			if ($donnee["login"] == $login){
        return (0);
			}
		}
    $reponse = $bdd->query('SELECT mail FROM account');
    while ($donnee = $reponse->fetch())
		{
			if ($donnee["mail"] == $mail){
        return (-1);
			}
		}

		// On ajoute une entrée dans la table account
		$req = $bdd->prepare('INSERT INTO account(prenom, login, mail, mdp, key_user, valider) VALUES (:prenom, :login, :mail, :mdp, :key_user, :valider)');
		$req->execute(array(
			'prenom' => $prenom,
			'login' => $login,
			'mail' => $mail,
			'mdp' => $array["mdp"],
			'key_user' => $key_user,
			'valider' => 0
		));
    return (1);
	}
  // fonction d'envoi de mail
  function send_mail($var_mail, $key_user, $mail, $prenom, $login){
  	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
  	{
  		$passage_ligne = "\r\n";
  	}
  	else
  	{
  		$passage_ligne = "\n";
  	}
    if ($var_mail == 1){
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
    }
    else if ($var_mail == 2){
      // Titre de l'email
      $sujet = 'Camagru';

      // Contenu du message de l'email
      $message = '<html>';
      $message .= '<head><title>Changement de Password CAMAGRU</title></head>';
      $message .= '<body><center><p>Bonjour <strong>'.$prenom.'</strong><br />Merci de suire ce lien pour changer votre mot de passe:<br /><a href="http://localhost:8080/camagru/index.php?code='.$key_user.'&id='.$login.'"><strong>CHANGER MOT DE PASSE</strong></a></p></center></body>';
      $message .= '</html>';
      $message = wordwrap($message, 70, "\r\n");

      // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
      $headers = 'MIME-Version: 1.0'.$passage_ligne;
      $headers .= 'Content-type: text/html; charset=iso-8859-1'.$passage_ligne;
    }
    // Fonction principale qui envoi l'email
    if (mail($mail, $sujet, $message, $headers)){
      return (1);
    }
    return (0);
  }
  // fonction qui valide le check du mail et de la confirmation de compte.
  function valid_user($user){
    $reponse = $bdd->query('SELECT valider FROM account WHERE login = "'.$user.'"');
    $donnee = $reponse->fetch();
    if ($donnee['valider'] == 1)
    	return (1);
    return (0);
   }
   function modif_mail($bdd, $mail){
     $reponse_mail = $bdd->query('SELECT mail FROM account WHERE mail = "'.$_SESSION['mail'].'"');
     $donnees = $reponse_mail->fetch();
     if ($_SESSION['mail'] == $donnees['mail']){
       $req = $bdd->prepare("UPDATE account SET mail= ? WHERE mail= ?");
       $req->execute(array($mail, $_SESSION['mail']));
       $_SESSION['mail'] = $mail;
       return (1);
     }
     return (0);
   }
   function modif_login($bdd, $login){
     $reponse_login = $bdd->query('SELECT login FROM account WHERE login = "'.$_SESSION['user'].'"');
     $donnees = $reponse_login->fetch();
     $reponse = $bdd->query('SELECT login FROM account');
		while ($donnee = $reponse->fetch())
		{
			if ($donnee["login"] == $login){
       return (2);
			}
		}
     if ($_SESSION['user'] == $donnees['login']){
       $req = $bdd->prepare("UPDATE account SET login= ? WHERE login= ?");
       $req->execute(array($login, $_SESSION['user']));
       $_SESSION['user'] = $login;
       return (1);
     }
     return (0);
   }
}
?>

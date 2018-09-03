<?php


// require_once('./../config/setup.php');

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
		$req = $bdd->prepare('INSERT INTO account(prenom, login, mail, mdp, key_user, valider, notification) VALUES (:prenom, :login, :mail, :mdp, :key_user, :valider, :notification)');
		$req->execute(array(
			'prenom' => $prenom,
			'login' => $login,
			'mail' => $mail,
			'mdp' => $array["mdp"],
			'key_user' => $key_user,
			'valider' => 'N',
            'notification' => 'Y'
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
      $message .= '<body><center><p>Bonjour <strong>'.$prenom.'</strong><br />Merci de valider votre email:<br /><a href="http://localhost:8080/camagru/controleur/verification_account.php?code='.$key_user.'"><strong>VALIDATION</strong></a></p></center></body>';
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
      $message .= '<body><center><p>Bonjour <strong>'.$prenom.'</strong><br />Merci de suivre ce lien pour changer votre mot de passe:<br /><a href="http://localhost:8080/camagru/change-password.php?code='.$key_user.'"><strong>CHANGER MOT DE PASSE</strong></a></p></center></body>';
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
  function valid_user($user, $bdd){
    $reponse = $bdd->query('SELECT valider FROM account WHERE login = "'.$user.'"');
    $donnee = $reponse->fetch();
    if ($donnee['valider'] == 'Y')
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
		while ($donnees = $reponse->fetch())
		{
			if ($donnees["login"] == $login){
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
   function password_lost($mail, $bdd){
     $reponse_account = $bdd->query('SELECT `prenom`, `mail`, `login`, `mdp`, `key_user` FROM `account` WHERE mail = "'.$mail.'"');
     $donnees = $reponse_account->fetch();
     if ($mail == $donnees['mail']){
       $user_var = new user;
       if ($user_var->send_mail(2, $donnees['key_user'], $donnees['mail'], $donnees['prenom'], $donnees['login']) == 1) {
         return (1);
       }
     }
     else {
       return (0);
     }
   }
   function verification_account($bdd, $code){
     $validate = 0;
     $reponse_code = $bdd->query('SELECT `key_user` FROM `account`');
     while ($donnees = $reponse_code->fetch()){
       if ($code == $donnees['key_user']){
         $validate = 1;
         break;
       }
     }
     if ($validate == 1){
       $reponse_verif = $bdd->query('SELECT `valider` FROM `account` WHERE key_user = "'.$code.'"');
       $verif = $reponse_verif->fetch();
       if ($verif['valider'] == 'Y'){
         return (2);
       }
       $reponse = $bdd->prepare('UPDATE account set valider= ? WHERE key_user = ?');
       $reponse->execute(array('Y', $code));
       return (1);
     }
     return (0);
   }
   function modif_password($bdd, $key_user, $mdp, $num){
     if ($num == 0){
       $reponse = $bdd->query('SELECT key_user FROM account');
  		 while ($donnee = $reponse->fetch()){
  			if ($donnee['key_user'] == $key_user){
              $req = $bdd->prepare("UPDATE account SET mdp= ? WHERE key_user= ?");
              $array["mdp"] = hash("whirlpool", $mdp);
              $req->execute(array($array['mdp'], $key_user));
              $reponse_login = $bdd->query('SELECT login FROM account WHERE key_user = "'.$key_user.'"');
              $donnees = $reponse_login->fetch();
              $reponse_login = $bdd->query('SELECT mail FROM account WHERE key_user = "'.$key_user.'"');
              $donnees = $reponse_login->fetch();
              $_SESSION['mail'] = $donnees['mail'];
              $length = 25;
              $token = bin2hex(random_bytes($length));
              $req = $bdd->prepare("UPDATE account SET key_user= ? WHERE login= ?");
              $req->execute(array($key_user_new, $donnees['login']));
              return (1);
  			}
  		}
      return (0);
    }
    // $key user devient le login
    else {
       $req = $bdd->prepare("UPDATE account SET mdp= ? WHERE login= ?");
       $array["mdp"] = hash("whirlpool", $mdp);
       $req->execute(array($array['mdp'], $key_user));
       $reponse_mail = $bdd->query('SELECT mail FROM account WHERE login = "'.$key_user.'"');
       $donnees = $reponse_mail->fetch();
       $_SESSION['mail'] = $donnees['mail'];
       return (1);
     }
     return (0);
    }
    function modif_notification($bdd, $login){
        $reponse = $bdd->query('SELECT notification FROM account WHERE login ="'.$login.'"');
        $donnee = $reponse->fetch();
        print($donnee['notification']);
        if ($donnee['notification'] == 'Y'){
            $req = $bdd->prepare("UPDATE account SET notification= 'N' WHERE login= ?");
            $req->execute(array($login));
            return (1);
        }
        else {
            $req = $bdd->prepare("UPDATE account SET notification= 'Y' WHERE login= ?");
            $req->execute(array($login));
            return (2);
        }
    }
}
class img{
    function add_img($bdd, $user, $path){
        $reponse = $bdd->query('SELECT id FROM account WHERE login = "'.$user.'"');
        $donnee = $reponse->fetch();
        $today = date("Y-m-d");
        $req = $bdd->prepare('INSERT INTO img(user_id, path_img, date_img) VALUES (:user_id, :path_img, :date_img)');
    	$req->execute(array('user_id' => $donnee['id'],'path_img' => $path, 'date_img' => $today));
    }
    function delete_img($bdd, $path){
        $req = $bdd->prepare('DELETE FROM img WHERE path_img = ?');
        $req->execute(array($path));
    }
    function superposition_img($path_destination, $path_source, $destination_x, $destination_y, $largeur_source, $hauteur_source){
         // header ("Content-type: image/png");
        // Traitement de l'image source

        $array = explode(".", $path_source);
        $new_path = "..".$array[2]."mini.".$array[3];
        if (file_exists($new_path)){
            $array_size = getimagesize($new_path);
            $source = imagecreatefrompng($new_path);
        }
        else {
            $size = getimagesize($path_source);
            $source = imagecreatefrompng($path_source);
            $img_petite = imagecreatetruecolor($largeur_source,$hauteur_source);
            imagecolortransparent($img_petite, imagecolorallocate($img_petite, 0, 0, 0));
            imagecopyresampled($img_petite,$source,0,0,0,0,$largeur_source,$hauteur_source,$size[0],$size[1]);
            imagepng($img_petite, $new_path);
            $source = imagecreatefrompng($new_path);
            imagealphablending($source, true);
            imagesavealpha($source, true);
        }
        $var = 0;
        if (image_type_to_mime_type(exif_imagetype($path_destination)) == "image/png"){
            // Traitement de l'image destination
            $destination = imagecreatefrompng($path_destination);
            $largeur_destination = imagesx($destination);
            $hauteur_destination = imagesy($destination);
            $var = 1;
        }
        else if (image_type_to_mime_type(exif_imagetype($path_destination)) == "image/gif"){
            $destination = imagecreatefromgif($path_destination);
            $largeur_destination = imagesx($destination);
            $hauteur_destination = imagesy($destination);
            $var = 2;
        }
        else {
            $destination = imagecreatefromjpeg($path_destination);
            $largeur_destination = imagesx($destination);
            $hauteur_destination = imagesy($destination);
            $var = 3;
        }
        // On place l'image source dans l'image de destination
        imagecopy($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source);
        if ($var == 1){
            imagepng($destination, $path_destination);
        }
        else if ($var == 2){
            imagegif($destination, $path_destination);
        }
        else {
            imagejpeg($destination, $path_destination);
        }
        imagedestroy($source);
        imagedestroy($destination);
    }
    function id_img($bdd, $path_img){
      $reponse_id = $bdd->query('SELECT id FROM img WHERE path_img = "'.$path_img.'"');
      $img_id = $reponse_id->fetch();
      return ($img_id);
    }
}
class comment{
    function add_comment($bdd, $str, $user, $path_img){
        $reponse = $bdd->query('SELECT id FROM account WHERE login = "'.$user.'"');
        $user_id = $reponse->fetch();
        $reponse = $bdd->query('SELECT id FROM img WHERE path_img = "'.$path_img.'"');
        $img_id = $reponse->fetch();
        $req = $bdd->prepare('INSERT INTO comment(user_id, content, img_id, date_comment) VALUES (:user_id, :content, :img_id, :date_comment)');
        $req->execute(array('user_id' => $user_id['id'],'content' => $str, 'img_id' => $img_id['id'], 'date_comment' => date("Y-m-d H:i:s")));
    }
    function content_img($bdd, $path_image, $img_id){
      $i = 0;
      $reponse_content = $bdd->query('SELECT content FROM comment WHERE img_id = "'.$img_id.'" ORDER BY id DESC');
      while ($donnees = $reponse_content->fetch()){
        $content[$i] = $donnees['content'];
        $i++;
      }
      return ($content);
    }
    function date_comment($bdd, $img_id){
      $i = 0;
      $reponse_img = $bdd->query('SELECT date_comment FROM comment WHERE img_id = "'.$img_id.'" ORDER BY id DESC');
      while ($donnees = $reponse_img->fetch()){
        $date_comment[$i] = $donnees['date_comment'];
        $i++;
      }
      return ($date_comment);
    }
    function prenom_comment($bdd, $img_id){
      $i = 0;
      $reponse_id = $bdd->query('SELECT user_id FROM comment WHERE img_id = "'.$img_id.'"');
      while ($donnees = $reponse_id->fetch()){
        $reponse_prenom = $bdd->query('SELECT prenom FROM account WHERE  id = "'.$donnees['user_id'].'"');
        $prenom_tmp = $reponse_prenom->fetch();
        $prenom[$i] = $prenom_tmp['prenom'];
        $i++;
      }
      return ($prenom);
    }
    function nb_comment($bdd, $img_id){
      $reponse_lenght = $bdd->query('SELECT COUNT(img_id) FROM comment WHERE img_id = "'.$img_id.'"');
      $lenght_com = $reponse_lenght->fetch();
      return ($lenght_com);
    }
}
class like{
  function count_like($bdd, $img_id){
    $reponse_like = $bdd->query('SELECT COUNT(user_id) FROM `like` WHERE img_id = "'.$img_id.'"');
    $count_like = $reponse_like->fetch();
    return ($count_like);
  }
  function add_like($bdd, $img_id, $user){
    $reponse_add = $bdd->prepare('INSERT INTO `like` VALUES (:user_id, :img_id)');
    $reponse_add->execute(array('user_id' => $user,'img_id' => $img_id));
  }
  function remove_like($bdd, $img_id, $user){
    $reponse_add = $bdd->prepare('DELETE FROM `like` WHERE user_id = "'.$user.'"');
    $reponse_add->execute();
  }
  function valid_like($bdd, $img_id, $user){
    $reponse_user = $bdd->query('SELECT user_id FROM `like` WHERE img_id = "'.$img_id.'"');
    while ($donnee = $reponse_user->fetch()){
      if ($donnee['user_id'] == $user){
        return (1);
      }
      return (0);
    }
  }
}
?>

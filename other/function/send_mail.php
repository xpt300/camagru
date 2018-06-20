<?php

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
}
?>

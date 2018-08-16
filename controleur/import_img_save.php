<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);

extract($_POST);
var_dump($_FILES);


// On définit l'extention du fichier puis on le nomme par le timestamp actuel
if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpeg'; }
if ($_FILES['fichier']['type'] == 'image/jpg') { $extention = '.jpg'; }
if ($_FILES['fichier']['type'] == 'image/png') { $extention = '.png'; }
if ($_FILES['fichier']['type'] == 'image/gif') { $extention = '.gif'; }
$nom_fichier = time().$extention;

// On upload le fichier sur le serveur.
if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier))
{
 $url = 'www.monsite.com/'.$repertoire.''.$nom_fichier.'';
 echo 'Votre image à été uploadée sur le serveur avec succes!<br>Voici le lien: <input type="text" value="' . $url . '" size="60">';
}
else
{
 echo 'L\'image n\'a pas pu être uploadée sur le serveur.';
}
$var = new img;
$num = $var->save_img($bdd, $user);
header('Location: ../photo.php');
exit();

?>

<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);

$dossier = '../other/image/tmp';
if(!is_dir($dossier)){
   mkdir($dossier);
}
$repertoire = "../other/image/tmp/";

// On définit l'extention du fichier puis on le nomme par le timestamp actuel
if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpeg'; }
if ($_FILES['fichier']['type'] == 'image/jpg') { $extention = '.jpeg'; }
if ($_FILES['fichier']['type'] == 'image/png') { $extention = '.png'; }
if ($_FILES['fichier']['type'] == 'image/gif') { $extention = '.gif'; }
$nom_fichier = time().$extention;
$var = new img;
// On upload le fichier sur le serveur.
if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier))
{
    // $repertoire = "./other/image/"
    // $path = $repertoire.$nom_fichier;
    // $var->add_img($bdd, $_SESSION['user'], $path);
    $_SESSION['import'] = 1;
    $_SESSION['path'] = "camagru/".$repertoire.$nom_fichier;
    header('Location: ../photo.php');
    exit();
}
else {
    header('Location: ../photo.php');
    exit();
}
?>

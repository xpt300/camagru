<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
if (isset($_POST['src'])){
    $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
    $var = new img;
    $data = $_POST['image'];
    $tab = explode("/", $data);
    $rename = "../other/image/".$tab[7];
    $data = "../other/image/tmp/".$tab[7];
    if (!rename($data, $rename)){
        header('Location: ../photo.php');
        exit();
    }
    $i = 1;
    $var = "filter".$i;
    while ($i < 7){
        if (isset($_POST[$var])){
            print($_POST[$var]);
        }
        $i++;
        $var = "filter".$i;
    }
    $var->add_img($bdd, $user, "./other/image/$tab[7]");
    if (isset($_SESSION['import'])){
        $_SESSION['import'] = 0;
    }
    header('Location: ../photo.php');
    exit();
}
else {
    $i = 1;
    $var = "filter".$i;
    while ($i < 7){
        if (isset($_POST[$var])){
            print($_POST[$var]);
        }
        $i++;
        $var = "filter".$i;
    }
    exit();
    $bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
    $var = new img;
    $data = $_POST['image'];
    $image = explode('base64,',$data);
    $nom_fichier = time();
    $pathimg = "../other/image/$nom_fichier.png";
    $fic=fopen($pathimg,"wb");
    fwrite($fic,base64_decode($image[1]));
    fclose($fic);
    $var->add_img($bdd, $user, "./other/image/$nom_fichier.png");
    header('Location: ../photo.php');
    exit();
}
?>

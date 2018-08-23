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
    $var->add_img($bdd, $user, "./other/image/$tab[7]");
    $i = 1;
    $filter = "filter".$i;
    while ($i < 7){
         if (isset($_POST[$filter])){
            $array = explode("/", $_POST[$filter]);
            $array = explode(";", $array[6]);
            $destination = "../other/StickPNG/".$array[0];
            $array = explode(";", $_POST[$filter]);
            $coor_x = $array[1] - $array[3];
            $coor_y = $array[2] - $array[4];
            $var->superposition_img($rename, $destination, $coor_x, $coor_y, $array[5], $array[6]);
        }
        $i++;
        $filter = "filter".$i;
    }
    if (isset($_SESSION['import'])){
        $_SESSION['import'] = 0;
    }
    header('Location: ../photo.php');
    exit();
}
else {
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
    $i = 1;
    $filter = "filter".$i;
    while ($i < 7){
         if (isset($_POST[$filter])){
            $array = explode("/", $_POST[$filter]);
            $array = explode(";", $array[6]);
            $destination = "../other/StickPNG/".$array[0];
            $array = explode(";", $_POST[$filter]);
            $coor_x = $array[1] - $array[3];
            $coor_y = $array[2] - $array[4];
            $var->superposition_img("../other/image/$nom_fichier.png", $destination, $coor_x, $coor_y, $array[5], $array[6]);
        }
        $i++;
        $filter = "filter".$i;
    }
    header('Location: ../photo.php');
    exit();
}
?>

<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$var = new img;
$num = $var->save_img($bdd, $user);
$data = $_POST['image'];
$image = explode('base64,',$data);
$pathimg = "../other/image/image$user$num.png";
$fic=fopen($pathimg,"wb");
fwrite($fic,base64_decode($image[1]));
fclose($fic);
$var->add_img($bdd, $user, "./other/image/image$user$num.png");
header('Location: ../photo.php');
exit();

?>

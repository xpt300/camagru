<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

$data = $_POST['image'];
$image = explode('base64,',$data);
$fic=fopen("image.png","wb");
fwrite($fic,base64_decode($image[1]));
fclose($fic);

?>

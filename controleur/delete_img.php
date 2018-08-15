<?php
session_start();
require_once('../modele/model.php');
require_once('../config/setup.php');
require_once('../config/database.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$var = new img;
$path = $_POST['image_del'];
$var->delete_img($bdd, $path);
header('Location: ../photo.php');
exit();

?>

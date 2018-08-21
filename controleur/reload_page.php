<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');

if (isset($_SESSION['import'])){
    $_SESSION['import'] = 0;
}

header('Location: ../photo.php');
exit();


?>

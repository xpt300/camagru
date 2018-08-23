<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');

var_dump($_POST);
exit();
?>

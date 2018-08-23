<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);
$var = new comment;
$var->add_comment($bdd, $_POST['comment'], $_POST['user'], $_POST['image']);
header('Location: ../index.php');
exit();
?>

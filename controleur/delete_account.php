<?php
if (!isset($_SESSION)){
    session_start();
}
require_once('../modele/model.php');
require_once('../config/setup.php');

$bdd = database_co($DB_DNS, $DB_USER, $DB_PASSWORD);

if (isset($_SESSION["user"])){
    session_destroy();
    unset($_SESSION['user']);
    if (is_dir('other/image/tmp')) {
        system('rm -rf ' . escapeshellarg("other/image/tmp"), $retval);
    }
}
$var = new user;
$var->delete_account($bdd, $_POST['user_del']);
header('Location: ../index.php');
exit();

?>

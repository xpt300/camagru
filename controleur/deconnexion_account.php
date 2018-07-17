<?php

if (isset($_SESSION["user"])){
    session_destroy();
    unset($_SESSION['user']);
    header("refresh:2;url=index.php");
}

?>

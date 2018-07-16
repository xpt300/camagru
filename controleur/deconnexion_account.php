<?php

if (isset($_SESSION["user"])){
    session_destroy();
    header("refresh:3;url=index.php");
}

?>

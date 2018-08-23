<?php
if (isset($_SESSION["user"])){
    session_destroy();
    unset($_SESSION['user']);
    if (is_dir('other/image/tmp')) {
        // rmdir('other/image/tmp');
        system('rm -rf ' . escapeshellarg("other/image/tmp"), $retval);
    }
    header("refresh:2;url=index.php");
}

?>

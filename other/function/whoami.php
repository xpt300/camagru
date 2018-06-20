<?PHP
session_start();
if ($_SESSION["logged_on_user"])
	echo '$_SERVER["logged_on_user"]\n';
else
	echo "ERROR\n";
?>

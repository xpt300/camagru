<?PHP
if ($_POST["submit"] != "OK" || $_POST["login"] === "" ||
	$_POST["oldpw"] === "" || $_POST["newpw"] === "")
	echo "ERROR\n";
else
{
	$array["oldpw"] = hash("whirlpool", $_POST["oldpw"]);
	$array["newpw"] = hash("whirlpool", $_POST["newpw"]);
	$array["login"] = $_POST["login"];
	$str = file_get_contents("../ex01/private/passwd");
	$tab = unserialize($str);
	$i = 0;
	while ($tab[$i])
	{
		if ($tab[$i]["login"] == $array["login"] &&
			$tab[$i]["passwd"] == $array["oldpw"])
		{
			$tab[$i]["passwd"] = $array["newpw"];
			file_put_contents("../ex01/private/passwd", serialize($tab));
			echo "OK\n";
			return ;
		}
		$i++;
	}
	echo "ERROR\n";
}

?>

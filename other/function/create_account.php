<?PHP

header("Location: ../index.php");

session_start();

include '../config/database.php';
include './send_mail.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($_POST["login"] === "" || $_POST["mdp"] === "" || $_POST["mail"] === ""){
		echo "ERROR\n";
	}
	else if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $_POST["mdp"])) {
	 echo "Mot de passe non conforme\n";
	}
	else if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
		    echo 'Cet email est incorrect.';
	}
	else
	{
		extract($_POST);
		$array["mdp"] = hash("whirlpool", $mdp);
		$array["key_user"] = hash("whirlpool", $mdp);
		// se connect a la base de donne
		try
		{
			$bdd = new PDO($DB_DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		}
		catch(PDOException $e)
		{
	        echo 'Erreur : '.$e->getMessage();
	        exit;
		}
		$reponse = $bdd->query('SELECT login FROM account');
		while ($donnee = $reponse->fetch())
		{
			if ($donnee["login"] == $login){
				exit("Login deja existant \n");
			}
		}
		$_SESSION['user'] = $login;
		// On ajoute une entrée dans la table account
		$req = $bdd->prepare('INSERT INTO account(prenom, login, mail, mdp, key_user, valider) VALUES (:prenom, :login, :mail, :mdp, :key_user, :valider)');
		$req->execute(array(
			'prenom' => $prenom,
			'login' => $login,
			'mail' => $mail,
			'mdp' => $array["mdp"],
			'key_user' => $array["key_user"],
			'valider' => 0
		));
		send_mail($array["key_user"], $mail, $prenom, $login);
	}
}
?>

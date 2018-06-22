<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="./other/css/style.css">
	<title>Camagru</title>
</head>
<body>
<div class="Degrade hero is-fullheight">
<?php
require('view/viewNav.php');
if (isset($_GET['action']))
{
	if ($_GET['action'] == 'login') {
		require('view/viewForm.php');
	}
	else if ($_GET['action'] == 'connexion'){

	}
	else if ($_GET['action'] == 'photo'){

	}
}
else if (isset($_GET['mail']) && $_GET['mail'] == 'validation')
{
	require('view/viewNotifmail.php');
	require('view/viewForm.php');
}
else if (isset($_GET['login']) && $_GET['mail'] == 'existant')
{
	require('view/viewNotiflogin.php');
	require('view/viewForm.php');
}
else if (isset($_GET['mdp']) && $_GET['mdp'] == 'erreur')
{
	require('view/viewNotifmdp.php');
	require('view/viewForm.php');
}
else {
	require('view/viewAccueil.php');
}
?>
  </div>
	<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>Camagru</strong> by Maxime Joubert (mjoubert)
    </p>
  </div>
</footer>
</div>
</body>
</html>

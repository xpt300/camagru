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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<title>Camagru</title>
</head>
<body>
<div class="Degrade hero is-fullheight">
<?php
require('view/viewNav.php');
if (isset($_GET['login']) || isset($_GET['mdp']) || isset($_GET['mail'])){
  require('view/viewNotif.php');
}

if (isset($_SESSION['user'])){
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'deconnexion') {
      require('view/viewDeco.php');
      require('controleur/deconnexion_account.php');
    }
  }
  else {
    require('view/viewAccueil.php');
  }
}
else {
  if (isset($_GET['action']))
  {
  	if ($_GET['action'] == 'login') {
  		require('view/viewForm.php');
  	}
  	else if ($_GET['action'] == 'connexion'){
      if (isset($_GET['connexion']) && $_GET['connexion'] == 'erreur')
      {
      	require('view/viewConnexionErreur.php');
      }
      require('view/viewConnexion.php');
  	}
  }
  else {
  	require('view/viewAccueil.php');
  }
}
?>

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

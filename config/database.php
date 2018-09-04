<?PHP

$DB_DNS = 'mysql:host=localhost;dbname=camagru;charset=utf8';
$DB_USER = 'root';
$DB_PASSWORD = 'aymeric69';
$DB_LOCAL = 'mysql:host=localhost;charset=utf8';

function database_co($DB_LOCAL, $DB_USER, $DB_PASSWORD) {
  try
  {
    $bdd = new PDO($DB_LOCAL, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(PDOException $e)
  {
        echo 'Erreur : '.$e->getMessage();
        return(0);
  }
  return ($bdd);
}
?>

<?php

$db_user = "identifiant";
$db_passwd = "root";
$db_host = "localhost";
$db_port = "3306";
$db_name = "exo";
$db_dataSourceName = "mysql:host=$db_host;port=$db_port;dbname=$db_name";

$PDO = new PDO($db_dataSourceName, $db_user, $db_passwd);
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$numeroDePage = isset($_GET["numeropage"]) ? $_GET["numeropage"] : 0;
$nombreParPage = 5;

$limit = $numeroDePage * $nombreParPage;

$reponse = $PDO->query(
    "SELECT nom, console " .
        "FROM jeux_video " .
        "where possesseur like '%e%' " .
        "order by nom, console asc " .
        "limit $limit, $nombreParPage"
);

$toutesLeslignes = $reponse->fetchAll();

// affiche ma page
foreach ($toutesLeslignes as $ligneCourante) {
    echo $ligneCourante['nom'] . ' - console:' . $ligneCourante['console'] . '<br/>';
}

$pageSuivante = $numeroDePage + 1;
$pagePrecedente = $numeroDePage - 1;

// affiche ma pagination
?>

<a href="?numeropage=<?php echo $pagePrecedente ?>">Précédent</a> - <a href="?numeropage=<?php echo $pageSuivante ?>">Suivant</a>
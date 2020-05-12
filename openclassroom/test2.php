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
$nom = isset($_GET['nom']) ? $_GET['nom'] : 'patrick';
// $console = $_GET['console'] ?? 'superNes';

// $limit = $numeroDePage * $nombreParPage;

// /*$reponse = $PDO->query(

//     "SELECT nom, console " .
//         "FROM jeux_video " .
//         "where possesseur = '$name' " .
//         "order by nom, console asc "
//     // "limit $limit, $nombreParPage"
// );*/
// $reqPrepare = $PDO->prepare("SELECT nom, console FROM jeux_video where possesseur = :possesseur order by nom, console asc");
// $reqPrepare->execute(array('possesseur' => $nom));
// $toutesLeslignes = $reqPrepare->fetchAll();

// // affiche ma page
// foreach ($toutesLeslignes as $ligneCourante) {
//     echo $ligneCourante['nom'] . ' - console:' . $ligneCourante['console'] . '<br/>';
// }

// $pageSuivante = $numeroDePage + 1;
// $pagePrecedente = $numeroDePage - 1;

// $PDO->exec("INSERT INTO jeux_video(nom, possesseur, console, prix, commentaires) VALUES('BF3','Lolo', 'PS3', 70 , 'fps de EA')");
$PDO->exec("UPDATE jeux_video SET prix = 1000 WHERE ID>48");

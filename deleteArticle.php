<?php
include ('./Controller/connexion.php');
include ('./header.php');

$connexion = connexionBd();
if(isset($_GET["nomArticle"]))
{
    $params = htmlspecialchars('\''.$_GET["nomArticle"].'\'');
    $sql=" DELETE FROM `article` WHERE `nomArticle` =".$params.";";
    var_dump($sql);
    $count=$connexion->exec($sql);
    header("Location: index.php");
}

?>
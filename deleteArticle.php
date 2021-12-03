<?php
include('./connexion.php');
include ('./header.php');

$connexion = connexionBd();
if(isset($_GET["id_Article"]))
{
    $params = intval($_GET["id_Article"]);
    $sqlDeleteArticle=" DELETE  FROM `article` WHERE `id_article` =".$params;
    $count=$connexion->exec($sqlDeleteArticle);
    header("Location: index.php");
}

?>
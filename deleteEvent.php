<?php
include('./connexion.php');
include ('./header.php');

$connexion = connexionBd();
if(isset($_GET["id_event"]))
{
    $params = htmlspecialchars($_GET["id_event"]);
    $sql=" DELETE FROM `event` WHERE `id_event` ='$params'";
    $count=$connexion->exec($sql);
    header("Location: ./index.php");

}

?>
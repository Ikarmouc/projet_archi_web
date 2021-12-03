<?php
include('./connexion.php');
include ('./header.php');

$connexion = connexionBd();
if(isset($_GET["id_user"]))
{
    $params = htmlspecialchars($_GET["id_user"]);
    $sql=" DELETE FROM `user` WHERE `id_user` ='$params'";
    var_dump($sql);
    $count=$connexion->exec($sql);
    header("Location: ./adminControlPanel.php");

}

?>
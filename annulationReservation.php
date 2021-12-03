<?php
require ('./connexion.php');
require ('./header.php');
$connexion = connexionBd();
if(isset($_GET["id_reservation"]))
{
    $params = htmlspecialchars($_GET["id_reservation"]);

    $sqlReservation = "select * from reservation where id_reservation = ".$params;
    $resultReservation = $connexion->query($sqlReservation)->fetch(PDO::FETCH_OBJ);
    $sqlEvent = "select * from event where id_event = ".$resultReservation->id_event;
    $resultEvent = $connexion->query($sqlEvent)->fetch(PDO::FETCH_OBJ);
    $sqlAnnulation="DELETE FROM reservation WHERE id_reservation =".$params;
    $count=$connexion->exec($sqlAnnulation);
    header("Location: index.php");
    $nbPlaces = $resultReservation->nbplaces;
    $resultEvent->remainingPlaces+= $nbPlaces;
    $sqlUpdateNbPlaceEvent = "UPDATE event SET `remainingPlaces` = ".$resultEvent->remainingPlaces." where id_event = ".$resultEvent->id_event;

    $execAddReservation = $connexion->exec($sqlUpdateNbPlaceEvent);

    header("Location: viewArticle.php?id_Article=".$resultEvent->article);
}

?>



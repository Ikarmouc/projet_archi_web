<?php
require ('./header.php');
require ('./connexion.php');

if (isset($_SESSION["username"]))
{
    $username = $_SESSION["username"];
    $connexion = connexionBd();
    $sqlEvent = "select * from event where id_event = ".$_GET["id_event"];
    $sqlUser = "select * from user where username = '$username'";
    $resultEvent = $connexion->query($sqlEvent)->fetch(PDO::FETCH_OBJ);
    $resultUser = $connexion->query($sqlUser)->fetch(PDO::FETCH_OBJ);

}
else{
    header("Location: index.php");
}

if (isset($_POST["nbplaces"])){
    if($_POST["nbplaces"] > $resultEvent->remainingPlaces){
        var_dump("Attention trop haut");
    }
    else
    {
        $nbPlaces = $_POST["nbplaces"];
        $sqlAddReservation ="Insert into reservation(id_user,id_event,nbplaces) values (".$resultUser->id_user.",".$resultEvent->id_event.",".$nbPlaces.")";
        var_dump($sqlAddReservation);
        $execAddReservation = $connexion->exec($sqlAddReservation);
        $resultEvent->remainingPlaces-= $nbPlaces;
        $sqlUpdateNbPlaceEvent = "UPDATE event SET `remainingPlaces` = ".$resultEvent->remainingPlaces." where id_event = ".$resultEvent->id_event;
        var_dump($sqlUpdateNbPlaceEvent);
        $execAddReservation = $connexion->exec($sqlUpdateNbPlaceEvent);
        header("Location: viewArticle.php?id_Article=".$resultEvent->article);
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <title>Reservation d'un evenement</title>
</head>
<body>
<form method="post">

    <div class="form-floating mb-3">
        <input type="number" min="1" max="<?=$resultEvent->remainingPlaces?>" class="form-control" id="nbplaces" name="nbplaces" required>
        <label class="form-label" for="nbplaces" >Reservation pour combien de personnes ?</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Valider la reservation" />
        <button class="btn btn-danger">
            <a href="./viewArticle.php?id_Article=<?=$resultEvent->article?>" style="color: inherit">Retour</a>
        </button>
    </div>
</form>
</body>
</html>
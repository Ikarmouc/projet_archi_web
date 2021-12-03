<?php
require ('./header.php');
require ('./connexion.php');

$connexion = connexionBd();

if(isset($_GET["id_user"])) {
    $idUser = intval($_GET["id_user"]);
    $sql = "Select re.id_reservation,evt.typeEvent,evt.dateEvent,re.nbplaces
            from reservation re
            join event evt on re.id_event = evt.id_event
            join user usr on usr.id_user = re.id_user
            where usr.id_user =".$idUser.";";
    $listeReservations = $connexion->query($sql)->fetchAll(PDO::FETCH_OBJ);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="display: flex; margin-left: 10%;margin-top :5%; margin-right: 10%;">
    <table class="table table-bordered" style="background-color: white">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Identifiant réservation</th>
            <th scope="col">Evenement</th>
            <th scope="col">Nombre de place réservé</th>
            <th scope="col">Date de l'évenement</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listeReservations as $reservations):?>
            <tr>
                <th scope="col"></th>
                <th scope="col"><?=$reservations->id_reservation?></th>
                <th scope="col"><?=$reservations->typeEvent?></th>
                <th scope="col"><?=$reservations->nbplaces?></th>
                <th scope="col"><?=$reservations->dateEvent?></th>
                <th>
                    <button class="">
                        <a href="annulationReservation.php?id_reservation=<?=$reservations->id_reservation?>">
                            <i class="fa fa-trash"></i>Annuler la réservation
                        </a>
                    </button>
                </th>

            </tr>
        <?php endforeach;?>

        <tfoot>
        <tr>
            <th>

            </th>
        </tr>
        </tfoot>

        </tbody>

    </table>

</div>
</body>
</html>
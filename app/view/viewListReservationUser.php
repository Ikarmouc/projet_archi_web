<?php
namespace app\view;
include ("app/view/header.php");
?>

<body>
<div style="display: flex; flex-direction: column; margin-left: 10%;margin-top :5%; margin-right: 10%;">
    <table class="table " style="background-color: white">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Evenement</th>
            <th scope="col">Nombre de places réservées</th>
            <th scope="col">Date de l'évenement</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listReservation as $reservations):?>
            <tr>
                <th scope="col"></th>
                <th scope="col"><?=$reservations["event"]?></th>
                <th scope="col"><?=$reservations["nbPlaces"]?></th>
                <th scope="col"><?=$reservations["dateEvent"]?></th>
                <th>
                    <button class="btn">
                        <a href="?action=editReservation&id_reservation=<?=$reservations["id_reservation"]?>">
                            <i class="fa fa-edit"></i>
                        </a>
                    </button>
                    <button class="btn">
                        <a href="?action=cancelReservation&id_reservation=<?=$reservations["id_reservation"]?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </button>
                </th>

            </tr>
        <?php endforeach;?>

        <tfoot>


        </tfoot>

        </tbody>

    </table>
    <div style="display: flex; justify-content: center; margin: 5%">


        <button class="btn btn-danger">
            <?php if ( isset($_SESSION["isAdmin"]) && $_SESSION['isAdmin'] == true):?>
            <a href="?action=adminControlPanel">
                <i class="fas fa-arrow-left">Retour</i>
            </a></button>
            <?php else:?>
                <a href="index.php">
                    <i class="fas fa-arrow-left">Retour</i>
                </a></button>
            <?php endif;?>

    </div>
</div>
</body>

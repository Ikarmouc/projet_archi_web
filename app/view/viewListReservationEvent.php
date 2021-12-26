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
            <th scope="col">Numéro réservation</th>
            <th scope="col">Au nom de</th>
            <th scope="col">nombre de places prises</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($reservationsEvent as $reservations):?>
            <tr>
                <th scope="col"></th>
                <th scope="col"><?=$reservations["id_reservation"]?></th>
                <th scope="col"><?=$reservations["username"]?></th>
                <th scope="col"><?=$reservations["nbPlaces"]?></th>
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

            <a href="?action=getArticle&id_article=<?=$event->getId_article()?>">
                <i class="fas fa-arrow-left">Retour</i>
            </a>

        </button>


    </div>
</div>
</body>

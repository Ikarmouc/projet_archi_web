<?php
namespace app\view;
include ("app/view/header.php");
?>


<form method="post">

    <div class="form-floating mb-3">
        <input type="number" min="1" value="<?=$reservation->getNbplaces()?>" max="<?=$event->getRemainingPlaces()?>" class="form-control" id="nbplaces" name="nbplaces" required>
        <label class="form-label" for="nbplaces" >Insérez le nouveau nombre de place a réserver</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Valider la reservation" />
        <button class="btn btn-danger">
            <?php if (isset($_SESSION['isAdmin'])&& $_SESSION['isAdmin'] == true):      ?>
                <a href="?action=listReservation&id_user=<?=$reservation->getId_user()?>">Retour</a>
            <?php else:?>
                <a href="?action=listReservation" style="color: inherit">Retour</a>
            <?php endif;?>
        </button>
    </div>
</form>


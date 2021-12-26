<?php
namespace app\view;
include ("app/view/header.php");
?>

<?php if (isset($error)):?>
    <div class="alert alert-secondary" role="alert">
        <?=$error?>
    </div>
<?php endif;?>
<form method="post">

    <div class="form-floating mb-3">
        <input type="number" min="1" value="1" max="<?=$event->getRemainingPlaces()?>" class="form-control" id="nbplaces" name="nbplaces" required>
        <label class="form-label" for="nbplaces" >Reservation pour combien de personnes ?</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Valider la reservation" />
        <button class="btn btn-danger">
            <a href="?action=getArticle&id_article=<?=$event->getId_article();?>" style="color: inherit">Retour</a>
        </button>
    </div>
</form>

<?php include ("app/view/footer.php");?>

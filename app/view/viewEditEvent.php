<?php
namespace app\view;

include ("app/view/header.php");
?>

<div class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;">
    <h1> Edition d'un evenement en lien avec <?=$article?></h1>
</div>
<form method="post">
    <div class="form-group">
        <select class="form-control" id="typeEvent" name="typeEvent" required >
            <option value="<?=$event->getTypeEvent()?>" selected>Aucune modification (<?=$event->getTypeEvent()?>)</option>
            <option value="Conference Web">Conference Web</option>
            <option value="Conference">Conference</option>
            <option value="Cours">Cours</option>
            <option value="Foire aux questions">Foire aux questions</option>
        </select>
        <label class="form-label" for="typeEvent"></label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="description" placeholder="Description de votre article"  name="description"required><?=$event->getDescription()?></textarea>
        <label class="form-label" for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="datetime-local" class="form-control" id="dateEvent" name="dateEvent"  value="<?=$event->getDateEvent()?>" required>
        <label class="form-label" for="dateEvent">Date de l'evenement</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" min="0" class="form-control" id="placesLimit" value="<?=$event->getPlacesLimit()?>" name="placesLimit" required>
        <label class="form-label" for="placesLimit" >Nombre de places</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Enregistrer les modifications" />
        <button class="btn btn-danger">
            <a href="?action=getArticle&id_article=<?=$event->getId_article();?>" style="color: inherit">Retour</a>
        </button>
    </div>
</form>

<?php
include ("app/view/footer.php");
?>
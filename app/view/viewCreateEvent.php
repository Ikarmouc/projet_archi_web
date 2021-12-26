<?php
namespace app\view;
include ("app/view/header.php")
?>

<div class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;">
    <h1> Ajout d'un evenement en lien avec <?=$nomArticle?></h1>
</div>
<form method="post">
    <div class="form-group">
        <select class="form-control" id="typeEvent" name="typeEvent" required>
            <option value="Conference Web">Conference Web</option>
            <option value="Conference">Conference</option>
            <option value="Cours">Cours</option>
            <option value="Foire aux questions">Foire aux questions</option>
        </select>
        <label class="form-label" for="typeEvent"></label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="description" placeholder="Description de votre article"  name="description" required></textarea>
        <label class="form-label" for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="datetime-local" class="form-control" id="dateEvent" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}" name="dateEvent" required>
        <label class="form-label" for="dateEvent">Date de l'evenement</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" min="0" class="form-control" id="placesLimit" value="0" name="placesLimit" required>
        <label class="form-label" for="placesLimit" >Nombre de places</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Valider la création d'evenement" />
        <button class="btn btn-danger">
            <a href="?action=getArticle&id_article=<?=$_GET["id_article"];?>" style="color: inherit">Retour</a>
        </button>
    </div>
</form>

<?php
include ("app/view/footer.php");
?>


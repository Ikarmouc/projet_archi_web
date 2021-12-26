<?php
namespace app\view;
?>

<?php
include ("app/view/header.php");
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nomArticle" placeholder="Nom de votre article" name="nomArticle"  required>
        <label class="form-label" for="nomArticle">Nom de l'article </label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="description" placeholder="Description de votre article"  name="description" required>
        <label class="form-label" for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="typeArticle" placeholder="Type d'article"  name="typeArticle" required>
        <label class="form-label" for="typeArticle">Type d'article</label>
    </div>
    <div class="form-floating mb-3">
        <input type="file" class="form-control" id="image" placeholder="Image"  name="image" required>
        <label class="form-label" for="image">Image de l'article</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="credits" placeholder="Credits" name="credits" required>
        <label class="form-label" for="credits" >Credits de l'article</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Valider la création d'article" />
        <button class="btn btn-danger">
            <a href="./index.php" style="color: inherit">Retour</a>
        </button>
    </div>
</form>

<?php include ("app/view/footer.php")?>
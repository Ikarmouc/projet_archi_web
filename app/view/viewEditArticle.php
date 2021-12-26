<?php
namespace app\view;
?>


<?php include ("app/view/header.php");?>
<form method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nomArticle" placeholder="Nom de votre article" name="nomArticle" value=<?="'$nomArticle'"?>>
        <label class="form-label" for="nomArticle">Nom de l'article </label>
    </div>
    <div class="form mb-3">
        <textarea class="form-control" name="description" id="description" placeholder="Description de votre article" style="height: 200px" ><?=$description?></textarea>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="typeArticle" placeholder="Type d'article"  name="typeArticle" value=<?="'$typeArticle'"?> >
        <label class="form-label" for="typeArticle">Type d'article</label>
    </div>
    <div class="form-floating mb-3">
        <input type="file" class="form-control" id="image" placeholder="Image"  name="image">
        <label class="form-label" for="image">Image de l'article</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="credits" placeholder="Credits" name="credits" value=<?="'$credits'"?> >
        <label class="form-label" for="credits" >Credits de l'article</label>
    </div>
    <div style="display: flex; justify-content: space-between; margin: 5%">
        <input class="btn btn-success" type="submit" name="send" value="Enregistrer les modifications " />
        <button class="btn btn-danger"><a href="index.php"></a>Annuler les changements </button>
    </div>

</form>

<?php include ("app/view/footer.php");?>
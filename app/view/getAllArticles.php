<?php
namespace app\view;
?>



<!doctype html>
<html lang="fr">

<body>
<?php include ("app/view/header.php");
if ($_SESSION != null)
{
    $isAdmin = $_SESSION["isAdmin"];
}
else
{
    $isAdmin = false;
}?>
<h1 class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;"> Bienvenue dans The science Place !</h1>


<div class="listeArticle" style="display: flex; justify-content: space-between;flex-wrap: wrap; margin-top: 100px">


    <?php foreach ($result as $article):?>

        <div class="card infosArticle" style="width: 18rem;">
            <img width="286" height="180" src=<?="/img/".$article->getImg()?>>
            <div class="card-body">
                <h5 class="card-title"><?=$article->getNomArticle()?></h5>
                <p class="card-text "><?=$article->getTypeArticle()?></p>
                <a href="<?="?action=getArticle&id_article=".$article->getId_article()?>" class="d-grid gap-2 col-6 mx-auto btn btn-primary center">En savoir plus</a>
            </div>
        </div>
    <?php endforeach;?>
    <div>
        <?php if($isAdmin):?>
            <button class=" btn add " >
                <a style="width: 18rem;" href="?action=addArticle"class="btn btn-primary">Ajouter un nouvel article</a>
            </button>
        <?php endif;?>

    </div>

</body>

<?php include('app/view/footer.php')?>

</html>


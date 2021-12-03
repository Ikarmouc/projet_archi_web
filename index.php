<?php
require ('./header.php');
require('./connexion.php');



$connexion = connexionBd();
$sql="Select * from article";
$result = $connexion->query($sql);
$listeArticle = $result->fetchAll(PDO::FETCH_OBJ);
if ($_SESSION != null)
{
    $isAdmin = $_SESSION["isAdmin"];
}
else
{
    $isAdmin = false;
}


?>

<!doctype html>
<html lang="fr">

<body>

<h1 class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;"> Bienvenue dans The science Place !</h1>


<div class="listeArticle" style="display: flex; justify-content: space-between;flex-wrap: wrap; margin-top: 100px">


    <?php foreach ($listeArticle as $article):?>
        <div class="card infosArticle" style="width: 18rem;">
            <img width="286" height="180" src=<?="/img/".$article->img?>>
            <div class="card-body">
                <h5 class="card-title"><?=$article->nomArticle?></h5>
                <p class="card-text "><?=$article->typeArticle?></p>
                <a href="./viewArticle.php?id_Article=<?=$article->id_article;?>" class="d-grid gap-2 col-6 mx-auto btn btn-primary center">En savoir plus</a>
            </div>
        </div>
    <?php endforeach;?>
    <div>
        <?php if($isAdmin):?>

            <button class=" btn add " >
                <a style="width: 18rem;" href="./addArticle.php"class="btn btn-primary">Ajouter un nouvel article</a>
            </button>
        <?php endif;?>

    </div>

</body>

<?php require('./footer.php')?>

</html>

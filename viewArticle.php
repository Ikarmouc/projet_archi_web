<?php
require('./connexion.php');
require('./header.php');
$connexion = connexionBd();
$date = date('Y-m-d h:i:s');
if(isset($_GET["id_Article"]))
{
    $params = (str_replace("'", "''",$_GET["id_Article"]));
    $sqlArticle="Select * from article where id_article= '$params';";
    $resultArticle = $connexion->query($sqlArticle);
    $article = $resultArticle->fetchAll(PDO::FETCH_OBJ);
    $sqlEvents ="Select * from event where article = '$params'";
    $resultEvents = $connexion->query($sqlEvents);
    $events = $resultEvents->fetchAll(PDO::FETCH_ASSOC);
    $articleId = $article[0]->id_article;
}
?>
<!doctype html>
<html lang="fr">
<style>
    body {
        background-image: url('img/background.jpg');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<body>

<?php foreach ($article as $articleInfo):?>
    <h1 class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;"> <?=$articleInfo->nomArticle?></h1>
    <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
        <div class="infosArticle " style="display: flex; justify-content: center; margin: 10%;text-align: center">

            <div class="mbr-figure bg-secondary bg-gradient text-white" style="width: 100rem;">
                <img src=<?="/img/".$articleInfo->img?> width="286" height="180" style="margin-top: 1%">
                <div class="card-body">
                    <h5 class="card-title">Nom d'article : <?=$articleInfo->nomArticle?></h5>
                    <p class="card-text ">Type d'article : <?=$articleInfo->typeArticle?></p>
                    <p class="card-text ">Description : <?=$articleInfo->description?></p>
                    <p class="card-text ">Sources : <?=$articleInfo->credits?></p>
                    <div style="display: flex;justify-content: space-between;">
                        <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" >
                            <a href="editArticle.php?id_Article=<?=$articleInfo->id_article;?>" style="text-decoration:none">Modifier l'article</a>
                        </button>
                        <button  class="d-grid gap-2 col-6 mx-auto btn btn-danger center">
                            <a href="../../deleteArticle.php?id_Article=<?=$articleInfo->id_article;?>"style="text-decoration:none">Supprimer l'article</a>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    <?php else:?>
        <div class="infosArticle " style="display: flex; justify-content: center; margin: 10%;text-align: center">

            <div class="mbr-figure bg-secondary bg-gradient text-white" style="width: 100rem;">
                <img src=<?="/img/".$articleInfo->img?> width="286" height="180" style="margin-top: 1%">
                <div class="card-body">
                    <h5 class="card-title">Nom d'article : <?=$articleInfo->nomArticle?></h5>
                    <p class="card-text ">Type d'article : <?=$articleInfo->typeArticle?></p>
                    <p class="card-text ">Description : <?=$articleInfo->description?></p>
                    <p class="card-text ">Sources : <?=$articleInfo->credits?></p>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endforeach;?>
<!-- Partie listage events a venir (les evenements passés ne sont plus affichés -->
<div style="display: flex;justify-content: space-around;align-items: center;margin-top: 10%;margin-bottom: 10%">
    <?php foreach ($events as $event):?>

        <?php if ($event["dateEvent"] > $date):?>
            <li>
                <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
                    <div class="infosEvent " style="display: flex; justify-content: center;text-align: center">
                        <div class="mbr-figure bg-secondary bg-gradient text-white" style="">
                            <div class="card-body">
                                <h5 class="card-title">Evenement : <?=$event["typeEvent"]?></h5>
                                <p class="card-text ">Description : <?=$event["description"]?></p>
                                <p class="card-text ">Date evenement : <?=$event["dateEvent"]?></p>

                                <p class="card-text ">Places restantes : <?=$event["remainingPlaces"]?></p>
                                <div style="display: flex;justify-content: space-between;">
                                    <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" >
                                        <a href="./editEvent.php?id_event=<?=$event["id_event"];?>" style="text-decoration:none">Modifier l'evenement</a>
                                    </button>
                                    <button  class="d-grid gap-2 col-6 mx-auto btn btn-danger center">
                                        <a href="./deleteEvent.php?id_event=<?=$event["id_event"];?>"style="text-decoration:none">Supprimer l'evenement</a>
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php else:?>
                    <?php if ($_SESSION != null):?>
                        <div class="infosEvent " style="display: flex; justify-content: center; margin: 10%;text-align: center">

                            <div class="mbr-figure bg-secondary bg-gradient text-white" style="">
                                <div class="card-body">
                                    <h5 class="card-title">Evenement : <?=$event["typeEvent"]?></h5>
                                    <p class="card-text ">Description : <?=$event["description"]?></p>
                                    <p class="card-text ">Date evenement : <?=$event["dateEvent"]?></p>

                                    <p class="card-text ">Places restantes : <?=$event["remainingPlaces"]?></p>
                                    <?php if (intval($event["remainingPlaces"]) != 0 ):?>
                                        <div style="display: flex;justify-content: space-between;">
                                            <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" >
                                                <a href="./reserveEvent.php?id_event=<?=$event["id_event"];?>" style="text-decoration:none">Reserver une place pour cette evenement</a>
                                            </button>
                                        </div>
                                    <?php else:?>
                                        <div style="display: flex;justify-content: space-between;">
                                            <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" disabled="disabled">
                                                <p style="text-decoration:none">Cet evenement affiche complet ! </p>
                                            </button>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php else:?>
                        <div class="infosEvent " style="display: flex; justify-content: center; margin: 10%;text-align: center">

                            <div class="mbr-figure bg-secondary bg-gradient text-white" style="">
                                <div class="card-body">
                                    <h5 class="card-title">Evenement : <?=$event["typeEvent"]?></h5>
                                    <p class="card-text ">Description : <?=$event["description"]?></p>
                                    <p class="card-text ">Date evenement : <?=$event["dateEvent"]?></p>

                                    <p class="card-text ">Places restantes : <?=$event["remainingPlaces"]?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            </li>
        <?php endif;?>

    <?php endforeach;?>

    <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
        <div style="margin-top = 19px">
            <button class="btn btn-success">
                <a style="width: 18rem;color: inherit" href="./addEvent.php?id_Article=<?=$articleId?>">Ajouter un nouvel evenement</a>
            </button>
        </div>

    <?php endif;?>
</div>
</body>
<footer class="footer mt-auto py-3 bg-dark fixed-bottom">
    <div class="container">
        <span class="text-muted">Ce site a été réalisé via le Framework d'interface Bootstrap </span>
    </div>
</footer>
</html>

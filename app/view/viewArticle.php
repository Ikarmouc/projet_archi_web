<?php
namespace app\view;
include ("app/view/header.php");
?>
<!doctype html>
<html lang="fr">

<body>
<h1 class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;"> <?=$article->getNomArticle()?></h1>
<?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
    <div class="infosArticle " style="display: flex; justify-content: center; margin: 10%;text-align: center">
        <div class="mbr-figure bg-secondary bg-gradient text-white" style="width: 100rem;">
            <img src=<?="/img/".$article->getImg()?> width="286" height="180" style="margin-top: 1%">
            <div class="card-body">
                <h5 class="card-title">Nom d'article : <?=$article->getNomArticle()?></h5>
                <p class="card-text ">Type d'article : <?=$article->getTypeArticle()?></p>
                <p class="card-text ">Description : <?=$article->getDescription()?></p>
                <p class="card-text ">Sources : <?=$article->getCredits()?></p>
                <div style="display: flex;justify-content: space-between;">
                    <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" >
                        <a href="?action=editArticle&id_article=<?=$article->getId_article()?>" style="text-decoration:none">Modifier l'article</a>
                    </button>
                    <button  class="d-grid gap-2 col-6 mx-auto btn btn-danger center">
                        <a href="?action=deleteArticle&id_article=<?=$article->getId_article()?>"style="text-decoration:none">Supprimer l'article</a>
                    </button>
                </div>

            </div>
        </div>

    </div>
<?php else:?>
    <div class="infosArticle " style="display: flex; justify-content: center; margin: 10%;text-align: center">

        <div class="mbr-figure bg-secondary bg-gradient text-white" style="width: 100rem;">
            <img src=<?="/img/".$article->getImg()?> width="286" height="180" style="margin-top: 1%">
            <div class="card-body">
                <h5 class="card-title">Nom d'article : <?=$article->getNomArticle()?></h5>
                <p class="card-text ">Type d'article : <?=$article->getTypeArticle()?></p>
                <p class="card-text ">Description : <?=$article->getDescription()?></p>
                <p class="card-text ">Sources : <?=$article->getCredits()?></p>
            </div>
        </div>
    </div>

<?php endif;?>

<!-- Partie listage events a venir (les evenements passés ne sont plus affichés -->
<div style="display: flex;justify-content: space-around;margin-top: 10%;margin-bottom: 10%">
    <?php foreach ($events as $event):?>
        <?php if ($event->getDateEvent() > $currentDate):?>
            <li>
                <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
                    <div class="infosEvent " style="display: flex; justify-content: center;text-align: center">
                        <div class="mbr-figure bg-secondary bg-gradient text-white" style="">
                            <div class="card-body">
                                <h5 class="card-title">Evenement : <?=$event->getTypeEvent()?></h5>
                                <p class="card-text ">Description : <?=$event->getDescription()?></p>
                                <p class="card-text ">Date evenement : <?=$event->getDateEvent()?></p>

                                <p class="card-text ">Places restantes : <?=$event->getRemainingPlaces()?></p>
                                <div style="display: flex;justify-content: space-between;">
                                    <button class="d-grid gap-2 col-4 mx-auto btn btn-info center" >
                                        <a href="?action=listReservation&id_event=<?=$event->getId_event()?>" style="text-decoration:none">Liste des reservations</a>
                                    </button>
                                    <button class="d-grid gap-2 col-4 mx-auto btn btn-info center" >
                                        <a href="?action=editEvent&id_event=<?=$event->getId_event()?>" style="text-decoration:none">Modifier l'evenement</a>
                                    </button>
                                    <button  class="d-grid gap-2 col-4 mx-auto btn btn-danger center">
                                        <a href="?action=deleteEvent&id_event=<?=$event->getId_event()?>"style="text-decoration:none">Supprimer l'evenement</a>
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
                                    <h5 class="card-title">Evenement : <?=$event->getTypeEvent()?></h5>
                                    <p class="card-text ">Description : <?=$event->getDescription()?></p>
                                    <p class="card-text ">Date evenement : <?=$event->getDateEvent()?></p>

                                    <p class="card-text ">Places restantes : <?=$event->getRemainingPlaces()?></p>
                                    <?php if ($modelReservation->findByParam("id_event",$event->getId_event()) != array()):?>
                                        <div style="display: flex;justify-content: space-between;">
                                            <button class="d-grid gap-2 col-6 mx-auto btn btn-info center disabled" >
                                                <a style="text-decoration:none">Places réservées</a>
                                            </button>
                                        </div>
                                    <?php elseif (intval($event->getRemainingPlaces()) != 0 ):?>
                                        <div style="display: flex;justify-content: space-between;">
                                            <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" >
                                                <a href="?action=addReservation&id_event=<?=$event->getId_event()?>" style="text-decoration:none">Reserver une place pour cette evenement</a>
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
                                    <h5 class="card-title">Evenement : <?=$event->getTypeEvent()?></h5>
                                    <p class="card-text ">Description : <?=$event->getDescription()?></p>
                                    <p class="card-text ">Date evenement : <?=$event->getDateEvent()?></p>

                                    <p class="card-text ">Places restantes : <?=$event->getRemainingPlaces()?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            </li>
        <?php endif;?>

    <?php endforeach;?>

    <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
        <div>
            <button class="btn btn-success">
                <a style="width: 18rem;color: inherit" href="index.php?action=createEvent&id_article=<?=$_GET["id_article"];?>">Ajouter un nouvel evenement</a>
            </button>
        </div>

    <?php endif;?>
</div>
</body>
<?php include('app/view/footer.php')?>


</html>

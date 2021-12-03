<?php
include('./connexion.php');
include ('./header.php');
$connexion = connexionBd();
$params = htmlspecialchars($_GET["id_event"]);
$sql = "select * from event where id_event = '$params'";
$exec = $connexion->query($sql);
$event = $exec->fetch(PDO::FETCH_ASSOC);

$event["dateEvent"] = str_replace(" ","T",$event["dateEvent"]);
$params = $event["article"];

$sql = "select nomArticle from article where id_article = '$params'";
$exec = $connexion->query($sql);
$article = $exec->fetch(PDO::FETCH_ASSOC);

if($_POST!= null)
{
    $idEvent = $event["id_event"];
    $typeEvent = htmlspecialchars($_POST['typeEvent']);
    $description = htmlspecialchars($_POST['description']);
    $placesLimit = htmlspecialchars($_POST['placesLimit']);
    $articleId = htmlspecialchars($event["article"]);
    $remainingPlaces = $event["remainingPlaces"];
    if ($remainingPlaces >= $placesLimit)
    {
        $remainingPlaces = 0;
    }
    $dateEvent = htmlspecialchars($_POST['dateEvent'].":00");
    $dateEvent = str_replace("T"," ",$dateEvent);
    $sqlUpdateEvent = "UPDATE event SET `id_event` =" .$idEvent.",`typeEvent` = '$typeEvent',`article` =". $articleId.",`description` = '$description',`remainingPlaces` = ".$remainingPlaces.",`placesLimit` = ".$placesLimit." where id_event = ".$event["id_event"];
    $count=$connexion->exec($sqlUpdateEvent);
    header("Location: viewArticle.php?id_Article=". $event["article"]);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout d'un nouvel evenement </title>
</head>
<body>

<div class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;">
    <h1> Edition d'un evenement en lien avec <?=$article["nomArticle"]?></h1>
</div>
<form method="post">
    <div class="form-group">
        <select class="form-control" id="typeEvent" name="typeEvent" required >
            <option value="<?=$event["typeEvent"]?>" selected>Aucune modification (<?=$event["typeEvent"]?>)</option>
            <option value="Conference Web">Conference Web</option>
            <option value="Conference">Conference</option>
            <option value="Cours">Cours</option>
            <option value="Foire aux questions">Foire aux questions</option>
        </select>
        <label class="form-label" for="typeEvent"></label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="description" placeholder="Description de votre article"  name="description"required><?=$event["description"]?></textarea>
        <label class="form-label" for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="datetime-local" class="form-control" id="dateEvent" name="dateEvent"  value="<?=$event["dateEvent"]?>" required>
        <label class="form-label" for="dateEvent">Date de l'evenement</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" min="0" class="form-control" id="placesLimit" value="<?=$event["placesLimit"]?>" name="placesLimit" required>
        <label class="form-label" for="placesLimit" >Nombre de places</label>
    </div>

    <div class="text-center">
        <input class="btn btn-success" type="submit" name="send" value="Enregistrer les modifid" />
        <button class="btn btn-danger">
            <a href="./viewArticle.php?id_Article=<?=$params;?>" style="color: inherit">Retour</a>
        </button>
    </div>
</form>

</body>
</html>
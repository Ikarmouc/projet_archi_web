<?php
include('./connexion.php');
include ('./header.php');
$connexion = connexionBd();
$params = htmlspecialchars($_GET["id_Article"]);
$sql = "select nomArticle from article where id_article = '$params'";
$exec = $connexion->query($sql);
$article = $exec->fetch(PDO::FETCH_ASSOC);
if($_POST!= null)
{
    $typeEvent = htmlspecialchars($_POST['typeEvent']);
    $description = htmlspecialchars($_POST['description']);
    $placesLimit = htmlspecialchars($_POST['placesLimit']);
    $articleId = htmlspecialchars($_GET["id_Article"]);
    $remainingPlaces = $placesLimit;
    $dateEvent = htmlspecialchars($_POST['dateEvent'].":00");
    $dateEvent = str_replace("T"," ",$dateEvent);
    $sqlNewEvent = "insert into event(typeEvent,article,description,remainingPlaces,placesLimit,dateEvent) values ('$typeEvent','$articleId', '$description','$remainingPlaces','$placesLimit','$dateEvent')".';';
    var_dump($sqlNewEvent);
    $count=$connexion->exec($sqlNewEvent);
    header("Location: viewArticle.php?id_Article=".$_GET["id_Article"]);

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
    <h1> Ajout d'un evenement en lien avec <?=$article["nomArticle"]?></h1>
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
            <a href="./viewArticle.php?id_Article=<?=$_GET["id_Article"];?>" style="color: inherit">Retour</a>
        </button>
    </div>
</form>

</body>
</html>
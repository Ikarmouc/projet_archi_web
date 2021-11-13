<?php
include ('./Controller/connexion.php');
include ('./header.php');
if($_POST!= null)
{
    $connexion = connexionBd();
    $nomArticle = htmlspecialchars($_POST['nomArticle']);
    //$description = $_POST['description'];
    $description = htmlspecialchars(str_replace("'", "''", $_POST['description']));
    $typeArticle = htmlspecialchars($_POST['typeArticle']);
    $credits = htmlspecialchars($_POST['credits']);
    $img = $_FILES['image']['name'];
    $image = copy($_FILES['image']['tmp_name'], './img/'.$img);
    $sql = "insert into article(nomArticle,description,typeArticle,img,credits) values ('$nomArticle','$description', '$typeArticle','$img','$credits')".';';
    $count=$connexion->exec($sql);
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout d'un nouveau article</title>
</head>
<body>
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

    <input type="submit" name="send" value="Envoyer" />

</form>

</body>
</html>
<?php
include ('./Controller/connexion.php');
include ('./header.php');
$connexion = connexionBd();

if(isset($_GET["nomArticle"]))
{
    $params = (str_replace("'", "''",$_GET["nomArticle"]));
    $sql="Select * from article where nomArticle= '$params';";
    $result = $connexion->query($sql);
    $Article = $result->fetchAll(PDO::FETCH_ASSOC);

    if($_POST!= null)
    {
        $id_article = $Article[0]['id_article'];
        $nomArticle = htmlspecialchars(str_replace("'", "''", $_POST['nomArticle']));
        $description = htmlspecialchars(str_replace("'", "''", $_POST['description']));
        $typeArticle = htmlspecialchars(str_replace("'", "''", $_POST['typeArticle']));
        $credits = htmlspecialchars(str_replace("'", "''", $_POST['credits']));

        if($_FILES['image']['name'] != "")
        {
            $img = $_FILES['image']['name'];
            $image = copy($_FILES['image']['tmp_name'], './img/'.$img);
            $sql = "UPDATE article SET `id_article` = '$id_article', nomArticle ='$nomArticle',description ='$description',typeArticle = '$typeArticle',img = '$img',credits ='$credits' WHERE id_article = ".$id_article;
        }
        else
        {
            $img = $Article[0]["img"];
            $sql = "UPDATE article SET `id_article` = '$id_article', `nomArticle` ='$nomArticle',`description` ='$description',`typeArticle` = '$typeArticle',`img` = '$img',`credits` ='$credits' WHERE `id_article` = ".$id_article;
        }
        $count=$connexion->exec($sql);
        header("Location: index.php");
    }
    else
    {
        $id_article = $Article[0]['id_article'];
        $nomArticle = $Article[0]['nomArticle'];
        //$description = $Article[0]['description'];
        $description = $Article[0]['description'];
        $typeArticle = $Article[0]['typeArticle'];
        $img = $Article[0]['img'];
        $credits = $Article[0]['credits'];
    }
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edition d'un article</title>
</head>
<body>
<div style="display: flex;justify-content: center">
    <h1 class="text-white" >Modification de l'article : <?=$nomArticle?></h1>
</div>
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

</body>
</html>

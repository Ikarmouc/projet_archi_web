<?php
require('../Controller/connexion.php');
require ('../header.php');
$connexion = connexionBd();

if(isset($_GET["nomArticle"]))
{
    $params = (str_replace("'", "''",$_GET["nomArticle"]));
    $sql="Select * from article where nomArticle= '$params';";
    $result = $connexion->query($sql);
    $Article = $result->fetchAll(PDO::FETCH_OBJ);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Police d'ecriture-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="../style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>The science place</title>
    <style>
        body {
            background-image: url('../img/background.jpg');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
<?php foreach ($Article as $article):?>
    <h1 class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white;"> <?=$article->nomArticle?></h1>

    <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
        <div class="infosArticle " style="display: flex; justify-content: center; margin: 10%;text-align: center">

            <div class="mbr-figure bg-secondary bg-gradient text-white" style="width: 100rem;">
                <img src=<?="/img/".$article->img?> width="286" height="180" style="margin-top: 1%">
                <div class="card-body">
                    <h5 class="card-title">Nom d'article : <?=$article->nomArticle?></h5>
                    <p class="card-text ">Type d'article : <?=$article->typeArticle?></p>
                    <p class="card-text ">Description : <?=$article->description?></p>
                    <p class="card-text ">Sources : <?=$article->credits?></p>
                    <div style="display: flex;justify-content: space-between;">
                        <button class="d-grid gap-2 col-6 mx-auto btn btn-info center" >
                            <a href="../editArticle.php?nomArticle=<?=$article->nomArticle;?>" style="text-decoration:none">Modifier l'article</a>
                        </button>
                        <button  class="d-grid gap-2 col-6 mx-auto btn btn-danger center">
                            <a href="../../deleteArticle.php?nomArticle=<?=$article->nomArticle;?>"style="text-decoration:none">Supprimer l'article</a>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    <?php else:?>
        <div class="infosArticle " style="display: flex; justify-content: center; margin: 10%;text-align: center">

            <div class="mbr-figure bg-secondary bg-gradient text-white" style="width: 100rem;">
                <img src=<?="/img/".$article->img?> width="286" height="180" style="margin-top: 1%">
                <div class="card-body">
                    <h5 class="card-title">Nom d'article : <?=$article->nomArticle?></h5>
                    <p class="card-text ">Type d'article : <?=$article->typeArticle?></p>
                    <p class="card-text ">Description : <?=$article->description?></p>
                    <p class="card-text ">Sources : <?=$article->credits?></p>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endforeach;?>
</body>
<footer class="footer mt-auto py-3 bg-dark fixed-bottom">
    <div class="container">
        <span class="text-muted">Ce site a été réalisé via le Framework d'interface Bootstrap </span>
    </div>
</footer>
</html>

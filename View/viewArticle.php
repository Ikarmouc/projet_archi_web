<?php
include('../Controller/connexion.php');
$connexion = connexionBd();

$params = htmlspecialchars('\''.$_GET["nomArticle"]."';");

$sql="Select * from article where nomArticle=".$params.";";
$result = $connexion->query($sql);
$Article = $result->fetchAll(PDO::FETCH_OBJ);
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
    <link href="style.css" rel="stylesheet">
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
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </nav>
</header>
<body>
<?php foreach ($Article as $article):?>
<h1 class="d-center p-1 bg-dark text-white" style="display: flex; justify-content: center;color: white; mar"> <?=$article->nomArticle?></h1>


<div class="infosArticle " style="display: flex; justify-content: center">



        <div class="mbr-figure bg-dark text-white" style="width: 18rem;">
            <img src=<?="/img/".$article->img.".jpg"?> width="286" height="180">
            <div class="card-body">
                <h5 class="card-title"><?=$article->nomArticle?></h5>
                <p class="card-text "><?=$article->typeArticle?></p>
                <p class="card-text "><?=$article->description?></p>
                <p class="card-text ">Sources : <?=$article->credits?></p>

            </div>
        </div>

</div>
<?php endforeach;?>
</body>
<footer class="footer mt-auto py-3 bg-dark">
    <div class="container">
        <span class="text-muted">Ce site a été réalisé via le Framework d'interface Bootstrap </span>
    </div>
</footer>
</html>

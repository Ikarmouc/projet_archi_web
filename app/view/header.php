<?php
namespace app\view;
if (session_status() == 1)
{
    session_start();
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
    <!-- CSS + Bootstrap -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>The science place</title>

</head>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand " href=../>Accueil</a>
            <?php if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]== true) :?>
            <div style="display: flex;justify-content: space-between;">
                <a class="btn btn-info" href="?action=adminControlPanel">Gestions utilisateurs </a>
            </div>

            <?php elseif(isset($_SESSION["id_user"])):?>
                <a class="btn btn-info" href="?action=listReservation">Gestions reservation </a>
            <?php endif;?>
            <span>
                <?php if (!isset($_SESSION["username"])) :?>
                    <button type="button button" class="btn btn-info btn-round">
                        <a href="?action=login">Login</a>
                    </button>
                <?php else:?>
                    <button type="button" class="btn btn-info btn-round">
                    <a href="?action=logout" style="color: inherit"> Se deconnecter</a>
                    </button>
                <?php endif;?>
            </span>

        </div>
        <div class="container">

        </div>
    </nav>
</header>

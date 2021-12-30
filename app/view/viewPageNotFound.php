<?php
namespace app\view;
include ("app/view/header.php");
?>


<div style="display: flex; justify-content: center;text-align: center; flex-direction: column">
    <h1 style="color: white">
        Oops!
    </h1>
    <div style="color: white">
        La page souhaitée n'existe pas ou n'existe plus
    </div>
    <div class="">
        <button class="btn btn-info">
            <a href="index.php"> Retour a l'accueil</a>
        </button>
    </div>

    <div>
        <img src="./img/404.jpg" width="50%">
    </div>

</div>

    <?php include("app/view/footer.php")?>
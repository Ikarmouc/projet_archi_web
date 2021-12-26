<?php
namespace app\view;
include ("app/view/header.php");
?>

    <div class="row" style="display: flex; align-content: center">
        <h1 style="color: white">
            Oops!
        </h1>
        <div>
            <img src="./img/404.jpg" width="50%">
        </div>


        <div class="">
            La page souhaitée n'existe pas ou n'existe plus
        </div>
        <div class="">
            <button class="btn btn-info">
                <a href="index.php"> Retour a l'accueil</a>
            </button>
        </div>

        <div class="col-md-12" style="display: flex; align-content: center; justify-content: center;flex-direction: row; margin-top: 25%">
            <div class="" style="color: white">



            </div><div>
            </div>
        </div>
    </div>



    <?php include("app/view/footer.php")?>
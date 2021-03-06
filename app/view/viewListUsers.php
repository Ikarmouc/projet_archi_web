<?php
namespace app\view;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des utilisateurs</title>
</head>
<body>

<?php
include ("app/view/header.php");
?>
<div style="display: flex; margin-left: 10%;margin-top :5%; margin-right: 10%; text-align: center">
    <table class="table table-bordered" style="background-color: white">
        <thead>
        <tr>
            <th scope="col">Nom d'utilisateur</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listUsers as $user):?>
            <tr>
                <th scope="col"> <?=$user->getUsername()?></th>

                <th style="display: flex;justify-content: space-between">
                    <button class="btn btn-success btn-sm rounded-3" type="button"  title="Modifier utilisateur"><a href="?action=editUser&id_user=<?=$user->getId_user()?>" style="color: inherit"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-info btn-sm rounded-3" type="button"  title="Gerer les reservations"><a href="?action=listReservation&id_user=<?=$user->getId_user()?>" style="color: inherit"><i class="fa fa-calendar"></i></a></button>
                    <button class="btn btn-danger btn-sm rounded-3" type="button"  title="suppression utilisateur"><a href="?action=deleteUser&id_user=<?=$user->getId_user()?>" style="color: inherit"><i class="fa fa-trash"></i></a></button>

                </th>

            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <tr>
            <th>

            </th>
            <th>
                <button class="btn btn-info">
                    <a href="?action=register" style="color: inherit">Ajouter un Utilisateur</a>
                </button>
            </th>
        </tr>
        </tfoot>
    </table>
</body>

<?php require ('app/view/footer.php');?>
</html>


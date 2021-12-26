<?php
namespace app\view;

?>

<!doctype html>
<html lang="fr">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<?php
include ("app/view/header.php");
?>
<form method="post">
    <fieldset>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nom" placeholder="Votre nom" value="<?=$user->getNom()?>" name="nom" required>
            <label class="form-label" for="nom">Nom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="prenom" placeholder="Votre prenom"  name="prenom" value="<?=$user->getPrenom()?>" required>
            <label class="form-label" for="prenom">Prenom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="adresse" placeholder="Votre adresse"  name="adresse" value="<?=$user->getAdresse()?>" required>
            <label class="form-label" for="adresse">Adresse</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Entrez une adresse email valide" name="email" value="<?=$user->getEmail()?>" required>
            <label class="form-label" for="email">Adresse Email </label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur"  name="username" value="<?=$user->getUsername()?>" required>
            <label class="form-label" for="username">Nom d'utilisateur</label>
        </div>

        <div style="display: flex; justify-content: space-between; margin: 5%; ">
            <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true):?>
                <input class="btn btn-success" type="submit" name="send" value="Enregistrer les modifications " />
                <button class="btn btn-danger"><a style="text-decoration: none;color: white" href="?action=adminControlPanel">Annuler les changements</a> </button>
            <?php else:?>

            <?php endif;?>

        </div>
    </fieldset>
</form>
</body>
</html>

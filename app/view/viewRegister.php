<?php
namespace app\view;
?>

<!doctype html>
<html lang="fr">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

<?php include ('app/view/header.php');?>
<form method="post">
    <fieldset>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nom" placeholder="Votre nom"  name="nom" required>
            <label class="form-label" for="nom">Nom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="prenom" placeholder="Votre prenom"  name="prenom" required>
            <label class="form-label" for="prenom">Prenom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="adresse" placeholder="Votre adresse"  name="adresse" required>
            <label class="form-label" for="adresse">Adresse</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Entrez une adresse email valide" name="email"  required>
            <label class="form-label" for="email">Adresse Email </label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur"  name="username" required>
            <label class="form-label" for="username">Nom d'utilisateur</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" pattern="{8,}" title="Veuillez saisir un mot de passe de 8 caractères au minimum dont au moins une lettre et un chiffre ! " placeholder="Votre mot de passe"  name="password" required>
            <label class="form-label" for="password">Votre mot de passe (mot de passe de 8 characteres minimum)</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="confirmPassword" pattern="{8,}" title="Veuillez saisir un mot de passe de 8 caractères au minimum dont au moins une lettre et un chiffre !" placeholder="Confirmation d'un mot de passe"  name="confirmPassword" required>
            <label class="form-label" for="confirmPassword">Confirmation du mot de passe</label>
            <!-- verification si le mot de passe de confirmation correspond au mot de passe donné précédemment -->
            <script>
                var password = document.getElementById("password")
                var confirmPassword = document.getElementById("confirmPassword");

                function validationPassword(){
                    if(password.value != confirmPassword.value) {
                        confirmPassword.setCustomValidity("Mot de passe non similaire");
                    } else {
                        confirmPassword.setCustomValidity('');
                    }
                }
                password.onchange = validationPassword;
                confirmPassword.onkeyup = validationPassword;
            </script>
        </div>

        <div class="text-center">
            <input class="btn btn-success" type="submit" name="send" value="Validez l'inscription " />
            <?php if (isset($_SESSION["isAdmin"]) && $_SESSION['isAdmin'] == true):?>
                <button class="btn btn-danger">
                    <a href="?action=adminControlPanel" style="color: inherit">Retour</a>
                </button>
            <?php else:?>
                <button class="btn btn-danger">
                    <a href="../../index.php?action=login" style="color: inherit">Retour</a>
                </button>
            <?php endif;?>
        </div>

    </fieldset>
</form>

<?php include ("app/view/footer.php")?>
</body>
</html>

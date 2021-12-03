<?php
require ('./header.php');
require('./connexion.php');
$connexion = connexionBd();
if (isset($_POST["send"]))
{
    if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) &&isset($_POST["email"]) &&isset($_POST["username"]) && isset($_POST["password"]))
    {
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $adresse = htmlspecialchars($_POST["adresse"]);
        $email = htmlspecialchars($_POST["email"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "insert into user(nom,prenom,adresse,email,username,password) values ('$nom','$prenom', '$adresse','$email','$username','$password')".';';
        $count=$connexion->exec($sql);
        if ($_SESSION['isAdmin'] == true) {
            header("Location: ./adminControlPanel.php");
        }
        else{
            header("Location: ./login.php");
        }


    }
}
?>


<!doctype html>
<html lang="fr">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
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
                            <a href="./adminControlPanel.php" style="color: inherit">Retour</a>
                        </button>
                    <?php else:?>
                        <button class="btn btn-danger">
                            <a href="./login.php" style="color: inherit">Retour</a>
                        </button>
                    <?php endif;?>
                </div>

            </fieldset>
        </form>
</body>
</html>

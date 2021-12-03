<?php
require ('./header.php');
require('./connexion.php');
$connexion = connexionBd();
$iduser = htmlspecialchars($_GET["id_user"]);

if(isset($_POST["send"]))
{
    if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) &&isset($_POST["email"]) &&isset($_POST["username"]))
    {
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $adresse = htmlspecialchars($_POST["adresse"]);
        $email = htmlspecialchars($_POST["email"]);
        $username = htmlspecialchars($_POST["username"]);
        $sql = "UPDATE user SET `id_user` = '$iduser',`nom` = '$nom',`prenom` = '$prenom',`adresse` = '$adresse',`username` = '$username',`email` = '$email'  WHERE id_user = ".$iduser;

        $count=$connexion->exec($sql);
        header("Location: ./adminControlPanel.php");


    }

}

if(isset($_GET["id_user"]))
{
    $sql = "select nom,prenom,adresse,email,username from user where id_user = '$iduser';";
    $userData = $connexion->query($sql)->fetch(PDO::FETCH_ASSOC);
    //var_dump($userData);
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
            <input type="text" class="form-control" id="nom" placeholder="Votre nom" value="<?=$userData["nom"]?>" name="nom" required>
            <label class="form-label" for="nom">Nom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="prenom" placeholder="Votre prenom"  name="prenom" value="<?=$userData["prenom"]?>" required>
            <label class="form-label" for="prenom">Prenom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="adresse" placeholder="Votre adresse"  name="adresse" value="<?=$userData["adresse"]?>" required>
            <label class="form-label" for="adresse">Adresse</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Entrez une adresse email valide" name="email" value="<?=$userData["email"]?>" required>
            <label class="form-label" for="email">Adresse Email </label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur"  name="username" value="<?=$userData["username"]?>" required>
            <label class="form-label" for="username">Nom d'utilisateur</label>
        </div>

        <div style="display: flex; justify-content: space-between; margin: 5%">
            <input class="btn btn-success" type="submit" name="send" value="Enregistrer les modifications " />
            <button class="btn btn-danger"><a href="index.php"></a>Annuler les changements </button>
        </div>
    </fieldset>
</form>
</body>
</html>
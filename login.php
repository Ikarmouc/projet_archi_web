<?php
require('./connexion.php');
require('./header.php');
session_abort();

    if($_POST)
    {
        $sql =  "Select * from user where username='". htmlspecialchars($_POST["username"])."';";
        $connexion = connexionBd();
        $result = $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $pwdhash = $result[0]["password"];
        if(password_verify(htmlspecialchars($_POST["password"]),$pwdhash))
        {
            session_start();
            $_SESSION["username"] = htmlspecialchars($_POST["username"]);
            $_SESSION["id_user"] = $result[0]['id_user'];
            if ($_POST["username"] == "Admin")
            {
                $_SESSION["isAdmin"] = true;
            }
            else
            {
                $_SESSION["isAdmin"] = false;
            }
            header("Location: ../index.php");
        }

}


?>

<!doctype html>
<html lang="fr">
<head>

</head>

<body>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-2 text-center">
                        <form method="post" name="loginForm">
                            <h2 >Connectez vous</h2>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="username" >Nom d'utilisateur</label>
                                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Nom d'utilisateur" required/>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="password">Mot de passe </label>
                                <input type="password" id="password"  name="password" class="form-control form-control-lg"  placeholder="**********" required/>
                            </div>
                            <div style="display: flex; justify-content: center;flex-direction: column">
                                <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Connexion" name="Connexion" >
                                <a class="btn btn-outline-light btn-lg px-5" href="register.php">Inscription </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

<?php require('./footer.php') ?>

</html>

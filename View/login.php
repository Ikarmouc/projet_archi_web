<?php
require ('../Controller/connexion.php');
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

<body>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
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

                            <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Connexion" name="Connexion" >

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

<?php require('../footer.php')?>

</html>

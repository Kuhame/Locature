<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Connexion</title>
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="img/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="css/styles.css">
</head>

<body style="background: #D6D1CD;">
    <?php
        include_once("./v/navbar_deco.tpl");
    ?>
    <section class="login-dark" style="height: 809px;color: rgb(33, 37, 41);background: #D6D1CD;">
        <form method="post" style="background: var(--bs-white); color: rgb(33, 37, 41);" action="index.php?controle=utilisateur&action=ident">
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: var(--bs-dark);"></i></div>
            <?php if($msg=="Erreur de saisie"){
                printf("<div class=\"alert alert-danger\" role=\"alert\">%s</div>",$msg);
            }
            ?>
            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="mb-3"><input class="form-control" type="password" name="mdp" placeholder="Mot de passe"></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-dark);">Connexion</button></div><a class="forgot" href="index.php?controle=utilisateur&action=inscription">Pas de compte ? S'inscrire ici</a>
        </form>
    </section>
    <?php
        include("./v/footer.tpl");
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inscription</title>
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

<body>
    <?php
        include_once("./v/navbar_deco.tpl");
    ?>
    <section class="register-photo" style="background-color: transparent;">
        <div class="form-container" style="margin-top: 40px;">
            <div class="image-holder" style="background: url(&quot;img/IINET-DOSAGE-1.jpg&quot;) left / cover no-repeat;"></div>
            <form method="post" action="index.php?controle=utilisateur&action=inscription" style="height: 525px;">
                <h2 class="text-center"><strong>Créer un compte</strong></h2>
                <?php if($msg=="Erreur de saisie"||$msg=="Entreprise existe deja"||$msg=="Email existe deja"){
                printf("<div class=\"alert alert-danger\" role=\"alert\">%s</div>",$msg);
                }
                ?>
                <div class="form-group mb-3"><input class="form-control" type="text" name="nom" placeholder="Nom"></div>
                <div class="form-group mb-3"><input class="form-control" type="text" name="prenom" placeholder="Prénom"></div>
                <div class="form-group mb-3"><input class="form-control" type="email" name="mail" placeholder="Email"></div>
                <div class="form-group mb-3"><input class="form-control" type="password" name="mdp" placeholder="Mot de passe"></div>
                <div class="form-group mb-3"><input class="form-control" type="text" name="nomEntreprise" placeholder="Nom de l'entreprise"></div>
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" id="submitButton" type="submit" style="color: rgb(255,255,255);background-color: #00b5a8;">Créer un compte</button></div><a class="already" href="index.php?controle=utilisateur&action=ident">Déjà un compte ? Se connecter</a>
            </form>
        </div>
    </section>
    <?php
        include("./v/footer.tpl");
    ?>
</body>

</html>
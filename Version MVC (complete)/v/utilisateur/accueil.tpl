<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="img/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/Footer-Clean.css">
    <link rel="stylesheet" href="css/Login-Form-Dark.css">
    <link rel="stylesheet" href="css/Ludens-Users---2-Register.css">
    <link rel="stylesheet" href="css/Pages-Navbar.css">
    <link rel="stylesheet" href="css/Carousel-Hero.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
        if($email==''){
            include_once("./v/navbar_deco.tpl");
        }
        else{
            $role=$_SESSION['profil']['role'];
            include_once("./v/navbar_co.tpl");
        }
    ?>
    <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
        <div class="carousel-inner d-xl-flex">
            <div class="carousel-item active">
                <div class="bg-light border rounded border-light hero-nature carousel-hero jumbotron py-5 px-4" style="height: 700px;">
                    <h1 class="d-xl-flex justify-content-xl-center hero-title" style="padding-top: 0px;margin-top: 200px;">Dacia Sandero</h1>
                    <p class="text-center hero-subtitle">Avec sa silhouette robuste et sa face avant repensée, soulignée par sa nouvelle signature de marque en forme de Y à feux LED, Nouvelle&nbsp;Sandero dévoile son design totalement renouvelé.&nbsp;À l’intérieur, elle s’adapte à votre quotidien pour rendre votre voyage encore plus agréable.<br></p>
                    <p></p><a class="btn btn-primary btn-lg hero-button" role="button" href="index.php?controle=voiture&action=liste_voiture">En savoir plus</a>
                </div>
            </div>
            <div class="carousel-item" style="height: 700px;">
                <div class="bg-light border rounded border-light hero-photography carousel-hero jumbotron py-5 px-4" style="height: 700px;">
                    <h1 class="hero-title" style="margin-top: 200px;">Peugeot 208</h1>
                    <p class="text-center hero-subtitle">Avec sa silhouette basse, ses courbes sensuelles et son capot long, la forte personnalité de la PEUGEOT 208 se révèle au premier regard. Son caractère affirmé, qui s’exprime à travers des couleurs vives, est souligné par un toit Black Diamond&nbsp;<br></p>
                    <p><a class="btn btn-primary btn-lg hero-button" role="button" href="index.php?controle=voiture&action=liste_voiture">En savoir plus</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg-light border rounded border-light hero-technology carousel-hero jumbotron py-5 px-4" style="height: 700px;filter: contrast(91%);">
                    <h1 class="hero-title" style="margin-top: 200px;">Tesla Model 3</h1>
                    <p class="text-center hero-subtitle" style="opacity: 1;">La Model&nbsp;3 est disponible avec une transmission intégrale Dual Motor, des freins et des jantes 20” Performance ainsi que des suspensions rabaissées pour un contrôle total, quelles que soient les conditions météorologiques. Un aileron arrière en fibre de carbone améliore également la stabilité à grande vitesse.<br></p>
                    <p><a class="btn btn-primary btn-lg hero-button" role="button" href="index.php?controle=voiture&action=liste_voiture">En savoir plus</a></p>
                </div>
            </div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
        </ol>
    </div>
    <?php
        include("./v/footer.tpl");
    ?>
</body>

</html>
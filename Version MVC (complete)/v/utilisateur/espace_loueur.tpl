<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Mon espace</title>
</head>

<body>
    <?php
        include_once("./v/navbar_co.tpl");
     ?>
    <div class="container">
        <h1 class="display-4 text-center p-4">Mon espace</h1>
        <div class="row text-center pt-4">
            <div class="col-lg-6 p-3">
                <a href="index.php?controle=facture&action=affichage_location_en_cours" class="btn btn-loueur" role="button">LOCATIONS CLIENTS</a>
            </div>
            <div class="col-lg-6 p-3">
                <a href="index.php?controle=voiture&action=affichage_ajout_modele" class="btn btn-loueur" role="button">AJOUTER UN MODELE</a>
            </div>
            <div class="col-lg-6 p-3">
                <a href="index.php?controle=voiture&action=affichage_modif_stock" class="btn btn-loueur" role="button">MODIFIER LE STOCK</a>
            </div>
            <div class="col-lg-6 p-3">
                <a href="index.php?controle=facture&action=affichage_facture_par_client" class="btn btn-loueur" role="button">FACTURE PAR CLIENT</a>
            </div>
        </div>
    </div>
    <?php
        include("./v/footer.tpl");
    ?>
</body>
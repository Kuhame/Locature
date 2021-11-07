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
    <title>Locations</title>
</head>

<body>
    <?php
        include_once("./v/navbar_co.tpl");
        $total=0;
    ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center align-middle" scope="col">NUMERO DE FACTURE</th>
                        <th class="text-center align-middle" scope="col">PHOTO</th>
                        <th class="text-center align-middle" scope="col">MODELE</th>
                        <th class="text-center align-middle" scope="col">NOM ENTREPRISE</th>
                        <th class="text-center align-middle" scope="col">QUANTITE COMMANDE</th>
                        <th class="text-center align-middle" scope="col">MONTANT</th>
                        <th class="text-center align-middle" scope="col">DATE DE LOCATION</th>
                        <th class="text-center align-middle" scope="col">DATE DE FIN DE LOCATION</th>
                        <th scope="col"></th>
                </thead>
                <tbody>
                    <?php
                    foreach ($factures as $f) {
                        printf("<tr><td class=\"text-center align-middle\">%d</td><td class=\"text-center align-middle\"><img class=\"img-fluid\" src=\"img/%s\" style=\"width: 150px; height: 100px\"></td><td class=\"text-center align-middle\">%s</td><td class=\"text-center align-middle\">%s</td><td class=\"text-center align-middle\">%s</td><td class=\"text-center align-middle\">%s</td><td class=\"text-center align-middle\">%s</td><td class=\"text-center align-middle\">%s</td>",$f['idFacture'], $f['photo'], $f['modele'],$f['nomEntreprise'],$f['nbCommande'],$f['prix'],$f['dateDebut'],$f['dateFin']);
                        $total+=$f['prix'];
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php printf("<strong class=\"d-flex justify-content-end\">Motant total : %d</strong>",$total); ?>
    </div>
    <?php
        include("./v/footer.tpl");
    ?>
</body>
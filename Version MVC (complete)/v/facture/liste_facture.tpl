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
    <title>Mes factures</title>
</head>

<body>
    <?php
        include_once("./v/navbar_co.tpl");
    ?>
    <div class="container">
        <h1 class="display-4 text-center p-4">Mes factures</h1>
        <?php
            if($msg=="Voiture rendu avec succès" || $msg=="Paiement effectué avec succès"){
            printf("<div class=\"alert alert-success\" role=\"alert\">%s</div>",$msg);
            }
            ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">PHOTO</th>
                        <th class="text-center" scope="col">NUMERO DE FACTURE</th>
                        <th class="text-center" scope="col">MODELE</th>
                        <th class="text-center" scope="col">QUANTITE COMMANDE</th>
                        <th class="text-center" scope="col">MONTANT</th>
                        <th class="text-center" scope="col">DATE DE LOCATION</th>
                        <th class="text-center" scope="col">DATE DE FIN DE LOCATION</th>
                        <th class="text-center" scope="col"></th>
                </thead>
                <tbody>
                    <?php
                    $montantARegler=0;
                    foreach ($locations as $l) {
                        printf("
                        <tr>
                            <td class=\"text-center align-middle\">
                                <img class=\"img-fluid\" src=\"img/%s\" style=\"width: 150px; height: 100px\">
                            </td>
                            <td class=\"text-center align-middle\">%d</td>
                            <td class=\"text-center align-middle\">%s</td>
                            <td class=\"text-center align-middle\">%s</td>
                            <td class=\"text-center align-middle\">%s</td>
                            <td class=\"text-center align-middle\">%s</td>
                            <td class=\"text-center align-middle\">%s</td>",$l['photo'],$l['idFacture'], $l['modele'],$l['nbCommande'],$l['prix'],$l['dateDebut'],$l['dateFin']
                        );
                        if($l['etatReglement']==1){
                            printf("<td class=\"text-center align-middle\"><a href=\"index.php?controle=facture&action=rendre&idFacture=%d\" class=\"btn btn-detail\" role=\"button\">RENDRE</a></td></tr>",$l['idFacture']);
                        }
                        else{
                            printf("<td class=\"text-center align-middle\"><a href=\"index.php?controle=facture&action=payer&idFacture=%d\" class=\"btn btn-detail\" role=\"button\">PAYER</a></td></tr>",$l['idFacture']);
                            $montantARegler+=$l['prix'];
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
            printf("<strong class=\"d-flex justify-content-end\">Motant total à régler : %d</strong>",$montantARegler);
            ?>
        </div>
    </div>
    <?php
        include("./v/footer.tpl");
    ?>
</body>
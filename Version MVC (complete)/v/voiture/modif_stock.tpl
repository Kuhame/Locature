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
    <title>Modification des stocks</title>
</head>

<body>
    <?php
        include_once("./v/navbar_co.tpl");
    ?>
    <div class="container" style="width: 500px; padding-top: 10rem;">
        <form method="post" action="index.php?controle=voiture&action=modif_stock">
            <h2 class="text-center pb-3"><strong>Modifier les stocks</strong></h2>
            <?php
            if($msg=="Veuillez remplir tous les champs"){
                printf("<div class=\"alert alert-danger\" role=\"alert\">%s</div>",$msg);
            }
            if($msg=="Stock mis à jour avec succès"){
                printf("<div class=\"alert alert-success\" role=\"alert\">%s</div>",$msg);
            }
            ?>
            <div class="row">
                <div class="col-lg-9 mb-3">
                    <div class="form-group mb-3">
                        <select class="form-control" name="idVoiture">
                            <option value="0" selected hidden>Modele</option>
                            <?php 
                            foreach ($voitures as $v => $donnees) {
                            printf("<option value=\"%d\">%s</option>",$donnees['idVoiture'],$donnees['modele']);
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-3 mb-3"><input class="form-control" type="number" name="nbVoiture" min="0" placeholder="4"></div>
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" id="submitButton" type="submit" style="color: rgb(255,255,255);background-color: #00b5a8;">Modifier</button></div>
            </div>
        </form>
    </div>
    <?php
        include("./v/footer.tpl");
    ?>
</body>
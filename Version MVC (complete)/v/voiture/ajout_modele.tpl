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
    <title>Ajout d'un modele</title>
</head>

<body>
    <?php
        include_once("./v/navbar_co.tpl");
    ?>
    <div class="container" style="padding : 50px 150px;">
        <div class="row">
            <form method="post" action="index.php?controle=voiture&action=ajout_modele" enctype="multipart/form-data">
                <h2 class="text-center"><strong>Ajouter un véhicule</strong></h2>
                <?php if($msg=="Erreur de saisie" || $msg=="Veuillez remplir tous les champs"){
                        printf("<div class=\"alert alert-danger\" role=\"alert\">%s</div>",$msg);
                    }
                    if($msg=="Ajout de modele réussi"){
                    printf("<div class=\"alert alert-success\" role=\"alert\">%s</div>",$msg);
                }
                ?>
                <div class="row">
                    <div class="col-lg-6">
                        <label>Modele</label>
                        <div class="form-group mb-3"><input class="form-control" type="text" name="modele" placeholder="Renault Cliot 4"></div>
                    </div>
                    <div class="col-lg-6">
                        <label>Prix journalier</label>
                        <div class="form-group mb-3"><input class="form-control" type="number" min="1" name="prixJour" placeholder="200"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Photo du modele</label>
                            <input class="form-control" name="photo" type="file" required accept="image/*" id="formFile">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="pb-2">Quantité</label>
                        <div class="form-group mb-3"><input class="form-control" type="number" min="1" name="nbVoiture" placeholder="5"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label>Moteur</label>
                        <div class="form-group mb-3">
                            <select class="form-control" name="moteur">
                                <option value="Thermique" selected>Thermique</option>
                                <option value="Electrique">Electrique</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Boite de vitesse</label>
                        <div class="form-group mb-3">
                            <select class="form-control" name="vitesse">
                                <option value="Manuelle" selected>Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label>Carburant</label>
                        <div class="form-group mb-3">
                            <select class="form-control" name="carburant">
                                <option value="Diesel" selected>Diesel</option>
                                <option value="Essence">Essence</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Nombre de portes</label>
                        <div class="form-group mb-3"><input class="form-control" type="number" name="nbPortes" min="1" placeholder="4"></div>
                    </div>
                </div>
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" id="submitButton" type="submit" style="color: rgb(255,255,255);background-color: #00b5a8;">Ajouter le véhicule</button></div>
            </form>
        </div>
    </div>
    <?php
        include("./v/footer.tpl");
    ?>
</body>
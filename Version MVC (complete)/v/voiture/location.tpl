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
    <title>Détails</title>
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
       <section class="article-list">
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-6 item">
                <?php 
                printf("<img class=\"img-fluid\" src=\"img/%s\" style=\"width: 700px; height: 400px\">
                    <div class=\"d-flex flex-column justify-content-center align-items-center\">
                        <h3 class=\"name pt-3\">%s</h3>
                        <p class=\"prixUnitaire\">%s€/J</p>",$voiture['photo'], $voiture['modele'],$voiture['prixJour']);
                                $caracteristique = json_decode($voiture['caracteristique'],true);
                                printf("<p class=\"description\">
                                <ul>
                                    <li>Moteur : %s</li>
                                    <li>Vitesse : %s</li>
                                    <li>Carburant : %s</li>
                                    <li>Nombre de portes : %s</li></ul>
                                </p>",$caracteristique['moteur'],$caracteristique['vitesse'],$caracteristique['carburant'],$caracteristique['nbPortes']);
                        printf("<p class=\"quantite\">Quantité en stock : %s</p>
                        </div> ",$voiture['nbVoiture']);
                        ?>
                    </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <form method="post" action="index.php?controle=facture&action=louer&modele=<?php echo($voiture['modele']); ?>">
                        <h2 class="text-center"><strong>LOUER UN VEHICULE</strong></h2>
                        <?php if($msg=="Erreur de saisie" || $msg=="Veuillez-vous connecter pour commander"){
                        printf("<div class=\"alert alert-danger\" role=\"alert\">%s</div>",$msg);
                        }
                        if($msg=="Location réussite"){
                        printf("<div class=\"alert alert-success\" role=\"alert\">%s</div>",$msg);
                        }
                        ?>
                        <label>Quantité</label>
                        <div class="form-group mb-3"><input class="form-control" type="number" name="quantite" min="0" max=<?php printf("\"%d\"",$voiture['nbVoiture']); ?> placeholder="Quantité"></div>
                        <label>Date de début</label>
                        <div class="form-group mb-3"><input class="form-control" type="date" name="dateDebut" placeholder="Prénom"></div>
                        <label>Date de fin</label>
                        <div class="form-group mb-3"><input class="form-control" type="date" name="dateFin" placeholder="Email"></div>
                        <?php
                        if($voiture['nbVoiture']==0){
                        echo("<div class=\"form-group mb-3\"><button class=\"btn btn-primary d-block w-100 disabled\" id=\"submitButton\" type=\"submit\" style=\"color: rgb(255,255,255);background-color: #4f5050; border-style: none;\">Rupture</button></div>");
                        }else{
                            echo("<div class=\"form-group mb-3\"><button class=\"btn btn-primary d-block w-100\" id=\"submitButton\" type=\"submit\" style=\"color: rgb(255,255,255);background-color: #00b5a8; border-style: none;\">Louer</button></div>");
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        include("./v/footer.tpl");
    ?>
</body>
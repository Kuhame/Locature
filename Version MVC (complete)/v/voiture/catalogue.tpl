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
    <title>Catalogue</title>
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
        <div class="container">
            <div class="row articles p-4">
                <?php
                foreach ($voitures as $v => $donnees) {
                    printf("<div class=\"col-sm-6 col-md-4 item pb-5\">
                    <a href=\"index.php?controle=voiture&action=information&modele=%s\"><img class=\"img-fluid\" src=\"img/%s\" style=\"width: 640px; height: 300px\"></a>
                    <h3 class=\"name\">%s</h3>
                    <p class=\"prixUnitaire\">%s€/J</p>",$donnees['modele'],$donnees['photo'], $donnees['modele'],$donnees['prixJour']);
                    foreach($donnees as $champ => $attribut){
                        if($champ=='caracteristique'){
                            $caracteristique = json_decode($attribut,true);
                            printf("<p class=\"description\">
                            <ul>
                                <li>Moteur : %s</li>
                                <li>Vitesse : %s</li>
                                <li>Carburant : %s</li>
                                <li>Nombre de portes : %s</li></ul>
                            </p>",$caracteristique['moteur'],$caracteristique['vitesse'],$caracteristique['carburant'],$caracteristique['nbPortes']);
                        }
                    }
                    printf("<p class=\"quantite\">Quantité en stock : %s</p>
                    <a href=\"index.php?controle=voiture&action=information&modele=%s\" class=\"btn btn-detail\" role=\"button\">EN SAVOIR PLUS</a>
                </div> ",$donnees['nbVoiture'],$donnees['modele']);
                }
                ?>
            </div>
        </div>
    </section>
    <?php
        include_once("./v/footer.tpl");
    ?>
</body>

</html>
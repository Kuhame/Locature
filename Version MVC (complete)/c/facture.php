<?php
    function location(){
        require_once("./m/factureBD.php");
        $locations=location_utilisateur($_SESSION['profil']['idUtilisateur']);
        $role=$_SESSION['profil']['role'];
        $msg="";
        require_once("./v/facture/liste_facture.tpl");
    }

    function louer(){
        require_once("./m/voitureBD.php");
        require_once("./m/factureBD.php");
	    $voiture = get_Voiture($_GET['modele']);
        $dateDebut= isset($_POST['dateDebut']) ? ($_POST['dateDebut']) : '';
        $dateFin=isset($_POST['dateFin']) ? ($_POST['dateFin']) : '';
        $quantite=isset($_POST['quantite']) ? ($_POST['quantite']) : '';
        $email = isset($_SESSION['profil']['email']) ? ($_SESSION['profil']['email']) : '';
        $msg='';
        if($dateFin==''){
            $dateFin=date("Y-m-t", strtotime($dateDebut));
        }
        if($email==''){
            $msg="Veuillez-vous connecter pour commander";
            require_once("./v/voiture/location.tpl");
        }
        
        if($voiture['nbVoiture']<=0){
            $msg="Il n'y a plus de stock";
            require_once("./v/voiture/location.tpl");
        }

        if($quantite!='' && $dateDebut!='' && is_numeric($quantite) && $quantite>0 && $dateDebut<$dateFin && $voiture['nbVoiture']>=$quantite && $voiture['nbVoiture']>0 && $email!=""){
            ajouter_facture($_SESSION['profil']['idUtilisateur'], $dateDebut, $dateFin, $voiture['idVoiture'], $quantite, $voiture['prixJour']);
            $nouvelleQuantite=$voiture['nbVoiture']-$quantite;
            if($nouvelleQuantite==0){
                changer_quantite_et_disponibilite($nouvelleQuantite,0,$voiture['idVoiture']);
            }
            else{
                changer_quantite_et_disponibilite($nouvelleQuantite,1,$voiture['idVoiture']);
            }
            $msg="Location réussite";
            require_once("./v/voiture/location.tpl");
        }
        else{
            $msg='Erreur de saisie';
            require_once("./v/voiture/location.tpl");
        }
    }

    function payer(){
        require_once("./m/factureBD.php");
        set_etatReglement($_GET['idFacture'],1);
        $locations=location_utilisateur($_SESSION['profil']['idUtilisateur']);
        $role=$_SESSION['profil']['role'];
        $msg="Paiement effectué avec succès";
        require_once("./v/facture/liste_facture.tpl");
    }

    function rendre(){
        require_once("./m/factureBD.php");
        require_once("./m/voitureBD.php");
        $facture=get_facture($_GET['idFacture']);
        $voiture=get_Voiture_avec_id($facture['idVoiture']);
        $nouvelleQuantite=$voiture['nbVoiture']+$facture['nbCommande'];
        changer_quantite_et_disponibilite($nouvelleQuantite,1,$facture['idVoiture']);
        supprimer_facture($_GET['idFacture']);
        $locations=location_utilisateur($_SESSION['profil']['idUtilisateur']);
        $role=$_SESSION['profil']['role'];
        $msg="Voiture rendu avec succès";
        require_once("./v/facture/liste_facture.tpl");
    }

    function affichage_location_en_cours(){
        require_once("./m/factureBD.php");
        $factures=get_facture_loueur($_SESSION['profil']['idUtilisateur']);
        $role=$_SESSION['profil']['role'];
        require_once("./v/facture/liste_facture_loueur.tpl");
    }

    function affichage_facture_par_client(){
        require_once("./m/factureBD.php");
        require_once("./m/utilisateurBD.php");
        $entreprises=get_entreprise();
        $role=$_SESSION['profil']['role'];
        require_once("./v/facture/choix_entreprise_facture.tpl");
    }

    function affichage_liste_facture_entreprise(){
        require_once("./m/factureBD.php");
        $factures=get_facture_entreprise($_GET['nomEntreprise']);
        $role=$_SESSION['profil']['role'];
        require_once("./v/facture/liste_facture_entreprise.tpl");
    }
<?php
    function location_utilisateur($idUtilisateur){
        require_once("./m/connect.php");
        $sql = "SELECT * FROM facture f, voiture v WHERE f.idUtilisateur=:idU AND v.idVoiture=f.idVoiture";
        $resultat = array();
        $pdo=pdo();

        try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':idU', $idUtilisateur);
            $bool = $commande->execute();
            if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            }
        } catch (PDOException $e) {
            $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die($msg); // On arrête tout.
        }
        return $resultat;
    }

    function ajouter_facture($idU,$dateDebut,$dateFin,$idVoiture,$quantite,$prixJour){
        require_once("./m/connect.php");
        $sql= "INSERT INTO facture (idVoiture, nbCommande, idUtilisateur, dateDebut, dateFin, prix, etatReglement) VALUES (:idV, :quantite, :idU, :dateDebut, :dateFin, :prix, :etatR)";
        $pdo=pdo();
        $etatRDefaut=0;
        $dateD=date_create($dateDebut);
        $dateF=date_create($dateFin);
        $diff=date_diff($dateD,$dateF);
        $joursLocation = $diff->format("%a");
        $prix=(double)$prixJour*(int)$joursLocation*(int)$quantite;
        if($joursLocation>60){
            $prix=$prix*0.9;
        }
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idV', $idVoiture);
        $commande->bindParam(':quantite', $quantite);
        $commande->bindParam(':idU', $idU);
        $commande->bindParam(':dateDebut', $dateDebut);
        $commande->bindParam(':dateFin', $dateFin);
        $commande->bindParam(':prix', $prix);
        $commande->bindParam(':etatR', $etatRDefaut);
        $commande->execute();
    }

    function get_facture($idFacture){
        require_once("./m/connect.php");
        $sql="SELECT * FROM facture WHERE idFacture=:idFacture";
        $resultat = array();
        $pdo=pdo();
        try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':idFacture', $idFacture);
            $bool = $commande->execute();
            if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            }
        } catch (PDOException $e) {
            $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die($msg); // On arrête tout.
        }
        return $resultat[0];
    }

    function set_etatReglement($idFacture, $etatReglement){
        require_once("./m/connect.php");
        $sql="UPDATE facture SET etatReglement = :etatReglement WHERE idFacture=:idFacture";
        $pdo=pdo();
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':etatReglement', $etatReglement);
        $commande->bindParam(':idFacture', $idFacture);
        $commande->execute();
    }

    function supprimer_facture($idFacture){
        require_once("./m/connect.php");
        $sql = "DELETE FROM facture WHERE idFacture=:idFacture";
        $pdo=pdo();
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idFacture', $idFacture);
        $commande->execute();
    }

    function get_facture_loueur($idLoueur){
        require_once("./m/connect.php");
        $sql = "SELECT * FROM facture f, voiture v, utilisateur u WHERE v.idVoiture=f.idVoiture AND v.idLoueur=:idLoueur AND u.idUtilisateur=f.idUtilisateur";
        $resultat = array();
        $pdo=pdo();

        try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':idLoueur', $idLoueur);
            $bool = $commande->execute();
            if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            }
        } catch (PDOException $e) {
            $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die($msg); // On arrête tout.
        }
        return $resultat;
    }

    function get_facture_entreprise($nomEntreprise){
        require_once("./m/connect.php");
        $sql = "SELECT * FROM facture f, voiture v, utilisateur u WHERE u.idUtilisateur=f.idUtilisateur AND u.nomEntreprise=:nomEntreprise AND v.idVoiture=f.idVoiture";
        $resultat = array();
        $pdo=pdo();

        try {
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':nomEntreprise', $nomEntreprise);
            $bool = $commande->execute();
            if ($bool) {
                $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
            }
        } catch (PDOException $e) {
            $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            die($msg); // On arrête tout.
        }
        return $resultat;
    }
<?php

function liste_voitureBD()
{
	require_once("./m/connect.php");
	$sql = "SELECT * FROM `voiture`";
	$resultat = array();
	$pdo=pdo();

	try {
		$commande = $pdo->prepare($sql);
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

function get_Voiture($modele){
	require_once("./m/connect.php");
	$sql = "SELECT * FROM `voiture` WHERE modele=:modele";
	$resultat = array();
	$pdo=pdo();

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':modele', $modele);
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

function get_Voiture_avec_id($idVoiture){
	require_once("./m/connect.php");
	$sql = "SELECT * FROM `voiture` WHERE idVoiture=:idVoiture";
	$resultat = array();
	$pdo=pdo();

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idVoiture', $idVoiture);
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

function changer_quantite_et_disponibilite($nouvelleQuantite, $disponibilite, $idVoiture){
	require_once("./m/connect.php");
	$sql="UPDATE voiture SET nbVoiture = :nouvelleQuantite, etatLocation=:disponibilite WHERE idVoiture=:idVoiture";
	$pdo=pdo();
    $commande = $pdo->prepare($sql);
    $commande->bindParam(':nouvelleQuantite', $nouvelleQuantite);
    $commande->bindParam(':idVoiture', $idVoiture);
	$commande->bindParam(':disponibilite', $disponibilite);
	$commande->execute();
}

function ajout_modeleBD($idLoueur, $modele, $prixJour, $nbVoiture, $caracteristique, $photo, $etatLocation){
	require_once("./m/connect.php");
	$sql="INSERT INTO voiture (idLoueur, modele, prixJour, nbVoiture, caracteristique, photo, etatLocation) VALUES (:idLoueur, :modele, :prixJour, :nbVoiture, :caracteristique, :photo, :etatLocation)";
    $pdo=pdo();
	$commande = $pdo->prepare($sql);
	$commande->bindParam(':idLoueur', $idLoueur);
	$commande->bindParam(':modele', $modele);
    $commande->bindParam(':prixJour', $prixJour);
    $commande->bindParam(':nbVoiture', $nbVoiture);
	$commande->bindParam(':caracteristique', $caracteristique);
	$commande->bindParam(':photo', $photo);
	$commande->bindParam(':etatLocation', $etatLocation);
	$commande->execute();
}


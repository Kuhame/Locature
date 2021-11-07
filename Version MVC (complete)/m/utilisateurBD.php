<?php

function verif_ident_bd($email, $mdp, &$resultat = array())
{
	require_once("./m/connect.php");
	$sql = "SELECT * FROM `utilisateur`  where email=:email and motDePasse=:mdp";
    $pdo=pdo();
	$cryptage= sha1($mdp);
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':email', $email);
		$commande->bindParam(':mdp', $cryptage);
		$bool = $commande->execute();

		if ($bool)
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
		if (count($resultat) == 0) return false;
		else return true;
	} catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function get_utilisateur(){
    require_once("./m/connect.php");
    $sql = "SELECT * FROM `utilisateur`";
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

function creation_compte ($nom,$prenom,$mdp,$mail,$role,$nomEntreprise){
    require_once("./m/connect.php");
	$sql="INSERT INTO utilisateur(nom, prenom, motDePasse, email, role, nomEntreprise) VALUES (:nom, :prenom, :mdp, :mail, :role, :nomEntreprise)";
    $pdo=pdo();
	$cryptage=sha1($mdp);

	$commande = $pdo->prepare($sql);
	$commande->bindParam(':nom', $nom);
	$commande->bindParam(':prenom', $prenom);
    $commande->bindParam(':mdp', $cryptage);
    $commande->bindParam(':mail', $mail);
	$commande->bindParam(':role', $role);
	$commande->bindParam(':nomEntreprise', $nomEntreprise);
	$commande->execute();
}

function get_entreprise(){
    require_once("./m/connect.php");
        $sql = "SELECT DISTINCT nomEntreprise FROM utilisateur u";
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

?>
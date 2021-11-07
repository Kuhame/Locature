<?php
function liste_voiture()
{
	require_once("./m/voitureBD.php");
	$voitures = liste_voitureBD();
    $email = isset($_SESSION['profil']['email']) ? ($_SESSION['profil']['email']) : '';
	require("./v/voiture/catalogue.tpl");
}

function information(){
	require_once("./m/voitureBD.php");
	$voiture = get_Voiture($_GET['modele']);
	$email = isset($_SESSION['profil']['email']) ? ($_SESSION['profil']['email']) : '';
    $msg='';
	require_once("./v/voiture/location.tpl");
}

function ajout_modele(){
    $modele = isset($_POST['modele'])?($_POST['modele']):'';
	$prixJour = isset($_POST['prixJour'])?($_POST['prixJour']):'';
	$nbVoiture = isset($_POST['nbVoiture'])?($_POST['nbVoiture']):'';
	$moteur = isset($_POST['moteur'])?($_POST['moteur']):'';
	$vitesse = isset($_POST['vitesse'])?($_POST['vitesse']):'';
	$carburant = isset($_POST['carburant'])?($_POST['carburant']):'';
	$nbPortes = isset($_POST['nbPortes'])?($_POST['nbPortes']):'';
	$msg = "";

    if($_SESSION['profil']['role']!="LOUEUR"){
        header("Location: index.php?controle=utilisateur&action=accueil");
    }
	if  ($modele == "" || $prixJour == "" || $nbVoiture == "" || $moteur == "" || $vitesse == "" || $carburant == "" || $nbPortes == ""){
			$msg="Veuillez remplir tous les champs";
            $role=$_SESSION['profil']['role'];
			require_once("./v/voiture/ajout_modele.tpl");
	}
	else {
		if  ($nbVoiture <=0 || $nbPortes<=0 || $prixJour<=0) {
			$msg ="Erreur de saisie";
            $role=$_SESSION['profil']['role'];
			require_once("./v/voiture/ajout_modele.tpl");
		}
		else {
            require_once("./m/voitureBD.php");
            //Caracteristique en JSON
            $arr = array('moteur' => $moteur, 'vitesse' => $vitesse, 'nbPortes' => $nbPortes, 'carburant' => $carburant);
            $caracteristique=json_encode($arr);

            //Upload d'une image
            if (($_FILES['photo']['name']!="")){
                    $path = pathinfo($_FILES['photo']['name']);
                    $path['filename']=str_replace(' ', '', $modele);
                    $photo=$path['filename'].".".$path['extension'];
                    $pathFileImage = "img/".$photo;
                 
                // Verification que le fichier n'existe pas deja
                if (!file_exists($pathFileImage)) {
                 move_uploaded_file($_FILES['photo']['tmp_name'],$pathFileImage);
                 }
            }
			ajout_modeleBD($_SESSION['profil']['idUtilisateur'],$modele,$prixJour,$nbVoiture,$caracteristique,$photo,1);
            $msg="Ajout de modele réussi";
            $role=$_SESSION['profil']['role'];
            require_once("./v/voiture/ajout_modele.tpl");
		}
	}
}

function affichage_ajout_modele(){
    $role=$_SESSION['profil']['role'];
    $msg="";
    require_once("./v/voiture/ajout_modele.tpl");
}
function affichage_modif_stock(){
    $msg="";
    require_once("./m/voitureBD.php");
    $voitures=liste_voitureBD();
    $role=$_SESSION['profil']['role'];
    require_once("./v/voiture/modif_stock.tpl");
}
function modif_stock(){
    $nbVoiture=isset($_POST['nbVoiture'])?($_POST['nbVoiture']):'';
    $idVoiture=isset($_POST['idVoiture'])?($_POST['idVoiture']):'';
    require_once("./m/voitureBD.php");
    $voitures=liste_voitureBD();
    if($nbVoiture!='' && $idVoiture!=0){
        if($nbVoiture==0){
            changer_quantite_et_disponibilite($nbVoiture, 0,$idVoiture);
        }else{
            changer_quantite_et_disponibilite($nbVoiture, 1,$idVoiture);
        }
        $msg="Stock mis à jour avec succès";
        $role=$_SESSION['profil']['role'];
        require_once("./v/voiture/modif_stock.tpl");
    }
    else{
        $msg="Veuillez remplir tous les champs";
        $role=$_SESSION['profil']['role'];
        require_once("./v/voiture/modif_stock.tpl");
    }

}
?>
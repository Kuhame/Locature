<?php
session_start();

if (isset($_GET["controle"],$_GET["action"])) {
    $controle = $_GET["controle"];
    $action = $_GET["action"];
}
else {
    $controle = "utilisateur";
    $action = "accueil";
}

require("./c/$controle.php");
$action();

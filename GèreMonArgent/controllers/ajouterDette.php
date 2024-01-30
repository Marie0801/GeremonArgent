<?php

include '../configurations/config.php';
include '../models/dettes.php';

$montant = $_POST['montant'];
$creancier = $_POST['creancier'];
$dateDebut = $_POST['dateDebut'];
$dateFin = $_POST['dateFin'];

$dette = new Dette ($montant, $creancier, $dateDebut, $dateFin);

if ($dette-> creerDette()){

    header("Location:../vues/enregistrerDette.php");
}
?>
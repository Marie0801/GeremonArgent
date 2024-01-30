<?php

include '../configurations/config.php';
include '../models/revenue.php';

$numSource = $_POST['numSource'];
$montant = $_POST['montant'];
$dateReception = $_POST['dateReception'];

$revenue = new Revenue ($numSource, $montant, $dateReception);

if ($revenue-> creerRevenue()){

    header("Location:../vues/enregistrerRevenue.php");
}
?>
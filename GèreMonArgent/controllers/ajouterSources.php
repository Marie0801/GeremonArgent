<?php

include '../configurations/config.php';
include '../models/sources.php';

$nom = $_POST['nom'];
$descript = $_POST['descript'];
$typeSource = $_POST['type'];

$source = new Source ($nom, $descript, $typeSource);

if ($source-> creerSource()){

    header("Location:../vues/ajouterSources.php");
}
?>
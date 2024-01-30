<?php

include '../configurations/config.php';
include '../models/repartition.php';

$numRevenue = $_POST['numRevenue'];
$dime = $_POST['dime'];
$epargne = $_POST['epargne'];
$donDeCharite = $_POST['don'];
$numDette = $_POST['numDette'];
$autresDepense = $_POST['depense'];

$repartition = new Repartition ($numRevenue, $dime, $epargne, $donDeCharite, $numDette, $autresDepense);

if ($repartition-> creerRepartition()){

    header("Location:../vues/repartitionRevenue.php");

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>repartir les revenues</title>
    <?php include_once "../includes/header.php"?>
    <?php include_once "../includes/fromwork.php"?>
    
    <?php include "../controllers/getListeRevenue.php" ?>
    <?php   include  "../controllers/getListeSouces.php" ?>
    <?php include "../controllers/getListeDettes.php" ?>
    <?php include "../controllers/getListePourcentages.php"?>

</head>
<body>
    <form action="../controllers/repartirRevenue.php" method="POST" enctype="multipart/form-data">
    <section class="row" style="margin: 15px;">
    <div class="col-4"></div>
        <div class="col-4">
            <label class="form-label">le revenue a repartir</label>
                
                        
                                    <select  name="numRevenue" class="form-control">
                                    
                                    <?php

                                    
$revenListe = getListeRevenue();
foreach ($revenListe as $reve) {
    echo "<option value=" .$reve->getIdRevenue(). "> pour le revenu " .$reve->getMontant() . "</option>";
}

                                    ?>
                                            </select><br>
                    
                        <label class="form-label">Pourcentage de la dime</label>
                        <input type="number" class="form-control" name="dime" required><br>

                        <label class="form-label">pourcetange d'epargne</label>
                        <input type="number" class="form-control" name="epargne" required><br>
                        <label class="form-label">pourcentage pour le don charite</label>
                        
                        <input type="number" class="form-control" name="don" required><br>
                        <label class="form-label">pourcentage pour le payement des dettes</label>
                                    <!-- <select  name="numDette" class="form-control">
                                    -->
                                    <?php
                                    // foreach ($dett = getListeDette() as $det) {

                                    // echo "<option value = ".$det->getIdDette()."> la dette du creancier ".$det->getCreancier()." de ".$det->getMontant()." ou la date limite est de ".$det->getDateFin()."</option>";
                                    //     }
                                    //         ?><br>
                                            <!-- </select><br> -->
                        
                        <input type="number" class="form-control" name="numDette" requirered>
                        <label class="form-label">pourcetange pour autre depense</label>
                        <input type="number" class="form-control" name="depense" required><br>
                </section>
            <button type="submit"
            value="Envoyer" class="btn btn-block"
            style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto;
            margin-right:auto;">Enregistrer</button><br>
    </form>
</div>
        <?php include_once "../includes/fromwork2.php"?>
    </body>
</html>
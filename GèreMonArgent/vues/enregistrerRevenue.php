<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enregistrer les revenues</title>
    <?php include_once "../includes/header.php" ?>
    <?php include_once "../includes/fromwork.php"?>
    <?php include "../controllers/getListeRevenue.php" ?>
    <?php   include  "../controllers/getListeSouces.php" ?>

</head>
<body>
    <form action="../controllers/ajouterRevenue.php" method="POST" enctype="multipart/form-data">
    <section class="row" style="margin: 15px;">
                <div class="col-4"></div>
                    <div class="col-4">

            <label class="form-label">source de revenue</label>
                            <select  name="numSource" class="form-control">
                            
                            <?php
                            foreach ($sour = getListeSource() as $sou) {

                            echo "<option value = ".$sou->getIdSource()."> pour la source de revenue du nom de ".$sou->getNom()." du type ".$sou->getTypeSource()."</option>";
                                }
                                    ?><br>
                                    </select><br>
                <label class="form-label">montant</label>
                <input type="number" class="form-control" name="montant" required><br>

                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="dateReception" required><br>
        </section>
                <button type="submit" value="Envoyer" class="btn btn-block"
                style="background-color:rgba(19, 0, 75, 0.952); color:white;
                width:200px; margin-left:auto; margin-right:auto;">Enregistrer</button><br>
        </form>
        <div class="mx-5">
        <div class="text-center">
            <h2>LES SOURCES DE REVENUE</h2>
        </div><br>
        
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                    <th>Numero</th>
                    <th>Source de Revenue</th>
                    <th>Montant</th>
                    <th>Date de reception</th>
            </tr>

            </thead>
                <?php
                $revenue = getListeRevenue();
                for($i = 0; $i < count($revenue); $i++) {
                    echo "<tr>";
                    echo "<th scope =\"row\">".$revenue[$i]->getIdRevenue()."</th>";
                    echo "<td>".$revenue[$i]->getNumSource()."</td>";
                    echo "<td>".$revenue[$i]->getMontant()."</td>";
                    echo "<td>".$revenue[$i]->getDateReception()."</td>";
                }
                ?>
            </table>
            
        </div>
        </div>
    <?php include_once "../includes/fromwork2.php"?>
</body>
</html>
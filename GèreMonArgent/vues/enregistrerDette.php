<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enregistrer les dettes</title>
    <?php include_once "../includes/header.php" ?>
    <?php include_once "../includes/fromwork.php"?>
    <?php include "../controllers/getListeDettes.php" ?>
    

</head>
<body>
        <form action="../controllers/ajouterDette.php" method="POST" enctype="multipart/form-data">
            <section class="row" style="margin: 15px;">
                <div class="col-4"></div>
                    <div class="col-4">

                    <label class="form-label">montant</label>
                    <input type="number" class="form-control" name="montant" required><br>
                    <label for="creancier" class="form-label">Creancier</label>
                    <input type="text" name="creancier" required class="form-control"><br>
                    <label class="form-label">Date d'emprunt</label>
                    <input type="date" class="form-control" name="dateDebut" required><br>
                    <label class="form-label">DateFin</label>
                    <input type="date" class="form-control" name="dateFin" required><br>
            </section>
                    <button type="submit" value="Envoyer" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952);
                    color:white; width:200px; margin-left:auto; margin-right:auto;">Enregistrer</button><br>
        </form>
        <div class="mx-5">
        <div class="text-center">
            <h2>LES DETTES</h2>
        </div><br>
        
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                    <th>Numero</th>
                    <th>Montant</th>
                    <th>creancier</th>
                    <th>Date D'emprunt</th>
                    <th>DateFin</th>
            </tr>

            </thead>
                <?php
                $dette = getListeDette();
                for($i = 0; $i < count($dette); $i++) {
                    echo "<tr>";
                    echo "<th scope =\"row\">".$dette[$i]->getIdDette()."</th>";
                    echo "<td>".$dette[$i]->getMontant()."</td>";
                    echo "<td>".$dette[$i]->getCreancier()."</td>";
                    echo "<td>".$dette[$i]->getDateDebut()."</td>";
                    echo "<td>".$dette[$i]->getDateFin()."</td>";
                    
                }
                ?>
            </table>
            
        </div>
            <?php include_once "../includes/fromwork2.php"?>
            </div>
</body>
</html>